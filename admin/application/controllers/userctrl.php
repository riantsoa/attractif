<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Userctrl extends CI_Controller {

    public function login()
    {
        //  On lance une requête
        //$data['all_category'] = $this->categoryManager->all();
        //$data['count_category'] = $this->categoryManager->count();
        //Et on inclut une vue
        $this->load->model('User_model');
        if(!empty($_POST['login'])){
            $res = $this->User_model->login($_POST['login'],$_POST['password']);
            //Si le login est bon
            if($res){
                UserLib::setId($res['id']);
                UserLib::setUserName($res['name']);
                UserLib::setProfil(UserLib::$ADMIN);
                //Redirection vers l'acceuil de l'admin
                redirect('welcome');
                return;
            }
        }
        $this->load->view('user/login');
    }

    public function not_permited(){
        $this->load->view('user/not_permited');
    }

    public function deconnecter(){
        UserLib::disconnect();
        redirect('welcome');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
