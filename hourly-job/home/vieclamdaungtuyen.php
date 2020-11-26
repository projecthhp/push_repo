<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Việc làm ứng tuyển</title>
  <link
  rel="stylesheet"
  type="text/css"
  href="../node_modules/slick-carousel/slick/slick.css"
  />
  <link
  rel="stylesheet"
  type="text/css"
  href="../node_modules/slick-carousel/slick/slick-theme.css"
  />
  <link
  href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css"
  rel="stylesheet"
  />

  <link
  href="https://fonts.googleapis.com/icon?family=Material+Icons"
  rel="stylesheet"
  />
  <link
  rel="stylesheet"
  href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
  integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
  crossorigin="anonymous"
  />
  <link rel="stylesheet" href="../css/css.css" />
</head>
<body>
  <div class="wapper">
    <div class="header">
      <div class="menu">
        <div class="menu_moblie">
          <div class="menu_mobile1">
            <button
            type="button"
            class="btn btn-primary"
            data-toggle="modal"
            data-target="#exampleModal1"
            >
            <img src="../image/Group 425.png" alt="" />
          </button>
          <div
          class="modal fade div_modal"
          id="exampleModal1"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalLabel1"
          aria-hidden="true"
          >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
                >
                <span aria-hidden="true">&times;</span>
              </button>
              
            </div>
            
            <div class="modal-body">
              <div class="anhhoso">
                <img src="../image/Group 2048.png" alt="">
                <h2>Nguyễn Thu Trang</h2>
                <a href=""><img src="../image/Vector (1)111.png" alt=""> Làm mới hồ sơ</a>
              </div>
              <hr>
              <div class="div_quanlychung">
                <ul class="vmenu">
                  <li class="nav-item dropdown">
                    <i style='font-size:14px' class='fas'>&#xf51b;</i>
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Quản lý chung
                    </a>
                    <div class="dropdown-content">
                      <a class="dropdown-item div_dropdown-item" href="#">Hoàn thiện hồ sơ</a>
                      <!-- <div class="dropdown-divider"></div> -->
                      <a class="dropdown-item div_dropdown-item" href="#">Tìm việc</a>
                      <!-- <div class="dropdown-divider"></div> -->
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <i style='font-size:14px' class='far'>&#xf1d8;</i>
                    <a class="nav-link" href="#" id="navbarDropdown">
                      Việc làm đã ứng tuyển 
                    </a>
                  </li>
                  <li class="nav-item dropdown">
                    <i  class='fas'>&#xf304;</i>
                    <a class="nav-link" href="#" id="navbarDropdown">
                      Việc làm đã lưu
                    </a>
                  </li>
                  <li class="nav-item dropdown">
                   <i style='font-size:14px' class='fas'>&#xf51b;</i>
                   <a class="nav-link" href="#" id="navbarDropdown">
                    Cẩm nang tìm việc theo giờ
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <i style='font-size:14px' class='fas'>&#xf084;</i>
                  <a class="nav-link" href="#" id="navbarDropdown">
                    Đổi mật khẩu
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <i style='font-size:14px' class='fas'>&#xf011;</i>
                  <a class="nav-link" href="#" id="navbarDropdown">
                    Đăng xuất
                  </a>

                </li>          
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="menu_mobile2">
    <img src="../image/logoo 1 (1).png" alt="" />
  </div>
  <div class="menu_mobile3">
    <button
    type="button"
    class="btn btn-primary btn-form1-submit"
    data-toggle="modal"
    data-target="#exampleModalLong1"
    >
    <i style="font-size: 24px" class="fas">&#xf002;</i>
  </button>

  <div
  class="modal fade"
  id="exampleModalLong1"
  tabindex="-1"
  role="dialog"
  aria-labelledby="exampleModalLongTitle1"
  aria-hidden="true"
  >
  <div class="modal-dialog" role="document">
    <div class="modal-content modal_search">
      <div class="modal-header modal-header-search">
        <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
        <button
        type="button"
        class="close"
        data-dismiss="modal"
        aria-label="Close"
        >
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body form_search">
      <form>
        <div class="form-group">
          <input
          type="email"
          class="form-control"
          placeholder="Nhập từ khóa tìm kiếm"
          />
        </div>
        <div class="form-group">
          <select
          class="form-control"
          id="exampleFormControlSelect1"
          >
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>
      <div class="form-group">
        <select
        class="form-control"
        id="exampleFormControlSelect1"
        >
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>
    </div>
    <div class="modal-footer-search">
      <button
      type="button"
      class="btn bg-warning text-white"
      >
      Tìm kiếm
    </button>
  </div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="container">
  <div class="row row_tow">
    <div class="col-md-4">
      <button
      type="button"
      class="btn btn-primary"
      data-toggle="modal"
      data-target="#exampleModal"
      >
      <img src="../image/Group 425.png" alt="" />
    </button>

    <!-- Modal -->
    <div
    class="modal fade div_modal"
    id="exampleModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
    >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn btn-primary">
            <a href="" class="text-white"> Đăng nhập </a>
          </button>
          <button type="button" class="btn bg-warning text-white">
            <a href="" class="text-white">Đăng ký</a>
          </button>
          <button
          type="button"
          class="close"
          data-dismiss="modal"
          aria-label="Close"
          >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <a href="">Dành cho ứng viên</a>
      </div>
      <div class="modal-body">
        <a href="">Dành cho nhà tuyển dụng</a>
      </div>
      <div class="modal-body">
        <a href="">Đánh giá</a>
      </div>
    </div>
  </div>
</div>
</div>
<div class="col-md-4 div_logo365">
  <img src="../image/logoo 1 (1).png" alt="" />
</div>

<div class="col-md-4 div_search">
  <button
  type="button"
  class="btn btn-primary btn-form1-submit"
  data-toggle="modal"
  data-target="#exampleModalLong"
  >
  <i style="font-size: 24px" class="fas">&#xf002;</i>
</button>

<div
class="modal fade"
id="exampleModalLong"
tabindex="-1"
role="dialog"
aria-labelledby="exampleModalLongTitle"
aria-hidden="true"
>
<div class="modal-dialog" role="document">
  <div class="modal-content modal_search">
    <div class="modal-header modal-header-search">
      <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
      <button
      type="button"
      class="close"
      data-dismiss="modal"
      aria-label="Close"
      >
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body form_search">
    <form>
      <div class="form-group">
        <input
        type="email"
        class="form-control"
        placeholder="Nhập từ khóa tìm kiếm"
        />
      </div>
      <div class="form-group">
        <select
        class="form-control"
        id="exampleFormControlSelect1"
        >
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>
    </div>
    <div class="form-group">
      <select
      class="form-control"
      id="exampleFormControlSelect1"
      >
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="modal-footer-search">
    <button
    type="button"
    class="btn bg-warning text-white"
    >
    Tìm kiếm
  </button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="container header_container">
  <div class="row tuyendung1">
    <div class="col icontuyendung">
      <a href="" class="text-light div_icon">
        <img src="../image/Vector 10.png" alt="" /> Quay lại
        Timviec365.com
      </a>
      <ul class="ul_header">
        <li>
          <a href=""><img src="../image/logo.png" alt="" /></a>
        </li>
        <li>
          <a href="" class="text-light">Dành cho doanh nghiệp</a>
        </li>
        <li><a href="" class="text-light">Bảng giá</a></li>
        <li>
          <a href="" class="login border p-2 text-light bg-primary"
          >Dành cho doanh nhiệp</a
          >
        </li>
        <li><img src="../image/Vector0000.png" alt=""></li>
      </ul>
    </div>
  </div>
</div>
</div>
</div>
</div>
<div class="div_thongtinhosocanhan">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 div_quanlythongtin">
        <div class="anhhoso">
          <img src="../image/Group 2048.png" alt="">
          <h2>Nguyễn Thu Trang</h2>
          <a href=""><img src="../image/Vector (1)111.png" alt=""> Làm mới hồ sơ</a>
        </div>
        <hr>
        <div class="div_quanlychung">
          <ul class="vmenu">
            <li class="nav-item dropdown">
              <button class="h_dropdown-btn">
                <i style='font-size:14px' class='fas'>&#xf51b;</i>
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Quản lý chung
                </a>
              </button>
              <div class="h_dropdown-container">
                <a class="dropdown-item div_dropdown-item" href="#">Hoàn thiện hồ sơ</a>
                
                <a class="dropdown-item div_dropdown-item" href="#">Tìm việc</a>
                
              </div>
            </li>
            <li class="nav-item dropdown h_dropdown_icon">
              <i style='font-size:14px' class='far'>&#xf1d8;</i>
              <a class="nav-link" href="#" id="navbarDropdown">
                Việc làm đã ứng tuyển 
              </a>
            </li>
            <li class="nav-item dropdown">
              <i style='font-size:17px' class='far'>&#xf004;</i>
              <a class="nav-link" href="#" id="navbarDropdown">
                Việc làm đã lưu
              </a>
            </li>
            <li class="nav-item dropdown">
             <i style='font-size:14px' class='fas'>&#xf51b;</i>
             <a class="nav-link" href="#" id="navbarDropdown">
              Cẩm nang tìm việc theo giờ
            </a>
          </li>
          <li class="nav-item dropdown">
            <i style='font-size:14px' class='fas h_fas'>&#xf084;</i>
            <a class="nav-link" href="#" id="navbarDropdown">
              Đổi mật khẩu
            </a>
          </li>
          <li class="nav-item dropdown">
            <i style='font-size:14px' class='fas'>&#xf011;</i>
            <a class="nav-link" href="#" id="navbarDropdown">
              Đăng xuất
            </a>

          </li>          
        </ul>
      </div>
    </div>
    <div class="col-xl-9 div_quanlythongtincoban">
      <div class="h_divthongtin">
        <div class="slide-button">
          <a href="hoanthienhoso.html">
            <div class="ic"><i style='font-size:24px' class='fas'>&#xf406;</i></div>
            <div class="hr"></div>
            <div class="txt1">Thông tin cá nhân</div>
          </a>
        </div>
        <div class="slide-button">
          <a href="congviecmongmuon.html">
            <div class="ic"><i style='font-size:24px' class='fas'>&#xf502;</i></div>
            <div class="hr"></div>
            <div class="txt1">Công việc mong muốn</div>
          </a>
        </div>
        <div class="slide-button">
          <a href="#">
            <div class="ic"><i style='font-size:24px' class='fas '>&#xf1b2;</i></div>
            <div class="hr h_hr"></div>
            <div class="txt1">Kỹ năng bản thân</div>
          </a>
        </div>
        <div class="slide-button">
          <a href="#" class="h_abc">
            <div class="ic"><i style='font-size:24px' class='fas'>&#xf0b1;</i></div>
            <div class="hr"></div>
            <div class="txt1">Kinh nghiệm làm việc</div>
          </a>
        </div>
        <div class="slide-button">
          <a href="#" class="h_abc">
            <div class="ic"><i style='font-size:24px' class='far'>&#xf073;</i></div>
            <div class="txt1" style="margin-left:2px;">Buổi có thể đi làm</div>
          </a>
        </div>
      </div>
      <div class="h_thongtincoban">
        <h2>Việc làm đã ứng tuyển</h2>
        <hr>
        <div class="h_tablet_vieclamungtuyen">
          <div class="h_tablet_noidung">
            Tuyển CTV bán hàng online <a href="">(Xem chi tiết)</a>
            <div class="h_icon_xoa">
              <a href=""><i style="font-size: 20px;" class='far'>&#xf2ed;</i></a>
            </div>
            <div class="h_clock">
              <i class="far fa-clock"></i>12/09/2020 đến 12/10/2020 <span>|</span><i class='fab'>&#xf4e8;</i>30.000đ/giờ
            </div>
            <div class="h-lichlam"> 
              <div class="h_div_lichlam">06:00 - 11:00</div>
              Thứ 2, thứ 3, thứ 4, thứ 5, thứ 6, thứ 7, chủ nhật
            </div>
            <hr>
          </div>
          <div class="h_tablet_noidung">
            Tuyển CTV bán hàng online <a href="">(Xem chi tiết)</a>
            <div class="h_icon_xoa">
              <a href=""><i style="font-size: 20px;" class='far'>&#xf2ed;</i></a>
            </div>
            <div class="h_clock">
              <i class="far fa-clock"></i>12/09/2020 đến 12/10/2020 <span>|</span><i class='fab'>&#xf4e8;</i>30.000đ/giờ
            </div>
            <div class="h-lichlam"> 
              <div class="h_div_lichlam">06:00 - 11:00</div>
              Thứ 2, thứ 3, thứ 4, thứ 5, thứ 6, thứ 7, chủ nhật
            </div>
            <hr>
          </div>
          <div class="h_tablet_noidung">
            Tuyển CTV bán hàng online <a href="">(Xem chi tiết)</a>
            <div class="h_icon_xoa">
              <a href=""><i style="font-size: 20px;" class='far'>&#xf2ed;</i></a>
            </div>
            <div class="h_clock">
              <i class="far fa-clock"></i>12/09/2020 đến 12/10/2020 <span>|</span><i class='fab'>&#xf4e8;</i>30.000đ/giờ
            </div>
            <div class="h-lichlam"> 
              <div class="h_div_lichlam">06:00 - 11:00</div>
              Thứ 2, thứ 3, thứ 4, thứ 5, thứ 6, thứ 7, chủ nhật
            </div>
            <hr>
          </div>
          <div class="h_tablet_noidung">
            Tuyển CTV bán hàng online <a href="">(Xem chi tiết)</a>
            <div class="h_icon_xoa">
              <a href=""><i style="font-size: 20px;" class='far'>&#xf2ed;</i></a>
            </div>
            <div class="h_clock">
              <i class="far fa-clock"></i>12/09/2020 đến 12/10/2020 <span>|</span><i class='fab'>&#xf4e8;</i>30.000đ/giờ
            </div>
            <div class="h-lichlam"> 
              <div class="h_div_lichlam">06:00 - 11:00</div>
              Thứ 2, thứ 3, thứ 4, thứ 5, thứ 6, thứ 7, chủ nhật
            </div>
            <hr>
          </div>
          <div class="h_tablet_noidung">
            Tuyển CTV bán hàng online <a href="">(Xem chi tiết)</a>
            <div class="h_icon_xoa">
              <a href=""><i style="font-size: 20px;" class='far'>&#xf2ed;</i></a>
            </div>
            <div class="h_clock">
              <i class="far fa-clock"></i>12/09/2020 đến 12/10/2020 <span>|</span><i class='fab'>&#xf4e8;</i>30.000đ/giờ
            </div>
            <div class="h-lichlam"> 
              <div class="h_div_lichlam">06:00 - 11:00</div>
              Thứ 2, thứ 3, thứ 4, thứ 5, thứ 6, thứ 7, chủ nhật
            </div>
            <hr>
          </div>
          <div class="h_tablet_noidung">
            Tuyển CTV bán hàng online <a href="">(Xem chi tiết)</a>
            <div class="h_icon_xoa">
              <a href=""><i style="font-size: 20px;" class='far'>&#xf2ed;</i></a>
            </div>
            <div class="h_clock">
              <i class="far fa-clock"></i>12/09/2020 đến 12/10/2020 <span>|</span><i class='fab'>&#xf4e8;</i>30.000đ/giờ
            </div>
            <div class="h-lichlam"> 
              <div class="h_div_lichlam">06:00 - 11:00</div>
              Thứ 2, thứ 3, thứ 4, thứ 5, thứ 6, thứ 7, chủ nhật
            </div>
            <hr>
          </div>
          <div class="div_xemthemungvien">
            <a href="">Xem thêm<i style='font: size 14px' class='fas'>&#xf103;</i></a>
          </div>
        </div>
        <div class="h_vieclamdaungtuyen">
          <div class="table-responsive">
            <table class="table h_table_vieclamdaungtuyen">
              <tr>
                <th>Tên công ty</th>
                <th>Thời gian làm việc</th>
                <th>Lịch làm</th>
                <th>Lương</th>
                <th>Xóa</th>
              </tr>
              <tbody>
                <tr>
                  <td>
                    <div class="h-div-tuyenhangonline">
                      Tuyển CTV bán hàng online
                      <p><a href="">(Xem chi tiết)</a></p>
                    </div>
                  </td>
                  <td>
                    <div class="h_div-thoigianlamviec">
                      12/09/2020 <p>đến 12/10/2020</p> 
                    </div>
                  </td>
                  <td>
                    <div class="h-lichlam"> 
                      <div class="h_div_lichlam">06:00 - 11:00</div>
                      Thứ 2, thứ 3, thứ 4, thứ 5, thứ 6,<p> thứ 7, chủ nhật</p>
                    </div>
                  </td>
                  <td>
                    <div class="h_luong">
                      30.000đ/giờ
                    </div>
                  </td>
                  <td>
                    <div class="h_icon_xoa">
                      <a href=""><i class='far'>&#xf2ed;</i></a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="h-div-tuyenhangonline">
                      Tuyển CTV bán hàng online
                      <p><a href="">(Xem chi tiết)</a></p>
                    </div>
                  </td>
                  <td>
                    <div class="h_div-thoigianlamviec">
                      12/09/2020 <p>đến 12/10/2020</p> 
                    </div>
                  </td>
                  <td>
                    <div class="h-lichlam"> 
                      <div class="h_div_lichlam">06:00 - 11:00</div>
                      Thứ 2, thứ 3, thứ 4, thứ 5, thứ 6,<p> thứ 7, chủ nhật</p>
                    </div>
                  </td>
                  <td>
                    <div class="h_luong">
                      30.000đ/giờ
                    </div>
                  </td>
                  <td>
                    <div class="h_icon_xoa">
                      <a href=""><i class='far'>&#xf2ed;</i></a>
                    </div>
                  </td>
                </tr>
                <tr>                     
                 <td>
                  <div class="h-div-tuyenhangonline">
                    Tuyển CTV bán hàng online
                    <p><a href="">(Xem chi tiết)</a></p>
                  </div>
                </td>
                <td>
                  <div class="h_div-thoigianlamviec">
                    12/09/2020 <p>đến 12/10/2020</p> 
                  </div>
                </td>
                <td>
                  <div class="h-lichlam"> 
                    <div class="h_div_lichlam">06:00 - 11:00</div>
                    Thứ 2, thứ 3, thứ 4, thứ 5, thứ 6,<p> thứ 7, chủ nhật</p>
                  </div>
                </td>
                <td>
                  <div class="h_luong">
                    30.000đ/giờ
                  </div>
                </td>
                <td>
                  <div class="h_icon_xoa">
                    <a href=""><i class='far'>&#xf2ed;</i></a>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="h-div-tuyenhangonline">
                    Tuyển CTV bán hàng online
                    <p><a href="">(Xem chi tiết)</a></p>
                  </div>
                </td>
                <td>
                  <div class="h_div-thoigianlamviec">
                    12/09/2020 <p>đến 12/10/2020</p> 
                  </div>
                </td>
                <td>
                  <div class="h-lichlam"> 
                    <div class="h_div_lichlam">06:00 - 11:00</div>
                    Thứ 2, thứ 3, thứ 4, thứ 5, thứ 6,<p> thứ 7, chủ nhật</p>
                  </div>
                </td>
                <td>
                  <div class="h_luong">
                    30.000đ/giờ
                  </div>
                </td>
                <td>
                  <div class="h_icon_xoa">
                    <a href=""><i class='far'>&#xf2ed;</i></a>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="h-div-tuyenhangonline">
                    Tuyển CTV bán hàng online
                    <p><a href="">(Xem chi tiết)</a></p>
                  </div>
                </td>
                <td>
                  <div class="h_div-thoigianlamviec">
                    12/09/2020 <p>đến 12/10/2020</p> 
                  </div>
                </td>
                <td>
                  <div class="h-lichlam"> 
                    <div class="h_div_lichlam">06:00 - 11:00</div>
                    Thứ 2, thứ 3, thứ 4, thứ 5, thứ 6,<p> thứ 7, chủ nhật</p>
                  </div>
                </td>
                <td>
                  <div class="h_luong">
                    30.000đ/giờ
                  </div>
                </td>
                <td>
                  <div class="h_icon_xoa">
                    <a href=""><i class='far'>&#xf2ed;</i></a>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="h-div-tuyenhangonline">
                    Tuyển CTV bán hàng online
                    <p><a href="">(Xem chi tiết)</a></p>
                  </div>
                </td>
                <td>
                  <div class="h_div-thoigianlamviec">
                    12/09/2020 <p>đến 12/10/2020</p> 
                  </div>
                </td>
                <td>
                  <div class="h-lichlam"> 
                    <div class="h_div_lichlam">06:00 - 11:00</div>
                    Thứ 2, thứ 3, thứ 4, thứ 5, thứ 6,<p> thứ 7, chủ nhật</p>
                  </div>
                </td>
                <td>
                  <div class="h_luong">
                    30.000đ/giờ
                  </div>
                </td>
                <td>
                  <div class="h_icon_xoa">
                    <a href=""><i class='far'>&#xf2ed;</i></a>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="div_xemthemungvien">
            <a href="">Xem thêm<i style='font: size 14px' class='fas'>&#xf103;</i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<div class="footer">
  <div class="div_footer">
    Timviec365.com - Tìm Việc Làm Nhanh, Tuyển Dụng Hiệu Quả
  </div>
  <div class="div_footer1">
    Công ty TNHH MTV nguồn nhân lực 365 | Mã số thuế: 0109218540 do Sở kế
    hoạch và đầu tư thành phố Hà Nội cấp ngày 10/06/2020
  </div>
  <div class="container_footer">
    <div class="row">
      <div class="col-sm-4 col_footer">
        <h2>Thông tin liên hệ</h2>
        <div class="lienhe_footer">
          <img src="../image/Group 1742.png" alt="" />Hotline: 0971.335.869
          | 024 36.36.66.99
        </div>
        <div class="lienhe_footer">
          <img src="../image/Group 1743.png" alt="" />Email:
          Timviec365com@gmail.com
        </div>
        <div class="lienhe_footer">
          <img src="../image/Group 1743 (1).png" alt="" />Địa chỉ: Số 206
          Định Công Hạ , Phường Định Công , Quận Hoàng Mai, Thành phố Hà
          Nội, Việt Nam
        </div>
      </div>
      <div class="col-sm-4 col_footer1">
        <h2>Website đối tác về tìm việc làm</h2>
        <ul class="footer_menu">
          <li>Nơi tìm việc làm hàng đầu: <a href="">Timviec365</a></li>
          <li>Tìm việc làm thêm mới nhất: <a href="">Tại đây</a></li>
          <li>
            Tìm việc làm thêm mới nhất: <a href="">CV xin việc 365</a>
          </li>
        </ul>
        <div class="footer_menu">
          <img src="../image/image 15.png" alt="" />
        </div>
      </div>
      <div class="col-lg-4 col_footer1 col_footer2 col_buonton">
        <h2>Ứng dụng thương mại</h2>
        <div class="buttonone">
          <div class="button1">
            <button type="button" class="btn btn-primar">
              <a href="" class="text-dark"
              ><img src="../image/apptimviec 1.png" alt="" />Tải app
              Timviec365
            </a>
          </button>
        </div>
        <div class="button1">
          <button type="button" class="btn btn-primar icon1">
            <div href="" class="text-dark">
              <img src="../image/Group 6 (1) 1.png" alt="" />Tải app
              Timviec365
            </div>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="footer_icons">
  <div class="footer_facebook">
    <img src="../image/Frame (3).png " alt="" />
  </div>
  <div class="footer_facebook">
    <img src="../image/Frame (4).png" alt="" />
  </div>
  <div class="footer_facebook">
    <img src="../image/Frame5.png" alt="" />
  </div>

  <div class="footer_menu1">
    <ul class="ul_header ul_footer">
      <li>Liên hệ</li>
      |
      <li>Quy chế hoạt động</li>
      |
      <li>Thông tin cần biết</li>
      |
      <li>Thỏa thuận sử dụng</li>
      |
      <li>Quy định bảo mật</li>
      |
      <li>Cơ chế giải quyết tranh chấp</li>
    </ul>
  </div>
</div>
</body>
</html>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script
src="../node_modules/slick-carousel/slick/slick.js"
type="text/javascript"
charset="utf-8"
></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
  $(document).ready(function() {
    $('#date,#date1,#date2').select2(
      );
    
  });
</script>
<script>
  /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
  var dropdown = document.getElementsByClassName("h_dropdown-btn");
  var i;
  
  for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var dropdownContent = this.nextElementSibling;
      if (dropdownContent.style.display === "block") {
        dropdownContent.style.display = "none";
      } else {
        dropdownContent.style.display = "block";
      }
    });
  }
</script>