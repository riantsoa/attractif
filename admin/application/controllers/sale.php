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
        $this->userlib->profilMatch(array(UserLib::$ADMIN));
        $this->load->helper('url');
        $this->load->view('header');
        $this->load->helper('form');
        $this->load->model('sale_model', 'saleManager');

        $data = array();

        $this->load->model('product_model', 'productManager');
        $data['all_product'] = $this->productManager->all();
        $this->load->model('event_model', 'eventManager');
        $data['all_event'] = $this->eventManager->all();
        $this->load->model('user_model', 'userManager');
        $data['all_user'] = $this->userManager->all();

        try
        {
            $data["sale"] = $this->config->item("sale");
        }
        catch(Exception $err)
        {
            log_message("error", $err->getMessage());
            return show_error($err->getMessage());
        }

        //  On lance une requête
        $data['all_sale'] = $this->saleManager->all();
        $data['count_sale'] = $this->saleManager->count();

        //  Et on inclut une vue
        $this->load->view('all_sale', $data);
        $this->load->view('footer');
    }

    public function add()
    {
        $this->load->helper('url');
        $this->load->model('sale_model', 'saleManager');
        $this->saleManager->add(
            $this->input->get_post('user'),
            $this->input->get_post('product'),
            $this->input->get_post('date'),
            $this->input->get_post('event')
        );

        redirect("sale/index");
        // TODO redirect last insert $id sale page
    }

    public function edit($id, $user, $product, $date, $event)
    {
        $this->load->helper('url');
        $this->load->model('sale_model', 'saleManager');
        $this->saleManager->edit(
            $id,
            $this->input->get_post('user'),
            $this->input->get_post('product'),
            $this->input->get_post('date'),
            $this->input->get_post('event')
        );

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
        $this->load->helper('url');
        $this->load->view('header');
        $this->load->helper('form');
        $this->load->model('sale_model', 'saleManager');

        $data = array();

        $this->load->model('product_model', 'productManager');
        $data['all_product'] = $this->productManager->all();
        $this->load->model('event_model', 'eventManager');
        $data['all_event'] = $this->eventManager->all();
        $this->load->model('user_model', 'userManager');
        $data['all_user'] = $this->userManager->all();

        //  On lance une requête
        $data['one_sale'] = $this->saleManager->one($id);

        try
        {
            $data["sale"] = $this->config->item("sale");
        }
        catch(Exception $err)
        {
            log_message("error", $err->getMessage());
            return show_error($err->getMessage());
        }
        //  Et on inclut une vue
        $this->load->view('one_sale', $data);
        $this->load->view('footer');

    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
