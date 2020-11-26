<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Xem số điện thoại</title>
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
        <div class="div_search1">
          <form action="">
            <div class="form_search1">
              <div class="timkiem">
                <div class="form_timkiem">
                  <input
                    type="text"
                    class="form-control input datepicker"
                    placeholder="Nhập từ kháo mong muốn....."
                  />
                </div>
              </div>
              <div class="nganhnghe">
                <div class="form_timkiem1">
                  <select
                    class="js-example-basic-single"
                    name="state"
                    id="search-form"
                  >
                    <option value="0">Chọn tỉnh thành</option>
                    <option value="1">Wyoming</option>
                    <option value="2">2 Children</option>
                    <option value="3">3 Children</option>
                    <option value="4">4 Children</option>
                  </select>
                </div>
              </div>
              <div class="tinh">
                <div class="form_timkiem1">
                  <select
                    class="js-example-basic-single"
                    name="state"
                    id="search-form"
                  >
                    <option value="0">Chọn tỉnh thành</option>
                    <option value="1">Wyoming</option>
                    <option value="2">2 Children</option>
                    <option value="3">3 Children</option>
                    <option value="4">4 Children</option>
                  </select>
                </div>
              </div>
              <div class="button_search">
                <button type="submit" class="btn-form1-submit">
                  <i style="font-size: 24px" class="fas">&#xf002;</i>
                </button>
              </div>
            </div>
          </form>
        </div>
        <div class="tieude1">
          Trang chủ / Việc làm theo giờ /<span> Tuyển CTV bán hàng online</span>
        </div>
      </div>
    </div>
    <div class="CTV_online">
      <div class="div_online">
        <div class="div_online1">
          <img src="../image/Rectangle 534.png" alt="" />
          <div class="text_online">
            <h1>Tuyển CTV bán hàng online</h1>
            <p>Công ty Cổ phần Thực phẩm Hữu Nghị</p>
            <span> Địa chỉ:</span>
            122 Định Công, P. Định Công, Q. Hoàng Mai, TP. Hà Nội
          </div>
        </div>
        <div class="div_luuviec">
          <div class="luuvieclam border">
            <i style="font-size: 20px" class="far m-2">&#xf004;</i
            ><span><a href="">Lưu việc làm</a></span>
          </div>
          <div class="luuvieclam1 border">
            <i style="font-size: 24px" class="fas m-2">&#xf1d8;</i
            ><span><a href="">Nhận việc</a></span>
          </div>
          <div class="luotxem">Lượt xem:<span>120</span></div>
        </div>
      </div>
    </div>
    <div class="lichvieclam">
      <div class="container_lichviec">
        <div class="row">
          <div class="d-flex flex-column-reverse flex-lg-row">
            <div class="col-lg-8">
              <div class="div_lichvieclam">
                <h2>Lịch việc làm</h2>
                <p>
                  Công việc này có 5 ca làm, bạn sẽ được sắp xếp cụ thể khi trao
                  đổi trực tiếp.
                </p>
                <div class="table-responsive form-group div_table">
                  <label for=""><span>*</span> Ca 1</label>
                  <p>Giờ làm: 7:00-12:00</p>
                  <table class="table table_lichvieclam">
                    <tr>
                      <td><a href="">Thứ 2</a></td>
                      <td><a href="">Thứ 3</a></td>
                      <td><a href="">Thứ 4</a></td>
                      <td><a href="">Thứ 5</a></td>
                      <td><a href="">Thứ 6</a></td>
                      <td><a href="">Thứ 7</a></td>
                      <td><a href="">Chủ nhật</a></td>
                    </tr>
                  </table>
                  <label for=""><span>*</span> Ca 2</label>
                  <p>Giờ làm: 12:00-17:00</p>
                  <table class="table table_lichvieclam">
                    <tr>
                      <td><a href="">Thứ 2</a></td>
                      <td><a href="">Thứ 3</a></td>
                      <td><a href="">Thứ 4</a></td>
                      <td><a href="">Thứ 5</a></td>
                      <td><a href="">Thứ 6</a></td>
                      <td><a href="">Thứ 7</a></td>
                      <td><a href="">Chủ nhật</a></td>
                    </tr>
                  </table>
                  <label for=""><span>*</span> Ca 3</label>
                  <p>Giờ làm: 17:00-21:00</p>
                  <table class="table table_lichvieclam">
                    <tr>
                      <td><a href="">Thứ 2</a></td>
                      <td><a href="">Thứ 3</a></td>
                      <td><a href="">Thứ 4</a></td>
                      <td><a href="">Thứ 5</a></td>
                      <td><a href="">Thứ 6</a></td>
                      <td><a href="">Thứ 7</a></td>
                      <td><a href="">Chủ nhật</a></td>
                    </tr>
                  </table>
                  <label for=""><span>*</span> Ca 4</label>
                  <p>Giờ làm: 21:00-24:00</p>
                  <table class="table table_lichvieclam">
                    <tr>
                      <td><a href="">Thứ 2</a></td>
                      <td><a href="">Thứ 3</a></td>
                      <td><a href="">Thứ 4</a></td>
                      <td><a href="">Thứ 5</a></td>
                      <td><a href="">Thứ 6</a></td>
                      <td><a href="">Thứ 7</a></td>
                      <td><a href="">Chủ nhật</a></td>
                    </tr>
                  </table>
                  <label for=""><span>*</span> Ca 5</label>
                  <p>Giờ làm: 1:00-7:00</p>
                  <table class="table table_lichvieclam">
                    <tr>
                      <td><a href="">Thứ 2</a></td>
                      <td><a href="">Thứ 3</a></td>
                      <td><a href="">Thứ 4</a></td>
                      <td><a href="">Thứ 5</a></td>
                      <td><a href="">Thứ 6</a></td>
                      <td><a href="">Thứ 7</a></td>
                      <td><a href="">Chủ nhật</a></td>
                    </tr>
                  </table>
                </div>
                <div class="mota">
                  <h2>Mô tả công việc</h2>
                  <p>
                    - Xử lý lên/xuống hàng hoá từ xe tải ( hàng được đóng bao
                    tải sẵn ) không giống bốc vác, chỉ xuống hàng nhẹ.
                  </p>
                  <p>- Xử lý phân loại các hàng hoá theo khu vực.</p>
                  <p>- Bàn giao hàng hoá cho các nhân viên giao hàng.</p>
                </div>
                <hr />
                <div class="mota">
                  <h2>Yêu cầu công việc</h2>
                  <p>- Tuổi : 18t - 35t</p>
                  <p>- Giới tính : chỉ tuyển nữ</p>
                  <p>- Điều kiện sức khoẻ tốt</p>
                </div>
                <hr />
                <div class="mota">
                  <h2>Quyền lợi</h2>
                  <p>
                    - Xử lý lên/xuống hàng hoá từ xe tải ( hàng được đóng bao
                    tải sẵn ) không giống bốc vác, chỉ xuống hàng nhẹ.
                  </p>
                  <p>- Xử lý phân loại các hàng hoá theo khu vực.</p>
                  <p>- Bàn giao hàng hoá cho các nhân viên giao hàng.</p>
                </div>
                <hr />
                <div class="mota">
                  <h2>Mô tả công việc</h2>
                  <p>- Chính sách thưởng theo chuyên cần</p>
                </div>
                <hr />
                <div class="mota">
                  <h2>Hồ sơ bao gồm</h2>
                  <p>- Sơ yêu lý lịch</p>
                  <p>- Đơn xin việc</p>
                  <p>- Các giấy tờ liên quan</p>
                </div>
                <hr />
                <div class="mota">
                  <h2>Thông tin liên hệ</h2>
                  <p>- Người liên hệ: Nguyễn Quỳnh Trang</p>
                  <p>
                    - Địa chỉ: 122 Định Công, P. Định Công, Q. Hoàng Mai, TP. Hà
                    Nội
                  </p>
                  <p>- Hạn nộp: 12/9/2020</p>
                </div>
                    <button type="button" class="btn div_button h_div_xemsdt" data-toggle="modal" data-target="#exampleModaldangnhap">
                        <i style="font-size: 14px" class="fas p-2">&#xf879;</i>
                    Đăng nhập để xem SĐT
                      </button>
                      <div class="modal fade" id="exampleModaldangnhap" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabeldangnhap" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header h_div_modal_xemsdt">
                                <img src="../image/Group 2029.png" alt="">
                              <button type="button" class="close h_close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body h_modal-body-xemsdt">
                                <img src="../image/Frame (211).png" alt="" class="h_img_xemsdt">
                                <h2> Bạn cần đăng nhập để xem số điện thoại</h2>
                                <div class="h_modal_form_xemsdt">
                                <form action="">
                                    <div class="input-group h_input-grop-form-xemsdt mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon1"><i style='font-size:14px' class='fas'>&#xf095;</i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Nhập số điện thoại" aria-label="Username" aria-describedby="basic-addon1">
                                      </div>
                                      <div class="input-group h_input-grop-form-xemsdt mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon1"><i style='font-size:14px' class='fas'>&#xf13e;</i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="*********" aria-label="Username" aria-describedby="basic-addon1">
                                      </div>
                                      <div class="submit-control">
                                        <button class="btn-sm" type="submit">Đăng nhập</button>
                                      </div>
                                      <div class="forget-pw">
                                        <div class="fg-pw h_quenmk_xemsdt">
                                          <a href="">Quên mật khẩu ?</a>
                                        </div>
                                        <div class="resigner h_resigner">
                                          <span
                                            >Bạn chưa có tài khoản? <a href="">đăng ký ngay</a></span
                                          >
                                        </div>
                                      </div>
                                </form>
                            </div>
                        </div>
                          </div>
                        </div>
                      </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="div_lichvieclam1">
                <div class="thongtintuyendung">
                  <h2>Thông tin tuyển dụng</h2>
                  <div class="div_thongtintuyendung">
                    <div class="div_mucluong">
                      <i class="material-icons">&#xe263;</i>
                      <p>Mức lương: <span>30.000đ/giờ</span></p>
                    </div>
                    <div class="div_mucluong">
                      <i class="material-icons">&#xe263;</i>
                      <p>Số lượng tuyển dụng: <b>20</b></p>
                    </div>
                    <div class="div_mucluong">
                      <i class="material-icons">&#xe263;</i>
                      <p>
                        Nơi làm việc:
                        <b
                          >122 Định Công, P.Định Công, Q.Hoàng Mai, TP.Hà Nội</b
                        >
                      </p>
                    </div>
                    <div class="div_mucluong">
                      <i class="material-icons">&#xe263;</i>
                      <p>
                        Giới tính:
                        <b>Nữ</b>
                      </p>
                    </div>
                    <div class="div_mucluong">
                      <i class="material-icons">&#xe263;</i>
                      <p>Nghề nghiệp: <b>Nghề nghiệp tự do</b></p>
                    </div>
                    <div class="div_mucluong">
                      <i class="material-icons">&#xe263;</i>
                      <p>
                        Học vấn tối thiểu:
                        <b>Trung cấp</b>
                      </p>
                    </div>
                    <div class="div_mucluong">
                      <i class="material-icons">&#xe263;</i>
                      <p>Loại công việc: <b>Bán thời gian</b></p>
                    </div>
                    <div class="div_mucluong">
                      <i class="material-icons">&#xe263;</i>
                      <p>Hình thức trả lương: <b>Theo giờ</b></p>
                    </div>
                  </div>
                </div>
                <div class="thongtintuyendung">
                  <h2>Việc làm cùng nhà tuyển dụng</h2>
                  <div class="div_thongtintuyendung">
                    <div class="nhanvien">
                      <h3>Nhận viên phụ bếp</h3>
                      <div class="nhanvienphubep">
                        <p>
                          <i class="material-icons" style="font-size: 14px"
                            >&#xe227;</i
                          >
                          35.000đ/giờ
                        </p>
                        <p>
                          <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                          351 Lĩnh Nam, Hoàng Mai, Hà Nội
                        </p>
                        <p>
                          <i class="material-icons" style="font-size: 14px"
                            >&#xe8f8;</i
                          >Toàn thời gian
                        </p>
                      </div>
                      <hr />
                    </div>
                    <div class="nhanvien">
                      <h3>Nhận viên phụ bếp</h3>
                      <div class="nhanvienphubep">
                        <p>
                          <i class="material-icons" style="font-size: 14px"
                            >&#xe227;</i
                          >
                          35.000đ/giờ
                        </p>
                        <p>
                          <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                          351 Lĩnh Nam, Hoàng Mai, Hà Nội
                        </p>
                        <p>
                          <i class="material-icons" style="font-size: 14px"
                            >&#xe8f8;</i
                          >Toàn thời gian
                        </p>
                      </div>
                      <hr />
                    </div>
                    <div class="nhanvien">
                      <h3>Nhận viên phụ bếp</h3>
                      <div class="nhanvienphubep">
                        <p>
                          <i class="material-icons" style="font-size: 14px"
                            >&#xe227;</i
                          >
                          35.000đ/giờ
                        </p>
                        <p>
                          <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                          351 Lĩnh Nam, Hoàng Mai, Hà Nội
                        </p>
                        <p>
                          <i class="material-icons" style="font-size: 14px"
                            >&#xe8f8;</i
                          >Toàn thời gian
                        </p>
                      </div>
                      <hr />
                    </div>
                    <div class="nhanvien">
                      <h3>Nhận viên phụ bếp</h3>
                      <div class="nhanvienphubep">
                        <p>
                          <i class="material-icons" style="font-size: 14px"
                            >&#xe227;</i
                          >
                          35.000đ/giờ
                        </p>
                        <p>
                          <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                          351 Lĩnh Nam, Hoàng Mai, Hà Nội
                        </p>
                        <p>
                          <i class="material-icons" style="font-size: 14px"
                            >&#xe8f8;</i
                          >Toàn thời gian
                        </p>
                      </div>
                      <hr />
                    </div>
                    <div class="nhanvien">
                      <h3>Nhận viên phụ bếp</h3>
                      <div class="nhanvienphubep">
                        <p>
                          <i class="material-icons" style="font-size: 14px"
                            >&#xe227;</i
                          >
                          35.000đ/giờ
                        </p>
                        <p>
                          <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                          351 Lĩnh Nam, Hoàng Mai, Hà Nội
                        </p>
                        <p>
                          <i class="material-icons" style="font-size: 14px"
                            >&#xe8f8;</i
                          >Toàn thời gian
                        </p>
                      </div>
                      <hr />
                    </div>
                    <div class="nhanvien">
                      <h3>Nhận viên phụ bếp</h3>
                      <div class="nhanvienphubep">
                        <p>
                          <i class="material-icons" style="font-size: 14px"
                            >&#xe227;</i
                          >
                          35.000đ/giờ
                        </p>
                        <p>
                          <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                          351 Lĩnh Nam, Hoàng Mai, Hà Nội
                        </p>
                        <p>
                          <i class="material-icons" style="font-size: 14px"
                            >&#xe8f8;</i
                          >Toàn thời gian
                        </p>
                      </div>
                      <hr />
                    </div>
                  </div>
                </div>
              </div>
              <div class="tukhoa">
                <h2>Từ kkhóa liên quan</h2>
                <!-- <hr /> -->
                <div class="div_tukhao">
                  <button>Bán hàng theo giờ</button>
                </div>
                <div class="div_tukhao">
                  <button>Telesales theo giờ</button>
                </div>
                <div class="div_tukhao">
                  <button>Thu ngân theo giờ</button>
                </div>
                <div class="div_tukhao">
                  <button>CTV chốt đơn theo giờ</button>
                </div>
                <div class="div_tukhao1">
                  <button>CTV chốt đơn theo giờ</button>
                </div>
                <div class="div_tukhao">
                  <button>Trực page theo giờ</button>
                </div>
                <div class="div_tukhao">
                  <button>Tạp vụ theo giờ</button>
                </div>
                <div class="div_tukhao">
                  <button>Nấu ăn theo giờ</button>
                </div>
                <div class="div_tukhao">
                  <button>Nhập liệu theo giờ</button>
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
    $('#search-form1').select2(
      );
    
  });
</script>