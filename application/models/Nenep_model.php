<?php
    class Nenep_model extends CI_Model{
        function __construct(){
            parent::__construct();
            $this->load->database();
        }
        
        function get_nenep(){
            $level = $this->session->userdata('level');
            if($level == 1){
                $this->db->select('sinhvien.id as sinhvien_id,sinhvien.masinhvien as masinhvien,sinhvien.tensinhvien as tensinhvien,nenep.hinhthucvipham as vipham, nenep.kiluat as kiluat,nenep.create_at as nenep_create_at,nenep.id as nenep_id');
                $this->db->order_by('create_at','desc');
                $this->db->from('nenep');
                $this->db->join('sinhvien','nenep.user_id = sinhvien.masinhvien');
                $query = $this->db->get();
                $result = $query->result_array();
                return $result;
            }else{
                $malop = $this->get_lophoc($this->session->userdata('madangnhap'));
                
                $this->db->select('sinhvien.id as sinhvien_id,sinhvien.masinhvien as masinhvien,sinhvien.tensinhvien as tensinhvien,nenep.hinhthucvipham as vipham, nenep.kiluat as kiluat,nenep.create_at as nenep_create_at,nenep.id as nenep_id');
                $this->db->where('sinhvien.malop',$malop);
                $this->db->order_by('create_at','desc');
                $this->db->from('nenep');
                $this->db->join('sinhvien','nenep.user_id = sinhvien.masinhvien');
                $query = $this->db->get();
                $result = $query->result_array();
                return $result;
            }
            
        }
        
        function get_chitiet_nenep($id){
            $this->db->select('sinhvien.id as sinhvien_id ,sinhvien.hinhanh as sinhvien_hinhanh,nenep.id as nenep_id,nenep.ghichu as nenep_ghichu ,sinhvien.*,nenep.*,lophoc.*');
            $this->db->where('nenep.id',$id);
            $this->db->from('sinhvien');
            $this->db->join('nenep','nenep.user_id = sinhvien.masinhvien');
            $this->db->join('lophoc','sinhvien.malop = lophoc.id');
            $query = $this->db->get();
            $result = $query->row_array(0);
            return $result;
        }
        
        function set_nenep($data){
            return $this->db->insert('nenep',$data);
        }
        
        function update_nenep($id,$data){
            $this->db->where('id',$id);
            return $this->db->update('nenep',$data);
        }
        
        function delete_nenep($id){
            $this->db->where('id',$id);
            return $this->db->delete('nenep');
        }
        
        function get_by_id($id){
            $this->db->select();
            $this->db->where('id',$id);
            $query = $this->db->get('nenep');
            $result = $query->result_array();
            return $result;
        }
        
        public function get_masinhvien($masinhvien){
            $this->db->select('');
            $this->db->where('masinhvien',$masinhvien);
            $query = $this->db->get('sinhvien');
            $result = $query->row_array(0);
            return $result['id'];
        }
        
        function get_search(){
            
        }
        
        function get_lophoc($masinhvien){
            $this->db->where('masinhvien',$masinhvien);
            $result1 = $this->db->get('sinhvien');
            $result = $result1->row_array(0);
            return $result['malop'];
        }
        
        function get_nenep_user($user_id){
            $this->db->select();
            $this->db->where('user_id',$user_id);
            $query = $this->db->get('nenep');
            $result = $query->result_array();
            return $result;
        }
    }
?>