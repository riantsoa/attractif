<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_ctrl extends CI_Controller {

    public function login()
    {
        //  On lance une requête
        //$data['all_category'] = $this->categoryManager->all();
        //$data['count_category'] = $this->categoryManager->count();
        //Et on inclut une vue
        $this->load->view('user/login');
    }

    public function not_permited(){
        $this->load->view('user/not_permited');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
