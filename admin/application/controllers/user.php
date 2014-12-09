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
        $this->load->helper('form');
        $this->load->model('user_model', 'userManager');

        $data = array();

        //  On lance une requête
        $data['all_user'] = $this->userManager->all();
        $data['count_user'] = $this->userManager->count();

        //  Et on inclut une vue
        $this->load->view('header');
        $this->load->view('all_user', $data);
        $this->load->view('footer');

    }
    public function add($name, $mail, $pass, $newsletter = 0, $alert = 0, $admin = 0)
    {
        $this->load->helper('url');
        $this->load->model('user_model', 'userManager');
        $this->userManager->add($name, $mail, $pass, $newsletter, $alert, $admin);

        redirect("user");
        // TODO redirect last insert $id user page
    }

    public function edit($id)
    {
        $this->load->helper('url');
        $this->load->model('user_model', 'userManager');
            $this->userManager->edit(
            $id,
            $this->input->get_post('name'),
            $this->input->get_post('mail'),
            // $this->input->get_post('pass'),
            $this->input->get_post('newsletter'),
            $this->input->get_post('alert'),
            $this->input->get_post('admin')
        );

        redirect("user/one/" . $id);
    }

    public function del($id)
    {
        $this->load->helper('url');
        $this->load->model('user_model', 'userManager');
        $this->userManager->del($id);

        redirect("user");
    }

    public function one($id)
    {
        $this->load->view('header');
        $this->load->helper('form');
        $this->load->model('user_model', 'userManager');

        $data = array();

        //  On lance une requête
        $data['one_user'] = $this->userManager->one($id);

        try
        {
            $data["user"] = $this->config->item("user");
        }
        catch(Exception $err)
        {
            log_message("error", $err->getMessage());
            return show_error($err->getMessage());
        }

        //  Et on inclut une vue
        $this->load->view('one_user', $data);
        $this->load->view('footer');

    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
