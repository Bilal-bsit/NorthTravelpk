<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('inc/config.php');

if (!isset($_SESSION['userid'])) {
    echo "<p>You must be logged in to view your bookings.</p>";
    exit();
}

$userid = $_SESSION['userid'];
$bookings = [];

try {
    $stmt = $dbh->prepare("SELECT * FROM tblbooking WHERE UserId = :userid ORDER BY RegDate DESC");
	$stmt = $dbh->prepare("SELECT tblbooking.*, tbltourpackages.PackageName 
    FROM tblbooking 
    JOIN tbltourpackages 
    ON tblbooking.PackageId = tbltourpackages.PackageId
    WHERE tblbooking.UserId = :userid 
    ORDER BY tblbooking.RegDate DESC");
    $stmt->bindParam(':userid', $userid, PDO::PARAM_INT);
    $stmt->execute();
    $bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "<p>Error fetching bookings: " . $e->getMessage() . "</p>";
}
?>
 
 <?php
 include 'inc/head.php';
 
 ?>
 
 
 <div class="wrapper">
 
 
  <?php
 include 'inc/header.php';
 
 ?>
 
 

				

	<div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-caption">
                            <h1 class="page-title">My Bookings</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
	   
        <div class="content">
            <div class="container">
                <div class="row">
				       <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
						<div class="table-responsive">
							<table class="table table-striped">
								
								<thead>
									<tr>
										<th>#</th>
										<th>ID</th>
										<th>Package Name</th>
										<th>From Date</th>
										<th>To Date</th>
										<th>Comments</th>
										<!-- <th>Booking Date</th> -->
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<?php if (count($bookings) > 0): ?>
										<?php foreach ($bookings as $index => $booking): ?>
											<tr>
												<td><?php echo $index + 1; ?></td>
												<td><?php echo htmlspecialchars($booking['PackageId']); ?></td>
												<td><?php echo htmlspecialchars($booking['PackageName']); ?></td>
												<td><?php echo htmlspecialchars($booking['FromDate']); ?></td>
												<td><?php echo htmlspecialchars($booking['ToDate']); ?></td>
												<td><?php echo htmlspecialchars($booking['Comment']); ?></td>
												<!-- <td><?php echo htmlspecialchars($booking['RegDate']); ?></td> -->
												<td>
												<?php
												$status = $booking['status'] ?? 0;
												echo $status == 1 ? 'Confirmed' : ($status == 2 ? 'Cancelled' : 'Pending');
												?>
												</td>
											</tr>
										<?php endforeach; ?>
									<?php else: ?>
										<tr>
											<td colspan="6">No bookings found.</td>
										</tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
					</div>
				 
				   </div>
            </div>
        </div>
		
		
		
		
   <?php
   include 'inc/footer.php';
   
   ?>
    