
function change_color_button2(){
    document.getElementById("buton2").classList.toggle("button2-click");
    document.getElementById("buton1").classList.toggle("button1");
}
            function menu_hover() {
                document.getElementById("M-body-tablet").classList.toggle("M-body-tablet-hover");
                document.getElementById("M-hover-menu-tablet").classList.toggle("M-hover-menu-tablet-hover");
                document.getElementById("M-menu-hover-tablet").classList.toggle("M-menu-hover-tablet-hover");
                document.getElementById("M-head-tablet").classList.toggle("M-head-tablet-hover");
            }
            function search_tablet() {
                document.getElementById("M-search-head-hover-tablet").classList.toggle("M-search-head-hover-tablet-hover");
                document.getElementById("M-head-tablet").classList.toggle("M-head-tablet-hover");
                document.getElementById("M-hover-search-tablet").classList.toggle("M-hover-search-tablet-hover");
                document.getElementById("img-close-tablet").classList.toggle("img-close-tablet-hover");
            }

            function G_click(){
                document.getElementById("G-downward").classList.toggle("G-downward-hover");
                document.getElementById("mui-ten").classList.toggle("fa-caret-up-hover");
                document.getElementById("lost").classList.toggle("fa-sort-down-hover");
            }
            function G_click2(){
                document.getElementById("G-downward2").classList.toggle("G-downward-hover2");
                document.getElementById("mui-ten2").classList.toggle("fa-caret-up-hover5");
                document.getElementById("lost2").classList.toggle("fa-sort-down-hover5");
            }
            function G_click3(){
                document.getElementById("G-downward3").classList.toggle("G-downward-hover3");
                document.getElementById("mui-ten3").classList.toggle("fa-caret-up-hover5");
                document.getElementById("lost3").classList.toggle("fa-sort-down-hover5");
            }
            function G_click4(){
                document.getElementById("G-downward4").classList.toggle("G-downward-hover4");
                document.getElementById("mui-ten4").classList.toggle("fa-caret-up-hover5");
                document.getElementById("lost4").classList.toggle("fa-sort-down-hover5");
            }
            function G_click5(){
                document.getElementById("G-downward5").classList.toggle("G-downward-hover5");
                document.getElementById("mui-ten5").classList.toggle("fa-caret-up-hover5");
                document.getElementById("lost5").classList.toggle("fa-sort-down-hover5");
            }

            function hover_project() {
                document.getElementById("M-body-ProjectEmployment-right-top-right").classList.toggle("M-body-ProjectEmployment-right-top-right-hover");
                document.getElementById("M-body-tablet-post-project").classList.toggle("M-body-tablet-hover");
                document.getElementById("M-hover-menu-tablet-post-project").classList.toggle("M-hover-menu-tablet-hover");
                document.getElementById("M-menu-hover-tablet-post-project").classList.toggle("M-menu-hover-tablet-hover");
                document.getElementById("M-head-tablet-post-project").classList.toggle("M-head-tablet-hover");
            }
            function search_tablet() {
                document.getElementById("M-search-head-hover-tablet-post-project").classList.toggle("M-search-head-hover-tablet-hover");
                document.getElementById("M-head-tablet-post-project").classList.toggle("M-head-tablet-hover");
                document.getElementById("M-hover-search-tablet-post-project").classList.toggle("M-hover-search-tablet-hover");
                document.getElementById("img-close-tablet-post-project").classList.toggle("img-close-tablet-hover");
            }
            function menu_hover() {
                document.getElementById("M-body-tablet").classList.toggle("M-body-tablet-hover");
                document.getElementById("M-hover-menu-tablet").classList.toggle("M-hover-menu-tablet-hover");
                document.getElementById("M-menu-hover-tablet").classList.toggle("M-menu-hover-tablet-hover");
                document.getElementById("M-head-tablet").classList.toggle("M-head-tablet-hover");
            }
            function search_tablet() {
                document.getElementById("M-search-head-hover-tablet").classList.toggle("M-search-head-hover-tablet-hover");
                document.getElementById("M-head-tablet").classList.toggle("M-head-tablet-hover");
                document.getElementById("M-hover-search-tablet").classList.toggle("M-hover-search-tablet-hover");
                document.getElementById("img-close-tablet").classList.toggle("img-close-tablet-hover");
            }
            function G_click(){
                document.getElementById("G-downward").classList.toggle("G-downward-hover")
            }
            function G_click2(){
                document.getElementById("G-downward2").classList.toggle("G-downward-hover2")
            }
            function G_click3(){
                document.getElementById("G-downward3").classList.toggle("G-downward-hover3")
            }
            function G_click4(){
                document.getElementById("G-downward4").classList.toggle("G-downward-hover4");
            }
            function G_click5(){
                document.getElementById("G-downward5").classList.toggle("G-downward-hover5")
                document.getElementById("G-downward5").classList.toggle("G-downward-hover5");
            }
            function hover_project() {
                document.getElementById("M-body-ProjectEmployment-right-top-right").classList.toggle("M-body-ProjectEmployment-right-top-right-hover");
            }
            function hover_project_mobile() {
                document.getElementById("M-body-ProjectEmployment-right-top-right-mobile").classList.toggle("M-body-ProjectEmployment-right-top-right-mobile-hover");
            }
            function btn_menu_hover_head() {
                document.getElementById("off").classList.toggle("active");
            }
            function rewrite_slug(text){
                slug = text.toLowerCase()
                //Đổi ký tự có dấu thành không dấu
                slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                slug = slug.replace(/đ/gi, 'd');
                slug = slug.replace(/amp/gi, '');
                //Xóa các ký tự đặt biệt
                slug = slug.replace(/\`|\~|\!|\@|\#|\||\&|\$|\%|\^|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                //Đổi khoảng trắng thành ký tự gạch ngang
                slug = slug.replace(/ /gi, "-");
                //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                slug = slug.replace(/\-\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-/gi, '-');
                slug = slug.replace(/\-\-/gi, '-');
                //Xóa các ký tự gạch ngang ở đầu và cuối
                slug = '@' + slug + '@';
                slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                return slug;
            }
            $(document).ready(function(){
                $('#tinh-thanh').select2({
                    // placeholder: "Chọn tỉnh thành",
                    tags : true
                });
                $('#nganh-nghe').select2({
                    // placeholder: "Chọn ngành nghề",
                    tags : true
                });
                $('#tinh-thanh-tablet').select2({
                    // placeholder: "Chọn tỉnh thành",
                    tags : true
                });
                $('#nganh-nghe-tablet').select2({
                    // placeholder: "Chọn ngành nghề",
                    tags : true
                });
                $('.M-bodyhead-21 .search-box button').click(function(){
                    id_tinh_thanh = $('#tinh-thanh').select2('val');
                    id_nganh_nghe =  $('#nganh-nghe').select2('val');
                    keyword = $('#search_box_pc').val();
                //    alert(id_nganh_nghe);
                //    alert(id_tinh_thanh);
                    if (id_tinh_thanh !== "" && id_nganh_nghe !== "" && keyword === "") {
                        tinh_thanh = $('#select2-tinh-thanh-container').html();
                        nganh_nghe = $('#select2-nganh-nghe-container').html();
                        slugtt = rewrite_slug(tinh_thanh);
                        slugnn = rewrite_slug(nganh_nghe);
                        link_nn_tt = "tim-viec-lam-freelancer-" + slugnn + "-tai-" + slugtt + "-fln" + id_nganh_nghe + "-flt" + id_tinh_thanh + "-flc0"  + ".html";     
                        window.location.href = link_nn_tt;
                    }
                     if (id_tinh_thanh === "" && id_nganh_nghe !== "" && keyword === "") {
                        nganh_nghe = $('#select2-nganh-nghe-container').html();
                        slugnn = rewrite_slug(nganh_nghe);

                        link_nganh_nghe = "tim-viec-lam-freelancer-" + slugnn + "-fln" + id_nganh_nghe +  "-flc" + 0 +".html";     
                        window.location.href = link_nganh_nghe;
                    }
                    // alert(id_tinh_thanh);
                    // alert(id_nganh_nghe);
                    if (id_tinh_thanh !== "" && id_nganh_nghe === "" && keyword === "") {
                        tinh_thanh = $('#select2-tinh-thanh-container').html();
                        slugtt = rewrite_slug(tinh_thanh);
                        link_tinh_thanh = "/tim-viec-lam-freelancer-tai-" + slugtt + "-flt" + id_tinh_thanh  +  "-flc" + 0 + ".html";
                        window.location.href = link_tinh_thanh;   
                    }
                    if (id_tinh_thanh === "" && id_nganh_nghe === "" && keyword !== "") {
                        slugkey = rewrite_slug(keyword);
                        link_only_key = "/viec-lam-freelancer-flc0?keyword=" + slugkey;
                        window.location.href = link_only_key; 
                    }
                    if (id_tinh_thanh === "" && id_nganh_nghe !== "" && keyword !== "") {
                        slugkey = rewrite_slug(keyword);
                        link_only_key ="/viec-lam-freelancer-flc0?keyword=" + slugkey + "&category=" + id_nganh_nghe;
                        window.location.href = link_only_key; 
                    }
                    if (id_tinh_thanh !== "" && id_nganh_nghe === "" && keyword !== "") {
                        slugkey = rewrite_slug(keyword);
                        link_only_key = "/viec-lam-freelancer-flc0?keyword=" + slugkey + "&city=" + id_tinh_thanh;
                        window.location.href = link_only_key; 
                    }
                    if (id_tinh_thanh !== "" && id_nganh_nghe !== "" && keyword !== "") {
                        slugkey = rewrite_slug(keyword);
                        link_only_key = "/viec-lam-freelancer-flc0?keyword=" + slugkey + "&category=" +  id_nganh_nghe + "&city=" + id_tinh_thanh;
                        window.location.href = link_only_key; 
                    }
                  //  console.log(text);
                    //id -> 2 -> thiết kế -> thiet-ke -> tim-viec-lam-freelancer-thiet-ke-flc2.html -> window.location.href = /...
                        // window.location.href= "tim-viec-lam-freelancer-" + slug + "-flt" + id_thanh_pho + ".html";     
                    return false;
                });
        });