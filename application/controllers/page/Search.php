<?php
    class Search extends CI_Controller{
        public $CI;
        public $key;
        public $danhmuc;
        
        function __construct(){
            parent::__construct();
            $this->load->model('Search_model');
        }
        
        public function search_pro(){
            if($this->input->get('key')){
                $this->key = $this->input->get('key');
            }
            else{
                $this->key = $this->uri->segment(3)?$this->uri->segment(3):'';
            }
            
            $result = $this->Search_model->get_search_auto($this->key);
            $data['sinhvien'] = $result;
            $data['key'] = $this->key;
            if($this->session->has_userdata('level')){
                if($this->session->userdata('level') == 1){
                    $this->loadview('page/search/form_search',$data);
                }
                else{
                    $this->loadview_user('page/search/form_search',$data);
                }
            }
            else{
                return redirect(base_url().'page/login');
            }
            //var_dump($result);
            
        }
        
        
        
        public function search_auto(){
            
            $this->key = $_POST['key'];
            $data ='';
            if(empty($this->key)){
                echo '<div class="thongtin_search">Nhập vào hộp để chúng tôi tìm sinh viên tốt nhất cho bạn</div>';
                return;
            }
            else{
                $result = $this->Search_model->get_search_auto($this->key,array('recond'=>6,'start' =>0));
                if(count($result) == 0){
                    echo '<div class="thongtin_search">SORRY ...! Không tìm thấy sinh viên nào trùng với từ khóa cần tìm ...</div>';
                    return;
                }
                foreach($result as $row){
                    $imgs = $row['hinhanh'];
                    $img = null;
                    if(empty($imgs)){
                        $img = 'image_null.png';
                    }
                    else{
                        $img = explode(',',$imgs);
                    }
                    $str_img = is_array($img)?$img[0]:$img;
                    $data .= '<li>
                                	<a href="'.base_url().'page/sinhvien/form_chitietsv/'.$row['id'].'" class="forcus_head">
                                    	<img src="'.base_url().'public/images/sinhvien/thumb/thumb-'.$str_img.'" width="20px"/>
                                        <div class="form-search-info">
                                            <p>'.$row['tensinhvien'].'</p>
                                            <p class="search-money">'.$row['masinhvien'].'</p>
                                        </div>
                                    </a>
                                </li>';
                }
                echo $data;
            }
            
        }
        
        public function sear(){
            echo 'hello';
        }
        
        /**
         * @param url call
         * @param data input
         * @return
         * */
        function loadview($url = null,$data = null){
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