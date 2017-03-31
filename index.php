

<?php include "partials/header.php"; ?>
<input id="scrollOption" type="hidden" value="0" />
<div class="column large-12 medium-12 small-12 padding-none center">
    
    <!-- =========================================================
                    HOME PAGE RANDOM VIDEOS 
        =========================================================== -->
    
    <div class="column large-12 show-for-large 
         padding-none center video-container">
        
        <?php 
            $videoParties = array("first","second","third","fourth");
            $randomVideo = $videoParties[array_rand($videoParties)];
        ?>
        
        <video id="my-video" class="video-homepage" autoplay loop muted>
            
            <source src="video/<?php echo $randomVideo ?>.mp4" type="video/mp4" />
<!--            <source src="video/<?php echo $randomVideo ?>.ogg" type="video/ogg" />
            <source src="video/<?php echo $randomVideo ?>.webm" type="video/webm" />-->
            Your browser does not support this video 
        </video>
    </div>
    
    
    <!-- =========================================================
                            TOP SECTION HOME PAGE
        =========================================================== -->
    
    
    <div id="scroll1" class="homepage1 scrollDiv">
       
        <div class="row large-12 medium-12 small-12 padding-none center 
             homepage-desc pos-relative">
            <div class="column large-12 medium-6 small-12 padding-none center medium-top-style"> 
                <img src="img/homepage/logo-white.png" 
                     alt="the mark your vote up logo" class="logo">

            </div>
            
            <div class="column large-12 medium-6 small-12 padding-none medium-top-style"> 
                <p class="column">
                Chicory arabica, in breve pumpkin spice cream cappuccino.<br>
                Decaffeinated, white doppio organic crema, 
                frappuccino a id viennese pumpkin spice.<br>
                Doppio spoon  pot blue 
                mountain kopi-luwak to go chicory arabica.<br>
                Milk, caramelization, americano so variety,
                seasonal instant single origin.<br>
                Extraction, percolator, cinnamon that,
                as mug aroma macchiato dark.</p>
           
            <a href="#scroll2" class="show-for-large"> 
                <img src="img/homepage/homepage-arrow.png" alt="animated arrow" 
                class="arrow" id="arrow" > 
            </a>
            
            </div>
            
<!--            <div class="column large-12 medium-12 small-12 padding-none"> 
                <a href="#scroll2" class="show-for-medium-only"> 
                    <img src="img/homepage/homepage-arrow.png" alt="animated arrow" 
                    class="arrow" id="arrow"> 
                </a>
            </div>-->
        </div>
    </div>
    
    
    
    <!-- =========================================================
                        HOME PAGE PARTY SECTIONS 
        =========================================================== -->
    
    

    <div id="scroll2" class="homepage2 homepage-parties scrollDiv">
        <div class="column large-3 show-for-large padding-none center homepage-party">
        
        </div>
    
        <a href="parties.php?party=Democratic"> <div class="column large-3 medium-6 small-12 
                                  padding-vertical homepage-orange center">
            <div class="column homepage-orange-hover party-div-height center">
                <h2> New Democratic Party </h2>
                <h1> ' Ready for Change '</h1> 
            </div>
            <div class="column" >
                <div class="column">
                    <img src="img/homepage/democratic.png" alt="the logo" 
                     class="symbol" id="logo-democratic">                
                </div>
                <div class="column">
                    <button class="arrow-parties arrow-democratic"> Learn More </button>
                </div>
            </div>
            
            
        </div> </a>
        
        
        
       
        
        
        
        <div class="column large-3 show-for-large padding-none center homepage-party">
        
        </div>
        <a href="parties.php?party=Conservative"> <div class="column large-3 medium-6 small-12 padding-none center homepage-blue">
            <div class="column homepage-blue-hover party-div-height center">
                <h2> Conservative Party </h2>
                <h1> ' Proven Leadership for a Strong Canada '</h1> 
            </div>
            <div class="column center">
                <div class="column">
                <img src="img/homepage/conservative.png" alt="the logo" 
                     class="symbol" id="logo-conservative">
                </div>
                <div class="column">
                    <button class="arrow-parties arrow-conservative"> Learn More </button>
                </div>
            </div>
            
        </div> </a>
        
        
        
        
        
        
        
        <a href="parties.php?party=Green"> <div class="column large-3 medium-6 small-12 padding-none center homepage-green">
            <div class="column homepage-green-hover party-div-height center">
                <h2> Green Party </h2>
                <h1> ' A Canada That Works.<br> Together. '</h1> 
            </div>
            <div>
                <div class="column">
                    <img src="img/homepage/green.png" alt="the logo" 
                 class="symbol" id="logo-green">
                </div>
                <div class="column">
                    <button class="arrow-parties arrow-green"> Learn More </button>
                </div>
            </div>
        </div> </a>
        <div class="column large-3 show-for-large padding-none center homepage-party">
            
        </div>
        
        
        
        
        <a href="parties.php?party=Liberal"> <div class="column large-3 medium-6 small-12 padding-none center homepage-red">
            <div class="column homepage-red-hover party-div-height center">
                <h2> Liberal Party </h2>
                <h1> ' Real Change '</h1> 
            </div>
            <div>
                <div class="column">
                    <img src="img/homepage/liberal.png" alt="the logo" 
                 class="symbol" id="logo-liberal">
                </div>
                <div class="column">
                    <button class="arrow-parties arrow-liberal"> Learn More </button>
                </div>
            </div>
        </div> </a>
        <div class="column large-3 show-for-large padding-none center homepage-party">
        
        </div>
   
    </div>


</div>

<?php include "partials/footer.php"; ?>




