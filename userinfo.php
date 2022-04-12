<?php

$conn = mysqli_connect('localhost','root');

if($conn){
  echo "connection successfull";
}else{
  echo "no connection available";
  
}
mysqli_select_db($conn, 'harshuserdata');

$user = $_POST['user'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$comment = $_POST['comment'];

$query = "insert into userinfrodata (user, email, mobile, comment) values('$user','$email','$mobile','$comment')";

echo "$query";
mysqli_query($conn,$query);

header('location:index.php');


?>