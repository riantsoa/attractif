<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends CI_Model
{
    protected $table = 'category';

    /**
     *  Ajoute un category
     */
    public function add($name)
    {
        //  Ces données seront automatiquement échappées
        $date = time();
        return $this->db
            ->set('name',  $name)
            ->insert($this->table);
        ;

        //  Une fois que tous les champs ont bien été définis, on "insert" le tout
        // return $this->db->insert($this->table);
    }

    /**
     *  Édite une category déjà existante
     */
    public function edit($id, $name)
    {
        if($name != null)
        {
            $this->db->set('name', $name);
        }
        //  La condition
        $this->db->where('id', (int) $id);

        return $this->db->update($this->table);
    }

    /**
     *  Supprime une category
     */
    public function del($id)
    {
        return $this->db->where('id', (int) $id)
                ->delete($this->table);
    }

    /**
     *  Retourne le nombre de category
     */
    public function count($where = array())
    {
        return (int) $this->db->where($where)
                      ->count_all_results($this->table);
    }

    /**
     *  Retourne une liste de category
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
     *  Retourne une liste de category
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


/* End of file category_model.php */
/* Location: ./application/models/category_model.php */
/* Location: ./application/models/category_model.php */
