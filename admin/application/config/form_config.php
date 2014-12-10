<?php
$config['user'] =  array(
           'name' => array(
                     'field' => 'name',
                     'label' => 'Nom',
                     'rules' => 'trim|required|xss_clean'
                     ),
           'mail' => array(
                     'field' => 'mail',
                     'label' => 'Email',
                     'rules' => 'trim|required|valid_email'
                     ),
           'pass' => array(
                     'field' => 'pass',
                     'label' => 'Mot de passe',
                     'rules' => 'trim|required|xss_clean'
                     ),
           'newsletter' => array(
                     'field' => 'newsletter',
                     'label' => 'Newsletter',
                     'rules' => 'trim|required|xss_clean'
                     ),
           'admin' => array(
                     'field' => 'admin',
                     'label' => 'Administrateur',
                     'rules' => 'trim|required|xss_clean'
                     ),
           );

$config['product'] =  array(
           'name' => array(
                     'field' => 'name',
                     'label' => 'Nom',
                     'rules' => 'trim|required|xss_clean'
                     ),
           'quantity' => array(
                     'field' => 'quantity',
                     'label' => 'Quantité',
                     'rules' => 'trim|required|xss_clean'
                     ),
           'category' => array(
                     'field' => 'category',
                     'label' => 'Categorie',
                     'rules' => 'trim|required|xss_clean'
                     ),
           'descript' => array(
                     'field' => 'descript',
                     'label' => 'Description',
                     'rules' => 'trim|required|xss_clean'
                     ),
           'image' => array(
                     'field' => 'image',
                     'label' => 'Image',
                     'rules' => 'trim|required|xss_clean'
                     ),
           );

$config['event'] =  array(
           'date' => array(
                     'field' => 'date',
                     'label' => 'Date',
                     'rules' => 'trim|required|xss_clean'
                     ),
           'place' => array(
                     'field' => 'place',
                     'label' => 'Place',
                     'rules' => 'trim|required|xss_clean'
                     ),
           'descript' => array(
                     'field' => 'descript',
                     'label' => 'Description',
                     'rules' => 'trim|required|xss_clean'
                     ),
           'name' => array(
                     'field' => 'name',
                     'label' => 'Nom',
                     'rules' => 'trim|required|xss_clean'
                     ),
           );

$config['category'] =  array(
           'name' => array(
                     'field' => 'name',
                     'label' => 'Nom',
                     'rules' => 'trim|required|xss_clean'
                     )
           );

$config['event_user'] =  array(
           'status' => array(
                     'field' => 'status',
                     'label' => 'Status',
                     'rules' => 'trim|required|xss_clean'
                     ),
           'customer' => array(
                     'field' => 'customer',
                     'label' => 'Client',
                     'rules' => 'trim|required|xss_clean'
                     ),
           'event' => array(
                     'field' => 'event',
                     'label' => '   ',
                     'rules' => 'trim|required|xss_clean'
                     ),
           'date' => array(
                     'field' => 'date',
                     'label' => 'Date',
                     'rules' => 'trim|required|xss_clean'
                     ),
           );

$config['product_event'] =  array(
           'product' => array(
                     'field' => 'product',
                     'label' => 'Produit',
                     'rules' => 'trim|required|xss_clean'
                     ),
           'event' => array(
                     'field' => 'event',
                     'label' => 'Événement',
                     'rules' => 'trim|required|xss_clean'
                     ),
           );

$config['sale'] =  array(
           'user' => array(
                     'field' => 'user',
                     'label' => 'Utilisateur',
                     'rules' => 'trim|required|xss_clean'
                     ),
           'product' => array(
                     'field' => 'product',
                     'label' => 'Produit',
                     'rules' => 'trim|required|xss_clean'
                     ),
           'date' => array(
                     'field' => 'date',
                     'label' => 'Date',
                     'rules' => 'trim|required|xss_clean'
                     ),
           'event' => array(
                     'field' => 'event',
                     'label' => 'Événement',
                     'rules' => 'trim|required|xss_clean'
                     ),
           'product' => array(
                     'field' => 'product',
                     'label' => 'Produit',
                     'rules' => 'trim|required|xss_clean'
                     ),
           );

?>
