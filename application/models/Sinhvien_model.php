<?php
    class Sinhvien_model extends CI_Model{
        function __construct(){
            parent::__construct();
            $this->load->database();
        }
        function show_alls($sotrang = null,$trangcanlay = null,$malop = null){
            
            $this->db->select();
            if(!empty($malop)){
                $this->db->where('malop',$malop);
            }
            if(!empty($sotrang) && !empty($trangcanlay)){
                $this->db->limit($sotrang,$trangcanlay);
            }
            $this->db->limit($sotrang,$trangcanlay);
            $query = $this->db->get('sinhvien');
            return $query->result_array();
        }
        
        function get_all_sv(){
            $this->db->select();
            $this->db->order_by('tensinhvien','asc');
            $query = $this->db->get('sinhvien');
            $result = $query->result_array();
            return $result;
        }
        
        function get_sv_lophoc($malop = null){
            $this->db->select('sinhvien.masinhvien as masinhvien,sinhvien.tensinhvien as tensinhvien, sinhvien.ngaysinh as ngaysinh, sinhvien.malop as malop,sinhvien.gioitinh as gioitinh,hokhau,diachi,madantoc,tongiao');
            if(!empty($malop)){
                $this->db->where('malop',$malop);
            }
            $query = $this->db->get('sinhvien');
            return $query->result_array();
        }
        
        function check_masinhvien($masinhvien){
            $this->db->where('masinhvien',$masinhvien);
            $query = $this->db->get('sinhvien');
            if($query->num_rows()>0){
                return true;
            }
            else{
                return false;
            }
        }
        
        function check_id($masinhvien){
            $this->db->where('masinhvien',$masinhvien);
            $query = $this->db->get('sinhvien');
            if($query->num_rows()>0){
                $result = $query->row_array(0);
                return $result['id'];
            }
            else{
                return false;
            }
        }
        
        function show_sv_lophoc($id){
            $this->db->select('lophoc.malop as malop, lophoc.tenlop as tenlop,lophoc.tong as tong,lophoc.chunghiem as chunghiem');
            $this->db->from('sinhvien');
            $this->db->join('lophoc','sinhvien.malop = lophoc.id');
            $this->db->where('sinhvien.id',$id);
            $query = $this->db->get();
            return $query->row_array(0);
        }
        
        
        
        function show_sv_nenep($id){
            $this->db->select('nenep.*');
            $this->db->from('sinhvien');
            $this->db->join('nenep','sinhvien.masinhvien = nenep.user_id');
            $this->db->where('sinhvien.id',$id);
            $query = $this->db->get();
            return $query->result_array();
        }
        
        function show_by_id($id){
            $this->db->where('id',$id);
            $query = $this->db->get('sinhvien');
            return $query->row_array(0);
        }
        function show_sv_diem($id){
            $this->db->select('diemrenluyen.*');
            $this->db->from('sinhvien');
            $this->db->join('diemrenluyen','sinhvien.masinhvien = diemrenluyen.masinhvien');
            $this->db->where('sinhvien.id',$id);
            $query = $this->db->get();
            return $query->row_array(0);
        }
        function show_sv_msv($masinhvien){
            $this->db->select();
            $this->db->where('masinhvien',$masinhvien);
            $query = $this->db->get('sinhvien');
            $result = $query->row_array(0);
            $id = $result['id'];
            return $id;
        }
        
        /*function show_sv_lophoc($masinhvien){
            $this->db->select();
            $this->db->where('masinhvien',$masinhvien);
            $query = $this->db->get('sinhvien');
            $result = $query->row_array(0);
            $id = $result['id'];
            return $id;
        }
        */
        
        function show_sv_chinhsach($id){
            $this->db->select('chinhsach.*');
            $this->db->from('sinhvien_chinhsach');
            $this->db->join('sinhvien','sinhvien_chinhsach.sinhvien_masinhvien = sinhvien.masinhvien');
            $this->db->join('chinhsach','sinhvien_chinhsach.chinhsach_id = chinhsach.id');
            $this->db->where('sinhvien.id',$id);
            $query = $this->db->get();
            return $query->result_array();
        }
        function insert_sinhvien($data){
            $this->db->insert('diemrenluyen',array('masinhvien' => $data['masinhvien']));
            return $this->db->insert('sinhvien',$data);
            
        }
        
        function delete_sv($id){
            //$this->db->where('id',$id);
            $where = array('id' => $id);
            $this->db->delete('sinhvien',array('id' => $id));
            $this->db->delete('nenep',array('user_id' => $id));
            $this->db->delete('sinhvien_chinhsach',array('sinhvien_id'=>$id));
            $result = $this->show_by_id($id);
            $msv = $result['masinhvien'];
            $this->db->delete('diemrenluyen',array('masinhvien' => $msv));
        }
        
        function update_sv($id,$data){
            $this->db->where('id',$id);
            return $this->db->update('sinhvien',$data);
        }
        
        function count_sinhvien($malop = null){
            if(!empty($malop)){
                $this->db->where('malop',$malop);
            }
            $query = $this->db->get('sinhvien');
            return $query->num_rows();
        }
        
        
    }
?>