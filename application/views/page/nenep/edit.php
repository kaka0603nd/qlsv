    <link href="<?php echo base_url();?>public/select/select2.css" rel="stylesheet"/>
    <script src="<?php echo base_url();?>public/select/select2.js"></script>
    <script>
        $(document).ready(function() {
            $("#states").select2();   
        });
    </script>
    <h4><small>Trang chủ > Thêm tin mới</small></h4>
    <script src="<?php echo base_url();?>public/ckeditor/ckeditor.js"></script>
    <style>
        .err{
            margin: .5em 0 0;
            display: block;
            color: #dd4b39;
            line-height: 17px;
            font: small-caption;
        }
    </style>
      <hr>
      <center><h2 style="FONT-WEIGHT: BOLD;color: #E80D16;text-shadow: 5px 5px 5px #8C8C86;">PANEL NỀ NẾP</h2></center>
        <br />
        <br />
        <div class="row">
            <div class="col-md-12">
                <span class="btn btn-danger"><a href="<?php echo base_url()?>page/nenep/form_add" style="color: white;">* Thêm bản ghi nề nếp</a></span>
            </div>
        </div>
        <br />
        <?php
            if(isset($tieude)){
                //echo 'tieude'.$tieude;
            }
        ?>
        <form action="<?php echo base_url();?>page/nenep/action_edit/<?php echo $nenep_id?>" method="post">
        <table class="table table-hover">
            
                <tbody>
                    <tr>
                        <td style="width: 20%;"><span>Mã tin</span></td>
                        <td><span>******</span></td>
                    </tr>
                    <tr >
                        <td style="width: 20%;"><span>Mã sinh viên</span></td>
                        <td >
                            <input class="form-control " disabled="" value="<?php echo $masinhvien?>" style="text-align: center;"/>
                            <input class="form-control " name="masinhvien" value="<?php echo $masinhvien?>" type="hidden"/>
                        </td>
                        
                    </tr>
                    <tr>
                        <td style="width: 20%;"><span>Hình thức vi phạm</span></td>
                        <td>
                            
                            <textarea style="width: 100%;" id="editor1" name="hinhthucvipham" placeholder="Nhập vào nội dung ..."><?php if(isset($hinhthucvipham)) echo $hinhthucvipham?></textarea>
                            <span class="err"><?php if(isset($noidung))if(empty($noidung)) echo '* không được bỏ trống trường này'?></span>
                            <script>
                     
                               CKEDITOR.replace( 'editor1' );
                     
                           </script> 
                        </td>
                    </tr>
                    
                    <tr>
                        <td style="width: 20%;"><span>Kỉ luật</span></td>
                        <td>
                            <textarea style="width: 100%;" id="editor1" name="kiluat" placeholder="Nhập vào nội dung ..."><?php if(isset($kiluat)) echo $kiluat?></textarea>
                            <span class="err"><?php if(isset($trangthai))if(empty($trangthai)) echo '* trường này phải chọn'?></span>
                        </td>
                        
                    </tr>
                    <tr>
                        <td style="width: 20%;"><span>Ghi chú</span></td>
                        <td>
                            <textarea style="width: 100%;" id="editor1" name="ghichu" placeholder="Nhập vào nội dung ..."><?php if(isset($nenep_ghichu)) echo $nenep_ghichu?></textarea>
                            <span class="err"><?php if(isset($trangthai))if(empty($trangthai)) echo '* trường này phải chọn'?></span>
                        </td>
                        
                    </tr>
                    <tr>
                        <td style="width: 20%;"><span>Người đăng</span></td>
                        <td><span>Bathe0603nd</span></td>
                    </tr>
                    <tr>
                        <td style="width: 20%;"><span></span></td>
                        <td><input type="submit" name="btnsub" class="btn btn-success" value="Thêm bản ghi"/></td>
                    </tr>
                </tbody>
        </table>
      </form>