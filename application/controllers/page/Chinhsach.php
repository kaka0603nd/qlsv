<?php
    class Chinhsach extends CI_Controller{
        public $CI;
        public $id;
        public $masinhvien;
        
        function __construct(){
            parent::__construct();
            $this->load->model('Chinhsach_model');
            $this->load->library('session');
        }
        
        public function index(){
            $result = $this->Chinhsach_model->get_nenep();
            $data['nenep'] = $result;
            $this->loadview('page/chinhsach/chinhsach',$data);
        }
        
        public function add(){
            $results = $this->Chinhsach_model->get_all();
            $data['chinhsach'] = $results;
            $this->load->model('Sinhvien_model');
            $result = $this->Sinhvien_model->get_all_sv();
            $data['sinhvien'] = $result;
            
            $this->loadview('page/chinhsach/add',$data);
        }
        
        public function action_add(){
            if(isset($_POST['btn_capnhap']) ){
                $result = $this->input->post('chinhsach');
                $this->masinhvien = $this->input->post('masinhvien');
                //echo $this->masinhvien;
                $insert = array();
                foreach($result as $key => $row){
                    $insert = array(
                        'sinhvien_masinhvien' => $this->masinhvien,
                        'chinhsach_id' => $row
                    );
                    if(!$this->Chinhsach_model->set_chinhsach($insert)){
                        return redirect(base_url().'page/chinhsach/add');
                    }
                    
                }
                return redirect(base_url().'page/sinhvien');
                
                
            }
        }
        
        public function loadview($url = null,$data = null){
            if(empty($url)){
                $url = 'errors/html/error_404';
            }
            $datas = array('url' =>$url,'data'=> $data);
            $this->load->view('page/main',$datas);
        }
    }
?>