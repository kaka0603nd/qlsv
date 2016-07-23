<small>Trang chủ > nề nếp</small>
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
        
        <!--<div class="row">
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
        -->
        <center><h2 style="FONT-WEIGHT: BOLD;color: #E80D16;text-shadow: 5px 5px 5px #8C8C86;">PANEL NỀ NẾP</h2></center>
        <br />
        <br />
        <div class="panel panel-danger">
          <div class="panel-heading"><img src="<?php echo base_url();?>public/images/icon/qualification-history-icon.png" width="40px"/><span class="tieude_trang">Thông tin nề nếp</span></div>
          <div class="panel-body">
            <table class="table table-bordered" id="table_thongtingianhang">
                                <thead>
                                    <tr>
                                        <th width="5%">STT</th>
                                        <th width="9%">Mã sinh viên</th>
                                        <th width="15%">Tên sinh viên</th>
                                        <th width="30%">Vi phạm</th>
                                        <th width="17%">Kỉ luật</th>
                                        <th width="15%">date</th>
                                        <th>Chi tiết</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i=1;
                                        foreach($nenep as $row){
                                    ?>
                                    <tr>
                                        <td><span><?php echo $i?></span></td>
                                        <td><a href="<?php echo base_url();?>page/nenep/chitiet/<?php echo $row['nenep_id']?>"><span><?php echo $row['masinhvien']?></span></a></td>
                                        <td>
                                            <a href="<?php echo base_url();?>page/nenep/chitiet/<?php echo $row['nenep_id']?>"><p><?php echo $row['tensinhvien']?></p></a>
                                        </td>
                                        <td><pre class="danger" style="background-color: #E8E20E;"><?php echo $row['vipham']?></pre></td>
                                        <td>
                                            <span><?php echo $row['kiluat']?></span>
                                        </td>
                                        <td>
                                            <span id="khoa"><?php echo $row['nenep_create_at']?></span>
                                            
                                        </td>                                        
                                        <td>
                                            <a class="btn btn-default" href="<?php echo base_url();?>page/nenep/update/<?php echo $row['nenep_id']?>"><img src="<?php echo base_url();?>public/images/icon/Edit.png" width="16px"/></a><a class="btn btn-default" href="<?php echo base_url();?>page/nenep/delete_nenep/<?php echo $row['nenep_id']?>"><img src="<?php echo base_url();?>public/images/trash_mail.gif"/>
                                            
                                            
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