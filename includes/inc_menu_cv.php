<div class="box_menu_cv main">
<div class="menu_cv main">
  <div class="item taocv_online"><a href="/tao-cv-online.html"><i class="icon"></i>Tạo CV online</a></div>
  <div class="item cv_language">
    <a><i class="icon"></i>CV theo ngôn ngữ</a>
    <ul class="sub_menuCV">
      <li><a href="/mau-cv/tieng-viet.html">CV Tiếng Việt</a></li>
      <li><a href="/mau-cv/tieng-anh.html">CV Tiếng Anh</a></li>
      <li><a href="/mau-cv/tieng-nhat.html">CV Tiếng Nhật</a></li>
      <li><a href="/mau-cv/tieng-han.html">CV Tiếng Hàn</a></li>
      <li><a href="/mau-cv/tieng-trung.html">CV Tiếng Trung</a></li>
    </ul>
  </div>
  <div class="item cv_category">
    <a><i class="icon"></i>CV theo ngành nghề</a>
    <div class="sub_menuCV">
    <div style="margin-bottom: 10px"><input style="display: inline-block;width: 100%;" type="text" placeholder="Search to ..." id="txt_search_cv"></div>
    <ul>
        <?
        foreach ($db_catCV as $key => $value) {
        ?>
        <li><a href="<?=rewriteNNCV($value['alias'],$value['id'])?>">CV <?=$value['name']?></a></li>
        <?
        }
        ?>
      </ul>
    </div>
  </div>
  <div class="item cv_blog"><a href="/bi-quyet-viet-cv.html"><i class="icon"></i>Bí quyết viết CV</a></div>
</div>
</div>