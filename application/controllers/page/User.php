<?php
    class Sinhvien extends CI_Controller{
        public $CI = null;
        public $masinhvien ;
        public $tensinhvien ;
        public $malop;
        public $gioitinh;
        public $ngaysinh;
        public $tenbo;
        public $tenme;
        public $nghebo,$ngheme;
        public $hokhau, $diachi;
        public $madantoc,$tongiao,$hinhanh;
        public $id;
        
        function __construct(){
            parent::__construct();
            $this->load->model('User_model');
            
            $this->CI = & get_instance();
            //$this->load->helpers('url');
        }
        
        function insert_user(){
            
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