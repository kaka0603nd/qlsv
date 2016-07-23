<h4><small>Trang chủ > lớp học</small></h4>
      <hr>
      <center><h2 style="FONT-WEIGHT: BOLD;color: #E80D16;text-shadow: 5px 5px 5px #8C8C86;">DANH MỤC LỚP HỌC</h2></center>
        <div class="row">
            <div class="col-md-12">
                <span class="btn btn-danger" ><a href="<?php echo base_url();?>page/sinhvien/form_insert_sinhvien" style="color: white;text-decoration: none;"><span>* Thêm lớp học</span></a></span>
            </div>
        </div>
        <style>
            h5{
                font-size: 14px;
                font-family: serif;
                color: #F51043;
                border: 1px solid #EF1039;
                border-radius: 4px;
                padding: 7px;   
            }
        </style>
        
        <div class="row">
                                <div class="col-md-12">
                                    <?php
                                            if(isset($err)){
                                                if(array_search(false,$err)){
                                                    ?>
                                                    <div class="nNote nWarning hideit">
                                                        <p><strong>WARNING: </strong><?php echo 'Kiểm tra nhập dữ liệu không được để trống'?></p>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            if(isset($login)){
                                                if(!empty($login)){
                                                    ?>
                                                    <div class="nNote nFailure hideit">
                                                        <p><strong>FAILURE: </strong><?php echo $login?></p>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                        ?>
                                </div>
                                
                            </div>
                            <style>
                                .nWarning {
                                    background: #ffe9ad url(<?php echo base_url();?>public/images/icon/error.png) no-repeat 15px center;
                                    border: 1px solid #eac572;
                                    color: #826200;
                                }
                                .nNote {
                                    cursor: pointer;
                                    margin: 32px 0px 0px 0px;
                                    box-shadow: inset 0 0 1px #fff;
                                    -webkit-box-shadow: inset 0 0 1px #fff;
                                    -moz-box-shadow: inset 0 0 1px #fff;
                                }
                                .nNote p {
                                    font-size: 11px;
                                    padding: 10px 25px 10px 54px;
                                    margin: 0px;
                                    color: #565656;
                                }
                                .nNote strong {
                                    margin-right: 5px;
                                }
                                .nFailure {
                                    background: #fccac1 url(<?php echo base_url();?>public/images/icon/exclamation.png) no-repeat 15px center;
                                    border: 1px solid #e18b7c;
                                    color: #AC260F;
                                }
                            </style>
                            <script>
                                $(document).ready(function(e){
                                   $('.hideit').click(function(){
                                        $(this).slideUp("slow");
                                   });
                                });
                            </script>
        <br />
        
        <form action="<?php echo base_url();?>page/lophoc/action_edit/<?php echo $data2['id']?>" method="post" >
        <table class="table table-hover">
            <tbody>
                <tr>
                    <td style="width: 20%;"><span>Mã lớp</span></td>
                    <td><input type="text" name="malop" class="form-control" placeholder="Nhập vào mã lớp ..." value="<?php echo isset($data2['malop'])?$data2['malop']:''?>"/></td>
                </tr>
                <tr>
                    <td style="width: 20%;"><span>Tên lớp</span></td>
                    <td><input type="text" name="tenlop" class="form-control" placeholder="Nhập vào tên lớp ..." value="<?php echo isset($data2['tenlop'])?$data2['tenlop']:''?>"/></td>
                </tr>
                <tr>
                    <td style="width: 20%;"><span>Khóa</span></td>
                    <td><input type="text" name="khoa" class="form-control" placeholder="Nhập vào khóa ..." value="<?php echo isset($data2['khoa'])?$data2['khoa']:''?>"/></td>
                </tr>
                <tr>
                    <td style="width: 20%;"><span>Chủ nghiệm</span></td>
                    <td><input type="text" name="chunghiem" class="form-control" placeholder="Nhập vào tên chủ nghiệm ..." value="<?php echo isset($data2['chunghiem'])?$data2['chunghiem']:''?>"/></td>
                </tr>
                <?php
                    $CI = &get_instance();
                    $CI->load->model('Sinhvien_model');
                    $result = $CI->Sinhvien_model->get_all_sv();
                    $dataaaa['sinhvien'] = $result;
                ?>
                <tr>
                        <td style="width: 20%;"><span>Lớp trưởng</span></td>
                        <td>
                            <div id="content-x">
                            <select style="width:300px" id="states" name="loptruong">
                                   
                                   <optgroup label="Vui lòng chọn theo tên sinh viên">
                                   <?php
                                    foreach($dataaaa['sinhvien'] as $key => $row){
                                        
                                    
                                   ?>
                                       <option value="<?php echo $row['masinhvien']?>"><?php echo $row['tensinhvien'].' - '.$row['masinhvien']?></option>
                                   <?php
                                    }
                                   ?>
                                   </optgroup>
                                  </select>
                         </div>
                        </td>
                        
                    </tr>
                <tr>
                    <td style="width: 20%;"><span>Tổng số sinh viên</span></td>
                    <td><input data-toggle="tooltip" title="Tổng số sinh viên phải nhỏ hơn 60!" type="text" name="tong" class="form-control" placeholder="Nhập vào tên chủ nghiệm ..." value="<?php echo isset($data2['tong'])?$data2['tong']:''?>"/></td>
                </tr>
                <tr>
                    <td style="width: 20%;"><span>Ghi chú</span></td>
                    <td><input  type="text" name="ghichu" class="form-control" placeholder="Nhập vào ghi chú ..." value="<?php echo isset($data2['ghichu'])?$data2['ghichu']:''?>"/></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" name="btn_capnhap">Cập nhập</button>
                    </td>
                </tr>
                
            </tbody>
        </table>
        </form>
        <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
        </script>