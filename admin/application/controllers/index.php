<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_date>
     * @see http://codeigniter.com/category_guide/general/urls.html
     */

    public function index()
    {
        $this->userlib->profilMatch(array(UserLib::$ADMIN));
        $this->load->helper('url');
        $this->load->view('header');
        $this->load->helper('form');

        $data = array();

        //  Et on inclut une vue
        $this->load->view('index', $data);
        $this->load->view('footer');
    }
}

