<small>Trang chủ > danh sách sinh viên lớp học</small>
      <hr>
        
        <div class="row">
            <form>
            <div class="col-md-1"></div>
            <div class="col-md-10 box-form-selectsv">
                <div class="col-md-2" style="padding-top: 11px; padding-bottom: 7px;">
                    <span>Kiểu tìm kiếm</span>
                </div>
                <div class="col-md-3" style="padding-top: 7px;padding-bottom: 7px;">
                    <select class="form-control">
                        <option selected="selected" disabled="disabled" ><span> << Kiểu tìm kiếm >></span></option>
                        <option value="ten"><span>ten</span></option>
                    </select>
                    
                </div>
                
                <div class="col-md-4" style="padding-top: 7px;padding-bottom: 7px;">
                    <input type="text" name="key_work" class="form-control" placeholder="Nhập từ khóa ..."/>
                </div>
                <div class="col-md-2" style="padding-top: 7px;padding-bottom: 7px;">
                    <input type="submit" class="btn btn-default" value="Tìm kiếm"/>
                </div>
            </div>
            </form>
        </div>
        <div class="row">
            <div class="col-md-12">
                <span class="btn btn-danger" ><a href="<?php echo base_url();?>page/sinhvien/form_insert_sinhvien" style="color: white;text-decoration: none;"><span>* Thêm sinh viên</span></a></span>
            </div>
        </div>
        <br />
        <table class="table table-bordered" id="table_thongtingianhang">
                                <thead>
                                    <tr>
                                        <th width="5%">MSV</th>
                                        <th width="9%">Ảnh</th>
                                        <th width="25%">Name</th>
                                        <th width="13%">Năm sinh</th>
                                        <th width="8%">Mã Lớp</th>
                                        <th width="20%">Khoa</th>
                                        <th>Chi tiết</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    foreach($data as $row){
                                ?>
                                    <tr>
                                        <td><span><?php echo $row['masinhvien']?></span></td>
                                        <td><a href="#"><img src="<?php echo base_url();?>public/images/<?php echo empty($row['hinhanh'])?'icon/user.png':'sinhvien/'.$row['hinhanh']?>" id="img_thongtingianhang"/></a></td>
                                        <td>
                                            <a href="#"><p><?php echo $row['tensinhvien']?></p></a>
                                        </td>
                                        <td><span class="label label-danger"><?php echo $row['ngaysinh']?></span></td>
                                        <td>
                                            <span><?php echo $row['malop']?></span>
                                        </td>
                                        <td>
                                            <span id="khoa">Công nghệ thông tin</span>
                                            
                                        </td>
                                        <td>
                                            <a class="btn btn-warning" href="<?php echo base_url();?>page/sinhvien/form_chitietsv/<?php echo $row['id']?>"><span class="glyphicon glyphicon-shopping-cart"></span>Chi tiết</a>
                                            
                                        </td>
                                    </tr>
                                <?php
                                    }
                                ?>
                                </tbody>
                                
                            </table>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="<?php echo base_url();?>page/lophoc/get_excel/<?php echo $row['malop']?>" class="btn btn-default"><img src="<?php echo base_url();?>public/images/icon/file_xls.jpg" /> xuất file excel</a>
                                </div>
                            </div>
                            <div class="row pagination_pages">
                                <div class="col-md-9">
                                    
                                </div>
                                <div class="">
                                    <?php
                                        echo $paginations;
                                    ?>
                                </div>
                            </div>     
      