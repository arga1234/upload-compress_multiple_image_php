<?php
$jumlah = count($_FILES['foto']['name']);
		if ($jumlah > 0) {
			for ($i=0; $i < $jumlah; $i++) {
        $quality=$_POST['quality'];
        $dir ="upload/";
				$file_name = $_FILES['foto']['name'][$i];
				echo $file_name;
				$tmp_name = $_FILES['foto']['tmp_name'][$i];
        $target = $dir.$file_name;
        move_uploaded_file($tmp_name, $target);
			}
		}

?>
