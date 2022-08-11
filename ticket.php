<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Culture and Heritage ETicketing</title>
	
	<link rel="stylesheet" type="text/css" href="index.css">

</head>
<body>
	<h1>
		<center>Welcome to E-Ticket for MONUMENTS and HERITAGES of India.</center>
	</h1>
	<div class="row">
		<div class="column">
			<p>Enter the Details to book your ticket.</p>
			<form action="ticket.php" method="post">
				<label for="fname">First name:</label><br>
				<input type="text" id="fname" name="fname" required><br>

				<label for="lname">Last name:</label><br>
				<input type="text" id="lname" name="lname" required><br>

				<label for="email">Enter your email:</label><br>
				<input type="email" id="email" name="email" required><br>

				<label for="aadhar">Enter your AADHAR number: (without spaces)</label><br>
				<input type="aadhar" id="aadhar" name="aadhar" minlength="12" maxlength="12" required><br>

				<label for="place">Select the monument you want to visit:</label><br>
				<select name="place" id="place">
			    <option value="TM">Taj Mahal</option>
			    <option value="VM">Victoria Memorial</option>
			    <option value="GT">Golden Temple</option>
			    <option value="QM">Qutub Minar</option>
			    <option value="MP">Mysore Palace</option>
			    <option value="LT">Lotus Temple</option>
			  </select><br>

				<label for="visit">Date of Visit:</label><br>
				<input type="date" id="visit" name="visit" min="<?= date('Y-m-d'); ?>" required><br>

				<label for="time">Choose your time slot:</label><br>
			  <input type="time" id="time" name="time" min="09:00" max="19:00" step="3600" required>

				<br><br>
				
				<button type="submit" name="proceed">Proceed</button>
				<input type="reset">
			</form>
		</div>

		<div class="column">
				<p>Find Your Ticket.</p>
				<form action="ticket.php" method="post">
					<label for="faadhar">Enter your AADHAR number: (without spaces)</label><br>
					<input type="faadhar" id="faadhar" name="faadhar" minlength="12" maxlength="12" required><br>

					<label for="fvisit">Date of Visit:</label><br>
					<input type="date" id="fvisit" name="fvisit" min="<?= date('Y-m-d'); ?>" required><br>

					<label for="ftime">Time slot choosen</label><br>
				  <input type="time" id="ftime" name="ftime" min="09:00" max="19:00" step="3600" required>
				  <br><br>

				  <button type="submit" name="find">Find</button>
					<input type="reset">

				</form>
				<span id="msg"></span>
		</div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>
			
	<script type="text/javascript" src="eticket.js"></script>

	<?php include 'eticket.php'; ?>

</body>
</html>

