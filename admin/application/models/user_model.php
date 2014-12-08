<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
    protected $table = 'user';

    /**
     *  Ajoute un user
     */
    public function add_user($name, $mail, $pass, $newsletter = 0, $alert = 0, $admin = 0)
    {
        //  Ces données seront automatiquement échappées
        $this->db->set('name',  $name)
            >set('mail',   $mail)
            ->set('pass', $pass)
            ->set('newsletter', $newsletter)
            ->set('alert', $alert)
            ->set('admin', $admin)
        ;

        //  Une fois que tous les champs ont bien été définis, on "insert" le tout
        return $this->db->insert($this->table);
    }

    /**
     *  Édite une user déjà existante
     */
    public function edit_user($id, $name = null, $mail = null, $pass = null, $newsletter = null, $alert = null, $admin = null)
    {
        if($name != null)
        {
            $this->db->set('name', $name);
        }
        if($mail != null)
        {
            $this->db->set('mail', $mail);
        }
        if($pass != null)
        {
            $this->db->set('pass', $pass);
        }
        if($newsletter != null)
        {
            $this->db->set('newsletter', $newsletter);
        }
        if($alert != null)
        {
            $this->db->set('alert', $alert);
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
    public function del_user()
    {
        return $this->db->where('id', (int) $id)
                ->delete($this->table);
    }

    /**
     *  Retourne le nombre de user
     */
    public function count_user($where = array())
    {
        return (int) $this->db->where($where)
                      ->count_all_results($this->table);
    }

    /**
     *  Retourne une liste de user
     */
    public function list_user($nb = 100, $debut = 0)
    {
        // return array("toto"=>"totoo", "titit"=>"titi");
        return $this->db->select('*')
                ->from($this->table)
                ->limit($nb, $debut)
                ->order_by('id', 'desc')
                ->get()
                ->result();
    }
}


/* End of file user_model.php */
/* Location: ./application/models/user_model.php */
