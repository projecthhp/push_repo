<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý chung</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/GiangCSS/All.css">
	<link rel="stylesheet" href="../css/all.css">
	<script src="../js/all.js"></script>
</head>
<body>
    <div class="M-GeneralManagement">
        <style> 
           
            .M-GeneralManagement-left{
                float:left;
                width:303px;
                height:901px;
                background-color:white;
                margin-left: 55px;
                background-image:url('../image/img/Rectangle 640.png');
                background-repeat:no-repeat;
                background-position:top;
                background-size :100%;
               margin-top:40px;
               float:left;
               background: #FFFFFF;
                box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.05);
                border-radius: 5px;
            }
            .M-GeneralManagement-left-img{
                margin-top:74px;
                text-align:center;
            }
            .M-GeneralManagement-left-text1{
                text-align:center;  
                margin-top:13px;
                font-weight: 500;
                font-size: 18px;
                line-height: 21px;
                color: #252E3B;
                font-family:Roboto-Medium;
            }
            
            .M-GeneralManagement-left-text2{
                background: #F8971C;
                border-radius: 100px;
                width:191px;
                margin:0 auto;
                font-family: Roboto-Regular;
                font-style: normal;
                font-weight: 500;
                font-size: 16px;
                line-height: 19px;
                color: #FFFFFF;
                padding:7px 28px 7px 28px;
                margin-top: 27px;
            }
            .M-GeneralManagement-left-menu5,
            .M-GeneralManagement-left-menu4,
            .M-GeneralManagement-left-menu3,
            .M-GeneralManagement-left-menu2,
            .M-GeneralManagement-left-menu1,
            .M-GeneralManagement-left-menu{
                font-size: 16px;
                line-height: 24px;
                color: #575E66;
                font-family: Roboto-Regular;
                margin-top:21px;
                margin-left: 16px;
            }
            
            .M-GeneralManagement-left-menu img{
                margin-right:15px;
                margin-left:20px;
            }
            .M-GeneralManagement-left-menu1 img{
                margin-right:15px;
                margin-left:20px;
            }
            .M-GeneralManagement-left-menu2 img{
                margin-right:8px;
                margin-left:20px;
            }
            .M-GeneralManagement-left-menu3 img{
                margin-right:8px;
                margin-left:20px;
            }
            .M-GeneralManagement-left-menu4 img{
                margin-right:13px;
                margin-left:20px;
            }
            .M-GeneralManagement-left-menu5 img{
                margin-right:15px;
                margin-left:20px;
            }
            .M-GeneralManagement-left-menu1 i{
                margin-left: 29px;
                transform: rotate(-90deg);
            }
            .M-GeneralManagement-left-menu4 i{
                margin-left:93px;
                transform: rotate(-90deg);
            }
            .M-GeneralManagement-left-menu5 i{
                margin-left:69px;
                transform: rotate(-90deg);
            }
          
             /* xử lý nút của menu */
             .M-GeneralManagement-left-menu1-click{
                font-size: 16px;
                line-height: 24px;
                color: #575E66;
                font-family: Roboto-Regular;
                margin-top:21px;
                margin-left: 16px;
                background: linear-gradient(90deg, #5990FF 0%, #72CCFF 100%);
                border-radius: 0px 0px 100px 0px;
                padding:11px 11px 11px 0px;
                color: #FFFFFF;
            }
            .M-GeneralManagement-left-menu1-click img{
                margin-right:15px;
                margin-left:20px;
            }
            .btn-click ul{
                display:none;
            }
            .btn-click.action ul{
                display:block;
            }
             .btn-click #img1{
                display:inline;
            }
             .btn-click #img2{
                display:none;
            }
             .btn-click.action #img1{
                display:none;
            }
             .btn-click.action #img2{
                display:inline;
            }

            .btn-click.action{
                font-size: 16px;
                line-height: 24px;
                color: #575E66;
                font-family: Roboto-Regular;
                margin-top:21px;
                /* margin-left: 16px; */
                background: linear-gradient(90deg, #5990FF 0%, #72CCFF 100%);
                border-radius: 0px 0px 100px 0px;
                padding:11px 11px 11px 0px;
                color: #FFFFFF;
            }
            .M-GeneralManagement-left-menu1 .btn-click.action i {
                margin-left: 21px;
                transform: none;
            }
            .M-GeneralManagement-left-menu5 .btn-click.action i {
                margin-left: 63px;
                transform: none;
            }
            .M-GeneralManagement-left-menu4 .btn-click.action i {
                margin-left: 83px;
                transform: none;
            }
            .btn-click.action img{
                margin-right:15px;
                margin-left:20px;
            }
            /* end xử lsy nút menu */
            .M-GeneralManagement-left-menu-hover{
                margin-top:41px;
            }
            .M-GeneralManagement-left li{
                font-size: 16px;
                line-height: 24px;
                color: #575E66;
                font-family: Roboto-Regular;
                margin-top:15px;
                margin-left: 20px;
            }
            .M-GeneralManagement-left li a{
                font-size: 16px;
                line-height: 24px;
                color: #575E66;
                font-family: Roboto-Regular;
            }
            .M-GeneralManagement-left ul{
                margin-top:20px;
            }
            .btn-ul{
                display:none;
            }
            .btn-ul.action{
                display: block;
                transition: 0.5s;
            }
        </style>
        <div class="M-GeneralManagement-left">
            <div class="M-GeneralManagement-left-img">
                <img src="../image/img/Group 2389.png" alt="">
            </div>
            <div class="M-GeneralManagement-left-text1">
                Hoàng Thị Lan
            </div>
            <div class="M-GeneralManagement-left-text2">
                Số điểm còn lại: <strong>8</strong>
            </div>
            <div class="M-GeneralManagement-left-menu-hover" >
                <div class="M-GeneralManagement-left-menu" >
                   <div class="btn-click action">
                        <img id="img1" src="../image/icon/Group (1).png" alt="">
                        <img id="img2" src="../image/icon/Group (4).png" alt="">
                        Quản lý chung
                   </div>
                </div>
                <div class="M-GeneralManagement-left-menu1" >
                    <div class="btn-click">
                        <img id="img1" src="../image/icon/send 1.png" alt="">
                        <img id="img2" src="../image/icon/send 1 (1).png" alt="">    
                        Tuyển dụng Freelancer
                        <i class="fas fa-caret-down"></i>
                    </div>
                        <ul class="btn-ul">
                            <li><a href="">Đăng việc theo dự án</a></li>
                            <li><a href="">Đăng việc bán thời gian</a></li>
                        </ul>
                        
                </div>
                <div class="M-GeneralManagement-left-menu2 ">
                    <div class="btn-click">
                        <img id="img1" src="../image/icon/laptop 1.png" alt="">
                        <img id="img2" src="../image/icon/laptop 1 (1).png" alt="">
                        Tin đã đăng
                    </div>
                </div>
                <div class="M-GeneralManagement-left-menu3">
                    <div class="btn-click">
                        <img src="../image/icon/focus 1.png" alt="">
                        Tìm kiếm Freelancer
                    </div>
                </div>
                <div class="M-GeneralManagement-left-menu4 ">
                    <div class="btn-click">
                        <img id="img1" src="../image/icon/Group 2401 (1).png" alt="">  
                        <img id="img2" src="../image/icon/Group 2401 (2).png" alt="">   
                        Quản lý hồ sơ
                        <i class="fas fa-caret-down"></i>
                    </div>
                    <ul class="btn-ul">
                        <li><a href="">Đăng việc theo dự án</a></li>
                        <li><a href="">Đăng việc bán thời gian</a></li>
                    </ul>
                </div>
                <div class="M-GeneralManagement-left-menu5">
                    <div class=" btn-click">
                        <img id="img1" src="../image/icon/user 2.png" alt="">   
                        <img id="img2" src="../image/icon/user 2 (1).png" alt="">    
                        Quản lý tài khoản
                        <i class="fas fa-caret-down"></i>
                    </div>
                    <ul class="btn-ul">
                        <li><a href="">Đăng việc theo dự án</a></li>
                        <li><a href="">Đăng việc bán thời gian</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="M-GeneralManagement-right">
            <div class="M-GeneralManagement-right-content1 d-flex flex-wrap">
                <div class="box1">
                    <div id="text1">12</div>
                    <div id="text2">Freelancer đặt giá</div>
                </div>
                <div class="box2">
                    <div id="text1">30</div>
                    <div id="text2">Freelancer đã lưu</div>
                </div>
                <div class="box3">
                    <div id="text1">8</div>
                    <div id="text2">Freelancer đang làm việc</div>
                </div>
                <div class="box4">
                    <div id="text1">12</div>
                    <div id="text2">Viêc làm đã hoàn thành</div>
                </div>
            </div>
            <div class="M-GeneralManagement-right-content2">
                <div class="M-GeneralManagement-right-content2-h1">
                    <div>  </div>
                        Danh sách việc làm mới nhất
                </div>
                <div class="M-GeneralManagement-right-content2-table1">
                    <style>
                       .M-table1{
                           width: 95%;
                           margin:0 auto;
                           margin-top:20px;
                           border-radius:10px 10px 0px 0px ;
                           text-align:center;
                           background: #FFFFFF;
                            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.05);
                            border-radius: 0px;
                       }
                       .M-table1-head{
                        background: #62C6FF;
                        border-radius: 10px 10px 0px 0px;
                        height:51px;
                       }
                       #M-table1 tr:nth-child(even){
                        background: rgba(249, 249, 249, 0.54);
                        border-radius: 0px;
                       }
                       .M-table1-head #td-head4,
                       .M-table1-head #td-head3,
                       .M-table1-head #td-head2,
                       .M-table1-head #td-head1{
                           border-right:1px solid white;
                           text-align:center;
                           font-size: 16px;
                            line-height: 24px;
                            color: #FFFFFF;
                            font-family:Roboto-Bold;
                       }
                       .M-table1-head #td-head5{
                           text-align:center;
                           border-right:1px solid white;
                           text-align:center;
                           font-size: 16px;
                            line-height: 24px;
                            color: #FFFFFF;
                            font-family:Roboto-Bold;
                            border-radius:0px 10px 0 0 ;

                       }
                       .M-table1-head #td-body4,
                       .M-table1-head #td-body3,
                       .M-table1-head #td-body2,
                       .M-table1-head #td-body1{
                           border-right:1px solid white;
                       }
                      
                       .M-table1-head #td-head1{
                           width:335px;
                           border-radius:10px 0 0 0 ;
                       }
                        .M-table1-body{
                            height:83px;
                        }
                        .M-table1-body #td-body1 a{
                            font-size: 14px;
                            line-height: 24px;
                            text-align: center;
                            color: #F8971C;      
                            font-family: Roboto-Italic; 
                        }
                        .M-table1-body #td-body1 div a{
                            font-size: 16px;
                            line-height: 24px;
                            text-align: center;
                            color: #3980D4;
                            font-family: Roboto-Regular,
                        }
                        .M-table1-body #td-body2{
                            font-weight: 500;
                            font-size: 16px;
                            line-height: 24px;
                            text-align: center;
                            color: #FF4935;
                            font-family: Roboto-Medium;
                        }
                        .M-table1-body #td-body4,
                        .M-table1-body #td-body3{
                            font-size: 16px;
                            line-height: 24px;
                            text-align: center;
                            color: #252E3B;
                            font-family: Roboto-Regular;
                        }
                        .M-table1-body #td-body5 i{
                            margin-left:12px;
                        }
                        .M-table1-body #td-body5 .icon1{
                            color: #3980D4;
                        }
                        .M-table1-body #td-body5 .icon2{
                            color: #F8971C;
                        }

                    </style>
                    <table class="M-table1" id="M-table1">
                        <tr class="M-table1-head">
                            <th id="td-head1">Tên công việc</th>
                            <th id="td-head2">Ngân sach dự kiến</th>
                            <th id="td-head3">Lượt đặt giá</th>
                            <th id="td-head4">Hạn cuối đặt giá</th>
                            <th id="td-head5" >Quản lý</th>
                        </tr>
                        <tr class="M-table1-body">
                            <td id="td-body1">
                                <div><a href="">Thiết kế logo cho áo đồng phục công ty</a></div>
                                <a href="">(Xem chi tiết công việc)</a>
                            </td>
                            <td id="td-body2">500.000đ</td>
                            <td id="td-body3" >12</td>
                            <td  id="td-body4">Hết hạn</td>
                            <td id="td-body5">
                                <i class="far fa-redo fa-2x icon1"></i>
                                <i class="fal fa-pencil-alt fa-2x icon2"></i>
                            </td>
                        </tr>
                        <?php
                            for ($i=0; $i <5 ; $i++) { 
                                echo
                                '
                                <tr class="M-table1-body">
                                    <td id="td-body1">
                                        <div><a href="">Thiết kế logo cho áo đồng phục công ty</a></div>
                                        <a href="">(Xem chi tiết công việc)</a>
                                    </td>
                                    <td id="td-body2">500.000đ</td>
                                    <td id="td-body3" >12</td>
                                    <td  id="td-body4">Hết hạn</td>
                                    <td id="td-body5">
                                        <i class="far fa-redo fa-2x icon1"></i>
                                        <i class="fal fa-pencil-alt fa-2x icon2"></i>
                                    </td>
                                </tr>
                                ';
                            }
                        ?>
                    </table>
                </div>
                <div class="M-GeneralManagement-right-content2-mobile1">
                    <div class="M-GeneralManagement-right-content2-mobile1-text1">
                        Thiết kế logo cho áo đồng phục công ty theo gợi ý trước của công ty
                        <a href="">(Xem chi tiết)</a>
                    </div>
                    <div class="M-GeneralManagement-right-content2-mobile1-text2">
                        <ul>
                            <li id="li1"><i class="fal fa-usd-circle"></i>  500.000đ</li>
                            <li id="li2">Lượt đặt giá: <p>12</p></li>
                            <li id="li3">Ngày hết hạn: <p>Đã hết hạn</p></li>
                        </ul>
                    </div>
                    <div class="M-GeneralManagement-right-content2-mobile1-text3">
                            <button id="btn1"><i class="far fa-redo icon1"></i>Làm mới</button>
                            <button id="btn2"><i class="fal fa-pencil-alt icon2"></i>Chỉnh sửa</button>
                    </div>
                </div>
                <?php
                    for ($i=0; $i <5 ; $i++) { 
                      echo
                    '
                    <div class="M-GeneralManagement-right-content2-mobile1">
                        <div class="M-GeneralManagement-right-content2-mobile1-text1">
                            Thiết kế logo cho áo đồng phục công ty theo gợi ý trước của công ty
                            <a href="">(Xem chi tiết)</a>
                        </div>
                        <div class="M-GeneralManagement-right-content2-mobile1-text2">
                            <ul>
                                <li id="li1"><i class="fal fa-usd-circle"></i>  500.000đ</li>
                                <li id="li2">Lượt đặt giá: <p>12</p></li>
                                <li id="li3">Ngày hết hạn: <p>Đã hết hạn</p></li>
                            </ul>
                        </div>
                        <div class="M-GeneralManagement-right-content2-mobile1-text3">
                                <button id="btn1"><i class="far fa-redo icon1"></i>Làm mới</button>
                                <button id="btn2"><i class="fal fa-pencil-alt icon2"></i>Chỉnh sửa</button>
                        </div>
                    </div>  
                    ';
                    }
                ?>
            </div>
            <div class="M-GeneralManagement-right-content3">
                <style>
                    .M-table2-body #td-body2 p{
                        margin:0 auto;
                        width: 236px;
                        overflow: hidden;
                        white-space: nowrap; 
                        text-overflow: ellipsis;
                    }
                    .M-table2-body #td-body1 a,
                    .M-table2-body #td-body2 a{
                        font-size: 14px;
                        line-height: 24px;
                        text-align: center;
                        color: #3980D4;
                        font-family: Roboto-Italic;
                    }
                    .M-table2-body #td-body2 p,
                    .M-table2-body #td-body1 p{
                        font-size: 16px;
                        line-height: 24px;
                        text-align: center;
                        color: #252E3B;
                        font-family: Roboto-Regular;
                    }
                    .M-table2-body #td-body3{
                        font-weight: 500;
                        font-size: 16px;
                        line-height: 24px;
                        text-align: center;
                        color: #FFA533;
                        font-family:Roboto-Medium;
                    }
                    .M-table2-body #td-body4 div{
                        font-size: 16px;
                        line-height: 24px;
                        text-align: center;
                        color: #252E3B;
                        font-family:Roboto-Regular;
                        background: #F7F7F7;
                        border-radius: 3px;
                        padding:2px 15px;
                        margin-top: 22px;
                        margin-right:44px;
                        margin-left:47px;
                    }
                    .M-table2-body #td-body4 ul{
                        display:flex;
                        margin-left:14px;
                        margin-top:10px;
                    }
                    .M-table2-body #td-body4 li{
                        margin-left:10px;
                    }
                    .M-table2-body #td-body4 #li2 a,
                    .M-table2-body #td-body4 #li1 a{
                        font-size: 15px;
                        line-height: 24px;
                        text-align: center;
                        color: #33A953;
                        font-family: Roboto-Regular;
                    }
                    .M-table2-body #td-body4 #li2 a{
                        color: #FF0000;
                    }
                    .M-table2-head #td-head1 {
                        width: 192px;
                    }
                    .M-table2-head #td-head4 {
                        width: 188px;
                    }
                </style>
                <div class="M-GeneralManagement-right-content2-h1">
                    <div>  </div>
                        Danh sách Freelancer đặt giá mới nhất
                </div>
                <div class="M-GeneralManagement-right-content2-table1">
                    <table class="M-table1" id="M-table1">
                        <tr class="M-table1-head M-table2-head">
                            <th id="td-head1">Tên Freelancer</th>
                            <th id="td-head2">Tên dự án</th>
                            <th id="td-head3">Ngân sách dự kiến</th>
                            <th id="td-head4">Đặt giá</th>
                            <th id="td-head5" >Liên hệ</th>
                        </tr>
                        <tr class="M-table1-body M-table2-body">
                            <td id="td-body1">
                                <p>Nguyễn Thị Hà My</p>
                                <a href="">(Xem chi tiết)</a>
                            </td>
                            <td id="td-body2">
                                <p>Thiết kế logo cho áo đồng phục mùa đông</p>
                                <a href="">(Xem chi tiết)</a>
                            </td>
                            <td id="td-body3" >400.000đ</td>
                            <td  id="td-body4">
                                <div>550.000đ</div>
                               <ul>
                                   <li id="li1"><a href="">Chấp nhận</a></li>
                                   <li id="li2"><a href="">Từ chối</a></li>
                               </ul>
                            </td>
                            <td id="td-body5">
                               <img src="../image/icon/Group 2540.png" alt="">
                            </td>
                        </tr>
                        <?php
                            for ($i=0; $i <5 ; $i++) { 
                                echo
                                '
                                <tr class="M-table1-body M-table2-body">
                                    <td id="td-body1">
                                        <p>Nguyễn Thị Hà My</p>
                                        <a href="">(Xem chi tiết)</a>
                                    </td>
                                    <td id="td-body2">
                                        <p>Thiết kế logo cho áo đồng phục mùa đông</p>
                                        <a href="">(Xem chi tiết)</a>
                                    </td>
                                    <td id="td-body3" >400.000đ</td>
                                    <td  id="td-body4">
                                        <div>550.000đ</div>
                                    <ul>
                                        <li id="li1"><a href="">Chấp nhận</a></li>
                                        <li id="li2"><a href="">Từ chối</a></li>
                                    </ul>
                                    </td>
                                    <td id="td-body5">
                                    <img src="../image/icon/Group 2540.png" alt="">
                                    </td>
                                </tr>
                                ';
                            }
                        ?>
                    </table>
                </div>
                <div class="M-GeneralManagement-right-content2-mobile2">
                    <div class="M-GeneralManagement-right-content2-mobile-text1">
                        Thiết kế website bán hàng theo mẫu có sẵn  <a href="">(Xem chi tiết)</a>
                    </div>
                    <div class="M-GeneralManagement-right-content2-mobile-text2">
                        <a href="">Nguyễn Thị Hà My</a>
                        <div><img src="../image/icon/Group 2540.png" alt="">Liên Hệ</div>
                    </div>
                    <div class="M-GeneralManagement-right-content2-mobile-text3">
                        <div class="ul1">
                            <li id="li1">Dự kiến: <strong>1.500.000đ</strong></li>
                            <li id="li2">Đặt giá: <Div>1.600.000</Div></li>
                        </div>
                        <div class="ul2">
                            <li id="li1">Chấp nhận </li>
                            <li id="li2">Từ chối</li>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
<script>
    $('.btn-click').click(function(){   
    var e = $(this);
    $('.btn-click').removeClass('action');
    e.addClass('action');

        if (e.hasClass("action"))
            $('.btn-ul').addClass('action');
       else
            $('.btn-ul').removeClass('action');
   });

</script>
</html>