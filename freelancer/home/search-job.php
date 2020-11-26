<div class="M-bodyhead-2">
    <div class="M-bodyhead-21">
    <div class="search-box">
            <div>
                <input type="text" name="key-word" id="search_box_pc" placeholder="Nhập từ khóa ...">
                <select name="city" id="tinh-thanh" style="width:23%" >
                    <option value="">Chọn tỉnh thành</option>
                    <?php 
                        $sql ="select * from city";
                        $db_qr = new db_query($sql);
                        While($row = mysql_fetch_assoc($db_qr->result)){
                            echo '<option value="'.$row["cit_id"].'">'.$row["cit_name"].'</option>';
                        }
                    ?>
                </select> 
                <select name="category" id="nganh-nghe" style="width:23%">
                    <option value="">Chọn ngành nghề</option>
                    <?php 
                        $sql ="select * from flc_nganh_nghe";
                        $db_qr = new db_query($sql);
                        While($row = mysql_fetch_assoc($db_qr->result)){
                            echo '<option value="'.$row["ma_nganh_nghe"].'">'.$row["ten_nganh_nghe"].'</option>';
                        }
                    ?>
                </select>
                <button ><img src="<?php echo $domain ?>/image/icon/icon10.png" alt=""></button>
            </div>
        </div>
    </div>
</div>
<div class="M-bodyhead-3">
    <div>
        <p>Tìm nhiều nhất:</p>
        <ul>
            <li><a href="#">Javascript</a></li>
            <li><a href="#">PHP</a></li>
            <li><a href="#">Design</a></li>
            <li><a href="#">Video</a></li>
            <li><a href="#">Biên tập viên</a></li>
        </ul>
    </div>
</div>