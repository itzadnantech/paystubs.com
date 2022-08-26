<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Payments extends CI_Model{
	
        public function __construct() {
            parent::__construct();
            $this->table = 'payments';
        }
        
        //insert transaction data
	public function insertTransaction($data = array()){
                $dateFormat = date("Y-m-d H:i:s");
                $data['created'] = $dateFormat;
		$insert = $this->db->insert($this->table,$data);
		return $insert?true:false;
	}
}
