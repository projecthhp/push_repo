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
            <div class="M-GeneralManagement-right-content2 M-tin-da-dang-right-content2">
                <div class="M-GeneralManagement-right-content2-h1">
                    <div>  </div>
                        Danh sách việc làm mới nhất
                </div>
                <div class="M-GeneralManagement-right-content2-table1">
                    <style>
                        .M-tin-da-dang-right-content2{
                            margin-top:41px;
                        }
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
                        .M-tin-da-dang-body #td-body2-1{
                            font-size: 16px;
                            line-height: 24px;
                            text-align: center;
                            color: #F8971C;
                            font-family: Roboto-Regular;
                        }
                        .M-tin-da-dang-body #td-body2 {
                            font-size: 16px;
                            line-height: 24px;
                            text-align: center;
                            color: #3980D4;
                            font-family: Roboto-Regular;
                        }
                        .M-tin-da-dang-body #td-body4{
                            font-size: 16px;
                            line-height: 24px;
                            text-align: center;
                            color: #6BCD86;
                            font-family: Roboto-Regular;
                        }
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
                            color: #A8A8A8;
                        }
                        .M-table1-body #td-body5 .icon2{
                            color: #A8A8A8;
                        }
                        .M-GeneralManagement-right-content2-mobile1-text3 .day{
                            float: left;
                            font-size: 15px;
                            line-height: 24px;
                            color: #4F4F4F;
                            font-family: Roboto-Regular;
                        }
                        .M-tin-da-dang-right-content2-mobile1-text1{
                            font-size: 16px;
                            line-height: 24px;
                            color: #1A2B3F;
                            font-family: Roboto-Regular;
                        }
                        .M-tin-da-dang-right-content2-mobile1-text1 a{
                            font-size: 16px;
                            line-height: 24px;
                            color: #F8971C;
                            font-family: Roboto-Italic
                        }
                        .M-tin-da-dang-right-content2-mobile1-text2 ul #li1{
                            font-weight: 500;
                            font-size: 15px;
                            line-height: 24px;
                            color: #5990FF;
                            font-family: Roboto-Medium;
                        }
                        .M-tin-da-dang-right-content2-mobile1-text2 ul #li2 img,
                        .M-tin-da-dang-right-content2-mobile1-text2 ul #li1 img{
                            height:24px;
                            width: 24px;
                            margin-right:7px;
                        }
                        .M-tin-da-dang-right-content2-mobile1-text2 ul #li2{
                            font-weight: 500;
                            font-size: 15px;
                            line-height: 24px;
                            color: #6BCD86;
                            font-family: Roboto-Medium;
                        }
                    </style>
                    <table class="M-table1" id="M-table1">
                        <tr class="M-table1-head">
                            <th id="td-head1">Tên công việc</th>
                            <th id="td-head2">Hình thức</th>
                            <th id="td-head3">Hạn cuối đặt giá</th>
                            <th id="td-head4">Trạng thái</th>
                            <th id="td-head5" >Quản lý</th>
                        </tr>
                        <tr class="M-table1-body M-tin-da-dang-body">
                            <td id="td-body1">
                                <div><a href="">Thiết kế logo cho áo đồng phục công ty</a></div>
                                <a href="">(Xem chi tiết công việc)</a>
                            </td>
                            <td class="td-body2" id="td-body2">Dự án</td>
                            <td id="td-body3" >12/09/2020</td>
                            <td  id="td-body4">Đã đăng</td>
                            <td id="td-body5">
                                <i class="far fa-sync-alt icon1"></i>
                                <i class="fal fa-pencil-alt icon2"></i>
                            </td>
                        </tr>
                        <?php
                            for ($i=0; $i <5 ; $i++) { 
                                echo
                                '
                                <tr class="M-table1-body  M-tin-da-dang-body">
                                    <td id="td-body1">
                                        <div><a href="">Thiết kế logo cho áo đồng phục công ty</a></div>
                                        <a href="">(Xem chi tiết công việc)</a>
                                    </td>
                                    <td class="td-body2" id="td-body2">Dự án</td>
                                    <td id="td-body3" >12/09/2020</td>
                                    <td  id="td-body4">Đã đăng</td>
                                    <td id="td-body5">
                                        <i class="far fa-sync-alt icon1"></i>
                                        <i class="fal fa-pencil-alt icon2"></i>
                                    </td>
                                </tr>
                                ';
                            }
                        ?>
                    </table>
                </div>
                <div class="M-GeneralManagement-right-content2-mobile1">
                    <div class="M-GeneralManagement-right-content2-mobile1-text1 M-tin-da-dang-right-content2-mobile1-text1">
                        Thiết kế logo cho áo đồng phục công ty theo gợi ý trước của công ty
                        <a href="">(Xem chi tiết)</a>
                    </div>
                    <div class="M-GeneralManagement-right-content2-mobile1-text2 M-tin-da-dang-right-content2-mobile1-text2">
                        <ul>
                            <li id="li1"><img src="../image/icon/Group 2698.png" alt=""> Bán thời gian</li>
                            <li id="li2"><img src="../image/icon/Group 2699.png" alt=""> Đã đăng</li>
                        </ul>
                    </div>
                    <div class="M-GeneralManagement-right-content2-mobile1-text3">
                            <div class="day">Hạn cuối đặt giá: <strong>12/10/2020</strong></div>
                            <button id="btn1"><i class="far fa-redo icon1"></i>Làm mới</button>
                            <button id="btn2"><i class="fal fa-pencil-alt icon2"></i>Chỉnh sửa</button>
                    </div>
                </div>
                    <?php
                        for ($i=0; $i <5 ; $i++) { 
                        echo
                        '
                        <div class="M-GeneralManagement-right-content2-mobile1">
                            <div class="M-GeneralManagement-right-content2-mobile1-text1 M-tin-da-dang-right-content2-mobile1-text1">
                                Thiết kế logo cho áo đồng phục công ty theo gợi ý trước của công ty
                                <a href="">(Xem chi tiết)</a>
                            </div>
                            <div class="M-GeneralManagement-right-content2-mobile1-text2 M-tin-da-dang-right-content2-mobile1-text2">
                                <ul>
                                    <li id="li1"><img src="../image/icon/Group 2698.png" alt=""> Bán thời gian</li>
                                    <li id="li2"><img src="../image/icon/Group 2699.png" alt=""> Đã đăng</li>
                                </ul>
                            </div>
                            <div class="M-GeneralManagement-right-content2-mobile1-text3">
                                    <div class="day">Hạn cuối đặt giá: <strong>12/10/2020</strong></div>
                                    <button id="btn1"><i class="far fa-redo icon1"></i>Làm mới</button>
                                    <button id="btn2"><i class="fal fa-pencil-alt icon2"></i>Chỉnh sửa</button>
                            </div>
                        </div>
                        ';
                        }
                    ?>
            </div>
        </div>

    </div>
</body>
<script>
    if ($('.td-body2')=="Dự án") {
        var a = $(this);
        $('.td-body2').remoteClass('td-body2-1')
        a.addClass('td-body2-1')
    }
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