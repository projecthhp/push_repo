<?php
	try {
		$conn = new PDO("mysql:host=:8891;dbname=viec365_tv365com;charset=utf8","root","");
	}catch (PDOException $e){
		echo "Lỗi";
	}
?>