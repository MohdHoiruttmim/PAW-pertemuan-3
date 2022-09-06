<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Image</title>
</head>
<style>
  form {
    display: flex;
    flex-direction: column;
  }
  input {
    width: fit-content;
  }
  input[type="submit"] {
			color: #ffffff;
			background-color: #2d63c8;
			font-size: 19px;
			border: 1px solid #2d63c8;
			padding: 7px 50px;
			cursor: pointer;
      margin: 10px 0;
      border-radius: .5rem;
		}
</style>
<body>
  <h1>Masukan gambar: </h1>
  <form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="usr_img">
    <input type="submit" value="Upload" name="submit">
  </form>
  <?php
    if (isset($_POST['submit'])){
      $img_tmp_name = $_FILES['usr_img']['tmp_name'];
      $img_size = $_FILES['usr_img']['size'];
      $name = basename($_FILES["usr_img"]["name"]);
      $ext = array("jpg", "jpeg", "png");

      $file_path = 'img/'.$name;

      $file_ext_proc = explode(".",$_FILES['usr_img']['name']);
      $file_ext = end($file_ext_proc);
      
      if ($img_size > 1000000){
        echo "gambar tidak boleh lebih dari 1mb";
        return;
      }
      if (!in_array($file_ext, $ext)){
        echo "mohon masukan format yang benar";
        return;
      }
      move_uploaded_file($img_tmp_name, $file_path);
    }
  ?>

  <img src="<?php echo "./img/".$name ?>">
</body>
</html>