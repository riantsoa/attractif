<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

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
        $this->load->model('category_model', 'categoryManager');

        $data = array();

        //  On lance une requête
        $data['all_category'] = $this->categoryManager->all();
        $data['count_category'] = $this->categoryManager->count();

        //  Et on inclut une vue
        $this->load->view('header');
        $this->load->view('all_category', $data);
        $this->load->view('footer');

    }

    public function add($name)
    {
        $this->load->helper('url');
        $this->load->model('category_model', 'categoryManager');
        $this->categoryManager->add($name);

        redirect("category/");
        // TODO redirect last insert $id category page
    }

    public function edit($id, $name)
    {
        $this->load->helper('url');
        $this->load->model('category_model', 'categoryManager');
        $this->categoryManager->edit($id, $name);

        redirect("category/one/" . $id);
    }

    public function del($id)
    {
        $this->load->helper('url');
        $this->load->model('category_model', 'categoryManager');
        $this->categoryManager->del($id);

        redirect("category/");
    }

    public function one($id)
    {
        $this->load->model('category_model', 'categoryManager');

        $data = array();

        //  On lance une requête
        $data['one_category'] = $this->categoryManager->one($id);

        //  Et on inclut une vue
        $this->load->view('header');
        $this->load->view('one_category', $data);
        $this->load->view('footer');

    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
