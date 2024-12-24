<?php
 include "connect.php";
    

if(isset($_POST['submit'])) {
  $file_name = $_FILES['fileToUpload']['name'];
  $file_size = $_FILES['fileToUpload']['size'];
  $file_tmp = $_FILES['fileToUpload']['tmp_name'];
  $file_type = $_FILES['fileToUpload']['type'];
  $file_name_new = date("d-m-y").rand()."_".$file_name;
  $file_ext=strtolower(end(explode('.',$_FILES['fileToUpload']['name']))); 
  move_uploaded_file($file_tmp,"uploads/".$file_name_new);

  $data['created'] = time();
 
  $mail_body.="<table width='800' border='0' cellspacing='0' cellpadding='0'>
                 <tr>
                    <td colspan='2'  style='background-color: #04a9af;padding:10px 10px 10px 15px; color:#FFF;font-size:26px;font-family:Arial; text-align:center;'><img src='".$SITE."/images/logo.png'/> </td>
                 </tr>                        
               </table>
               <br />
            <table width='800' border='0' cellspacing='0' cellpadding='0'>
              <tr>
                <td style='background-color:#FFFFFF; font-family:Arial; font-size:15px; color:#666666; padding:5px 10px 5px 15px; border-bottom:#FFFFFF 3px solid; border-top:#FFFFFF 1px solid'>
                  <p>Dear Admin,</p>
                  <p> There is a new CV has been submitted. Please check. </p>
                </td>
             </tr>
          </table>
          <table width='800' border='0' cellspacing='0' cellpadding='0'>
            <tr>    
              <td style='background-color:#FFFFFF;padding:10px 10px 10px 15px;color:#04a9af;font-size:15px;font-family:Arial;'>Here are your details</td>
            </tr>       
            <tr>
              <td width='180' height='35' align='left' valign='top' style='background-color:#EBEBEB; font-family:Arial; font-size:14px; color:#000; padding:5px 10px 5px 15px'><strong>Date:</strong></td>
              <td height='35' align='left' valign='top' style='background-color:#EBEBEB; font-family:Arial; font-size:14px; color:#666666; padding:5px 10px 5px 15px'>".date('d/m/Y', $data['created'])."</td>
            </tr>                 
        </table>
        <p style='font-family:Arial; font-size:14px; color:#666666; line-height:22px;'>
            Regards,<br>
            Signotron Team.
        </p>
        <br />
        <table width='800' border='0' cellspacing='0' cellpadding='0'>
          <tr>
            <td style='background-color:#FFFFFF; font-family:Arial; font-size:10px; color:#666666; padding:5px 10px 5px 15px'> </td>
          </tr>
          <tr>
            <td style='background-color:#FFFFFF; font-family:Arial; font-size:8px; color:#666666; padding:5px 10px 5px 15px; border-bottom:#04a9af 3px solid; border-top:#04a9af 1px solid'>Disclaimer: The opinions expressed within this message are those of the author and not necessarily those of the firm. The information contained in this message is intended only for the recipient, may be privileged and confidential and protected from disclosure. If the reader of this message is not the intended recipient, or an employee or agent responsible for delivering this message to the intended recipient, please be aware that any dissemination or copying of this communication is strictly prohibited. If you have received this communication in error, please immediately notify us by replying to the message and deleting it from your computer or any other device. </td>
          </tr>
        </table>";
    

    $objMail = new PHPMailer();
    $objMail->From = "noreply@signotron.in"; // Client's mail id
    $objMail->FromName = "Carrer@signotron.in"; // 
    $objMail->Subject = "Signotron - Carrer";
    $objMail->IsHtml(true);
    $objMail->addAttachment("uploads/".$file_name_new);
    $objMail->Body = $mail_body;
    $objMail->AddAddress("hrmanager@signotron.com"); // Client's mail id  
    $objMail->AddAddress("dimani@signotron.com"); // Client's mail id
    $objMail->Send();
    unlink("uploads/".$file_name_new);
    echo '<script>alert("Thank you for uploading CV! We will respond shortly.")</script>';
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"> 
    <!-- fontawesome -->
	  <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Hind:wght@300;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
     
    <!-- SLIDE ANIMATION CSS START -->
    <link href="css/animated.css" type="text/css" rel="stylesheet">   
    <!-- HOVER EFFECTS START -->
    <link href="css/hover.css" rel="stylesheet" type="text/css">
    <!-- FONT AWESOME CSS START -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- AOS CSS & JS  -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- owl carousel css start -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <!-- owl carousel css end -->



    <title>Careers</title>
  </head>
  
  
  
  <body>


<!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark fixed-top">
    <div class="container menu">
      <a class="navbar-brand" href="/"><img src="images/logo.png" alt="" class="img-fluid"></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse wow bounceIn" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item hvr-float">
            <a class="nav-link" href="/">Home</a>
          </li>
          <li class="nav-item hvr-float">
            <a class="nav-link" href="about">About&nbsp;Us</a>
          </li>
          <li class="nav-item dropdown hvr-float">
            <a class="nav-link dropdown-toggle" href="products" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Products</a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
              <a class="dropdown-item" href="products">CATEGORIES</a>
              <a class="dropdown-item" href="industrial_application">&raquo; INDUSTRIAL APPLICATION</a>
              <a class="dropdown-item" href="railway_application">&raquo;  RAILWAY APPLICATION</a>
              <a class="dropdown-item" href="emobility_application">&raquo;  E-MOBILITY APPLICATION</a>
            </div>
          </li>
          <li class="nav-item hvr-float">
            <a class="nav-link" href="r_d_setup">R&D</a>
          </li>
          <li class="nav-item hvr-float">
            <a class="nav-link" href="service">Service</a>
          </li>
          <li class="nav-item hvr-float">
            <a class="nav-link" href="served_industry">Clients</a>
          </li>
          <li class="nav-item hvr-float">
            <a class="nav-link" href="careers">Careers</a>
          </li>
          <li class="nav-item hvr-float">
            <a class="nav-link" href="csr">CSR</a>
          </li>
          <li class="nav-item hvr-float">
            <a class="nav-link" href="contact">Contact&nbsp;Us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


<section class="inner_banner">
  <img src="images/inner_banner9.jpg" alt="" class="img-fluid">
  <h2>CAREERS</h2>
</section>


<!-- BODY -->
<!--<section class="top_form">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="top_form_inner" data-aos="flip-up" data-aos-anchor-placement="top-center">
          <div class="row">
           <div class="col-md-6 col-lg-6"><h5>Job Search</h5></div>
           <div class="col-md-6 col-lg-6"><a href="#"> open postions</a></div>
          </div>

          <form>
           <div class="form-row">
              <div class="form-group col-md-3">
                <input type="text" class="form-control" placeholder="Job Search">
              </div>
              <div class="form-group col-md-3">
                <select  class="form-control">
                  <option selected>All</option>
                  <option>...</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <select  class="form-control">
                  <option selected>All</option>
                  <option>...</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</section>-->


<section class="career_inner">
  <div class="container">

    <div class="row">
      <div class="col-lg-12">
        <div class="m_bottom_65">
          <h2>Work with us</h2>
          <div class="m_top_40">
            <p>All of us at  Signotron work to achieve excellence in a cordial corporate environment. We have never faced labor unrest in our long history of more than three decades. Signotron provides all corporate social benefits under the law of land.</p>
            <p>Our management believes that job satisfaction is the most important factor affecting long term association between Signotron and its employees, our most important stakeholders. Every individual in our workforce is encouraged and rewarded for their achievements, for work and for sporting and cultural activities.</p>
            <p>Being an R&D driven company, Signotron provides advanced technical resources for its staff, especially its engineers, to aid their learning and growth in the field of power electronics.</p> 
            <p class="pt-4 pb-3"><strong>The intent to “create” powers us, the desire to better ourselves drives us, and our commitment to our responsibilities finally takes us where we want to be. </strong></p>
            <p>Special mention must be made of our service department personnel who serve as a link between us and our customers. They receive quality training on our products to deliver the best service across our Pan-India Service Network.</p>
          </div>
        </div>
      </div>
    </div>

  <div class="career_gallery" data-aos="zoom-in" data-aos-anchor-placement="top-center">
    <div class="row">
      <div class="col-lg-7">
        <a href="careers_tournaments" target="_blank"><img src="images/career_pic1.jpg" class="img-fluid" alt=""></a>
        <h6>Tournaments</h6>
      </div>
      <div class="col-lg-4">
        <!--<h5>Tour our offices</h5>
        <a href="careers_trainings" target="_blank"><img src="images/career_pic3.jpg" class="img-fluid" alt=""></a>
        <h6>Trainings</h6>-->
      </div>
      <div class="col-lg-1"></div>
    </div>

    <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-lg-4 m_top_40">
        <!--<a href="careers_field" target="_blank"><img src="images/career_pic4.jpg" class="img-fluid" alt=""></a>
        <h6>Field Visits</h6>-->
      </div>
      <div class="col-lg-7 m_top_40">
        <a href="careers_picnics" target="_blank"><img src="images/career_pic2.jpg" class="img-fluid" alt=""></a>
        <h6>Picnics</h6>
      </div>
    </div>
  </div>


      <div class="row">
        <div class="col-lg-12">
          <div class="m_bottom_65">
            <h2>play with us</h2>
            <div class="m_top_40">
              <p>We all need a break from work to rejuvenate ourselves. Thus, Signotron holds a Four-Quarters Play Calendar which maps four 3 month sessions of one sporting/cultural activity each. These sessions are planned as weekly interdepartmental matches with consecutive rounds that lead to the Finale and Prize distribution ceremony where the winners are awarded. We have provisions for Carrom and Table Tennis on our premises and we’re working on making more indoor facilities available. Marketing vs Production is a cricket match we all look forward to every year. We celebrate occasions like Rabindra Jayanti with cultural performances by our ever talented employees. We have gatherings like those at our Annual Picnic and Vishwakarma Puja where everybody brings their family along and we make merry with music, games and a hearty meal. </p>
              <p>We believe in making strong bonds between ourselves so that we bond better with our customers. People make processes, and also work those processes. So here at Signotron, we believe in prioritising our people.</p>
            </div>
          </div>
        </div>

       <div class="col-lg-12">
          <div class="nw_txt"><h2> we're hiring right now.</h2></div>
        </div>
      </div>

        <div class="row">

        <div class="col-sm-12 col-md-6 col-lg-6">
          <div class="career_inner_item wow bounceIn mt-5">
            <h4>Opening position: Application Engineer – 1 Nos. (Priority – High) </h4>

            <h6>Requirement : </h6>
            <h6><span>1 </span></h6>
            <h6>Experience  : </h6>
            <h6><span>
1. 2-5 years of experience in software development role.
2. Strong knowledge on C,C++.
3. Experience in QT/QML application development. 
4. Working knowledge on Communication protocols like UART,RS485,RS232 etc.
5. Strong debugging skills.
6. Experience in programming for microprocessor/microcontroller(PIC,LPC) based embedded devices.

 </span></h6>
                               
            <h6>Location : </h6>
            <h6><span>: Kolkata</span></h6>  
            <h6>Salary package: </h6>
            <h6><span>: As per industry standard</span></h6>   
            
            <div class="career_sec">
              <h5>Send your CV to
                 <a href="#">hrmanager@signotron.com</a> <br>
                 <a href="#">dimani@signotron.com</a>
              </h5>
            </div>
          </div>
        </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
          <div class="career_inner_item wow bounceIn mt-5">
            <h4>Opening position: Software Embedded Engineer – 1 Nos. (Priority – High)  </h4>

            <h6>Requirement : </h6>
            <h6><span>1 </span></h6>
            <h6>Experience  : </h6>
            <h6><span>
1. 2-5 years of experience in embedded software engineering role.
2. Strong knowledge on Embedded C,C++
3. Experience in programming for microprocessor/microcontroller (PIC,LPC) based embedded devices.
4. Working knowledge on Communication protocols like CAN,UART,RS485,RS232,SPI,I2C etc.
5. Strong debugging skills.
6. Sound understanding of reading datasheets and schematics of components.


 </span></h6>
                               
            <h6>Location : </h6>
            <h6><span>: Kolkata</span></h6>  
              <h6>Salary package: </h6>
            <h6><span>: As per industry standard </span></h6>   
            
            <div class="career_sec">
              <h5>Send your CV to
                 <a href="#">hrmanager@signotron.com</a> <br>
                 <a href="#">dimani@signotron.com</a>
              </h5>
            </div>
          </div>
        </div> 
            <div class="col-sm-12 col-md-6 col-lg-6">
          <div class="career_inner_item wow bounceIn mt-5">
            <h4>Opening position: Jr. Service Engineer Ernakulam – 1 Nos. (Priority – High) </h4>

            <h6>Requirement : </h6>
            <h6><span>1 Nos. </span></h6>
            <h6>Qualification : </h6>
            <h6><span>Diploma/ITI in Electronics / Electrical </span></h6>
            <h6>Experience  : </h6>
            <h6><span>
1. Good knowledge of power electronics devices (products like battery, charger, transformers etc.). 
2.  Previous Experience as Service Engineer or Equivalent post in Power Electronics Product manufacturing industries, 
3.  Industry Knowledge specially in Railways(Optional), Problem-Solving abilities.  Responsible to visit pan India based Railway sheds for maintenance and repairs. 
4   Location : Ernakulam, be Ernakulam based local person.
5.  Need to travel as required within Ernakulam and outstation. No branches in Ernakulam, will remotely join duty hrs from home.


 </span></h6>
                               
            
              <h6>Salary package: </h6>
            <h6><span>:As per industry standard </span></h6>   
           
              

             
             
            <div class="career_sec">
              <h5>Send your CV to
                 <a href="#">hrmanager@signotron.com</a> <br>
                 <a href="#">dimani@signotron.com</a>
              </h5>
            </div>
          </div>
        </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
          <div class="career_inner_item wow bounceIn mt-5">
            <h4>Opening position: Draughtsman (Mechanical) – 1 Nos   </h4>
            <h6>Qualification : </h6>
            <h6><span>Diploma/B.Tech : Electronics & Telecommunication / Electrical</span></h6>
            <h6>Experience  : </h6>
            <h6><span>
1.	2D Auto CAD Designing 
2.	1 – 2 yrs experience.



 </span></h6>
                               
            <h6>Location : </h6>
            <h6><span>: : Kolkata</span></h6>  
              <h6>Salary package: </h6>
            <h6><span>: As per industry standard </span></h6>   
            
              
              
             
            <div class="career_sec">
              <h5>Send your CV to
                 <a href="#">hrmanager@signotron.com</a> <br>
                 <a href="#">dimani@signotron.com</a>
              </h5>
            </div>
          </div>
        </div>
            
        <div class="col-sm-12 col-md-6 col-lg-6">
          <div class="career_inner_item wow bounceIn mt-5">
            <h4>Opening position: Jr. Quality Engineer</h4>
            <h4>Manpower Requirement – 2 Nos.</h4>
            <h6>Job Description: </h6>
            <h6><span>1.	1-2 yrs Experience in Quality Control Power Electronics industry
                      2.	ITI – Electronic / Electrical

</span></h6>
<b>
            <h6>Location : </h6>
            <h6><span>Kolkata</span></h6>
            <h6>Salary : </h6>
            <h6><span> As per industry standard</h6> 
            
            <h6> Qualification  : </h6>
            <h6><span>ITI – Electronic / Electrical</span></h6>


            <div class="career_sec">
              <h5>Send your CV to
                 <a href="#">hrmanager@signotron.com</a> <br>
            
              </h5>
            </div>
          </div>
        </div>
              </b>
        <!--
        <div class="col-lg-12"><div class="note_sec"><h5>Notes : Candidates who is not meeting the above requirement & Skills, please do not apply. Profile shall not be considered. </h5></div></div>
      </div> -->


      <!--<div class="row">
        <div class="col-sm-6 col-md-6 col-lg-3">
          <div class="career_inner_item wow bounceIn">
            <h3>2</h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Engineers</button>
            <h5>Kolkata / Bangalore </h5>
            <h5><a href="#">swati.dutta@signotron.com</a></h5>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-3">
          <div class="career_inner_item wow bounceIn">
            <h3>4</h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Designers</button>
            <h5>Kolkata </h5>
            <h5><a href="#">swati.dutta@signotron.com</a></h5>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-3">
          <div class="career_inner_item wow bounceIn">
            <h3>1</h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Customer Operations</button>
            <h5>Kolkata</h5>
            <h5><a href="#">swati.dutta@signotron.com</a></h5>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-3">
          <div class="career_inner_item wow bounceIn">
            <h3>3</h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Marketing</button>
            <h5>Bangalore</h5>
            <h5><a href="#">swati.dutta@signotron.com</a></h5>
          </div>
        </div>
      </div>-->
      <form method="post" enctype="multipart/form-data">
      <div class="cv_panel d-flex">
            <div class="left_panel" data-aos="fade-down" data-aos-anchor-placement="top-center">
              <img src="images/type.png" alt="" class="img-fluid">
            </div>
            <div class="right_panel" data-aos="fade-up" data-aos-anchor-placement="top-center">
              <h3>SUBMIT YOUR CV</h3>
              <div class="sml_line"></div>
              <div class="pt-4">
                <input type="file" name="fileToUpload" id="fileToUpload" class="nw_txt" required>
                <button type="submit" class="btn" name="submit">Submit</button>
              </div>
            </div>
      </div>
    </form>
  </div>
</section>




<section class="testimonials">
  <div class="container">


          <!--  owl-carousel start (copy js link & line from bottom & css link from top) -->
          <div class="col-md-12">
           <div class="top_txt"><h2>Employee Testimonials</h2></div>
            <div class="owl-carousel owl-theme">


               <div class="item">
                <div class="facultyBox">
                  <div class="row">
                    <div class="col-lg-12"><div class="red_box"></div></div>
                    <div class="col-lg-2"></div>
                    <div class="col-lg-3 pad-0"><img src="images/testimonial_pic2.jpg" alt="" /></div>
                    <div class="col-lg-5 pad-0">
                      <div class="txt_cont">
                        <h2>Siddhartha Ghosh</h2>
                        <h3>Software</h3>
                      </div>
                      <div class="testimonials_inner" ><p>For engineers, dealing with Power Electronics as well as Embedded Software makes Signotron an interesting place to work at. However, it's the efficient management and the congenial work environment that brings out the best in us and makes us look forward to another day at work</p></div>
                    </div>
                    <div class="col-lg-2"></div>
                  </div>
                </div>
              </div>

              <div class="item">
                <div class="facultyBox">
                  <div class="row">
                    <div class="col-lg-12"><div class="red_box"></div></div>
                    <div class="col-lg-2"></div>
                    <div class="col-lg-3 pad-0"><img src="images/testimonial_pic1.jpg" alt="" /></div>
                    <div class="col-lg-5 pad-0">
                      <div class="txt_cont">
                        <h2>Sibaji Ghosh</h2>
                        <h3>Marketing </h3>
                      </div>
                      <div class="testimonials_inner"><p>After working with different MNCs for almost 25 years, my workstation at Signotron allowed me to enjoy my responsibility, imply my beliefs & bring out my creativity. The ownership by the employees (yes it is employees and not the Employer) from the very grass root level surprised me all the years I am with Signotron. The top-most management is a friend, philosopher, and guide to the workforce and not just a ‘Boss’.</p></div>
                    </div>
                    <div class="col-lg-2"></div>
                  </div>
                </div>
              </div>

              <div class="item">
                <div class="facultyBox">
                  <div class="row">
                    <div class="col-lg-12"><div class="red_box"></div></div>
                    <div class="col-lg-2"></div>
                    <div class="col-lg-3 pad-0"><img src="images/testimonial_pic3.jpg" alt="" /></div>
                    <div class="col-lg-5 pad-0">
                      <div class="txt_cont">
                        <h2>Priyanka Biswas</h2>
                        <h3>Accounts</h3>
                      </div>
                      <div class="testimonials_inner"><p>Working in Signotron helps me grow professionally and personally. It gives me something to look forward to.</p></div>
                    </div>
                    <div class="col-lg-2"></div>
                  </div>
                </div>
              </div>
 
            </div>

            <div class="grey_line"><span></span></div>
          </div>
          <!-- owl-carousel end -->
  </div>
</section>


<!-- contact_section -->
<section class="contact_section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2>contact us :</h2>
      </div>
      <div class="col-lg-7">
        <div class="row">
          <div class="col-lg-8">
            <h3>Location</h3>
            <p><i class="fas fa-map-marker-alt"></i> Signotron Tower Plot J1-6, Block - EP, Sector - V, Salt Lake Electronics Complex, Kolkata - 700 091</p>
            <h3>Contact</h3>
            <p><i class="fas fa-phone-volume"></i> 03323573481</p>
            <p><a href="#"><i class="fas fa-envelope-open"></i> signotron@gmail.com</a></p>
          </div>
          <div class="col-lg-4">
            <h3>Follow Us</h3>
            <div class="icons">
             <a href="https://www.facebook.com/SignotronIndia" target="_blank"><img src="images/icon1.png" alt="" class="hvr-bounce-out"></a>
             <a href="https://twitter.com/signotron" target="_blank"><img src="images/icon2.png" alt="" class="hvr-bounce-out"></a>
             <a href="https://www.linkedin.com/company/signotron/" target="_blank"><img src="images/icon3.png" alt="" class="hvr-bounce-out"></a>
             <a href="mailto:signomail@signotron.com" target="_blank"><img src="images/icon4.png" alt="" class="hvr-bounce-out"></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14736.860012512112!2d88.4361541!3d22.5710606!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3d0301ef6c99d881!2sSignotron%20India%20Pvt.%20Ltd!5e0!3m2!1sen!2sin!4v1611731004916!5m2!1sen!2sin" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      </div>
    </div>
  </div>
</section>



<!-- Scroll-Back-To-top-Button start( copy css from style & js lines from bottom ) -->
<div class="scrltop"><button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-chevron-up"></i></button></div>
<!-- Scroll-Back-To-top-Button end -->
<!-- footer -->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <p>Copyright © 2021 Signotron. All Rights Reserved.</p>
     </div>
   </div>
 </div>
</footer>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">HEADING</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

  



  <!-- Scroll-Back-To-top-Button js start -->
<script type="text/javascript">
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
<!-- Scroll-Back-To-top-Button js end -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-1.12.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>  
    
    <!-- owl carousel js start -->
    <script src="js/owl.carousel.js"></script>   
      <script>
      var owl = $('.owl-carousel');
      owl.owlCarousel({
        loop:true,
        nav:true,
        margin:0,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },            
            960:{
                items:1
            },
            1200:{
                items:1
            }
        }
    });
    </script>
    <!-- owl carousel js end -->

  
    <!-- SLIDE ANIMATION JS START -->
    <script src="js/wow.js"></script>
    <script>
    var wow = new WOW ({
    boxClass:     'wow',      // animated element css class (default is wow)
    animateClass: 'animated', // animation css class (default is animated)
    offset:       120,          // distance to the element when triggering the animation (default is 0)
    mobile:       false,       // trigger animations on mobile devices (default is true)
    live:         true        // act on asynchronously loaded content (default is true)
      }
    );
    wow.init();
    </script>     
    <!-- SLIDE ANIMATION JS END -->

    <!-- AOS JS  -->
    <script>
      AOS.init();
    </script>
  </body>
</html>