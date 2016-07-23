<?php
    class User_model extends CI_Model{
        function __construct(){
            parent::__construct();
            $this->load->database();
        }
        
        function insert_user($data){
            return $this->db->insert('user',$data);
            
        }
        
        function add_level($masinhvien,$level = null){
            if(empty($level)){
                $this->db->where('madangnhap',$masinhvien);
                $data = array('level'=>'2');
                return $this->db->update('user',$data);
            }
            else{
                $this->db->where('madangnhap',$masinhvien);
                $data = array('level'=>$level);
                return $this->db->update('user',$data);
            }
        }
        
        function delete_level_sv($masinhvien){
            $sql = "select *
                    from sinhvien
                    where sinhvien.malop = (select sinhvien.malop from sinhvien where sinhvien.masinhvien = '".$masinhvien."')";
            $query = $this->db->query($sql);
            $result = $query->result_array();
            if($query->num_rows() > 0){
                foreach($result as $key => $row){
                    $this->add_level($row['masinhvien'],3);
                }
            }
        }
        
        
    }
?>