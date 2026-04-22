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


   <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-caption">
                            <h1 class="page-title">About Us</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.page-header-->
        <!-- about -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 col-lg-10 offset-md-1 col-md-10 col-sm-12 col-12  mb60">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="">
									<h3> Welcome to Geo-Vista Tour & Travel – Your Gateway to Explore Pakistan! </h3>
                                    <p>At Pakistan Tour & Travel, we are passionate about showcasing 
									the true beauty, culture, and heritage of Pakistan. From the snow-capped peaks of the
									Karakoram to the serene valleys of Swat, from the deserts of Thar to
									the historical richness of Lahore – we bring you unforgettable journeys across one 
									of the most diverse and breathtaking countries in the world..</p>
                                    <p>With years of experience in the tourism industry, our mission is simple: <br />
									<b> To provide safe, affordable, and customized travel experiences that connect you with the heart of Pakistan. </b></p>
                                </div>
								<div class=" mt-5">
									<h3> Why Choose Us? </h3>
									<ul>
									<li> Expertly Designed Tours – Whether you're an adventure seeker, history enthusiast, or honeymoon couple, we offer tailor-made packages to suit every traveler.</li>
									<li> Local Guides & Support – Our professional guides and 24/7 customer support ensure your journey is smooth and enriching.</li>
									<li> Trusted & Registered Company – We are a licensed tour operator, dedicated to transparency, comfort, and top-notch service.</li>
									</ul>
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- about-section -->
            <div class="container">
                <div class="row">
                    <!-- feature-section -->
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                        <div class="well-block">
                            <!-- feature-left -->
                            <div class="feature-left">
                                <div class="feature-icon"><img src="images/calendar.png" alt=""></div>
                                <div class="feature-content">
                                    <h4>Everything’s on Schedule</h4>
                                    <p>Provide every decided thing on its schedule time.</p>
                                </div>
                            </div>
                            <!-- /.feature-left -->
                            <!-- feature-left -->
                            <div class="feature-left">
                                <div class="feature-icon"><img src="images/adventure.png" alt=""></div>
                                <div class="feature-content">
                                    <h4>Destination Variety</h4>
                                    <p>Complete Variety Tour form Pickup to Destination.</p>
                                </div>
                            </div>
                            <div class="feature-left">
                                <div class="feature-icon"><img src="images/hotel.png" alt=""></div>
                                <div class="feature-content">
                                    <h4>Comfortable Housing</h4>
                                    <p>Provide bes Hotels and Food Services. </p>
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
      
        <!-- <div class="space-medium">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 mb60">
                        <div class="">
                            <h2>Our Amazing Team</h2>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 mb60">
                        <div class="">
                            <p class="lead">Our Supportive Team Provide You the bes guide and Service Right on Time.</p>
                        </div>
                    </div>
                </div>
                 <div class="row">
                    team-member 
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 ">
                        <div class="team-block">
                            <div class="team-img">
                                <a href="#" class="imghover"><img src="images/CEO.jpg" alt="" class="img-fluid"></a>
                            </div>
                            <div class="team-content">
                                <h4 class="team-title">Ali Hassan</h4>
                                <p class="team-meta">CEO &amp; Founder</p>
                            </div>
                        </div>
                    </div> 
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 ">
                        <div class="team-block">
                            <div class="team-img">
                                <a href="#" class="imghover"><img src="images/team_member_4.jpg" alt="" class="img-fluid"></a>
                            </div>
                            <div class="team-content">
                                <h4 class="team-title">Muhammad Bilal</h4>
                                <p class="team-meta">Blog Writer</p>
                            </div>
                        </div>
                    </div>
                     /.team-member 
                </div> 
            </div>
        </div> -->
        <!-- /.team-section -->
        <!-- certificate-section -->
        <div class="space-medium bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="section-title">
                            <h2>Awards & Certification</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- awards -->
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 mb60">
                        <div class="awards-block">
                            <div class="awards-img"><img src="images/certificate_1.png" alt=""></div>
                            <div class="awards-content">
                                <h4 class="awards-title">Certified travel Service-Quality System</h4>
                            </div>
                        </div>
                    </div>
                    <!-- /.awards -->
                    <!-- awards -->
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 mb60">
                        <div class="awards-block">
                            <div class="awards-img"><img src="images/certificate_2.png" alt=""></div>
                            <div class="awards-content">
                                <h4 class="awards-title">Authorized By Tourist
Board</h4>
                            </div>
                        </div>
                    </div>
                    <!-- /.awards -->
                    <!-- awards -->
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 mb60">
                        <div class="awards-block">
                            <div class="awards-img"><img src="images/certificate_3.png" alt=""></div>
                            <div class="awards-content">
                                <h4 class="awards-title">Member of the Travel Industry
Association</h4>
                            </div>
                        </div>
                    </div>
                    <!-- /.awards -->
                </div>
                <div class="row">
                    <div class="col-xl-10 col-lg-10 offset-md-1 col-md-10 col-sm-12 col-12 text-center">
                        <p>Quality and trust are the backbone of our business, along with our other core values. dignissim ipsumodio scelerisque felis egetese ore euismodivamus blandit vehicula suorbi dstieqcondimentum tincidunt dui vitae.Egeteuismod quis neqemporodn porta digssim ipsumodio scelerisque felis eget euismod purus quamat antenrcunec utdui idpurus elementum rutrum et rutrum sapamus.</p>
                    </div>
                </div>
            </div>
        </div>
   
       

    <?php
   include 'inc/footer.php';
   
   ?>
    