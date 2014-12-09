<?php
$config['user'] =  array(
           'name' => array(
                     'field' => 'name',
                     'label' => 'Name',
                     'rules' => 'trim|required|xss_clean'
                     ),
           'mail' => array(
                     'field' => 'mail',
                     'label' => 'Mail',
                     'rules' => 'trim|required|valid_email'
                     ),
           // 'pass' => array(
                     // 'field' => 'pass',
                     // 'label' => 'Pass',
                     // 'rules' => 'trim|required|xss_clean'
                     // ),
           'newsletter' => array(
                     'field' => 'newsletter',
                     'label' => 'Newsletter',
                     'rules' => 'trim|required|xss_clean'
                     ),
           'alert' => array(
                     'field' => 'alert',
                     'label' => 'Alert',
                     'rules' => 'trim|required|xss_clean'
                     ),
           'admin' => array(
                     'field' => 'admin',
                     'label' => 'Admin',
                     'rules' => 'trim|required|xss_clean'
                     ),
           );

$config['product'] =  array(
           'name' => array(
                     'field' => 'name',
                     'label' => 'Name',
                     'rules' => 'trim|required|xss_clean'
                     ),
           'quantity' => array(
                     'field' => 'quantity',
                     'label' => 'Quantity',
                     'rules' => 'trim|required|xss_clean'
                     ),
           'category' => array(
                     'field' => 'category',
                     'label' => 'Category',
                     'rules' => 'trim|required|xss_clean'
                     ),
           'descript' => array(
                     'field' => 'descript',
                     'label' => 'Descript',
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
                     'label' => 'Name',
                     'rules' => 'trim|required|xss_clean'
                     ),
           );

?>
