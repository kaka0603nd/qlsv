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
                <span class="btn btn-danger"><a href="#" style="color: white;">* Cập nhập điểm sinh viên khác</a></span>
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
                <input class="form-control" name="masinhvien"/>
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
                            <td><input type="text" name="diemki[]" /></td>
                            <td>
                                <select name="xeploai[]">
                                    <option value="0" selected="">Lựa chọn</option>
                                    <option value="1">Giỏi</option>
                                    <option value="2">Khá</option>
                                    <option value="3">TB</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 20%;"><span>Kì 2</span></td>
                            <td><input type="text" name="diemki[]"/></td>
                            <td><select name="xeploai[]" >
                                    <option value="0" selected="">Lựa chọn</option>
                                    <option value="1">Giỏi</option>
                                    <option value="2">Khá</option>
                                    <option value="3">TB</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td style="width: 20%;"><span>Kì 3</span></td>
                            <td><input type="text" name="diemki[]"/></td>
                            <td><select name="xeploai[]" >
                                    <option  value="0" selected="">Lựa chọn</option>
                                    <option value="1">Giỏi</option>
                                    <option value="2">Khá</option>
                                    <option value="3">TB</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td style="width: 20%;"><span>Kì 4</span></td>
                            <td><input type="text" name="diemki[]"/></td>
                            <td><select name="xeploai[]" >
                                    <option  value="0" selected="">Lựa chọn</option>
                                    <option value="1">Giỏi</option>
                                    <option value="2">Khá</option>
                                    <option value="3">TB</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td style="width: 20%;"><span>Kì 5</span></td>
                            <td><input type="text" name="diemki[]"/></td>
                            <td><select name="xeploai[]" >
                                    <option  value="0" selected="">Lựa chọn</option>
                                    <option value="1">Giỏi</option>
                                    <option value="2">Khá</option>
                                    <option value="3">TB</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td style="width: 20%;"><span>Kì 6</span></td>
                            <td><input type="text" name="diemki[]"/></td>
                            <td><select name="xeploai[]" >
                                    <option  value="0" selected="">Lựa chọn</option>
                                    <option value="1">Giỏi</option>
                                    <option value="2">Khá</option>
                                    <option value="3">TB</option>
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