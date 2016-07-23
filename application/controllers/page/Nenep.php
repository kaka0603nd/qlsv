<?php
    class Nenep extends CI_Controller{
        public $CI;
        public $id;
        
        function __construct(){
            parent::__construct();
            $this->load->model('Nenep_model');
            $this->load->library('session');
        }
        
        public function index(){
            $result = $this->Nenep_model->get_nenep();
            $data['nenep'] = $result;
            if($this->session->has_userdata('level')){
                if($this->session->userdata('level') == 1){
                    $this->loadview('page/nenep/form_nenep',$data);
                }
                else{
                    $this->loadview_user('page/nenep/form_nenep',$data);
                }
            }
            else{
                return redirect(base_url().'page/login');
            }
            
        }
        
        public function chitiet($id =null){
            $result = $this->Nenep_model->get_chitiet_nenep($id);
            if($this->session->has_userdata('level')){
                if($this->session->userdata('level') == 1){
                    $this->loadview('page/nenep/form_chitiet',$result);
                }
                else{
                    $this->loadview_user('page/nenep/form_chitiet',$result);
                }
            }
            else{
                return redirect(base_url().'page/login');
            }
            
        }
        
        public function update($id = null){
            $result = $this->Nenep_model->get_chitiet_nenep($id);
            //var_dump($result);
            if($this->session->has_userdata('level')){
                if($this->session->userdata('level') == 1){
                    $this->loadview('page/nenep/edit',$result);
                }
                else{
                    $this->loadview_user('page/nenep/edit',$result);
                }
            }
            else{
                return redirect(base_url().'page/login');
            }
            
        }
        
        public function action_edit($id = null){
            $masinhvien = $this->input->post('masinhvien');
            $hinhthucvipham = $this->input->post('hinhthucvipham');
            $kiluat = $this->input->post('kiluat');
            $ghichu = $this->input->post('ghichu');
            $nguoidang = 1;
            //$ngaydang = date('Y-m-d');
            $this->load->model('Sinhvien_model');
            if(!$this->Sinhvien_model->check_masinhvien($masinhvien)){
                echo 'Mã sinh viên không tồn tại';
                return;
            }
            
            $this->load->model('Nenep_model');
            //$masinhvien = $this->Nenep_model->get_masinhvien($masinhvien);
            $data = array(
                
                'hinhthucvipham' => $hinhthucvipham,
                'kiluat' => $kiluat,
                'ghichu' => $ghichu,
                'nguoidang' => $nguoidang,
                //'create_at' => $ngaydang,
            );
            if($this->Nenep_model->update_nenep($id,$data)){
                //echo 'Update ok ';
                redirect(base_url().'page/nenep/');
            }
        }
        
        public function delete_nenep($nenep_id = null){
            if($this->Nenep_model->delete_nenep($nenep_id)){
                echo 'Delete ok';
                redirect(base_url().'page/nenep/');
            }
            else{
                echo 'Have an erro';
                redirect(base_url().'page/nenep/');
            }
        }
        
        public function form_add(){
            
            $level = $this->session->userdata('level');
            if($level == 1){
                $this->load->model('Sinhvien_model');
                $result = $this->Sinhvien_model->get_all_sv();
                $data['sinhvien'] = $result;
                $this->loadview('page/nenep/form_add',$data);
            }else{
                if($level == 2){
                    $this->load->model('Lophoc_model');
                    $result = $this->Lophoc_model->show_sinhvien_cunglop($this->session->userdata('madangnhap'));
                    $data['sinhvien'] = $result;
                    $this->loadview_user('page/nenep/form_add',$data);
                }
            }
            
            
        }
        
        public function insert_nenep(){
            $masinhvien = $this->input->post('masinhvien');
            $hinhthucvipham = $this->input->post('hinhthucvipham');
            $kiluat = $this->input->post('kiluat');
            $ghichu = $this->input->post('ghichu');
            $nguoidang = 1;
            $ngaydang = date('Y-m-d');
            $this->load->model('Sinhvien_model');
            if(!$this->Sinhvien_model->check_masinhvien($masinhvien)){
                echo 'Mã sinh viên không tồn tại';
                return;
            }
            
            $this->load->model('Nenep_model');
            //$masinhvien = $this->Nenep_model->get_masinhvien($masinhvien);
            $data = array(
                'user_id' => $masinhvien,
                'hinhthucvipham' => $hinhthucvipham,
                'kiluat' => $kiluat,
                'ghichu' => $ghichu,
                'nguoidang' => $nguoidang,
                'create_at' => $ngaydang,
            );
            if($this->Nenep_model->set_nenep($data)){
                echo 'Them success';
                redirect(base_url().'page/nenep/');
            }
        }
        
        public function get_masinhvien($masinhvien = null){
            return $this->Nenep_model->get_masinhvien($masinhvien);
        }
        
        public function user_nenep(){
            $result = $this->Nenep_model->get_nenep();
            $data['nenep'] = $result;
            $this->loadview_user('page/nenep/user',$data);
        }
        
        public function loadview($url = null,$data = null){
            if(empty($url)){
                $url = 'errors/html/error_404';
            }
            $datas = array('url' =>$url,'data'=> $data);
            $this->load->view('page/main',$datas);
        }
        
        public function loadview_user($url = null,$data = null){
            if(empty($url)){
                $url = 'errors/html/error_404';
            }
            $datas = array('url' =>$url,'data'=> $data);
            $this->load->view('page/user_main',$datas);
        }
    }
?>