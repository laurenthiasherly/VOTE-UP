<?php include "partials/header.php"; ?>

<div class="column hide-for-large medium-12 small-12 padding-none center sub-page background">

    
    <div class="column large-12 medium-12 small-12 padding-vertical center subscription-form">
        <h1> Subscription </h1>
        
        <form method='post' action='' >

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

        </form>       
    </div>
  
    
</div>

<?php include "partials/footer.php"; ?>