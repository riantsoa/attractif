<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
    protected $table = 'user';

    /**
     *  Ajoute un user
     */
    public function add($name, $mail, $pass, $newsletter = 0, $admin = 0)
    {
        //  Ces données seront automatiquement échappées
        return $this->db
            ->set('name',  $name)
            ->set('mail',   $mail)
            ->set('pass', $pass)
            ->set('newsletter', $newsletter)
            ->set('admin', $admin)
            ->insert($this->table);
        ;

        //  Une fois que tous les champs ont bien été définis, on "insert" le tout
        // return $this->db->insert($this->table);
    }

    /**
     *  Édite une user déjà existante
     */
    public function edit($id, $name = null, $mail = null, $newsletter = null, $admin = null)
    {
        if($name != null)
        {
            $this->db->set('name', $name);
        }
        if($mail != null)
        {
            $this->db->set('mail', $mail);
        }
        // if($pass != null)
        // {
            // $this->db->set('pass', $pass);
        // }
        if($newsletter != null)
        {
            $this->db->set('newsletter', $newsletter);
        }
        if($admin != null)
        {
            $this->db->set('admin', $admin);
        }
        //  La condition
        $this->db->where('id', (int) $id);

        return $this->db->update($this->table);
    }

    /**
     *  Supprime une user
     */
    public function del($id)
    {
        return $this->db->where('id', (int) $id)
                ->delete($this->table);
    }

    /**
     *  Retourne le nombre de user
     */
    public function count($where = array())
    {
        return (int) $this->db->where($where)
                      ->count_all_results($this->table);
    }

    /**
     *  Retourne une liste de user
     */
    public function one($id)
    {
        return $this->db->select('*')
                ->from($this->table)
                ->where('id', (int) $id)
                ->get()
                ->result();
    }
    /**
     *  Retourne une liste de user
     */
    public function all($nb = 100, $debut = 0)
    {
        return $this->db->select('*')
                ->from($this->table)
                ->limit($nb, $debut)
                ->order_by('id', 'desc')
                ->get()
                ->result();
    }

    /***
     * verifie si l'utilisateur peut se connecter ou pas
     */
    public function login(){

    }
}


/* End of file user_model.php */
/* Location: ./application/models/user_model.php */
