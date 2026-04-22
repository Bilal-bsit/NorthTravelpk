 
 <?php
 include 'inc/head.php';
 
 ?>
 
 
 <div class="wrapper">
 
 
  <?php
 include 'inc/header.php';
 
 ?>
 
        <!-- page-header -->
        <div class="">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-caption">
                            <h1 class="page-title">All Pakistan Tour Packeges</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.page-header-->
        <!-- destination-section -->
        <div class="content">
            <div class="container">
                <div class="row">
				<?php
					include('inc/config.php'); 

					$sql = "SELECT * FROM tbltourpackages "; 
					$query = $dbh->prepare($sql);
					$query->execute();
					$results = $query->fetchAll(PDO::FETCH_OBJ);

					foreach($results as $row) {
					?>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                        <!-- destination-section -->
                        <div class="destination-block">
                            <div class="desti-img">
                                <img src="admin/pacakgeimages/<?php echo htmlentities($row->PackageImage); ?>" alt="" style="height:400px; width:520px">
                                <a href="#" class="desti-title"><?php echo htmlentities($row->PackageName); ?></a>
                                <div class="overlay">
                                    </div>
                                    <div class="text">
                                        <h3 class="mb20 text-white"><?php echo htmlentities($row->PackageName); ?></h3>
                                       <ul class="angle list-none">
                                        <li><?php echo htmlentities($row->PackageType); ?></li>
                                        
                                    </ul>
                                    <p class="price">Rs. <?php echo htmlentities($row->PackagePrice); ?></p>
                                        <a href="tour-single.php?PackageId=<?php echo $row->PackageId; ?>" class="btn-link">Go for <?php echo htmlentities($row->PackageLocation); ?> <i class="fa fa-angle-right"></i></a></div>
                                
                            </div>
                        </div>
                    </div>
					<?php } ?>
                  
                </div>
            </div>
        </div>
        <!-- /.destination-section -->
           <!-- newsletter-section -->
        <div class="newsletter-wrapper newsletter-overlay" style="background:url(images/newsletter_wrapper.jpg) no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-7 offset-md-5 col-md-6 col-sm-12 col-12">
                        <div class="newsletter-block">
                            <h1 class="newsletter-title">Join The Newsletter</h1>
                        <p class="mb30">Subscribe the newsletter and get update for discounts on tours.</p>
                            <form>
                                <div class="input-group add-on">
                                    <input class="form-control" placeholder="email address here" type="text">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary newsletter-btn" type="submit">subscribe</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          <!-- /.newsletter-section -->
		  
		  
		  <?php
		  include 'inc/footer.php';
		  
		  ?>