<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index()
    {
        $nbClient=0;
        $nbevenements=0;
        $nbventes=0;

        $this->load->model('user_model');
        $clients = $this->user_model->all_not_admin();
        $nbClient = count($clients);

        $this->load->model('event_model');
        $evenements = $this->event_model->all_event_by_date();
        $nbevenements = count($evenements);

        $this->load->model('sale_model');
        $nbventes = $this->sale_model->count();

        $this->userlib->profilMatch(array(UserLib::$ADMIN));
        $this->load->view('header');
        $this->load->view('body_admin', array('nbClient'=>$nbClient,'nbevenements'=>$nbevenements,'nbventes'=>$nbventes));
        $this->load->view('footer');
    }
}