<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event extends CI_Controller {

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
     * @see http://codeigniter.com/event_guide/general/urls.html
     */

    public function index()
    {
        $this->load->helper('url');
        $this->load->view('header');
        $this->load->helper('form');
        $this->load->model('event_model', 'eventManager');

        $data = array();

        try
        {
            $data["event"] = $this->config->item("event");
        }
        catch(Exception $err)
        {
            log_message("error", $err->getMessage());
            return show_error($err->getMessage());
        }

        try
        {
            $data["form_product_event"] = $this->config->item("product_event");
        }
        catch(Exception $err)
        {
            log_message("error", $err->getMessage());
            return show_error($err->getMessage());
        }

        //  On lance une requête
        $data['all_event'] = $this->eventManager->all();
        $data['count_event'] = $this->eventManager->count();

        //  Et on inclut une vue
        $this->load->view('all_event', $data);
        $this->load->view('footer');
    }

    public function add($date, $place, $descript, $name)
    {
        $this->load->helper('url');
        $this->load->view('header');
        $this->load->helper('form');
        $this->load->model('event_model', 'eventManager');
        $this->eventManager->add(
            $this->input->get_post('date'),
            $this->input->get_post('place'),
            $this->input->get_post('descript'),
            $this->input->get_post('name')
        );

        redirect("event/index");
        // TODO redirect last insert $id event page
    }

    public function edit($id, $date, $place, $descript, $name)
    {
        $this->load->helper('url');
        $this->load->view('header');
        $this->load->helper('form');
        $this->load->model('event_model', 'eventManager');
        $this->eventManager->edit(
            $id,
            $this->input->get_post('date'),
            $this->input->get_post('place'),
            $this->input->get_post('descript'),
            $this->input->get_post('name')
        );

        redirect("event/one/" . $id);
    }

    public function del($id)
    {
        $this->load->helper('url');
        $this->load->view('header');
        $this->load->helper('form');
        $this->load->model('event_model', 'eventManager');
        $this->eventManager->del($id);

        redirect("event//index");
    }

    public function one($id)
    {
        $this->load->helper('url');
        $this->load->view('header');
        $this->load->helper('form');
        $this->load->model('event_model', 'eventManager');
        $this->load->model('product_event_model', 'productEventManager');
        $this->load->model('event_user_model', 'eventUserManager');
        $this->load->model('user_model', 'userManager');

        $this->load->model('product_model', 'productManager');
        $data = array();
        try
        {
            $data["form_product_event"] = $this->config->item("product_event");
        }
        catch(Exception $err)
        {
            log_message("error", $err->getMessage());
            return show_error($err->getMessage());
        }


        $data['all_product'] = $this->productManager->all();
        $data['all_product_event'] = $this->productEventManager->one($id)[0];
        $data['all_event_user'] = $this->eventUserManager->one_by_event($id);
        $data['all_user'] = $this->userManager->all_not_admin();
        $data['id'] = $id;
        //  On lance une requête
        $data['one_event'] = $this->eventManager->one($id);


        try
        {
            $data["form_event_user"] = $this->config->item("event_user");
        }
        catch(Exception $err)
        {
            log_message("error", $err->getMessage());
            return show_error($err->getMessage());
        }
        try
        {
            $data["product_event"] = $this->config->item("product_event");
        }
        catch(Exception $err)
        {
            log_message("error", $err->getMessage());
            return show_error($err->getMessage());
        }
        try
        {
            $data["event"] = $this->config->item("event");
        }
        catch(Exception $err)
        {
            log_message("error", $err->getMessage());
            return show_error($err->getMessage());
        }
        //  Et on inclut une vue
        $this->load->view('one_event', $data);
        $this->load->view('footer');

    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
