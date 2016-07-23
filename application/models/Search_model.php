<?php
    class Search_model extends CI_Model{
        function __construct(){
            parent::__construct();
            $this->load->database();
        }
        
        public function get_search_auto($key,$limit =null){
            
            $this->db->like('tensinhvien',$key,'both');
            $this->db->or_like('masinhvien',$key);
            //$this->db->where(array('show_or_hide' => 1,'trangthai' => 1));
            //$this->db->order_by('view','desc');
            if(!empty($limit)){
                $this->db->limit($limit['recond'],$limit['start']);
            }
            
            $result = $this->db->get('sinhvien');
            return $result->result_array();
            
        }
        
        
        
        
    }
?>