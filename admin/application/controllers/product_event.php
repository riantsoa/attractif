<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_Event extends CI_Controller {

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
     * @see http://codeigniter.com/product_event_guide/general/urls.html
     */
    public function index()
    {
        $this->load->view('header');
        $this->load->view('welcome_message');
        $this->load->view('footer');
    }

    public function add($product, $event)
    {
        $this->load->helper('url');
        $this->load->model('product_event_model', 'productEventManager');
        $this->productEventManager->add($product, $event);

        redirect("product_event/all");
        // TODO redirect last insert $id product_event page
    }

    public function edit($id, $product, $event)
    {
        $this->load->helper('url');
        $this->load->model('product_event_model', 'productEventManager');
        $this->productEventManager->edit($id, $product, $event);

        redirect("product_event/one/" . $id);
    }

    public function del($id)
    {
        $this->load->helper('url');
        $this->load->model('product_event_model', 'productEventManager');
        $this->productEventManager->del($id);

        redirect("product_event/all");
    }

    public function all()
    {
        $this->load->model('product_event_model', 'productEventManager');

        $data = array();

        //  On lance une requête
        $data['all_product_event'] = $this->productEventManager->all();
        $data['count_product_event'] = $this->productEventManager->count();

        //  Et on inclut une vue
        $this->load->view('header');
        $this->load->view('all_product_event', $data);
        $this->load->view('footer');

    }

    public function one($id)
    {
        $this->load->model('product_event_model', 'productEventManager');

        $data = array();

        //  On lance une requête
        $data['one_product_event'] = $this->productEventManager->one($id);

        //  Et on inclut une vue
        $this->load->view('header');
        $this->load->view('one_product_event', $data);
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