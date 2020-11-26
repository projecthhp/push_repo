<?php
$target_dir = "../public/images/";
$target_file = $target_dir . basename($_FILES["file_image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["file_image"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "Tệp này không phải hình ảnh.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file này đã tồn tại.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["file_image"]["size"] > 100000) {
  echo "Sorry, tệp của bạn quá lớn so với quy định.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, tải không thành công.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["file_image"]["tmp_name"], $target_file)) {
    echo "Bạn ". htmlspecialchars( basename( $_FILES["file_image"]["name"])). " đã upload thành công.";
  } else {
    echo "Sorry, đã xẩy ra lỗi khi tải lên.";
  }
}
?>