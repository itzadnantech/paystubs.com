<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require __DIR__.'/proxy/class.IP2Proxy.php';

class Proxy {
    
    public function __construct() {
        $this->db = new \IP2Proxy\Database();
        $this->db->open(__DIR__.'/proxy/IP2PROXY-LITE-PX4.BIN', \IP2Proxy\Database::FILE_IO);
    }
    
    function getAll($ip_address) {
        return $this->db->getAll($ip_address);
    }
    
    function getCountryCode($ip_address) {
        return $this->db->getCountryShort($ip_address);
    }
    
    function getCountryName($ip_address) {
        return $this->db->getCountryLong($ip_address);
    }
    
    function getRegion($ip_address) {
        return $this->db->getRegion($ip_address);
    }
    
    function getCity($ip_address) {
        return $this->db->getCity($ip_address);
    }
    
    function getISP($ip_address) {
        return $this->db->getISP($ip_address);
    }
    
    function getProxyType($ip_address) {
        return $this->db->getProxyType($ip_address);
    }
    
    function isProxy($ip_address) {
        return $this->db->isProxy($ip_address);
    }

}
