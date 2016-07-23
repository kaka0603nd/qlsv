<h4><small>Trang chủ > tìm kiếm</small></h4>
<hr />
<center><h2 style="FONT-WEIGHT: BOLD;color: #E80D16;text-shadow: 5px 5px 5px #8C8C86;">DANH MỤC NỀ NẾP TRONG LỚP</h2></center>
<hr />
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
    foreach($nenep as $row){
        
        
?>
        <li>
            <figure>
                <a href="<?php echo base_url();?>page/nenep/chitiet/<?php echo $row['nenep_id']?>">
                    <img src="<?php echo base_url();?>public/images/icon/warning-icon.png" class="tintuc_hinhanh" />
                </a>   
                <figcaption class="tintuc_fig">
                    <h4><a href="<?php echo base_url();?>page/nenep/chitiet/<?php echo $row['nenep_id']?>" class="tintuc_url"><?php echo $row['tensinhvien']?> ...</a></h4>
					<p class="time"><i>
					Ngày đăng :	<?php echo $row['nenep_create_at']?> 					</i></p>
                    <p class="tintuc_nd">Mã sinh viên : <?php echo $row['masinhvien']?> </p>
                    <p class="more"><a class="more" href="<?php echo base_url();?>page/nenep/chitiet/<?php echo $row['nenep_id']?>">Chi tiết</a></p>
                </figcaption>
            </figure>
        </li>
        <?php
        }
        ?>
        
</ul>