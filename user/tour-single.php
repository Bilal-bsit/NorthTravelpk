
	<?php
	session_start();
	include('inc/config.php'); // assumes $dbh (PDO) is defined
    $next = isset($_SERVER['REQUEST_URI']) ? urlencode($_SERVER['REQUEST_URI']) : ''; // ADDED: ensure $next exists for login redirect

	if (!isset($_GET['PackageId'])) {
		echo "No tour selected.";
		exit();
	}

	$tourId = intval($_GET['PackageId']); 

	try {
	$stmt = $dbh->prepare("SELECT * FROM tbltourpackages WHERE PackageId = :PackageId");
	$stmt->bindParam(':PackageId', $tourId, PDO::PARAM_INT);
    $stmt->execute();

    $tour = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$tour) {
        echo "Tour not found.";
        exit();
    }

	} catch (PDOException $e) {
		echo "Error: " . $e->getMessage();
		exit();
	}

	$packageId = $tour['PackageId'];

	try {
    $stmt = $dbh->prepare("SELECT * FROM tblsafety WHERE PackageId = :PackageId");
    $stmt->bindParam(':PackageId', $packageId, PDO::PARAM_INT);
    $stmt->execute();
    $safetyTips = $stmt->fetchAll(PDO::FETCH_ASSOC);
	} catch (PDOException $e) {
		echo "Error loading safety tips: " . $e->getMessage();
	}

	if (isset($_POST['BookNow'])) {
    if (!isset($_SESSION['userid']) || !isset($_SESSION['email'])) {
        die("You must be logged in to book a tour.");
    }

    $userId   = $_SESSION['userid'];
    $email    = $_SESSION['email'];
    $packageId = $tour['PackageId']; // FIXED
$Destination = $tour['PackageName']; // ADDED: default to tour name, can be overridden by form input

$fromDate = $_POST['fromdatepicker'];
$toDate   = $_POST['todatepicker'];
$comment  = trim($_POST['comments']);
//     $packageId = intval($_POST['PackageId']);
//    $fromDate = $_POST['fromdatepicker'];
//     $toDate   = $_POST['todatepicker'];
//     $comment  = trim($_POST['comments']);   
    
//     $regDate  = date("Y-m-d");
//     $packageId = $tour['PackageId']; // force consistency
//     $Destination = $tour['PackageLocation'];
    try {
        $insert = $dbh->prepare("INSERT INTO tblbooking (PackageId, UserId, UserEmail, FromDate, ToDate, Comment, RegDate, Destination) 
                                 VALUES (:PackageId, :UserId, :UserEmail, :FromDate, :ToDate, :Comment, :RegDate, :Destination)");
        $insert->bindParam(':PackageId', $packageId, PDO::PARAM_INT);
        $insert->bindParam(':UserId', $userId, PDO::PARAM_INT);
        $insert->bindParam(':UserEmail', $email, PDO::PARAM_STR);
        $insert->bindParam(':FromDate', $fromDate, PDO::PARAM_STR);
        $insert->bindParam(':ToDate', $toDate, PDO::PARAM_STR);
        $insert->bindParam(':Comment', $comment, PDO::PARAM_STR);
        $insert->bindParam(':RegDate', $regDate, PDO::PARAM_STR);
        $insert->bindParam(':Destination', $Destination, PDO::PARAM_STR);

        if ($insert->execute()) {
            echo "<script>alert('Tour booked successfully!'); window.location.href='my-booking.php';</script>";
        } else {
            echo "<script>alert('Booking failed. Please try again.');</script>";
        }

    } catch (PDOException $e) {
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
    }
}

if (isset($_POST['addreview'])) {
    if (!isset($_SESSION['userid'], $_SESSION['name'], $_SESSION['email'])) {
        echo "<script>alert('Please log in to submit a review.');</script>";
        exit;
    }

    $userId = $_SESSION['userid'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $message = trim($_POST['review_message']);
    $created_at = date("Y-m-d H:i:s");

    try {
        $sql = "INSERT INTO tblreviews (userId, name, email, message, created_at) 
                VALUES (:userId, :name, :email, :message, :created_at)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':message', $message, PDO::PARAM_STR);
        $stmt->bindParam(':created_at', $created_at, PDO::PARAM_STR);

        $stmt->execute();

        echo "<script>alert('Review Added successfully!'); window.location.href='clientreviews.php';</script>";
    } catch (PDOException $e) {
        echo "<script>alert('Error saving review: " . $e->getMessage() . "');</script>";
    }
}

?>


 
 <?php
 include 'inc/head.php';
 
 ?>
 
 
 <div class="wrapper">
 
 
  <?php
 include 'inc/header.php';
 
 ?>
 


<div class="wrapper">
     
        <div class="" style="background-image: url('../admin/pacakgeimages/<?php echo htmlspecialchars($tour['PackageImage']); ?>'); background-size: cover; background-position: center; background-repeat: no-repeat; padding: 100px 0; position: relative;">
            <div class="container">
                <div class="row">
				
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="tour-caption">
                            <h1 class="text-white tour-title"><?php echo htmlspecialchars($tour['PackageName']); ?></h1>
                            <p class="tour-caption-text text-white"><strong class="tour-rate">RS.<?php echo htmlspecialchars($tour['PackagePrice']); ?></strong></p>
                            <a href="#" class="btn btn-primary mb10">Book Your Tour</a>
                            <a href="#" class="btn btn-white mb10">view map</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.page-header-->
       
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12 col-12">
                        <div class="highlights-section mb60">
                            <h3><?php echo htmlspecialchars($tour['PackageName']); ?></h3>
                            <p><?php echo htmlspecialchars($tour['PackageFetures']); ?> </p>
							<p><?php echo htmlspecialchars($tour['PackageDetails']); ?> </p>
                            
                          </div>
                        <div class="journey-section mb60">
                            <h3 class="mb30">Safety Tips</h3>
                            <div class="well-bg-block">
							
                               <?php if (!empty($safetyTips)): ?>
								
								<!-- <?php foreach ($safetyTips as $tip): ?>
									<p class="journey-day-title"><?php echo htmlspecialchars($tip['safetydetails']); ?></p>
								<?php endforeach; ?> -->



<!-- Start Formating -->

<?php if (!empty($safetyTips)): ?>

    <?php
    // ADDED: helper to render line breaks + allow a tiny, safe HTML subset for headings/lists
    if (!function_exists('render_safe_safety')) {
        function render_safe_safety($raw) {
            // Allow only these tags (no attributes): headings, emphasis, lists, paragraphs, line breaks
            $allowed = '<h2><h3><h4><strong><em><b><ul><ol><li><p><br>';

            // If admin included allowed HTML tags, keep only those; otherwise convert newlines to <br>
            if (preg_match('/<\s*(h2|h3|h4|ul|ol|li|p|br|strong|em|b)\b/i', $raw)) {
                return strip_tags($raw, $allowed); // ADDED: strip everything except allowed tags
            }
            return nl2br(htmlspecialchars($raw, ENT_QUOTES, 'UTF-8')); // ADDED: plain text -> <br> safely
        }
    }
    ?>

    <?php foreach ($safetyTips as $tip): ?>
        <div class="journey-day-title">
            <?php echo render_safe_safety($tip['safetydetails'] ?? ''); // CHANGED: use helper ?>
        </div>
    <?php endforeach; ?>

<?php else: ?>
    <p>No safety tips available for this tour.</p>
<?php endif; ?>

<!-- End Formating -->






							<?php else: ?>
								<p>No safety tips available for this tour.</p>
							<?php endif; ?>
                                
                            </div>
                          
                        </div>
						
						<form action="" method="POST">
						<label class="control-label">Add Reviews</label>
						<div class="row">
						
								<div class="col-6 ">
                                    <div class="form-group">
                                        
                                        <input type="text" name="review_message" class="form-control" placeholder="Add Reviews">
                                    </div>
                                </div>
								<div class="col-6 ">
                                    <div class="form-group">
										<button type="submit" name="addreview" class="btn btn-primary">Add Now</button>
                                    </div>
                                </div>
								</div>
								
								</form>
								
			  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="reviews-section mb60">
        <h3 class="mb40">Customer Reviews</h3>

        <?php
        try {
            $stmt = $dbh->prepare("SELECT * FROM tblreviews ORDER BY created_at DESC Limit 5");
            $stmt->execute();
            $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error fetching reviews: " . $e->getMessage();
        }
        ?>

        <?php if (!empty($reviews)): ?>
            <?php foreach ($reviews as $review): ?>
                <div class="review-block mb3">
                    <div class="review-img">
                        <img src="images/default-user.jpg" alt="" class="rounded-circle">
                    </div>
                    <div class="review-content">
                        <h5 class="title-bold d-inline"><?php echo htmlspecialchars($review['name']); ?></h5>
                        <p><small><?php echo htmlspecialchars($review['created_at']); ?> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo htmlspecialchars($review['message']); ?></small></p>
                        <p></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No reviews yet.</p>
        <?php endif; ?>
    </div>
</div>

                    </div>
					
					
                    <div class="col-xl-4 col-lg-4 col-md-5 col-sm-12 col-12">

 <!-- for weather API -->
                     

                                        <div id="contact-weather" class="widget-weather">

<?php

$city = $tour['PackageLocation']; // ADDED: get city from tour data
$apiKey = "27d393cb64684c90bc5173323261804";

$url = "https://api.weatherapi.com/v1/current.json?key=$apiKey&q=" . urlencode($city) . "&aqi=yes";

$response = @file_get_contents($url);
$data = json_decode($response, true);

if ($data && isset($data['current'])) {
    echo "<div style='padding:15px;background:#f5f5f5;border-radius:10px;text-align:center;'>";
    echo "<h4>Weather in " . htmlspecialchars($city) . "</h4>";
    echo "<img src='https:" . $data['current']['condition']['icon'] . "'>";
    echo "<h3>" . $data['current']['temp_c'] . "°C</h3>";
    echo "<p>" . $data['current']['condition']['text'] . "</p>";
    echo "</div>";
} else {
    echo "<p>Weather not available</p>";
}
?>

</div>
<br>




                        <div class="widget-primary support-list">
                            <div class="widget-primary-title">
                                <h3>Why Book With Us?</h3>
                            </div>
                            <ul class="arrow list-none">
                                <li>24X7 service and support</li>
                                <li>Totally complaint in all aspects</li>
                                <li>Dedicated, trustworthy team</li>
                                <li>Professional happy services</li>
                            </ul>
                        </div>
                        <!-- enguiry-form -->
                        <!-- form -->
                        <div class="widget-form">
                            <h3 class="text-white mb30"> Book Your Tour</h3>
                            <form method="POST" action="">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
										<input type="hidden" name="PackageId" value="<?php echo htmlspecialchars($tour['PackageId']); ?>">
   
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label class="control-label sr-only" for="datepicker"></label>
												<label class="text-white">From Date</label>
                                                <div class="input-group">
                                                    <input id="" name="fromdatepicker" type="date" placeholder="From Date" class="form-control" required>
                                                     </div>
                                            </div>
                                        </div>
                                    </div>
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label class="control-label sr-only" for="datepicker"></label>
												<label class="text-white">To Date</label>
                                                <div class="input-group">
                                                    <input id="" name="todatepicker" type="Date" placeholder="To Date" class="form-control" required>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>


                                									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label class="control-label sr-only" for="datepicker"></label>
												<label class="text-white">Destination Name</label>
                                                <div class="input-group">
                                                    <input id="" name="Destination" type="text" placeholder="Destination Name" class="form-control" required>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>





                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label text-white" for="textarea"> Add Your Comments</label>
                                        <textarea class="form-control" id="textarea" name="comments" rows="8" placeholder="Comment"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <button type="submit" name="BookNow" class="btn btn-primary">Book Now</button>
                                    </div>
                                </div>
                            </form>
                            <!-- /.form -->
                        </div>
                        <!-- /.enguiry-form -->
                        <div id="contact-map" class="widget-map">
						 <iframe
								src="<?php echo htmlspecialchars($tour['map']); ?>"
								width="100%"
								height="350px"
								style="border:1px;"
								allowfullscreen=""
								loading="lazy"
								referrerpolicy="no-referrer-when-downgrade">
							</iframe>
						</div>

                   




                    </div>
                </div>
            
			 <div class="row">
			 
			 </div>
			</div>
        </div>
   
  	
	<?php
	
	include 'inc/footer.php';
	
	?>