<?php

class Mypaystub_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->table = 'my_paystubs';

        $this->dateFormat = date("Y-m-d H:i:s");
    }

    public function addMypaystub($pdfName, $userId) {
        $data = ['pdf_name' => $pdfName
            , 'user_id' => $userId];
        $insert = $this->db->insert($this->table, $data);
        $data['users_subscription_id'] = $this->db->insert_id();
    }

    public function getMypaystub($userId) {
        $this->db->select("$this->table.*");
        $this->db->where('user_id', $userId);
        $this->db->order_by('id', 'DESC');
        $result = $this->db->get($this->table);
        if ($result) {
            if ($result->num_rows() > 0) {
                $data = $result->result();
            } else {
                $data = FALSE;
            }
        }
        return $data;
    }

    public function getMypaystubSingleNamebyId($userId, $pdfId) {
        $this->db->select("$this->table.*");
        $this->db->where('user_id', $userId);
        $this->db->where('id', $pdfId);
        $this->db->order_by('id', 'DESC');
        $result = $this->db->get($this->table);

        if ($result) {
            if ($result->num_rows() > 0) {
                $data = $result->result();
            } else {
                $data = FALSE;
            }
        }

        return $data;
    }

    public function deleteMypaystub($userId, $pdfId) {
        //$this->db->delete("$this->table.*");
        $success = false;
        $data = $this->getMypaystubSingleNamebyId($userId, $pdfId);
        if ($data) {
            $pdf_name = $data[0]->pdf_name;

            if (file_exists(FCPATH . "assets/files/$pdf_name")) {
                unlink(FCPATH . "assets/files/$pdf_name");
                $this->db->where('user_id', $userId);
                $this->db->where('id', $pdfId);
                $result = $this->db->delete($this->table);
                $success = true;
            }
        }
        echo json_encode($success);
    }
    
    public function deleteMypaystubonView($userId, $pdfId) {
        //$this->db->delete("$this->table.*");
        $success = false;
        $data = $this->getMypaystubSingleNamebyId($userId, $pdfId);
      
        if ($data) {
            $pdf_name = $data[0]->pdf_name;

            if (file_exists(FCPATH . "assets/files/$pdf_name")) {
                unlink(FCPATH . "assets/files/$pdf_name");
                $this->db->where('user_id', $userId);
                $this->db->where('id', $pdfId);
                $result = $this->db->delete($this->table);
                $success = true;
            }
        }
    
    }

}
