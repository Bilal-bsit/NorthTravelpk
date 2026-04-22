     <?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('inc/config.php');

if (!isset($_SESSION['userid'])) {
    header('Location: login.php');
    exit();
}



?>  
 
	  <?php
	  include 'inc/head.php';
	  
	  ?>
	  
	  <?php
	  include 'inc/header.php';
	  
	  ?>



 <div class="contact-pageheader">
        </div>
		
 <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="contact-wrapper">
                        <div id="contact-map" class="mb60"></div>
                        <div class="row">
                            <div class="offset-xl-1 col-xl-10 offset-lg-1 col-lg-10 offset-md-1 col-md-10 col-sm-12 col-12">
                                <div class="section-title">
                                    <h2>We're here for you all day, everyday!</h2>
                                    <p>If you have any questions or comments please complete the form below.We'd love to hear from you!</p>
                                </div>
                                <div class="contact-block">
								
								<?php
								include 'inc/config.php';

								// Handle form submission
								if ($_SERVER["REQUEST_METHOD"] == "POST") {
									// Get and sanitize form data
									$name    = htmlspecialchars($_POST['FullName']);
									$email   = htmlspecialchars($_POST['EmailId']);
									$phone   = htmlspecialchars($_POST['MobileNumber']);
									$subject = htmlspecialchars($_POST['Subject']);
									$message = htmlspecialchars($_POST['Description']);
									$date = date('Y-m-d H:i:s');
									// Prepare SQL statement
										$sql = "INSERT INTO tblenquiry (FullName, EmailId, MobileNumber, Subject, Description, PostingDate) 
												VALUES (:name, :email, :phone, :subject, :message, :postingDate)";
										$stmt = $dbh->prepare($sql);

									// Bind parameters
									$stmt->bindParam(':name', $name, PDO::PARAM_STR);
									$stmt->bindParam(':email', $email, PDO::PARAM_STR);
									$stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
									$stmt->bindParam(':subject', $subject, PDO::PARAM_STR);
									$stmt->bindParam(':message', $message, PDO::PARAM_STR);
									$stmt->bindParam(':postingDate', $date, PDO::PARAM_STR);

									// Execute
									if ($stmt->execute()) {
										echo "<P>Thank you! Your enquiry has been submitted.</p>";
									} else {
										echo "Something went wrong. Please try again.";
									}
								}
								?>

                                    <!-- contact-form -->
                                    <form action="" method="POST" >
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="name">Name</label>
                                                    <input id="name" name="FullName" type="text" placeholder="Your Name" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="email"> Email</label>
                                                    <input id="email" name="EmailId" type="text" placeholder="Your Email Address" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="phone"> Phone</label>
                                                    <input id="phone" name="MobileNumber" type="text" placeholder="Your Contact Number" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="subject">Subject </label>
                                                    <input id="subject" name="Subject" type="text" placeholder="Your Subject" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="textarea">Messages</label>
                                                    <textarea class="form-control"  id="textarea" name="Description" rows="4" placeholder="Your Messages"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                                                <button type="submit" name="singlebutton" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- contact-form -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- contact-info -->
        <div class="space-small">
            <div class="container">
                <div class="row ">
                    <!-- contact -->
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-6 col-12 mb20">
                        <div class="contact-info">
                            <h4 class="contact-info-title">Head Office Location</h4>
                            <div class="contact-info-content">
                                <i class="fa fa-map-marker contact-info-icon"></i>
                                <p>Janah Park Sheikhupura</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.contact -->
                    <!-- contact -->
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-6 col-12 mb20">
                        <div class="contact-info">
                            <h4 class="contact-info-title">Call Us</h4>
                            <div class="contact-info-content">
                                <i class="fa fa-phone contact-info-icon"></i>
                                <p><strong>+923164716308
                                    <br> +923274665063</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- /.contact -->
                    <!-- contact -->
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-6 col-12 mb20 ">
                        <div class="contact-info">
                            <h4 class="contact-info-title">Email Us</h4>
                            <div class="contact-info-content">
                                <i class="fa fa-envelope contact-info-icon"></i>
                                <p><strong>northtravelpk.com<br> support@geovista.com</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- /.contact -->
                </div>
            </div>
        </div>
      
	  
	 <!-- <script>
    function initMap() {
        var location = {
            lat: 31.7132,  // Latitude for Jinnah Park, Sheikhupura
            lng: 73.9783   // Longitude for Jinnah Park, Sheikhupura
        };
        var map = new google.maps.Map(document.getElementById('contact-map'), {
            zoom: 15,
            center: location,
            scrollwheel: false
        });
        var marker = new google.maps.Marker({
            position: location,
            map: map,
            icon: 'images/map_marker.png'  // Make sure this icon exists at this path
        });
    }
</script>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZib4Lvp0g1L8eskVBFJ0SEbnENB6cJ-g&callback=initMap">
</script> -->

	  <?php
	  include 'inc/footer.php';
	  
	  ?>