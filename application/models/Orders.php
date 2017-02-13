<?php

class Orders extends CI_Model{
    public $ord_id;
    public $abh_id;
    public $ord_amount;
    public $cl_id;
    public $ord_total;
    public $ord_created;
    
        
    private $table;
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database();
                $this->table="orders";
        }
        
        public function insert_entry() {
            $ret = $this->db->insert($this->table, $this);
            return $ret;
        }
        
         public function AOrder($id) {
            $this->db->select();
            $this->db->from($this->table);

            $this->db->where('ord_id', $id);
            $query = $this->db->get();


            $qy = $query->result();
            foreach ($qy as $row) {
                $toreturn = array(
                    'amount' => $row->cl_comp,
                    'total' => $row->ord_total,
                    'client' => $row->cl_id,
                    'id' => $row->ord_id,
                    'header' => $row->abh_id,
                    'created' => $row->ord_created,
                );
            }

            return $toreturn;
        }
        public function OrderByClient($cl_id) {
            $this->db->select();
            $this->db->from($this->table);

            $this->db->where('cl_id', $id);
            $query = $this->db->get();


            $qy = $query->result();
            foreach ($qy as $row) {
                $toreturn[] = array(
                    'amount' => $row->cl_comp,
                    'total' => $row->ord_total,
                    'client' => $row->cl_id,
                    'id' => $row->ord_id,
                    'header' => $row->abh_id,
                    'created' => $row->ord_created,
                );
            }

            return $toreturn;
        }
        public function AllOrders() {
            $this->db->select();
            $this->db->from($this->table);

//            $this->db->where('cl_id', $id);
            $query = $this->db->get();


            $qy = $query->result();
            foreach ($qy as $row) {
                $toreturn[] = array(
                    'amount' => $row->cl_comp,
                    'total' => $row->ord_total,
                    'client' => $row->cl_id,
                    'id' => $row->ord_id,
                    'header' => $row->abh_id,
                    'created' => $row->ord_created,
                );
            }

            return $toreturn;
        }
        public function OrderByHeader($abh_id) {
            $this->db->select();
            $this->db->from($this->table);

            $this->db->where('abh_id', $abh_id);
            $query = $this->db->get();


            $qy = $query->result();
            foreach ($qy as $row) {
                $toreturn[] = array(
                    'amount' => $row->cl_comp,
                    'total' => $row->ord_total,
                    'client' => $row->cl_id,
                    'id' => $row->ord_id,
                    'header' => $row->abh_id,
                    'created' => $row->ord_created,
                );
            }

            return $toreturn;
        }
        public function UpdateTotal($total) {
            
        }
        
        
}
