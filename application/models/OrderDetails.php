<?php

class OrderDetails extends CI_Model {

    public $ord_id;
    public $abh_id;
//    public $phone;
    public $phone;
    public $network;
    public $det_status;
    public $det_created;
    public $det_id;
    public $cl_id;
    private $table;

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->database();
        $this->table = "orderdetails";
    }

    public function insert_entry() {
        $in = $this->db->insert($this->table, $this);
        if ($in) {
            $ord_det = $this->GetID($this->ord_id, $this->cl_id, $this->phone);
            if (is_array($ord_det)) {
                return $ord_det;
            }
        }

        return FALSE;
    }

    public function GetID($ord_id, $cl_id, $phone) {
        $this->db->select();
        $this->db->from($this->table);

        $this->db->where('cl_id', $cl_id);
        $this->db->where('ord_id', $ord_id);
        $this->db->where('phone', $phone);
        $query = $this->db->get();


        $qy = $query->result();
        foreach ($qy as $row) {
            $toreturn = array(
                'amount' => $row->amount,
//                    'total' => $row->ord_total,
                'client' => $row->cl_id,
                'id' => $row->det_id,
                'header' => $row->abh_id,
                'network' => $row->network,
                'phone' => $row->phone,
                'status' => $row->det_status,
                'created' => $row->det_created,
                'order' => $row->ord_id,
            );
        }

        return $toreturn;
    }

    public function UpdateStatus($det_id, $status) {
        $data = array(
            'det_status'=>$status
        );
        
        $this->db->where('det_id',$det_id);
        $ret = $this->db->update($this->table, $data);
        return $ret;
    }
    
    public function OrderDetailsByOrder($ord_id,$cl_id) {
        $this->db->select();
        $this->db->from($this->table);

        $this->db->where('cl_id', $cl_id);
        $this->db->where('ord_id', $ord_id);
        
        $query = $this->db->get();


        $qy = $query->result();
        foreach ($qy as $row) {
            $toreturn[] = array(
                'amount' => $row->amount,
//                    'total' => $row->ord_total,
                'client' => $row->cl_id,
                'id' => $row->det_id,
                'header' => $row->abh_id,
                'network' => $row->network,
                'phone' => $row->phone,
                'status' => $row->det_status,
                'created' => $row->det_created,
                'order' => $row->ord_id,
            );
        }

        return $toreturn;
    }

}
