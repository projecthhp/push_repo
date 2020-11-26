<?

include("config.php"); 

// $url_default = "https://timviec365.vn/tim-ung-vien-quanh-day.html";

// $db_qrr = new db_query("SELECT * FROM tbl_module WHERE module = '".$url_default."'");
// $rowseo = mysql_fetch_assoc($db_qrr->result);

// $title = $rowseo['meta_title'];
// $description =  $rowseo['meta_des'];
// $keyword =  $rowseo['meta_key'];
// $h1 = $rowseo['h1'];

// $urls = array(
// "/images/no-image.png",
// );
// $gt = $rowseo['sapo'];


// $address = '35 Định Công, Hoàng Mai, Hà Nội'; /* Address*/
// $apiKey = 'AIzaSyAAST1E-FNKS63lFsvbT0yIeYocvkC2w1w';
// $geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false&key='.$apiKey);

?>
<?php 
  $isSearchaAround = 1;
  $client  = @$_SERVER['HTTP_CLIENT_IP'];
  $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
  $remote  = $_SERVER['REMOTE_ADDR'];

  $ipaddress='';
  if(filter_var($client, FILTER_VALIDATE_IP)){
    $ipaddress = $client;
  }
  elseif(filter_var($forward, FILTER_VALIDATE_IP)){
    $ipaddress = $forward;
  }
  else{
    $ipaddress = $remote;
  }

//$loc = file_get_contents('http://ip-api.com/json/'.$ipaddress);
// $record = json_decode($loc);

  $ipcode = new db_query('SELECT cit_id,cit_name FROM city WHERE cit_name= "Hà Nội"');
  $qr = mysql_fetch_assoc($ipcode->result);
  $ipcode = $qr['cit_id'];
  $ipname = $qr['cit_name'];
  $map_add = '';
  if(isset($_COOKIE['UID'])){
    if($_COOKIE['UT']==0){
      $qr_user = new db_query('SELECT address FROM user WHERE use_id='.$_COOKIE['UID']);
      $use_address = mysql_fetch_assoc($qr_user->result)['address'];
    }else{
      $qr_user = new db_query('SELECT usc_address FROM user_company WHERE usc_id='.$_COOKIE['UID']);
      $use_address = mysql_fetch_assoc($qr_user->result)['usc_address'];
    }
    if($use_address!=''){
      $ipname = $use_address;
    }
  }

  function get_infor_from_address($address) {
    $prepAddr = str_replace(' ', '+', remove_accent($address));
    $geocode = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$prepAddr.'&key=AIzaSyAqeAsCbvQu4g3Vkhi_FWU7sbn_BbJygyk');
    $output = json_decode($geocode);
    return $output;
  }
  //Get map theo API
  $addr = get_infor_from_address($ipname);

  $getcity = new db_query("SELECT cit_id,cit_name FROM city ");


  $getcate = new db_query("SELECT cat_id,cat_name FROM category");

  ?>
<!DOCTYPE html>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 <title>Tìm việc làm quanh đây</title>
 <meta name="keywords" content="<?= $keyword ?>" />
 <link rel="canonical" href="<?= $url_default ?>"/>

 <meta name="robots" content="noindex,nofollow"/>

 <meta http-equiv="content-language" itemprop="inLanguage" content="vi"/>   
  <meta name="viewport" content="height=device-height,width=device-width,initial-scale=1.0,maximum-scale=1.0, user-scalable=no"/>
  <link rel="stylesheet" href="/css/font-awesome.min.css" media='all' onload="if(media!='all')media='all'">
  <link rel="stylesheet" href="/css/style.min.css?v=<?= $version ?>" media='all' onload="if(media!='all')media='all'">
  <script>
    (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PQGTCFD');</script>


 <style type="text/css">

#map .title .diadiem, .company {   width: 250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
  .changecv , .changecvcss{
    position: absolute;
    right: 0;
    top: 66px;
  }
  .changecvcss{
    width: 228px;
    background: #fff;
    color: #2e6da4;
    overflow: hidden;
    text-overflow: ellipsis;
    border: 1px solid #2e6da4;
  }
  .changecvcss:hover {
    color: unset;
    background-color: unset;
    border-color: unset;
  }
  .openfrmchange{
    position: absolute;
    top: 106px;
    right: 63px;
  }
  .changecv{  display: none !important;}
  #show_infor{
    vertical-align: top;
  }
  .info-more .custom-control label[for="customSwitch1"]{
    color: red;
  }
  .gm-style .gm-style-iw-c{
    padding:10px;
  }
  .map-img{
    width: 130px;
    height: auto;
    float:left;
    text-align: center;
  }
  .img_cate{
    width: 100%;

float: left;
    padding-left: 10px;
    position: relative;
  }
.img_cate img{
    margin: auto; 
    left: 0;
    right: 0; 
  }
  .gm-style img{
    border-radius: 5px;
    width: 100%;
  }
  .map_if{
    min-width: 370px;
  max-width: 450px; 
    text-decoration: none;
    font-size: 16px;
    float: right;
    padding-left: 10px;
  }
  #map-vl .title a {
      margin: 0;
      background: unset;
      width: 100%;
      box-shadow: unset;
      color: #000;
      text-align: left;
      height: auto;
      line-height: unset;
      font-size: 18px;
  }
  #map-vl .title a:hover,#map-vl .hp a:hover{
    color: #F89700;
  }
  .box_search{
    margin-left: 0;
  }
  #map-vl .title{
      width: 100%;
      margin:0;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
  }
  @media screen and (max-width: 600px){
    .mkr .viewed{
      right: 0px;
    }
  }
  @media screen and (max-width: 900px){
    #page-map .ir{
      width: 100%;
    }
  }
</style>
</head>
<body id="search_around">
  <header>
    <? include('../includes/inc_header.php'); ?>
    <div id="banner">
      <? if(!$detect->isTablet() && !$detect->isMobile()) include('../includes/inc_search_around.php') ?>
      <p class="taingay text-center">Tải ngay ứng dụng timviec365 và cv365+ trên điện thoại để trải nghiệm tốt nhất</p>
      <div class="text-center"> 
        <a class="downLoad_App Timviec365" href=""><i class="icon"></i>Tải app Timviec365</a>
        <a class="downLoad_App CV365" href=""><i class="icon"></i>Tải app CV365</a>
      </div>
    </div>
      </header>
  <div id="map-vl">
    <p class="td">tìm việc làm quanh đây</p>
    <section id="bgcat" style="background: #ffffff;margin-bottom: 50px;">    
      <div class="sa-tab-contai" id="tab2" style="display: block;float: left">              
      <div class="swap-map">      
        <!-- <img id="note" src="images/map/note.jpg" alt="map"> -->
        <div id="map" style="width: 100%;float: left; height: 650px"></div>      
      </div>
    </section>
  </div>
  <? 
  include('../includes/inc_footer.php');
  include('../includes/inc_script_footer.php');
?>
  <script type="text/javascript">
//<![CDATA[

var customIcons = {  
  icon1: {
    icon: '/images/map/boy.png'
  },
  icon2: {
    icon: '/images/map/girl.png'
  },
  icon3: {
    icon: '/images/map/nosex.png'
  },
  icon4: {
    icon: '/images/map/timviec.png'
  },
  icon11: {
    icon: '/images/map/boy1.png'
  },
  icon21: {
    icon: '/images/map/girl1.png'
  },
  icon31: {
    icon: '/images/map/nosex1.png'
  },
};

var markerGroups = { "icon1": [], "icon2": [], "icon3": [],"icon4": [], "icon11": [], "icon21": [], "icon31": []};

function mapByAdress(){
  var address = document.getElementById('keyword').value;
  if(address==''){
    //alert('Bạn chưa nhập địa bạn muốn tìm kiếm gần đó');
    alert('Vui lòng nhập vị trí của bạn để kết quả hiển thị chính xác nhất');
    document.getElementById('keyword').focus();
    document.getElementById('keyword').classList.add('error');
    return false;
  }else{
    document.getElementById('keyword').removeAttribute("style");
    var d = new Date();
    d.setTime(d.getTime() + (1*24*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie =  "address =" + address + ";" + expires + ";path=/";    
    //updateLatLng();
    initMap();
  }
}

function initMap() {    
  var kms = document.getElementById('index_km');
  var km = kms.options[kms.selectedIndex].value;
  if(km==0){
    var met = 2000;
    km = 2;
  }else{
    var met =  km*1000;  
  }

  var valat = document.getElementById('lat').value;
  var valng = document.getElementById('long').value;  
  //var address = document.getElementById('address').value;  

  var myLatlng = new google.maps.LatLng(valat,valng);
  var mapOptions = {
    zoom: 14,
    center: myLatlng,
    styles: [
    {
      "featureType": "administrative",
      "elementType": "geometry",
      "stylers": [
      {
        "visibility": "off"
      }
      ]
    },
    {
      "featureType": "poi",
      "stylers": [
      {
        "visibility": "off"
      }
      ]
    },
    {
      "featureType": "road",
      "elementType": "labels.icon",
      "stylers": [
      {
        "visibility": "off"
      }
      ]
    },
    {
      "featureType": "transit",
      "stylers": [
      {
        "visibility": "off"
      }
      ]
    }
    ]
  }
  var map = new google.maps.Map(document.getElementById("map"), mapOptions);

  var geocoder = new google.maps.Geocoder();
  geocodeAddress(geocoder, map, met);

  var infoWindow = new google.maps.InfoWindow;  

  var job = document.getElementById('fts_id').value;

  var citys = document.getElementById('index_dia_diem');
  var code = citys.options[citys.selectedIndex].value;  

  var cates = document.getElementById('index_nganh_nghe');
  var cate = cates.options[cates.selectedIndex].value;   

  if(job != '' || cate > 0 || km > 0){
    if(job!=''){
      var url = "home/rasu_map_vl.php?code=" + code + '&lat=' + valat + '&long=' + valng + "&job=" + job + "&cate=" + cate + '&km=' + km;
    }else{
      var url = "home/rasu_map_vl.php?code=" + code + '&lat=' + valat + '&long=' + valng + "&cate=" + cate + '&km=' + km;
    }
  }else{    
    var url = "home/rasu_map_vl.php?code=" + code + '&lat=' + valat + '&long=' + valng + '&km=2';    
  }      
  console.log(url);



  downloadUrl(url, function(data) {   
    var xml = data.responseXML;  

    if(xml!=null){       
      var markers = xml.documentElement.getElementsByTagName("marker");  
      console.log(markers.length);
      for (var i = 0; i < markers.length; i++) {    
        var cv_title = markers[i].getAttribute("cv_title");
        var price = markers[i].getAttribute("price");
        var image = markers[i].getAttribute("image");
        var name = markers[i].getAttribute("name");
        var link = markers[i].getAttribute("link");
        var exp = markers[i].getAttribute("exp");
        var type = markers[i].getAttribute("type");
        var loaihinh = markers[i].getAttribute("loaihinh");
        var capnhat = markers[i].getAttribute("capnhat");
        var viewed = markers[i].getAttribute("viewed");
        var point = new google.maps.LatLng(
          parseFloat(markers[i].getAttribute("lat")),
          parseFloat(markers[i].getAttribute("lng")));
        var html = '<div class="mkr"><div class="map-img"><div class="img_cate"><img src="'+ image +'" alt="' + cv_title + '"></div>';
        if(viewed==1){
          html += '<span class="viewed">Đã xem</span>'; 
        }        
        html += '</div><div class="map_if"><p class="title"><a href="'+ link + '">' + cv_title + '</a></p><p class="company">' + name + '</p><p class="price"><strong>Mức lương:</strong> <span class="text-red">' + price  + '</span></p><p class="kinhnghiem"><strong>Kinh nghiệm:</strong> '+ exp +'</p>';        
        html += '<p class="hinhthuc"><strong>Hình thức làm việc:</strong> ' + loaihinh  + '</p>';
        html += '<p class="hp"><strong>Hồ sơ cập nhật ngày:</strong> ' + capnhat  + '</p>';
        html += '<a class="btn-button" href="'+ link + '">Xem chi tiết</a></div></div>';        
        if(viewed==1){
          type = type + viewed;
        }        
        var icon = customIcons[type] || {};           
        var marker = new google.maps.Marker({
          map: map,
          position: point,
          icon: icon.icon
          /*shadow: icon.shadow*/
        });        

        // markerGroups[type].push(marker);
        bindInfoWindow(marker, map, infoWindow, html);
      }
    }else{        
      alert('Vui lòng mở rộng phạm vi tìm kiếm!!');
      return false;      
    }
  });
}

function bindInfoWindow(marker, map, infoWindow, html) {
  google.maps.event.addListener(marker, 'click', function() {
    infoWindow.setContent(html);
    infoWindow.open(map, marker);
  });
}

function downloadUrl(url, callback) {
  var request = window.ActiveXObject ?
  new ActiveXObject('Microsoft.XMLHTTP') :
  new XMLHttpRequest;

  request.onreadystatechange = function() {
    if (request.readyState == 4) {
      request.onreadystatechange = doNothing;
      callback(request, request.status);
    }
  };

  request.open('GET', url, true);
  request.send(null);
}

function doNothing() {}

function toggleGroup(type) {
  for (var i = 0; i < markerGroups[type].length; i++) {
    var marker = markerGroups[type][i];
    if (!marker.getVisible()) {
      marker.setVisible(true);      
    } else {
      marker.setVisible(false);      
    }
  }
}
function geocodeAddress(geocoder, resultsMap, met) {
  var address = document.getElementById('keyword').value;
  if(address==''){
    address = '<?php echo $ipname; ?>';
  }else{
    var citys = document.getElementById('index_dia_diem');
    var city = citys.options[citys.selectedIndex].text;  
    address += ',' + city;
  }
  geocoder.geocode({'address': address}, function(results, status) {
    if (status === 'OK') {
      resultsMap.setCenter(results[0].geometry.location);      
      var marker = new google.maps.Marker({
        map: resultsMap,
        position: results[0].geometry.location,
        icon: '/images/map/local.png'
      });
      // Add circle overlay and bind to marker
      var circle = new google.maps.Circle({
        map: resultsMap,
        radius: met,
        fillColor: '#1abc9c',
        strokeColor: '#1abc9c',
        fillColor: '#1abc9c',
        strokeOpacity: 0.25,
        strokeWeight: 1,
        fillOpacity: 0.15
      });
      circle.bindTo('center', marker, 'position');
      resultsMap.fitBounds(circle.getBounds());
    }else {
      alert('Không tìm thấy vị trí bạn nhập: ' + status);
    }
  });
}
function updateLatLng() {
  var geocoder = new google.maps.Geocoder();
  var address = document.getElementById('keyword').value;
  if(address==''){
    address = '<?php echo $ipname; ?>';
  }else{
    var citys = document.getElementById('index_dia_diem');
    var city = citys.options[citys.selectedIndex].text;  
    address += ',' + city;
  }
  geocoder.geocode({'address': address}, function(results, status) {
    if (status === 'OK') {      
      document.getElementById('lat').value = results[0].geometry.location.lat();
      document.getElementById('long').value = results[0].geometry.location.lng();  
    }
  });
}

//]]>
</script>  
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqeAsCbvQu4g3Vkhi_FWU7sbn_BbJygyk&callback=initMap" type="text/javascript" async defer></script>



<script type="text/javascript">
  $(document).ready(function(){
    width = $(window).width();
    widthSl = "20%";
    if(width <= 1024){
      widthSl = "100%";
    }

    $('#index_nganh_nghe,#index_km,#index_dia_diem').select2({
      width: widthSl
    });
    $('#btn_map_mb').click(function(){
      if($('#page-map .main_search').hasClass('open')){
        $('#page-map .main_search').removeClass('open');
      }else{
        $('#page-map .main_search').addClass('open');
      }
    });
    $('#btn_map').click(function(){
      $('#page-map .main_search').removeClass('open');
    });


  });
  img = $('.gm-style img');
    img.attr('onerror','this.onerror=null;this.src="/images/no-image.png";');
</script>

</body>
</html>
