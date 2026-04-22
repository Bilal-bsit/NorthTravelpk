     
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
                            <h1 class="page-title">Customer Reviews</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.page-header-->
        <div class="content">
            <div class="container">
                <div class="row">
                   <?php
						include('inc/config.php'); // your PDO config

						try {
							$sql = "SELECT * FROM tblreviews ORDER BY created_at DESC LIMIT 6";
							$stmt = $dbh->prepare($sql);
							$stmt->execute();
							$reviews = $stmt->fetchAll(PDO::FETCH_OBJ);

							if ($stmt->rowCount() > 0) {
								foreach ($reviews as $review) {
						?>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb40">
								<!-- testimonial-block -->
								<div class="testimonial-block">
									<div class="testimonial-content">
										<p class="testimonial-text">“<?php echo htmlentities($review->message); ?>”</p>
										<span class="testi-meta">
											<strong>- <?php echo htmlentities($review->name); ?></strong>
											(Client)
										</span>
										<div class="testi-arrow"></div>
									</div>
									<div class="testi-img">
										<img src="images/default-user.png" alt="client" class="rounded-circle">
									</div>
								</div>
								<!-- /.testimonial-block -->
							</div>
						<?php
								}
							} else {
								echo '<p>No reviews yet.</p>';
							}
						} catch (PDOException $e) {
							echo 'Error: ' . $e->getMessage();
						}
						?>

                </div>
            </div>
        </div>
    
	 <?php
	  include 'inc/footer.php';
	  
	  ?>