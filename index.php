
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="style.css">
</head>  
  <body >
  <div class="sticky">
    <div class="head-nav">
  
      <div class="container" id="head-cont">
          <div class="row">
              <div class="col-4"> 
                  <h1>Product</h1>
              </div> 
              <div class="  col-8 text-right ">
                  <nav class="">
                    <div id="">
                      <input type="checkbox" id="chk" />
                      <label for="chk" class=" show-btn ">
                        <i class="fa fa-bars"></i>
                      </label>
                   <ul id="navbar">
                      <li><a href="#top">home</a></li>
                      <li><a href="#product">Product</a></li>
                      <li><a href="#notified">Notification</a></li>
                      <li><a href="#Contact">contact</a></li>
                      <li><a href="login.php"><span>join</span></a></li>
                      <label for="chk" class="hide-btn">
                        <i class="fa fa-times"></i>
                      </label>
                     
                  </ul>
                  
                </div>
                  </nav>
              
              </div>
          </div>
      </div>
    </div>
  </div>
  <a name="top"></a>
    <div class="main">
        <div class="container">
          <div class="row">
            <div class="col-4 text-center ">
                <div>
                <h1>Product Demand Analysis Website</h1>
                </div>
                <div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, esse.</p>
                </div>
             </div>
           <!--- <div class="col-8 text-right" id="search">
              <input type="text"placeholder="Search">
              <button class="btn">Search</button>
            </div>-->
           </div>
      </div>
    </div> 
    <a name="product"></a>
 <div class="product"id="Product">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-6 text-center">
            <h5>popular product</h5>
            <h2>Our the product</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti soluta aut modi. Voluptatem, aut reprehenderit. Ipsum, voluptate aspernatur. Iure dicta fugiat porro voluptatibus?</p>
          </div>
        </div>
<div class="row">
  <div class="col-lg-4 col-md-6 mb-5">
    <div class="product-item">
      <div class="  block-20 "style="background-image:url('img/camera.jpg');" >
      </div>
      <h4>Electronics</h4>
      <?php
      include('session.php');
    
      if(!isset($_SESSION['login_id'])){
      header("location: login.php"); 
      }
      else{
     echo '<p> <a href="About_us.php" class="item"> + Explore</a></p>';
      }
     ?>
    </div></div>
            
    <div class="col-lg-4 col-md-6 mb-5">
      <div class="product-item">
        <div class="block-20" style="background-image:url('img/sofa.jpg');"></div>
        <h4>Wood</h4>
       <p> <a href="#" class="item"> + Explore</a></p>
      </div></div>
        <div class="col-lg-4 col-md-6 mb-5">
          <div class="product-item">
            <div class="block-20" style="background-image:url('img/product1.jpg');"></div>
           <h4>FOOTWEAR</h4>
            <p> <a href="#" class="item"> + Explore</a></p>
          </div></div> 
        </div>
      </div>
  </div>

  <a name="notified"></a>
  <h1 class="ha">Notification</h1>
  <div class="site-blocks-cover inner-page-cover overlay get-notification"  style="background-image:linear-gradient(45deg,rgba(154, 81, 255,0.6) 0%,rgba(251, 131, 181,0.9)100%), url(img/hero_3.jpg); background-attachment: fixed;" data-aos="fade">
    <div class="container">
     
      <div class="row align-items-center justify-content-center">
        <form class="col-md-7 text-white" method="post">
          <h2>Get notified on each updates.</h2>
          <div class="d-flex mb-4">
            <input type="text" class="form-control rounded-0" placeholder="Enter your email address">
            <input type="submit" class="btn btn-white btn-outline-white rounded-0" value="Subscribe">
          </div>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat commodi veniam doloremque ducimus tempora.</p>
        </form>
      </div>
    </div>
  </div>
 
<h1 class="ha">Contact</h1>
<a name="Contact"></a>
  <footer class="site-footer text-silver" >
    <div class="container">
          <div class="row">
            <div class="col-md-4">
              <h2 >About Us</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque facere laudantium magnam voluptatum autem. Amet aliquid nesciunt veritatis aliquam.</p>
            </div>
            <div class="col-md-4 ">
              <h2 >Quick Links</h2>
              <ul class="list-styled">
                <li><a href="About_us.html">About the product</a></li>
                <li><a href="#">Contact </a></li>
              </ul>
            </div>
            <div class="col-md-4 ">
              <h2 >Follow Us</h2>
              <a href="#" class="footer-icon"><span class="fa fa-facebook"></span></a>
              <a href="#" class="footer-icon"><span class="fa fa-twitter"></span></a>
              <a href="#" class="footer-icon"><span class="fa fa-instagram"></span></a>
              <a href="#" class="footer-icon"><span class="fa fa-linkedin"></span></a>
            </div>
          </div>
        </div> 
  </footer>

  
</body>
</html>