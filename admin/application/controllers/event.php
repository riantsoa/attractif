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
        $this->load->view('header');
        $this->load->view('welcome_message');
        $this->load->view('footer');
    }

    public function add($date, $place, $descript, $category = 0, $category = 0, $admin = 0)
    {
        $this->load->helper('url');
        $this->load->model('event_model', 'eventManager');
        $this->eventManager->add($date, $place, $descript, $category, $category, $admin);

        redirect("event/all");
        // TODO redirect last insert $id event page
    }

    public function edit($id, $date = null, $place = null, $descript = null, $category = null, $category = null, $admin = null)
    {
        $this->load->helper('url');
        $this->load->model('event_model', 'eventManager');
        $this->eventManager->edit($id, $date, $place, $descript, $category, $category, $admin);

        redirect("event/one/" . $id);
    }

    public function del($id)
    {
        $this->load->helper('url');
        $this->load->model('event_model', 'eventManager');
        $this->eventManager->del($id);

        redirect("event/all");
    }

    public function all()
    {
        $this->load->model('event_model', 'eventManager');

        $data = array();

        //  On lance une requête
        $data['all_event'] = $this->eventManager->all();
        $data['count_event'] = $this->eventManager->count();

        //  Et on inclut une vue
        $this->load->view('header');
        $this->load->view('all_event', $data);
        $this->load->view('footer');

    }

    public function one($id)
    {
        $this->load->model('event_model', 'eventManager');

        $data = array();

        //  On lance une requête
        $data['one_event'] = $this->eventManager->one($id);

        //  Et on inclut une vue
        $this->load->view('header');
        $this->load->view('one_event', $data);
        $this->load->view('footer');

    }

    // public function toto()
    // {
        // $this->load->view('toto');
    // }
//
    // public function manger($plat = '', $boisson = '')
    // {
        // $this->load->view('header');
        // echo 'Voici votre menu : <br />';
        // echo $plat . '<br />';
        // echo $boisson . '<br />';
        // echo 'Bon appétit !';
        // $this->load->view('footer', array("plat"=>$plat, "boisson"=>$boisson));
    // }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */