<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sale extends CI_Controller {

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
     * @see http://codeigniter.com/sale_guide/general/urls.html
     */

    public function index()
    {
        $this->load->model('sale_model', 'saleManager');

        $data = array();

        //  On lance une requête
        $data['all_sale'] = $this->saleManager->all();
        $data['count_sale'] = $this->saleManager->count();

        //  Et on inclut une vue
        $this->load->view('header');
        $this->load->view('all_sale', $data);
        $this->load->view('footer');
    }

    public function add($user, $product, $quantity, $date, $event)
    {
        $this->load->helper('url');
        $this->load->model('sale_model', 'saleManager');
        $this->saleManager->add($user, $product, $quantity, $date, $event);

        redirect("sale/");
        // TODO redirect last insert $id sale page
    }

    public function edit($id, $user, $product, $quantity, $date, $event)
    {
        $this->load->helper('url');
        $this->load->model('sale_model', 'saleManager');
        $this->saleManager->edit($id, $user, $product, $quantity, $date, $event);

        redirect("sale/one/" . $id);
    }

    public function del($id)
    {
        $this->load->helper('url');
        $this->load->model('sale_model', 'saleManager');
        $this->saleManager->del($id);

        redirect("sale/");
    }

    public function one($id)
    {
        $this->load->model('sale_model', 'saleManager');

        $data = array();

        //  On lance une requête
        $data['one_sale'] = $this->saleManager->one($id);

        //  Et on inclut une vue
        $this->load->view('header');
        $this->load->view('one_sale', $data);
        $this->load->view('footer');

    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
