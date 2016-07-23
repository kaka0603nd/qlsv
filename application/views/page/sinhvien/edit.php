<h4><small>Trang chủ > danh sách sinh viên</small></h4>
      <hr>
        <div class="row">
            <div class="col-md-12">
                <span class="btn btn-danger" ><a href="<?php echo base_url();?>page/sinhvien/form_insert_sinhvien" style="color: white;text-decoration: none;"><span>* Thêm sinh viên</span></a></span>
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
        <?php
            if(isset($data2)){
                $search = array_search('',$data2);
                if($search == 'hinhanh'){
                    
                }
                else{
                    //echo '<h5 class"err_inputs">'.$search.'</h5>';
                }
                
            }
        ?>
        
        <br />
        <form action="<?php echo base_url();?>page/sinhvien/action_edit" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo isset($data2['id'])?$data2['id']:''?>"/>
        <table class="table table-hover">
            <tbody>
                <tr>
                    <td style="width: 20%;"><span>Mã sinh viên</span></td>
                    <td><input type="text" name="msv" disabled="disabled" class="form-control" placeholder="Nhập vào mã sinh viên ..." value="<?php echo isset($data2['masinhvien'])?$data2['masinhvien']:''?>"/><input type="hidden" name="masinhvien" class="form-control" placeholder="Nhập vào mã sinh viên ..." value="<?php echo isset($data2['masinhvien'])?$data2['masinhvien']:''?>"/></td>
                </tr>
                <tr>
                    <td style="width: 20%;"><span>Tên sinh viên</span></td>
                    <td><input type="text" name="name" class="form-control" placeholder="Nhập vào tên sinh viên ..." value="<?php echo isset($data2['tensinhvien'])?$data2['tensinhvien']:''?>"/></td>
                </tr>
                <tr>
                    <td><span>Mã lớp</span></td>
                    <td>
                        <select name="malop" class="form-control">
                            <?php
                                foreach($data as $row){
                                    
                                if($row['id'] == $data2['malop']){
                                    ?>
                                    <option value="<?php echo $row['id']?>" selected=""><?php echo $row['tenlop']?></option>
                                    <?php
                                }
                                else{
                                    ?>
                                    <option value="<?php echo $row['id']?>"><?php echo $row['tenlop']?></option>
                                    <?php
                                }
                            
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="width: 20%;"><span>Giới tính</span></td>
                    <td>
                        <select name="gioitinh" class="form-control">
                            <option value="1" >Nam</option>
                            <option value="2">Nữ</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="width: 20%;"><span>Ngày sinh</span></td>
                    <td><input type="text" name="ngaysinh" class="form-control" placeholder="Nhập vào ngày sinh ..." value="<?php echo isset($data2['ngaysinh'])?$data2['ngaysinh']:''?>"/></td>
                </tr>
                <tr>
                    <td style="width: 20%;"><span>Tên bố và Nghề bố</span></td>
                    <td>
                        <div class="row">
                            <div class="col-md-6"><input type="text" name="tenbo" class="form-control" placeholder="Nhập vào tên bố ..." value="<?php echo isset($data2['tenbo'])?$data2['tenbo']:''?>"/></div>
                            <div class="col-md-6"><input type="text" name="nghebo" class="form-control" placeholder="Nhập vào nghề bố ..." value="<?php echo isset($data2['nghebo'])?$data2['nghebo']:''?>"/></div>
                        </div>
                    </td>
                </tr>
                
                <tr>
                    <td style="width: 20%;"><span>Tên mẹ và Nghề mẹ</span></td>
                    <td>
                        <div class="row">
                            <div class="col-md-6"><input type="text" name="tenme" class="form-control" placeholder="Nhập vào tên mẹ ..." value="<?php echo isset($data2['tenme'])?$data2['tenme']:''?>"/></div>
                            <div class="col-md-6"><input type="text" name="ngheme" class="form-control" placeholder="Nhập vào nghề mẹ ..." value="<?php echo isset($data2['ngheme'])?$data2['ngheme']:''?>"/></div>
                        </div>
                    </td>
                </tr>
                
                <tr>
                    <td style="width: 20%;"><span>Hộ khẩu</span></td>
                    <td><input type="text" name="hokhau" class="form-control" placeholder="Nhập vào hộ khẩu ..." value="<?php echo isset($data2['hokhau'])?$data2['hokhau']:''?>"/></td>
                </tr>
                <tr>
                    <td style="width: 20%;"><span>Chỗ ở hiện tại</span></td>
                    <td><input type="text" name="diachi" class="form-control" placeholder="Nhập vào nghề bố ..." value="<?php echo isset($data2['diachi'])?$data2['diachi']:''?>"/></td>
                </tr>
                <tr>
                    <td style="width: 20%;"><span>Dân tộc</span></td>
                    <td><input type="text" name="madantoc" class="form-control" placeholder="Nhập vào dân tộc ..." value="<?php echo isset($data2['madantoc'])?$data2['madantoc']:''?>"/></td>
                </tr>
                <tr>
                    <td style="width: 20%;"><span>Tôn giáo</span></td>
                    <td>
                        <select name="tongiao" class="form-control">
                            <option value="Có" >Có</option>
                            <option value="Không" selected="">Không</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="width: 20%;"><span>Hình ảnh</span></td>
                    <td><input type="file" name="hinhanh" class="form-control" value="a"/></td>
                </tr>
                <tr>
                    <td style="width: 20%;"><span></span></td>
                    <td><input type="submit" name="btndangki" class="btn btn-success right" value="Cập nhập"/></td>
                </tr>
            </tbody>
        </table>
        </form>
      <hr>