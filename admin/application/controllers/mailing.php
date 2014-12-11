<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mailing extends CI_Controller {

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

    public function export_mail_csv()
    {
        $this->userlib->profilMatch(array(UserLib::$ADMIN));
        $_event_id = "";
        //ramener la liste des event par date
        $events = array();
        $data = array();
        $this->load->model('event_model');
        $res = $this->event_model->all_event_by_date();
        if(!empty($_POST['id_event'])) $_event_id = $_POST['id_event'];
        if(!empty($_event_id)){
            //affichage liste mail

        }
        $this->load->view('header');
        $this->load->view('mailing_export', array('events'=>$res));
        $this->load->view('footer');
    }
    public function export_mail_csv_ajax(){
        if(!empty($_POST['event_id'])) $event_id = $_POST['event_id'];
        else return;
        //Ramener la liste des personnes de cet event
        $this->load->model('event_user_model');
        $events = $this->event_user_model->one_by_event2($event_id);
        $this->load->view('list_mailing_ajax',array('events'=>$events));
    }
    public function get_csv(){
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=data.csv');

        // create a file pointer connected to the output stream
        $output = fopen('php://output', 'w');

        // output the column headings
        fputcsv($output, array('Column 1', 'Column 2', 'Column 3'));

        // fetch the data
        if(!empty($_GET['e_id'])) $e_id = $_GET['e_id'];
        else return;

        //Ramener la liste des personnes de cet event
        $this->load->model('event_user_model');
        $events = $this->event_user_model->one_by_event2($e_id);

        // loop over the rows, outputting them
        //$event_array =  (array) $events;
        fputcsv($output, array('Mail','Nom'));
        foreach ($events as $event) {
            $event_array2['mail'] = $event->mail;
            $event_array2['name'] = $event->name;
            fputcsv($output, $event_array2);
        }
    }

}