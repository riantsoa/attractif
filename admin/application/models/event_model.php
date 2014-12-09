<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event_model extends CI_Model
{
    protected $table = 'event';

    /**
     *  Ajoute un event
     */
    public function add($date, $place, $descript, $name, $category)
    {
        //  Ces données seront automatiquement échappées
        $date = time();
        return $this->db
            ->set('date',  $date)
            ->set('place',   $place)
            ->set('descript', $descript)
            ->set('name', $name)
            ->set('category', $category)
            ->insert($this->table);
        ;

        //  Une fois que tous les champs ont bien été définis, on "insert" le tout
        // return $this->db->insert($this->table);
    }

    /**
     *  Édite une event déjà existante
     */
    public function edit($id, $date = null, $place = null, $descript = null, $name = null, $category = null, $admin = null)
    {
        $date = time();
        if($date != null)
        {
            $this->db->set('date', $date);
        }
        if($place != null)
        {
            $this->db->set('place', $place);
        }
        if($descript != null)
        {
            $this->db->set('descript', $descript);
        }
        if($name != null)
        {
            $this->db->set('name', $name);
        }
        if($category != null)
        {
            $this->db->set('category', $category);
        }
        //  La condition
        $this->db->where('id', (int) $id);

        return $this->db->update($this->table);
    }

    /**
     *  Supprime une event
     */
    public function del($id)
    {
        return $this->db->where('id', (int) $id)
                ->delete($this->table);
    }

    /**
     *  Retourne le nombre de event
     */
    public function count($where = array())
    {
        return (int) $this->db->where($where)
                      ->count_all_results($this->table);
    }

    /**
     *  Retourne une liste de event
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
     *  Retourne une liste de event
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


/* End of file event_model.php */
/* Location: ./application/models/event_model.php */
