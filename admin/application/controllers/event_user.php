<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event_user extends CI_Controller {

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
     * map to /index.php/welcome/<method_status>
     * @see http://codeigniter.com/event_user_guide/general/urls.html
     */

    public function index()
    {
        $this->load->model('event_user_model', 'eventUserManager');

        $data = array();

        //  On lance une requête
        $data['all_event_user'] = $this->eventUserManager->all();
        $data['count_event_user'] = $this->eventUserManager->count();

        //  Et on inclut une vue
        $this->load->view('header');
        $this->load->view('all_event_user', $data);
        $this->load->view('footer');
    }

    public function add($status, $customer, $event, $date)
    {
        $this->load->helper('url');
        $this->load->model('event_user_model', 'eventUserManager');
        $this->eventUserManager->add($status, $customer, $event, $date);

        redirect("event_user");
        // TODO redirect last insert $id event_user page
    }

    public function edit($id, $status, $customer, $event, $date)
    {
        $this->load->helper('url');
        $this->load->model('event_user_model', 'eventUserManager');
        $this->eventUserManager->edit($id, $status, $customer, $event, $date);

        redirect("event_user/one/" . $id);
    }

    public function del($id)
    {
        $this->load->helper('url');
        $this->load->model('event_user_model', 'eventUserManager');
        $this->eventUserManager->del($id);

        redirect("event_user");
    }

    public function one($id)
    {
        $this->load->model('event_user_model', 'eventUserManager');

        $data = array();

        //  On lance une requête
        $data['one_event_user'] = $this->eventUserManager->one($id);

        //  Et on inclut une vue
        $this->load->view('header');
        $this->load->view('one_event_user', $data);
        $this->load->view('footer');

    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
