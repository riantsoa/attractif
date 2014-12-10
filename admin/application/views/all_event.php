<?php

// echo $count_event . "events<br>";
echo "<div class=\"row\">
    <div class=\"col-lg-12\">";
echo "<h1 class=\"page-header\"><span class=\"glyphicon glyphicon-time\"></span>&nbsp;&nbsp;Événements (" . $count_event . ")</h1><br>
    </div>
</div>";

?>
<div class="col-md-9">
<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
<?php

foreach ($all_event as $key=>$value)
{
    echo "<tr>";
    echo "<td><strong>" . $value->name  . " (" . $value->id . ")</strong></td>";
    echo "<td><button class='btn btn-default'><a href='one/" . $value->id  . "'>Modifier </a></button></td> ";
    echo "<td><button class='btn btn-default'><a href='del/" . $value->id  . "'>Supprimer </a></button></td>";
    echo "</tr>";
}

?>
    </tbody>
</table>
</div>
<div class="col-md-3">
    <h3>Créer nouveau</h3>
<?php
echo form_open($this->uri->segment(1) . '/add/', '');
form_hidden('id', $this->uri->segment(3));

foreach ($event as $key=>$value)
{
    echo form_label($event[$key]["label"], $event[$key]["field"]) . '<br>';

    if($key == 'date'){
        echo form_input(array('name' => $event[$key]["field"] , 'id' => 'evenement_date'));
    }else echo form_input($event[$key]["field"], '');

}

echo form_submit('submit', 'Envoyer');
echo form_close();

?>

<script>
    $(function() {
        jQuery('#evenement_date').datetimepicker({lang:'fr',startDate:'+1971/05/01'});
    });
</script>
