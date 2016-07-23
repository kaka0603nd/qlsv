<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  -->
  <link rel="stylesheet" href="<?php echo base_url();?>public/dist/css/bootstrap.min.css" />
  <script src="<?php echo base_url();?>public/jquery/jquery-2.2.0.js"></script>
  <script src="<?php echo base_url();?>public/dist/js/bootstrap.min.js"></script>
  <style>
    .row.content {height: auto}
    
    .sidenav {
      background-color: #f1f1f1;
      height: auto;
    }
    
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
  <style>
  body{
    background-image:url(<?php echo base_url();?>public/images/bg.jpg);
  }
  body{
        background-image: url(<?php echo base_url();?>public/images/icon/13117Background-dep-mua-thu-la-vang-roi.jpg);
        background-attachment: fixed;
        /*background-repeat: no-repeat;*/
        background-position: center;
        background-size: 100%;
    }
                    div#title_thongtingianhang{
                        font-size: 24px;
                        margin-bottom: 5px;
                        font-family: serif;
                        font-weight: bold;
						color:#00F;
                    }
                    table#table_thongtingianhang{
                        width: 100%;
                        font-size: 16px;
                        font-family: serif;
                    }
                    img#img_thongtingianhang{
                        width: 60px;
                    }
                    table{
                        background: #f7f7f7 none repeat scroll 0 0;
                        margin-bottom: 20px;
                    }
                    table thead tr th{
                        background: #a1aaaf none repeat scroll 0 0;
                        border-bottom: 1px solid #fff;
                        border-right: 1px solid #fff;
                        color: #fff;
                        font-size: 14px;
                        font-weight: 300;
                        text-align: left;
                    }
                    #date_update{
                        font-style: italic;
                        font-size: 12px;
                        color: #E0E0DC;
                    }
                    #khoa{
                        color:#F00;
						font-weight:bold;
						font-size:16px;
                    }
                </style>
                <style>
					
                </style>
</head>
<body>
<div class="container">
    <div class="row">
        <img src="<?php echo base_url();?>public/images/icon/bg_banner.png" width="100%" height="150px"/>
    </div>
</div>
<style>
	#thanh-menu{
        height: auto;
        background-color: #152C55;
        font: Arial, Helvetica, sans-serif;
        margin-top: 0;
        font-size: 12pt;
        font-weight: bold;
        color: #FFF;
        border: 1px solid #ffffff;
	}
	#menu a, #dangnhap a{
		/*color:#FFF;*/
		text-decoration:none;

	}
	#menu, #dangnhap{
		margin-top: 7px;
    	margin-bottom: 12px;
        padding-right: 8px;
	}
	.col-sm-3 { 
		/*width: 20%;*/
		border:1px solid #CCC;
		box-shadow:5px 5px 5px #F7F7F7;
	}
	.col-sm-9 { 
		/*width: 80%;*/
		border:1px solid #CCC;
		/*box-shadow:5px 5px 5px #F7F7F7;*/
	}
	.bg-images{
		background-image:url(<?php echo base_url();?>public/images/icon/bg.jpg);
	}
</style>
<style>
            /*
                #search-box .search-area {
                    border: 1px solid #ee3124;
                    margin: 6px 0 0;
                    background: #fff;
                    border-radius: 3px;
                }
                .control-group {
                    position: relative;
                }
                #search-box .search-area .search-field {
                    border: none;
                    width: 86%;
                    padding: 8px;
                    border-radius: 3px 0 0 3px;
                    height: 30px;
                }
                .control-group .search-clear {
                    position: absolute;
                    top: 9px;
                    right: 62px;
                    width: 22px;
                    height: 22px;
                    background: rgba(0,0,0,.2);
                    color: #fff;
                    cursor: pointer;
                    font-weight: 700;
                    text-align: center;
                    border: none;
                    outline: 0;
                    border-radius: 2px;
                }
                #search-box .search-area .search-button {
                    float: right;
                    display: inline-block;
                    text-align: center;
                    padding: 9px 15px 8px;
                    margin: -1px -1px 0 0;
                    background-color: #ee3124;
                    text-decoration: none;
                    border-radius: 0 3px 3px 0;
                }
                .icon-search{
                    width: 30px;
                }
                */
                .form-control{
                    padding: 6px 38px 6px 12px;
                }
                #search-box{
                    position: relative;
                }
                .btn-search{
                    position: absolute;
                    top: 0px;
                    right: 0px;
                    height: 100%;
                    width: 77px;
                    background: #ffffff;
                    border: 1px solid #ccc;
                    border-bottom-right-radius: 3px;
                    border-top-right-radius: 3px;
                }
                .show_search_pro{
					display: none;
					margin-top: 1px;
					background-color: #CCC;
					height: auto;
					width: 86%;
					position: absolute;
					z-index: 59999999999;
					-moz-border-bottom-colors: none;
					-moz-border-left-colors: none;
					-moz-border-right-colors: none;
					-moz-border-top-colors: none;
					background: #fff none repeat scroll 0 0;
					border-color: #d9d9d9 #ccc #ccc;
					border-image: none;
					border-style: solid;
					border-width: 1px;
					box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
					cursor: default;
                }
				.ul-search-form{
					padding-left: 5px;
    				padding-top: 5px;
				}
				.ul-search-form li{
					list-style:none;
					border-bottom:1px dotted #FFF0F4;
					margin-bottom: 2px;
					/*padding-bottom:2px;*/
				}
				.ul-search-form li:hover{
					box-shadow:5px 5px 5px #fffaaa;
				}
				.ul-search-form li a{
					text-decoration:none;
				}
				.ul-search-form li a img{
					width: 55px;
    				border: 1px solid;
					float:left;
				}
				.form-search-info{
					color:#318DFD;
					padding-left: 74px;
				}
				.search-money{
					color:#DC4B11;
				}
                .thongtin_search{
                    color: #A09898;
                    font-size: 14px;
                }
                .hiden_search{
                    display: none;
                    position: fixed;
                    height: 100%;
                    width: 100%;
                    background: #fffaaa;
                    z-index: 55555;
                    opacity: 0;
                }
            </style>
            <script>
				$(document).ready(function(e) {
                    $('.input_search').keyup(function(){
						var data = $(this).val();
                        if(data == " "){
                            $('.show_search_pro').hide("slow");
                            $('.ul-search-form').html("");
                            
                        }
                        else{
                            $.ajax({
    							url:"<?php echo base_url();?>page/search/search_auto",
    							data:{
    								key:data
    							},
    							dataType:"text",
    							type:"POST",
    							success: function(result){
    							 $('.hiden_search').show();
						              $('.show_search_pro').slideDown("slow");
    								$('.ul-search-form').html(result);
    								//alert(result);
    							}
    						});
                        }
					});
					
                    $('.hiden_search').click(function(){
                        $('.input_search').val("");
						$('.show_search_pro').hide("slow");
                        $('.ul-search-form').html("");
                        $('.hiden_search').hide();
                    });
                    
					
					
					$('.forcus_head').focusout(function(){
						$('.input_search').val("");
					});
                    
                    /*
                    $('.show_search_pro').focusout(function(){
						$('.input_search').val("");
						$('.this').hide("slow");
                        $('.ul-search-form').html("");
					});
                    */
                });
            </script>
<div class="container" id="thanh-menu">
    <div id="dangnhap">
	<div class="col-md-4">
    	<div  id="menu" > 
                <a href="<?php echo base_url();?>page/tintuc" style="color: white;"><span class="glyphicon glyphicon-home"></span> Trang chủ</a> |  
                <!--<a href="timkiem.php">Tìm kiếm</a>	| -->
                <a href="gioithieu.php" style="color: white;">Giới thiệu</a>		 
        </div>
    </div>
    <div class="col-md-6">
                <form action="<?php echo base_url();?>page/search/search_pro" method="get" id="form-search">
                    <div id="search-box" class="clearfix">
                        <input class="form-control input_search" name="key" type="text"  maxlength="80" placeholder="Nhập nội dung tìm kiếm..." />
                        <span class="search-clear" id="SearchClear" style=""><i class="icons icon-cancel-5"></i></span>            
                        <button class="btn-search"><img src="<?php echo base_url();?>public/images/icon/Search.png" class="icon-search"/></button>
                        <div class="show_search_pro">
                            <ul class="ul-search-form">
                            	<!--<li>
                                	<a href="<?php echo base_url();?>home/sanpham/">
                                    	<img src="<?php echo base_url();?>public/sanpham/thumb/thumb-image_null.png" width="20px"/>
                                        <div class="form-search-info">
                                            <p>Sam sung ultra hd 365k</p>
                                            <p class="search-money">956000 USD</p>
                                        </div>
                                    </a>
                                </li>
                                -->
                                
                            </ul>
                        </div>
                    </div>
                            
                </form>
                <div class="result-search">
                </div> 
    </div>
    <div class="col-md-2">
    	<div>
            <div class="btn-group">
              <button type="button" class="btn btn-danger">Action</button>
              <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Thông tin</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo base_url();?>page/login/logout">Đăng xuất</a></li>
              </ul>
            </div>
        </div>
    </div>
	</div>
    
</div>
<div class="hiden_search">
</div>
<style>
body {
    font-family: 'Myriad Pro Condensed';
    font-size: 15px;
    color: #333;
    
    margin: 0 auto;
}

    .custom_center{
        background-color: #D9E6E6;
        border: 1px solid #fffaaa;
        border-radius: 2px;
    }
    .custom_center>div>img{
        padding: 13px;
        width: 61px;
    }
    .name_dangnhap{
        font-size: 18px;
        font-weight: bold;
        color: #D86D0F;
    }
    .custom_center>div{
        color: #1A15E6;
        font-size: 14px;
        font-weight: bold;
        font-family: serif;
    }
</style>
<div class="container">
  <div class="row content bg-images">
    <div class="col-sm-3 sidenav">
      <div class="row">
        <div class="col-md-12">
            <center class="custom_center">
                <div><img src="<?php echo base_url();?>public/images/icon/user.png"/><span class="name_dangnhap"><?php echo $this->session->userdata('name')?></span></div>
                <div class="lever_dangnhap">Level : <span>
                <?php 
                    $levels = $this->session->userdata('level');
                    if($levels == 1){
                        echo 'Admin';
                    }else{
                        if($levels == 2){
                            echo 'Lớp trưởng';
                        }else{
                            echo 'Sinh viên';
                        }
                    }
                ?></span></div>
                
            </center>
            <img src="<?php echo base_url();?>public/images/icon/sidebarSep.png" width="100%"/>
        </div>
      </div>
      <!--
      <form>
      <div class="input-group">
        
            <input type="text" class="form-control" placeholder="Search Blog.." />
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">
                <span class="glyphicon glyphicon-search"></span>
              </button>
            </span>
        
        
      </div>
      </form>
      -->
      <br />
      <style>
        .sidenav {
            background-color: #ECEBEB;
            height: auto;
            border-radius: 4px;
            /*border: 1px solid #BFBFBD;*/
            box-sizing: border-box;
        }
        .menu_doc1{
            
        }
        .menu_doc1>li{
            border: 1px solid #DCDCD7;
            box-shadow: 5px 5px 5px #D6D6D1;
            border-radius: 2px;
            position: relative;
        }
        .menu_doc1>li>a>span{
            padding-right: 12px;
        }
        .menu_doc1>li>ul>li>a>span{
            padding-right: 12px;
        }
        .menu_doc2{
            padding: 10px 15px;
            margin-left: 25px;
        }
        .menu_doc2 li{
            list-style: none;
        }
        .menu_doc2>li>a{
            text-decoration: none;
        }
        .menu_soxuong{
            position: absolute;
            right: 0px;
            top: 12px;
        }
		.menu_doc{
			display:none;
		}
        /*
        .menu_soxuong1{
            padding-left: 121px;
        }
        .menu_soxuong2{
            padding-left: 39px;
        }
        .menu_soxuong3{
            padding-left: 60px;
        }
        .menu_soxuong4{
            padding-left: 35px;
        }
        .menu_soxuong5{
            padding-left: 26px;
        }
        .menu_soxuong6{
            padding-left: 48px;
        }
        */
      </style>
      <script>
	  	$(document).ready(function(e) {
            $('.li_menu_doc1').click(function(){
				$('.menu_doc').slideUp("slow");
				$(this).children('.menu_doc').slideDown("slow");
			});
        });
      </script>
      <ul class="nav nav-pills nav-stacked menu_doc1">
        <li class="li_menu_doc1">
            <a href="#section1"><span class="glyphicon glyphicon-dashboard"></span><span>Dashboard</span></a>
        </li>
        <li class="li_menu_doc1">
            <a ><span class="glyphicon glyphicon-info-sign"></span><span>Tin tức</span><span class="glyphicon glyphicon-menu-down menu_soxuong"></span></a>
            <ul class="menu_doc">
            <?php
                if($levels == 2 || $levels == 3){
                    ?>
                        <li><a href="<?php echo base_url();?>page/tintuc/">Thông tin nổi bật khoa</a></li>
                    <?php
                }
                else{
                    ?>
                        <li><a href="<?php echo base_url();?>page/tintuc/">Thông tin nổi bật khoa</a></li>
                        <li><a href="<?php echo base_url();?>page/tintuc/get_tintuc">Danh mục tin tức</a></li>
                        <li><a href="<?php echo base_url();?>page/tintuc/form_insert_info"></span>Thêm tin khác</a></li>
                    <?php
                }
            ?>
                
            </ul>
        </li>
        <li class="li_menu_doc1">
            <a ><span class="glyphicon glyphicon-file"></span><span>Danh mục sinh viên</span><span class="glyphicon glyphicon-menu-down menu_soxuong"></span></a>
            <ul class="menu_doc">
            <?php
                if($levels == 2 || $levels == 3){
                    ?>
                        <li><a href="<?php echo base_url();?>page/sinhvien">Danh sách sinh viên trong khoa</a></li>
                    <?php
                }
                else{
                    ?>
                        <li><a href="<?php echo base_url();?>page/sinhvien">Danh sách sinh viên</a></li>
                        <li><a href="<?php echo base_url();?>page/sinhvien/form_insert_sinhvien">Thêm sinh viên</a></li>
                    <?php
                }
            ?>
                
                
            </ul>
        </li>
        <li class="li_menu_doc1">
            <a ><span class="glyphicon glyphicon-user"></span> <span>Danh mục điểm</span><span class="glyphicon glyphicon-menu-down menu_soxuong"></span></a>
            <ul class="menu_doc">
                <?php
                if($levels == 2 || $levels == 3){
                    ?>
                        <li><a href="<?php echo base_url();?>page/diemrenluyen/diemrenluyen_my">Xem điểm rèn luyện</a></li>
                    <?php
                }
                else{
                    ?>
                        <li><a href="<?php echo base_url();?>page/diemrenluyen">Quản lý điểm rèn luyện</a></li>
                        <li><a href="<?php echo base_url();?>page/diemrenluyen/insert">Thêm điểm sinh viên</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#myModal">Cập nhập điểm sinh viên</a></li>
                    <?php
                }
                ?>
                
                
            </ul>
        </li>
        <li class="li_menu_doc1">
            <a ><span class="glyphicon glyphicon-wrench"></span><span>Danh mục nề nếp</span><span class="glyphicon glyphicon-menu-down menu_soxuong"></span></a>
            <ul class="menu_doc">
                <?php
                if($levels == 3){
                    ?>
                        <li><a href="<?php echo base_url();?>page/nenep/user_nenep">Sinh viên vi phạm cùng lớp</a></li>
                    <?php
                }
                else{
                    ?>
                        <li><a href="<?php echo base_url();?>page/nenep">Danh mục nề nếp</a></li>
                        <li><a href="<?php echo base_url();?>page/nenep/form_add">Thêm danh sách nề nếp</a></li>
                    <?php
                }
                ?>
                
            </ul>
        </li>
        <!--<li class="li_menu_doc1">
            <a ><span class="glyphicon glyphicon-wrench"></span><span>Danh mục hồ sơ(sv)</span><span class="glyphicon glyphicon-menu-down menu_soxuong"></span></a>
            <ul class="menu_doc">
                <li><a href="#">Danh mục hồ sơ sinh viên</a></li>
                <li><a href="#">Thêm danh mục khác</a></li>
            </ul>
        </li>
        -->
        <?php
                if($levels == 1){
                    ?>
                        <li class="li_menu_doc1">
                        <a ><span class="glyphicon glyphicon-stats"></span><span>Danh mục chính sách</span><span class="glyphicon glyphicon-menu-down menu_soxuong"></span></a>
                        <ul class="menu_doc">
                            <li><a href="<?php echo base_url();?>page/chinhsach/add">Thêm sinh viên chính sách</a></li>
                            <li><a href="<?php echo base_url();?>page/chinhsach/danhmuc">Thêm danh mục</a></li>
                        </ul>
                    </li>
                    <?php
                }
                
                    ?>
                     
        
        
        <li class="li_menu_doc1">
            <a ><span class="glyphicon glyphicon-stats"></span><span>Danh mục lớp học</span><span class="glyphicon glyphicon-menu-down menu_soxuong"></span></a>
            <ul class="menu_doc">
                <?php
                if($levels == 2 || $levels == 3){
                    ?>
                        <li><a href="<?php echo base_url();?>page/lophoc/sinhvien_cunglop">Danh sách sinh viên cùng lớp</a></li>
                    <?php
                }
                else{
                    ?>
                        <li><a href="<?php echo base_url();?>page/lophoc/all">Danh sách các lớp học</a></li>
                        <li><a href="<?php echo base_url();?>page/lophoc/add_lop">Thêm lớp học</a></li>
                        <!--<li><a href="#">Thêm bộ môn học</a></li> -->
                    <?php
                }
                ?>
                
            </ul>
        </li>
      </ul>
      <br>
      
    </div>
    <div class="col-sm-9">
        <div class="row">
            <div class="col-md-12">
                <?php
                //var_dump($data);
                    $this->load->view($url,$data);
                ?>
            </div>
          </div>        
      <hr>
    </div>
  </div>
</div>
<link href="<?php echo base_url();?>public/select/select2.css" rel="stylesheet"/>
    <script src="<?php echo base_url();?>public/select/select2.js"></script>
    <script>
        $(document).ready(function() {
            $("#states").select2();   
        });
    </script>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Chọn mã sinh viên để cập nhập điểm</h4>
      </div>
      <form action="<?php echo base_url();?>page/diemrenluyen/update" method="post">
      <div class="modal-body">
        <div id="content-x">
            
                <select style="width:300px" id="states" name="masinhvien">
                                   
                                   <optgroup label="Vui lòng chọn theo tên hoặc mã sinh viên">
                                   <?php
                                   $CI = &get_instance();
                                   $CI->load->model('Sinhvien_model');
                                    $result = $CI->Sinhvien_model->get_all_sv();
                                    foreach($result as $key => $row){
                                        
                                    
                                   ?>
                                       <option value="<?php echo $row['masinhvien']?>"><?php echo $row['tensinhvien'].' - '.$row['masinhvien']?></option>
                                   <?php
                                    }
                                   ?>
                                   </optgroup>
                                  </select>
            
                            
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Chọn</button>
      </div>
      </form>
    </div>
  </div>
</div>

<footer class="container" style="text-align: center;">
    <p>Bản quyền thuộc Khoa Công nghệ thông tin  </p>
    <p>Thiết kế và phát triển bởi <a href="https://batheitblog.wordpress.com/">batheitblog</a></p>
</footer>

</body>
</html>
