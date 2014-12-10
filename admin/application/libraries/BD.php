<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require('application/config/database.php');

define('HOSTNAME',$db['default']['hostname']);
define('USERNAME',$db['default']['username']);
define('PASSWORD',$db['default']['password']);
define('DATABASE',$db['default']['database']);

class BD {

    public $link;
    public $host;
    public $user;
    public $password;

    public function query($query, $query_mode = PDO::FETCH_ASSOC) {
        $tabRes = array();
         try {
            $result = $this->link->query(($query));
            while (isset($result) && $row = $result->fetch($query_mode)) {
                $tabRes[] = $row;
            }
         }
         catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage() . '<br />';
            echo 'N° : ' . $e->getCode();die("coco");
         }
        return $tabRes;
    }

    public function returnLastInsertedId()
    {
        return $this->link->lastInsertId();
    }

    public function command($query) {
        try {
           $result = $this->link->exec(($query));
        }catch (Exception $e) {

            echo 'Erreur : ' . $e->getMessage() . '<br />';
            echo 'N° : ' . $e->getCode();
         }
        return $result;
    }

    public function __construct() {
        //Charge le fichier de config de la base 'application/config/config.php'
        $ci = get_instance();
        $ci->config->load('config');
        
        try {
            $this->link = new PDO('mysql:host=' . HOSTNAME . ';dbname=' . DATABASE, USERNAME, PASSWORD);
            $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->link->exec("SET NAMES 'utf8';");
            
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage() . '<br />';
            echo 'N° : ' . $e->getCode();
        }

    }
}