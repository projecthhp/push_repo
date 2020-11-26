<?php
include '../phpqrcode/qrlib.php'; 

class GenQR{

    public function gen_qr($id_new,$id_ntd,$url_new)
    {
        $result = array('data' => null, 'kq' => false);
        // $text variable has data for QR  
        $text = $url_new;

        // $path variable store the location where to  
        // store image and $file creates directory name 
        // of the QR code file by using 'uniqid' 
        // uniqid creates unique id based on microtime 
        $img_qr = "../upload/qr/new/ntd_".$id_ntd."/".$id_new.".png";
        $path = "../upload/qr/new/ntd_".$id_ntd."/";
        if (!file_exists($path)) {
            is_dir($path) || @mkdir($path,0777,true) || die("Can't Create folder");
        }
        if (file_exists($img_qr)){
            return json_encode($result);
        }
        $file = $path . $id_new . ".png";

        // $ecc stores error correction capability('L') 
        $ecc = 'L';
        $pixel_Size = 10;
        $frame_Size = 10;

        // Generates QR Code and Stores it in directory given 
        QRcode::png($text, $file, $ecc, $pixel_Size, $frame_Size);

        // Displaying the stored QR code from directory 
        // echo "<center><img src='" . $file . "'></center>";
        $result = array('data' => $file, 'kq' => true);
        return json_encode($result);
    }
}
?>