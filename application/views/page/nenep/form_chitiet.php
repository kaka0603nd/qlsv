<small>Trang chủ > chi tiết nề nếp sinh viên</small>
      <hr>
      <style>
        h4{
            color: #EC272E;
        }
      </style>
      <center><h2 style="FONT-WEIGHT: BOLD;color: #E80D16;text-shadow: 5px 5px 5px #8C8C86;">THÔNG TIN NỀ NẾP</h2></center>
        <br />
        <br />
      <div class="row">
        <div class="col-md-3">
            <img <img src="<?php echo base_url();?>public/images/<?php echo empty($sinhvien_hinhanh)?'icon/user.png':'sinhvien/'.$sinhvien_hinhanh?>"  width="100%"/>
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
                                    <option value="1"><?php echo $malop.' - '.$tenlop ?></option>
                                    
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
                    </tbody>
                </table>
            </div>
      </div>
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
      <div class="row">
        <div class="col-md-12">
            <div class="panel panel-danger">
                <div class="panel-heading"><img src="<?php echo base_url();?>public/images/icon/qualification-history-icon.png" width="40px"/><span class="tieude_trang">Thông tin nề nếp</span></div>
                <div class="panel-body">
                    <table class="table table-condensed table-hover">
                        <tbody>
                            <tr>
                                <td>Mã vi phạm</td>
                                <td><?php echo $nenep_id?></td>
                            </tr>
                            <tr>
                                <td>Tên vi phạm</td>
                                <td><?php echo $hinhthucvipham?></td>
                            </tr>
                            <tr>
                                <td>Hình thức kỉ luật</td>
                                <td><?php echo $kiluat?></td>
                            </tr>
                            <tr>
                                <td>Ngày update</td>
                                <td><?php echo $create_at?></td>
                            </tr>
                            <tr>
                                <td>Ghi chu</td>
                                <td><?php echo $ghichu?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>
            
            
            