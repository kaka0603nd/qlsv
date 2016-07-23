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
            $this->load->model('Sinhvien_model');
            
            $this->CI = & get_instance();
            //$this->load->helpers('url');
        }
        function index(){
            $total = $this->Sinhvien_model->count_sinhvien();
            $recond = 5;
            $this->CI->load->library('Functions');
            
            $result = $this->CI->functions->pagination_page('page/sinhvien/index/',$total,$recond,4,true);
            $data['data'] = $this->Sinhvien_model->show_alls($recond,$result['get_index']);
            
            $data['paginations'] = $result['pagination_pages'];
            if($this->session->has_userdata('level')){
                if($this->session->userdata('level') == 1){
                    $this->loadview('page/sinhvien/form_dssv',$data);
                }
                else{
                    $this->loadview_user('page/sinhvien/form_dssv',$data);
                }
            }
            else{
                return redirect(base_url().'page/login');
            }
            
        }
        function form_insert_sinhvien(){
            $this->load->model('Lophoc_model');
            $show_lophoc['data'] = $this->Lophoc_model->show_alls();
            //var_dump($show_lophoc);
            $this->loadview('page/sinhvien/form_themsv',$show_lophoc);
        }
        function action_insert_sinhvien(){
            $this->masinhvien = $this->input->post_get('masinhvien',true);
            $this->diachi = $this->input->post_get('diachi',true);
            $this->gioitinh = $this->input->post_get('gioitinh',true);
            $loptruong = $this->input->post_get('loptruong',true);
            $this->hokhau = $this->input->post_get('hokhau',true);
            $this->madantoc = $this->input->post_get('madantoc',true);
            $this->malop = $this->input->post_get('malop',true);
            $this->ngaysinh = $this->input->post_get('ngaysinh',true);
            $this->nghebo = $this->input->post_get('nghebo',true);
            $this->ngheme = $this->input->post_get('ngheme',true);
            $this->tenbo = $this->input->post_get('tenbo',true);
            $this->tenme = $this->input->post_get('tenme',true);
            $this->tensinhvien = $this->input->post_get('name',true);
            $this->tongiao = $this->input->post_get('tongiao',true);
            
            $data = array(
                 'masinhvien' => $this->masinhvien ,
                 'tensinhvien' => $this->tensinhvien, 
                 'malop' => $this->malop,
                 'gioitinh' => $this->gioitinh,
                 'ngaysinh' => $this->ngaysinh,
                 'tenbo' => $this->tenbo,
                 'tenme' => $this->tenme,
                 'nghebo' => $this->nghebo,
                 'ngheme' => $this->ngheme,
                 'hokhau' => $this->hokhau, 
                 'diachi' => $this->diachi,
                 'madantoc' => $this->madantoc,
                 'tongiao' => $this->tongiao,
            );
            $search = array_search('',$data);
            if(!empty($search)){
                echo '<script>alert("Vui lòng điền đầy đủ thông tin trước khi lưu ... ")</script>';
                $this->load->model('Lophoc_model');
                $show_lophoc['data'] = $this->Lophoc_model->show_alls();
                
                $show_lophoc['data2'] = $data;
                //var_dump($show_lophoc);
                return $this->loadview('page/sinhvien/form_themsv',$show_lophoc);
            }
            if($this->Sinhvien_model->check_masinhvien($this->masinhvien)){
                echo '<script>alert("Mã sinh viên đã có vui lòng kiểm tra lại ... ")</script>';
                $this->load->model('Lophoc_model');
                $show_lophoc['data'] = $this->Lophoc_model->show_alls();
                
                $show_lophoc['data2'] = $data;
                //var_dump($show_lophoc);
                return $this->loadview('page/sinhvien/form_themsv',$show_lophoc);
            }
            
            $this->hinhanh = $this->upload_img($this->masinhvien);
            $data['hinhanh'] = $this->hinhanh== false?'':$this->hinhanh;
            
            
            
            if($this->Sinhvien_model->insert_sinhvien($data)){
                $user = array(
                    'madangnhap' => $this->masinhvien,
                    'name' => $this->tensinhvien,
                    'password' => '202cb962ac59075b964b07152d234b70',
                    'level' => '3',
                    'email' => 'user@gmail.com'
                );
                $this->load->model('User_model');
                if($this->User_model->insert_user($user)){
                    echo 'Insert ok';
                    if(!empty($loptruong)){
                        $this->User_model->add_level($this->masinhvien,$loptruong);
                    }
                }
                else{
                    echo 'Have an erro';
                }
                
            }
            else{
                echo 'Insert false';
            }
        }
        public function form_sv_masinhvien($masinhvien = null){
            if(empty($masinhvien)){
                return redirect(base_url().'page/sinhvien');
            }
            else{
                $id = $this->Sinhvien_model->show_sv_msv($masinhvien);
                return redirect(base_url().'page/sinhvien/form_chitietsv/'.$id);
            }
        }
        public function form_chitietsv($id = null){
            $data = $this->Sinhvien_model->show_by_id($id);
            $data['malop'] = $this->Sinhvien_model->show_sv_lophoc($id);
            $data['nenep'] = $this->Sinhvien_model->show_sv_nenep($id);
            //var_dump($data['nenep']);
            $data['diemrenluyen'] = $this->Sinhvien_model->show_sv_diem($id);
            $data['chinhsach'] = $this->Sinhvien_model->show_sv_chinhsach($id);
            //var_dump($data['chinhsach']);
            //var_dump($data['diemrenluyen']); 
            if($this->session->has_userdata('level')){
                if($this->session->userdata('level') == 1){
                    $this->loadview('page/sinhvien/form_chitietsv',$data);
                }
                else{
                    $this->loadview_user('page/sinhvien/form_chitietsv',$data);
                }
            }
            else{
                return redirect(base_url().'page/login');
            }
            
        }
        
        public function get_excel($id = null){
            
            $this->CI->load->library('PHPExcel.php');
            $this->load->model('Sinhvien_model');
            
            $data = $this->Sinhvien_model->show_by_id($id);
            $data['malop'] = $this->Sinhvien_model->show_sv_lophoc($id);
            $data['diemrenluyen'] = $this->Sinhvien_model->show_sv_diem($id);
            $data['nenep'] = $this->Sinhvien_model->show_sv_nenep($id);
            $data['chinhsach'] = $this->Sinhvien_model->show_sv_chinhsach($id);
            
            // Bước 4: Chọn sheet - sheet bắt đầu từ 0
            $this->CI->phpexcel->setActiveSheetIndex(0);
             
            // Bước 5: Tạo tiêu đề cho sheet hiện tại
            $this->CI->phpexcel->getActiveSheet()->setTitle('Email List');
             
            // Bước 6: Tạo tiêu đề cho từng cell excel, 
            // Các cell của từng row bắt đầu từ A1 B1 C1 ...
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A1', 'Thông tin chi tiết sinh viên');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A2', 'Danh mục');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A3', 'Mã sinh viên');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A4', 'Tên sinh viên');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A5', 'Lớp');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A6', 'Giới tính');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A7', 'Ngày sinh');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A8', 'Tên bố');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A9', 'Nghề bố');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A10', 'Tên mẹ');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A11', 'Nghề mẹ');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A12', 'Hộ khẩu');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A13', 'Địa chỉ');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A14', 'Dân tộc');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A15', 'Tôn giáo');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A16', 'Mã lớp');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A17', 'Tổng số');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A18', 'Chủ nghiệm');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A19', '');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A21', 'Thông tin điểm');
            
            for($i =1 ;$i<= 6; $i++){
                $this->CI->phpexcel->getActiveSheet()->setCellValue('A2'.($i+1), 'Điểm rèn luyện '.$i);                
                                
            }
            $value = 29;
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A29', 'Thông tin nề nếp');
            
            foreach($data['nenep'] as $row){
                $value += 1;
                $this->CI->phpexcel->getActiveSheet()->setCellValue('A'.$value, $row['hinhthucvipham']);
                
            }
            $value += 1;
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A'.$value, 'Thông tin sách');
            $value += 1;
            foreach($data['chinhsach'] as $row){
                $this->CI->phpexcel->getActiveSheet()->setCellValue('A'.$value, $row['tenchinhsach']);
            }
            // Bước 7: Lặp data và gán vào file
            // Vì row đầu tiên là tiêu đề rồi nên những row tiếp theo bắt đầu từ 2
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B1', '');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B2', 'Thông tin');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B3', $data['masinhvien']);
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B4', $data['tensinhvien']);
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B5', $data['malop']['tenlop']);
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B6', $data['gioitinh']==1?'Nam':'Nữ');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B7', $data['ngaysinh']);
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B8', $data['tenbo']);
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B9', $data['nghebo']);
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B10', $data['tenme']);
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B11', $data['ngheme']);
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B12', $data['hokhau']);
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B13', $data['diachi']);
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B14', $data['madantoc']);
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B15', $data['tongiao']);
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B16', $data['malop']['malop']);
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B17', $data['malop']['tong']);
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B18', $data['malop']['chunghiem']);
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B19', '');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B21', 'Thông tin điểm');
            
            for($i =1 ;$i<= 6; $i++){
                $this->CI->phpexcel->getActiveSheet()->setCellValue('B2'.($i+1), $data['diemrenluyen']['diemrenluyen'.$i]);                
                                
            }
            $value = 29;
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B29', '');
            //$count_nenep = count($data['nenep']);
            foreach($data['nenep'] as $row){
                //$value = $k+$j;
                $value += 1;
                $this->CI->phpexcel->getActiveSheet()->setCellValue('B'.$value,$row['kiluat']);
                //$j++;
            }
            $value += 1;
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B'.$value, '');
            foreach($data['chinhsach'] as $row){
                $value += 1;
                $this->CI->phpexcel->getActiveSheet()->setCellValue('B'.$value,$row['chedo']);
            }
             
            // Bước 8: Khởi tạo đối tượng Writer
            $objWriter = PHPExcel_IOFactory::createWriter($this->CI->phpexcel, 'Excel5');
             
            // Bước 9: Trả file về cho client download
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="thongtinsinhvien.xls"');
            header('Cache-Control: max-age=0');
            if (isset($objWriter)) {
                $objWriter->save('php://output');
            }
            
        }
        
        public function get_excel_user($id = null){
            
            $this->CI->load->library('PHPExcel.php');
            $this->load->model('Sinhvien_model');
            
            $data = $this->Sinhvien_model->show_by_id($id);
            $data['malop'] = $this->Sinhvien_model->show_sv_lophoc($id);
            $data['diemrenluyen'] = $this->Sinhvien_model->show_sv_diem($id);
            $data['nenep'] = $this->Sinhvien_model->show_sv_nenep($id);
            $data['chinhsach'] = $this->Sinhvien_model->show_sv_chinhsach($id);
            
            // Bước 4: Chọn sheet - sheet bắt đầu từ 0
            $this->CI->phpexcel->setActiveSheetIndex(0);
             
            // Bước 5: Tạo tiêu đề cho sheet hiện tại
            $this->CI->phpexcel->getActiveSheet()->setTitle('Email List');
             
            // Bước 6: Tạo tiêu đề cho từng cell excel, 
            // Các cell của từng row bắt đầu từ A1 B1 C1 ...
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A1', 'Thông tin chi tiết sinh viên');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A2', 'Danh mục');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A3', 'Mã sinh viên');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A4', 'Tên sinh viên');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A5', 'Lớp');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A6', 'Giới tính');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A7', 'Ngày sinh');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A8', 'Tên bố');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A9', 'Nghề bố');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A10', 'Tên mẹ');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A11', 'Nghề mẹ');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A12', 'Hộ khẩu');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A13', 'Địa chỉ');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A14', 'Dân tộc');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A15', 'Tôn giáo');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A16', 'Mã lớp');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A17', 'Tổng số');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A18', 'Chủ nghiệm');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A19', '');
            
            
            $value = 21;
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A21', 'Thông tin nề nếp');
            
            foreach($data['nenep'] as $row){
                $value += 1;
                $this->CI->phpexcel->getActiveSheet()->setCellValue('A'.$value, $row['hinhthucvipham']);
                
            }
            
            // Bước 7: Lặp data và gán vào file
            // Vì row đầu tiên là tiêu đề rồi nên những row tiếp theo bắt đầu từ 2
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B1', '');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B2', 'Thông tin');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B3', $data['masinhvien']);
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B4', $data['tensinhvien']);
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B5', $data['malop']['tenlop']);
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B6', $data['gioitinh']==1?'Nam':'Nữ');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B7', $data['ngaysinh']);
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B8', $data['tenbo']);
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B9', $data['nghebo']);
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B10', $data['tenme']);
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B11', $data['ngheme']);
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B12', $data['hokhau']);
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B13', $data['diachi']);
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B14', $data['madantoc']);
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B15', $data['tongiao']);
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B16', $data['malop']['malop']);
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B17', $data['malop']['tong']);
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B18', $data['malop']['chunghiem']);
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B19', '');
            
            $value = 21;
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B21', '');
            //$count_nenep = count($data['nenep']);
            foreach($data['nenep'] as $row){
                //$value = $k+$j;
                $value += 1;
                $this->CI->phpexcel->getActiveSheet()->setCellValue('B'.$value,$row['kiluat']);
                //$j++;
            }
            
             
            // Bước 8: Khởi tạo đối tượng Writer
            $objWriter = PHPExcel_IOFactory::createWriter($this->CI->phpexcel, 'Excel5');
             
            // Bước 9: Trả file về cho client download
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="thongtinsinhvien.xls"');
            header('Cache-Control: max-age=0');
            if (isset($objWriter)) {
                $objWriter->save('php://output');
            }
            
        }
        
        public function delete_sinhvien($id = null){
            if(empty($id)){
                return redirect(base_url().'page/sinhvien');
            }
            $this->Sinhvien_model->delete_sv($id);
            return redirect(base_url().'page/sinhvien');
        }
        
        public function edit_sinhvien($id = null){
            if(empty($id)){
                return redirect(base_url().'page/sinhvien');
            }
            $this->load->model('Lophoc_model');
            $data['data'] = $this->Lophoc_model->show_alls();
            $result = $this->Sinhvien_model->show_by_id($id);
            $data['data2'] = $result;
            $this->loadview('page/sinhvien/edit',$data);
        }
        
        public function action_edit(){
            $this->id = $this->input->post_get('id',true);
            $this->masinhvien = $this->input->post_get('masinhvien',true);
            $this->diachi = $this->input->post_get('diachi',true);
            $this->gioitinh = $this->input->post_get('gioitinh',true);
            
            $this->hokhau = $this->input->post_get('hokhau',true);
            $this->madantoc = $this->input->post_get('madantoc',true);
            $this->malop = $this->input->post_get('malop',true);
            $this->ngaysinh = $this->input->post_get('ngaysinh',true);
            $this->nghebo = $this->input->post_get('nghebo',true);
            $this->ngheme = $this->input->post_get('ngheme',true);
            $this->tenbo = $this->input->post_get('tenbo',true);
            $this->tenme = $this->input->post_get('tenme',true);
            $this->tensinhvien = $this->input->post_get('name',true);
            $this->tongiao = $this->input->post_get('tongiao',true);
            
            $data = array(
                 'masinhvien' => $this->masinhvien ,
                 'tensinhvien' => $this->tensinhvien, 
                 'malop' => $this->malop,
                 'gioitinh' => $this->gioitinh,
                 'ngaysinh' => $this->ngaysinh,
                 'tenbo' => $this->tenbo,
                 'tenme' => $this->tenme,
                 'nghebo' => $this->nghebo,
                 'ngheme' => $this->ngheme,
                 'hokhau' => $this->hokhau, 
                 'diachi' => $this->diachi,
                 'madantoc' => $this->madantoc,
                 'tongiao' => $this->tongiao,
            );
            $search = array_search('',$data);
            if(!empty($search)){
                echo '<script>alert("Vui lòng điền đầy đủ thông tin trước khi lưu ... ")</script>';
                $this->load->model('Lophoc_model');
                $show_lophoc['data'] = $this->Lophoc_model->show_alls();
                
                $show_lophoc['data2'] = $data;
                //var_dump($show_lophoc);
                return $this->loadview('page/sinhvien/form_themsv',$show_lophoc);
            }
            
            $this->hinhanh = $this->upload_img($this->masinhvien);
            if(!empty($this->hinhanh)){
                $data['hinhanh'] = $this->hinhanh== false?'':$this->hinhanh;
            }
            
            if($this->Sinhvien_model->update_sv($this->id,$data)){
                return redirect(base_url().'page/sinhvien');
            }
            else{
                return redirect(base_url().'page/sinhvien');
            }
        }
        
        private function upload_img($id =null){
            $date = date('d-m-Y-h-i-s');
            // cau hinh va goi thu vien upload
            $config['file_name']= $id.'-'.$date;
            $config['upload_path'] = 'public/images/sinhvien';
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
                $this->thumbnailimage->load(base_url().'public/images/sinhvien/'.$this->upload->data('file_name'));
                $this->thumbnailimage->resizeToWidth(150);
                $this->thumbnailimage->save('public/images/sinhvien/thumb/thumb-'.$this->upload->data('file_name'));
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