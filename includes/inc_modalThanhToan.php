<div id="modalBangGia" class="popup hidden" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title pull-left">Thanh toán dịch vụ</h4>
        <i class="fa fa-times-circle pull-right" aria-hidden="true"></i>
      </div>
      <div class="modal-body">
        <p class="step">Bước 1: Chuyển tiền qua Internet Banking</p>
        <div class="main_bank main">
            <div class="bank_left pull-left">
                <?
                    $array_bank = [
                        '/images/bidv.png',
                        '/images/agri.png',
                        '/images/vietcom.png',
                        '/images/mb.png',
                        '/images/maritime.png',
                        '/images/techcom.png',
                        '/images/acb.png',
                        '/images/viettin.png'
                    ];
                ?>
                <div class="item_left">
                    <?
                        for($i = 0; $i < count($array_bank);$i++){
                    ?>
                    <div class="item_bank <?=($i==0)?"active":""?>" data-id="<?=$i?>">
                        <img src="/images/load.gif" class="lazyload" data-src="<?=$array_bank[$i]?>" alt="Images Bank">
                    </div>
                    <?
                    if($i == 3) echo '</div><div class="item_left">';
                    }
                    ?>
                </div>
            </div>
            <div class="bank_right pull-left">
                <div class="infor_bank">  
                    <fieldset>
                        <legend>Thông tin tài khoản</legend>
                        <p>Số Tài Khoản: <span class="blue" id="stk">21610000462781</span> </p>
                        <p>Chủ Tài Khoản: <span class="blue" id="ctk">DƯƠNG THỊ MINH TUYỂN</span></p>
                        <p>Chi Nhánh: <span class="blue" id="cn">Đống Đa, Hà Nội</span></p>
                        <p>Nội dung chuyển khoản: <span class="blue">[Tên công ty] su dung dich vu timviec365</span></p>
                        <p>Ví Dụ: <span class="blue">cong ty abc su dung dich vu timviec365</span></p>
                    </fieldset>
                </div>
            </div>
           
        </div>
        <div class="step">Bước 2: Thông báo cho chuyên viên hỗ trợ hoặc zalo: <span class="orange">0329 39.88.58</span></div>
      </div>
    </div>
  </div>
</div>