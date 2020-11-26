<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Danh sách việc làm theo ngành nghề tỉnh thành</title>
    <!-- <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
      />
      <link
        href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet"
        /> -->
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
                    <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div> -->
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
                    <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row row_menu">
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
                    <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div> -->
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 div_logo365">
              <img src="../image/logoo 1 (1).png" alt="" />
            </div>
            <style>
              .div_modal {
                width: 300px;
                height: 500px;
              }
              .modal_search {
                text-align: center;
                width: 350px;
                height: 334px;

                background: #ffffff;
                border-radius: 0px 0px 0px 10px;
              }
              .modal-header-search {
                width: 100%;
              }
              .form_search {
                width: 100%;
              }
              .modal-footer-search {
                text-align: center;
              }
            </style>
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
                    <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div> -->
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
                  <li><a href="" class="text-light" s>Bảng giá</a></li>
                  <li>
                    <a href="" class="login border p-2 bg-white text-primary"
                      >Đăng ký</a
                    >
                  </li>
                  <li>
                    <a href="" class="login border p-2 text-light bg-warning"
                      >Đăng nhập</a
                    >
                  </li>
                  <li>
                    <a href="" class="login border p-2 text-light bg-primary"
                      >Dành cho doanh nhiệp</a
                    >
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="benner">
          <div class="p-3">
            <div class="search">
              <div class="container">
                <form action="" class="form1 clearfix">
                  <div class="col1 c2">
                    <div class="input1_wrapper">
                      <div class="input1_inner">
                        <input
                          type="text"
                          class="form-control input datepicker"
                          placeholder="Nhập từ khóa tìm kiếm"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="col2 c3">
                    <div class="select1_wrapper">
                      <div class="select1_wrapper">
                        <select
                          class="js-example-basic-single select"
                          name="state"
                          id="index_category"
                        >
                          <option value="0">Chọn ngành nghề</option>
                          <option value="1">Wyoming</option>
                          <option value="2">2 Children</option>
                          <option value="3">3 Children</option>
                          <option value="4">4 Children</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col4 c4">
                    <div class="select1_wrapper">
                      <div class="select1_inner">
                        <select
                          class="js-example-basic-single select"
                          name="state"
                          id="index_category1"
                        >
                          <option value="0">Chọn tỉnh thành</option>
                          <option value="1">Wyoming</option>
                          <option value="2">2 Children</option>
                          <option value="3">3 Children</option>
                          <option value="4">4 Children</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col3 c6">
                    <button type="submit" class="btn-form1-submit">
                      <i style="font-size: 24px" class="fas">&#xf002;</i>
                    </button>
                  </div>
                </form>
              </div>
              <div class="title_moblie">
                Tải ngay ứng dụng timviec365 và cv365+ trên điện thoại để trải
                nghiệm tốt nhất
              </div>
              <div class="title">
                <p>
                  Tải ngay ứng dụng timviec365 và cv365+ trên điện thoại để trải
                  nghiệm tốt nhất
                </p>
              </div>
              <div class="button1 button_one">
                <button type="button" class="btn btn-primar bg-primary">
                  <a href="" class="text-light text_mobile"
                    ><img src="../image/apptimviec 1.png" alt="" />Tải app
                    Timviec365
                  </a>
                </button>
                <button type="button" class="btn btn-secondar bg-warning">
                  <a href="" class="text-light div_icon1 text_mobile1"
                    ><img src="../image/Icon.png" alt="" /> Tải app CV365</a
                  >
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="tieude1">
          Trang chủ / Dành cho người tìm việc/<span>
            Việc làm xây dựng tại hà nội</span
          >
        </div>
      </div>
    </div>
    <div class="slideshow">
      <div class="slideshow-container">
        <div class="container-slideshow">
          <h2 class="">Việc xây dụng theo giờ ở Hà Nội</h2>
          <div class="row">
            <section class="regular slider">
              <div class="itemRegular">
                <div class="col-md-4 slideshow_div">
                  <div class="div_anh">
                    <img src="../image/Rectangle 201.png" alt="" />
                  </div>
                  <div class="div_text">
                    <a href=""> Nhân viên bán vé xem phim </a>
                  </div>
                  <div class="div_map">
                    <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                    351 Lĩnh Nam, Hoàng Mai, Hà Nội
                  </div>
                  <div class="div_money">
                    <i class="material-icons" style="font-size: 14px"
                      >&#xe227;</i
                    >7.000.000đ/tháng
                  </div>
                  <div class="div_bag">
                    <i class="material-icons" style="font-size: 14px"
                      >&#xe8f8;</i
                    >Toàn thời gian
                  </div>
                </div>
                <div class="col-md-4 slideshow_div">
                  <div class="div_anh">
                    <img src="../image/Rectangle 201.png" alt="" />
                  </div>
                  <div class="div_text">
                    <a href=""> Nhân viên bán vé xem phim </a>
                  </div>
                  <div class="div_map">
                    <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                    351 Lĩnh Nam, Hoàng Mai, Hà Nội
                  </div>
                  <div class="div_money">
                    <i class="material-icons" style="font-size: 14px"
                      >&#xe227;</i
                    >7.000.000đ/tháng
                  </div>
                  <div class="div_bag">
                    <i class="material-icons" style="font-size: 14px"
                      >&#xe8f8;</i
                    >Toàn thời gian
                  </div>
                </div>
                <div class="col-md-4 slideshow_div">
                  <div class="div_anh">
                    <img src="../image/Rectangle 201.png" alt="" />
                  </div>
                  <div class="div_text">
                    <a href=""> Nhân viên bán vé xem phim </a>
                  </div>
                  <div class="div_map">
                    <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                    351 Lĩnh Nam, Hoàng Mai, Hà Nội
                  </div>
                  <div class="div_money">
                    <i class="material-icons" style="font-size: 14px"
                      >&#xe227;</i
                    >7.000.000đ/tháng
                  </div>
                  <div class="div_bag">
                    <i class="material-icons" style="font-size: 14px"
                      >&#xe8f8;</i
                    >Toàn thời gian
                  </div>
                </div>
                <div class="col-md-4 slideshow_div">
                  <div class="div_anh">
                    <img src="../image/Rectangle 201.png" alt="" />
                  </div>
                  <div class="div_text">
                    <a href=""> Nhân viên bán vé xem phim </a>
                  </div>
                  <div class="div_map">
                    <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                    351 Lĩnh Nam, Hoàng Mai, Hà Nội
                  </div>
                  <div class="div_money">
                    <i class="material-icons" style="font-size: 14px"
                      >&#xe227;</i
                    >7.000.000đ/tháng
                  </div>
                  <div class="div_bag">
                    <i class="material-icons" style="font-size: 14px"
                      >&#xe8f8;</i
                    >Toàn thời gian
                  </div>
                </div>
                <div class="col-md-4 slideshow_div">
                  <div class="div_anh">
                    <img src="../image/Rectangle 201.png" alt="" />
                  </div>
                  <div class="div_text">
                    <a href=""> Nhân viên bán vé xem phim </a>
                  </div>
                  <div class="div_map">
                    <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                    351 Lĩnh Nam, Hoàng Mai, Hà Nội
                  </div>
                  <div class="div_money">
                    <i class="material-icons" style="font-size: 14px"
                      >&#xe227;</i
                    >7.000.000đ/tháng
                  </div>
                  <div class="div_bag">
                    <i class="material-icons" style="font-size: 14px"
                      >&#xe8f8;</i
                    >Toàn thời gian
                  </div>
                </div>
              </div>
              <div class="itemRegular">
                <div class="col-md-4 slideshow_div">
                  <div class="div_anh">
                    <img src="../image/Rectangle 2.png" alt="" />
                  </div>
                  <div class="div_text">
                    <a href="">CTV phân loại hàng hóa</a>
                  </div>
                  <div class="div_map">
                    <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                    123 Nguyễn Trãi, Thanh Xuân, Hà Nội
                  </div>
                  <div class="div_money">
                    <i class="material-icons" style="font-size: 14px"
                      >&#xe227;</i
                    >30.000đ/giờ
                  </div>
                  <div class="div_bag">
                    <i class="material-icons" style="font-size: 14px"
                      >&#xe8f8;</i
                    >Toàn thời gian
                  </div>
                </div>
                <div class="col-md-4 slideshow_div">
                  <div class="div_anh">
                    <img src="../image/Rectangle 2.png" alt="" />
                  </div>
                  <div class="div_text">
                    <a href="">CTV phân loại hàng hóa</a>
                  </div>
                  <div class="div_map">
                    <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                    123 Nguyễn Trãi, Thanh Xuân, Hà Nội
                  </div>
                  <div class="div_money">
                    <i class="material-icons" style="font-size: 14px"
                      >&#xe227;</i
                    >30.000đ/giờ
                  </div>
                  <div class="div_bag">
                    <i class="material-icons" style="font-size: 14px"
                      >&#xe8f8;</i
                    >Toàn thời gian
                  </div>
                </div>
                <div class="col-md-4 slideshow_div">
                  <div class="div_anh">
                    <img src="../image/Rectangle 2.png" alt="" />
                  </div>
                  <div class="div_text">
                    <a href="">CTV phân loại hàng hóa</a>
                  </div>
                  <div class="div_map">
                    <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                    123 Nguyễn Trãi, Thanh Xuân, Hà Nội
                  </div>
                  <div class="div_money">
                    <i class="material-icons" style="font-size: 14px"
                      >&#xe227;</i
                    >30.000đ/giờ
                  </div>
                  <div class="div_bag">
                    <i class="material-icons" style="font-size: 14px"
                      >&#xe8f8;</i
                    >Toàn thời gian
                  </div>
                </div>
                <div class="col-md-4 slideshow_div">
                  <div class="div_anh">
                    <img src="../image/Rectangle 2.png" alt="" />
                  </div>
                  <div class="div_text">
                    <a href="">CTV phân loại hàng hóa</a>
                  </div>
                  <div class="div_map">
                    <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                    123 Nguyễn Trãi, Thanh Xuân, Hà Nội
                  </div>
                  <div class="div_money">
                    <i class="material-icons" style="font-size: 14px"
                      >&#xe227;</i
                    >30.000đ/giờ
                  </div>
                  <div class="div_bag">
                    <i class="material-icons" style="font-size: 14px"
                      >&#xe8f8;</i
                    >Toàn thời gian
                  </div>
                </div>
                <div class="col-md-4 slideshow_div">
                  <div class="div_anh">
                    <img src="../image/Rectangle 2.png" alt="" />
                  </div>
                  <div class="div_text">
                    <a href="">CTV phân loại hàng hóa</a>
                  </div>
                  <div class="div_map">
                    <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                    123 Nguyễn Trãi, Thanh Xuân, Hà Nội
                  </div>
                  <div class="div_money">
                    <i class="material-icons" style="font-size: 14px"
                      >&#xe227;</i
                    >30.000đ/giờ
                  </div>
                  <div class="div_bag">
                    <i class="material-icons" style="font-size: 14px"
                      >&#xe8f8;</i
                    >Toàn thời gian
                  </div>
                </div>
              </div>
              <div class="itemRegular">
                <div class="col-md-4 slideshow_div">
                  <div class="div_anh">
                    <img src="../image/Rectangle1.png" alt="" />
                  </div>
                  <div class="div_text"><a>CVT bán hàng online</a></div>
                  <div class="div_map">
                    <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                    123 Đường Láng
                  </div>
                  <div class="div_money">
                    <i class="material-icons" style="font-size: 14px"
                      >&#xe227;</i
                    >30.000đ/giờ
                  </div>
                  <div class="div_bag">
                    <i class="material-icons" style="font-size: 14px"
                      >&#xe8f8;</i
                    >Làm từ xa
                  </div>
                </div>
                <div class="col-md-4 slideshow_div">
                  <div class="div_anh">
                    <img src="../image/Rectangle1.png" alt="" />
                  </div>
                  <div class="div_text"><a>CVT bán hàng online</a></div>
                  <div class="div_map">
                    <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                    123 Đường Láng
                  </div>
                  <div class="div_money">
                    <i class="material-icons" style="font-size: 14px"
                      >&#xe227;</i
                    >30.000đ/giờ
                  </div>
                  <div class="div_bag">
                    <i class="material-icons" style="font-size: 14px"
                      >&#xe8f8;</i
                    >Làm từ xa
                  </div>
                </div>
                <div class="col-md-4 slideshow_div">
                  <div class="div_anh">
                    <img src="../image/Rectangle1.png" alt="" />
                  </div>
                  <div class="div_text"><a>CVT bán hàng online</a></div>
                  <div class="div_map">
                    <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                    123 Đường Láng
                  </div>
                  <div class="div_money">
                    <i class="material-icons" style="font-size: 14px"
                      >&#xe227;</i
                    >30.000đ/giờ
                  </div>
                  <div class="div_bag">
                    <i class="material-icons" style="font-size: 14px"
                      >&#xe8f8;</i
                    >Làm từ xa
                  </div>
                </div>
                <div class="col-md-4 slideshow_div">
                  <div class="div_anh">
                    <img src="../image/Rectangle1.png" alt="" />
                  </div>
                  <div class="div_text"><a>CVT bán hàng online</a></div>
                  <div class="div_map">
                    <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                    123 Đường Láng
                  </div>
                  <div class="div_money">
                    <i class="material-icons" style="font-size: 14px"
                      >&#xe227;</i
                    >30.000đ/giờ
                  </div>
                  <div class="div_bag">
                    <i class="material-icons" style="font-size: 14px"
                      >&#xe8f8;</i
                    >Làm từ xa
                  </div>
                </div>
                <div class="col-md-4 slideshow_div">
                  <div class="div_anh">
                    <img src="../image/Rectangle1.png" alt="" />
                  </div>
                  <div class="div_text"><a>CVT bán hàng online</a></div>
                  <div class="div_map">
                    <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                    123 Đường Láng
                  </div>
                  <div class="div_money">
                    <i class="material-icons" style="font-size: 14px"
                      >&#xe227;</i
                    >30.000đ/giờ
                  </div>
                  <div class="div_bag">
                    <i class="material-icons" style="font-size: 14px"
                      >&#xe8f8;</i
                    >Làm từ xa
                  </div>
                </div>
              </div>
              <div class="itemRegular">
                <div class="col-md-4 slideshow_div">
                  <div class="div_anh">
                    <img src="../image/Rectangle 201.png" alt="" />
                  </div>
                  <div class="div_text">
                    <a href=""> Nhân viên bán vé xem phim </a>
                  </div>
                  <div class="div_map">
                    <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                    351 Lĩnh Nam, Hoàng Mai, Hà Nội
                  </div>
                  <div class="div_money">
                    <i class="material-icons" style="font-size: 14px"
                      >&#xe227;</i
                    >7.000.000đ/tháng
                  </div>
                  <div class="div_bag">
                    <i class="material-icons" style="font-size: 14px"
                      >&#xe8f8;</i
                    >Toàn thời gian
                  </div>
                </div>
                <div class="col-md-4 slideshow_div">
                  <div class="div_anh">
                    <img src="../image/Rectangle 201.png" alt="" />
                  </div>
                  <div class="div_text">
                    <a href=""> Nhân viên bán vé xem phim </a>
                  </div>
                  <div class="div_map">
                    <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                    351 Lĩnh Nam, Hoàng Mai, Hà Nội
                  </div>
                  <div class="div_money">
                    <i class="material-icons" style="font-size: 14px"
                      >&#xe227;</i
                    >7.000.000đ/tháng
                  </div>
                  <div class="div_bag">
                    <i class="material-icons" style="font-size: 14px"
                      >&#xe8f8;</i
                    >Toàn thời gian
                  </div>
                </div>
                <div class="col-md-4 slideshow_div">
                  <div class="div_anh">
                    <img src="../image/Rectangle 201.png" alt="" />
                  </div>
                  <div class="div_text">
                    <a href=""> Nhân viên bán vé xem phim </a>
                  </div>
                  <div class="div_map">
                    <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                    351 Lĩnh Nam, Hoàng Mai, Hà Nội
                  </div>
                  <div class="div_money">
                    <i class="material-icons" style="font-size: 14px"
                      >&#xe227;</i
                    >7.000.000đ/tháng
                  </div>
                  <div class="div_bag">
                    <i class="material-icons" style="font-size: 14px"
                      >&#xe8f8;</i
                    >Toàn thời gian
                  </div>
                </div>
                <div class="col-md-4 slideshow_div">
                  <div class="div_anh">
                    <img src="../image/Rectangle 201.png" alt="" />
                  </div>
                  <div class="div_text">
                    <a href=""> Nhân viên bán vé xem phim </a>
                  </div>
                  <div class="div_map">
                    <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                    351 Lĩnh Nam, Hoàng Mai, Hà Nội
                  </div>
                  <div class="div_money">
                    <i class="material-icons" style="font-size: 14px"
                      >&#xe227;</i
                    >7.000.000đ/tháng
                  </div>
                  <div class="div_bag">
                    <i class="material-icons" style="font-size: 14px"
                      >&#xe8f8;</i
                    >Toàn thời gian
                  </div>
                </div>
                <div class="col-md-4 slideshow_div">
                  <div class="div_anh">
                    <img src="../image/Rectangle 201.png" alt="" />
                  </div>
                  <div class="div_text">
                    <a href=""> Nhân viên bán vé xem phim </a>
                  </div>
                  <div class="div_map">
                    <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                    351 Lĩnh Nam, Hoàng Mai, Hà Nội
                  </div>
                  <div class="div_money">
                    <i class="material-icons" style="font-size: 14px"
                      >&#xe227;</i
                    >7.000.000đ/tháng
                  </div>
                  <div class="div_bag">
                    <i class="material-icons" style="font-size: 14px"
                      >&#xe8f8;</i
                    >Toàn thời gian
                  </div>
                </div>
              </div>
              <!-- <div class="itemRegular">
                  <div class="col-md-4 slideshow_div">
                    <div class="div_anh">
                      <img src="../image/Rectangle 2.png" alt="" />
                    </div>
                    <div class="div_text">
                      <a href="">CTV phân loại hàng hóa</a>
                    </div>
                    <div class="div_map">
                      <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                      123 Nguyễn Trãi, Thanh Xuân, Hà Nội
                    </div>
                    <div class="div_money">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe227;</i
                      >30.000đ/giờ
                    </div>
                    <div class="div_bag">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe8f8;</i
                      >Toàn thời gian
                    </div>
                  </div>
                  <div class="col-md-4 slideshow_div">
                    <div class="div_anh">
                      <img src="../image/Rectangle 2.png" alt="" />
                    </div>
                    <div class="div_text">
                      <a href="">CTV phân loại hàng hóa</a>
                    </div>
                    <div class="div_map">
                      <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                      123 Nguyễn Trãi, Thanh Xuân, Hà Nội
                    </div>
                    <div class="div_money">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe227;</i
                      >30.000đ/giờ
                    </div>
                    <div class="div_bag">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe8f8;</i
                      >Toàn thời gian
                    </div>
                  </div>
                  <div class="col-md-4 slideshow_div">
                    <div class="div_anh">
                      <img src="../image/Rectangle 2.png" alt="" />
                    </div>
                    <div class="div_text">
                      <a href="">CTV phân loại hàng hóa</a>
                    </div>
                    <div class="div_map">
                      <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                      123 Nguyễn Trãi, Thanh Xuân, Hà Nội
                    </div>
                    <div class="div_money">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe227;</i
                      >30.000đ/giờ
                    </div>
                    <div class="div_bag">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe8f8;</i
                      >Toàn thời gian
                    </div>
                  </div>
                  <div class="col-md-4 slideshow_div">
                    <div class="div_anh">
                      <img src="../image/Rectangle 2.png" alt="" />
                    </div>
                    <div class="div_text">
                      <a href="">CTV phân loại hàng hóa</a>
                    </div>
                    <div class="div_map">
                      <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                      123 Nguyễn Trãi, Thanh Xuân, Hà Nội
                    </div>
                    <div class="div_money">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe227;</i
                      >30.000đ/giờ
                    </div>
                    <div class="div_bag">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe8f8;</i
                      >Toàn thời gian
                    </div>
                  </div>
                  <div class="col-md-4 slideshow_div">
                    <div class="div_anh">
                      <img src="../image/Rectangle 2.png" alt="" />
                    </div>
                    <div class="div_text">
                      <a href="">CTV phân loại hàng hóa</a>
                    </div>
                    <div class="div_map">
                      <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                      123 Nguyễn Trãi, Thanh Xuân, Hà Nội
                    </div>
                    <div class="div_money">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe227;</i
                      >30.000đ/giờ
                    </div>
                    <div class="div_bag">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe8f8;</i
                      >Toàn thời gian
                    </div>
                  </div>
                </div>
                <div class="itemRegular">
                  <div class="col-md-4 slideshow_div">
                    <div class="div_anh">
                      <img src="../image/Rectangle1.png" alt="" />
                    </div>
                    <div class="div_text"><a>CVT bán hàng online</a></div>
                    <div class="div_map">
                      <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                      123 Đường Láng
                    </div>
                    <div class="div_money">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe227;</i
                      >30.000đ/giờ
                    </div>
                    <div class="div_bag">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe8f8;</i
                      >Làm từ xa
                    </div>
                  </div>
                  <div class="col-md-4 slideshow_div">
                    <div class="div_anh">
                      <img src="../image/Rectangle1.png" alt="" />
                    </div>
                    <div class="div_text"><a>CVT bán hàng online</a></div>
                    <div class="div_map">
                      <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                      123 Đường Láng
                    </div>
                    <div class="div_money">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe227;</i
                      >30.000đ/giờ
                    </div>
                    <div class="div_bag">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe8f8;</i
                      >Làm từ xa
                    </div>
                  </div>
                  <div class="col-md-4 slideshow_div">
                    <div class="div_anh">
                      <img src="../image/Rectangle1.png" alt="" />
                    </div>
                    <div class="div_text"><a>CVT bán hàng online</a></div>
                    <div class="div_map">
                      <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                      123 Đường Láng
                    </div>
                    <div class="div_money">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe227;</i
                      >30.000đ/giờ
                    </div>
                    <div class="div_bag">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe8f8;</i
                      >Làm từ xa
                    </div>
                  </div>
                  <div class="col-md-4 slideshow_div">
                    <div class="div_anh">
                      <img src="../image/Rectangle1.png" alt="" />
                    </div>
                    <div class="div_text"><a>CVT bán hàng online</a></div>
                    <div class="div_map">
                      <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                      123 Đường Láng
                    </div>
                    <div class="div_money">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe227;</i
                      >30.000đ/giờ
                    </div>
                    <div class="div_bag">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe8f8;</i
                      >Làm từ xa
                    </div>
                  </div>
                  <div class="col-md-4 slideshow_div">
                    <div class="div_anh">
                      <img src="../image/Rectangle1.png" alt="" />
                    </div>
                    <div class="div_text"><a>CVT bán hàng online</a></div>
                    <div class="div_map">
                      <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                      123 Đường Láng
                    </div>
                    <div class="div_money">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe227;</i
                      >30.000đ/giờ
                    </div>
                    <div class="div_bag">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe8f8;</i
                      >Làm từ xa
                    </div>
                  </div>
                </div>
                <div class="itemRegular">
                  <div class="col-md-4 slideshow_div">
                    <div class="div_anh">
                      <img src="../image/Rectangle 201.png" alt="" />
                    </div>
                    <div class="div_text">
                      <a href=""> Nhân viên bán vé xem phim </a>
                    </div>
                    <div class="div_map">
                      <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                      351 Lĩnh Nam, Hoàng Mai, Hà Nội
                    </div>
                    <div class="div_money">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe227;</i
                      >7.000.000đ/tháng
                    </div>
                    <div class="div_bag">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe8f8;</i
                      >Toàn thời gian
                    </div>
                  </div>
                  <div class="col-md-4 slideshow_div">
                    <div class="div_anh">
                      <img src="../image/Rectangle 201.png" alt="" />
                    </div>
                    <div class="div_text">
                      <a href=""> Nhân viên bán vé xem phim </a>
                    </div>
                    <div class="div_map">
                      <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                      351 Lĩnh Nam, Hoàng Mai, Hà Nội
                    </div>
                    <div class="div_money">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe227;</i
                      >7.000.000đ/tháng
                    </div>
                    <div class="div_bag">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe8f8;</i
                      >Toàn thời gian
                    </div>
                  </div>
                  <div class="col-md-4 slideshow_div">
                    <div class="div_anh">
                      <img src="../image/Rectangle 201.png" alt="" />
                    </div>
                    <div class="div_text">
                      <a href=""> Nhân viên bán vé xem phim </a>
                    </div>
                    <div class="div_map">
                      <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                      351 Lĩnh Nam, Hoàng Mai, Hà Nội
                    </div>
                    <div class="div_money">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe227;</i
                      >7.000.000đ/tháng
                    </div>
                    <div class="div_bag">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe8f8;</i
                      >Toàn thời gian
                    </div>
                  </div>
                  <div class="col-md-4 slideshow_div">
                    <div class="div_anh">
                      <img src="../image/Rectangle 201.png" alt="" />
                    </div>
                    <div class="div_text">
                      <a href=""> Nhân viên bán vé xem phim </a>
                    </div>
                    <div class="div_map">
                      <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                      351 Lĩnh Nam, Hoàng Mai, Hà Nội
                    </div>
                    <div class="div_money">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe227;</i
                      >7.000.000đ/tháng
                    </div>
                    <div class="div_bag">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe8f8;</i
                      >Toàn thời gian
                    </div>
                  </div>
                  <div class="col-md-4 slideshow_div">
                    <div class="div_anh">
                      <img src="../image/Rectangle 201.png" alt="" />
                    </div>
                    <div class="div_text">
                      <a href=""> Nhân viên bán vé xem phim </a>
                    </div>
                    <div class="div_map">
                      <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                      351 Lĩnh Nam, Hoàng Mai, Hà Nội
                    </div>
                    <div class="div_money">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe227;</i
                      >7.000.000đ/tháng
                    </div>
                    <div class="div_bag">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe8f8;</i
                      >Toàn thời gian
                    </div>
                  </div>
                </div>
                <div class="itemRegular">
                  <div class="col-md-4 slideshow_div">
                    <div class="div_anh">
                      <img src="../image/Rectangle 2.png" alt="" />
                    </div>
                    <div class="div_text">
                      <a href="">CTV phân loại hàng hóa</a>
                    </div>
                    <div class="div_map">
                      <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                      123 Nguyễn Trãi, Thanh Xuân, Hà Nội
                    </div>
                    <div class="div_money">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe227;</i
                      >30.000đ/giờ
                    </div>
                    <div class="div_bag">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe8f8;</i
                      >Toàn thời gian
                    </div>
                  </div>
                  <div class="col-md-4 slideshow_div">
                    <div class="div_anh">
                      <img src="../image/Rectangle 2.png" alt="" />
                    </div>
                    <div class="div_text">
                      <a href="">CTV phân loại hàng hóa</a>
                    </div>
                    <div class="div_map">
                      <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                      123 Nguyễn Trãi, Thanh Xuân, Hà Nội
                    </div>
                    <div class="div_money">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe227;</i
                      >30.000đ/giờ
                    </div>
                    <div class="div_bag">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe8f8;</i
                      >Toàn thời gian
                    </div>
                  </div>
                  <div class="col-md-4 slideshow_div">
                    <div class="div_anh">
                      <img src="../image/Rectangle 2.png" alt="" />
                    </div>
                    <div class="div_text">
                      <a href="">CTV phân loại hàng hóa</a>
                    </div>
                    <div class="div_map">
                      <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                      123 Nguyễn Trãi, Thanh Xuân, Hà Nội
                    </div>
                    <div class="div_money">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe227;</i
                      >30.000đ/giờ
                    </div>
                    <div class="div_bag">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe8f8;</i
                      >Toàn thời gian
                    </div>
                  </div>
                  <div class="col-md-4 slideshow_div">
                    <div class="div_anh">
                      <img src="../image/Rectangle 2.png" alt="" />
                    </div>
                    <div class="div_text">
                      <a href="">CTV phân loại hàng hóa</a>
                    </div>
                    <div class="div_map">
                      <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                      123 Nguyễn Trãi, Thanh Xuân, Hà Nội
                    </div>
                    <div class="div_money">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe227;</i
                      >30.000đ/giờ
                    </div>
                    <div class="div_bag">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe8f8;</i
                      >Toàn thời gian
                    </div>
                  </div>
                  <div class="col-md-4 slideshow_div">
                    <div class="div_anh">
                      <img src="../image/Rectangle 2.png" alt="" />
                    </div>
                    <div class="div_text">
                      <a href="">CTV phân loại hàng hóa</a>
                    </div>
                    <div class="div_map">
                      <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                      123 Nguyễn Trãi, Thanh Xuân, Hà Nội
                    </div>
                    <div class="div_money">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe227;</i
                      >30.000đ/giờ
                    </div>
                    <div class="div_bag">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe8f8;</i
                      >Toàn thời gian
                    </div>
                  </div>
                </div>
                <div class="itemRegular">
                  <div class="col-md-4 slideshow_div">
                    <div class="div_anh">
                      <img src="../image/Rectangle1.png" alt="" />
                    </div>
                    <div class="div_text"><a>CVT bán hàng online</a></div>
                    <div class="div_map">
                      <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                      123 Đường Láng
                    </div>
                    <div class="div_money">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe227;</i
                      >30.000đ/giờ
                    </div>
                    <div class="div_bag">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe8f8;</i
                      >Làm từ xa
                    </div>
                  </div>
                  <div class="col-md-4 slideshow_div">
                    <div class="div_anh">
                      <img src="../image/Rectangle1.png" alt="" />
                    </div>
                    <div class="div_text"><a>CVT bán hàng online</a></div>
                    <div class="div_map">
                      <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                      123 Đường Láng
                    </div>
                    <div class="div_money">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe227;</i
                      >30.000đ/giờ
                    </div>
                    <div class="div_bag">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe8f8;</i
                      >Làm từ xa
                    </div>
                  </div>
                  <div class="col-md-4 slideshow_div">
                    <div class="div_anh">
                      <img src="../image/Rectangle1.png" alt="" />
                    </div>
                    <div class="div_text"><a>CVT bán hàng online</a></div>
                    <div class="div_map">
                      <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                      123 Đường Láng
                    </div>
                    <div class="div_money">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe227;</i
                      >30.000đ/giờ
                    </div>
                    <div class="div_bag">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe8f8;</i
                      >Làm từ xa
                    </div>
                  </div>
                  <div class="col-md-4 slideshow_div">
                    <div class="div_anh">
                      <img src="../image/Rectangle1.png" alt="" />
                    </div>
                    <div class="div_text"><a>CVT bán hàng online</a></div>
                    <div class="div_map">
                      <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                      123 Đường Láng
                    </div>
                    <div class="div_money">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe227;</i
                      >30.000đ/giờ
                    </div>
                    <div class="div_bag">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe8f8;</i
                      >Làm từ xa
                    </div>
                  </div>
                  <div class="col-md-4 slideshow_div">
                    <div class="div_anh">
                      <img src="../image/Rectangle1.png" alt="" />
                    </div>
                    <div class="div_text"><a>CVT bán hàng online</a></div>
                    <div class="div_map">
                      <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                      123 Đường Láng
                    </div>
                    <div class="div_money">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe227;</i
                      >30.000đ/giờ
                    </div>
                    <div class="div_bag">
                      <i class="material-icons" style="font-size: 14px"
                        >&#xe8f8;</i
                      >Làm từ xa
                    </div>
                  </div>
                </div> -->
            </section>
            <a href="" class="text-warning">Xem thêm</a>
          </div>
        </div>
      </div>
    </div>
    <div class="tuyendung2">
      <div class="text3tuyendung">
        Tìm kiếm ứng viên theo ngành nghề, lĩnh vực
      </div>
      <div class="container container_nghenghiep">
        <div class="row">
          <div class="col-sm-2 iconnghenghiep">
            <img src="../image/shop 1.png" alt="" />
            <div class="iconchu">
              <a href="">Bán hàng</a>
            </div>
            <div class="ungvien">120 ứng viên</div>
          </div>
          <div class="col-sm-2 iconnghenghiep">
            <img src="../image/dinner 1.png" alt="" />
            <div class="iconchu"><a href="">Phục vụ / Tạp vụ</a></div>
            <div class="ungvien">120 ứng viên</div>
          </div>
          <div class="col-sm-2 iconnghenghiep">
            <img src="../image/Group.png" alt="" />
            <div class="iconchu">
              <a href="">Xây dựng / Công trình</a>
            </div>
            <div class="ungvien">160 ứng viên</div>
          </div>
          <div class="col-sm-2 iconnghenghiep">
            <img src="../image/Group (1).png" alt="" />
            <div class="iconchu">
              <a href=""> Vận chuyển / Bốc vác</a>
            </div>
            <div class="ungvien">10 ứng viên</div>
          </div>
          <div class="col-sm-2 iconnghenghiep">
            <img src="../image/work 1.png" alt="" />
            <div class="iconchu">
              <a href="">Hành chính</a>
            </div>
            <div class="ungvien">60 ứng viên</div>
          </div>
          <div class="col-sm-2 iconnghenghiep">
            <img src="../image/Vector (1)0000.png" alt="" />
            <div class="iconchu">
              <a href="">Giao hàng</a>
            </div>
            <div class="ungvien">360 ứng viên</div>
          </div>
          <div class="col-sm-2 iconnghenghiep">
            <img src="../image/alcohol 1.png" alt="" />
            <div class="iconchu">
              <a href="">Nhà hàng / Khách sạn</a>
            </div>
            <div class="ungvien">250 ứng viên</div>
          </div>
          <div class="col-sm-2 iconnghenghiep">
            <img src="../image/party 1.png" alt="" />
            <div class="iconchu">
              <a href="">Tổ chức sự kiện</a>
            </div>
            <div class="ungvien">80 ứng viên</div>
          </div>
          <div class="col-sm-2 iconnghenghiep">
            <img src="../image/parcel 1.png" alt="" />
            <div class="iconchu">
              <a href="">Kho bãi </a>
            </div>
            <div class="ungvien">35 ứng viên</div>
          </div>
          <div class="col-sm-2 iconnghenghiep">
            <img src="../image/cooking 1.png" alt="" />
            <div class="iconchu">
              <a href="">Nấu ăn / Đầu bếp</a>
            </div>
            <div class="ungvien">532 ứng viên</div>
          </div>
        </div>
      </div>
    </div>
    <div class="div_benner">
      <img src="../image/Group 23590.png" alt="" />
    </div>
    <div class="div_tintuc">
        <div class="row div_row">
          <div class="d-flex flex-column-reverse flex-lg-row">
            <div class="col-lg-8">
              <div class="div_tintuc0">
                <p>
                  CV xin việc là tài liệu quan trọng trong quá trình xin việc. Đọc
                  bài viết dưới đây để hiểu đầy đủ hơn về các mẫu cv xin việc và
                  những tin liên quan bạn nhé!
                </p>
                <h2>1. CV xin việc là gì?</h2>
                <p>
                  CV ( viết tắt của từ tiếng Lating curriculum vitae ) là một tài
                  liệu chi tiết giúp làm nổi bật lên lịch sử học tập cũng như
                  chuyên môn, kinh nghiệm của bạn để đi xin việc làm.
                </p>
                <p>
                  Một bản CV xin việc thường dùng để làm nổi bật những ưu điểm của
                  ứng viên đó. Thường bao gồm những thông tin như kinh nghiệm làm
                  việc, thành tích học tập trong quá khứ, giải thưởng chuyên môn,
                  học bổng hoặc những công trình, dự án nghiên cứu đã từng được
                  thực hiện.
                </p>
                <h2>2. CV xin việc gồm những gì?</h2>
                <p>
                  Một mẫu CV xin việc cũng giống như những form mẫu khác, cũng cần
                  phải có đầy đủ những phần, mục cơ bản, đủ đảm bảo được thông tin
                  cung cấp, đồng thời đủ để mang đến cho nhà tuyển dụng những
                  thông tin cần thiết để đối chiếu với nhu cầu tuyển dụng của một
                  công ty nào đó.
                </p>
                <p>
                  hông thường, một mẫu CV xin việc chuẩn thường bao gồm những phần
                  sau:
                </p>
                <p>- Thông tin cá nhân</p>
                <p>- Mục tiêu nghề nghiệp</p>
                <p>- Trình độ học vấn</p>
                <p>- Bằng cấp</p>
                <p>- Kinh nghiệm làm việc</p>
                <p>- Người tham chiếu thông tin</p>
                <h2>3. Vai trò của mẫu CV</h2>
                <p>
                  Trong thị trường tìm việc làm hiện nay, có rất nhiều cách để một
                  nhà tuyển dụng có thể tìm hiểu về ứng viên, về các thông tin có
                  vai trò quan trọng đến công việc sau này của họ. Từ danh thiếp,
                  đơn xin việc đến các thông tin trên mạng xã hội của bạn. Mà một
                  trong số đó phải kể tới đó chính là CV xin việc.
                </p>
                <p>
                  CV xin việc là một phần quan trọng trong hồ sơ xin việc của bạn,
                  dịch và hiểu từ tiếng la tinh đây được xem là bản tóm tắt thông
                  tin cá nhân của ứng ứng viên gửi tới nhà tuyển dụng. Bởi vậy bản
                  CV online được xem là văn bản quyền lực trong quá trình chinh
                  phục nhà tuyển dụng.
                </p>
                <img src="../image/Rectangle 276.png" alt="" />
                <h3>
                  3.1. Bản CV cá nhân - lời quảng bá “thương hiệu” gửi tới doanh
                  nghiệp
                </h3>
                <p>
                  Bản CV xin việc được xem là công cụ tiếp thị bản thân của ứng
                  viên khi xin việc, vì lẽ nó cung cấp tóm tắt những công việc
                  trước đây của bạn, những kỹ năng và cả trình độ chuyên môn mà
                  bạn đang có. Bởi vậy một điều vô cùng quan trọng mà bạn phải thể
                  hiện được trong này đó là làm sao cho bản CV của mình thật
                  chuyên nghiệp.
                </p>
                <p>
                  Như đã nói ban đâu, nhà tuyển dụng có rất nhiều cách để biết về
                  bạn, các thông tin của bạn tuy nhiên nếu họ sử dụng những cách
                  thức của mình không có điều gì có thể đảm bảo được rằng họ sẽ
                  tìm được đúng những thông tin mà bạn muốn nhà tuyển dụng thấy
                  được, những thông tin liên quan trực tiếp tới kinh nghiệm làm
                  việc của mình. Bởi vậy, CV xin việc xuất hiện giống như một lời
                  quảng cáo mà bạn gửi tới họ, cung cấp cho họ những điều họ muốn
                  biết và cũng chính là những điều bạn muốn họ biết.
                </p>
                <p>
                  Một bản CV xin việc hoàn chỉnh được coi là bản CV mẫu mà nó phải
                  đáp ứng được hai yêu cầu cơ bản là về hình thức và nội dung
                  trong đó. Điều này giúp bộ CV xin việc của bạn trở thành một bộ
                  CV xin việc hoàn chỉnh, là bản CV xin việc mẫu giống như một tvc
                  quảng cáo với hình ảnh đẹp mắt, nội dung ấn tượng mà bạn mang
                  đến cho nhà tuyển dụng.
                </p>
              </div>
              <div class="div_tintuc1">
                <p>
                  CV xin việc, đơn xin việc là những cụm từ khá quen thuộc với ứng
                  viên, nó tóm tắt những thông tin của ứng việc, vậy thư xin việc
                  ngành chăm sóc khách hàng là gì, nội dung thư xin việc sẽ trình
                  bày gì, và có cần thiết khi phải đầu tư thời gian và công sức để
                  chuẩn bị thư xin việc ngành chăm sóc khách hàng không
                </p>
                <h2>1. Thư xin việc ngành chăm sóc khách hàng là gì?</h2>
                <p>
                  Thư xin việc ngành chăm sóc khách hàng là những lời nói ngắn gọn
                  gửi đến nhà tuyển dụng nêu lên được mong muốn của ứng viên được
                  làm việc và cống hiến với công ty, cùng với đó là những kỹ năng
                  và kinh nghiệm mà ứng viên có, Thư xin việc ngành chăm sóc khách
                  hàng thể hiện bạn là người có tâm huyết chuẩn bị đầy đủ hồ sơ và
                  mong muốn được nhận vào làm.
                </p>
                <h2>
                  2. Gợi ý cách viết thư xin việc chăm sóc khách hàng cưa đổ nhà
                  tuyển dụng
                </h2>
                <p>
                  Những vị trí công việc có nhiều tiềm năng phát triển, nhiều cơ
                  hội nghề nghiệp, mức lương hấp dẫn, nó là một miếng mồi ngon
                  được nhiều người nhòm ngó, để có thể được nhận vào những vị trí
                  bạn cần phải chuẩn bị những thư xin việc ấn tượng thu hút được
                  nhà tuyển dụng, vậy viết thư xin việc như thế nào là câu hỏi của
                  rất nhiều người, dưới đây là một số gợi ý để bạn có thể viết
                  được những là thư xin việc chuyên nghiệp thu hút được nhiều nhà
                  tuyển dụng, và tạo ấn tượng tốt khi nhà tuyển dụng nhận được là
                  thư xin việc ngành chăm sóc khách hàng.
                </p>
                <img src="../image/Rectangle 276.png" alt="" />
                <h3>2.1. Thể hiện động lực trong thư xin việc</h3>
                <p>
                  Để tạo ấn tượng với nhà tuyển dụng bạn có rất nhiều cách, với
                  những ứng viên viết thư xin việc ngành chăm sóc khách hàng mà
                  thể hiện được động lực trong thư xin việc thì đó là điều mà nhà
                  tuyển dụng rất mong muốn ứng viên của mình có và thể hiện ra cho
                  nhà tuyển dụng thấy được. Với công việc chăm sóc khách hàng thì
                  động lực làm việc là không thể thiếu với ứng viên, bạn cần phải
                  có động lực vượt qua những khó khăn ban đầu để có được những
                  kinh nghiệm và kỹ năng cần có của người nhân viên chăm sóc khách
                  hàng, hãy thể hiện thật rõ động lực của mình.
                </p>
                <h3>2.2. Bằng cấp quan trọng nhưng quan trọng hơn là kỹ năng</h3>
                <p>
                  Nhân viên chăm sóc khách hàng có thể không yêu cầu bằng cấp
                  nhưng chắc chắn một điều bạn cần phải có kỹ năng, chính vì vậy
                  mà trong thư xin việc ngành chăm sóc khách hàng bạn phải thể
                  hiện được cho nhà tuyển dụng bạn có rất nhiều kỹ năng phù hợp
                  với công việc này đó là kỹ năng về giao tiếp, kỹ năng chốt đơn
                  hàng, kỹ năng tư vấn khách hàng... và rất nhiều kỹ năng khác mà
                  nhà tuyển dụng chính vì vậy cái bạn cần thể hiện trong thư xin
                  việc ngành chăm sóc khách hàng đó chính là kỹ năng, nhà tuyển
                  dụng chắc chắn sẽ quan tâm nhiều đến những ứng viên có kỹ năng
                  và kinh nghiệm, và tôi tin rằng nhà tuyển dụng sẽ không bỏ qua
                  thư xin việc thể hiện tốt được điểm này.
                </p>
                <h3>
                  2.3. Nếu có kinh nghiệm, hãy làm nổi bật nó trong thư xin việc
                  chăm sóc khách hàng
                </h3>
                <p>
                  Đi cùng với kỹ năng là kinh nghiệm, kinh nghiệm chính là khoảng
                  thời gian mà người nhân viên làm những công việc khác và những
                  công việc này có liên quan đến ngành chăm sóc khách hàng, liên
                  quan đến công việc bạn đang ứng tuyển, chính vì vậy hãy nêu lên
                  được kinh nghiệm của bạn. Nếu bạn là người có kinh nghiệm, có
                  kiến thức thì việc nhà tuyển dụng lựa chọn bạn là điều đương
                  nhiên. Không chỉ cần thiết trong ngành chăm sóc khách hàng, mà
                  điều này sẽ giúp các mẫu thư xin việc ngành bán hàng và các
                  ngành nghề liên quan của bạn được đánh giá cao hơn.
                </p>
                <h3>2.4. Nếu có thể hãy viết thư xin việc bằng ngôn ngữ khác</h3>
                <p>
                  Hiện nay thị trường kinh doanh buôn bán đã mở rộng,các nước đã
                  kết hợp cùng nhau cùng phát triển, chính vì vậy mà việc giao
                  thương buôn bán của các nước trở nên đơn giản hơn, có nhiều công
                  ty nước ngoài vào Việt Nam kinh doanh và buôn bán, nếu bạn muốn
                  tạo được với nhà tuyển dụng nước ngoài thì việc chuẩn bị một thư
                  xin việc ngành chăm sóc khách hàng là điều cần thiết, việc bạn
                  thể hiện mình là người có khả năng, có kiến thức, giỏi ngoại ngữ
                  thì việc nhà tuyển dụng bạn là điều chắc chắn.
                </p>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="div_tintuc8">
                <h1>MỤC LỤC</h1>
                <hr />
                <h2>1. CV xin việc là gì?</h2>
                <h2>CV xin việc gồm những gì?</h2>
                <h2>3. Vai trò của mẫu CV</h2>
                <p>
                  3.1. Bản CV cá nhân - lời quảng bá “thương hiệu” gửi tới doanh
                  nghiệp
                </p>
                <p>3.2. CV cá nhân - sự khởi đầu của quá trình xin việc</p>
                <p>
                  3.3. Tạo CV xin việc hoàn hảo, chuyên nghiệp chính là tạo ấn
                  tượng chinh phục công việc tuyển dụng
                </p>
                <h2>4. Bạn sẽ dùng CV xin việc trong những trường hợp nào?</h2>
                <p>
                  4.1. Khi nào nên dùng CV xin việc? Khi nào cùng sơ yếu lý lịch?
                </p>
                <p>
                  4.2. Làm cách nào đảm bảo rằng “tôi đã chọn CV phù hợp với công
                  việc mình sẽ làm”.
                </p>
                <h2>
                  5. Những sai lầm nghiêm trọng thường mắc phải khi viết CV xin
                  việc
                </h2>
                <p>
                  5.1. Những thách thức dễ dẫn đến sai lầm khi viết CV xin việc
                </p>
                <p>
                  5.2. Tránh xa những sai lầm khi viết CV xin việc không khó như
                  bạn nghĩ
                </p>
                <p>5.3. Cách chọn định dạng CV bản thân đúng</p>
                <h2>
                  6. Tạo CV xin việc chuẩn – đưa tâm huyết nghề nghiệp vào thiết
                  kế CV
                </h2>
                <p>6.1. Cách làm CV xin việc cùng những chú ý đi kèm</p>
                <p>6.2. Tạo CV xin việc online đơn giản hóa cách thức</p>
                <p>6.3. Nhưng chất lượng CV liệu có được đảm bảo</p>
                <h2>7. Cách viết CV xin việc đơn giản</h2>
                <h2>8. Tổng hợp các mẫu CV xin việc của Timviec365.com</h2>
                <p>
                  8.1. Chất lượng CV đáp ứng những nhà tuyển dụng khó tính nhất
                </p>
                <p>
                  8.2. Số lượng mẫu CV xin việc đa dạng – sáng tạo – cập nhật liên
                  tục
                </p>
                <h2>9. Những bản CV xin việc hay</h2>
                <h2>10. Download / Tải mẫu CV xin việc file word</h2>
              </div>
              <div class="div_tintuc2">
                <h1>MỤC LỤC</h1>
                <hr />
                <h2>1. Thư xin việc ngành chăm sóc khách hàng là gì?</h2>
                <h2>
                  2. Gợi ý cách viết thư xin việc chăm sóc khách hàng cưa đổ nhà
                  tuyển dụng
                </h2>
                <p>2.1. Thể hiện động lực trong thư xin việc</p>
                <p>2.2. Bằng cấp quan trọng nhưng quan trọng hơn là kỹ năng</p>
                <p>
                  2.3. Nếu có kinh nghiệm, hãy làm nổi bật nó trong thư xin việc
                  chăm sóc khách hàng
                </p>
                <p>2.4. Nếu có thể hãy viết thư xin việc bằng ngôn ngữ khác</p>
                <h2>
                  3. Những điểm cần lưu ý để có thư xin việc chăm sóc khách hàng
                  hoàn hảo và chuyên nghiệp
                </h2>
                <p>3.1. Đủ ý, không dài dòng, lan man</p>
                <p>3.2. Không giới thiệu được thế mạnh của bản thân</p>
                <p>3.3. Mắc bệnh nói phóng đại</p>
                <p>3.4. Nói đến những giá trị của bản thân bạn</p>
                <p>3.4. Nói đến những giá trị của bản thân bạn</p>
                <h2>Gợi ý địa chỉ tải và tham khảo các mẫu thư xin việc</h2>
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
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
  $(document).ready(function () {
    $("#index_category").select2();
  });
</script>
<script>
  $(document).ready(function () {
    $("#index_category1").select2();
  });
</script>
<script
  src="https://code.jquery.com/jquery-2.2.0.min.js"
  type="text/javascript"
></script>
<script
  src="../node_modules/slick-carousel/slick/slick.js"
  type="text/javascript"
  charset="utf-8"
></script>
<script type="text/javascript">
  $(document).on("ready", function () {
    $(".regular").slick({
      dots: true,
      infinite: false,
      speed: 300,
      slidesToShow: 3,
      slidesToScroll: 3,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            infinite: true,
            dots: true,
          },
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
      ],
    });
  });
</script>
<script
  src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
  integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
  crossorigin="anonymous"
></script>
