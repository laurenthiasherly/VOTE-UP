<!doctype html>
<html class="no-js" lang="">
    <head>
        <title>VANARTAS STUDENT MOCK PROJECT SITE - MARK YOUR VOTE UP</title>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <meta name="description" content="This is a student exercise website for the Vancouver Institute of Media Arts (www.vanarts.com)">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/main.css">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
        
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="js/vendor/foundation.min.js" type="text/javascript"></script>
        
    </head>
    
    <body>
        <header class="page-header column large-12 medium-12 small-12 padding-none">
            
            
            <!-- ============================================================
                            THE TOP FIXED NAVIGATION BAR 
            ================================================================= -->
            
            
            <nav class="column large-12 show-for-large padding-none">
                <ul class="navigation center">
                    <li class="column large-1 medium-1 small-9 nav">                       
                        <a href="index.php"> 
                            <img src="img/homepage/logo-white.png" alt="the logo" 
                                 class="nav-logo">
                        </a>
                    </li>
                    <li class="column large-2 medium-2 nav nav-conservative ">                       
                        <a href="parties.php?party=Conservative" class="active1" id="nav-conservative"> Conservative </a>
                    </li>
                      <li class="column large-2 medium-2 nav nav-democratic">                      
                        <a href="parties.php?party=Democratic" id="nav-democratic"> Democratic </a>
                    </li>
                    <li class="column large-2 medium-2 nav nav-green">                       
                        <a href="parties.php?party=Green" id="nav-green"> Green </a>
                    </li>
                    <li class="column large-2 medium-2 nav nav-liberal">                       
                        <a href="parties.php?party=Liberal" id="nav-liberal"> Liberal </a>
                    </li>
                    <li class="column large-2 medium-2 nav1">                       
                        <a href="mp.php"> Who's my MP </a>
                    </li>
                    <li class="column large-1 medium-1 nav2">                       
                        <a id="subscribe-button"> Subscribe </a>
                    </li>
                    
                </ul>   
            </nav>
            
            
            <!-- ============================================================
                        THE SUBSCRIBE SLIDEDOWN FORM FOR DESKTOP 
            ================================================================= -->
            
            <div class="column large-12 show-for-large padding-vertical center" id="subscribe-box">
                <div class="column large-2 show-for-large padding-none center ">
                    <h4> Subscribe for Updated News! </h4>

                </div>

                <div class="column large-10 show-for-large padding-none center ">
                    
                    
                    
                    <?php



                        if(isset($_POST["name"]) AND $_POST["email"] AND $_POST["subscribe"] != ""){

                            email($_POST["email"], $_POST["name"]);

                        }

                        else{


                            echo "<form method='post' action='' >";
                            echo '<ul class="subscription center">';
                            echo '<li>';
                            
                                echo '<label for="theName"> Name </label>';

                                echo  '<input type="text" name="name" id="theName"/>  ';

                            echo '</li><li>';

                                echo '<label for="theEmail"> Email </label>';

                                echo '<input type="text" name="email" id="theEmail"/> ';

                            echo '</li><li>';

                                echo ' <input type="submit" name="subscribe" value="Subscribe"
                                       class="button"/>  ';

                            echo "</li>";

                            echo "</ul>";
                            echo "</form>";


                            if(isset($_POST["name"]) AND $_POST["email"] AND $_POST["subscribe"] == "") { 

                                echo "<p>Please insert name and email address </p>"; 
                            }

                        }



                        function email($email, $name){

                        $to = $email;
                        $subject = "Newsletter Subscription";

                        $message =  "<body> <h1> Hallo! " . $name . "
                         </h1> <br><br> 
                         <h2> Thank you for subscribing to our weekly newsletter </h2>
                         <h3> We will update you about interesting and relevant information every Monday and Thursday </h3>  </body>";

                        $headers = "MIME-Version:1.0\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8\r\n";             

                        $headers .= "From: laurenthiasherly@gmail.com \r\n";

                        $didItSend = mail($to, $subject, $message, $headers);


                        if($didItSend == true){
                            echo "<p> Email sent successfully </p>";
                        }
                        else{
                            echo "<p> Email failed </p>";
                        }

                    }


                    ?>

                    <form method='post' action='' >

                        <ul class="subscription center">
                            <li>
                                <label for="theName"> Name </label>
                                <input type="text" name="name" id="theName"
                                       />     
                            </li>
                            <li>
                                <label for="theEmail"> Email </label>
                                <input type="text" name="email" id="theEmail"
                                       />     
                            </li>
                            <li>
                                <input type="submit" name="subscribe" value="Subscribe"
                                       class="button"/>     
                            </li>
                        </ul>
                    </form>            
                </div>
            </div>
    
            
            
            <!-- ============================================================
                        THE NAVIGATION BAR FOR MOBILE AND TABLET  
            ================================================================= -->
            
            <div class="column medium-12 small-12 padding-none center hide-for-large">
                <nav>
                    <ul class="navigation">
                        <li class="column large-4 medium-1 small-9 nav">                       
                            <a href="index.php"> 
                                <img src="img/homepage/logo-white.png" alt="the logo" 
                                     class="nav-logo-mobile">
                            </a>
                        </li>
                        <li>
                            <!-- =======THE HAMBURGER BUTTON ============= --> 
                            
                            <a class="mobile-menu large-8">
                                <i class="fa fa-bars fa-2x" aria-hidden="true">
                            </i></a>
                        </li>
                    </ul>    
                </nav>
            </div>
            
            
            <!-- =======THE DROP DOWN MENU FROM THE HAMBURGER BUTTON ============= --> 
            
            
            <div id="menu-control" class="column hide-for-large medium-12 small-12 padding-none">
                <ul class="navigation-mobile center padding-none">

                    <li class="column medium-12 small-12 padding-vertical nav-conservative">                       
                        <a href="parties.php?party=Conservative" id="nav-conservative"> Conservative </a>
                    </li>
                      <li class="column medium-12 small-12 padding-vertical nav-democratic">                       
                        <a href="parties.php?party=Democratic" id="nav-democratic"> Democratic </a>
                    </li>
                    <li class="column medium-12 small-12 padding-vertical nav-green">                     
                        <a href="parties.php?party=Green" id="nav-green"> Green </a>
                    </li>
                    <li class="column medium-12 small-12 padding-vertical nav-liberal">                       
                        <a href="parties.php?party=Liberal" id="nav-liberal"> Liberal </a>
                    </li>
                    <li class="column medium-12 small-12 padding-vertical nav1-mobile">                       
                        <a href="mp.php"> Who's my MP </a>
                    </li>
					<li class="column medium-12 small-12 padding-vertical nav1-mobile show-for-small-only">                       
                        <a class="see-you-vote"> See your vote </a>
                    </li>
                    <li class="column medium-12 small-12 padding-vertical nav2-mobile">                       
                        <a href="subscribe.php"> Subscribe </a>
                    </li>
                    
                </ul>   
                
            </div>
            
            
            <!-- ============================================================
                        THE COMPARISON PARTY FOR MOBILE VERSION  
            ================================================================= -->
            
            <?php 
                if(!isset($comparisonmobile)){
                    echo '<div class="column see-your-vote center padding-none" >
                            <div class="column padding-none center arrow-down" data-status="open" id="arrow-down">
                                <i class="fa fa-sort white" aria-hidden="true"> </i>
                            </div>
                            <h3 data-direct="filter0" id="filterShow" class="show-for-large"> COMPARE PARTY! </h3>
                            <a class="" href="comparisonmobile.php"><h3 data-direct="filter0"> COMPARE PARTY! </h3></a>
                        </div>';
                }
            ?>
            
            
        </header>
        
        
        
