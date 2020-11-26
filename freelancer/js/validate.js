function validate_dang_tin_ban_thoi_gian() {
    var ten_vi_tri = document.getElementById('ten_vi_tri').value;
    if (ten_vi_tri == "") {
        alert("dmeo lỗi");
    }
    return false;
}