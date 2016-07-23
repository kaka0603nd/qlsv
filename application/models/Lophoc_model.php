<?php
    class Lophoc_model extends CI_Model{
        function __construct(){
            parent::__construct();
            $this->load->database();
        }
        function show_alls(){
            $this->db->select();
            $query = $this->db->get('lophoc');
            return $query->result_array();
        }
        
        function dem_sosv($malop){
            $this->db->select();
            $this->db->where(array('malop' => $malop));
            $query = $this->db->get('sinhvien');
            return $query->num_rows();
        }
        
        function show_sv_malop($malop){
            $this->db->select();
            $this->db->where(array('malop' => $malop));
            $query = $this->db->get('sinhvien');
            return $query->result_array();
        }
        
        function add_lophoc($data = null){
            return $this->db->insert('lophoc',$data);
        }
        
        function get_lophoc_id($id){
            $this->db->where('id',$id);
            $query = $this->db->get('lophoc');
            $result = $query->row_array(0);
            return $result;
        }
        
        function update_lophoc($id,$data){
            $this->db->where('id',$id);
            return $this->db->update('lophoc',$data);
        }
        
        function delete_lophoc($id =null,$full = null){
            $sql1 = "delete from nenep where user_id in (select masinhvien from sinhvien where sinhvien.malop = $id)";
            $sql2 = "delete from diemrenluyen where masinhvien in (select masinhvien from sinhvien where sinhvien.malop = $id)";
            $sql3 = "delete from sinhvien where malop = $id";
            $sql4 = "delete from lophoc where id = $id";
            if(!empty($full)){
                $arr = array($sql1,$sql2,$sql3,$sql4);
            }
            else{
                $arr = array($sql1,$sql2,$sql3);
            }
            foreach($arr as $row){
                if(!$this->db->query($row)){
                    echo $row.'<br/>';
                    return false;
                }
            }
            return true;
        }
        
        function show_sinhvien_cunglop($masinhvien){
            $sql = "select *
                    from sinhvien
                    where sinhvien.malop = (select sinhvien.malop from sinhvien where sinhvien.masinhvien = '".$masinhvien."')";
            $query = $this->db->query($sql);
            return $query->result_array();
        }
        
        function count_lophoc(){
            $query = $this->db->get('sinhvien');
            return $query->num_rows();
        }
        
    }
?>