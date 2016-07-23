<h4><small>Trang chủ > Thêm tin mới</small></h4>
<br />
<style>
    ul#call-news {
        padding-left: 0px;
        margin-top: 14px;
        list-style: none;
    }
    ul#call-news>li {
        float: left;
        padding: 7px 10px 0px 7px;
        /*width: 1000px !important;*/
        margin-bottom: 18px;
        border-bottom: 1px dashed #c0c0c0;
        width: 100%;
    }
    figure {
        margin: 0px;
        padding: 0px;
    }
    a.tintuc_url{
        text-decoration: none;
        color: #287aa1;
    }
    img.tintuc_hinhanh{
        float: left;
        margin-right: 14px;
        width: 150px;
        padding: 3px;
        border: 1px solid #eeeeee;
    }
    .tintuc_fig{
        float: left;
        /*width: 73%;*/
    }
    .tintuc_fig>h4>a{
        font-weight: bold;
    }
    p.time{
        color: #666666;
        line-height: 18px;
        margin-top: 8px;
        margin-bottom: 20px;
    }
    p.tintuc_nd{
        color: #666666;
        line-height: 18px;
        margin-top: 8px;
        margin-bottom: 20px;
    }
    .more>a{
        color: #f60;
    }
</style>
<ul id="call-news">
<?php
    foreach($get_data as $row){
?>
        <li>
            <figure>
                <a href="<?php echo base_url();?>page/tintuc/chitiet_tintuc/<?php echo $row['id']?>">
                    <img src="<?php echo base_url();?>public/images/tintuc/thumb/thumb-<?php echo $row['hinhanh']?>" class="tintuc_hinhanh" />
                </a>   
                <figcaption class="tintuc_fig">
                    <h4><a href="<?php echo base_url();?>page/tintuc/chitiet_tintuc/<?php echo $row['id']?>" class="tintuc_url"><?php echo $row['tieude']?> ...</a></h4>
					<p class="time"><i>
					Đăng vào	<?php echo $row['create_at']?> 					</i></p>
                    <p class="tintuc_nd"><?php echo $row['tieude']?> ...</p>
                    <p class="more"><a class="more" href="<?php echo base_url();?>page/tintuc/chitiet_tintuc/<?php echo $row['id']?>">Chi tiết</a></p>
                </figcaption>
            </figure>
        </li>
        <?php
        }
        ?>
        <!--
        <li>
            <figure>
                <a href="madangnhap">
                    <img src="<?php echo base_url();?>public/images/icon/201462173111.jpg" class="tintuc_hinhanh"/>
                </a>   
                <figcaption class="tintuc_fig">
                    <h4><a href="madangnhap" class="tintuc_url">Thời gian, địa điểm, danh sách báo cáo các tiểu ban </a></h4>
					<p class="time"><i>
					Đăng vào					15-04-2016 15:25 PM 					</i></p>
                    <p class="tintuc_nd">Nhà trường đã có quyết định số 885/QĐ-ĐHGTVT về việc thành lập các tiểu ban nghiệm thu đề tài NCH SV, theo đó khoa CNTT có 02 tiểu ban. Danh sách các thành viên tiểu ban và các đề tài thuộc tiểu ban trong file đính kèm</p>
                    <p class="more"><a class="more" href="madangnhap">Chi tiết</a></p>
                </figcaption>
            </figure>
        </li>
        -->
</ul>
<div class="row pagination_pages">
            <div class="col-md-9">
                
            </div>
            <div class="">
                <?php
                    echo $pagination_pages;
                ?>
            </div>
        </div>     

