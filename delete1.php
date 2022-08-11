<?php
// Start the session
session_start();
?>
<?php
if (isset($_POST['proceed'])) {

	$con = mysqli_connect("localhost","root","","eticket");
	$_SESSION['delaa'] = $_POST['caadhar'];
	$_SESSION['dov'] = $_POST['cvisit'];
	$_SESSION['slot'] = $_POST['ctime'];


	if(!($con))
	{
		die("Error in connecting to database");
	} 
         
  else
	{
		$query="SELECT * FROM ticket WHERE aadhar='$_SESSION[delaa]' and visit='$_SESSION[dov]' and vtime = '$_SESSION[slot]'";
		$run=mysqli_query($con,$query);
		if(mysqli_num_rows($run)>0)
		{
			$query="DELETE FROM ticket WHERE aadhar='$_SESSION[delaa]' and visit='$_SESSION[dov]' and vtime = '$_SESSION[slot]'";
			$run=mysqli_query($con,$query);
			echo "<center><b><h1>Your booking has been CANCELLED successfully</h1></b></center>";
		}
		else{
			echo "<center><b><h1>NO RECORD PRESENT USING THAT DATA.</h1></b></center>";
		}
	}
}
?>