<script>
	function validateform(form){   //validate form đăng kí freelancer

    // lấy giá trị 
		var ten = document.getElementById('ho_va_ten').value;
    var ngay_sinh = document.getElementById('ngay_sinh').value;
    var mat_khau = document.getElementById('hello').value;
    var regex_pass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;
    var again_mat_khau = document.getElementById('hello2').value;
    var gioi_tinh = document.getElementById('gioi_tinh').value;
    var so_dien_thoai = document.getElementById('so_dien_thoai').value;
    var sdt_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
    var thanh_pho = document.getElementById('thanh_pho').value;
    var quan_huyen = document.getElementById('quan_huyen').value;
    // var group = document.radioForm.linh_vuc_lam_viec;
    var linh_vuc_lam_viec = document.getElementsByName("linh_vuc_lam_viec[]");
    var the_loai_luong = $('.G-doi-mau.hover').data('id');
    var co_dinh = document.getElementById('hihi1').value;
    var uoc_luong = document.getElementById('uoc_luong_1').value;
    var uoc_luong = document.getElementById('uoc_luong_2').value;
    // var co_dinh = document.getElementById('uoc_luong').value;
    // kiểm tra dữ liệu validate
        
    
    if (ten == "") {
      document.getElementById('G_error').innerHTML = "Bạn chưa nhập tên của mình!";
      return false;
      // alert("Bạn chưa nhập tên của mình!");
  	}else{
      document.getElementById('G_error').innerHTML = "";
    }

    if (ngay_sinh == ""){
      document.getElementById('G_error2').innerHTML = "Bạn chưa nhập ngày sinh của mình!";
      return false;
      // alert("Bạn chưa nhập ngày sinh của mình!");
    }else{
      document.getElementById('G_error2').innerHTML = "";
    }

    if (mat_khau == ""){
      document.getElementById('G_error3').innerHTML = "Bạn chưa nhập mật khẩu của mình!";
      return false;
    }else if (regex_pass.test(mat_khau) == false){
      document.getElementById('G_error3').innerHTML = "Mật khẩu chứa 8 kí tự, 1 chữ hoa và 1 số!";
      return false;
    }else{
      document.getElementById('G_error3').innerHTML = "";
    }

    if (again_mat_khau == ""){
      document.getElementById('G_error4').innerHTML = "Bạn chưa nhập mật khẩu của mình!";
      return false;
    }else{
      document.getElementById('G_error4').innerHTML = "";
    }

    if (again_mat_khau != mat_khau){
      document.getElementById('G_error4').innerHTML = "Mật khẩu chưa trùng nhau!";
      return false;
    }else{
      document.getElementById('G_error4').innerHTML = "";
    }

    if (gioi_tinh == ""){
      document.getElementById('G_error5').innerHTML = "Bạn chưa chọn giới tính của mình!";
      return false;
    }else{
      document.getElementById('G_error5').innerHTML = "";
    }

    if (so_dien_thoai == ""){
      document.getElementById('G_error6').innerHTML = "Bạn chưa nhập số điện thoại của mình!";
      return false;
    }else if (sdt_regex.test(so_dien_thoai) == false){
      document.getElementById('G_error6').innerHTML = "SĐT sai định dạng!";
      return false;
    }

    if (thanh_pho == ""){
      document.getElementById('G_error7').innerHTML = "Bạn chưa chọn thành phố của mình!";
      return false;
    }else{
      document.getElementById('G_error7').innerHTML = "";
    }

    if (quan_huyen == ""){
      document.getElementById('G_error8').innerHTML = "Bạn chưa chọn quận/huyện của mình!";
      return false;
    }else{
      document.getElementById('G_error8').innerHTML = "";
    }

    if(the_loai_luong == 'hihi1' ){
      // hihi1
      if (co_dinh == "") {
        // $('#hihi1').val();
        document.getElementById('G_error9').innerHTML = "Bạn chưa chọn lương của mình!";
        return false;
      }else{
        document.getElementById('G_error9').innerHTML = "";
      }
    }else{
      if (uoc_luong == "") {
        document.getElementById('G_error9').innerHTML = "Bạn chưa chọn lương của mình!";
        return false;
      }
      else{
        document.getElementById('G_error9').innerHTML = "";
      }
    }
    
    if(linh_vuc_lam_viec[0].checked==false && linh_vuc_lam_viec[1].checked==false && linh_vuc_lam_viec[2].checked==false && linh_vuc_lam_viec[3].checked==false && linh_vuc_lam_viec[4].checked==false && linh_vuc_lam_viec[5].checked==false && linh_vuc_lam_viec[6].checked==false && linh_vuc_lam_viec[7].checked==false) {
      document.getElementById('G_error10').innerHTML = "Bạn chưa chọn lĩnh vực!";
        return false;
    }else{
      document.getElementById('G_error10').innerHTML = "";
    }
	}

  //////////////////////////////////////////////////////////////////////////////////////
  function validateOtp(){
    var nhap_du_lieu = document.getElementById('nhap_du_lieu').value;
    var ma_otp = document.getElementById('ma_otp').value;
    if (nhap_du_lieu != ma_otp) {
      document.getElementById('error').innerHTML = "Bạn nhập sai mã OTP!";
      return false;
    }
    else{
      document.getElementById('error').innerHTML = "";
    }
  }

  //////////////////////////////////////////////////////////////////////////////////////
  function updateTt(){
    var ten = document.getElementById('ho_va_ten').value;
    var ngay_sinh = document.getElementById('ngay_sinh').value;
    var gioi_tinh = document.getElementById('gioi_tinh').value;
    var so_dien_thoai = document.getElementById('so_dien_thoai').value;
    var sdt_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
    var email = document.getElementById('email').value;
    var regex_email = /^[a-z][a-z0-9_\.]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/;

    if (ten == "") {
      document.getElementById('G_error').innerHTML = "Tên không được để trống!";
      return false;
      // alert("Bạn chưa nhập tên của mình!");
    }else{
      document.getElementById('G_error').innerHTML = "";
    }

    if (ngay_sinh == ""){
      document.getElementById('G_error2').innerHTML = "Ngày sinh không được để trống!";
      return false;
      // alert("Bạn chưa nhập ngày sinh của mình!");
    }else{
      document.getElementById('G_error2').innerHTML = "";
    }

    if (gioi_tinh == ""){
      document.getElementById('G_error3').innerHTML = "Giới tính không được để trống!";
      return false;
    }else{
      document.getElementById('G_error3').innerHTML = "";
    }

    if (so_dien_thoai == ""){
      document.getElementById('G_error4').innerHTML = "Số điện thoại không được để trống!";
      return false;
    }else{
      document.getElementById('G_error4').innerHTML = "";
    }

    if (email == ""){
      document.getElementById('G_error5').innerHTML = "";
    }else if(regex_email.test(email) == false){
      document.getElementById('G_error5').innerHTML = "Email không đúng định dạng!";
      return false;
    }
  }
</script>