<?php
// Start the session
session_start();

$message = $_SESSION['text'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="qr.css">
</head>
<body>
	<p>
		<h2>
		<?php
			print "Hello ";
			print $_SESSION['fname'];
			print " ";
			print $_SESSION['lname'];
		?>
		</h2>		
	</p>
	<p id="qr-result"><h3>This QR Code is your ticket. Please save it for later purpose.</h3>
	<canvas id="qr-code"></canvas><br>
		<?php
		echo "<h2>Name: ", $_SESSION['fname'], " ", $_SESSION['lname'], "</h2>" ;
		echo "<strong>Place: </strong>", $_SESSION['place'], "<br>", "<strong>Date: </strong>", $_SESSION['date'], "<br>", "<strong>Entry Time: </strong>", $_SESSION['time'];
		?><br><br>
		<button onclick="download()">Download Ticket</button>
	</p>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>
	<script>
			/* JS comes here */
			var qr;
			(function() {
                    qr = new QRious({
                    element: document.getElementById('qr-code'),
                    size: 200,
                    value: '<?php echo $message;  ?>'
                });
            })();
            function download()
            {
				var link = document.createElement('a');
				link.download = 'ticket.png';
				link.href = document.getElementById('qr-code').toDataURL()
				link.click();
			}           
 	</script>
</body>
</html>

<?php
//remove all session variables
session_unset();

// destroy the session
session_destroy();
?>