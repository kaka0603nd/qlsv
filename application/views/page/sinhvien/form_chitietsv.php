<small>Trang chủ > chi tiết sinh viên</small>
      <hr>
      <style>
        h4{
            color: #EC272E;
        }
      </style>
      <center><h2 style="FONT-WEIGHT: BOLD;color: #E80D16;text-shadow: 5px 5px 5px #8C8C86;">SINH VIÊN TRONG KHOA</h2></center>
        <br />
        <br />
<div class="col-md-3">
                <img <img src="<?php echo base_url();?>public/images/<?php echo empty($hinhanh)?'icon/user.png':'sinhvien/'.$hinhanh?>"  width="100%"/>
            </div>
            <div class="col-md-9">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td style="text-align: center;" colspan="2"><h4>Thông tin chi tiết</h4></td>
                            
                        </tr>
                        <tr>
                            <td style="width: 30%;"><span>Mã sinh viên</span></td>
                            <td><span><?php echo $masinhvien?></span></td>
                        </tr>
                        <tr>
                            <td style="width: 30%;"><span>Tên sinh viên</span></td>
                            <td><span><?php echo $tensinhvien?></span></td>
                        </tr>
                        <tr>
                            <td><span>Mã lớp</span></td>
                            <td>
                                <select name="malop" class="form-control">
                                    <option value="1"><?php echo $malop['malop'].' - '.$malop['tenlop'] ?></option>
                                    
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%;"><span>Giới tính</span></td>
                            <td><span><?php echo $gioitinh==1?'Nam':'Nữ'?></span></td>
                        </tr>
                        <tr>
                            <td style="width: 30%;"><span>Ngày sinh</span></td>
                            <td><span><?php echo $ngaysinh?></span></td>
                        </tr>
                        <tr>
                            <td style="width: 30%;"><span>Tên bố</span></td>
                            <td><span><?php echo $tenbo?></span></td>
                        </tr>
                        <tr>
                            <td style="width: 30%;"><span>Nghề bố</span></td>
                            <td><span><?php echo $nghebo?></span></td>
                        </tr>
                        <tr>
                            <td style="width: 30%;"><span>Tên mẹ</span></td>
                            <td><span><?php echo $tenme?></span></td>
                        </tr>
                        <tr>
                            <td style="width: 30%;"><span>Nghề mẹ</span></td>
                            <td><span><?php echo $ngheme?></span></td>
                        </tr>
                        <tr>
                            <td style="width: 30%;"><span>Hộ khẩu</span></td>
                            <td><span><?php echo $hokhau?></span></td>
                        </tr>
                        <tr>
                            <td style="width: 30%;"><span>Địa chỉ</span></td>
                            <td><span><?php echo $diachi?></span></td>
                        </tr>
                        <tr>
                            <td style="width: 30%;"><span>Dân tộc</span></td>
                            <td><span><?php echo $madantoc?></span></td>
                        </tr>
                        <tr>
                            <td style="width: 30%;"><span>Tôn giáo</span></td>
                            <td><span><?php echo $tongiao?></span></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;" colspan="2"><h4>Thông tin lớp đang học</h4></td>
                            
                        </tr>
                        <tr>
                            <td style="width: 30%;"><span>Mã Lớp</span></td>
                            <td><span><?php echo $malop['malop']?></span></td>
                        </tr>
                        <tr>
                            <td style="width: 30%;"><span>Tên lớp</span></td>
                            <td><span><?php echo $malop['tenlop']?></span></td>
                        </tr>
                        <tr>
                            <td style="width: 30%;"><span>Tổng số</span></td>
                            <td><span><?php echo $malop['tong']?></span></td>
                        </tr>
                        <tr>
                            <td style="width: 30%;"><span>Chủ nghiệm</span></td>
                            <td><span><?php echo $malop['chunghiem']?></span></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;" colspan="2"><h4>Thông tin nề nếp</h4></td>
                            
                        </tr>
                        <?php
                        //var_dump($nenep);
                            foreach($nenep as $row){
                                
                            
                        ?>
                        <tr>
                            <td style="width: 30%;"><span><?php echo $row['hinhthucvipham']?></span></td>
                            <td><span><?php echo $row['kiluat']?></span></td>
                        </tr>
                        <?php
                            }
                        ?>
                        <?php
                            if($this->session->has_userdata('level')){
                                if($this->session->userdata('level') == 1){
                                    ?>
                                    <tr>
                                        <td style="text-align: center;" colspan="2"><h4>Thông tin điểm</h4></td>
                                        
                                    </tr>
                                    
                        <?php
                        //var_dump($diemrenluyen);
                            /*foreach($diemrenluyen as $key => $row){
                                //echo $key.' - '.$diemrenluyen[$key];
                            }
                            */
                            for($i =1 ;$i<= 6; $i++){
                                ?>
                                <tr>
                                    <td style="width: 30%;"><span>Điểm rèn luyện <?php echo $i?></span></td>
                                    <td>
                                        <ul>
                                            <li><span><?php echo $diemrenluyen['diemrenluyen'.$i];  ?></span></li>
                                            <li><span><?php echo 'Xếp loại : '.$diemrenluyen['xeploai'.$i];?></span></li>
                                        </ul>
                                            
                                        
                                    </td>
                                </tr>
                                <?php
                                
                            }
                        ?>
                        <tr>
                            <td style="text-align: center;" colspan="2"><h4>Thông tin chính sách</h4></td>
                            
                        </tr>
                        <?php
                            foreach($chinhsach as $row){
                                
                            
                        ?>
                        <tr>
                            <td style="width: 30%;"><span><?php echo $row['tenchinhsach']?></span></td>
                            <td><span><?php echo $row['chedo']?></span></td>
                        </tr>
                        <?php
                            }
                        ?>
                        <tr>
                            <td style="width: 30%;"><a href="<?php echo base_url();?>page/sinhvien/get_excel/<?php echo $id;?>"> <img src="<?php echo base_url();?>public/images/icon/file_xls.jpg"/> get excel</a></td>
                            <td></td>
                        </tr>
                                    <?php
                                }
                                else{
                                    ?>
                                    <tr>
                                        <td style="width: 30%;"><a href="<?php echo base_url();?>page/sinhvien/get_excel_user/<?php echo $id;?>"> <img src="<?php echo base_url();?>public/images/icon/file_xls.jpg"/> get excel</a></td>
                                        <td></td>
                                    </tr>
                                    <?php
                                }
                            }
                            else{
                                return redirect(base_url().'page/login');
                            }
                        ?>
                        
                        
                    </tbody>
                </table>
            </div>