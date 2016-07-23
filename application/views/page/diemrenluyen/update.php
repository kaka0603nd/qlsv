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
                <!--<span class="btn btn-danger"><a href="#" style="color: white;">* Cập nhập điểm sinh viên khác</a></span> -->
            </div>
        </div>
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
                <input class="form-control" value="<?php echo $masinhvien?>" style="text-align: center;" disabled=""/>
            </div>
        </div>
        <div class="row">
            <input class="form-control" name="masinhvien" value="<?php echo $masinhvien?>" type="hidden"/>
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
                            <td><input type="text" name="diemki[]" value="<?php echo $diemrenluyen1?>"/></td>
                            <td>
                                <select name="xeploai[]">
                                    <option value="0" <?php echo $xeploai1 ==0?'selected=""':''?> >Lựa chọn</option>
                                    <option value="1" <?php echo $xeploai1 ==1?'selected=""':''?>>Giỏi</option>
                                    <option value="2" <?php echo $xeploai1 ==2?'selected=""':''?>>Khá</option>
                                    <option value="3" <?php echo $xeploai1 ==3?'selected=""':''?>>TB</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 20%;"><span>Kì 2</span></td>
                            <td><input type="text" name="diemki[]" value="<?php echo $diemrenluyen2?>"/></td>
                            <td><select name="xeploai[]" >
                                    <option value="0" <?php echo $xeploai2 ==0?'selected=""':''?> >Lựa chọn</option>
                                    <option value="1" <?php echo$xeploai2 ==1?'selected=""':''?>>Giỏi</option>
                                    <option value="2" <?php echo $xeploai2 ==2?'selected=""':''?>>Khá</option>
                                    <option value="3" <?php echo $xeploai2 ==3?'selected=""':''?>>TB</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td style="width: 20%;"><span>Kì 3</span></td>
                            <td><input type="text" name="diemki[]" value="<?php echo $diemrenluyen3?>"/></td>
                            <td><select name="xeploai[]" >
                                    <option value="0" <?php echo $xeploai3 ==0?'selected=""':''?> >Lựa chọn</option>
                                    <option value="1" <?php echo $xeploai3 ==1?'selected=""':''?>>Giỏi</option>
                                    <option value="2" <?php echo $xeploai3 ==2?'selected=""':''?>>Khá</option>
                                    <option value="3" <?php echo $xeploai3 ==3?'selected=""':''?>>TB</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td style="width: 20%;"><span>Kì 4</span></td>
                            <td><input type="text" name="diemki[]" value="<?php echo $diemrenluyen4?>"/></td>
                            <td><select name="xeploai[]" >
                                    <option value="0" <?php echo $xeploai4 ==0?'selected=""':''?> >Lựa chọn</option>
                                    <option value="1" <?php echo $xeploai4 ==1?'selected=""':''?>>Giỏi</option>
                                    <option value="2" <?php echo $xeploai4 ==2?'selected=""':''?>>Khá</option>
                                    <option value="3" <?php echo $xeploai4 ==3?'selected=""':''?>>TB</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td style="width: 20%;"><span>Kì 5</span></td>
                            <td><input type="text" name="diemki[]" value="<?php echo $diemrenluyen5?>"/></td>
                            <td><select name="xeploai[]" >
                                    <option value="0" <?php echo $xeploai5 ==0?'selected=""':''?> >Lựa chọn</option>
                                    <option value="1" <?php echo $xeploai5 ==1?'selected=""':''?>>Giỏi</option>
                                    <option value="2" <?php echo $xeploai5 ==2?'selected=""':''?>>Khá</option>
                                    <option value="3" <?php echo $xeploai5 ==3?'selected=""':''?>>TB</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td style="width: 20%;"><span>Kì 6</span></td>
                            <td><input type="text" name="diemki[]" value="<?php echo $diemrenluyen6?>"/></td>
                            <td><select name="xeploai[]" >
                                    <option value="0" <?php echo $xeploai6 ==0?'selected=""':''?> >Lựa chọn</option>
                                    <option value="1" <?php echo $xeploai6 ==1?'selected=""':''?>>Giỏi</option>
                                    <option value="2" <?php echo $xeploai6 ==2?'selected=""':''?>>Khá</option>
                                    <option value="3" <?php echo $xeploai6 ==3?'selected=""':''?>>TB</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <button type="submit">Cập nhập điểm rèn luyện</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        </form>