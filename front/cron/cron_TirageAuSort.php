<?php
include('../lib/dbconnect.php');
/**
 * A lancer 1 fois par jour
 * Tirage au sort pour une vente privée
 * Tous les id (USER) qui ne sont pas dans l'event
 * 0 = client / 1 = inscrit / 2 = participant / 3 = refuse / 4 = termine
 */

//on check les users qui ne sont pas participants à un event OU qui on terminé/refusé une VP
$req = $bdd->prepare('SELECT *
                    FROM user AS u
                    LEFT JOIN event_user AS eu ON (eu.client = u.id)
                    WHERE (eu.client IS NULL) OR (eu.status < 2)
                    AND u.admin <> 1');
$req->execute();
$req->setFetchMode(PDO::FETCH_OBJ);
while ($enregistrement = $req->fetch()) {
    //insert des users pour un event avec status 1
    $req = $bdd->prepare('INSERT INTO event_user VALUES (NULL, :status, :client, :event, :date)');
    // On envois la requète
    $success = $insert->execute(array(
        'status' => $enregistrement->status,
        'client' => $enregistrement->client,
        'event' => $enregistrement->event,
        'date' => date('Y-m-d H:i:s')
    ));
    //on check si il n'y a pas la même insertion à un event pour un user
    $check = $bdd->prepare('SELECT id, COUNT(*) AS nb
                            FROM event_user AS eu
                            WHERE client = ' . $enregistrement->client . ' AND event = ' . $enregistrement->event);
    $check->execute();
    $check->setFetchMode(PDO::FETCH_OBJ);
    while ($checked = $check->fetch()) {
        //si il y a déjà un insert on update à event +1; $i++;
        if ($checked->nb >= 2) {
            $insert = $bdd->prepare('UPDATE event_user SET event=:event WHERE id = '.$enregistrement->id);
            $insert->execute(array(
                'event' => ($enregistrement->id + 1)
            ));
        }
    }
}

    
    //sendmail