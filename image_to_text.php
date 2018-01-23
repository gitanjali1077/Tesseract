<?php
session_start();
if(isset($_SESSION['out']))
{
    echo $_SESSION['out'];
}
if(isset($_SESSION['response']))
{

    ?>
    <h2 style=" color:black;font-size:140%;text-align:center;font-family: cursive;padding:3%"><b><?php echo $_SESSION["response"];?></b></h2>
    <?php session_destroy();
}



?>
<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <title>OCR - Image to Text</title>
	<meta name="author" content="">
    
   <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">
  
 </script>

   <style>
.container{
padding-left:0%;
}
#myform{
border:solid 1px;
border-radius:5px;
padding :5%;
}
    </style>
   </head>
<body>
<div class="container">
 <div class="jumbotron">
  <h2>My OCR</h2>
<p>Upload the image with name 'image' like image.png  here.Output file would be created at the destination directory specified in the upload file.</p>
  </div>
 <form method="post" action="upload.php" enctype="multipart/form-data"id="myform">
<label>Select File:</label>
<input type="file" id ="file" name ="file" class="btn btn-primary"><br>
<input type="submit" id="submit" name="submit"class="btn btn-primary" >

</form>
</div>
</body>
</html>