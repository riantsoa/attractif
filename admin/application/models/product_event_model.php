<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_event_model extends CI_Model
{
    protected $table = 'product_event';

    /**
     *  Ajoute un product_event
     */
    public function add($product, $event)
    {
        //  Ces données seront automatiquement échappées
        $date = time();
        return $this->db
            ->set('product',  $product)
            ->set('event',   $event)
            ->insert($this->table);
        ;

        //  Une fois que tous les champs ont bien été définis, on "insert" le tout
        // return $this->db->insert($this->table);
    }

    /**
     *  Édite une product_event déjà existante
     */
    public function edit($id, $product, $event)
    {
        if($product != null)
        {
            $this->db->set('product', $product);
        }
        if($event != null)
        {
            $this->db->set('event', $event);
        }
        //  La condition
        $this->db->where('id', (int) $id);

        return $this->db->update($this->table);
    }

    /**
     *  Supprime une product_event
     */
    public function del($id)
    {
        return $this->db->where('id', (int) $id)
                ->delete($this->table);
    }

    /**
     *  Retourne le nombre de product_event
     */
    public function count($where = array())
    {
        return (int) $this->db->where($where)
                      ->count_all_results($this->table);
    }

    /**
     *  Retourne une liste de product_event
     */
    public function one($id)
    {
        return $this->db->select('*')
                ->from($this->table)
                ->join('product', 'product_event.product = product.id', 'left')
                ->group_by('product_event.id')
                ->having('event', (int) $id)
                ->get()
                ->result();
    }
    /**
     *  Retourne une liste de product_event
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


/* End of file product_event_model.php */
/* Location: ./application/models/product_event_model.php */
