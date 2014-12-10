<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index()
    {
        $this->userlib->profilMatch(array(UserLib::$ADMIN));
        $this->load->view('header');
        $this->load->view('body_admin');
        $this->load->view('footer');
    }
}