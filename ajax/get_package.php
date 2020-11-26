<?
    include('../home/config.php');

    $id_package = getValue('idPackage','int','POST',0);
    $position = getValue('position','int','POST',0);
    $detect = getValue('detect','int','POST',0);

    $head = "";
    if($id_package != 0){
        $array_check = ['7','8','9'];
        $db_qr = new db_query("SELECT * FROM bang_gia WHERE bg_type = ".$id_package);
            $head = "";
            if($id_package == 5){
                $head .= '<img src="/images/load.gif" class="lazyload pull-left" data-src="/images/des_lhs.png">';
                $head .= '
                    <div class="pull-left" id="head_lhs">
                        <p class="title_head_package">LỌC HỒ SƠ</p>
                        <div class="content_head_package">
                            <div class="item_content_head"><img data-src="/images/i_head_package.png" src="/images/load.gif" class="lazyload"><p>Cơ chế trừ điểm: Đồng điểm với tất cả các cấp bậc. 1 điểm = 1 hồ sơ.</p></div>
                            <div class="item_content_head"><img data-src="/images/i_head_package.png" src="/images/load.gif" class="lazyload"><p>Cơ chế hoàn điểm: Hoàn điểm 100% đối với các bộ hồ sơ không chất lượng (Hồ sơ sai thông tin, sai số điện thoại, không liên lạc được, ứng viên không có nhu cầu đi làm)</p></div>
                        </div>
                    </div>
                ';
            }
            if($id_package == 10){
                $head .= ' <div class="pull-left"><img src="/images/load.gif" class="lazyload" data-src="/images/i_combo_head.png"><p class="title_head_package">COMBO LỌC HỒ SƠ GHIM TIN HẤP DẪN</p></div>';
                $head .= '
                    <div class="pull-left" id="head_combo">
                        <div class="content_head_package">
                            <div class="title_combo">Đối với các gói ghim tin</div>
                            <div class="item_content_head">
                            <img data-src="/images/i_head_package.png" src="/images/load.gif" class="lazyload"><p>Bảo hành tin đăng: Sau thời hạn ghim tin, nếu không có hồ sơ ứng tuyển sẽ tiếp tục được ghim tin tại vị trí đó với khoảng thời gian tương ứng.</p></div>
                            <div class="item_content_head"><img data-src="/images/i_head_package.png" src="/images/load.gif" class="lazyload"><p>Bảo lưu tin đăng: Tin đăng có thời hạn ghim tin đăng ký >1 tuần sẽ được bảo lưu 52 tuần tiếp theo (tính từ ngày cuối cùng sử dụng dịch vụ) nếu thời gian dịch vụ còn lại trên 1 tuần.</p></div>
                            <div class="item_content_head"><img data-src="/images/i_head_package.png" src="/images/load.gif" class="lazyload"><p>Được đổi tin ghim không giới hạn số lần trong thời gian đăng ký chính với các gói có thời hạn ghim tin từ 1 tuần trở lên tùy theo nhu cầu tuyển dụng của các đơn vị ( không hỗ trợ đổi tin trong thời hạn bảo hành).</p></div>
                        </div>
                        <div class="content_head_package">
                            <div class="title_combo">Đối với các gói lọc hồ sơ</div>
                            <div class="item_content_head">
                            <img data-src="/images/i_head_package.png" src="/images/load.gif" class="lazyload"><p>Cơ chế trừ điểm: Đồng điểm với tất cả các cấp bậc. 1 điểm = 1 hồ sơ.</p></div>
                            <div class="item_content_head"><img data-src="/images/i_head_package.png" src="/images/load.gif" class="lazyload"><p>Cơ chế hoàn điểm: Hoàn điểm 100% đối với các bộ hồ sơ không chất lượng (Hồ sơ sai thông tin, sai số điện thoại, không liên lạc được, ứng viên không có nhu cầu đi làm).</p></div>
                        </div>
                    </div>
                ';
            }
            if($id_package == 1){
                $head .= '<img src="/images/load.gif" class="lazyload pull-left" data-src="/images/i_boxHd.png">';
                $head .= '
                    <div class="pull-left" id="head_boxHD">
                        <p class="title_head_package">GHIM TIN TRANG CHỦ BOX HẤP DẪN</p>
                        <div class="content_head_package">
                            <div class="item_content_head"><img data-src="/images/i_head_package.png" src="/images/load.gif" class="lazyload"><p>Bảo hành tin đăng: Sau thời hạn ghim tin, nếu không có hồ sơ ứng tuyển sẽ tiếp tục được ghim tin tại vị trí đó với khoảng thời gian tương ứng.</p></div>
                            <div class="item_content_head"><img data-src="/images/i_head_package.png" src="/images/load.gif" class="lazyload"><p>Cơ chế hoàn điểm: Bảo lưu tin đăng (áp dụng từ ghim tin 2 tuần trở lên): Tin đăng sẽ được bảo lưu 3 tháng tiếp theo (tính từ ngày cuối cùng sử dụng dịch vụ) nếu thời gian dịch vụ còn lại trên 1 tuần.)</p></div>
                            <div class="item_content_head"><img data-src="/images/i_head_package.png" src="/images/load.gif" class="lazyload"><p>Được đổi tin ghim (áp dụng từ ghim tin 2 tuần trở lên) không giới hạn số lần trong thời gian đăng ký chính với các gói có thời hạn ghim tin từ 1 tuần trở lên tùy theo nhu cầu tuyển dụng của các đơn vị ( không hỗ trợ đổi tin trong thời hạn bảo hành).</p></div>
                        </div>
                    </div>
                ';
            }
            if($id_package == 6){
                $head .= '<img src="/images/load.gif" class="lazyload pull-left" data-src="/images/i_boxTH.png">';
                $head .= '
                    <div class="pull-left" id="head_boxTH">
                        <p class="title_head_package">ghim tin trang chủ box thương hiệu</p>
                        <div class="content_head_package">
                            <div class="item_content_head"><img data-src="/images/i_head_package.png" src="/images/load.gif" class="lazyload"><p>Bảo hành tin đăng: Sau thời hạn ghim tin, nếu không có hồ sơ ứng tuyển sẽ tiếp tục được ghim tin tại vị trí đó với khoảng thời gian tương ứng.</p></div>
                            <div class="item_content_head"><img data-src="/images/i_head_package.png" src="/images/load.gif" class="lazyload"><p>Cơ chế hoàn điểm: Bảo lưu tin đăng (áp dụng từ ghim tin 2 tuần trở lên): Tin đăng sẽ được bảo lưu 3 tháng tiếp theo (tính từ ngày cuối cùng sử dụng dịch vụ) nếu thời gian dịch vụ còn lại trên 1 tuần.)</p></div>
                            <div class="item_content_head"><img data-src="/images/i_head_package.png" src="/images/load.gif" class="lazyload"><p>Được đổi tin ghim (áp dụng từ ghim tin 2 tuần trở lên) không giới hạn số lần trong thời gian đăng ký chính với các gói có thời hạn ghim tin từ 1 tuần trở lên tùy theo nhu cầu tuyển dụng của các đơn vị ( không hỗ trợ đổi tin trong thời hạn bảo hành).</p></div>
                        </div>
                    </div>
                ';
            }
            if($id_package == 3){
                $head .= '<img src="/images/load.gif" class="lazyload pull-left" data-src="/images/i_boxLC.png">';
                $head .= '
                    <div class="pull-left" id="head_boxTH">
                        <p class="title_head_package">ghim tin trang chủ box việc làm lương cao</p>
                        <div class="content_head_package">
                            <div class="item_content_head"><img data-src="/images/i_head_package.png" src="/images/load.gif" class="lazyload"><p>Bảo hành tin đăng: Sau thời hạn ghim tin, nếu không có hồ sơ ứng tuyển sẽ tiếp tục được ghim tin tại vị trí đó với khoảng thời gian tương ứng.</p></div>
                            <div class="item_content_head"><img data-src="/images/i_head_package.png" src="/images/load.gif" class="lazyload"><p>Bảo lưu tin đăng (áp dụng từ ghim tin 2 tuần trở lên): Tin đăng sẽ được bảo lưu 3 tháng tiếp theo (tính từ ngày cuối cùng sử dụng dịch vụ) nếu thời gian dịch vụ còn lại trên 1 tuần.</p></div>
                            <div class="item_content_head"><img data-src="/images/i_head_package.png" src="/images/load.gif" class="lazyload"><p>Được đổi tin ghim (áp dụng từ ghim tin 2 tuần trở lên) không giới hạn số lần trong thời gian đăng ký chính với các gói có thời hạn ghim tin từ 1 tuần trở lên tùy theo nhu cầu tuyển dụng của các đơn vị ( không hỗ trợ đổi tin trong thời hạn bảo hành).</p></div>
                        </div>
                    </div>
                ';
            }
            if($id_package == 4){
                $head .= '<img src="/images/load.gif" class="lazyload pull-left" data-src="/images/i_head_nganh.png">';
                $head .= '
                    <div class="pull-left" id="head_box_nganh">
                        <p class="title_head_package">ghim tin trang ngành</p>
                        <div class="content_head_package">
                            <div class="item_content_head"><img data-src="/images/i_head_package.png" src="/images/load.gif" class="lazyload"><p>Bảo hành tin đăng: Sau thời hạn ghim tin, nếu không có hồ sơ ứng tuyển sẽ tiếp tục được ghim tin tại vị trí đó với khoảng thời gian tương ứng.</p></div>
                            <div class="item_content_head"><img data-src="/images/i_head_package.png" src="/images/load.gif" class="lazyload"><p>Bảo lưu tin đăng (áp dụng từ ghim tin 2 tuần trở lên): Tin đăng sẽ được bảo lưu 3 tháng tiếp theo (tính từ ngày cuối cùng sử dụng dịch vụ) nếu thời gian dịch vụ còn lại trên 1 tuần.</p></div>
                            <div class="item_content_head"><img data-src="/images/i_head_package.png" src="/images/load.gif" class="lazyload"><p>Được đổi tin ghim (áp dụng từ ghim tin 2 tuần trở lên) không giới hạn số lần trong thời gian đăng ký chính với các gói có thời hạn ghim tin từ 1 tuần trở lên tùy theo nhu cầu tuyển dụng của các đơn vị ( không hỗ trợ đổi tin trong thời hạn bảo hành).</p></div>
                        </div>
                    </div>
                ';
            }
?>
    <div class="main_detail_package main">
    <? if(!$detect){ ?>
        <div class="text-center pull-right close" onclick="closePackage(`<?=$position?>`)">X</div>
    <?}?>
        <div class="main main_package">
            <?if(!in_array($id_package,$array_check)){?>
            <? if(!$detect){ ?>
            <div class="head_des main">
                <?=$head?>
            </div>
            <?}?>
            <div class="main">
            <?
                While($row = mysql_fetch_assoc($db_qr->result)){
            ?>
            <div class="item_detail_package">
                <div class="title_package"><?=$row['bg_tuan']?></div>
                <div class="price"><?=$row['bg_gia']?> <span>VNĐ</span></div>
                <div class="main">
                <p class="left pull-left value_package"><i class="fa fa-check" aria-hidden="true"></i>Chiết khấu: <span class="value"><?=$row['bg_chiet_khau']?></span></p>
                <p class="pull-right value_package bg_tk">Tặng kèm: <span class="value"><?=($row['bg_tk']!='')?$row['bg_tk']:"Chưa cập nhật"?></span></p>
                </div>
                <div class="main">
                <p class="left pull-left value_package"><i class="fa fa-check" aria-hidden="true"></i>Giá đã có VAT: <span class="value"><?=$row['bg_vat']?>đ</span></p>
                </div>
                <div class="main">
                    <p class="left pull-left value_package">
                        <i class="fa fa-check" aria-hidden="true"></i>
                        Tặng thẻ điện thoại: <span class="value"><?=($row['bg_the']!='')?$row['bg_the']."đ":"Chưa cập nhật"?></span>
                    </p>
                    <a class="pull-right buy_now" onclick="show_popup()">Mua ngay </a>
                </div>
                <div class="main_bot_package">
                    <div class="item_bot_package benefits_enjoyed" onclick="show_bot_package(this,'bg_quyenloi')"><i class="icon"></i>Quyền lợi  </div>
                    <div class="item_bot_package service_incentives" onclick="show_bot_package(this,'bg_uudai')"><i class="fa fa-gift" aria-hidden="true"></i>Ưu đãi</div>
                    <div class="item_bot_package comment_package" onclick="show_bot_package(this,'bg_comment')"><i class="fa fa-comments" aria-hidden="true"></i>Bình luận</div>
                    <div class="child_bot_package bg_quyenloi">
                        <div class="close_child text-center"><i onclick="close_bot_package(this,'bg_quyenloi')" class="fa fa-times-circle" aria-hidden="true"></i></div>
                        <?=str_replace('style="font-size: 13px;"','',$row['bg_quyenloi'])?>
                    </div>
                    <div class="child_bot_package bg_uudai">
                        <div class="close_child text-center"><i onclick="close_bot_package(this,'bg_uudai')" class="fa fa-times-circle" aria-hidden="true"></i></div>
                        <?=str_replace('style="font-size: 13px;"','',$row['bg_uudai'])?>
                    </div>
                    <div class="child_bot_package bg_comment">
                        <div class="close_child text-center"><i onclick="close_bot_package(this,'bg_comment')" class="fa fa-times-circle" aria-hidden="true"></i></div>
                        <div class="box_cm">
                        <?
                            for($i = 1; $i <= 3; $i++){
                                $bg_cm = 'bg_cm'.$i;
                                echo '
                                    <div class="bg_cm" id="bg_cm'.$i.'">'.$row[$bg_cm].'</div>
                                ';
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
            <? } ?>
            </div>
            <?}
            if($id_package == 7){
                $array_tc = [
                    [
                        'name'  => 'Banner trang chủ (1)',
                        'price' => '15.000.000',
                        'size'  => '1150 * 200'
                    ],
                    [
                        'name'  => 'Banner nhỏ (2)',
                        'price' => '3.000.000',
                        'size'  => '370 * 182'
                    ],
                    [
                        'name'  => 'Banner nhỏ (3)',
                        'price' => '2.500.000',
                        'size'  => '370 * 182'
                    ],
                    [
                        'name'  => 'Logo các NTD tiêu biểu(4)',
                        'price' => '1.000.000',
                        'size'  => '484 * 609'
                    ]
                ];
                $array_nganh = [
                    [
                        'name'  => 'Banner nhỏ (1)',
                        'price' => '1.000.000 ',
                        'size'  => '180 * 224'
                    ],
                    [
                        'name'  => 'Banner (2)',
                        'price' => '2.500.000',
                        'size'  => '370 * 473'
                    ],
                    [
                        'name'  => 'Banner (3)',
                        'price' => '2.000.000',
                        'size'  => '370 * 478'
                    ],
                    [
                        'name'  => 'Banner (4)',
                        'price' => '1.500.000',
                        'size'  => '370 * 478'
                    ],
                    [
                        'name'  => 'Banner dưới (5)',
                        'price' => '2.000.000',
                        'size'  => '1150 * 136'
                    ]
                ];
            ?>
            <div id="box_banner">
                <div class="main" id="banner_tc">
                    <p class="title_head_package">banner trang chủ</p>
                    <div class="pull-left banner_left">
                        <img src="/images/load.gif" class="lazyload" data-src="/images/i_bannerTc.png" alt="Banner TC">
                    </div>
                    <div class="pull-left right">
                        <?
                        foreach($array_tc as $keys => $key){
                        ?>
                        <div class="item_detail_package">
                            <div class="title_package"><?=$key['name']?></div>
                            <div class="price"><?=$key['price']?> <span>VNĐ</span></div>
                            <div class="main">
                            <p class="left pull-left value_package"><i class="fa fa-check" aria-hidden="true"></i>Kích thước: <span class="value"><?=$key['size']?></span></p>
                            </div>
                            <div class="main">
                                <p class="left pull-left value_package">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                    Thời hạn: <span class="value">4 tuần</span>
                                </p>
                                <a class="pull-right buy_now" onclick="show_popup()">Mua ngay </a>
                            </div>
                        </div>
                        <?}?>
                    </div>
                </div>
                <div class="main">
                    <p class="title_head_package">banner trang ngành</p>
                    <div class="pull-left banner_left">
                        <img src="/images/load.gif" class="lazyload" data-src="/images/i_bannerNganh.png" alt="Banner Ngành">
                    </div>
                    <div class="pull-left right">
                        <?
                            foreach($array_nganh as $keys => $key){
                        ?>
                        <div class="item_detail_package">
                            <div class="title_package"><?=$key['name']?></div>
                            <div class="price"><?=$key['price']?> <span>VNĐ</span></div>
                            <div class="main">
                            <p class="left pull-left value_package"><i class="fa fa-check" aria-hidden="true"></i>Kích thước: <span class="value"><?=$key['size']?></span></p>
                            </div>
                            <div class="main">
                                <p class="left pull-left value_package">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                    Thời hạn: <span class="value">4 tuần</span>
                                </p>
                                <a class="pull-right buy_now" onclick="show_popup()">Mua ngay </a>
                            </div>
                        </div>
                        <?}?>
                    </div>
                </div>
            </div>
            <?
            }
            if($id_package == 8){
                $array_click = [
                    [
                        'name'      => 'Biểu tượng tin uy tín',
                        'price'     => '200.000',
                        'price_vat' => '220.000',
                        'id'        => 'item_uytin',
                        'val_icon'  => ''
                    ],
                    [
                        'name'      => 'Biểu tượng tin hấp dẫn',
                        'price'     => '200.000',
                        'price_vat' => '220.000',
                        'id'        => 'icon_hd',
                        'val_icon'  => 'Tin hấp dẫn'
                    ],
                    [
                        'name'      => 'Biểu tượng HOT',
                        'price'     => '300.000',
                        'price_vat' => '330.000',
                        'id'        => 'icon_hot',
                        'val_icon'  => 'Hot'
                    ],
                    [
                        'name'      => 'Biểu tượng GẤP',
                        'price'     => '300.000',
                        'price_vat' => '330.000',
                        'id'        => 'icon_gap',
                        'val_icon'  => 'Gấp'
                    ],
                    [
                        'name'      => 'Biểu tượng MỚI',
                        'price'     => '300.000',
                        'price_vat' => '330.000',
                        'id'        => 'icon_new',
                        'val_icon'  => 'Mới'
                    ],
                    [
                        'name'      => 'Biểu tượng tin được bôi đỏ',
                        'price'     => '500.000',
                        'price_vat' => '550.000',
                        'id'        => 'icon_do',
                        'val_icon'  => 'Bôi đỏ tin'
                    ],
                    
                ];
                $i = 1;
                foreach($array_click as $keys => $key){
                ?>
                <div class="item_detail_package" id="<?=$key['id']?>">
                    <div class="title_package"><?=$key['name']?></div>
                    <div class="main">
                    <p class="left pull-left value_package"><i class="fa fa-check" aria-hidden="true"></i>Giá chưa có VAT: <span class="value"><?=$key['price']?></span></p>
                    <?
                    if($i==1) echo '<img src="/images/load.gif" class="lazyload" id="img_uytin" data-src="/images/i_uytin.png">';
                    ?>
                    <p class="pull-right value_package icon_package"><?=$key['val_icon']?></span></p>
                    </div>
                    <div class="main">
                    <p class="left pull-left value_package"><i class="fa fa-check" aria-hidden="true"></i>Giá đã có VAT: <span class="value"><?=$key['price_vat']?>đ</span></p>
                    
                    </div>
                    <div class="main">
                        <p class="left pull-left value_package">
                            <i class="fa fa-check" aria-hidden="true"></i>
                            Thời hạn: <span class="value">1 tuần</span>
                        </p>
                        <a class="pull-right buy_now" onclick="show_popup()">Mua ngay </a>
                    </div>
                </div>
                <?
                $i++;
                }
            }
            if($id_package == 9){
                $headhunt = '';
                $headhunt .= '<p class="text-center title_head_package">QUY TRÌNH TUYỂN DỤNG THUÊ NGOÀI TRỌN GÓI</p>';
                $headhunt .= '<p class="text-center"><img class="lazyload" src="/images/load.gif" data-src="/images/i_headhunt.png" alt="HeadHunt"></p>';
                $headhunt .= '
                    <div class="main_headhunt main">
                        <div class="item_headhunt main">
                            <span class="orange">Timviec365.com</span> cung ứng Dịch vụ tư vấn, thiết lập bộ máy nhân sự, thay bạn vận hành bộ tuyển dụng nhân sự của công ty.Kết hợp nhân tài với cơ hội bền vững. Những ứng viên do chúng tôi tuyển dụng có năng lực chuyên môn, phẩm chất đạo đức tốt hơn những ứng viên trung bình trong ngành.
                            <p class="blue">Tuyển dụng theo nhu cầu</p>
                            Chúng tôi sẽ tiến cử những ứng viên tài năng và phù hợp đến các doanh nghiệp hiện chưa có bộ máy tuyển dụng nhân sự thực sự chuyên nghiệp. Với mỗi vị trí chúng tôi sẽ đưa đến quý công ty ít nhất 2 vị trí nhân sự phù hợp để quý công ty lựa chọn.
                        </div>
                        <div class="item_headhunt main">
                            <p class="tt_headhunt">HÌNH THỨC THANH TOÁN</p>
                            <p>- Thanh toán 30% giá trị hợp đồng ngay sau khi hoàn thiện hợp đồng.</p>
                            <p>- Thanh toán tiếp 50% giá trị hợp đồng vào ngày ứng viên bắt đầu làm việc.</p>
                            <p>- Thanh toán hoàn toàn giá trị hợp đồng khi ứng viên làm đủ 60 ngày (Tính cả ngày nghỉ).
                            Chúng tôi cam kết sẽ tìm ứng viên thay thế nếu ứng viên trước nghỉ việc trong vòng 2 tháng đầu.</p>
                            <p class="tt_headhunt">PHÍ TUYỂN DỤNG</p>
                            <p>- Tuyển cấp bậc nhân viên 1 tháng lương/ 1 người.</p>
                            <p>- Tuyển cấp bậc quản lý 2 tháng lương/ 1 người.</p>
                            <p>- Tuyển nhân viên IT 1 tháng lương/ 1 người..</p>
                ';
                if(!isset($_COOKIE['UID'])) $headhunt .= '<a href="/dang-ky-nha-tuyen-dung.html" rel="nofollow" class="dkn">Đăng ký ngay</a>';
                $headhunt .= '
                        </div>
                        <div class="item_headhunt main">
                            <p>Mọi chi tiết xin liên hệ MRS. Hương</p>
                            <p>Điện thoại: <span class="orange">0329 39.88.58 | 024 36.36.66.99<span></p>
                            <p>Skype: <span class="blue">binhminhmta123@gmail.com</span></p>
                            <p>Email: <span class="blue">timviec365.vn@gmail.com</span></p>
                        </div>
                    </div>
                    ';
                echo $headhunt;
            }
            ?>
        </div>
    </div>
<? } ?>