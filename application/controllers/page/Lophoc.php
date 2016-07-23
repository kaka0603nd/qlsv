<?php
    class Lophoc extends CI_Controller{
        private $id;
        private $malop;
        private $tenlop;
        private $tong;
        private $chunghiem;
        private $ghichu;
        private $CI;
        private $khoa;
        
        public function __construct(){
            parent::__construct();
            $this->load->model('Lophoc_model');
            $this->CI = & get_instance();
        }
        
        public function index(){
            $this->all();
        }
        
        public function all(){
            $this->load->model('Lophoc_model');
            $result = $this->Lophoc_model->show_alls();
            $count_sv = array();
            $i =0; 
            foreach($result as $row){
                $count_sv[$i] = $this->Lophoc_model->dem_sosv($row['id']);
                $i++; 
            }
            
            $data['lophoc'] = $result;
            $data['count_sv'] = $count_sv;
            $this->loadview('page/lophoc/form_lophoc',$data);
            //var_dump($result);
        }
        
        public function show_sv_lophoc($malop){
            $this->load->model('Sinhvien_model');
            $total = $this->Sinhvien_model->count_sinhvien($malop);
            $recond = 2;
            $this->CI->load->library('Functions');
            
            $result = $this->CI->functions->pagination_page('page/lophoc/show_sv_lophoc/'.$malop.'/',$total,$recond,5,true);
            $data['data'] = $this->Sinhvien_model->show_alls(2,$result['get_index'],$malop);
            
            $data['paginations'] = $result['pagination_pages'];
            
            $this->loadview('page/lophoc/form_dssv',$data);
        }
        
        public function sinhvien_cunglop(){
            $masinhvien = $this->session->userdata('madangnhap');
            $result = $this->Lophoc_model->show_sinhvien_cunglop($masinhvien);
            $data['data'] = $result;
            $this->loadview_user('page/lophoc/my_class',$data);
        }
        
        public function add_lop(){
            
            $this->loadview('page/lophoc/add_lophoc',$data);
        }
        
        public function action_add(){
            if(isset($_POST['btn_capnhap'])){
                $this->malop = $this->input->input_stream('malop');
                $this->tenlop = $this->input->input_stream('tenlop');
                $this->khoa = $this->input->input_stream('khoa');
                $this->chunghiem = $this->input->input_stream('chunghiem');
                $this->tong = $this->input->input_stream('tong');
                $this->ghichu = $this->input->input_stream('ghichu');
                
                $err = array();
                $err['malop'] = empty($this->malop)?false:true;
                $err['tenlop'] = empty($this->tenlop)?false:true;
                $err['khoa'] = empty($this->khoa)?false:true;
                $err['chunghiem'] = empty($this->chunghiem)?false:true;
                $err['tong'] = (empty($this->malop)|| $this->tong>60)?false:true;
                
                $insert = array(
                    'malop' => $this->malop,
                    'tenlop' => $this->tenlop,
                    'khoa' => $this->khoa,
                    'chunghiem' => $this->chunghiem,
                    'tong' => $this->tong,
                    'ghichu' => $this->ghichu
                );
                $data['err'] = $err;
                $data['data2'] = $insert;
                if(array_search(false,$err)){
                    $this->loadview('page/lophoc/add_lophoc',$data);
                    return;
                }
                else{
                    if($this->Lophoc_model->add_lophoc($insert)){
                        $this->load->model('User_model');
                        //$this->User_model->delete_level_sv($loptruong);
                        $this->User_model->add_level($loptruong);
                        return redirect(base_url().'page/lophoc');
                    }
                    else{
                        echo 'Have an erro';
                        $this->loadview('page/lophoc/add_lophoc',$data);
                    }
                }
            }
        }
        
        function edit($id = null){
            $result = $this->Lophoc_model->get_lophoc_id($id);
            $data['data2'] = $result;
            $this->loadview('page/lophoc/edit',$data);
        }
        
        function action_edit(){
            $this->id = $this->uri->segment(4);
            if(isset($_POST['btn_capnhap'])){
                $this->malop = $this->input->input_stream('malop');
                $this->tenlop = $this->input->input_stream('tenlop');
                $this->khoa = $this->input->input_stream('khoa');
                $this->chunghiem = $this->input->input_stream('chunghiem');
                $this->tong = $this->input->input_stream('tong');
                $this->ghichu = $this->input->input_stream('ghichu');
                
                $loptruong = $this->input->input_stream('loptruong');
                
                $err = array();
                $err['malop'] = empty($this->malop)?false:true;
                $err['tenlop'] = empty($this->tenlop)?false:true;
                $err['khoa'] = empty($this->khoa)?false:true;
                $err['chunghiem'] = empty($this->chunghiem)?false:true;
                $err['tong'] = (empty($this->malop)|| $this->tong>60)?false:true;
                
                $insert = array(
                    'malop' => $this->malop,
                    'tenlop' => $this->tenlop,
                    'khoa' => $this->khoa,
                    'chunghiem' => $this->chunghiem,
                    'tong' => $this->tong,
                    'ghichu' => $this->ghichu
                );
                $data['err'] = $err;
                $data['data2'] = $insert;
                if(array_search(false,$err)){
                    $this->loadview('page/lophoc/edit',$data);
                    return;
                }
                else{
                    if($this->Lophoc_model->update_lophoc($this->id,$insert)){
                        $this->load->model('User_model');
                        $this->User_model->delete_level_sv($loptruong);
                        $this->User_model->add_level($loptruong,2);
                        return redirect(base_url().'page/lophoc');
                    }
                    else{
                        echo 'Have an erro';
                        $this->loadview('page/lophoc/edit_lophoc',$data);
                    }
                }
            }
        }
        
        function delete_lophoc(){
            $this->id = $this->uri->segment(4);
            if(!$this->Lophoc_model->delete_lophoc($this->id,'full')){
                echo 'Have an erro';
                return ;
            }
            redirect(base_url().'page/lophoc');
        }
        
        function delete_sinhvien_full(){
            $this->id = $this->uri->segment(4);
            if(!$this->Lophoc_model->delete_lophoc($this->id)){
                echo 'Have an erro';
                return ;
            }
            redirect(base_url().'page/lophoc');
        }
        
        public function get_excel($malop){
            
            $this->CI->load->library('PHPExcel.php');
            $this->load->model('Sinhvien_model');
            
            $data = $this->Sinhvien_model->get_sv_lophoc($malop);
            //var_dump($data);
            
            $data1 = array(
            array(
                'TheHalfheart@gmail.com', 'Nguyễn Văn Cường'
            ),
            array(
                'freetuts.net@gmail.com', 'Nguyễn Văn Cường'
            ),
            array(
                'mrcuong.winter@gmail.com', 'Nguyễn Văn Cường'
            ),
            array(
                'ok_drt@yahoo.com', 'Nguyễn Văn Cường'
            )
            );
            
            // Bước 4: Chọn sheet - sheet bắt đầu từ 0
            $this->CI->phpexcel->setActiveSheetIndex(0);
             
            // Bước 5: Tạo tiêu đề cho sheet hiện tại
            $this->CI->phpexcel->getActiveSheet()->setTitle('Email List');
             
            // Bước 6: Tạo tiêu đề cho từng cell excel, 
            // Các cell của từng row bắt đầu từ A1 B1 C1 ...
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A1', 'Danh sách sinh viên lớp Công nghệ thông tin');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('A2', 'STT');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('B2', 'Mã sinh viên');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('C2', 'Tên sinh viên');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('D2', 'Ngày sinh');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('E2', 'Mã lớp');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('F2', 'Giới tính');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('G2', 'Hộ khẩu');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('H2', 'Địa chỉ');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('I2', 'Dân tộc');
            $this->CI->phpexcel->getActiveSheet()->setCellValue('J2', 'Tôn giáo');
            // Bước 7: Lặp data và gán vào file
            // Vì row đầu tiên là tiêu đề rồi nên những row tiếp theo bắt đầu từ 2
            $rowNumber = 3;
            foreach ($data as $index => $item) 
            {
                // A1, A2, A3, ...
                $this->CI->phpexcel->getActiveSheet()->setCellValue('A' . $rowNumber, ($index + 1));
                 
                // B1, B2, B3, ...
                $this->CI->phpexcel->getActiveSheet()->setCellValue('B' . $rowNumber, $item['masinhvien']);
             
                // C1, C2, C3, ...
                $this->CI->phpexcel->getActiveSheet()->setCellValue('C' . $rowNumber, $item['tensinhvien']);
                
                // B1, B2, B3, ...
                $this->CI->phpexcel->getActiveSheet()->setCellValue('D' . $rowNumber, $item['ngaysinh']);
             
                // C1, C2, C3, ...
                $this->CI->phpexcel->getActiveSheet()->setCellValue('E' . $rowNumber, $item['malop']);
                
                // B1, B2, B3, ...
                $this->CI->phpexcel->getActiveSheet()->setCellValue('F' . $rowNumber, $item['gioitinh']);
             
                // C1, C2, C3, ...
                $this->CI->phpexcel->getActiveSheet()->setCellValue('G' . $rowNumber, $item['hokhau']);
                
                // B1, B2, B3, ...
                $this->CI->phpexcel->getActiveSheet()->setCellValue('H' . $rowNumber, $item['diachi']);
             
                // C1, C2, C3, ...
                $this->CI->phpexcel->getActiveSheet()->setCellValue('I' . $rowNumber, $item['madantoc']);
                
                // B1, B2, B3, ...
                $this->CI->phpexcel->getActiveSheet()->setCellValue('J' . $rowNumber, $item['tongiao']);
             
                 
                // Tăng row lên để khỏi bị lưu đè
                $rowNumber++;
            }
             
            // Bước 8: Khởi tạo đối tượng Writer
            $objWriter = PHPExcel_IOFactory::createWriter($this->CI->phpexcel, 'Excel5');
             
            // Bước 9: Trả file về cho client download
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="danhsachlophoc.xls"');
            header('Cache-Control: max-age=0');
            if (isset($objWriter)) {
                $objWriter->save('php://output');
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