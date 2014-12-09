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
        $this->load->helper('url');
        $this->load->view('header');
        $this->load->helper('form');

        $this->load->helper('form');
        $this->load->model('product_model', 'productManager');

        $data = array();

        //  On lance une requête
        $data['all_product'] = $this->productManager->all();
        $data['count_product'] = $this->productManager->count();

        //  Et on inclut une vue
        $this->load->view('all_product', $data);
        $this->load->view('footer');
    }

    public function add($name, $quantity, $category, $descript , $image)
    {
        $this->load->helper('url');
        $this->load->helper('form');

        $this->load->model('product_model', 'productManager');
        $this->productManager->add($name, $quantity, $category, $descript , $image);

        redirect("product/");
        // TODO redirect last insert $id product page
    }

    public function edit($id, $name = null, $quantity = null, $category = null, $descript = null, $image = null)
    {
        $this->load->helper('url');
        $this->load->helper('form');

        $this->load->model('product_model', 'productManager');
        $this->productManager->edit(
            $id,
            $this->input->get_post('name'),
            $this->input->get_post('quantity'),
            $this->input->get_post('category'),
            $this->input->get_post('descript'),
            $this->input->get_post('image')
        );

        redirect("product/one/" . $id);
    }

    public function del($id)
    {
        $this->load->helper('url');
        $this->load->view('header');
        $this->load->helper('form');

        $this->load->model('product_model', 'productManager');
        $this->productManager->del($id);

        redirect("product/");
    }

    public function one($id)
    {
        $this->load->helper('url');
        $this->load->view('header');
        $this->load->helper('form');

        $this->load->model('product_model', 'productManager');
        $this->load->model('category_model', 'categoryManager');

        $data = array();

        //  On lance une requête
        $data['one_product'] = $this->productManager->one($id);
        $data['all_category'] = $this->categoryManager->all();

        try
        {
            $data["product"] = $this->config->item("product");
        }
        catch(Exception $err)
        {
            log_message("error", $err->getMessage());
            return show_error($err->getMessage());
        }

        //  Et on inclut une vue
        $this->load->view('one_product', $data);
        $this->load->view('footer');

    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
