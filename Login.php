<?php
$conn = new mysqli("localhost","root","","busser");
$login = FALSE;
$inc = FALSE;
$nouser = FALSE;

if(! get_magic_quotes_gpc()){
	$rno = addslashes($_POST['RNo']);
	$username = addslashes($_POST['Username']);
	$password = addslashes($_POST['Password']);
}

else{	
	$rno = $_POST['RNo'];
	$username = $_POST['Username'];
	$password = $_POST['Password'];
}
$sql = "SELECT userid, username, password FROM users";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc())
	{
	if($row["username"]== $username || $row["userid"] == $rno)
	{
		if($row["password"]== $password)
		{
			$login = TRUE;
			break;
		}	
		else 
		{
			$inc = TRUE;
			break;
	}
	}
	else{
		$nouser = TRUE;
	}
	}
if ($login )
{
	echo "login sucessful";
}
else if ($inc)
{	
	echo "incorrect password";}

else
{
echo "no user exist";}
}
 else {
    echo "0 results";
}
$conn->close();
?>