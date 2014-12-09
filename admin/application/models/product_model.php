<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model
{
    protected $table = 'product';

    /**
     *  Ajoute un product
     */
    public function add($name, $quantity, $category, $descript , $image)
    {
        //  Ces données seront automatiquement échappées
        return $this->db
            ->set('name',  $name)
            ->set('quantity',   $quantity)
            ->set('category', $category)
            ->set('descript', $descript)
            ->set('image', $image)
            ->insert($this->table);
        ;

        //  Une fois que tous les champs ont bien été définis, on "insert" le tout
        // return $this->db->insert($this->table);
    }

    /**
     *  Édite une product déjà existante
     */
    public function edit($id, $name = null, $quantity = null, $category = null, $descript = null, $image = null)
    {
        if($name != null)
        {
            $this->db->set('name', $name);
        }
        if($quantity != null)
        {
            $this->db->set('quantity', $quantity);
        }
        if($category != null)
        {
            $this->db->set('category', $category);
        }
        if($descript != null)
        {
            $this->db->set('descript', $descript);
        }
        if($image != null)
        {
            $this->db->set('image', $image);
        }
        //  La condition
        $this->db->where('id', (int) $id);

        return $this->db->update($this->table);
    }

    /**
     *  Supprime une product
     */
    public function del($id)
    {
        return $this->db->where('id', (int) $id)
                ->delete($this->table);
    }

    /**
     *  Retourne le nombre de product
     */
    public function count($where = array())
    {
        return (int) $this->db->where($where)
                      ->count_all_results($this->table);
    }

    /**
     *  Retourne une liste de product
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
     *  Retourne une liste de product
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


/* End of file product_model.php */
/* Location: ./application/models/product_model.php */
