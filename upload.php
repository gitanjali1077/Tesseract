<?php
session_start();
# specify your target directory to upload images
$target_dir = "D:/upload/";
$file_name=basename($_FILES["file"]["name"]);
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
unlink($target_file);
    echo "Sorry, file already exists.";
    
}
// Check file size
if ($_FILES["file"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
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
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

   
# Here specify path of uploaded file and path for the extracted text output file.
if($imageFileType == "jpg" ) {

 exec("c:\WINDOWS\system32\cmd.exe /c tesseract D:\upload\image.jpg D:\upload\Output.txt");
}
if( $imageFileType == "png")
{
exec("c:\WINDOWS\system32\cmd.exe /c tesseract D:\upload\image.png D:\upload\Output.txt");

}

if( $imageFileType == "tif"){
exec("c:\WINDOWS\system32\cmd.exe /c tesseract D:\upload\image.tif D:\upload\Output.txt");
}
if( $imageFileType != "gif" ){
exec("c:\WINDOWS\system32\cmd.exe /c tesseract D:\upload\image.gif D:\upload\Output.txt");
}
$_SESSION['response']=" Text has been extracted from the image.";
header("Location:image_to_text.php");
?>
