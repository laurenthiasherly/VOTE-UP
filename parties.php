<?php include "partials/party.php"; ?>


<?php 

    $host='localhost';
    $user='root';
    $password='';
    $database='party_db';

    $connection=mysqli_connect($host,$user,$password,$database);

    if(!$connection){
        echo "connection failed";
    }else{
        
        if($_GET['party']=="Democratic"){
            $query="SELECT * FROM leader_tbl WHERE party='NDP'";
        }else{
            $query="SELECT * FROM leader_tbl WHERE party='".$_GET['party']."'";
        }
            
        
        mysqli_set_charset($connection,"utf8");
        $result=mysqli_query($connection,$query);
        
        while($row = mysqli_fetch_assoc($result)){
            $leadername=$row['leader'];
            $leadercontent1=$row['leader-content-p1'];
            $leadercontent2=$row['leader-content-p2'];
        }
        
        
        if($_GET['party']=="Democratic"){
            $query="SELECT * FROM party_tbl WHERE party='NDP'";
        }else{
            $query="SELECT * FROM party_tbl  WHERE party='".$_GET['party']."'";
        }
        $result=mysqli_query($connection,$query);
        
        $asocArray=array();
        while($row = mysqli_fetch_assoc($result)){
            $asocdata=array();
            $asocdata['column-1-p1']=$row['column-1-p1'];
            $asocdata['column-1-p2']=$row['column-1-p2'];
            $asocdata['column-2-p1']=$row['column-2-p1'];
            $asocdata['column-2-p2']=$row['column-2-p2'];
            $asocArray[$row['topic']]=$asocdata;
        }
//        echo var_dump($asocArray);
    }

?>




<input type="hidden" value="<?php echo strtolower($_GET['party']); ?>" id="type-party">
<input id="scrollOption" type="hidden" value="0" />

<div id="scroll1" class="scrollpage column large-12 medium-12 small-12 center 
                            padding-none conservative-party scrollDiv">
    
    
    
    
    
    <!-- =========================================================
                        CONSERVATIVE FRONT PAGE - LOGO & PHOTO
        =========================================================== -->
    
    
    <div class="column hide-for-large medium-12 small-12 padding-none conservative-logo background">
        
        <img src="img/conservative/logo-<?php echo $_GET['party']; ?>.png" alt="conservative logo"
             class="logo-conservative">
      
    </div>
    
    
    <div class="column large-5 medium-6 small-12 padding-none center
         <?php echo strtolower($_GET['party']); ?>-leader-img background">

    </div>
    
    <div class="column large-7 show-for-large padding-none conservative-logo background">
        <div class="column padding-none center conservative-logo-container">
            <img src="img/conservative/logo-<?php echo $_GET['party']; ?>.png" alt="conservative logo"
                 class="logo-conservative">
            
        </div>
    
        
        
        <div class="column padding-none center parties-page-mp province-list-<?php echo strtolower($_GET['party']); ?>">
            
            <h3 class="show-for-large jquery-province-title province-title-<?php echo strtolower($_GET['party']); ?>"> Newfoundland and Labrador </h3><br>
            
            <button class="jquery-province province-<?php echo strtolower($_GET['party']); ?>" data-party="0" data-province="British Columbia"> BC </button>
            <button class="jquery-province province-<?php echo strtolower($_GET['party']); ?>" data-party="1" data-province="Alberta"> AB </button>
            <button class="jquery-province province-<?php echo strtolower($_GET['party']); ?>" data-party="2" data-province="Saskatchewan"> SK </button>
            <button class="jquery-province province-<?php echo strtolower($_GET['party']); ?>" data-party="3" data-province="Manitoba"> MB </button>
            <button class="jquery-province province-<?php echo strtolower($_GET['party']); ?>" data-party="4" data-province="Ontario"> ON </button>
            <button class="jquery-province province-<?php echo strtolower($_GET['party']); ?>" data-party="5" data-province="Quebec"> QC </button>
            <button class="jquery-province province-<?php echo strtolower($_GET['party']); ?>" data-party="6" data-province="Nova Scotia "> NS </button>
            <button class="jquery-province province-<?php echo strtolower($_GET['party']); ?>" data-party="7" data-province="New Brunswick"> NB </button>
            <button class="jquery-province province-<?php echo strtolower($_GET['party']); ?>" data-party="8" data-province="Prince Edward"> PE </button>
            <button class="jquery-province province-<?php echo strtolower($_GET['party']); ?>" data-party="9" data-province="Newfoundland and Labrador"> NL </button>
            <button class="jquery-province province-<?php echo strtolower($_GET['party']); ?>" data-party="10" data-province="Nuvanut"> NU </button>
            <button class="jquery-province province-<?php echo strtolower($_GET['party']); ?>" data-party="11" data-province="Northwest Territories"> NT </button>
            <button class="jquery-province province-<?php echo strtolower($_GET['party']); ?>" data-party="12" data-province="Yukon" > YT </button>
        </div>
    </div>

    
    
    
    <!-- =========================================================
                    CONSERVATIVE FRONT PAGE - CONTENT 
        =========================================================== -->
    
  
    
    <div class="column large-7 medium-6 small-12 padding-none half-page center jquery-desc
          <?php echo strtolower($_GET['party'])."-desc"; ?>">
        
        <div class="column large-6 medium-12 small-12 padding-none half-page center 
             <?php echo strtolower($_GET['party'])."-desc-title"; ?>">
            <h1> <?php echo $leadername; ?></h1>
            <h2> <?php echo $_GET['party']; ?> Party Leader </h2> 
            
            
            <a href="#scroll2" class="show-for-large"> 
                <img src="img/homepage/homepage-arrow.png" alt="animated arrow" 
                class="arrow-conservative" id="arrow"> 
            </a>
        </div>
        <div class="column large-6 medium-12 small-12 padding-none jquery-desc-para center 
             <?php echo strtolower($_GET['party'])."-desc-para"; ?>">
            <p>
               <?php echo $leadercontent1; ?>
            </p>
            <p>
                <?php echo $leadercontent2; ?>
            </p>
        </div>
    </div>
    
    <div class="column large-7 show-for-large padding-vertical 

         center parties-page-mp-list mp-list-<?php echo strtolower($_GET['party']); ?>">
        <h3 id="party-page-mp-close"> X </h3>
        <h1 id="province-header"> Province </h1> 
        <p style="color:white">
            1. YUKI <br> 
            2. LAUREN <br>
            3. BEATRICE <br>
            4. TYRONE <br>           
            5. KAJOL <br>
        </p>
        
        
    </div>
    
    
    
   
    
</div>




















        <!-- =========================================================
                    CONSERVATIVE PARTY - ECONOMY PAGE  
        =========================================================== -->
        


<div id="scroll2" class="scrollpage column large-12 medium-12 small-12 center 
                            padding-none <?php echo strtolower($_GET["party"])."-party"; ?> topic-pages full-page scrollDiv">
    

    <!-- ==============    MEDDIUM AND SMALL VERSION - MP PER PROVINCE ==================== -->
    
    <div class="column hide-for-large medium-12 small-12 padding-none center parties-page-mp-responsive province-list-resp-<?php echo strtolower($_GET['party']); ?>">   

        <a href="#the-mp-list-parties-page"  > <div class="column padding-none center">
            <button class="jquery-province-resp  province-resp-<?php echo strtolower($_GET['party']); ?>" data-party="0" data-province="British Columbia"> BC </button>
            <button class="jquery-province-resp  province-resp-<?php echo strtolower($_GET['party']); ?>" data-party="1" data-province="Alberta"> AB </button>
            <button class="jquery-province-resp  province-resp-<?php echo strtolower($_GET['party']); ?>" data-party="2" data-province="Saskatchewan"> SK </button>
            <button class="jquery-province-resp  province-resp-<?php echo strtolower($_GET['party']); ?>" data-party="3" data-province="Manitoba"> MN </button>
            <button class="jquery-province-resp  province-resp-<?php echo strtolower($_GET['party']); ?>" data-party="4" data-province="Ontario"> ON </button>
            <button class="jquery-province-resp  province-resp-<?php echo strtolower($_GET['party']); ?>" data-party="5" data-province="Quebec"> QC </button>
            <button class="jquery-province-resp  province-resp-<?php echo strtolower($_GET['party']); ?>" data-party="6" data-province="Nova Scotia "> NS </button>
            <button class="jquery-province-resp  province-resp-<?php echo strtolower($_GET['party']); ?>" data-party="7" data-province="New Brunswick"> NB </button>
            <button class="jquery-province-resp  province-resp-<?php echo strtolower($_GET['party']); ?>" data-party="8" data-province="Prince Edward"> PE </button>
            <button class="jquery-province-resp  province-resp-<?php echo strtolower($_GET['party']); ?>" data-party="9" data-province="Newfoundland and Labrador"> NL </button>
            <button class="jquery-province-resp  province-resp-<?php echo strtolower($_GET['party']); ?>" data-party="10" data-province="Nuvanut"> NU </button>
            <button class="jquery-province-resp  province-resp-<?php echo strtolower($_GET['party']); ?>" data-party="11" data-province="Northwest Territories"> NT </button>
            <button class="jquery-province-resp  province-resp-<?php echo strtolower($_GET['party']); ?>" data-party="12" data-province="Yukon" > YT </button>
            </div> </a>

    </div>
    
    <div class="column hide-for-large medium-12 small-12 padding-none center parties-page-mp-list-responsive" id="the-mp-list-parties-page">
        <h3 id="party-page-mp-close-resp">
            <i class="fa fa-sort-up fa-2x white" aria-hidden="true"> </i>
        </h3>
        <h1 id="province-header-resp"> Province </h1> 
        <p style="color:white">
            1. YUKI <br> 
            2. LAUREN <br>
            3. BEATRICE <br>
            4. TYRONE <br>
            5. KAJOL 
        </p>
    </div>
    
    
    
    
    
    
    
    
    
    
    
    
    <div class="column large-2 show-for-large padding-none center 
         <?php echo "party-".strtolower($_GET['party'])."-lightbground"; ?> half-page">
        
    </div>
    
    
    <!-- THE DIVS BELOW IS FOR SMALL & MEDIUM VERSION -->
    
    <div class="column hide-for-large medium-12 small-12 padding-none center <?php echo "party-".strtolower($_GET['party'])."-bground"; ?>">
        <h1 class="party-topic"> ECONOMY </h1>   
    </div>
    
    <div class="column hide-for-large medium-12 small-12 padding-none center 
         topics-bg bg-party-height background" id="topics-bg0">
       
    </div>
    
    <!-- -------------------------------------------- -->
    
    
    <div class="column large-4 medium-12 small-12 padding-none center overlay
         half-page">
        
        <p>
            <?php echo $asocArray["Economy"]["column-1-p1"]; ?>
        </p>              
        <p>
            <?php echo $asocArray["Economy"]["column-1-p2"]; ?>
        </p>
        
        <p class="column medium-12 small-12 hide-for-large"> 
            <?php echo $asocArray["Economy"]["column-1-p1"]; ?>
        </p>  
        <p class="column medium-12 small-12 hide-for-large"> 
            <?php echo $asocArray["Economy"]["column-1-p2"]; ?>
        </p>  
        
    </div>
    
    
    <div class="column large-4 show-for-large padding-none left <?php echo "party-".strtolower($_GET['party'])."-bground"; ?> half-page">
        <h1 class="party-topic"> ECO </h1>
        <h1 class="party-topic"> NO </h1>
        <h1 class="party-topic"> MY </h1>
        
    </div>
    
    
    
    <div class="column large-2 show-for-large padding-none center 
        topics-bg bg-party-height background half-page" id="topics-bg1">
        
    </div>
    
    
    <!-- =============== BOTTOM SECTION ============== -->
    
    
    
    <div class="column large-6 show-for-large padding-none center 
         topics-bg bg-party-height background half-page" id="topics-bg2">
       
    </div>
    
    
    <div class="column large-4 show-for-large padding-none center 
         overlay half-page">
        
        <p> 
            <?php echo $asocArray["Economy"]["column-2-p1"]; ?>
        </p>  
        <p> 
            <?php echo $asocArray["Economy"]["column-2-p2"]; ?>
        </p> 
        
    </div>
    
    
    
    <div class="column small-12 medium-12 large-2 padding-vertical center 
         <?php echo "party-".strtolower($_GET['party'])."-lightbground"; ?> half-page voting-party">
        <h3> CLICK <br> TO <br> VOTE </h3>
        <img src="img/conservative/badge-icon.svg" alt="the voting icon"
             class="voting-icons" id="<?php echo strtolower($_GET['party']); ?>-1" data-voted="0" data-vote='0'>
        <p class="white voted"> Voted! </p>
    </div>
    
    
</div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
 <!-- =========================================================
                    CONSERVATIVE PARTY - ENVIRONMENT PAGE  
        =========================================================== -->
        


<div id="scroll3" class="scrollpage column large-12 medium-12 small-12 center 
                            padding-none <?php echo strtolower($_GET["party"])."-party"; ?> topic-pages full-page scrollDiv">
    

    <div class="column large-2 show-for-large padding-none center 
         <?php echo "party-".strtolower($_GET['party'])."-lightbground"; ?> half-page">
        
    </div>
    
    <!-- THE DIVS BELOW IS FOR SMALL & MEDIUM VERSION -->
    
     <div class="column hide-for-large medium-12 small-12 padding-none center <?php echo "party-".strtolower($_GET['party'])."-bground"; ?>">
        <h1 class="party-topic1"> ENVIRONMENT </h1>   
    </div>
    
    
    
    <div class="column hide-for-large medium-12 small-12 padding-none center 
         topics-bg bg-party-height background" id="topics-bg3">
       
    </div>
    
    
    <!-- ------------------------------------ -->
    
    
    <div class="column large-4 medium-12 small-12 padding-none center overlay
         half-page">
        
        <p>
            <?php echo $asocArray["Environment"]["column-1-p1"]; ?>
        </p>              
        <p>
            <?php echo $asocArray["Environment"]["column-1-p2"]; ?>
        </p>
        
        <p class="column medium-12 small-12 hide-for-large"> 
            <?php echo $asocArray["Environment"]["column-1-p1"]; ?>
        </p>  
        <p class="column medium-12 small-12 hide-for-large"> 
            <?php echo $asocArray["Environment"]["column-1-p2"]; ?>
        </p>
        
    </div>
    
    
    <div class="column large-4 show-for-large padding-none left <?php echo "party-".strtolower($_GET['party'])."-bground"; ?> half-page">
        <h1 class="party-topic"> ENVI </h1>
        <h1 class="party-topic"> RON </h1>
        <h1 class="party-topic"> MENT </h1>
        
    </div>
    
   
    
    <div class="column large-2 show-for-large padding-none center 
        topics-bg bg-party-height background half-page" id="topics-bg4">
        
    </div>
    
    
    <!-- =============== BOTTOM SECTION ============== -->
    
    
    
    <div class="column large-6 show-for-large padding-none center 
         topics-bg bg-party-height background half-page" id="topics-bg5">
       
    </div>
    
    
    <div class="column large-4 show-for-large padding-none center 
         overlay half-page">
        
        <p>
            <?php echo $asocArray["Environment"]["column-2-p1"]; ?>
        </p>              
        <p>
            <?php echo $asocArray["Environment"]["column-2-p2"]; ?>
        </p>
        
    </div>
    
    
    
    <div class="column small-12 medium-12 large-2 padding-vertical center 
         <?php echo "party-".strtolower($_GET['party'])."-lightbground"; ?> half-page voting-party">
        <h3> CLICK <br> TO <br> VOTE </h3>
        
        <img src="img/conservative/badge-icon.svg" alt="the voting icon"
             class="voting-icons" id="<?php echo strtolower($_GET['party']); ?>-2"  data-voted="1" data-vote='0'>
        <p class="white voted"> Voted! </p>
    </div>

    
</div>   
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
       
        
 <!-- =========================================================
                    CONSERVATIVE PARTY - EDUCATION PAGE  
        =========================================================== -->
        


<div id="scroll4" class="scrollpage column large-12 medium-12 small-12 center 
                            padding-none <?php echo strtolower($_GET["party"])."-party"; ?> topic-pages full-page scrollDiv">
    

    <div class="column large-2 show-for-large padding-none center 
         <?php echo "party-".strtolower($_GET['party'])."-lightbground"; ?> half-page">
        
    </div>
    
    <!-- THE DIVS BELOW IS FOR SMALL & MEDIUM VERSION -->
    
    <div class="column hide-for-large medium-12 small-12 padding-none center <?php echo "party-".strtolower($_GET['party'])."-bground"; ?>">
        <h1 class="party-topic"> EDUCATION </h1>   
    </div>
    
    <div class="column hide-for-large medium-12 small-12 padding-none center 
         topics-bg bg-party-height background" id="topics-bg6">
       
    </div>
    
    <!-- --------------------------------------------- -->
    
    
    <div class="column large-4 medium-12 small-12 padding-none center overlay
         half-page">
        
        <p>
            <?php echo $asocArray["Education"]["column-1-p1"]; ?>
        </p>              
        <p>
            <?php echo $asocArray["Education"]["column-1-p2"]; ?>
        </p>
        
        <p class="column medium-12 small-12 hide-for-large"> 
            <?php echo $asocArray["Education"]["column-1-p1"]; ?>
        </p>  
        <p class="column medium-12 small-12 hide-for-large"> 
            <?php echo $asocArray["Education"]["column-1-p2"]; ?>
        </p>
        
    </div>
    
    
    <div class="column large-4 show-for-large padding-none left <?php echo "party-".strtolower($_GET['party'])."-bground"; ?> half-page">
        <h1 class="party-topic"> EDU </h1>
        <h1 class="party-topic"> CA </h1>
        <h1 class="party-topic"> TION </h1>
        
    </div>
    
   
    
    <div class="column large-2 show-for-large padding-none center 
        topics-bg bg-party-height background half-page" id="topics-bg7">
        
    </div>
    
    
    <!-- =============== BOTTOM SECTION ============== -->
    
    
    
    <div class="column large-6 show-for-large padding-none center 
         topics-bg bg-party-height background half-page" id="topics-bg8">
       
    </div>
    
    
    <div class="column large-4 show-for-large padding-none center 
         overlay half-page">
        
        <p>
            <?php echo $asocArray["Education"]["column-2-p1"]; ?>
        </p>              
        <p>
            <?php echo $asocArray["Education"]["column-2-p2"]; ?>
        </p>
        
    </div>
    
    
    
    <div class="column small-12 medium-12 large-2 padding-vertical center 
         <?php echo "party-".strtolower($_GET['party'])."-lightbground"; ?> half-page voting-party">
        <h3> CLICK <br> TO <br> VOTE </h3>
        
        <img src="img/conservative/badge-icon.svg" alt="the voting icon"
             class="voting-icons" id="<?php echo strtolower($_GET['party']); ?>-3" data-voted="2" data-vote='0'>
        <p class="white voted"> Voted! </p>
    </div>
    
    
</div>        
        

 
 
 
 
 
 
 
 
 

 
 
 
 
 
 
 
 
 
 
        
 <!-- =========================================================
                    CONSERVATIVE PARTY - HEALTH PAGE  
        =========================================================== -->
        


<div id="scroll5" class="scrollpage column large-12 medium-12 small-12 center 
                            padding-none <?php echo strtolower($_GET["party"])."-party"; ?> topic-pages full-page scrollDiv">
    

    <div class="column large-2 show-for-large padding-none center 
         <?php echo "party-".strtolower($_GET['party'])."-lightbground"; ?> half-page">
        
    </div>
    
    <!-- THE DIVS BELOW IS FOR SMALL & MEDIUM VERSION -->
    
    <div class="column hide-for-large medium-12 small-12 padding-none center <?php echo "party-".strtolower($_GET['party'])."-bground"; ?>">
        <h1 class="party-topic"> HEALTH </h1>   
    </div>
    
    <div class="column hide-for-large medium-12 small-12 padding-none center 
         topics-bg bg-party-height background" id="topics-bg9">
       
    </div>
    
    <!-- --------------------------------------------- -->
    
    
    <div class="column large-4 medium-12 small-12 padding-none center overlay
         half-page">
        
        <p>
            <?php echo $asocArray["Healthcare"]["column-1-p1"]; ?>
        </p>              
        <p>
            <?php echo $asocArray["Healthcare"]["column-1-p2"]; ?>
        </p>
        
        <p class="column medium-12 small-12 hide-for-large"> 
            <?php echo $asocArray["Healthcare"]["column-1-p1"]; ?>
        </p>  
        <p class="column medium-12 small-12 hide-for-large"> 
            <?php echo $asocArray["Healthcare"]["column-1-p2"]; ?>
        </p>
        
    </div>
    
    
    <div class="column large-4 show-for-large padding-none left <?php echo "party-".strtolower($_GET['party'])."-bground"; ?> half-page">
        <br><br><h1 class="party-topic1"> HEALTH </h1>
       
        
    </div>
    
   
    
    <div class="column large-2 show-for-large padding-none center 
        topics-bg bg-party-height background half-page" id="topics-bg10">
        
    </div>
    
    
    <!-- =============== BOTTOM SECTION ============== -->
    
    
    
    <div class="column large-6 show-for-large padding-none center 
         topics-bg bg-party-height background half-page" id="topics-bg11">
       
    </div>
    
    
    <div class="column large-4 show-for-large padding-none center 
         overlay half-page">
        
        <p>
            <?php echo $asocArray["Healthcare"]["column-2-p1"]; ?>
        </p>              
        <p>
            <?php echo $asocArray["Healthcare"]["column-2-p2"]; ?>
        </p>
        
    </div>
    
    
    
    <div class="column small-12 medium-12 large-2 padding-vertical center 
         <?php echo "party-".strtolower($_GET['party'])."-lightbground"; ?> half-page voting-party">
        <h3> CLICK <br> TO <br> VOTE </h3>
        
        <img src="img/conservative/badge-icon.svg" alt="the voting icon"
             class="voting-icons" id="<?php echo strtolower($_GET['party']); ?>-4" data-voted="3" data-vote='0'>
        <p class="white voted"> Voted! </p>
    </div>
    
    
</div>        
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
         
 <!-- =========================================================
                    CONSERVATIVE PARTY - IMMIGRATION PAGE  
        =========================================================== -->
        


<div id="scroll6" class="scrollpage column large-12 medium-12 small-12 center 
                            padding-none <?php echo strtolower($_GET["party"])."-party"; ?> topic-pages full-page scrollDiv">
    

    <div class="column large-2 show-for-large padding-none center 
         <?php echo "party-".strtolower($_GET['party'])."-lightbground"; ?> half-page">
        
    </div>
    
    <!-- THE DIVS BELOW IS FOR SMALL & MEDIUM VERSION -->
    
    <div class="column hide-for-large medium-12 small-12 padding-none center <?php echo "party-".strtolower($_GET['party'])."-bground"; ?>">
        <h1 class="party-topic1"> IMMIGRATION </h1>   
    </div>
    
    <div class="column hide-for-large medium-12 small-12 padding-none center 
         topics-bg bg-party-height background" id="topics-bg12">
       
    </div>
    
    <!-- --------------------------------------------- -->
    
    
    <div class="column large-4 medium-12 small-12 padding-none center overlay
         half-page">
        
        <p>
            <?php echo $asocArray["Immigration"]["column-1-p1"]; ?>
        </p>              
        <p>
            <?php echo $asocArray["Immigration"]["column-1-p2"]; ?>
        </p>
        
        <p class="column medium-12 small-12 hide-for-large"> 
            <?php echo $asocArray["Immigration"]["column-1-p1"]; ?>
        </p>  
        <p class="column medium-12 small-12 hide-for-large"> 
            <?php echo $asocArray["Immigration"]["column-1-p2"]; ?>
        </p>
    </div>
    
    
    <div class="column large-4 show-for-large padding-none left <?php echo "party-".strtolower($_GET['party'])."-bground"; ?> half-page">
        <h1 class="party-topic"> IMMI </h1>
        <h1 class="party-topic"> GRA </h1>
        <h1 class="party-topic"> TION </h1>
        
    </div>
    
   
    
    <div class="column large-2 show-for-large padding-none center 
        topics-bg bg-party-height background half-page" id="topics-bg13">
        
    </div>
    
    
    <!-- =============== BOTTOM SECTION ============== -->
    
    
    
    <div class="column large-6 show-for-large padding-none center 
         topics-bg bg-party-height background half-page" id="topics-bg14">
       
    </div>
    
    
    <div class="column large-4 show-for-large padding-none center 
         overlay half-page">
        
        <p>
            <?php echo $asocArray["Immigration"]["column-2-p1"]; ?>
        </p>              
        <p>
            <?php echo $asocArray["Immigration"]["column-2-p2"]; ?>
        </p>
        
    </div>
    
    
    
    <div class="column small-12 medium-12 large-2 padding-vertical center 
         <?php echo "party-".strtolower($_GET['party'])."-lightbground"; ?> half-page voting-party">
        <h3> CLICK <br> TO <br> VOTE </h3>
        
        <img src="img/conservative/badge-icon.svg" alt="the voting icon"
             class="voting-icons" id="<?php echo strtolower($_GET['party']); ?>-5" data-voted="4" data-vote='0'>
        <p class="white voted"> Voted! </p>
    </div>
  
</div>        
        

 
 
 
 
 
 
 
 
 
 
 
 
 
 
        
 <!-- =========================================================
                    CONSERVATIVE PARTY - HOUSING PAGE  
        =========================================================== -->
        


<div id="scroll7" class="scrollpage column large-12 medium-12 small-12 center 
                            padding-none <?php echo strtolower($_GET["party"])."-party"; ?> topic-pages full-page scrollDiv">
    

    <div class="column large-2 show-for-large padding-none center 
         <?php echo "party-".strtolower($_GET['party'])."-lightbground"; ?> half-page">
        
    </div>
    
    <!-- THE DIVS BELOW IS FOR SMALL & MEDIUM VERSION -->
    
    <div class="column hide-for-large medium-12 small-12 padding-none center <?php echo "party-".strtolower($_GET['party'])."-bground"; ?>">
        <h1 class="party-topic"> HOUSING </h1>   
    </div>
    
    <div class="column hide-for-large medium-12 small-12 padding-none center 
         topics-bg bg-party-height background" id="topics-bg15">
       
    </div>
    
    <!-- --------------------------------------------- -->
    
    
    <div class="column large-4 medium-12 small-12 padding-none center overlay
         half-page">
        
        <p>
            <?php echo $asocArray["Housing"]["column-1-p1"]; ?>
        </p>              
        <p>
            <?php echo $asocArray["Housing"]["column-1-p2"]; ?>
        </p>
        
        <p class="column medium-12 small-12 hide-for-large"> 
            <?php echo $asocArray["Housing"]["column-1-p1"]; ?>
        </p>  
        <p class="column medium-12 small-12 hide-for-large"> 
            <?php echo $asocArray["Housing"]["column-1-p2"]; ?>
        </p>
        
    </div>
    
    
    <div class="column large-4 show-for-large padding-none left <?php echo "party-".strtolower($_GET['party'])."-bground"; ?> half-page">
        <h1 class="party-topic"> HOU </h1>
        <h1 class="party-topic"> SING </h1>
        
    </div>
    
   
    
    <div class="column large-2 show-for-large padding-none center 
        topics-bg bg-party-height background half-page" id="topics-bg16">
        
    </div>
    
    
    <!-- =============== BOTTOM SECTION ============== -->
    
    
    
    <div class="column large-6 show-for-large padding-none center 
         topics-bg bg-party-height background half-page" id="topics-bg17">
       
    </div>
    
    
    <div class="column large-4 show-for-large padding-none center 
         overlay half-page">
        
        <p>
            <?php echo $asocArray["Housing"]["column-2-p1"]; ?>
        </p>              
        <p>
            <?php echo $asocArray["Housing"]["column-2-p2"]; ?>
        </p>
        
    </div>
    
    
    
    <div class="column small-12 medium-12 large-2 padding-vertical center 
         <?php echo "party-".strtolower($_GET['party'])."-lightbground"; ?> half-page voting-party">
        <h3> CLICK <br> TO <br> VOTE </h3>
        
        <img src="img/conservative/badge-icon.svg" alt="the voting icon"
             class="voting-icons" id="<?php echo strtolower($_GET['party']); ?>-6" data-voted="5" data-vote='0'>
        <p class="white voted"> Voted! </p>
    </div>
    
    
</div>        
        

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
         
 <!-- =========================================================
                    CONSERVATIVE PARTY - EDUCATION PAGE  
        =========================================================== -->
        


<div id="scroll8" class="scrollpage column large-12 medium-12 small-12 center 
                            padding-none <?php echo strtolower($_GET["party"])."-party"; ?> topic-pages full-page scrollDiv">
    

    <div class="column large-2 show-for-large padding-none center 
         <?php echo "party-".strtolower($_GET['party'])."-lightbground"; ?> half-page">
        
    </div>
    
    <!-- THE DIVS BELOW IS FOR SMALL & MEDIUM VERSION -->
    
    <div class="column hide-for-large medium-12 small-12 padding-none center <?php echo "party-".strtolower($_GET['party'])."-bground"; ?>">
        <h1 class="party-topic1"> FOREIGN POLICY </h1>   
    </div>
    
    <div class="column hide-for-large medium-12 small-12 padding-none center 
         topics-bg bg-party-height background" id="topics-bg18">
       
    </div>
    
    <!-- --------------------------------------------- -->
    
    
    <div class="column large-4 medium-12 small-12 padding-none center overlay
         half-page">
        
        <p>
            <?php echo $asocArray["Foreign Policy"]["column-1-p1"]; ?>
        </p>              
        <p>
            <?php echo $asocArray["Foreign Policy"]["column-1-p2"]; ?>
        </p>
        
        <p class="column medium-12 small-12 hide-for-large"> 
            <?php echo $asocArray["Foreign Policy"]["column-1-p1"]; ?>
        </p>  
        <p class="column medium-12 small-12 hide-for-large"> 
            <?php echo $asocArray["Foreign Policy"]["column-1-p2"]; ?>
        </p>
        
    </div>
    
    
    <div class="column large-4 show-for-large padding-none left <?php echo "party-".strtolower($_GET['party'])."-bground"; ?> half-page">
        <br><br> <h1 class="party-topic1"> FOREIGN  </h1>
        <h1 class="party-topic1"> POLICY </h1>
        
    </div>
    
   
    
    <div class="column large-2 show-for-large padding-none center 
        topics-bg bg-party-height background half-page" id="topics-bg19">
        
    </div>
    
    
    <!-- =============== BOTTOM SECTION ============== -->
    
    
    
    <div class="column large-6 show-for-large padding-none center 
         topics-bg bg-party-height background half-page" id="topics-bg20">
       
    </div>
    
    
    <div class="column large-4 show-for-large padding-none center 
         overlay half-page">
        
       <p>
            <?php echo $asocArray["Foreign Policy"]["column-2-p1"]; ?>
        </p>              
        <p>
            <?php echo $asocArray["Foreign Policy"]["column-2-p2"]; ?>
        </p>
        
    </div>
    
    
    
    <div class="column small-12 medium-12 large-2 padding-vertical center 
         <?php echo "party-".strtolower($_GET['party'])."-lightbground"; ?> half-page voting-party">
        <h3> CLICK <br> TO <br> VOTE </h3>
        
        <img src="img/conservative/badge-icon.svg" alt="the voting icon"
             class="voting-icons" id="<?php echo strtolower($_GET['party']); ?>-7" data-voted="6" data-vote='0'>
        <p class="white voted"> Voted! </p>
    </div>
    
</div>        
        

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
         
 <!-- =========================================================
                    CONSERVATIVE PARTY - EDUCATION PAGE  
        =========================================================== -->
        


<div id="scroll9" class="scrollpage column large-12 medium-12 small-12 center 
                            padding-none <?php echo strtolower($_GET["party"])."-party"; ?> topic-pages full-page scrollDiv">
    

    <div class="column large-2 show-for-large padding-none center 
         <?php echo "party-".strtolower($_GET['party'])."-lightbground"; ?> half-page">
        
    </div>
    
    <!-- THE DIVS BELOW IS FOR SMALL & MEDIUM VERSION -->
    
    <div class="column hide-for-large medium-12 small-12 padding-none center <?php echo "party-".strtolower($_GET['party'])."-bground"; ?>">
        <h1 class="party-topic"> PRIVACY </h1>   
    </div>
    
    <div class="column hide-for-large medium-12 small-12 padding-none center 
         topics-bg bg-party-height background" id="topics-bg21">
       
    </div>
    
    <!-- --------------------------------------------- -->
    
    
    <div class="column large-4 medium-12 small-12 padding-none center overlay
         half-page">
        
        <p>
            <?php echo $asocArray["Privacy"]["column-1-p1"]; ?>
        </p>              
        <p>
            <?php echo $asocArray["Privacy"]["column-1-p2"]; ?>
        </p>
        
        <p class="column medium-12 small-12 hide-for-large"> 
            <?php echo $asocArray["Privacy"]["column-1-p1"]; ?>
        </p>  
        <p class="column medium-12 small-12 hide-for-large"> 
            <?php echo $asocArray["Privacy"]["column-1-p2"]; ?>
        </p>
        
    </div>
    
    
    <div class="column large-4 show-for-large padding-none left <?php echo "party-".strtolower($_GET['party'])."-bground"; ?> half-page">
        <h1 class="party-topic"> PRI </h1>
        <h1 class="party-topic"> VA </h1>
        <h1 class="party-topic"> CY </h1>
        
    </div>
    
   
    
    <div class="column large-2 show-for-large padding-none center 
        topics-bg bg-party-height background half-page" id="topics-bg22">
        
    </div>
    
    
    <!-- =============== BOTTOM SECTION ============== -->
    
    
    
    <div class="column large-6 show-for-large padding-none center 
         topics-bg bg-party-height background half-page" id="topics-bg23">
       
    </div>
    
    
    <div class="column large-4 show-for-large padding-none center 
         overlay half-page">
        
        <p>
            <?php echo $asocArray["Privacy"]["column-2-p1"]; ?>
        </p>              
        <p>
            <?php echo $asocArray["Privacy"]["column-2-p2"]; ?>
        </p>
        
    </div>
    
    
    
    <div class="column small-12 medium-12 large-2 padding-vertical center 
         <?php echo "party-".strtolower($_GET['party'])."-lightbground"; ?> half-page voting-party">
        <h3> CLICK <br> TO <br> VOTE </h3>
        
        <img src="img/conservative/badge-icon.svg" alt="the voting icon"
             class="voting-icons" id="<?php echo strtolower($_GET['party']); ?>-8" data-voted="7" data-vote='0'>
        <p class="white voted"> Voted! </p>
    </div>
    
    
</div>        
        

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
         
 <!-- =========================================================
                    CONSERVATIVE PARTY - ELECTORAL PAGE  
        =========================================================== -->
        


<div id="scroll10" class="scrollpage column large-12 medium-12 small-12 center 
                            padding-none <?php echo strtolower($_GET["party"])."-party"; ?> topic-pages full-page scrollDiv">
    

    <div class="column large-2 show-for-large padding-none center 
         <?php echo "party-".strtolower($_GET['party'])."-lightbground"; ?> half-page">
        
    </div>
    
    <!-- THE DIVS BELOW IS FOR SMALL & MEDIUM VERSION -->
    
    <div class="column hide-for-large medium-12 small-12 padding-none center <?php echo "party-".strtolower($_GET['party'])."-bground"; ?>">
        <h1 class="party-topic1"> ELECTORAL REFORM </h1>   
    </div>
    
    <div class="column hide-for-large medium-12 small-12 padding-none center 
         topics-bg bg-party-height background" id="topics-bg24">
       
    </div>
    
    <!-- --------------------------------------------- -->
    
    
    <div class="column large-4 medium-12 small-12 padding-none center overlay
         half-page">
        
        <p>
            <?php echo $asocArray["Electoral Reform"]["column-1-p1"]; ?>
        </p>              
        <p>
            <?php echo $asocArray["Electoral Reform"]["column-1-p2"]; ?>
        </p>
        
        <p class="column medium-12 small-12 hide-for-large"> 
            <?php echo $asocArray["Electoral Reform"]["column-1-p1"]; ?>
        </p>  
        <p class="column medium-12 small-12 hide-for-large"> 
            <?php echo $asocArray["Electoral Reform"]["column-1-p2"]; ?>
        </p>
        
    </div>
    
    
    <div class="column large-4 show-for-large padding-none left <?php echo "party-".strtolower($_GET['party'])."-bground"; ?> half-page">
        <h1 class="party-topic1"> ELEC- </h1>
        <h1 class="party-topic1"> TORAL </h1>
        <h1 class="party-topic1"> REFORM </h1>
        
    </div>
    
   
    
    <div class="column large-2 show-for-large padding-none center 
        topics-bg bg-party-height background half-page" id="topics-bg25">
        
    </div>
    
    
    <!-- =============== BOTTOM SECTION ============== -->
    
    
    
    <div class="column large-6 show-for-large padding-none center 
         topics-bg bg-party-height background half-page" id="topics-bg26">
       
    </div>
    
    
    <div class="column large-4 show-for-large padding-none center 
         overlay half-page">
        
        <p>
            <?php echo $asocArray["Electoral Reform"]["column-2-p1"]; ?>
        </p>              
        <p>
            <?php echo $asocArray["Electoral Reform"]["column-2-p2"]; ?>
        </p>
    </div>
    
    
    
    <div class="column small-12 medium-12 large-2 padding-vertical center 
         <?php echo "party-".strtolower($_GET['party'])."-lightbground"; ?> half-page voting-party">
        <h3> CLICK <br> TO <br> VOTE </h3>
        
        <img src="img/conservative/badge-icon.svg" alt="the voting icon"
             class="voting-icons" id="<?php echo strtolower($_GET['party']); ?>-9" data-voted="8" data-vote='0'>
        <p class="white voted"> Voted! </p>
    </div>
    
</div>        
        


<?php include "partials/footer.php"; ?>