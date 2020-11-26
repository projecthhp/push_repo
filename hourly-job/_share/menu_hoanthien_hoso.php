<div class="col-md-3 div_quanlythongtin">
    <div class="anhhoso">
        <img src="../public/images/<?= $value['file_image'] ?>" alt="">
        <h2> <?= $value['name_uv'] ?></h2>
        <a href=""><img src="../image/Vector (1)111.png" alt=""> Làm mới hồ sơ</a>
    </div>
    <hr>
    <div class="div_quanlychung">
        <ul class="vmenu">
            <li class="nav-item dropdown">
                <button class="h_dropdown-btn">
                    <i style='font-size:14px' class='fas'>&#xf51b;</i>
                    <a class="nav-link dropdown-toggle" href="#" id="" role="button" data-toggle="" aria-haspopup="true"
                        aria-expanded="false">
                        Quản lý chung
                    </a>
                </button>
                <div class="h_dropdown-container">
                    <a class="dropdown-item div_dropdown-item" href="#">Hoàn thiện hồ sơ</a>

                    <a class="dropdown-item div_dropdown-item" href="#">Tìm việc</a>

                </div>
            </li>
            <li class="nav-item dropdown">
                <i style='font-size:14px' class='far'>&#xf1d8;</i>
                <a class="nav-link" href="../home/chitietungvien.php" id="navbarDropdown">
                    Việc làm đã ứng tuyển
                </a>
            </li>
            <li class="nav-item dropdown">
                <i class='fas'>&#xf304;</i>
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
                <a class="nav-link" href="../home/doimatkhau.php" id="navbarDropdown">
                    Đổi mật khẩu
                </a>
            </li>
            <style>
            .bg-w {
                background-color: #ffffff;
                border: 1px solid #ffffff;
                margin-top: 10px;
            }

            .bg-w i {
                margin-top: 5px;

            }


            .dropdown_h_dx button[type="button"] {
                outline: none;
            }

            .modal-dialog {
                width: 50%;
            }
            </style>
            <li class="nav-item dropdown dropdown_h_dx">
                <button type="button" class="bg-w" data-toggle="modal" data-target="#exampleModaldangxuat">
                    <i style='font-size:14px' class='fas'>&#xf011;</i>
                    Đăng xuất
                </button>
                <div class="modal fade h_modal_dangxuat" id="exampleModaldangxuat" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabeldangxuat" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header h-modal-header-dangxuat">
                                <h5 class="modal-title" id="exampleModalLabeldangxuat">Thông báo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body h_modal-body-dangxuat">
                                <img src="../image/Group 1463.png" alt="">Bạn chắc chắn muốn đăng xuất khỏi hệ
                                thống?
                            </div>
                            <div class="modal-footer">
                                <a href="../_share/dangxuat_hoso.php"><button type="button"
                                        class="btn h_boder_OK">OK</button></a>
                                <button type="button" class="btn bg-white h_boder_dangxuat"
                                    data-dismiss="modal">Hủy</button>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>