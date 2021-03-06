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
        $this->userlib->profilMatch(array(UserLib::$ADMIN));
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

    public function add()
    {
        $this->load->helper('url');
        $this->load->model('product_event_model', 'productEventManager');
        $this->productEventManager->add(
            $this->input->get_post('product'),
            $this->input->get_post('event')
        );

        redirect("event/one/" . $this->input->get_post('id'));
        // TODO redirect last insert $id product_event page
    }

    public function edit($id)
    {
        $this->load->helper('url');
        $this->load->model('product_event_model', 'productEventManager');
        $this->productEventManager->edit(
            $this->input->get_post('product'),
            $this->input->get_post('event')
        );

        redirect("product_event/one/" . $id);
    }

    public function del($product, $event)
    {
        $this->load->helper('url');
        $this->load->model('product_event_model', 'productEventManager');
        $this->productEventManager->del($product, $event);

        redirect("event/one/" . $event);
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
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
