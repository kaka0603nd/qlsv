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
        <div class="row">
            <div class="col-md-12">
                <span class="btn btn-danger"><a href="#" style="color: white;">* Thêm bản ghi nề nếp</a></span>
            </div>
        </div>
        <br />
        <?php
            if(isset($tieude)){
                //echo 'tieude'.$tieude;
            }
        ?>
        <form action="<?php echo base_url();?>page/nenep/insert_nenep" method="post">
        <table class="table table-hover">
            
                <tbody>
                    <tr>
                        <td style="width: 20%;"><span>Mã tin</span></td>
                        <td><span>******</span></td>
                    </tr>
                    <tr>
                        <td style="width: 20%;"><span>Mã sinh viên</span></td>
                        <td>
                            <!--<input class="form-control " name="masinhvien" /> -->
                            <div id="content-x">
                            <select style="width:300px" id="states" name="masinhvien">
                                   
                                   <optgroup label="Vui lòng chọn theo tên sinh viên">
                                   <?php
                                    foreach($sinhvien as $key => $row){
                                        
                                    
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
                        <td style="width: 20%;"><span>Hình thức vi phạm</span></td>
                        <td>
                            
                            <textarea style="width: 100%;" id="editor1" name="hinhthucvipham" placeholder="Nhập vào nội dung ..."><?php if(isset($noidung)) echo $noidung?></textarea>
                            <span class="err"><?php if(isset($noidung))if(empty($noidung)) echo '* không được bỏ trống trường này'?></span>
                            <script>
                     
                               CKEDITOR.replace( 'editor1' );
                     
                           </script> 
                        </td>
                    </tr>
                    
                    <tr>
                        <td style="width: 20%;"><span>Kỉ luật</span></td>
                        <td>
                            <textarea style="width: 100%;" id="editor1" name="kiluat" placeholder="Nhập vào nội dung ..."><?php if(isset($noidung)) echo $noidung?></textarea>
                            <span class="err"><?php if(isset($trangthai))if(empty($trangthai)) echo '* trường này phải chọn'?></span>
                        </td>
                        
                    </tr>
                    <tr>
                        <td style="width: 20%;"><span>Ghi chú</span></td>
                        <td>
                            <textarea style="width: 100%;" id="editor1" name="ghichu" placeholder="Nhập vào nội dung ..."><?php if(isset($noidung)) echo $noidung?></textarea>
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