<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Loukianos Taverna - Greek Restaurante</title>
  <meta name="description" content="Loukianos Taverna - Greek Restaurant">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <script src="js/menuControl.js"></script>
  <script src="js/login.js"></script> 
  <script src="js/formValidation.js"></script>
  <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
           <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img src="img/logo/logo_210x50.png" alt="logo">
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li id="mhome"><a href="#">home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">menu <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li id="mlunch"><a href="#">lunch</a></li>
                            <li id="mdinner"><a href="#">dinner</a></li>
                        </ul>
                </li>
                <li id="maboutus"><a href="#">about us</a></li>
                <li id="mcontactus"><a href="#">contact us</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="#" data-toggle="modal" data-target="#login" id="loginuser">
                <?php  
                if(session_status() == PHP_SESSION_ACTIVE)
                    echo $_SESSION["firstname"] . " " . $_SESSION["lastname"];
                else
                    echo "log in";    
                ?>
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
  
  <div id="home">
    <div class="container-fluid">
        <div class="jumbotron white">
            <h1 id="mhome">Meet our specialities</h1> 
            <div class="row">
                <div class="col-md-4 hidden-xs border"><img src="img/img-dishes/lunch/spanakopita-150x150.jpg"><br/>Spanakopita
                    <div class="btn btn-info btn-sm">
                        Buy
                    </div>
                </div>
                <div class="col-md-4 visible-xs border"><b>Spanakopita</b> - A spinach pie made with layers of phyllo and a filling of seasoned spinach, onions, and feta<br/>
                    <div class="btn btn-info btn-sm">
                        Buy
                    </div>
                </div>
                <div class="col-md-4 hidden-xs border"><img src="img/img-dishes/lunch/turkey-pita-150x150.jpg"><br/>Turkey Pita
                    <div class="btn btn-info btn-sm">
                        Buy
                    </div>
                </div>
                <div class="col-md-4 visible-xs border"><b>Turkey Pita</b> - smoked turkey breast, tomatoes, cucumbers and creamy tzatziki dressing<br/>
                    <div class="btn btn-info btn-sm">
                        Buy
                    </div>
                </div>
                <div class="col-md-4 hidden-xs border"><img src="img/img-dishes/dinner/gyros-150x150.jpg"><br/>Gyros
                    <div class="btn btn-info btn-sm">
                        Buy
                    </div>
                </div>
                <div class="col-md-4 visible-xs border"><b>Gyros</b> - roasted lamb, onion, and tomato on pita bread<br/>
                    <div class="btn btn-info btn-sm">
                        Buy
                    </div>
                </div>
            </div>    
            <div class="row">
                <div class="col-md-4 hidden-xs border"><img src="img/img-dishes/dinner/souvlaki-150x150.jpg"><br/>Souvlaki
                    <div class="btn btn-info btn-sm">
                        Buy
                    </div>
                </div>
                <div class="col-md-4 visible-xs border"><b>Souvlaki</b> - grilled chicken, olives, tomatoes, served with rice and a side of tzatziki<br/>
                    <div class="btn btn-info btn-sm">
                        Buy
                    </div>
                </div>
                <div class="col-md-4 hidden-xs border"><img src="img/img-dishes/dinner/pastitsio-150x150.jpg"><br/>Pastitsio
                    <div class="btn btn-info btn-sm">
                        Buy
                    </div>
                </div>
                <div class="col-md-4 visible-xs border"><b>Pastitsio</b> - Luscious layers of pasta, seasoned ground beef and pork, topped with a creamy yogurt béchamel sauce<br/>
                    <div class="btn btn-info btn-sm">
                        Buy
                    </div>
                </div>
                <div class="col-md-4 hidden-xs border"><img src="img/img-dishes/lunch/fish-150x150.jpg"><br/>Fish
                    <div class="btn btn-info btn-sm">
                        Buy
                    </div>
                </div>
                <div class="col-md-4 visible-xs border"><b>Fish</b> - baked halibut, tomatoes, onions, lemon, olives, lettuce<br/>
                    <div class="btn btn-info btn-sm">
                        Buy
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

  <div id="lunch">
    <div class="container-fluid">
        <div class="jumbotron white">
            <h1>Lunch</h1> 
            <div class="row">
                <div class="col-md-4 hidden-xs border"><img src="img/img-dishes/lunch/spanakopita-150x150.jpg"><br/>Spanakopita
                    <div class="btn btn-info btn-sm">
                        Buy
                    </div>
                </div>
                <div class="col-md-4 visible-xs border"><b>Spanakopita</b> - A spinach pie made with layers of phyllo and a filling of seasoned spinach, onions, and feta<br/>
                    <div class="btn btn-info btn-sm">
                        Buy
                    </div>
                </div>
                
                <div class="col-md-4 hidden-xs border"><img src="img/img-dishes/lunch/fish-150x150.jpg"><br/>Fish
                    <div class="btn btn-info btn-sm">
                        Buy
                    </div>
                </div>
                <div class="col-md-4 visible-xs border"><b>Fish</b> - baked halibut, tomatoes, onions, lemon, olives, lettuce<br/>
                    <div class="btn btn-info btn-sm">
                        Buy
                    </div>
                </div>
                
                <div class="col-md-4 hidden-xs border"><img src="img/img-dishes/lunch/turkey-pita-150x150.jpg"><br/>Turkey Pita
                    <div class="btn btn-info btn-sm">
                        Buy
                    </div>
                </div>
                <div class="col-md-4 visible-xs border"><b>Turkey Pita</b> - smoked turkey breast, tomatoes, cucumbers and creamy tzatziki dressing<br/>
                    <div class="btn btn-info btn-sm">
                        Buy
                    </div>
                </div>                
            </div>
            </div>    
            <div class="row">
                <!--<div class="col-md-4 border">.col-md-1</div>-->
                <!--<div class="col-md-4 border">.col-md-1</div>-->
                <!--<div class="col-md-4 border">.col-md-1</div>-->
            </div>
        </div>
    </div>
  </div>

  <div id="dinner">
    <div class="container-fluid">
        <div class="jumbotron white">
            <h1>Dinner</h1> 
            <div class="row">
                <div class="col-md-4 hidden-xs border"><img src="img/img-dishes/dinner/gyros-150x150.jpg"><br/>Gyros
                    <div class="btn btn-info btn-sm">
                        Buy
                    </div>
                </div>
                <div class="col-md-4 visible-xs border"><b>Gyros</b> - roasted lamb, onion, and tomato on pita bread<br/>
                    <div class="btn btn-info btn-sm">
                        Buy
                    </div>
                </div>
                
                <div class="col-md-4 hidden-xs border"><img src="img/img-dishes/dinner/souvlaki-150x150.jpg"><br/>Souvlaki
                    <div class="btn btn-info btn-sm">
                        Buy
                    </div>
                </div>
                <div class="col-md-4 visible-xs border"><b>Souvlaki</b> - grilled chicken, olives, tomatoes, served with rice and a side of tzatziki<br/>
                    <div class="btn btn-info btn-sm">
                        Buy
                    </div>
                </div>
            
                <div class="col-md-4 hidden-xs border"><img src="img/img-dishes/dinner/pastitsio-150x150.jpg"><br/>Pastitsio
                    <div class="btn btn-info btn-sm">
                        Buy
                    </div>
                </div>
                <div class="col-md-4 visible-xs border"><b>Pastitsio</b> - Luscious layers of pasta, seasoned ground beef and pork, topped with a creamy yogurt béchamel sauce<br/>
                    <div class="btn btn-info btn-sm">
                        Buy
                    </div>
                </div>
            </div>    
            <div class="row">
                <!--<div class="col-md-4 border">.col-md-1</div>-->
                <!--<div class="col-md-4 border">.col-md-1</div>-->
                <!--<div class="col-md-4 border">.col-md-1</div>-->
            </div>
        </div>
    </div>
  </div>         
  
  <div id="aboutus">
    <div class="container-fluid">
        <div class="jumbotron white">
            <h1>About Us</h1> 

                <div class="row">
                    <div class="col-md-4">    
                        <p>At Loukianos Taverna we offer traditional Greek fare made from generations of authentic family recipes. All of our dishes are made in-house from scratch. We offer slow roasted lamb, spanakopita, mousaka and traditional souvlaki. Amongst all of our traditional favourites, we also offer pasta,steaks and seafood.</p><br/>
                        <p>We offer belly dancing every Saturday night-let the musical rhythms whisk you away with the spirit of the Mediterranean. Call to reserve your table today.</p><br/>                        
                        <p>Free parking available evenings after 6pm.</p>
                    </div>
                    <div class="col-md-4">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m10!1m3!1d2570.763379493194!2d-119.49239392988589!3d49.88447000667621!2m1!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x537df4a8e6048925%3A0xea1d339c913714a8!2sYamas+Taverna!5e0!3m2!1sen!2sca!4v1406061196990" width="375" height="375" frameborder="0" style="border:0"></iframe>
                    </div>    
                    <div class="col-md-4">
                        <p><strong>Visit us!</strong></p><br/>
                                                    
                        <p><strong>Opening Hours</strong></p>
                        </p>4:30PM - 10:00PM Everyday</p><br/>

                        <p><strong>Address</strong></p>
                        <p>Yamas Greek Restaurant</p>
                        <p>1630 Ellis St</p>
                        <p>Kelowna, BC V1Y 8L1</p><br/>

                        <p><strong>Contact Info</strong></p><br/>
                        <p>(250) 763 5823</p>
                        
                    </div>    
                </div>
        </div>
    </div>
  </div>
  
  <div id="contactus">
      <div class="container-fluid">
          <div class="jumbotron white">
                <h1>Contact Us</h1> 
                <div class="row">
                    <div class="col-lg-6">
                        <form name="contactform" method="post" action="send_form_email.php">
                            <input id="name" type="text" name="name" maxlength="50" size="30" placeholder="Name"><br/><br/>
                            <input id="email" type="email" name="email" required placeholder="Email"/><br/><br/>
                            <textarea id="comments" name="comments" maxlength="1000" cols="25" rows="6" placeholder="comments"></textarea><br/>
                            <input type="submit" value="ok">
                        </form>
                    </div> 
                    <div class="col-lg-6">
                        <h3>connect with us on...</h3><br/><br/>
                        <div class ="row">
                            <div class="col-lg-4">
                                <a href="#"><img src="img/logo/facebook.jpeg" alt="Facebook"></a>
                            </div>    
                            <div class="col-lg-4">
                                <a href="#"><img src="img/logo/instagram.jpeg" alt="Instagram"></a>
                            </div>
                            <div class="col-lg-4">
                                <a href="#"><img src="img/logo/twitter.png" alt="Twitter"></a>
                            </div>                  
                        </div>
                    </div>
                </div>
            </div>
        </div>          
    </div>
  <!-- login modal -->
    <div id="login" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal">×</button>
                    <h2 class="modal-title left">log in</h2>
                    <a href="#" data-toggle="modal" data-target="#signup">sign up</a>
                </div>    
                <div class="modal-body">
                    <form id="loginForm">
                        <p><input type="text" name="username" placeholder="Username"></p>
                        <p><input type="password" name="password" placeholder="Password"></p>
                    </form>  
                </div>
                <div class="modal-footer">
                    <input id="loginBtn" type="submit" value="ok">
                </div>    
            </div>
        </div>
    </div>
    <!-- signup modal -->
    <div id="signup" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                                    <button class="close" data-dismiss="modal">×</button>
                    <h2 class="modal-title">sign up</h2>    
                </div>
                <div class="modal-body">
                    <form tag="signup" onclick="return validateForm()">
                        <div class="row">
                            <div class="col-xs-6">
                                <input id="username" type="username" name="username" required placeholder="Username"/>
                            </div>
                            <div class="col-xs-6">
                                <p id="error_username" class="error"></p>
                            </div>
                        </div><br/>
                        <div class="row">
                            <div class="col-xs-6">
                                <input id="fname" type="fname" name="fname" required placeholder="First Name"/>
                            </div>
                            <div class="col-xs-6">
                                <p id="error_fname" class="error"></p>
                            </div>
                        </div><br/>                    
                        <div class="row">
                            <div class="col-xs-6">
                                <input id="lname" type="lname" name="lname" required placeholder="Last Name"/>
                            </div>
                            <div class="col-xs-6">
                                <p id="error_lname" class="error"></p>
                            </div>
                        </div><br/>                         
                        <div class="row">
                            <div class="col-xs-6">
                                <input id="password" type="password" name="pwd" required placeholder="Password"/>
                            </div>
                            <div class="col-xs-6">
                                <p id="error_password" class="error"></p>
                            </div>
                        </div><br/>                        
                        <div class="row">
                            <div class="col-xs-6">
                                <input id="email" type="email" name="email" required placeholder="Email"/>
                            </div>
                            <div class="col-xs-6">
                                <p id="error_email" class="error"></p>
                            </div>
                        </div><br/>                        
                        <div class="row">
                            <div class="col-xs-6">
                                <input id="tel" type="tel" name="tel" required placeholder="Telephone"/>
                            </div>
                            <div class="col-xs-6">
                                <p id="error_tel" class="error"></p>
                            </div>
                        </div><br/>                        
                        <div class="row">
                            <div class="col-xs-6">
                                <input id="address" type="address" name="add" required placeholder="Address"/>
                            </div>
                            <div class="col-xs-6">
                                <p id="error_address" class="error"></p>
                            </div>
                        </div><br/>                
                        <div class="row">
                            <div class="col-xs-6">
                                <input id="postcode" type="postcode" name="ptc" required placeholder="Post Code"/>
                            </div>
                            <div class="col-xs-6">
                                <p id="error_postcode" class="error"></p>
                            </div>
                        </div><br/>                
                        <input id="submitBtn" type="submit" value="ok">
                    </form>  
                </div>
            </div>
        </div>
    </div>
    <div id="userinfo" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p id="userinfoName">
                        <?php  
                            session_start();
                            echo $_SESSION["firstname"] . " " . $_SESSION["lastname"];
                        ?>  
                    </p>
                    <a href="#" id="logout">log out</a>
                </div>    
                <div class="modal-body">
                    <form id="userinfoForm" name="userinfoForm" method="post" action="send_form_email.php">
                        First Name: <input name="firstname" id="userinfoFname" type="text" maxlength="50" size="30" 
                        value= "<?php echo $_SESSION["firstname"] ?>" disabled><br/><br/>
                        
                        Last Name: <input name="lastname" id="userinfoLname" type="text" maxlength="50" size="30"
                        value= "<?php echo $_SESSION["lastname"] ?>" disabled><br/><br/>
                        
                        Email: <input name="email" id="userinfoEmail" type="email" maxlength="50" size="30"
                        value= "<?php echo $_SESSION["email"] ?>"><br/><br/>
                        
                        Address: <input name="address" id="userinfoAddress" type="text" maxlength="50" size="30"
                        value= "<?php echo $_SESSION["address"] ?>"><br/><br/>
                        
                        Province: <input name="province" id="userinfoProvince" type="text" maxlength="50" size="6"
                        value= "<?php echo $_SESSION["province"] ?>">
                        
                        Zip Code: <input name="zipcode" id="userinfoZipcode" type="text" maxlength="50" size="6"
                        value= "<?php echo $_SESSION["zipcode"] ?>"><br/><br/>
                        
                        Phone: <input name="phonenumber" id="userinfoPhone" type="text" maxlength="50" size="10"
                        value= "<?php echo $_SESSION["phonenumber"] ?>"><br/><br/>
                        
                        City: <input name="city" id="userinfoCity" type="text" maxlength="50" size="10"
                        value= "<?php echo $_SESSION["city"] ?>"><br/><br/>
                        
                        Password: <input name="password" id="userinfoPwd" type="password" maxlength="50" size="30"
                        value= "<?php echo $_SESSION["password"] ?>"><br/><br/>
                    </form>
                    <p id="userinfoFeedback"></p>
                </div>
                <div class="modal-footer">
                    <input id="updateBtn" type="submit" value="update">
                </div>    
            </div>
        </div>
    </div>
</body>
</html>