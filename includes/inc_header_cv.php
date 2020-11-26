<div class="header_cv_top">
  <div id="pc">
    <ul class="parent">
      <li><a href="/"><img class="lazyload" style="width:111px" src="/images/load.gif" data-src="/images/logoo 1 (1).png" alt="Timviec365.com | Tìm việc làm nhanh, Tuyển dụng 24h"></a></li>
      <li><a href="/ho-so-xin-viec.html" rel="nofollow">Hồ sơ xin việc</a></li>
      <li><a href="/mau-cv.html">CV xin việc</a></li>
      <li><a href="/mau-thu-xin-viec.html" rel="nofollow">Thư xin việc</a></li>
      <li><a href="/don-xin-viec.html">Đơn xin việc</a></li>
      <li><a rel="nofollow">Sơ yếu lý lịch</a></li>
      <? if(!isset($_COOKIE['UID'])){?>
      <li id="signin"><a rel="nofollow">Đăng nhập</a></li>
      <li id="register"><a rel="nofollow">Đăng ký</a></li>
      <? }
      else{
        if($_COOKIE['UT']==0){
          $table = 'user';
          $cr_time = 'use_create_time';
          $logo = 'use_logo';
          $getEmail = 'use_mail';
          $getName = 'use_name';

          $feild = $cr_time.','.$logo.','.$getEmail.','.$getName;
          $feild_set = "use_id";
          $type_h = 'candi';
        }else{
          $table = 'user_company';
          $cr_time = 'usc_create_time';
          $logo = 'usc_logo';
          $getEmail = 'usc_email';
          $getName = 'usc_company';

          $feild = $cr_time.','.$logo.','.$getEmail.','.$getName;
          $feild_set = "usc_id";
          $type_h = 'company';
        }
        $sql_getHead = "SELECT $feild FROM $table WHERE $feild_set = ".$_COOKIE['UID'];
        $db_GetHead = new db_query($sql_getHead);
        $r_Head = mysql_fetch_assoc($db_GetHead->result);
        $avatar_H = geturlimageAvatar($r_Head[$cr_time]).$r_Head[$logo];
      ?>
      <li id="logged">
        <img onerror='this.onerror=null;this.src="/images/icon_candi.png";' src="/images/load.gif" class="lazyload" data-src="<?=$avatar_H?>">
        <div class="sub_logged uv">
          <div class="top">
            <div class="img"><img onerror='this.onerror=null;this.src="/images/icon_candi.png";' src="/images/load.gif" class="lazyload" data-src="<?=$avatar_H?>" alt="Avt UV"></div>
            <div class="infor">
              <p class="name_h"><?=$r_Head[$getName]?></p>
              <p class="email_h"><?=$r_Head[$getEmail]?></p>
            </div>
          </div>
          <div class="main_h <?=$type_h?>">
            <?if($_COOKIE['UT']==0){?>
              <a href="/ung-vien/ho-so-online.html" rel="nofollow" class="item httt"><i class="icon"></i>Hoàn thiện thông tin</a>
              <a href="/thong-tin-tai-khoan-ung-vien.html" rel="nofollow" class="item qltk"><i class="icon"></i>Quản lý tài khoản</a>
            <?}else{?>
              <a href="/thong-tin-tai-khoan-nha-tuyen-dung.html" rel="nofollow" class="item qlc"><i class="icon"></i>Quản lý chung</a>
              <a href="/nha-tuyen-dung/tin-da-dang.html" rel="nofollow" class="item qlt"><i class="icon"></i>Quản lý tin tuyển dụng</a>
              <a href="/nha-tuyen-dung/ho-so-ung-tuyen.html" rel="nofollow" class="item uvut"><i class="icon"></i>Ứng viên ứng tuyển</a>
              <a href="/nha-tuyen-dung/ho-so-da-luu.html" rel="nofollow" class="item uvsave"><i class="icon"></i>Ứng viên đã lưu</a>
            <?}?>
            <a href="/dang-xuat" rel="nofollow" class="item logout"><i class="icon"></i>Đăng xuất</a>
          </div>
        </div>
      </li>
      <?
      }
      ?>
    </ul>
  </div>
  <div id="mobile">
    <ul>
      <li><a href="/"><img class="lazyload" src="/images/load.gif" data-src="/images/logo-new.png" alt="Timviec365.com | Tìm việc làm nhanh, Tuyển dụng 24h"></a></li>
      <li class="ico_menu"><a class="icon_menu"></a></li>
    </ul>
    <div class="popup_header hidden">
      <div class="main_popup_header">
        <i class="fa fa-times" aria-hidden="true"></i>
        <? if(!isset($_COOKIE['UID'])){?>
        <div class="loggin">
          <a class="signin">Đăng nhập</a>
          <a class="register_cv" rel="nofollow" href="/dang-ky-ung-vien.html">Đăng ký</a>
        </div>
        <?}else{?>
        <div class="logged main">
          <div class="top_logged">
            <img onerror='this.onerror=null;this.src="/images/icon_candi.png";' src="/images/load.gif" class="lazyload" data-src="<?=$avatar_H?>" alt="Avt UV"><?=$r_Head[$getName]?>
          </div>
          <div class="bott_logged">
            <a id="qltt" href="<?=($_COOKIE['UT']==0)?"/thong-tin-tai-khoan-ung-vien.html":"/thong-tin-tai-khoan-nha-tuyen-dung.html"?>">Quản lý tài khoản</a>
            <a id="ico_logoutcv" href="/dang-xuat"><img src="/images/ico_logoutcv.png" alt="Logout cv">Đăng xuất</a>
          </div>
        </div>
        <?}?>
        <ul class="menu_header">
          <li><a href="/ho-so-xin-viec.html" rel="nofollow">Hồ sơ xin việc</a></li>
          <li><a href="/mau-cv.html">CV xin việc</a></li>
          <li><a href="/mau-thu-xin-viec.html" rel="nofollow">Thư xin việc</a></li>
          <li><a href="/don-xin-viec.html">Đơn xin việc</a></li>
          <li><a>Sơ yếu lý lịch</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="popup_loggin_cv hidden">
    <div class="main_loggin_cv">
      <div class="modal-head">
        <i class="fa fa-times" aria-hidden="true"></i>
      </div>
      <div class="modal-body">
        <img class="lazyload" src="/images/load.gif" data-src="/images/logo-new.png" alt="Logo đăng nhập">
        <p class="title">Đăng nhập tài khoản ứng viên</p>
        <label class="error"></label>
        <div class="form_signin">
          <input type="text" id="user_name" placeholder="Email"><i class="fa fa-envelope-o" aria-hidden="true"></i>
        </div>
        <div class="form_signin">
          <input type="password" id="password" placeholder="Mật khẩu"><i class="fa fa-key" aria-hidden="true"></i>
        </div>
        <a rel="nofollow" id="forget_pass" href="/quen-mat-khau-ung-vien.html">Quên mật khẩu?</a>
        <div class="btn_signin">
          <button id="btn-login-ajax">Đăng nhập</button>
        </div>
        <p class="question">Bạn chưa có tài khoản? <a class="dkn">Đăng ký ngay</a></p>
      </div>
    </div>
  </div>
  <!-- Button trigger modal -->
  <div class="box-modal-create-cv hidden">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Bạn cần đăng ký để lưu thông tin CV</h4>
          <i class="fa fa-times close" aria-hidden="true"></i>
        </div>
        <div class="modal-body">
          <form method="POST" id="form-dk" >
              <div class="box-left">
                <div class="form_uv">
                <label class="require">Email:</label>
                <input type="text" id="user_email" name="email" class="form-control" placeholder="Địa chỉ email của bạn" value="" tabindex="1"/>
              </div>
              <div class="form_uv">
              <label class="require">Mật khẩu:</label>
                <input type="password" id="user_password_first" value="" class="form-control" name="password_first" maxlength="20" placeholder="Mật khẩu"  tabindex="2"/>
              </div>
              <div class="form_uv">
              <label class="require">Nhập lại mật khẩu</label>
                <input type="password" id="user_password_second" value="" class="form-control" name="password_second" maxlength="20" placeholder="Nhập lại mật khẩu"  tabindex="3"/>
              </div>
              <div class="form_uv">
                <label class="require">Họ và tên:</label>
                <input type="text" id="user_name" class="form-control" name="user_name" placeholder="Họ và tên" value="" tabindex="4"/>
              </div>
              <div class="form_uv">
                <label class="require">Số điện thoại:</label>
                <input type="text" id="user_phone" name="phone" class="form-control numbersOnly" placeholder="Số điện thoại" value="" tabindex="5"/>
              </div>
              <div class="form_uv" id='tp'>
                <label class="require">Tỉnh/ thành phố:</label>
                <select class="form-control" id="s2id_city" name="user_city">
                  <option value="0">Tỉnh/Thành phố</option>
                  <?
                  foreach ($arrcity as $key => $value) {?>
                    <option value="<?=$value['cit_id']?>"><?= $value['cit_name']?></option>
                    <?
                  }
                  ?>
                </select>
              </div>
              <div class="form_uv qh">
                <label class="require">Quận / huyện:</label>
                <select class="form-control" id="s2id_city_child" name="user_city_child">
                  <?
                  if(isset($rowtmp->tmp_distric) && isset($rowtmp->tmp_city))
                  {
                    $sl_distric = new db_query("SELECT * FROM city2 WHERE cit_parent = ".$rowtmp->tmp_city);
                    while ($row_district = mysql_fetch_array($sl_distric->result)) 
                    {
                      ?>
                      <option <?= (isset($rowtmp->tmp_distric))?($rowtmp->tmp_distric == $row_district['cit_id'])?"selected":"":"" ?> value="<?= $row_district['cit_id'] ?>"><?= $row_district['cit_name'] ?></option>
                      <?
                    }
                  }
                  else{?> <option value="0">Quận/ Huyện</option><?}?>
                </select>
              </div>
              <div class="form_uv">
              <label class="require">Địa chỉ chi tiết:</label>
              <input type="text" id="address_uv" name="address" class="form-control" placeholder="Nhập chi tiết địa chỉ của bạn"  value="" />
            </div>
            <div class="form_uv">
              <label class="require">Vị trí mong muốn:</label>
              <input type="text" id="job_name" name="job_name" class="form-control" placeholder="Nhập tên công việc bạn muốn làm" value="" />
            </div>
            <div class="form_uv" id="div_job_address">
              <label class="require">Địa điểm làm việc:</label>    
              <select class="form-control" id="job_address" name="job_address[]" multiple>
                <?
                foreach ($arrcity as $key => $value) {?>
                  <option value="<?=$value['cit_id']?>"><?= $value['cit_name']?></option>
                  <?
                }
                ?>
              </select>
                </div>
                <div class="form_uv" id="div_nganh_nghe">
                <label class="require">Ngành nghề mong muốn:</label>
                <select class="form-control" id="nganh_nghe" name="nganh_nghe[]" multiple>
                  <?
                  foreach ($db_cat as $key => $value) {
                    ?>
                    <option value="<?=$value['cat_id']?>"><?= $value['cat_name']?></option>
                    <?
                  }
                  ?>
                </select>
              </div>
              <div class="form_uv" style="text-align: center;">
              <input type="submit" id="submit_b1_dki" name="Submitdk" onclick="return checkvali_CV()" value="Lưu thông tin" />
            </div>
            </div>
          </form>
        <div class="btn-dangnhap">
          <p>Bạn đã có tài khoản? <a id="submitButtondn">Đăng nhập ngay</a></p>
        </div>
      </div>
        </div>
    </div>
</div>
</div>