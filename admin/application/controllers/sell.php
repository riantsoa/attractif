<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sell extends CI_Controller {

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
     * map to /index.php/welcome/<method_user>
     * @see http://codeigniter.com/sell_guide/general/urls.html
     */
    public function index()
    {
        $this->load->view('header');
        $this->load->view('welcome_message');
        $this->load->view('footer');
    }

    public function add($user, $product, $quantity, $date, $event)
    {
        $this->load->helper('url');
        $this->load->model('sell_model', 'sellManager');
        $this->sellManager->add($user, $product, $quantity, $date, $event);

        redirect("sell/all");
        // TODO redirect last insert $id sell page
    }

    public function edit($id, $user, $product, $quantity, $date, $event)
    {
        $this->load->helper('url');
        $this->load->model('sell_model', 'sellManager');
        $this->sellManager->edit($id, $user, $product, $quantity, $date, $event);

        redirect("sell/one/" . $id);
    }

    public function del($id)
    {
        $this->load->helper('url');
        $this->load->model('sell_model', 'sellManager');
        $this->sellManager->del($id);

        redirect("sell/all");
    }

    public function all()
    {
        $this->load->model('sell_model', 'sellManager');

        $data = array();

        //  On lance une requête
        $data['all_sell'] = $this->sellManager->all();
        $data['count_sell'] = $this->sellManager->count();

        //  Et on inclut une vue
        $this->load->view('header');
        $this->load->view('all_sell', $data);
        $this->load->view('footer');

    }

    public function one($id)
    {
        $this->load->model('sell_model', 'sellManager');

        $data = array();

        //  On lance une requête
        $data['one_sell'] = $this->sellManager->one($id);

        //  Et on inclut une vue
        $this->load->view('header');
        $this->load->view('one_sell', $data);
        $this->load->view('footer');

    }

    // public function toto()
    // {
        // $this->load->view('toto');
    // }
//
    // public function manger($plat = '', $boisson = '')
    // {
        // $this->load->view('header');
        // echo 'Voici votre menu : <br />';
        // echo $plat . '<br />';
        // echo $boisson . '<br />';
        // echo 'Bon appétit !';
        // $this->load->view('footer', array("plat"=>$plat, "boisson"=>$boisson));
    // }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
