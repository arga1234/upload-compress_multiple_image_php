<?php
include 'koneksi.php';
$jumlah = count($_FILES['foto']['name']);
		if ($jumlah > 0) {
			for ($i=0; $i < $jumlah; $i++) {
        $quality=50;
				$width=1280;
        $new_name='upload'.date('Y-m-d H-i-s');
        $dir ="Photo/";
				$file_name = $_FILES['foto']['name'][$i];
        echo $file_name;
				$tmp_name = $_FILES['foto']['tmp_name'][$i];
        $target = $dir.$file_name;
				mysqli_query($db,"INSERT INTO gambar VALUES('','','$file_name')");
        move_uploaded_file($tmp_name, $target);
        $info = getimagesize($target);
        if ($info['mime'] == 'image/jpeg'){
            $image = imagecreatefromjpeg($target);
   					$src_width = imageSX($image);
   					$src_height = imageSY($image);
						$dst_width = $width;
						$dst_height = ($dst_width/$src_width)*$src_height;
						$im = imagecreatetruecolor($dst_width,$dst_height);
   					imagecopyresampled($im, $image, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
            $ext='.jpg';
        }
        elseif($info['mime'] == 'image/gif'){
            $image = imagecreatefromgif($target);
						$src_width = imageSX($image);
						$src_height = imageSY($image);
						$dst_width = $width;
						$dst_height = ($dst_width/$src_width)*$src_height;
						$im = imagecreatetruecolor($dst_width,$dst_height);
						imagecopyresampled($im, $image, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
            $ext='.gif';
        }elseif($info['mime'] == 'image/png'){
            $image = imagecreatefrompng($target);
						$src_width = imageSX($image);
						$src_height = imageSY($image);
						$dst_width = $width;
						$dst_height = ($dst_width/$src_width)*$src_height;
						$im = imagecreatetruecolor($dst_width,$dst_height);
						imagecopyresampled($im, $image, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
            $ext='.png';
        }

        if(imagejpeg($im, $dir.$file_name.$ext, $quality)){
            unlink($target);
        }else{
            unlink($target);
        }
			}
		}

?>
