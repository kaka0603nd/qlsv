<?php
    class Chinhsach_model extends CI_Model{
        function __construct(){
            parent::__construct();
            $this->load->database();
        }
        
        function set_chinhsach($data){
            return $this->db->insert('sinhvien_chinhsach',$data);
        }
        
        function get_all(){
            $this->db->select();
            $result = $this->db->get('chinhsach');
            return $result->result_array();
        }
        
        
        
        function get_chinhsach($id){
            
        }
    }
?>