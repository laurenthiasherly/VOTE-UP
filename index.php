

<?php include "partials/header.php"; ?>

<div class="column large-12 medium-12 small-12 padding-none center">
    
    <!-- =========================================================
                    HOME PAGE RANDOM VIDEOS 
        =========================================================== -->
    
    <div class="column large-12 medium-12 small-12 
         padding-none center video-container">
        
        <?php 
            $videoParties = array("barcelona","liberal","motivational","short");
            $randomVideo = $videoParties[array_rand($videoParties)];
        ?>
        
        <video id="my-video" class="video-homepage" autoplay loop muted>
            <source src="video/<?php echo $randomVideo ?>.mp4" type="video/mp4" />
            Your browser does not support this video 
        </video>
    </div>
    
    
    <div class="column large-12 medium-12 large-12 padding-vertical center" id="subscribe-box">
        <div class="column large-4 show-for-large padding-none center ">
            <h4> Keep Yourself Updated with the Voting Whatever! </h4>
        
        </div>
        
        <div class="column large-8 medium-12 padding-none center ">

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

            </form>            
        </div>

        
    </div>
    
    
    
    
    
    
    
    <!-- =========================================================
                            TOP SECTION HOME PAGE
        =========================================================== -->
    
    
    <div id="scroll1" class="homepage1 scrollDiv">
       
        <div class="row large-12 medium-12 small-12 padding-none center homepage-desc">
            <div class="column large-12 medium-6 small-12 padding-none center"> 
                <img src="img/homepage/logo-white.png" 
                     alt="the mark your vote up logo" class="logo">

            </div>
            
            <div class="column large-12 medium-6 small-12 padding-none"> 
            <p>
                Chicory arabica, in breve pumpkin spice cream cappuccino.<br>
                Decaffeinated, white doppio organic crema, <br>
                frappuccino a id viennese pumpkin spice.<br>
                Doppio spoon steamed mocha plunger pot blue <br>
                mountain kopi-luwak to go chicory arabica.<br>
                Milk, caramelization, americano so variety,<br>
                seasonal instant skinny at affogato trifecta single origin.<br>
                Extraction, percolator, cinnamon that, <br>
                as mug aroma plunger pot macchiato dark.</p>
           
            <a href="#scroll2" class="show-for-large"> 
                <img src="img/homepage/homepage-arrow.png" alt="animated arrow" 
                class="arrow" id="arrow"> 
            </a>
            
            </div>
            
            <div class="column large-12 medium-12 small-12 padding-none"> 
                <a href="#scroll2" class="show-for-medium-only"> 
                    <img src="img/homepage/homepage-arrow.png" alt="animated arrow" 
                    class="arrow" id="arrow"> 
                </a>
            </div>
        </div>
    </div>
    
    
    
    <!-- =========================================================
                        HOME PAGE PARTY SECTIONS 
        =========================================================== -->
    
    

    <div id="scroll2" class="homepage2 homepage-parties scrollDiv">
        <div class="column large-3 show-for-large padding-none center homepage-party">
        
        </div>
    
        <div class="column large-3 medium-6 small-12 padding-vertical homepage-orange center">
            <div class="column homepage-orange-hover party-div-height center">
                <h2> New Democratic </h2>
                <h3> Ready for Change </h3> 
            </div>
            <div class="column" >
                <img src="img/homepage/democratic.png" alt="the logo" 
                 class="symbol">
            </div>
            
        </div>
        
        
        
       
        
        
        
        <div class="column large-3 show-for-large padding-none center homepage-party">
        
        </div>
        <div class="column large-3 medium-6 small-12 padding-none center homepage-blue">
            <div class="homepage-blue-hover party-div-height">
                <p> Decaffeinated mug aromatic espresso 
                    lungo café au lait skinny. Fair trade
                    americano mug caffeine café au lait 
                    grinder mug breve. Single shot to go ut,
                    sit java percolator medium robust 
                    caramelization dark flavour.
                    Decaffeinated mug aromatic espresso 
                    lungo café au lait skinny. Fair trade
                    americano mug caffeine café au lait 
                    grinder mug breve. Single shot to go ut,
                    sit java percolator medium robust 
                    caramelization dark flavour. </p>
            </div>
            <div>
                <img src="img/homepage/conservative.png" alt="the logo" 
                 class="symbol">
            </div>
        </div>
        
        
        
        
        
        
        
        <div class="column large-3 medium-6 small-12 padding-none center homepage-green">
            <div class="homepage-green-hover party-div-height">
                <p> Decaffeinated mug aromatic espresso 
                    lungo café au lait skinny. Fair trade
                    americano mug caffeine café au lait 
                    grinder mug breve. Single shot to go ut,
                    sit java percolator medium robust 
                    caramelization dark flavour.
                    Decaffeinated mug aromatic espresso 
                    lungo café au lait skinny. Fair trade
                    americano mug caffeine café au lait 
                    grinder mug breve. Single shot to go ut,
                    sit java percolator medium robust 
                    caramelization dark flavour. </p>
            </div>
            <div>
                <img src="img/homepage/green.png" alt="the logo" 
                 class="symbol">
            </div>
        </div>
        <div class="column large-3 show-for-large padding-none center homepage-party">
            
        </div>
        
        
        
        
        <div class="column large-3 medium-6 small-12 padding-none center homepage-red">
            <div class="homepage-red-hover party-div-height">
                <p> Decaffeinated mug aromatic espresso 
                    lungo café au lait skinny. Fair trade
                    americano mug caffeine café au lait 
                    grinder mug breve. Single shot to go ut,
                    sit java percolator medium robust 
                    caramelization dark flavour.
                    Decaffeinated mug aromatic espresso 
                    lungo café au lait skinny. Fair trade
                    americano mug caffeine café au lait 
                    grinder mug breve. Single shot to go ut,
                    sit java percolator medium robust 
                    caramelization dark flavour. </p>
            </div>
            <div>
                <img src="img/homepage/liberal.png" alt="the logo" 
                 class="symbol">
            </div>
        </div>
        <div class="column large-3 show-for-large padding-none center homepage-party">
        
        </div>

        I ADDED NEW STUFF ON HOMEPAGE
        
    </div>


</div>

<?php include "partials/footer.php"; ?>




