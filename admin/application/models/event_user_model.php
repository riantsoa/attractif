<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event_user_model extends CI_Model
{
    protected $table = 'event_user';

    /**
     *  Ajoute un event_user
     */
    public function add($status, $customer, $event)
    {
        //  Ces données seront automatiquement échappées

        if ($this->all_by_user($customer, $event) == NULL)
        {
            return $this->db
                ->set('status',  $status)
                ->set('user',   $customer)
                ->set('event', $event)
                ->insert($this->table);
            ;
        }
        else
        {
            return 0;
        }

        //  Une fois que tous les champs ont bien été définis, on "insert" le tout
        // return $this->db->insert($this->table);
    }

    /**
     *  Édite une event_user déjà existante
     */
    public function edit($status, $customer, $event)
    {
        //  La condition
        return $this->db
            ->set('status', (int) $status)
            ->where('user',   (int) $customer)
            ->where('event', (int) $event)
            ->update($this->table);

    }

    /**
     *  Supprime une event_user
     */
    public function del($user, $event)
    {
        return $this->db
            ->where('user', (int) $user)
            ->where('event', (int) $event)
            ->delete($this->table);
    }

    /**
     *  Retourne le nombre de event_user
     */
    public function count($where = array())
    {
        return (int) $this->db->where($where)
                      ->count_all_results($this->table);
    }

    /**
     *  Retourne une liste de event_user
     */
    public function one($id)
    {
        return $this->db->select('*')
                ->from($this->table)
                ->where('id', (int) $id)
                ->get()
                ->result();
    }
    public function one_by_event($id)
    {
        return $this->db->select('*')
                ->from($this->table)
                ->join('user', 'event_user.user = user.id', 'left')
                ->group_by('event_user.id')
                ->having('event', (int) $id)
                ->get()
                ->result();
    }
    /**
     *  Retourne une liste de event_user
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

    public function one_by_event2($id)
    {
        return $this->db->select('*')
            ->from($this->table)
            ->join('user', 'event_user.user = user.id')
            ->group_by('event_user.id')
            ->having('event', (int) $id)
            ->where('user.admin','0')
            ->get()
            ->result();
    }


    public function all_by_user($user, $event)
    {
        return $this->db->select('*')
                ->from($this->table)
                ->where('user', (int) $user)
                ->where('event', (int) $event)
                ->order_by('id', 'desc')
                ->get()
                ->result();
    }

}
/* End of file event_user_model.php */
/* Location: ./application/models/event_user_model.php */
