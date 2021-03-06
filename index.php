<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Loukianos Taverna - Greek Restaurante</title>
    <meta name="description" content="Loukianos Taverna - Greek Restaurant">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="js/menuControl.js"></script>
    <script src="js/login.js"></script> 
    <script src="js/formValidation.js"></script>
    <script src="js/nutritionguide.js"></script>
    
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
                <ul id = "menuoptions" class="nav navbar-nav">
                    <li id="mhome" name="mhome"><a href="#">home</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">menu <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li id="mlunch" name="mlunch"><a href="#">lunch</a></li>
                                <li id="mdinner" name="mdinner"><a href="#">dinner</a></li>
                            </ul>
                    </li>
                    <li id="maboutus" name="maboutus"><a href="#">about us</a></li>
                    <li id="mcontactus" name="mcontactus"><a href="#">contact us</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#" data-toggle="modal" data-target="#login" id="loginuser">log in    
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        </a>
                    </li>
   
                    <li name="mshopping-cart" id="mshopping-cart"></li>
                    <li name="madmin" id="madmin"></li>
                </ul>
            </div>
        </div>
    </nav>
  
    <div id="home">
      <div class="container-fluid">
        <div class="jumbotron white text-center">
            <h1>Meet our specialities</h1>
            <?php
                require 'php/scripts/init.php';
                loadScripts(); 
                $p = new ProductManager();
                $p->productListToHTML();
            ?>
         </div> 
        </div>
      </div>
    </div>
  
  <div id="lunch">
    <div class="container-fluid">
        <div class="jumbotron white text-center">
            <h1>Lunch</h1>
            <?php
                $p = new ProductManager();
                $p->productListToHTML('lunch');
            ?> 
        </div>
    </div>
  </div>

  <div id="dinner">
    <div class="container-fluid">
        <div class="jumbotron white text-center">
            <h1>Dinner</h1>
            <?php
                $p = new ProductManager();
                $p->productListToHTML('dinner');
            ?> 
        </div>
    </div>
  </div>
  
  
  <div id="aboutus">
    <div class="container-fluid">
        <div class="jumbotron white text-center">
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
                        <div class ="row">ERS
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
    <div id="shopping-cart">
      <div class="container-fluid">
          <div class="jumbotron white">
                <h1>Shopping cart</h1>
                <div id="myShoppingCart"></div>
                <button class = "btn-success" type="button" id="buy">Buy</button>
                <button class = "btn-info pull-right" type="button" id="continue_shopping">Continue shopping</button>
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
                    <a href="#" data-toggle="modal" data-target="#signup" data-backdrop="static" data-keyboard="false">sign up</a>
                </div>    
                <div class="modal-body">
                    <form id="loginForm">
                        <p><input type="text" id="loginUsername" name="username" placeholder="Username"></p>
                        <p><input type="password" name="password" placeholder="Password"></p>
                    </form>
                    <p id="loginError"></p>  
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
                    <form id="signupForm" tag="signup" onclick="return validateForm()">
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
                                <input id="province" type="text" name="province" required placeholder="Province"/><br />
                                <input id="city" type="text" name="city" required placeholder="City"/><br />
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
                        <input id="signupBtn" type="submit" value="ok">
                        <div id="errorSignUp"></div>
                    </form>  
                </div>
            </div>
        </div>
    </div>

    <div id="userinfo" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal">×</button>
                    <p id="userinfoName"></p>
                    <a href="#" id="logout">log out</a>
                </div>    
                <div class="modal-body">
                    <form id="userinfoForm" name="userinfoForm" method="post" action="send_form_email.php">
                        First Name: <input name="firstname" id="userinfoFname" type="text" maxlength="50" size="30" ><br/><br/>
                        Last Name: <input name="lastname" id="userinfoLname" type="text" maxlength="50" size="30" ><br/><br/>
                        Email: <input name="email" id="userinfoEmail" type="email" maxlength="50" size="30"><br/><br/>
                        Address: <input name="address" id="userinfoAddress" type="text" maxlength="50" size="30"><br/><br/>
                        Province: <input name="province" id="userinfoProvince" type="text" maxlength="50" size="6">
                        Zip Code: <input name="zipcode" id="userinfoZipcode" type="text" maxlength="50" size="6"><br/><br/>
                        Phone: <input name="phonenumber" id="userinfoPhone" type="text" maxlength="50" size="10"><br/><br/>
                        City: <input name="city" id="userinfoCity" type="text" maxlength="50" size="10"><br/><br/>
                        Password: <input name="password" id="userinfoPwd" type="password" maxlength="50" size="30"><br/><br/>
                    </form>
                    <p id="userinfoFeedback"></p>
                </div>
                <div class="modal-footer">
                    <input id="updateBtn" type="submit" value="update">
                </div>    
            </div>
        </div>
    </div>
    <div id = "nutrition-guide"></div>
</body>
</html>
