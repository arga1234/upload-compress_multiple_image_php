<?php

if($_POST['proses']){

    $file=$_FILES['foto']['name'];
    if(!empty($file)){
        $direktori="upload/"; //tempat upload foto
        $name='foto'; //name pada input type file
        $namaBaru='upload'.date('Y-m-d H-i-s'); //name pada input type file
        $quality=$_POST['quality']; //konversi kualitas gambar dalam satuan %

        //jalankan fungsi
        if(UploadCompress($namaBaru,$name,$direktori,$quality)){
            echo'sukses';
        }else{
            echo'gagal';
        }
    }
}
?>

<?php
function UploadCompress($new_name,$file,$dir,$quality){
  //direktori gambar
  $vdir_upload = $dir;
  $vfile_upload = $vdir_upload . $_FILES[''.$file.'']["name"];

  //Simpan gambar dalam ukuran sebenarnya
  $file_name= $_FILES[''.$file.'']["name"];
  $source_url=$dir.$file_name;
  move_uploaded_file($_FILES[''.$file.'']["tmp_name"], $source_url);

  $info = getimagesize($source_url);

    if ($info['mime'] == 'image/jpeg'){
        $image = imagecreatefromjpeg($source_url);
        $ext='.jpg';
    }
    elseif($info['mime'] == 'image/gif'){
        $image = imagecreatefromgif($source_url);
        $ext='.gif';
    }elseif($info['mime'] == 'image/png'){
        $image = imagecreatefrompng($source_url);
        $ext='.png';
    }

    if(imagejpeg($image, $dir.$new_name.$ext, $quality)){
        unlink($source_url);
        return true;
    }else{
        unlink($source_url);
        return false;
    }

}
?>
