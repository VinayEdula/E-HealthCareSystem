
<!doctype html>
<html lang="en">
<head>
<script src="https://kit.fontawesome.com/90e573da6c.js" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
<div class="sidebar app-aside" id="sidebar" style="background-color:black;">
				<div class="sidebar-container perfect-scrollbar" style="background-color:black;">

<nav>
						
						<!-- start: MAIN NAVIGATION MENU -->
						<div class="navbar-title" >
							<span>Main Navigation</span>
						</div>
						<ul class="main-navigation-menu" style="background-color:black;">
							<li>
								<a href="dashboard.php">
									<div class="item-content" style="background-color:#00695C;">
										<div class="item-media">
											<i class="ti-home"></i>
										</div>
										<div class="item-inner">
											<span class="title"><font color="white" > Dashboard</font> </span>
										</div>
									</div>
								</a>
							</li>
							<li>
								<a href="book-appointment.php">
									<div class="item-content" style="background-color:#00695C;">
										<div class="item-media">
											<i class="ti-pencil-alt"></i>
										</div>
										<div class="item-inner">
											<span class="title"><font color="white" > Book Appointment</font> </span>
										</div>
									</div>
								</a>
							</li>

							<li>
								<a href="appointment-history.php">
									<div class="item-content" style="background-color:#00695C;">
										<div class="item-media">
											<i class="ti-list"></i>
										</div>
										<div class="item-inner">
											<span class="title"><font color="white" > Appointment History</font> </span>
										</div>
									</div>
								</a>
							</li>
<li>
								<a href="manage-medhistory.php">
									<div class="item-content" style="background-color:#00695C;">
										<div class="item-media">
											<i class="ti-list"></i>
										</div>
										<div class="item-inner">
											<span class="title"><font color="white" > Medical History</font> </span>
										</div>
									</div>
								</a>
							</li>

<li>
								<a href="Disease-Prediction-System-master/index.php">
									<div class="item-content" style="background-color:#00695C;">
										<div class="item-media">
											<i class="ti-alert"></i>
										</div>
										<div class="item-inner">
											<span class="title"> <font color="white" >Disease Prediction </font></span>
										</div>
									</div>
								</a>
							</li>
							<?php
							$uid=$_SESSION['id'];
$sql_get=mysqli_query($con,"select PatientID,PatientName,PatientEmail,Docid,MedicalPres,Next_Visit_Date from notifications join users on users.email=notifications.PatientEmail where users.id='$uid'");
             $count=mysqli_num_rows($sql_get);
							?>
<li>
								<a href="notification.php">
									<div class="item-content" style="background-color:#00695C;">
										<div class="item-media">
											<i class="ti-bell"></i> <span class="badge bg-danger" id="count"><?php echo $count; ?></span>
										</div>
										<div class="item-inner" style="background-color:#00695C;">
											<span class="title"> <font color="white" >Notifications </font></span>
										</div>
									</div>
								</a>
							</li>
						</ul>
						<!-- end: CORE FEATURES -->
						
					</nav>
					</div>
			</div>
		</body>