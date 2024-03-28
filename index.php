<?php 

if(isset($_POST['submit'])){
	$fname=$_POST['name'];
	$emailid=$_POST['email'];
	$phonenumber=$_POST['phonenumber'];
	$bookingdate=$_POST['bookingdate'];
	$bookingdate = date('Y-m-d', strtotime($bookingdate));
	$bookingtime=$_POST['bookingtime'];
	$noadults=$_POST['noofadults'];
	$nochildrens=$_POST['noofchildrens'];
	$bno=mt_rand(100000000,9999999999);
	$con=mysqli_connect("127.0.0.1","root","","rtbsdb");
	if(empty($fname) || empty($emailid) || empty($phonenumber) ) {
		echo "<p>Empty Form Submitted</p>";
	} else {
		$query=mysqli_query($con,"insert into tblbookings(bookingNo,fullName,emailId,phoneNumber,bookingDate,bookingTime,noAdults,noChildrens) values('$bno','$fname','$emailid','$phonenumber','$bookingdate','$bookingtime','$noadults','$nochildrens')");
		if($query){
			echo '<p>Your order sent successfully. Booking number is ' . $bno . '</p>';
		} else {
			echo '<p>Something went wrong. Please try again.</p>';
		}
	}

}
?>
<html lang="en">
<head>
	<title>Restaurent Table Booking System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content=""
	/>
	<script type="application/x-javascript">
		addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
	</script>

	<link href="css/style.css" rel='stylesheet' type='text/css' media="all">
	<link rel="stylesheet" href="css/jquery-ui.css" />
	<link href="css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />
	<link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
</head>

<body>
	<h1 class="header-w3ls">Table Booking Form</h1>
	<div class="appointment-w3">
		<form action="" method="post">
			<div class="personal">
			
				<div class="main">
					<div class="form-left-w3l">

						<input type="text" class="top-up" name="name" placeholder="Name" required="">
					</div>
					<div class="form-left-w3l">

						<input type="email" name="email" placeholder="Email" required="">
					</div>
					<div class="form-right-w3ls ">

						<input class="buttom" type="text" name="phonenumber" placeholder="Phone Number" required="">
						<div class="clearfix"></div>
					</div>
				</div>
				
			</div>
			<div class="information">			
				<div class="main">				
					<div class="form-left-w3l">
						<input id="datepicker" name="bookingdate" type="text" placeholder="Booking Date &" required="">
						<input type="text" id="timepicker" name="bookingtime" class="timepicker form-control hasWickedpicker" placeholder="Time" required=""
						 onkeypress="return false;">
						<div class="clear"></div>
					</div>
				</div>
				
				<div class="main">
					<div class="form-left-w3l">
						<select class="form-control" name="noofadults" required>
					<option value="">Number of Adults</option>
						<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					</select>
					</div>
					<div class="form-right-w3ls">
						<select class="form-control" name="noofchildrens" required>
					<option value="">Number of Children</option>
					<option value="1">0</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					</select>
					</div>
				</div>	
			</div>
				
			<div class="btnn">
				<input type="submit" value="Reserve a Table" name="submit">
			</div>
					<div class="copy">
		<p>Check your Booking <a href="check-status.php" target="_blank">Status</a></p>
	</div>
		<div class="copy">
		<p>Admin Panel<a href="admin/" target="_blank"> Login here</a></p>
	</div>
		</form>
	</div>

	<script type='text/javascript' src='js/jquery-2.2.3.min.js'></script>
	<script src="js/jquery-ui.js"></script>
	<script>
		$(function () {
			$("#datepicker,#datepicker1,#datepicker2,#datepicker3").datepicker();
		});
	</script>
	<script type="text/javascript" src="js/wickedpicker.js"></script>
	<script type="text/javascript">
		$('.timepicker,.timepicker1').wickedpicker({ twentyFour: false });
	</script>
</body>

</html>