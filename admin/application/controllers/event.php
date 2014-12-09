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
        $this->eventManager->add($date, $place, $descript, $name);

        redirect("event/");
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

        redirect("event/");
    }
    public function one($id)
    {
        $this->load->helper('url');
        $this->load->view('header');
        $this->load->helper('form');
        $this->load->model('event_model', 'eventManager');

        $data = array();

        //  On lance une requête
        $data['one_event'] = $this->eventManager->one($id);

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
