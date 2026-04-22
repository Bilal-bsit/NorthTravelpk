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
 
 
 <div class="wrapper">
 
 
  <?php
 include 'inc/header.php';
 
 ?>
 
 
 
        <div class="slider">
            <div class="owl-carousel owl-one owl-theme">
             
                <div class="item">
                    <div class="slider-img">
                        <img src="images/4.jpg" alt=""></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="slider-captions">
                                    <h1 class="slider-title"> Travel Inside Pakistan explore it. </h1>
                                    <a href="tourlist.php" class="btn btn-primary">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             
               
                <div class="item">
                    <div class="slider-img"><img src="images/1.jpg" alt=""></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="slider-captions">
                                    <h1 class="slider-title">Geo-Vista Your Best Travel Partner</h1>
                                    <a href="#" class="btn btn-primary">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
               
           
            </div>
        </div>
       
	   
        <div class="bg-default enquiry-form ">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                       
					   
                        <form>
                            <div class="row">
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-3 col-12">
                                    <div class="form-group">
                                        <label class="control-label sr-only" for="select"></label>
                                        <div class="select">
                                            <select id="select" name="city" class="form-control">
                                                <option value="">Where you want to go</option>
                                                <option value="">Naran kaghan</option>
                                                <option value="">Kashmir</option>
                                                <option value="">Sawat Kalam</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-3 col-12">
                                    <div class="form-group">
                                        <label class="control-label sr-only" for="datepicker"></label>
                                        <div class="input-group">
                                            <input id="datepicker" name="datepicker" type="text" placeholder="Date" class="form-control" required>
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-3 col-12">
                                    <div class="form-group">
                                        <label class="control-label sr-only" for="select"></label>
                                        <div class="select">
                                            <select id="select" name="select" class="form-control">
                                                <option value="">Number of Peoples</option>
                                                <option value="">6</option>
                                                <option value="">10</option>
                                                <option value="">25</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-12 col-md-6 col-sm-3 col-12">
                                    <a  href="tourlist.php"  class="btn btn-primary btn-lg">Book Now</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="space-medium">
            <div class="container">
               
                <div class="row ">
                    <div class="col-xl-4 col-lg-4 offset-md-1 col-md-4 col-sm-12 col-12 mb40">
                        <div class="tour-img">
                            <a href="#" class="imghover"> <img src="images/Narran-Valley.jpg" alt="" class="img-fluid"></a>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 offset-md-1 col-md-5 col-sm-12 col-12 mb40">
                        <div class="tour-block">
                            <div class="tour-content">
                                <h2 class="mb30"><a href="#" class="title">Pakistan Tour</a></h2>
                                <p class="mb30">Explore Pakistan with your Friends and Family.</p>
                                <a href="tourlist.php" class="btn-link">Go For National Tour<i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-xl-5 col-lg-5 offset-md-1 col-md-5 col-sm-12 col-12 mb40">
                        <div class="tour-block">
                            <div class="tour-content">
                                <h2 class="mb30"><a href="#" class="title">Adventure Tour</a></h2>
                                <p class="mb30">Donec porttitor lorem utdiam iaculis euismod congue eroset lectus consectetur fermen uspendissolutpat risus utarcu dapibusat conquat quam sodenean pretium a metus euauctor.</p>
                                <a href="tourlist.php" class="btn-link">Go For Adventure Tour<i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 offset-md-1 col-md-4 col-sm-12 col-12 mb40">
                        <div class="tour-img">
                            <a href="#" class="imghover"> <img src="images/2.jpg" alt="" class="img-fluid"></a>
                        </div>
                    </div>
                </div>
              
                <div class="row">
                    <div class="col-xl-4 col-lg-4 offset-md-1 col-md-4 col-sm-12 col-12 mb20">
                        <div class="tour-img">
                            <a href="#" class="imghover"> <img src="images/6.jpeg" alt="" class="img-fluid"></a>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 offset-md-1 col-md-5 col-sm-12 col-12 mb20">
                        <div class="tour-block">
                            <div class="tour-content">
                                <h2 class="mb30"><a href="#" class="title">Domestic Tour</a></h2>
                                <p class="mb30">It typically includes various travel packages that cover transportation, accommodation, meals, and sightseeing.</p>
                                <a href="tourlist.php" class="btn-link">Go For Domestic Tour<i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
   
        <!-- <div class="space-medium">
            <div class="container-fluid">
                <div class="row">
                   
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="section-title">
                            <h2>Top Destinations</h2>
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 nopl nopr">
                       
                        <div class="destination-block">
                            <div class="desti-img">
                                <img src="images/naran-kaghan.jpg" alt="">
                                <a href="tourlist.php" class="desti-title">Narran-Valley</a>
                                <div class="overlay">
                                </div>
                                <div class="text">
                                    <h3 class="mb20 text-white">Naran</h3>
                                   
                                    <p class="price">Rs.25000</p>
                                    <a href="tourlist.php" class="btn-link">Go for Naran <i class="fa fa-angle-right"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 nopl nopr">
                      
                        <div class="destination-block">
                            <div class="desti-img">
                                <img src="images/Naran-Rafting.jpg" alt="">
                                <a href="tourlist.php" class="desti-title">Kashmir</a>
                                <div class="overlay">
                                </div>
                                <div class="text">
                                    <h3 class="mb20 text-white">Kashmir</h3>
                                   
                                    <p class="price">Rs.35000</p>
                                    <a href="tourlist.php" class="btn-link">Go for Kashmir <i class="fa fa-angle-right"></i></a></div>
                            </div>
                        </div>
						</div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 nopr nopl">
                        <div class="destination-block">
                            <div class="desti-img">
                                <img src="images/5.jpg" alt="">
                                <a href="tourlist.php" class="desti-title">Kalam</a>
                                <div class="overlay">
                                </div>
                                <div class="text">
                                    <h3 class="mb20 text-white">Kalam</h3>
                                    
                                    <p class="price">Rs. 12000</p>
                                    <a href="tourlist.php" class="btn-link">Go for Kalam <i class="fa fa-angle-right"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 nopr nopl">
                        <div class="destination-block">
                            <div class="desti-img">
                                <img src="images/4.jpg" alt="">
                                <a href="tourlist.php" class="desti-title">Sawat MalamJabba</a>
                                <div class="overlay">
                                </div>
                                <div class="text">
                                    <h3 class="mb20 text-white">Sawat MalamJabba</h3>
                                   
                                    <p class="price">Rs.9000</p>
                                    <a href="tourlist.php" class="btn-link">Go for Sawat MalamJabba <i class="fa fa-angle-right"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       </div>
	    -->
        <div class="space-medium">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 mb60">
                        <div class="">
                            <h2>We are <br> Travel Agency</h2>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 offset-md-1 col-md-8 col-sm-12 col-12 mb60">
                        <div class="">
                            <p class="lead">Pellentesque luctus felis non nibh masus consectetuis sed nisl eniull lentesque euismod eronon ntesque tortor molestie egurabitur lorem ien elementumelitac eleifue nisl fringilla nisia tris.</p>
                        </div>
                    </div>
                </div>
				
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                        <div class="well-block">
                            <div class="feature-left">
                                <div class="feature-icon"><img src="images/calendar.png" alt=""></div>
                                <div class="feature-content">
                                    <h4>Everything’s on Schedule</h4>
                                    <p>Cras porttitor tortor erateget accumsan is feltumsit.</p>
                                </div>
                            </div>
                            <div class="feature-left">
                                <div class="feature-icon"><img src="images/adventure.png" alt=""></div>
                                <div class="feature-content">
                                    <h4>Destination Variety</h4>
                                    <p>Pellentesque imperdiet esmpus finibusse euismunc.</p>
                                </div>
                            </div>
                            <div class="feature-left">
                                <div class="feature-icon"><img src="images/hotel.png" alt=""></div>
                                <div class="feature-content">
                                    <h4>Comfortable Housing</h4>
                                    <p>Vestiulum sodales tempudin one erlctus iedate. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                        <div class="well-block">
                            <div class="counter-block">
                                <h1 class="counter-numbers">689+</h1>
                                <div class="counter-content">
                                    <h4>Tours</h4>
                                    <p>Cras porttitor tortor erateget taccumsan.</p>
                                </div>
                            </div>
                            <div class="counter-block">
                                <h1 class="counter-numbers">320+</h1>
                                <div class="counter-content">
                                    <h4>Destinations</h4>
                                    <p>Pellentesque luctus felisnon nib its consecteuis.</p>
                                </div>
                            </div>
                            <div class="counter-block">
                                <h1 class="counter-numbers">60+</h1>
                                <div class="counter-content">
                                    <h4>Countries</h4>
                                    <p>Sed gravida eleequenec fringilla dolonteger.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="space-medium service-wrapper" style="">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 mb60">
                        <div class="">
                            <h2>Our Services</h2>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 offset-md-1 col-md-8 col-sm-12 col-12 mb60">
                        <div class="">
                            <p class="lead">Suctus felis non nibh maximus consectetuis sed nisl eniullase pellentesque euismod eronon ntesque tortor molestieege.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 nopr">
                        <div class="service-block border-bottom border-right">
                            <div class="service-img"><img src="images/hotel_1.png" alt=""></div>
                            <div class="service-content">
                                <h3 class="service-title">Affordable Hotel Reservation</h3></div>
                        </div>
                    </div>
                    
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 nopl nopr">
                        <div class="service-block border-bottom border-right">
                            <div class="service-img"><img src="images/staff.png" alt=""></div>
                            <div class="service-content">
                                <h3 class="service-title">Staff Transportation Services </h3></div>
                        </div>
                    </div>
               
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 nopl">
                        <div class="service-block border-bottom">
                            <div class="service-img"><img src="images/safety.png" alt=""></div>
                            <div class="service-content">
                                <h3 class="service-title">Safety Guide</h3></div>
                        </div>
                    </div>
                
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 nopr">
                        <div class="service-block border-right">
                            <div class="service-img"><img src="images/adventure.png" alt=""></div>
                            <div class="service-content">
                                <h3 class="service-title">Adventure </h3></div>
                        </div>
                    </div>
                   
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 nopl nopr">
                        <div class="service-block  border-right">
                            <div class="service-img"><img src="images/car_wash.png" alt=""></div>
                            <div class="service-content">
                                <h3 class="service-title">Jeep Rental Service </h3></div>
                        </div>
                    </div>
                  
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 nopl">
                        <div class="service-block service-right-border service-bottom-border">
                            <div class="service-img"><img src="images/car.png" alt=""></div>
                            <div class="service-content">
                                <h3 class="service-title">Jeep on Call</h3></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
   
   <?php
   include 'inc/footer.php';
   
   ?>