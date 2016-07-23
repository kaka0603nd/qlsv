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
      <hr/>
        <div class="row">
            <div class="col-md-12">
                <span class="btn btn-danger"><a href="#" style="color: white;">* Cập nhập chính sách sinh viên khác</a></span>
            </div>
        </div>
        <br />
        <?php
            if(isset($tieude)){
                //echo 'tieude'.$tieude;
            }
        ?>
        <form action="<?php echo base_url();?>page/chinhsach/action_add" method="post">
        <div class="row" style="padding-bottom: 10px;">
            <div class="col-md-12">
                <span>Chọn sinh viên</span>
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
            </div>
        </div>
        <div class="row">
            
            <div class="col-md-12">
                <table class="table table-hover">    
                    <thead>
                        <tr>
                            <th><span>Lựa chọn</span></th>
                            <th>Tên chính sách</th>
                            <th>Chế độ</th>
                        </tr>
                    </thead>        
                    <tbody>
                    <?php
                        foreach($chinhsach as $key => $row){
                            
                        
                    ?>
                        <tr>
                            <td style="width: 20%;"><input type="checkbox" value="<?php echo $row['id']?>" name="chinhsach[]"/></td>
                            <td><span><?php echo $row['tenchinhsach']?></span></td>
                            <td>
                                <span><?php echo $row['chedo']?></span>
                            </td>
                        </tr>
                      <?php
                      }
                      ?> 
                        <tr>
                            <td colspan="3">
                                <button type="submit" name="btn_capnhap">Cập nhập chính sách</button>
                                <!--<input type="submit" name="btn_capnhap" value="Cap nhap"/> -->
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        </form>