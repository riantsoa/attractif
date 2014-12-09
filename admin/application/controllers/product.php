<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

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
     * @see http://codeigniter.com/product_guide/general/urls.html
     */
    public function index()
    {
        $this->load->view('header');
        $this->load->view('welcome_message');
        $this->load->view('footer');
    }

    public function add($name, $quantity, $category, $descript , $image)
    {
        $this->load->helper('url');
        $this->load->model('product_model', 'productManager');
        $this->productManager->add($name, $quantity, $category, $descript , $image);

        redirect("product/all");
        // TODO redirect last insert $id product page
    }

    public function edit($id, $name = null, $quantity = null, $category = null, $descript = null, $image = null)
    {
        $this->load->helper('url');
        $this->load->model('product_model', 'productManager');
        $this->productManager->edit($id, $name, $quantity, $category, $descript, $image);

        redirect("product/one/" . $id);
    }

    public function del($id)
    {
        $this->load->helper('url');
        $this->load->model('product_model', 'productManager');
        $this->productManager->del($id);

        redirect("product/all");
    }

    public function all()
    {
        $this->load->model('product_model', 'productManager');

        $data = array();

        //  On lance une requête
        $data['all_product'] = $this->productManager->all();
        $data['count_product'] = $this->productManager->count();

        //  Et on inclut une vue
        $this->load->view('header');
        $this->load->view('all_product', $data);
        $this->load->view('footer');

    }

    public function one($id)
    {
        $this->load->model('product_model', 'productManager');

        $data = array();

        //  On lance une requête
        $data['one_product'] = $this->productManager->one($id);

        //  Et on inclut une vue
        $this->load->view('header');
        $this->load->view('one_product', $data);
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
