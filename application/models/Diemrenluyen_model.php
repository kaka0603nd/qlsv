<?php
    class Diemrenluyen_model extends CI_Model{
        function __construct(){
            parent::__construct();
            $this->load->database();
        }
        function show_alls($sotrang = null,$trangcanlay = null){
            
            $this->db->select();
            $this->db->limit($sotrang,$trangcanlay);
            $query = $this->db->get('diemrenluyen');
            return $query->result_array();
        }
        function check_masinhvien($masinhvien){
            $this->db->where('masinhvien',$masinhvien);
            $query = $this->db->get('diemrenluyen');
            if($query->num_rows()>0){
                return true;
            }
            else{
                return false;
            }
        }
        
        function update_diem($masinhvien,$data){
            $this->db->where('masinhvien',$masinhvien);
            return $this->db->update('diemrenluyen',$data);
        }
        
        function get_diem_masinhvien($masinhvien){
            $this->db->where('masinhvien',$masinhvien);
            $query = $this->db->get('diemrenluyen');
            return $query->row_array(0);
        }
        
        function count_diem(){
            $query = $this->db->get('sinhvien');
            return $query->num_rows();
        }
    }
?>