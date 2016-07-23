<?php
    class Diemrenluyen extends CI_Controller{
        public $CI = null;
        public $masinhvien ;
        public $tensinhvien ;
        public $malop;
        public $diemrenluyen;
        public $xeploai;
        
        function __construct(){
            parent::__construct();
            $this->load->model('Diemrenluyen_model');
            
            $this->CI = & get_instance();
            //$this->load->helpers('url');
        }
        function index(){
            $total = $this->Diemrenluyen_model->count_diem();
            $recond = 2;
            $this->CI->load->library('Functions');
            
            $result = $this->CI->functions->pagination_page('page/diemrenluyen/index/',$total,$recond,4,true);
            $data['data'] = $this->Diemrenluyen_model->show_alls(2,$result['get_index']);
            
            $data['paginations'] = $result['pagination_pages'];
            //var_dump($data);
            $this->loadview('page/diemrenluyen/form_diemsv',$data);
            
        }
        
        function diemrenluyen_my(){
            $this->masinhvien = $this->session->userdata('madangnhap');
            //echo $this->masinhvien;
            $data = $this->Diemrenluyen_model->get_diem_masinhvien($this->masinhvien);
            //var_dump($data);
            $this->loadview_user('page/diemrenluyen/diem_my',$data);
        }
        
        function insert(){
            $this->loadview('page/diemrenluyen/insert');
        }
        
        function action_insert(){
            $this->load->model('Sinhvien_model');
            $this->diemrenluyen = $this->input->post('diemki');
            $this->xeploai = $this->input->post('xeploai');
            $this->masinhvien = $this->input->post('masinhvien');
            if(!$this->Sinhvien_model->check_masinhvien($this->masinhvien)){
                echo 'Không tồn tại mã sinh viên này';
                return false;
            }
            else{
                foreach($this->diemrenluyen as $key => $row){
                    if(!empty($row)){
                        $data['diemrenluyen'.($key+1)] = $row;
                    }
                }
                foreach($this->xeploai as $key => $row){
                    if($row != 0){
                        $data['xeploai'.($key+1)] = $row;
                    }
                }
                //$this->load->model('Diemrenluyen_model');
                if($this->Diemrenluyen_model->update_diem($this->masinhvien,$data)){
                    redirect(base_url().'page/sinhvien');
                }
                else{
                    redirect(base_url().'page/sinhvien');
                }
            }
        }
        
        function update(){
            $this->masinhvien = $this->input->input_stream('masinhvien');
            $this->load->model('Diemrenluyen_model');
            $result = $this->Diemrenluyen_model->get_diem_masinhvien($this->masinhvien);
            //var_dump($result);
            $this->loadview('page/diemrenluyen/update',$result);
        }
        
        function action_update(){
            $this->load->model('Sinhvien_model');
            $this->diemrenluyen = $this->input->post('diemki');
            $this->xeploai = $this->input->post('xeploai');
            $this->masinhvien = $this->input->post('masinhvien');
            if(!$this->Sinhvien_model->check_masinhvien($this->masinhvien)){
                echo 'Không tồn tại mã sinh viên này';
                return false;
            }
            else{
                foreach($this->diemrenluyen as $key => $row){
                    if(!empty($row)){
                        $data['diemrenluyen'.($key+1)] = $row;
                    }
                }
                foreach($this->xeploai as $key => $row){
                    if($row != 0){
                        $data['xeploai'.($key+1)] = $row;
                    }
                }
                //$this->load->model('Diemrenluyen_model');
                if($this->Diemrenluyen_model->update_diem($this->masinhvien,$data)){
                    redirect(base_url().'page/sinhvien');
                }
                else{
                    redirect(base_url().'page/sinhvien');
                }
            }
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