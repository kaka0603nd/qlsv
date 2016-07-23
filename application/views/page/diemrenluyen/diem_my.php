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
        <center><h2 style="FONT-WEIGHT: BOLD;color: #E80D16;text-shadow: 5px 5px 5px #8C8C86;">DANH MỤC ĐIỂM RÈN LUYỆN</h2></center>
        <br />
        <?php
            if(isset($tieude)){
                //echo 'tieude'.$tieude;
            }
        ?>
        <form action="<?php echo base_url();?>page/diemrenluyen/action_insert" method="post">
        <div class="row" style="padding-bottom: 10px;">
            <div class="col-md-12">
                <span>Mã sinh viên</span>
                <input class="form-control" name="masinhvien" disabled="" value="<?php echo $masinhvien?>" style="text-align: center;FONT-WEIGHT: BOLD;"/>
            </div>
        </div>
        <div class="row">
            
            <div class="col-md-12">
                <table class="table table-hover">    
                    <thead>
                        <tr>
                            <th><span>KÌ HỌC</span></th>
                            <th>ĐIỂM RÈN LUYỆN</th>
                            <th>XẾP LOẠI</th>
                        </tr>
                    </thead>        
                    <tbody>
                        <tr>
                            <td style="width: 20%;"><span>Kì 1</span></td>
                            <td><input type="text" name="diemki[]" value="<?php echo $diemrenluyen1?>" disabled="" /></td>
                            <td>
                                <select name="xeploai[]" disabled="">
                                    <option value="0" selected="">
                                    <?php 
                                        $xeploai = $xeploai1;
                                        if(!empty($xeploai)){
                                            if($xeploai == 1){
                                                echo 'Giỏi';
                                            }else{
                                                if($xeploai == 2)
                                                    echo 'Khá';
                                                else{
                                                    echo 'Trung bình';
                                                }
                                            }
                                        }
                                        
                                    ?>
                                    </option>
                                    
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 20%;"><span>Kì 2</span></td>
                            <td><input type="text" name="diemki[]" value="<?php echo $diemrenluyen2?>" disabled=""/></td>
                            <td><select name="xeploai[]" disabled="">
                                    <option value="0" selected="">
                                    <?php 
                                        $xeploai = $xeploai2;
                                        if(!empty($xeploai)){
                                            if($xeploai == 1){
                                                echo 'Giỏi';
                                            }else{
                                                if($xeploai == 2)
                                                    echo 'Khá';
                                                else{
                                                    echo 'Trung bình';
                                                }
                                            }
                                        }
                                        
                                    ?>
                                    </option>
                                    
                                </select></td>
                        </tr>
                        <tr>
                            <td style="width: 20%;"><span>Kì 3</span></td>
                            <td><input type="text" name="diemki[]" value="<?php echo $diemrenluyen3?>" disabled=""/></td>
                            <td><select name="xeploai[]" disabled="">
                                    <option value="0" selected="">
                                    <?php 
                                        $xeploai = $xeploai3;
                                        if(!empty($xeploai)){
                                            if($xeploai == 1){
                                                echo 'Giỏi';
                                            }else{
                                                if($xeploai == 2)
                                                    echo 'Khá';
                                                else{
                                                    echo 'Trung bình';
                                                }
                                            }
                                        }
                                        
                                    ?>
                                    </option>
                                    
                                </select></td>
                        </tr>
                        <tr>
                            <td style="width: 20%;"><span>Kì 4</span></td>
                            <td><input type="text" name="diemki[]" value="<?php echo $diemrenluyen4?>" disabled=""/></td>
                            <td><select name="xeploai[]" disabled="">
                                    <option value="0" selected="">
                                    <?php 
                                        $xeploai = $xeploai4;
                                        if(!empty($xeploai)){
                                            if($xeploai == 1){
                                                echo 'Giỏi';
                                            }else{
                                                if($xeploai == 2)
                                                    echo 'Khá';
                                                else{
                                                    echo 'Trung bình';
                                                }
                                            }
                                        }
                                        
                                    ?>
                                    </option>
                                    
                                </select></td>
                        </tr>
                        <tr>
                            <td style="width: 20%;"><span>Kì 5</span></td>
                            <td><input type="text" name="diemki[]" value="<?php echo $diemrenluyen5?>" disabled=""/></td>
                            <td><select name="xeploai[]" disabled="">
                                    <option value="0" selected="">
                                    <?php 
                                        $xeploai = $xeploai5;
                                        if(!empty($xeploai)){
                                            if($xeploai == 1){
                                                echo 'Giỏi';
                                            }else{
                                                if($xeploai == 2)
                                                    echo 'Khá';
                                                else{
                                                    echo 'Trung bình';
                                                }
                                            }
                                        }
                                        
                                    ?>
                                    </option>
                                    
                                </select></td>
                        </tr>
                        <tr>
                            <td style="width: 20%;"><span>Kì 6</span></td>
                            <td><input type="text" name="diemki[]" value="<?php echo $diemrenluyen6?>" disabled=""/></td>
                            <td><select name="xeploai[]" disabled="">
                                    <option value="0" selected="">
                                    <?php 
                                        $xeploai = $xeploai6;
                                        if(!empty($xeploai)){
                                            if($xeploai == 1){
                                                echo 'Giỏi';
                                            }else{
                                                if($xeploai == 2)
                                                    echo 'Khá';
                                                else{
                                                    echo 'Trung bình';
                                                }
                                            }
                                        }
                                        
                                    ?>
                                    </option>
                                    
                                </select></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <a href="<?php echo base_url();?>page/tintuc" class="btn btn-info">  Về trang chủ ...</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        </form>