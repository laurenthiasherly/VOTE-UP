<?php include "partials/header.php"; ?>

<div class="column hide-for-large medium-12 small-12 padding-none center sub-page background">

    
    <div class="column large-12 medium-12 small-12 padding-vertical center subscription-form">
        <h1> Subscription </h1>
        
        
        
        <?php


                
                if(isset($_POST["name"]) AND $_POST["email"] AND $_POST["subscribe-mobile"] != ""){
                     
                    email($_POST["email"], $_POST["name"]);

                }

                else{

                   
                    echo "<form method='post' action='' >";
                    echo '<ul class="subscription-mobile center">';
                    echo '<li class="padding-vertical">';
                        echo '<label for="theName"> Name </label>';
                        
                        echo  '<input type="text" name="name" id="theName" 
                           placeholder="Team Yellow" class="sub-input"/>';
                        
                    echo '</li><li class="padding-vertical">';
                    
                        echo '<label for="theEmail"> Email </label>';

                        echo '<input type="text" name="email" id="theEmail" 
                           placeholder="info@voteup.com" class="sub-input"/>';
                        
                    echo '</li><li class="padding-vertical">';
                        
                        echo ' <input type="submit" name="subscribe-mobile" value="Subscribe"
                           class="button"/>  ';
                        
                    echo "</li>";
                        
                    echo "</ul>";
                    echo "</form>";
                    
                    
                    if(isset($_POST["name"]) AND $_POST["email"] AND $_POST["subscribe-mobile"] == "") { 
                            
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
        
<!--        <form method='post' action='' >

            <ul class="subscription-mobile center">
                <li class="padding-vertical">
                    <label for="theName"> Name </label>
                    <input type="text" name="name" id="theName" 
                           placeholder="Team Yellow" class="sub-input"/>     
                </li>
                <li class="padding-vertical">
                    <label for="theEmail"> Email </label>
                    <input type="text" name="email" id="theEmail" 
                           placeholder="info@voteup.com" class="sub-input"/>     
                </li>
                <li class="padding-vertical">
                    <input type="submit" name="subscribe-mobile" value="Subscribe"
                           class="button"/>     
                </li>

        </form>       -->
    </div>
  
    
</div>

<?php include "partials/footer.php"; ?>