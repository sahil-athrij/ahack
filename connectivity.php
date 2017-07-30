 <?php
 
 $conn = new mysqli("localhost","root","","busser");
 



if(! get_magic_quotes_gpc()){
	$rno = addslashes($_POST['RNo']);
	$username = addslashes($_POST['Username']);
	$password = addslashes($_POST['Password']);
	$type = addslashes($_POST['type']);
}
else{	
	$rno = $_POST['RNo'];
	$username = $_POST['Username'];
	$password = $_POST['Password'];
	$type = $_POST['type'];
}
 $sql = "INSERT INTO users(userid,username,password,type) VALUES('$rno','$username','$password','$type')";
 if($conn->query($sql) ==TRUE) {
echo "Your registration was successful";
}
else
{
echo "error";
}


 ?> 
</html>