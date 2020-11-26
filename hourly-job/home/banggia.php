<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Bảng giá</title>
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
        <div class="container header_container h-header_container">
          <div class="menu_moblie">
            <div class="menu_mobile1">
              <button
              type="button"
              class="btn h_mau"
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
    <div class="menu_mobile3 h_menu_mobile3">
      <button
      type="button"
      class="btn h_mau1 btn-form1-submit"
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
                class="btn h_mau"
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
          class="btn h_mau1 btn-form1-submit"
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
<div class="h_banggiadichvu">
  <h2>Bảng giá dịch vụ</h2>
  <div class="row h_row_banggiadichvu">
    <div class="col-lg-3 h_col_lochoso">
      <div class="h_ghimtinbox1">
        <p> Lọc hồ sơ</p>
        <hr>
        <div class="h_noidung_bangloc">
          <p><i style='font-size:18px' class='fas'>&#xf00c;</i><span>Chủ động tìm kiếm nhân tài</span></p>
          <p><i style='font-size:18px' class='fas'>&#xf00c;</i><span> Tiếp cận trực tiếp ứng viên</span></p>
          <p><i style='font-size:18px' class='fas'>&#xf00c;</i><span> Tuyển dụng lâu dài</span></p>
          <p><i style='font-size:18px' class='fas'>&#xf00c;</i> <span>Tiết kiệm thời gian và chi phí</span></p>
        </div>
        <div class="h_button_xemchitiet">
          <div class="h_rotate">
            <a href="">Xem chi tiết</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 h_col_ghimtin">
      <div class="h_ghimtinbox">
        <p> Ghim tin box việc làm theo giờ mới nhất </p>
        <div class="h_noidung_bangloc">
          <p><i style='font-size:18px' class='fas'>&#xf00c;</i><span>Ghim tại box đầu tiên trang chủ</span></p>
          <p><i style='font-size:18px' class='fas'>&#xf00c;</i><span> Tuyển dụng nhanh chóng</span></p>
          <p><i style='font-size:18px' class='fas'>&#xf00c;</i><span> Tiết kiệm thời gian và chi phí</span></p>
          <p><i style='font-size:18px' class='fas'>&#xf00c;</i> <span>Ứng viên chủ động nộp hồ sơ</span></p>
          <p><i style='font-size:18px' class='fas'>&#xf00c;</i><span>Tiếp cận đúng ứng viên tìm kiếm</span></p>
          <p><i style='font-size:18px' class='fas'>&#xf00c;</i> <span>Hiển thị cùng các tin mới nhất</span></p>
        </div>
        <div class="h_button_xemchitiet">
          <div class="h_rotate">
            <a href="">Xem chi tiết</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 h_col_lochoso">
      <div class="h_ghimtinbox1">
        <p> Ghim tin box việc làm theo giờ mới nhất </p>
        <hr>
        <div class="h_noidung_bangloc">
          <p><i style='font-size:18px' class='fas'>&#xf00c;</i><span>Chủ động tìm kiếm nhân tài</span></p>
          <p><i style='font-size:18px' class='fas'>&#xf00c;</i><span> Tiếp cận trực tiếp ứng viên</span></p>
          <p><i style='font-size:18px' class='fas'>&#xf00c;</i><span> Tuyển dụng lâu dài</span></p>
          <p><i style='font-size:18px' class='fas'>&#xf00c;</i> <span>Tiết kiệm thời gian và chi phí</span></p>
        </div>
      </div>
      <div class="h_button_xemchitiet">
        <div class="h_rotate">
          <a href="">Xem chi tiết</a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="h_cacgoighimtin">
  <div class="container">
    <div class="row">
      <!-- <div class="d-flex flex-column-reverse flex-lg-row"> -->
      <div class="col-lg-6 h-col_img_ghimtin">
        <img src="../image/Frame (212).png" alt="">
      </div>
      <div class="col-lg-6 h-col_img_ghimtin1">
       <h2>Đối với các gói ghim tin</h2>
       <div class="h_rotate_ghimtin1">
        <div class="h-rotate-icon"></div>
        <p>Bảo hành tin đăng: <span> Sau thời hạn ghim tin, nếu không có hồ sơ ứng tuyển sẽ tiếp tục được ghim tin tại vị trí đó với khoảng thời gian tương ứng.</p>
        </span>
      </div>
      <div class="h_rotate_ghimtin1">
        <div class="h-rotate-icon"></div>
        <p>Bảo lưu tin đăng: <span>Tin đăng có thời hạn ghim tin đăng ký >1 tuần sẽ được bảo lưu 52 tuần tiếp theo (tính từ ngày cuối cùng sử dụng dịch vụ) nếu thời gian dịch vụ còn lại trên 1 tuần.</p>
        </span>
      </div>
      <div class="h_rotate_ghimtin1">
        <div class="h-rotate-icon"></div>
        <p>Được đổi tin ghim không giới hạn  <span> số lần trong thời gian đăng ký chính với các gói có thời hạn ghim tin từ 1 tuần trở lên tùy theo nhu cầu tuyển dụng của các đơn vị ( không hỗ trợ đổi tin trong thời hạn bảo hành).</p>
        </span>
      </div>
    </div>
    <!-- </div> -->
  </div>
</div>
</div>
<div class="h_cacgoighimtin">
  <div class="container">
    <div class="row">
        <div class="d-flex flex-column-reverse flex-lg-row">
      <div class="col-lg-6 h-col_img_ghimtin1">
       <h2>Đối với các gói lọc hồ sơ</h2>
       <div class="h_rotate_ghimtin1">
        <div class="h-rotate-icon"></div>
        <p>Cơ chế trừ điểm: <span>  Đồng điểm với tất cả các cấp bậc. 1 điểm = 1 hồ sơ.</p>
        </span>
      </div>
      <div class="h_rotate_ghimtin1">
        <div class="h-rotate-icon"></div>
        <p>Cơ chế hoàn điểm:  <span> Hoàn điểm 100% đối với các bộ hồ sơ không chất lượng (Hồ sơ sai thông tin, sai số điện thoại, không liên lạc được, ứng viên không có nhu cầu đi làm).</p>
        </span>
      </div>
    </div>
    <div class="col-lg-6 h-col_img_ghimtin h_img_ghimtin">
      <img src="../image/image 24.png" alt="">
    </div>
  </div>
  </div>
</div>
</div>
<div class="h_nhanxetkhachhang">
<div class="container">
  <div class="row h_row_nhanxet">
  <div class="col-md-4 h_The_MQA_House">
    <div class="h_noidung_The_MQA_House">
      <img src="../image/Vector (1)888.png" alt="">
      <p> Đơn giản, dễ sử dụng và rất hiệu quả để tuyển nhân viên chất lượng cho quán</p>
    </div>
    <img src="../image/Ellipse 77.png" alt="">
    <p>The MQA House</p>
  </div>
  <div class="col-md-4 h_The_MQA_House">
    <div class="h_noidung_The_MQA_House">
      <img src="../image/Vector (1)888.png" alt="">
      <p> Ứng dụng giúp tôi tìm kiếm ứng viên nhanh chóng, giảm bớt được chi phí và có thể check thông tin bất cứ lúc nào</p>
    </div>
    <img src="../image/Ellipse 77 (1).png" alt="">
    <p>Feeling Tea</p>
  </div>
  <div class="col-md-4 h_The_MQA_House">
    <div class="h_noidung_The_MQA_House">
      <img src="../image/Vector (1)888.png" alt="">
      <p>Đơn giản, dễ sử dụng và rất hiệu quả để tuyển nhân viên chất lượng cho quán. Tiếp cận được ứng viên nhanh chóng</p>
    </div>
    <img src="../image/Ellipse 77 (3).png" alt="">
    <p>Ecommage</p>
  </div>
  </div>
  </div>
</div>
  <div class="doitac">
    <div class="text3tuyendung">
      Đối tác uy tín
    </div>
    <div class="textdoitac">Timviec365.com luôn nỗ lực kết nối cùng các đối tác uy tín để cung cấp những công việc có mức thù lao cao cùng môi trường làm việc chuyên nghiệp.</div>
    <div class="container container_nghenghiep">
     <div class="row">
       <div class="col doitac1">
         <img src="../image/Rectangle 511.png" alt="">
       </div>
       <div class="col doitac1">
         <img src="../image/Rectangle 512.png" alt="">
       </div>
       <div class="col doitac1">
         <img src="../image/Rectangle 513.png" alt="">
       </div>
       <div class="col doitac1">
         <img src="../image/Rectangle 514.png" alt="">
       </div>
       <div class="col doitac1">
         <img src="../image/Rectangle 515.png" alt="">
       </div>
       <div class="col doitac1">
         <img src="../image/Rectangle 516.png" alt="">
       </div>
       <div class="col doitac1">
         <img src="../image/Rectangle 517.png" alt="">
       </div>
       <div class="col doitac1">
         <img src="../image/Rectangle 518.png" alt="">
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
