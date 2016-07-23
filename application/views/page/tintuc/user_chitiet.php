<h4><small>Trang chủ > Thêm tin mới</small></h4>
<br />
<style>
    .tintuc_tieude{
        
    }
    .tintuc_tieude>h3{
        margin-top: 0px;
        /*line-height: 180%;*/
        color: #c54134;
        font-size: 1.5em;
        
    }
    .tintuc_hinhanh{
        width:100%; 
        max-height:230px;
        padding:3px; 
        border:1px solid #c0c0c0;
    }
    p.time {
        line-height: 230%;
        background: url("<?php echo base_url();?>public/images/icon/cal.png") no-repeat;
        background-position: 0px 3px;
        padding-left: 25px;
    }
    .fa {
        display: inline-block;
        font: normal normal normal 14px/1 FontAwesome;
        font-size: inherit;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
</style>
<section class="row">
    <div class="col-md-4">
        <img class="tintuc_hinhanh" title="" alt="" src="<?php echo base_url();?>public/images/tintuc/<?php echo $hinhanh?>" style="" />
        
    </div>
    <div class="col-md-8">
        <section style="" class="tintuc_tieude">
            <h3><?php if(isset($tieude)) echo $tieude?></h3>
    		<p class="time"><i>Đăng vào        <?php echo $create_at ?> PM         </i></p>
    		<p style="padding-left:5px;padding-bottom:10px;">
                <i class="fa fa-user" style="margin-right:4px"></i> Đăng bởi mã :     <?php echo $user_id?>		
            </p>
    		<p style="padding-left:5px;padding-bottom:10px;"><i class="fa fa-eye" style="margin-right:4px"></i> Lượt xem :   
    		<?php echo $view?>		</p>
        </section>
    </div>
</section>
<br />
<section class="row">
    <div class="col-md-12">
        <?php
            echo $noidung;
        ?>
    </div>
</section>