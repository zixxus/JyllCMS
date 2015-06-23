<?php
class ImageUploadExt{
    function __construct()
    {
        parent::__construct();
    }

    public function test(){
        echo 'test';
    }

    public static function resized($image)
    {
        $filename = $image;
        $percent = 0.01;

// Content type
        header('Content-Type: image/jpeg');

// Get new sizes
        list($width, $height) = getimagesize($filename);
        $newwidth = $width * $percent;
        $newheight = $height * $percent;

// Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($filename);

// Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

// Output
        imagejpeg($thumb);
    }
    
public function image_upload(){
	
	
	$imageFileType = pathinfo($_FILES['zdjecie']['name'],PATHINFO_EXTENSION);
$randomname = ImageUploadExt::generateRandomString(30);
    $link = $randomname.'.'.$imageFileType;
    $target_file = "image/".$link;
    $uploadOk = 1;
// Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["zdjecie"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            exit;
            $uploadOk = 0;
        }
    }
// Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        exit;
        $uploadOk = 0;
    }
// Check file size
    if ($_FILES["zdjecie"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        exit;
        $uploadOk = 0;
    }
// Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {


        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        exit;
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        exit;
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["zdjecie"]["tmp_name"], $target_file)) {
//            ImageUploadExt::resized($link);
            echo "The file ". basename( $_FILES["zdjecie"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit;
        }
    }

  $data['uploadOk'] = $uploadOk;
  $data['link'] = $link;
return  $data;

}

    private function generateRandomString($length = 10) {
    	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    	$charactersLength = strlen($characters);
    	$randomString = '';
    	for ($i = 0; $i < $length; $i++) {
    		$randomString .= $characters[rand(0, $charactersLength - 1)];
    	}
    	return $randomString;
    }
}
?> 