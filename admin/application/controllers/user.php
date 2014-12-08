<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

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
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->load->view('header');
        $this->load->view('welcome_message');
        $this->load->view('footer');
    }

    public function add($name, $mail, $pass, $newsletter = 0, $alert = 0, $admin = 0)
    {
        $this->load->helper('url');
        $this->load->model('user_model', 'userManager');
        $this->userManager->add_user($name, $mail, $pass, $newsletter, $alert, $admin);

        echo site_url("/user/view");

    }
    public function view()
    {
        $this->load->model('user_model', 'userManager');
        // $this->load->model('user_model');

        $data = array();

        //  On lance une requête
        // $data['ooo'] = "tutu";
        $data['toto'] = $this->userManager->list_user();

        //  Et on inclut une vue
        $this->load->view('header');
        $this->load->view('user', $data);
        $this->load->view('footer');

    }

    public function toto()
    {
        $this->load->view('toto');
    }
    public function manger($plat = '', $boisson = '')
    {
        $this->load->view('header');
        echo 'Voici votre menu : <br />';
        echo $plat . '<br />';
        echo $boisson . '<br />';
        echo 'Bon appétit !';
        $this->load->view('footer', array("plat"=>$plat, "boisson"=>$boisson));
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
