<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event_user_model extends CI_Model
{
    protected $table = 'event_user';

    /**
     *  Ajoute un event_user
     */
    public function add($status, $customer, $event, $date)
    {
        //  Ces données seront automatiquement échappées
        $status = time();
        return $this->db
            ->set('status',  $status)
            ->set('place',   $place)
            ->set('event', $event)
            ->set('date', $date)
            ->insert($this->table);
        ;

        //  Une fois que tous les champs ont bien été définis, on "insert" le tout
        // return $this->db->insert($this->table);
    }

    /**
     *  Édite une event_user déjà existante
     */
    public function edit($id, $status, $customer, $event, $date)
    {
        $status = time();
        if($status != null)
        {
            $this->db->set('status', $status);
        }
        if($place != null)
        {
            $this->db->set('place', $place);
        }
        if($event != null)
        {
            $this->db->set('event', $event);
        }
        if($date != null)
        {
            $this->db->set('date', $date);
        }
        //  La condition
        $this->db->where('id', (int) $id);

        return $this->db->upstatus($this->table);
    }

    /**
     *  Supprime une event_user
     */
    public function del($id)
    {
        return $this->db->where('id', (int) $id)
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
}


/* End of file event_user_model.php */
/* Location: ./application/models/event_user_model.php */
