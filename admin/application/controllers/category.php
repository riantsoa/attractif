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
        $this->userlib->profilMatch(array(UserLib::$ADMIN));
        $this->load->helper('url');
        $this->load->view('header');
        $this->load->helper('form');
        $this->load->model('category_model', 'categoryManager');

        $data = array();

        try
        {
            $data["category"] = $this->config->item("category");
        }
        catch(Exception $err)
        {
            log_message("error", $err->getMessage());
            return show_error($err->getMessage());
        }
        //  On lance une requête
        $data['all_category'] = $this->categoryManager->all();
        $data['count_category'] = $this->categoryManager->count();

        //  Et on inclut une vue
        $this->load->view('all_category', $data);
        $this->load->view('footer');

    }

    public function add($name)
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('category_model', 'categoryManager');
        $this->categoryManager->add(
            $this->input->get_post('name')
        );

        redirect("category/index");
        // TODO redirect last insert $id category page
    }

    public function edit($id)
    {
        $this->load->helper('url');
        $this->load->model('category_model', 'categoryManager');
        $this->categoryManager->edit(
            $id,
            $this->input->get_post('name')
        );
        redirect("category/one/" . $id);
    }

    public function del($id)
    {
        $this->load->helper('url');
        $this->load->model('category_model', 'categoryManager');
        $this->categoryManager->del($id);

        redirect("category/index");
    }

    public function one($id)
    {
        $this->load->helper('url');
        $this->load->view('header');
        $this->load->helper('form');
        $this->load->model('category_model', 'categoryManager');

        $data = array();

        //  On lance une requête
        $data['one_category'] = $this->categoryManager->one($id);

        try
        {
            $data["category"] = $this->config->item("category");
        }
        catch(Exception $err)
        {
            log_message("error", $err->getMessage());
            return show_error($err->getMessage());
        }
        //  Et on inclut une vue
        $this->load->view('one_category', $data);
        $this->load->view('footer');

    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
