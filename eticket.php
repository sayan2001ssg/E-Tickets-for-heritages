<?php
// Start the session
session_start();
?>
<?php
if (isset($_POST['proceed'])) {

	$con = mysqli_connect("localhost","root","","eticket");
	$_SESSION['fname'] = $_POST['fname'];
	$_SESSION['lname'] = $_POST['lname'];
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['aadhar'] = $_POST['aadhar'];
	$_SESSION['place'] = $_POST['place'];
	$_SESSION['date'] = $_POST['visit'];
	$_SESSION['time'] = $_POST['time'];
	$_SESSION['ticketno'] = $_SESSION['aadhar'];


	if(!($con))
	{
		die("Error in connecting to database");
	} 
         
  else
	{
		$query="SELECT * FROM ticket WHERE aadhar='$_SESSION[aadhar]' and visit='$_SESSION[date]' and vtime = '$_SESSION[time]'";
		$run=mysqli_query($con,$query);
		if(mysqli_num_rows($run)>0)
		{
			echo "<script src='booked.js'></script>";
		}
		else
		{
	      $sql = "INSERT INTO `ticket` (`id`, `fname`, `lname`, `email`, `aadhar`, `place`, `visit`, `vtime`, `ticketno`) VALUES (UUID(), '$_SESSION[fname]', '$_SESSION[lname]', '$_SESSION[email]', '$_SESSION[aadhar]', '$_SESSION[place]', '$_SESSION[date]', '$_SESSION[time]', '$_SESSION[ticketno]');";  
	      $rs = mysqli_query($con, $sql);
	      if($rs)
	      {
	      	echo "<script src='redirect.js'></script>";
	      } 
		}
	}
	
	$query="SELECT id FROM ticket WHERE email='$_SESSION[email]' and visit='$_SESSION[date]'";
	$result = $con->query($query);
	if ($result->num_rows > 0)
	{
	  // output data of each row
	  while($row = $result->fetch_assoc())
	   {
	    $_SESSION['text'] = $row["id"];
	   }
    }

	mysqli_close($con);
}

if (isset($_POST['find'])) {

	$con = mysqli_connect("localhost","root","","eticket");
	
	$_SESSION['aadhar1'] = $_POST['faadhar'];
	$_SESSION['date1'] = $_POST['fvisit'];
	$_SESSION['time1'] = $_POST['ftime'];

	$query="SELECT id, fname, lname, place FROM ticket WHERE aadhar='$_SESSION[aadhar1]' and visit='$_SESSION[date1]' and vtime = '$_SESSION[time1]'";
	$result = $con->query($query);
	if ($result->num_rows > 0)
	{
	  // output data of each row
	  while($row = $result->fetch_assoc())
	   {
	    $_SESSION['text1'] = $row["id"];
	    $_SESSION['fname1'] = $row["fname"];
	    $_SESSION['lname1'] = $row["lname"];
	    $_SESSION['place1'] = $row["place"];
	   }
	   echo "<script src='redirectfqr.js'></script>";
  }
  else{
  	echo '<p style="color:red;">No record found.</p>';
  }
  mysqli_close($con);
 }
?>