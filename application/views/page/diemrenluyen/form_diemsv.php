<small>Trang chủ > danh sách sinh viên</small>
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
                                        <th width="5%">STT</th>
                                        <th width="20%">Mã sinh viên</th>
                                        <th width="30%" colspan="6">Điểm rèn luyện</th>
                                        <th width="30%" colspan="6">Xếp loại</th>
                                        <th>Chi tiết</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $i = 1;
                                    //$j = 1;
                                    foreach($data as $row){
                                ?>
                                    <tr>
                                        <td><span><?php echo $i?></span></td>
                                        <td><a href="#"><span><?php echo $row['masinhvien']?></span></a></td>
                                        <?php
                                            for($j=1;$j<=6;$j++){
                                                ?>
                                                <td>
                                                    <a href="#"><p><?php echo $row['diemrenluyen'.$j];?></p></a>
                                                </td>
                                                <?php
                                            }
                                        ?>
                                        <?php
                                            for($k=1;$k<=6;$k++){
                                                ?>
                                                <td>
                                                    <a href="#"><p><?php echo $row['xeploai'.$k];?></p></a>
                                                </td>
                                                <?php
                                            }
                                        ?>
                                        
                                        
                                        
                                        
                                        <td>
                                            <a class="btn btn-warning" href="<?php echo base_url();?>page/sinhvien/form_sv_masinhvien/<?php echo $row['masinhvien']?>"><span class="glyphicon glyphicon-shopping-cart"></span> EDIT</a>
                                            
                                        </td>
                                    </tr>
                                <?php
                                    $i++;
                                    }
                                ?>
                                </tbody>
                                
                            </table>
                            <div class="row pagination_pages">
            <div class="col-md-9">
                
            </div>
            <div class="">
                <?php
                    echo $paginations;
                ?>
            </div>
        </div>     
      