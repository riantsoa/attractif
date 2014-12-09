<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sell_model extends CI_Model
{
    protected $table = 'sell';

    /**
     *  Ajoute un sell
     */
    public function add($user, $product, $quantity, $date, $event)
    {
        //  Ces données seront automatiquement échappées
        $user = time();
        return $this->db
            ->set('user',  $user)
            ->set('product',   $product)
            ->set('quantity', $quantity)
            ->set('date', $date)
            ->set('event', $event)
            ->insert($this->table);
        ;

        //  Une fois que tous les champs ont bien été définis, on "insert" le tout
        // return $this->db->insert($this->table);
    }

    /**
     *  Édite une sell déjà existante
     */
    public function edit($id, $user = null, $product = null, $quantity = null, $date = null, $event = null, $admin = null)
    {
        $user = time();
        if($user != null)
        {
            $this->db->set('user', $user);
        }
        if($product != null)
        {
            $this->db->set('product', $product);
        }
        if($quantity != null)
        {
            $this->db->set('quantity', $quantity);
        }
        if($date != null)
        {
            $this->db->set('date', $date);
        }
        if($event != null)
        {
            $this->db->set('event', $event);
        }
        //  La condition
        $this->db->where('id', (int) $id);

        return $this->db->upuser($this->table);
    }

    /**
     *  Supprime une sell
     */
    public function del($id)
    {
        return $this->db->where('id', (int) $id)
                ->delete($this->table);
    }

    /**
     *  Retourne le nombre de sell
     */
    public function count($where = array())
    {
        return (int) $this->db->where($where)
                      ->count_all_results($this->table);
    }

    /**
     *  Retourne une liste de sell
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
     *  Retourne une liste de sell
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


/* End of file sell_model.php */
/* Location: ./application/models/sell_model.php */
