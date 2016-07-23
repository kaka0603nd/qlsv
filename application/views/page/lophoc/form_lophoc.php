<small>Trang chủ > danh sách lớp học</small>
<style>
    .panel{
        background: #f9f9f9;
        border-radius: 2px;
    }
    .panel-heading{
        padding: 2px;
    }
    .tieude_trang{
        color: #EABF1B;
        font-size: 20px;
        font-weight: bold;
        margin-left: 13px;
        font-family: serif;
    }
    
</style>
      <hr />
        
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
        <br />
        <div class="panel panel-danger">
          <div class="panel-heading"><img src="<?php echo base_url();?>public/images/icon/qualification-history-icon.png" width="40px"/><span class="tieude_trang">Thông tin lớp học</span></div>
          <div class="panel-body">
            <table class="table table-bordered" id="table_thongtingianhang">
                                <thead>
                                    <tr>
                                        <th width="5%">ID</th>
                                        <th width="9%">Mã lớp</th>
                                        <th width="20%">Tên lớp</th>
                                        <th width="13%">Tổng số</th>
                                        <th width="5%">Khóa</th>
                                        <th width="17%">Chủ nghiệm</th>
                                        <th width="15%">Ghi chú</th>
                                        <th>Chi tiết</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i=0;
                                        foreach($lophoc as $row){
                                            
                                        
                                    ?>
                                    <tr>
                                        <td><span><?php echo $row['id']?></span></td>
                                        <td><a href="#"><span><?php echo $row['malop']?></span></a></td>
                                        <td>
                                            <a href="#"><p><?php echo $row['tenlop']?></p></a>
                                            <center><a href="<?php echo base_url();?>page/lophoc/edit/<?php echo $row['id']?>">sửa</a> - <a href="<?php echo base_url();?>page/lophoc/delete_lophoc/<?php echo $row['id']?>">xóa lớp</a> - <a href="<?php echo base_url();?>page/lophoc/delete_sinhvien_full/<?php echo $row['id']?>">xóa sinh viên</a></center>
                                        </td>
                                        <td><span class="label label-danger"><?php echo $count_sv[$i].'/'.$row['tong'];?> sinh viên</span></td>
                                        <td>
                                            <span><?php echo $row['khoa']?></span>
                                        </td>
                                        <td>
                                            <span id="khoa"><?php echo $row['chunghiem']?></span>
                                            
                                        </td>
                                        <td>
                                            <span><?php echo empty($row['ghichu'])?'Not note': $row['ghichu'];?></span>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url();?>page/lophoc/show_sv_lophoc/<?php echo $row['id']?>" class="btn btn-warning"><span class="glyphicon glyphicon-shopping-cart"></span> Danh sách </a>
                                            
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                        }
                                    ?>
                                </tbody>
                                
            </table>
          </div>
        </div>