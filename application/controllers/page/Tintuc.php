<?php
    class Tintuc extends CI_Controller{
        private $id;
        private $tieude;
        private $noidung;
        private $user_id;
        private $create_at;
        //private $aaaaaaaaaaaaaaaa;
        private $trangthai;
        private $update;
        private $hinhanh;
        private $like;
        private $view;
        public $CI = null;
        function __construct(){
            parent::__construct();
            $this->load->helpers(array('form', 'url'));
            $this->load->library('session');
            $this->session->set_userdata(array('id'=>'1'));
            $this->CI = & get_instance();
            $this->load->model('Tintuc_model');
        }
        
        // 1. ------------------------------------------------------------------------
        function index(){
            $data = $this->get_tintuc_both();
            //var_dump($data);
            if($this->session->has_userdata('level')){
                if($this->session->userdata('level') == 1){
                    $this->loadview('page/tintuc/user_tintuc',$data);
                }
                else{
                    $this->loadview_user('page/tintuc/user_tintuc',$data);
                }
            }
            else{
                return redirect(base_url().'page/login');
            }
            
        }
        
        function chitiet_tintuc($id = null){
            if(empty($id)){
                return redirect(base_url().'page/tintuc/');
            }
            $data = $this->Tintuc_model->get_info_id($id);
            $this->loadview_user('page/tintuc/user_chitiet',$data);
        }
        
        function get_tintuc(){
            $this->_form_show_info();
        }
        
        private function _form_show_info(){
            
            $data = $this->get_tintuc_both();
            $this->loadview('page/tintuc/info_show',$data);
        }
        
        public function get_tintuc_both(){
            $this->CI->load->library('Functions');
            $this->load->model('Tintuc_model');
            // cau hinh thu vien phan trang
            $phantrang = array('total' => $this->Tintuc_model->get_all_show(),'so_record' => 2,'get_index' =>4);
            // goi thu vien phan trang va lay phan trang tra ve trang index
            $data = $this->CI->functions->pagination_page('page/tintuc/index',$phantrang['total'],$phantrang['so_record'],$phantrang['get_index'],true);
            // goi ham lay du lieu trong csdl limit 5,0
            $data['get_data'] = $this->Tintuc_model->get_show($phantrang['so_record'],$data['get_index']);
            return $data;
        }
        // 1. end------------------------------------------------------------------------
        
        function form_insert_info(){
            $this->_form_insert_info();
        }
        function action_insert_info(){
            $this->_action_insert_info();
        }
        private function _form_insert_info(){
            $this->loadview('page/tintuc/info_insert');
        }
        private function _action_insert_info(){
            $this->tieude = $this->input->post('tieude');
            $this->noidung = $this->input->post('noidung');
            //$this->noidung = $_POST['noidung'];
            //$this->aaaaaaaaaaaaaaaa = $this->input->post('aaaaaaaaaaaaaaaa');
            $this->trangthai = $this->input->post('trangthai');
            $this->user_id = $this->session->userdata('id');
            $this->create_at = date('Y-m-d H:i:s');
            $this->hinhanh = $this->upload_img($this->user_id);
            $this->update = date('Y-m-d H:i:s');
            $this->like = 0;
            $this->view = 0;
            
            $err['tieude'] = empty($this->tieude)?false:true;
            $err['noidung'] = empty($this->noidung)?false:true;
            //$err['aaaaaaaaaaaaaaaa'] = empty($this->aaaaaaaaaaaaaaaa)?false:true;
            $err['trangthai'] = empty($this->trangthai)?false:true;
            $err['user_id'] = empty($this->user_id)?false:true;
            $err['hinhanh'] = $this->hinhanh;
            $err_have = array_search(false,$err)==''?true:false;
            
            if($err_have){
                $this->load->model('Tintuc_model');
                $insert = array(
                    'tieude' =>$this->tieude,
                    'noidung' => $this->noidung,
                    //'aaaaaaaaaaaaaaaa' => $this->aaaaaaaaaaaaaaaa,
                    'trangthai' => $this->trangthai,
                    'hinhanh' => $this->hinhanh,
                    'user_id' =>$this->user_id,
                    'create_at' => $this->create_at,
                    'update_at' => $this->update,
                    'view' => $this->view,
                    'like' => $this->like,
                );
                if($this->Tintuc_model->insert($insert)){
                    echo '<script>alert("Cập nhập thành công ...")</script>';
                    return redirect(base_url().'page/tintuc/get_tintuc');
                }
                else{
                    echo 'have an erro';
                }
            }
            else{
                $err['tieude'] = $this->tieude;
                $err['noidung'] = $this->noidung;
                //$err['aaaaaaaaaaaaaaaa'] = $this->aaaaaaaaaaaaaaaa;
                $err['trangthai'] = $this->trangthai;
                return $this->loadview('page/tintuc/info_insert',$err);
            }
        }
        
        
        
        public function form_edit_info($id = null){
            if(empty($id)){
                return redirect(base_url().'page/tintuc/');
            }
            $data = $this->Tintuc_model->get_info_id($id);
            $this->loadview('page/tintuc/info_edit',$data);
        }
        
        public function action_edit_info($id =null){
            if(empty($id)){
                return redirect(base_url().'page/tintuc/');
            }
            $this->_action_edit_info($id);
        }
        
        private function _action_edit_info($id){
            $this->id = $id;
            $this->tieude = $this->input->post('tieude');
            $this->noidung = $this->input->post('noidung');
            //$this->noidung = $_POST['noidung'];
            //$this->aaaaaaaaaaaaaaaa = $this->input->post('aaaaaaaaaaaaaaaa');
            $this->trangthai = $this->input->post('trangthai');
            $this->user_id = $this->session->userdata('id');
            $this->hinhanh = $this->upload_img($this->user_id);
            $this->update = date('Y-m-d H:i:s');
            
            $err['tieude'] = empty($this->tieude)?false:true;
            $err['noidung'] = empty($this->noidung)?false:true;
            //$err['aaaaaaaaaaaaaaaa'] = empty($this->aaaaaaaaaaaaaaaa)?false:true;
            $err['trangthai'] = empty($this->trangthai)?false:true;
            $err['user_id'] = empty($this->user_id)?false:true;
            //$err['hinhanh'] = $this->hinhanh;
            $err_have = array_search(false,$err)==''?true:false;
            
            if($err_have){
                $this->load->model('Tintuc_model');
                $update = array(
                    'tieude' =>$this->tieude,
                    'noidung' => $this->noidung,
                    //'aaaaaaaaaaaaaaaa' => $this->aaaaaaaaaaaaaaaa,
                    'trangthai' => $this->trangthai,
                    'user_id' =>$this->user_id,
                    'update_at' => $this->update,
                );
                if($this->hinhanh != false || !empty($this->hinhanh)){
                    $update['hinhanh'] = $this->hinhanh;
                }
                
                if($this->Tintuc_model->update_info($id,$update)){
                    echo '<script>alert("Cập nhập thành công ...")</script>';
                    return redirect(base_url().'page/tintuc/get_tintuc');
                }
                else{
                    echo 'have an erro';
                }
            }
            else{
                $err['id'] = $this->id;
                $err['tieude'] = $this->tieude;
                $err['noidung'] = $this->noidung;
                //$err['aaaaaaaaaaaaaaaa'] = $this->aaaaaaaaaaaaaaaa;
                $err['trangthai'] = $this->trangthai;
                return $this->loadview('page/tintuc/info_edit',$err);
            }
        }
        
        public function action_delete($id = null){
            if(empty($id)){
                return redirect(base_url().'page/tintuc/');
            }
            if($this->Tintuc_model->delete_by_id($id)){
                echo '<script>alert("Cập nhập thành công ...")</script>';
                return $this->index();
            }
            else{
                echo '<script>alert("Cập nhập có lỗi ...")</script>';
                return $this->index();
            }
        }
        
        /**
         * void upload hình ảnh từ form lên host
         * @return file name or bool
         * @param id user_page
         * 
         * */
        private function upload_img($id =null){
            $date = date('d-m-Y-h-i-s');
            // cau hinh va goi thu vien upload
            $config['file_name']= $id.'-'.$date;
            $config['upload_path'] = 'public/images/tintuc';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 10*1024;
            //$config['max_width'] = 1024;
            //$config['max_height'] = 768;
            $this->load->library('upload',$config);
            if(!$this->upload->do_upload("hinhanh")){
                return false;
            }
            else{
                // tao anh thumbnail bang library add
                $CI =& get_instance();
                $CI->load->library('Thumbnailimage');
                $this->thumbnailimage->load(base_url().'public/images/tintuc/'.$this->upload->data('file_name'));
                $this->thumbnailimage->resizeToWidth(150);
                $this->thumbnailimage->save('public/images/tintuc/thumb/thumb-'.$this->upload->data('file_name'));
                return $this->upload->data('file_name');
            }
            sleep(1);
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