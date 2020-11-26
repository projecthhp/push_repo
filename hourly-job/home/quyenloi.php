<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Quyền lợi</title>
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
  <div class="row h_row_banggiadichvu h_row_lochoso">
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
    <div class="h_cacgoighimtin h_pc_lochoso">
      <div class="container">
        <div class="row">
            <div class="col-md-6 h-col_img_ghimtin h_img_ghimtin h_loc_ho_so">
              <img src="../image/Frame (200).png" alt="">
            </div>
            <div class="col-md-6 h-col_img_ghimtin1 h_lochoso">
             <h2>lọc hồ sơ</h2>
             <div class="h_rotate_ghimtin1">
              <div class="h-rotate-icon_loc">
                <i style='font-size:20px' class='fas'>&#xf00c;</i>
              </div>
              <p>Cơ chế trừ điểm: <span>Đồng điểm với tất cả các cấp bậc. 1 điểm = 1 hồ sơ.</span></p>
            </div>
            <div class="h_rotate_ghimtin1">
              <div class="h-rotate-icon_loc">
                <i style='font-size:20px' class='fas'>&#xf00c;</i>
              </div>
              <p>Cơ chế hoàn điểm:  <span> Hoàn điểm 100% đối với các bộ hồ sơ không chất lượng (Hồ sơ sai thông tin, sai số điện thoại, không liên lạc được, ứng viên không có nhu cầu đi làm). </span></p>
            </div>
          </div>
        </div>
        <!-- <div class="h_table_lochoso"></div> -->
        <div class="h_col_thongtin_lochoso">
          <div class="">
            <div class="row h-row-noidung-hoso">
              <div class="col-md-6">
                <div class="h-noidung_hoso h-noidung_hoso1">
                  <p>100 hồ sơ/52 tuần</p>
                  <div class="h_gia_hoso">
                    <b>1.600.000</b>
                    <span>1.760.000 đ</span>
                  </div>
                  <div class="h_content_lochoso">
                   <p><i style='font-size:18px' class='far'>&#xf058;</i> Chủ động tìm ứng viên phù hợp</p> 
                   <p><i style='font-size:18px' class='far'>&#xf058;</i> Chủ động tìm ứng viên phù hợp</p> 
                   <p><i style='font-size:18px' class='far'>&#xf058;</i> Chủ động tìm ứng viên phù hợp</p> 
                 </div>
                 <div class="">
                  <div class="row">
                    <div class="col-4 col-md_quyenloi">
                      <div class="dropdown">
                        <a class="h_dropbtn"><img src="../image/Vector (1hoa).png" alt="">Quyền lợi</a>
                        <div class="dropdown-content h_dropdown-content">
                          <div class="h_quyenloi_content">
                           <h5>Quyền lợi</h5>
                         </div>
                         <div class="h_menu_dung_quyenloi1">
                           <p>- NTD được xem 200 hồ sơ ứng viên trong thời gian 1 năm.</p>
                           <p>- Hoàn điểm ngay trong 24h nếu ứng viên đã có việc hoặc sai số điện thoại.</p>
                           <p>- Tin tuyển dụng được Biên tập viên viết bài quảng bá và có quay review công ty (thí điểm tại Hà Nội) đăng kèm theo tin tuyển dụng, tham khảo tại ĐÂY.</p>
                           <p>- Khách hàng tái ký được chiết khấu thêm 5% của kỳ trước.</p>
                         </div>
                       </div>
                     </div>
                   </div>
                   <div class="col-4 col-md_quyenloi">
                    <div class="dropdown">
                      <a class="h_dropbtn">
                        <i style='font-size:16px' class='fas'>&#xf06b;</i>Ưu đãi
                      </a>
                      <div class="dropdown-content h_dropdown-content h_dropdown-content1">
                        <div class="h_quyenloi_content">
                         <h5>Ưu đãi</h5>
                       </div>
                       <div class="h_menu_dung_quyenloi1">
                        <h3>* Ưu đãi cơ bản:</h3>
                        <p>- Tặng thẻ điện thoại tại banthe24h.vn 100.000 vnđ </p>
                        <p>- Tặng kèm dịch vụ Mail Marketing gửi cho ứng viên phù hợp nhất</p>
                        <p>- Đăng tin cơ bản không giới hạn</p>
                        <p>- Tặng mẫu mail mời phỏng vấn gửi ứng viên chuyên nghiệp tăng thêm 30% ứng viên đến phỏng vấn (xem chi tiết). </p>
                        <h3>* Ưu đãi ghim tin trang ngành:</h3>
                        <p>- Tặng ngay 1 dịch vụ ghim 1 tin trên trang ngành trong 2 tuần </p>
                        <h3>* Dịch vụ đề xuất tăng hiệu quả tin đăng :</h3>
                        <p>+ Biên tập viên chuyên nghiệp viết bài PR về doanh nghiệp theo yêu cầu trên các báo lớn - mức giá hấp dẫn , chi tiết “tại đây”.</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-4 col-md_quyenloi">
                  <div class="dropdown">
                    <a class="h_dropbtn">
                      <i style='font-size:16px' class='fas'>&#xf086;</i>Bình luận
                    </a>
                    <div class="dropdown-content h_dropdown-content h_dropdown-content1 h_dropdown-content2">
                      <div class="h_quyenloi_content">
                       <h5>Bình luận</h5>
                     </div>
                     <div class="h_menu_dung_quyenloi1 h_meun_cmt">
                      <div class="h_elip_binhluan">
                        <img src="../image/Ellipse 35.png" alt="">
                        <div class="h_binhluanone h_binhluan1a">
                          Gói này được tăng thời gian ghim tin lên nên mình rất thích. Sẽ ủng hộ bên bạn dài dài!
                        </div>
                      </div>
                      <div class="h_elip_binhluan1 h_elip_binhluan2">
                        <div class="h_text_binhluan h_text_cmt">
                          Dịch vụ này rẻ hơn các bên khác mà lại giúp cty tôi tuyển được 1 kế toán chỉ trong 1 tuần.
                        </div>
                        <div class="h_binhluanone1">
                          <img src="../image/Ellipse 35 (1).png" alt="">
                        </div>
                      </div>
                      <div class="h_elip_binhluan">
                        <img src="../image/Ellipse 35 (2).png" alt="">
                        <div class="h_binhluanone h_binhluan1a">
                          Gói này được tăng thời gian ghim tin lên nên mình rất thích. Sẽ ủng hộ bên bạn dài dài!
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="h_muangay_hoso">
           <a href="">Mua ngay</a>
         </div>
       </div>
     </div>
     <div class="col-md-6">
      <div class="h-noidung_hoso h-noidung_hoso1">
        <p>100 hồ sơ/52 tuần</p>
        <div class="h_gia_hoso">
          <b>1.600.000</b>
          <span>1.760.000 đ</span>
        </div>
        <div class="h_content_lochoso">
         <p><i style='font-size:18px' class='far'>&#xf058;</i> Chủ động tìm ứng viên phù hợp</p> 
         <p><i style='font-size:18px' class='far'>&#xf058;</i> Chủ động tìm ứng viên phù hợp</p> 
         <p><i style='font-size:18px' class='far'>&#xf058;</i> Chủ động tìm ứng viên phù hợp</p> 
       </div>
       <div class="">
        <div class="row">
          <div class="col-4 col-md_quyenloi"><img src="../image/Vector (1hoa).png" alt="">Quyền lợi</div>
          <div class="col-4 col-md_quyenloi"><i style='font-size:16px' class='fas'>&#xf06b;</i>Ưu đãi</div>
          <div class="col-4 col-md_quyenloi"><i style='font-size:16px' class='fas'>&#xf086;</i>Bình luận</div>
        </div>
      </div>
      <div class="h_muangay_hoso">
       <a href="">Mua ngay</a>
     </div>
   </div>
 </div>
 <div class="col-md-6">
  <div class="h-noidung_hoso h-noidung_hoso1">
    <p>100 hồ sơ/52 tuần</p>
    <div class="h_gia_hoso">
      <b>1.600.000</b>
      <span>1.760.000 đ</span>
    </div>
    <div class="h_content_lochoso">
     <p><i style='font-size:18px' class='far'>&#xf058;</i> Chủ động tìm ứng viên phù hợp</p> 
     <p><i style='font-size:18px' class='far'>&#xf058;</i> Chủ động tìm ứng viên phù hợp</p> 
     <p><i style='font-size:18px' class='far'>&#xf058;</i> Chủ động tìm ứng viên phù hợp</p> 
   </div>
   <div class="">
    <div class="row">
      <div class="col-4 col-md_quyenloi"><img src="../image/Vector (1hoa).png" alt="">Quyền lợi</div>
      <div class="col-4 col-md_quyenloi"><i style='font-size:16px' class='fas'>&#xf06b;</i>Ưu đãi</div>
      <div class="col-4 col-md_quyenloi"><i style='font-size:16px' class='fas'>&#xf086;</i>Bình luận</div>
    </div>
  </div>
  <div class="h_muangay_hoso">
   <a href="">Mua ngay</a>
 </div>
</div>
</div>
<div class="col-md-6">
  <div class="h-noidung_hoso h-noidung_hoso1">
    <p>100 hồ sơ/52 tuần</p>
    <div class="h_gia_hoso">
      <b>1.600.000</b>
      <span>1.760.000 đ</span>
    </div>
    <div class="h_content_lochoso">
     <p><i style='font-size:18px' class='far'>&#xf058;</i> Chủ động tìm ứng viên phù hợp</p> 
     <p><i style='font-size:18px' class='far'>&#xf058;</i> Chủ động tìm ứng viên phù hợp</p> 
     <p><i style='font-size:18px' class='far'>&#xf058;</i> Chủ động tìm ứng viên phù hợp</p> 
   </div>
   <div class="">
    <div class="row">
      <div class="col-4 col-md_quyenloi"><img src="../image/Vector (1hoa).png" alt="">Quyền lợi</div>
      <div class="col-4 col-md_quyenloi"><i style='font-size:16px' class='fas'>&#xf06b;</i>Ưu đãi</div>
      <div class="col-4 col-md_quyenloi"><i style='font-size:16px' class='fas'>&#xf086;</i>Bình luận</div>
    </div>
  </div>
  <div class="h_muangay_hoso">
   <a href="">Mua ngay</a>
 </div>
</div>
</div>
<div class="col-md-6">
  <div class="h-noidung_hoso h-noidung_hoso1">
    <p>100 hồ sơ/52 tuần</p>
    <div class="h_gia_hoso">
      <b>1.600.000</b>
      <span>1.760.000 đ</span>
    </div>
    <div class="h_content_lochoso">
     <p><i style='font-size:18px' class='far'>&#xf058;</i> Chủ động tìm ứng viên phù hợp</p> 
     <p><i style='font-size:18px' class='far'>&#xf058;</i> Chủ động tìm ứng viên phù hợp</p> 
     <p><i style='font-size:18px' class='far'>&#xf058;</i> Chủ động tìm ứng viên phù hợp</p> 
   </div>
   <div class="">
    <div class="row">
      <div class="col-4 col-md_quyenloi"><img src="../image/Vector (1hoa).png" alt="">Quyền lợi</div>
      <div class="col-4 col-md_quyenloi"><i style='font-size:16px' class='fas'>&#xf06b;</i>Ưu đãi</div>
      <div class="col-4 col-md_quyenloi"><i style='font-size:16px' class='fas'>&#xf086;</i>Bình luận</div>
    </div>
  </div>
  <div class="h_muangay_hoso">
   <a href="">Mua ngay</a>
 </div>
</div>
</div>
<div class="col-md-6">
  <div class="h-noidung_hoso h-noidung_hoso1">
    <p>100 hồ sơ/52 tuần</p>
    <div class="h_gia_hoso">
      <b>1.600.000</b>
      <span>1.760.000 đ</span>
    </div>
    <div class="h_content_lochoso">
     <p><i style='font-size:18px' class='far'>&#xf058;</i> Chủ động tìm ứng viên phù hợp</p> 
     <p><i style='font-size:18px' class='far'>&#xf058;</i> Chủ động tìm ứng viên phù hợp</p> 
     <p><i style='font-size:18px' class='far'>&#xf058;</i> Chủ động tìm ứng viên phù hợp</p> 
   </div>
   <div class="">
    <div class="row">
      <div class="col-4 col-md_quyenloi"><img src="../image/Vector (1hoa).png" alt="">Quyền lợi</div>
      <div class="col-4 col-md_quyenloi"><i style='font-size:16px' class='fas'>&#xf06b;</i>Ưu đãi</div>
      <div class="col-4 col-md_quyenloi"><i style='font-size:16px' class='fas'>&#xf086;</i>Bình luận</div>
    </div>
  </div>
  <div class="h_muangay_hoso">
   <a href="">Mua ngay</a>
 </div>
</div>
</div>
<div class="col-md-6">
  <div class="h-noidung_hoso h-noidung_hoso1">
    <p>100 hồ sơ/52 tuần</p>
    <div class="h_gia_hoso">
      <b>1.600.000</b>
      <span>1.760.000 đ</span>
    </div>
    <div class="h_content_lochoso">
     <p><i style='font-size:18px' class='far'>&#xf058;</i> Chủ động tìm ứng viên phù hợp</p> 
     <p><i style='font-size:18px' class='far'>&#xf058;</i> Chủ động tìm ứng viên phù hợp</p> 
     <p><i style='font-size:18px' class='far'>&#xf058;</i> Chủ động tìm ứng viên phù hợp</p> 
   </div>
   <div class="">
    <div class="row">
      <div class="col-4 col-md_quyenloi"><img src="../image/Vector (1hoa).png" alt="">Quyền lợi</div>
      <div class="col-4 col-md_quyenloi"><i style='font-size:16px' class='fas'>&#xf06b;</i>Ưu đãi</div>
      <div class="col-4 col-md_quyenloi"><i style='font-size:16px' class='fas'>&#xf086;</i>Bình luận</div>
    </div>
  </div>
  <div class="h_muangay_hoso">
   <a href="">Mua ngay</a>
 </div>
</div>
</div>
<div class="col-md-6">
  <div class="h-noidung_hoso h-noidung_hoso1">
    <p>100 hồ sơ/52 tuần</p>
    <div class="h_gia_hoso">
      <b>1.600.000</b>
      <span>1.760.000 đ</span>
    </div>
    <div class="h_content_lochoso">
     <p><i style='font-size:18px' class='far'>&#xf058;</i> Chủ động tìm ứng viên phù hợp</p> 
     <p><i style='font-size:18px' class='far'>&#xf058;</i> Chủ động tìm ứng viên phù hợp</p> 
     <p><i style='font-size:18px' class='far'>&#xf058;</i> Chủ động tìm ứng viên phù hợp</p> 
   </div>
   <div class="">
    <div class="row">
      <div class="col-4 col-md_quyenloi"><img src="../image/Vector (1hoa).png" alt="">Quyền lợi</div>
      <div class="col-4 col-md_quyenloi"><i style='font-size:16px' class='fas'>&#xf06b;</i>Ưu đãi</div>
      <div class="col-4 col-md_quyenloi"><i style='font-size:16px' class='fas'>&#xf086;</i>Bình luận</div>
    </div>
  </div>
  <div class="h_muangay_hoso">
   <a href="">Mua ngay</a>
 </div>
</div>
</div>
</div>
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
<div class="h_cacgoighimtin h_tablet_lochoso">
  <div class="container">
    <div class="row">
        <div class="col-md-6 h-col_img_ghimtin h_img_ghimtin h_loc_ho_so">
          <img src="../image/Frame (200).png" alt="">
        </div>
        <div class="col-md-6 h-col_img_ghimtin1 h_lochoso">
         <h2>lọc hồ sơ</h2>
         <div class="h_rotate_ghimtin1">
          <div class="h-rotate-icon_loc">
            <i style='font-size:20px' class='fas'>&#xf00c;</i>
          </div>
          <p>Cơ chế trừ điểm: <span>Đồng điểm với tất cả các cấp bậc. 1 điểm = 1 hồ sơ.</span></p>
        </div>
        <div class="h_rotate_ghimtin1">
          <div class="h-rotate-icon_loc">
            <i style='font-size:20px' class='fas'>&#xf00c;</i>
          </div>
          <p>Cơ chế hoàn điểm:  <span> Hoàn điểm 100% đối với các bộ hồ sơ không chất lượng (Hồ sơ sai thông tin, sai số điện thoại, không liên lạc được, ứng viên không có nhu cầu đi làm). </span></p>
        </div>
      </div>
    </div>
    <div class="h_table_lochoso">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col" class="h_ten_lochoso">Tên gói</th>
            <th scope="col" class="h_ten_lochoso">Giá(vnđ)</th>
            <th scope="col" class="h_ten_lochoso">Chiết khấu(%)</th>
            <th scope="col" class="h_ten_lochoso">Giá có VAT(vnđ)</th>
            <th scope="col" class="h_ten_lochoso">Tặng thẻ điện thoại</th>
            <th scope="col" class="h_ten_lochoso">Tặng kèm</th>
            <th scope="col" class="h_ten_lochoso">Quyền lợi</th>
            <th scope="col" class="h_ten_lochoso">Ưu đãi</th>
            <th scope="col" class="h_ten_lochoso">Bình luận</th>
          </tr>
        </thead>
        <tbody>
          <tr class="h_loc_tr_icon">
            <td>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                <label class="form-check-label h_form-check-label" for="exampleRadios1">
                  100 hồ sơ/52 tuần 
                </label>
              </div>
            </td>
            <td>1.600.000</td>
            <td>0</td>
            <td>1.760.000</td>
            <td>0</td>
            <td>0</td>
            <td>
              <nav class="h_menu1">
                <ul>    
                 <li>
                   <a href="#"><img src="../image/Vector (1hoa).png" alt=""></a>
                   <ul>
                    <li>
                      <div class="h_main">
                       <div class="h_quyenloi">
                         <h2>Quyền lợi</h2>
                       </div>
                       <div class="h_menu_dung_quyenloi">
                         <p>- NTD được xem 200 hồ sơ ứng viên trong thời gian 1 năm.</p>
                         <p>- Hoàn điểm ngay trong 24h nếu ứng viên đã có việc hoặc sai số điện thoại. </p>
                         <p>- Tin tuyển dụng được Biên tập viên viết bài quảng bá và có quay review công ty (thí điểm tại Hà Nội) đăng kèm theo tin tuyển dụng, tham khảo tại ĐÂY.</p>
                         <p>- Khách hàng tái ký được chiết khấu thêm 5% của kỳ trước.</p>
                       </div>
                     </div>
                   </li>
                 </ul>
               </li>
             </ul>
           </nav>
         </td>
         <td>
          <nav class="h_menu1">
            <ul>    
             <li>
               <a href="#"><i style='font-size:20px' class='fas'>&#xf06b;</i></a>
               <ul>
                <li>
                  <div class="h_main">
                   <div class="h_quyenloi">
                     <h2>Ưu đãi</h2>
                   </div>
                   <div class="h_menu_dung_quyenloi">
                     <h3>* Ưu đãi cơ bản</h3>
                     <p>- Tặng thẻ điện thoại tại banthe24h.vn 100.000 vnđ </p>
                     <p>- Tặng kèm dịch vụ Mail Marketing gửi cho ứng viên phù hợp nhất</p>
                     <p>- Đăng tin cơ bản không giới hạn  </p>
                     <p>- Tặng mẫu mail mời phỏng vấn gửi ứng viên chuyên nghiệp tăng thêm 30% ứng viên đến phỏng vấn (xem chi tiết).</p>
                     <h3>* Ưu đãi ghim tin trang ngành:</h3>
                     <p>- Tặng ngay 1 dịch vụ ghim 1 tin trên trang ngành trong 2 tuần</p>
                     <h3>* Dịch vụ đề xuất tăng hiệu quả tin đăng :</h3>
                     <p>+ Biên tập viên chuyên nghiệp viết bài PR về doanh nghiệp theo yêu cầu trên các báo lớn - mức giá hấp dẫn , chi tiết “tại đây”.</p>
                   </div>
                 </div>
               </li>
             </ul>
           </li>
         </ul>
       </nav>
     </td>
     <td>
      <nav class="h_menu1">
        <ul>    
         <li>
           <a href="#"><i style='font-size:20px' class='fas'>&#xf086;</i></a>
           <ul>
            <li>
              <div class="h_main h_main_binhluan">
                <div class="h_quyenloi">
                  <h2>Bình luận</h2>
                </div>
                <div class="h_menu_dung_quyenloi h_cmt_elip">
                  <div class="h_elip_binhluan">
                    <img src="../image/Ellipse 35.png" alt="">
                    <div class="h_binhluanone">
                      Gói này được tăng thời gian ghim tin lên nên mình rất thích. Sẽ ủng hộ bên bạn dài dài!
                    </div>
                  </div>
                  <div class="h_elip_binhluan1">
                    <div class="h_text_binhluan">
                      Dịch vụ này rẻ hơn các bên khác mà lại giúp cty tôi tuyển được 1 kế toán chỉ trong 1 tuần.
                    </div>
                    <div class="h_binhluanone1">
                      <img src="../image/Ellipse 35 (1).png" alt="">
                    </div>
                  </div>
                  <div class="h_elip_binhluan">
                    <img src="../image/Ellipse 35 (2).png" alt="">
                    <div class="h_binhluanone">
                      Gói này được tăng thời gian ghim tin lên nên mình rất thích. Sẽ ủng hộ bên bạn dài dài!
                    </div>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </td>
</tr>
<tr class="h_loc_tr_icon">
  <td>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option2">
      <label class="form-check-label h_form-check-label" for="exampleRadios1">
        200 hồ sơ/52 tuần 
      </label>
    </div>
  </td>
  <td>3.200.000</td>
  <td>10</td>
  <td>3.168.000</td>
  <td>100.000</td>
  <td>Ghim tin 2 tuần</td>
  <td><img src="../image/Vector (1hoa).png" alt=""></td>
  <td><i style='font-size:20px' class='fas'>&#xf06b;</i></td>
  <td><i style='font-size:20px' class='fas'>&#xf086;</i></td>
</tr>
<tr class="h_loc_tr_icon">
  <td>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option3">
      <label class="form-check-label h_form-check-label" for="exampleRadios1">
        300 hồ sơ/52 tuần 
      </label>
    </div>
  </td>
  <td>4.800.000</td>
  <td>15</td>
  <td>4.488.000</td>
  <td>100.000</td>
  <td>Ghim tin 3 tuần</td>
  <td><img src="../image/Vector (1hoa).png" alt=""></td>
  <td><i style='font-size:20px' class='fas'>&#xf06b;</i></td>
  <td><i style='font-size:20px' class='fas'>&#xf086;</i></td>
</tr>
<tr class="h_loc_tr_icon">
  <td>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option4">
      <label class="form-check-label h_form-check-label" for="exampleRadios1">
        500 hồ sơ/52 tuần 
      </label>
    </div>
  </td>
  <td>8.000.000</td>
  <td>15</td>
  <td>7.480.000</td>
  <td>200.000</td>
  <td>Ghim tin 5 tuần</td>
  <td><img src="../image/Vector (1hoa).png" alt=""></td>
  <td><i style='font-size:20px' class='fas'>&#xf06b;</i></td>
  <td><i style='font-size:20px' class='fas'>&#xf086;</i></td>
</tr>
<tr class="h_loc_tr_icon">
  <td>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option6">
      <label class="form-check-label h_form-check-label" for="exampleRadios1">
        1000 hồ sơ/52 tuần 
      </label>
    </div>
  </td>
  <td>16.000.000</td>
  <td>20</td>
  <td>14.080.000</td>
  <td>500.000</td>
  <td>Ghim tin 10 tuần</td>
  <td><img src="../image/Vector (1hoa).png" alt=""></td>
  <td><i style='font-size:20px' class='fas'>&#xf06b;</i></td>
  <td><i style='font-size:20px' class='fas'>&#xf086;</i></td>
</tr>
<tr class="h_loc_tr_icon">
  <td>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option7">
      <label class="form-check-label h_form-check-label" for="exampleRadios1">
        1500 hồ sơ/52 tuần 
      </label>
    </div>
  </td>
  <td>24.000.000</td>
  <td>25</td>
  <td>19.800.000</td>
  <td>500.000</td>
  <td>Ghim tin 15 tuần</td>
  <td><img src="../image/Vector (1hoa).png" alt=""></td>
  <td><i style='font-size:20px' class='fas'>&#xf06b;</i></td>
  <td><i style='font-size:20px' class='fas'>&#xf086;</i></td>
</tr>
<tr class="h_loc_tr_icon">
  <td>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option8">
      <label class="form-check-label h_form-check-label" for="exampleRadios1">
        2000 hồ sơ/52 tuần 
      </label>
    </div>
  </td>
  <td>32.000.000</td>
  <td>25</td>
  <td>26.400.000</td>
  <td>500.000</td>
  <td>Ghim tin 20 tuần</td>
  <td><img src="../image/Vector (1hoa).png" alt=""></td>
  <td><i style='font-size:20px' class='fas'>&#xf06b;</i></td>
  <td><i style='font-size:20px' class='fas'>&#xf086;</i></td>
</tr>
<tr class="h_loc_tr_icon">
  <td>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option9">
      <label class="form-check-label h_form-check-label" for="exampleRadios1">
        2500 hồ sơ/52 tuần 
      </label>
    </div>
  </td>
  <td>40.000.000</td>
  <td>25</td>
  <td>33.000.000</td>
  <td>500.000</td>
  <td>Ghim tin 25 tuần</td>
  <td><img src="../image/Vector (1hoa).png" alt=""></td>
  <td><i style='font-size:20px' class='fas'>&#xf06b;</i></td>
  <td><i style='font-size:20px' class='fas'>&#xf086;</i></td>
</tr>
<tr class="h_loc_tr_icon">
  <td>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option10">
      <label class="form-check-label h_form-check-label" for="exampleRadios1">
        3000 hồ sơ/52 tuần 
      </label>
    </div>
  </td>
  <td>48.000.000</td>
  <td>25</td>
  <td>39.600.000</td>
  <td>500.000</td>
  <td>Ghim tin 30 tuần</td>
  <td><img src="../image/Vector (1hoa).png" alt=""></td>
  <td><i style='font-size:20px' class='fas'>&#xf06b;</i></td>
  <td><i style='font-size:20px' class='fas'>&#xf086;</i></td>
</tr>
<tr class="h_loc_tr_icon">
  <td>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option5">
      <label class="form-check-label h_form-check-label" for="exampleRadios1">
        5000 hồ sơ/52 tuần 
      </label>
    </div>
  </td>
  <td>80.000.000</td>
  <td>30</td>
  <td>61.600.000</td>
  <td>500</td>
  <td>Ghim tin 50 tuần</td>
  <td><img src="../image/Vector (1hoa).png" alt=""></td>
  <td><i style='font-size:20px' class='fas'>&#xf06b;</i></td>
  <td><i style='font-size:20px' class='fas'>&#xf086;</i></td>
</tr>
</tbody>
</table>
<div class="h_sudungdichvu">
  <a href="">Sử dụng dịch vụ này</a>
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
<footer>
	<div id="footer-bottom" class="main">
   <div id="footer_company" class="text-center main">
    <div id="name_site">Timviec365.com - Tìm Việc Làm Nhanh, Tuyển Dụng Hiệu Quả</div>
    <div id="nameCompany_mst">
     <span id="nameCompany">Công ty TNHH MTV nguồn nhân lực 365</span>
     <span id="mstFooter">Mã số thuế: 0109218540 do Sở kế hoạch và đầu tư thành phố Hà Nội cấp ngày 10/06/2020</span>
   </div>
 </div>
 <div class="col col_1">
   <div class="title">Thông tin liên hệ</div>
   <div class="content main">
    <p><i class="fa fa-phone" aria-hidden="true"></i><span>Hotline:</span> 0971.335.869  |  024 36.36.66.99</p>
    <p><i class="fa fa-envelope-o" aria-hidden="true"></i><span>Email hỗ trợ:</span> Timviec365com@gmail.com</p>
    <p><i class="fa fa-building-o" aria-hidden="true"></i><span>Địa chỉ: </span>Số 206 Định Công Hạ , Phường Định Công, Quận Hoàng Mai, Thành phố Hà Nội, Việt Nam</p>
  </div>
</div>
<div class="col col_2">
 <div class="title">Website đối tác về tìm việc làm</div>
 <p><i class="fa fa-angle-right" aria-hidden="true"></i>Nơi tìm việc làm hàng đầu: <a href="https://timviec365.vn/">Tìm việc 365</a></p>
 <p><i class="fa fa-angle-right" aria-hidden="true"></i>Tìm việc làm thêm mới nhất: <a href="https://timviec365.vn/tim-viec-lam-them.html">Tại đây</a></p>
 <p><i class="fa fa-angle-right" aria-hidden="true"></i>Nơi tạo tải cv xin việc đẹp nhất: <a href="https://timviec365.vn/cv-xin-viec">Cv xin việc 365</a></p>
 <div id="bocongthuong" class="pull-left">
  <a href="http://online.gov.vn/(X(1)S(v5imsxysht0tkoyqmeb5jllf))/Home/WebDetails/69185?AspxAutoDetectCookieSupport=1" target="_blank" rel="nofollow">
   <img style="width:auto" src="../image/image 15.png" class="lazyload" data-src="https://timviec365.com/images/dk.png" alt="Đã đăng ký Bộ công thương">
 </a>
</div>
<div class="pull-left">
  <a class="icon_mxh"><img src="../image/Frame5.png" alt="Twitter"></a>
  <a class="icon_mxh"><img src="../image/Frame (4).png" alt="Facebook"></a>
  <a class="icon_mxh"><img src="../image/Frame (3).png" alt="Youtube"></a>
</div>
</div>
<div class="col col_3">
 <div class="title">Ứng dụng thương mại điện tử </div>
 <a href="/ung-dung-tim-viec-lam.html" rel="nofollow" class="link_app" id="app_timviec365"><i class="icon"></i>Tải app Timviec365</a>
 <a href="/ung-dung-tao-cv.html" rel="nofollow" class="link_app" id="app_cv365"><i class="icon"></i>Tải app CV365</a>
</div>
</div>
<div id="footer-top" class="main">
  <ul class="text-center">
   <li><a href="/lien-he">Liên hệ</a></li>
   <li><a href="/ve-chung-toi.html">Về chúng tôi</a></li>
   <li><a href="/quy-che-hoat-dong.html">Quy chế hoạt động</a></li>
   <li><a href="/thong-tin-can-biet.html">Thông tin cần biết</a></li>
   <li><a href="/thoa-thuan-su-dung.html">Thỏa thuận sử dụng</a></li>
   <li><a href="/quy-dinh-bao-mat.html">Quy định bảo mật</a></li>
   <li><a href="/co-che-giai-quyet-tranh-chap.html">Cơ chế giải quyết tranh chấp</a></li>
 </ul>
</div>
</footer>
<div id="btn-top"><i class="fa fa-angle-up" aria-hidden="true"></i></div>
<a rel="nofollow" href="tel:0971335869" id="call_icon"><img alt="Liên hệ qua SĐT" src="/images/img_phone_footer.png" style="width: 42px;height: 41px"></a>
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
