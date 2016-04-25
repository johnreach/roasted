<?php
  $uploadDirectory   = "uploads/";
  $origName          = basename($_FILES["fileToUpLoad"]["name"] );
  $uploadOk          = false;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  if(isset($_POST["submit"]))
  {
    $check = getimagesize($_FILES["fileToUpLoad"]["tmp_name"]);

    if($check !== false)
    {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = true;
    }
    else 
    {
      echo "File is not an image.";
    }
  }

    //save info, check to make sure its a jpg image
    // Check file size
  if ($_FILES["fileToUpload"]["size"] > 1000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = false;
  } 
// Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
     && $imageFileType != "gif" ) 
  {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = false;
  }
    // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == false) 
  {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } 
  if ($uploadOk)
  {
    $localName = hash_file('sha256', $_FILES["fileToUpLoad"]["tmp_name"]);
    $localPath = $uploadDir . $localName;

    if (!file_exists($localPath))
    {
      if(move_uploaded_file($_FILES["fileToUpLoad"]["tmp_name"])), $localPath))
      {
        echo "The file " . $origName . " has been uploaded.";
      }
      else 
      {
        echo "There was an error uploading the file"
      }
    }
  }


 ?>
