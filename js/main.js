var messageComparing="";
var topicSelected="";
var partiesSelected=0;
var changeCurrent=1;
var movingScroll=false;
var animationStatus=false;
var iScrollPos = 0;

var sizeOfScrollDiv=0;
var modalBoxShow=0;
var voteNameArray=["conservative","democratic","green","liberal"];

$(function(){
    
    sizeOfScrollDiv=$(".scrollDiv").length;
   

    resize();
    
    
    
    // ====================================================
    // ====================================================
    // 
    //        PAGE SCROLLING SYSTEM
    //                   
    // ===================================================
    // ====================================================
    
    
    if($( window ).width()>1024){
        document.body.addEventListener("wheel", myFunction);
        if($("#scrollOption").val()=="0"){
            $("body").css("overflow","hidden");
        }
    }else{
        $("body").css("overflow","auto");
    }
    
    function myFunction(size) {
        if(!movingScroll&&modalBoxShow==0){
            if(size.wheelDelta<0){
                    changeCurrent+=1;
                    if(changeCurrent<=sizeOfScrollDiv){
                        var target = $("#scroll"+changeCurrent);
                        if (target.length) {
                            if(!animationStatus){
                                movingScroll=true;
                                animationStatus=true;
                                $('html, body').animate({scrollTop: target.offset().top}, 1000,scrollAnimationFinished);
    //                            $('html, body').animate({scrollTop: target.offset().top}, 1000).delay(200).animate({},scrollAnimationFinished);
                            }
                        }
                    }else{
                        changeCurrent=sizeOfScrollDiv;
                    }

            }else{
                    changeCurrent-=1;
                    if(changeCurrent<=0){
                        changeCurrent=1;
                    }else{
                        var target = $("#scroll"+changeCurrent);
                        if (target.length) {
                            if(!animationStatus){
                                movingScroll=true;
                                animationStatus=true;
                                $('html, body').animate({scrollTop: target.offset().top}, 1000,scrollAnimationFinished);
    //                            $('html, body').animate({scrollTop: target.offset().top}, 1000).delay(200).animate({},scrollAnimationFinished);
                            }
                        }
                    }
            }
        }else{
            if(modalBoxShow==0){
                movingScroll=true;
            }
        }
    }
    
    $(".sidebar-topic").click(function() {
        if(!movingScroll){
            var target = $("#"+$(this).data("direct"));
            if (target.length) {
                if(!animationStatus){
                    if(parseInt($(this).data("direct").match(/\d+/)[0])!=0){
                        changeCurrent=parseInt($(this).data("direct").match(/\d+/)[0]);
                        movingScroll=true;
                        animationStatus=true;
                        $('html, body').animate({scrollTop: target.offset().top}, 1200,scrollAnimationFinished);
                    }
                }
                else{
                    movingScroll=false;
                    animationStatus=false;
                }
            }
        }
    });
   
   jQuery('img.svg').each(function(){
            var $img = jQuery(this);
            var imgID = $img.attr('id');
            var imgClass = $img.attr('class');
            var imgURL = $img.attr('src');

            jQuery.get(imgURL, function(data) {
                // Get the SVG tag, ignore the rest
                var $svg = jQuery(data).find('svg');

                // Add replaced image's ID to the new SVG
                if(typeof imgID !== 'undefined') {
                    $svg = $svg.attr('id', imgID);
                }
                // Add replaced image's classes to the new SVG
                if(typeof imgClass !== 'undefined') {
                    $svg = $svg.attr('class', imgClass+' replaced-svg');
                }

                // Remove any invalid XML tags as per http://validator.w3.org
                $svg = $svg.removeAttr('xmlns:a');

                // Replace image with new SVG
                $img.replaceWith($svg);

            }, 'xml');

        });
    
    
    
    
    
    // ====================================================
    // ====================================================
    // 
    //          COMPARING PARTY MODAL BOX 
    //                   
    // ===================================================
    // ====================================================
    
    
   $(".sidebar-topic-filt").each(function(index){
        $(this).mouseover(function(){
            $("#modal-text"+[index]).css("margin-left","30px");
            $("#modal-text"+[index]).css("width","140px");
        });
        $(this).mouseout(function(){
            $("#modal-text"+[index]).css("margin-left","200px");
            $("#modal-text"+[index]).css("width","140px");
        });
        
    });
    
    
    
    $("#filterShow").click(function(){
        modalBoxShow=1;
        $("#modalBox").fadeIn("0.2","swing");
    });
    
    $("#closeComparingBox").click(function(){
        modalBoxShow=0;
        $("#modalBox").fadeOut("0.2","swing");
    });
    
    
    $(".sidebar-topic-filt").click(function(){
        if($(this).data("selected")==0){
            $(this).data("selected",1);
            $(this).children().children().css("color","rgb(127,20,43)");
            $(this).css("background","rgb(200,200,200)");
        }else{
            $(this).data("selected",0);
            $(this).children().children().css("color","white");
            $(this).css("background","none");
        }
        updateComparingContent();
    });
    
    $(".party-top-comp").click(function(){
        if($(this).data("selected")==0){
            partiesSelected+=1; 
            $(this).data("selected",1);
            $(this).css({"background":$(this).data("cparty"),
                        "color":"white",
                        "font-weight":"bold"});
        }else{
            partiesSelected-=1;
            $(this).data("selected",0);
            $(this).css({"background":"rgb(112, 112, 112)",
                        "color":"white",
                        "font-weight":"normal"});
        }
        updateComparingContent();
    });
    
    
    
    
    
    
    
    
    // ====================================================
    // ====================================================
    // 
    //                   NAVIGATION BAR
    //                   
    // ===================================================
    // ====================================================
    
    
    
    var navParty = ["conservative","liberal","democratic","green"];
    var navColour = ["blue","red","orange","green"];
    
    $.each($(".nav"),function(index){
        $(".nav-"+navParty[index]).hover(function(){
            $("#nav-"+navParty[index]).css("border-top","solid 2.5px "+navColour[index]);
            //$("#nav-"+navParty[index]).css("border-bottom","solid 2.5px "+navColour[index]);
            $("#nav-"+navParty[index]).css("padding","10px 20px 0 20px");

        },function(){
            $("#nav-"+navParty[index]).css("border-top","none");
            $("#nav-"+navParty[index]).css("border-bottom","none");
        });
        
   
    });
    
    
    
    menuShow =0;
    $(".mobile-menu").click(function(){
        if(menuShow==0){
            $(".navigation-mobile").css("top","50px");
            menuShow=1;

        }else{
            $(".navigation-mobile").css("top","-300px");
            menuShow=0;
        }
    });
    
    
    
    setTimeout(function(){
        $(".see-your-vote").animate({"right":"-80px"},600, "swing");
        $("#arrow-down").data("status","open");
    },3500);



    
    $("#arrow-down").click(function(){
        if($(this).data("status") === "open"){
            $(".see-your-vote").animate({"right":"-123px"},600,'swing');
            $(this).data("status","close");
        }
        else if($(this).data("status") === "close"){
            $(".see-your-vote").animate({"right":"-80px"}, 600,'swing');
            $(this).data("status","open");
        }
    });
    
    
    
    
    $(".sidebar-topic").each(function(index){
        $(this).mouseover(function(){
            $(".tip-topic").eq(index).css("transform","translateX(185px)");
        });
        $(this).mouseout(function(){
            $(".tip-topic").eq(index).css("transform","translateX(0px)");
        });
    });
    
    
    
    function checkBig(){
        $("#voting-icon").animate({"font-size":"24px"},1000,"swing",checkSmall);
    }
    
    function checkSmall(){
        $("#voting-icon").animate({"font-size":"20px"},1000,"swing", checkBig);
    }
    
    checkBig();
    
    
    
    
    
    // ====================================================
    // ====================================================
    // 
    //                   HOMEPAGE 
    //                   
    // ===================================================
    // ====================================================
    
    function arrowBig(){
        $("#arrow").animate({"width":"90px"},1000,"swing",arrowSmall);
    }
    
    function arrowSmall(){
        $("#arrow").animate({"width":"70px"},1000,"swing", arrowBig);
    }
    
    arrowBig();

    
    $(function() {
        $('a[href*="#"]:not([href="#"])').click(function() {
          if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            changeCurrent=parseInt(this.hash.match(/\d+/));
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
              $('html, body').delay(300).animate({
                scrollTop: target.offset().top
              }, 1000);
              return false;
            }
          }
        });
    });
    
    $("#subscribe-button").click(function(){
        $("#subscribe-box").slideToggle({"display":"initial"},2000,"ease");
        $(".map-title").slideToggle({"left":"0"},1000,"ease");
    });
    
    
    
    // ===================  HOMEPAGE HOVER =======================
    
    
    
    $(".homepage-orange").mouseover(function(){
        $(".homepage-orange-hover").css("transform","translate(-100%,0)");  
        $(".arrow-democratic").css({"display":"initial", "margin-top":"80px"});
        $("#logo-democratic").css("margin-top","12vh");
        //$(".arrow-parties").slideDown({"display":"initial"},1000,"swing");
    });    
    $(".homepage-orange").mouseout(function(){
        $(".homepage-orange-hover").css("transform","translate(0,0)");
        $(".arrow-parties").css("display","none");
        $("#logo-democratic").css("margin-top","18vh");
        //$(".arrow-parties").slideUp({"display":"none"},1000,"swing");
    });
    
    
    $(".homepage-blue").mouseover(function(){
        $(".homepage-blue-hover").css("transform","translate(-100%,0)");  
        $(".arrow-conservative").css({"display":"initial", "margin-top":"80px"});
        $("#logo-conservative").css("margin-top","12vh");
    });    
    $(".homepage-blue").mouseout(function(){
        $(".homepage-blue-hover").css("transform","translate(0,0)"); 
        $(".arrow-parties").css("display","none");
        $("#logo-conservative").css("margin-top","18vh");
    });
    
    
    $(".homepage-green").mouseover(function(){
        $(".homepage-green-hover").css("transform","translate(100%,0)");  
        $(".arrow-green").css({"display":"initial", "margin-top":"80px"});
        $("#logo-green").css("margin-top","12vh");
    });    
    $(".homepage-green").mouseout(function(){
        $(".homepage-green-hover").css("transform","translate(0,0)");
        $(".arrow-parties").css("display","none");
        $("#logo-green").css("margin-top","18vh");
    });
    
    
    $(".homepage-red").mouseover(function(){
        $(".homepage-red-hover").css("transform","translate(100%,0)");   
        $(".arrow-liberal").css({"display":"initial", "margin-top":"80px"});
        $("#logo-liberal").css("margin-top","12vh");
    });    
    $(".homepage-red").mouseout(function(){
        $(".homepage-red-hover").css("transform","translate(0,0)");   
        $(".arrow-parties").css("display","none");
        $("#logo-liberal").css("margin-top","18vh");
    });
    
    
    
    
    
    
    // ===================  VIDEO  =======================
    
    window.onresize = function(event){
        resize();
    }
    
    function resize(){
        $("#my-video").css("min-height", window.innerHeight);
        
        var boxHeight = $(".homepage-orange").height() + 20;
        $(".party-div-height").css("height",boxHeight);
    }
    
    
    
    
    
    
    
    
    
    
    
    // ====================================================
    // ====================================================
    // 
    //         CONSERVATIVE PAGE - INITIAL PARTY PAGE  
    //                   
    // ===================================================
    // ====================================================
    

    function conservativeDesc(){
        
        if(window.innerWidth > 1024){
            
            setInterval(function(){

                $(".jquery-desc-para").css("margin-right","0");
                $("."+$("#type-party").val()+"-desc-title").css("width","50%");
                $(".side-topics-bar").slideDown({"display":"initial"},500);

            },2500);
        }
    }
    
    conservativeDesc();
    
    
    $(".jquery-province").each(function(index){
       $(this).click(function(){
           $(".jquery-desc").animate({"height":"0"},1000,"swing");
           $(".parties-page-mp-list").fadeIn({'display':"block"},1000,"swing");
           $("#province-header").text($(this).data("province"));
       }); 
    });
    
    $("#party-page-mp-close").click(function(){
        $(".parties-page-mp-list").fadeOut({'display':"none"},1000,"swing");
        $(".jquery-desc").animate({"height":"50vh"},1000,"swing");
    }); 
    
     
    
    $(".jquery-province-resp").each(function(index){
       $(this).click(function(){
           $(".parties-page-mp-list-responsive").slideDown({'display':"block"},1000,"swing");
           $("#province-header-resp").text($(this).data("province"));
        }); 
    });
    
    
    $("#party-page-mp-close-resp").click(function(){
        $(".parties-page-mp-list-responsive").fadeOut({'display':"none"},1000,"swing");
    });
    
    
    $(".jquery-province").each(function(){
        $(this).mouseover(function(){
            $(".jquery-province-title").css("z-index","5");
            $(".jquery-province-title").text($(this).data("province"));
            
        });
        
        $(this).mouseout(function(){
           $(".jquery-province-title").css("z-index","-200");
        
        });
        
    });
    
    
    
    

    
    
    
    // ====================================================
    //         VOTING ICONS IN THE PARTIES PAGE
    //===================================================
    
    
    $(".voting-icons").hover(function(){
        $(".voting-icons").css("width","120px");

    },function(){
        $(".voting-icons").css("width","100px");

    });
    
    
    $(".voting-icons").click(function(){
        
        
        if($(this).attr('data-vote')=='0'){
            $(this).attr('src','img/conservative/badge-icon-clicked.svg');
            $(".voted").eq($(this).data("voted")).css("margin-top","0");
            $(".voting-icons").eq($(this).data("voted")).css("width","120px");
            $(this).attr('data-vote','1');
            setCookie($(this).attr('id'),'1',1);
            $(".voting-box").animate({"height":"100px", "bottom":"0"},400);
        }else{
            $(this).attr('src','img/conservative/badge-icon.svg');
            $(".voted").eq($(this).data("voted")).css("margin-top","300px");
            $(".voting-icons").eq($(this).data("voted")).css("width","100px");
            $(this).attr('data-vote','0');
            delete_cookie($(this).attr('id'));
        }
        updateVoting();
    });
    

    // ====================================================
    //         VOTING ICONS IN THE PARTIES PAGE
    //===================================================
    
    
    var partyBg = ["economy","economy", "economy", 
                    "environment","environment","environment",
                    "education","education","education",
                        "health","health","health",
                    "immigration","immigration","immigration",
                    "housing","housing","housing",
                    "foreign-policy","foreign-policy","foreign-policy",
                    "privacy","privacy","privacy",
                    "electoral-reform-1","electoral-reform-1","electoral-reform-1"];

    
    $(".topics-bg").each(function(index){
        $("#topics-bg"+[index]).css("background","url(img/conservative/"+partyBg[index]+".jpg)");
        $(".topics-bg").css("background-size","cover");
        $(".topics-bg").css("background-position","center");
    });
    
    
    
    
    
    // ====================================================
    // ====================================================
    // 
    //            WHO'S MY MP (MAP) PAGE 
    //            
    // ====================================================
    // ====================================================
    
    
    $(".map-title").css("left","0");
    
    
    updateVoting();
});



// ================================    END END END    ================================================





    // ====================================================
    // ====================================================
    // 
    //           PARTY PAGE SCROLLING SECTION  
    //                   
    // ===================================================
    // ====================================================



    function scrollAnimationFinished(){
    //    console.log("finished!");
        movingScroll=false;
        animationStatus=false;
    }

    function updateComparingContent(){
       let partyComparing="";
        let topics="";
        $(".sidebar-topic-filt").each(function(index){
            if($(this).data("selected")==1){
                topics+=$(".tip-topic").eq(index).text()+",";
            }
        });
        
        $(".party-top-comp").each(function(){
            if($(this).data("selected")==1){
                partyComparing+=$(this).text()+",";
            }
        });
        if(partiesSelected==0||topics==""){
            $("#contentTopic").html('<p class="content-topic-default">Please select the parties.</p>');
        }else{
            topics=topics.substring(0,topics.length-1);
            partyComparing=partyComparing.substring(0,partyComparing.length-1);
            if(topics!=""&&partyComparing!=""){
                ajaxGetDatafromDatabase(partyComparing,topics);
            }else{
                $("#contentTopic").html('<p class="content-topic-default">Please select the Topics.</p>');
            }
        }
    }
    
    function ajaxGetDatafromDatabase(partyname,topics){
        $.ajax({
            url: 'comparisondatabase.php',
            type: 'POST',
            data: {"party":partyname,"topics":topics},
            success: function(data, status) {
                $("#contentTopic").html(data);
            },
            error: function(xhr, desc, err) {
                console.log(xhr);
                console.log("Details: " + desc + "\nError:" + err);
            }
        });
    }

    window.onbeforeunload = function(){
        $('body').stop(); 
        window.scrollTo(0,0); 
    }



    // ====================================================
    // ====================================================
    // 
    //                   VOTING SYSTEM  
    //                   
    // ===================================================
    // ====================================================


    var showVoting=0;

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function delete_cookie(name) {
      document.cookie = name+'=;Path=/; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    }

    function checkCookie(name) {
        var user = getCookie(name);
        if (user != "") {
            return true;
        }else{
            return false;
        }
    }


    var party1=0;
    var party2=0;
    var party3=0;
    var party4=0;
	var openGrapficBox=0;

    function ShowVotingBox(){
        $(".voting-box").stop();
        if(showVoting==0){
    //        $("#votingBox").fadeIn(500);
            $(".voting-box").animate({"height":"100px", "bottom":"0"},400);
            showVoting=1;
            $(".voting-box-btn").eq(0).html("-");
        }else{
    //        $("#votingBox").fadeOut(500);
            $(".voting-box").animate({"height":"0", "bottom":"-10px"},400);
            showVoting=0;
            $(".voting-box-btn").eq(0).html("+");
        }
    }

    $("#votingBtn").click(function(){
        ShowVotingBox();
    });
    
    $("#showVoteBoxMenu").click(function(){
        ShowVotingBox();
    });

    $("#voting-close").click(function(){
		showVoting=0;
        $(".voting-box").animate({"height":"0", "bottom":"-10px"},400);
    });

    function updateVoting(){
        party1=0;
        party2=0;
        party3=0;
        party4=0;
        for(var i=0;i<4;i+=1){
            for(var j=1;j<=9;j+=1){
                if(checkCookie(voteNameArray[i]+"-"+j)){

                    $("#"+voteNameArray[i]+"-"+j).attr('src','img/conservative/badge-icon-clicked.svg');

                    $(".voted").eq( $("#"+voteNameArray[i]+"-"+j).data("voted")).css("margin-top","0");
                    $(".voting-icons").eq( $("#party"+i+"-"+j).data("voted")).css("width","120px");
                    $("#"+voteNameArray[i]+"-"+j).attr('data-vote','1');

                    if(i==0){
                        party1+=1;
                    }else if(i==1){
                        party2+=1;
                    }else if(i==2){
                        party3+=1;
                    }else{
                        party4+=1;
                    }
                }
            }
        }
        $("#party1total").text(party1);
        $("#party2total").text(party2);
        $("#party3total").text(party3);
        $("#party4total").text(party4);
		showGraphicVote();
    }

    function resetVotingBox(){
        party1=0;
        party2=0;
        party3=0;
        party4=0;
        for(var i=1;i<=4;i+=1){
            for(var j=1;j<=9;j+=1){
                if(checkCookie("party"+i+"-"+j)){
                    $("#party"+i+"-"+j).attr('src','img/conservative/badge-icon.svg');
                    $(".voted").eq($("#party"+i+"-"+j).data("voted")).css("margin-top","300px");
                    $(".voting-icons").eq($("#party"+i+"-"+j).data("voted")).css("width","100px");
                    $("#party"+i+"-"+j).attr('data-vote','0');
                    delete_cookie("party"+i+"-"+j);
                }
            }
        }
        $("#party1total").text(party1);
        $("#party2total").text(party2);
        $("#party3total").text(party3);
        $("#party4total").text(party4);
    }

    $("#refreshVoting").click(function(){
        resetVotingBox();
    });

	function showGraphicVote(){
		$("#grafic-con").stop();
		$("#grafic-ndp").stop();
		$("#grafic-gre").stop();
		$("#grafic-lib").stop();
		let showParty1="";
		let showParty2="";
		let showParty3="";
		let showParty4="";
		for(var i=0;i<party1;i+=1){
			showParty1+='<div class="col-gra-line"><svg version="1.1" id="Layer_1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 237.3 258.7" style="enable-background:new 0 0 237.3 258.7;" xml:space="preserve"> <style type="text/css">.st0{fill:#727272;}</style><path class="st0" d="M218.2,80.1l-36-14.5l-2.5-38.5l-37,9.2l-24-29.7l-25,29.7l-37-9.5l-2,39L18.2,79.3l21.8,32.1l-21.8,30.9 l37,15.5l1.8,38.3l36.7-9.3l25,29.5l23.8-29.3l37.8,8.5l2.3-37.3l35.8-14.5l-21-31.2L218.2,80.1z M118.8,167.1 c-30.7,0-55.6-24.9-55.6-55.6s24.9-55.6,55.6-55.6s55.6,24.9,55.6,55.6S149.5,167.1,118.8,167.1z"/> <polygon class="st0" points="38.9,158.5 3.5,193.8 11.8,198.3 47.8,161.7 "/> <polygon class="st0" points="50.3,164.6 16,199 43.7,209 54.2,237 94.5,196.7 90.8,191.6 55.3,200.8 52.4,198.3 "/> <polygon class="st0" points="97,203.6 55.3,245.8 59.2,255 103,210.8 "/> <polygon class="st0" points="197.6,158.5 232.9,193.8 224.7,198.3 188.7,161.7 "/> <polygon class="st0" points="186.2,164.6 220.4,199 192.8,209 182.3,237 141.9,196.7 145.7,191.6 181.2,200.8 184.1,198.3 "/> <polygon class="st0" points="139.4,203.6 181.2,245.8 177.3,255 133.4,210.8 "/> </svg> </div>';
		}
		for(var i=0;i<party2;i+=1){
			showParty2+='<div class="col-gra-line"><svg version="1.1" id="Layer_1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 237.3 258.7" style="enable-background:new 0 0 237.3 258.7;" xml:space="preserve"> <style type="text/css">.st1{fill:#727272;}</style><path class="st1" d="M218.2,80.1l-36-14.5l-2.5-38.5l-37,9.2l-24-29.7l-25,29.7l-37-9.5l-2,39L18.2,79.3l21.8,32.1l-21.8,30.9 l37,15.5l1.8,38.3l36.7-9.3l25,29.5l23.8-29.3l37.8,8.5l2.3-37.3l35.8-14.5l-21-31.2L218.2,80.1z M118.8,167.1 c-30.7,0-55.6-24.9-55.6-55.6s24.9-55.6,55.6-55.6s55.6,24.9,55.6,55.6S149.5,167.1,118.8,167.1z"/> <polygon class="st1" points="38.9,158.5 3.5,193.8 11.8,198.3 47.8,161.7 "/> <polygon class="st1" points="50.3,164.6 16,199 43.7,209 54.2,237 94.5,196.7 90.8,191.6 55.3,200.8 52.4,198.3 "/> <polygon class="st1" points="97,203.6 55.3,245.8 59.2,255 103,210.8 "/> <polygon class="st1" points="197.6,158.5 232.9,193.8 224.7,198.3 188.7,161.7 "/> <polygon class="st1" points="186.2,164.6 220.4,199 192.8,209 182.3,237 141.9,196.7 145.7,191.6 181.2,200.8 184.1,198.3 "/> <polygon class="st1" points="139.4,203.6 181.2,245.8 177.3,255 133.4,210.8 "/> </svg> </div>';
		}
		for(var i=0;i<party3;i+=1){
			showParty3+='<div class="col-gra-line"><svg version="1.1" id="Layer_1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 237.3 258.7" style="enable-background:new 0 0 237.3 258.7;" xml:space="preserve"> <style type="text/css">.st2{fill:#727272;}</style><path class="st2" d="M218.2,80.1l-36-14.5l-2.5-38.5l-37,9.2l-24-29.7l-25,29.7l-37-9.5l-2,39L18.2,79.3l21.8,32.1l-21.8,30.9 l37,15.5l1.8,38.3l36.7-9.3l25,29.5l23.8-29.3l37.8,8.5l2.3-37.3l35.8-14.5l-21-31.2L218.2,80.1z M118.8,167.1 c-30.7,0-55.6-24.9-55.6-55.6s24.9-55.6,55.6-55.6s55.6,24.9,55.6,55.6S149.5,167.1,118.8,167.1z"/> <polygon class="st2" points="38.9,158.5 3.5,193.8 11.8,198.3 47.8,161.7 "/> <polygon class="st2" points="50.3,164.6 16,199 43.7,209 54.2,237 94.5,196.7 90.8,191.6 55.3,200.8 52.4,198.3 "/> <polygon class="st2" points="97,203.6 55.3,245.8 59.2,255 103,210.8 "/> <polygon class="st2" points="197.6,158.5 232.9,193.8 224.7,198.3 188.7,161.7 "/> <polygon class="st2" points="186.2,164.6 220.4,199 192.8,209 182.3,237 141.9,196.7 145.7,191.6 181.2,200.8 184.1,198.3 "/> <polygon class="st2" points="139.4,203.6 181.2,245.8 177.3,255 133.4,210.8 "/> </svg> </div>';
		}
		for(var i=0;i<party4;i+=1){
			showParty4+='<div class="col-gra-line"><svg version="1.1" id="Layer_1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 237.3 258.7" style="enable-background:new 0 0 237.3 258.7;" xml:space="preserve"> <style type="text/css">.st3{fill:#727272;}</style><path class="st3" d="M218.2,80.1l-36-14.5l-2.5-38.5l-37,9.2l-24-29.7l-25,29.7l-37-9.5l-2,39L18.2,79.3l21.8,32.1l-21.8,30.9 l37,15.5l1.8,38.3l36.7-9.3l25,29.5l23.8-29.3l37.8,8.5l2.3-37.3l35.8-14.5l-21-31.2L218.2,80.1z M118.8,167.1 c-30.7,0-55.6-24.9-55.6-55.6s24.9-55.6,55.6-55.6s55.6,24.9,55.6,55.6S149.5,167.1,118.8,167.1z"/> <polygon class="st3" points="38.9,158.5 3.5,193.8 11.8,198.3 47.8,161.7 "/> <polygon class="st3" points="50.3,164.6 16,199 43.7,209 54.2,237 94.5,196.7 90.8,191.6 55.3,200.8 52.4,198.3 "/> <polygon class="st3" points="97,203.6 55.3,245.8 59.2,255 103,210.8 "/> <polygon class="st3" points="197.6,158.5 232.9,193.8 224.7,198.3 188.7,161.7 "/> <polygon class="st3" points="186.2,164.6 220.4,199 192.8,209 182.3,237 141.9,196.7 145.7,191.6 181.2,200.8 184.1,198.3 "/> <polygon class="st3" points="139.4,203.6 181.2,245.8 177.3,255 133.4,210.8 "/> </svg> </div>';
		}
		$('#grafic-con').html(showParty1);
		$('#grafic-ndp').html(showParty2);
		$('#grafic-gre').html(showParty3);
		$('#grafic-lib').html(showParty4);
		
		$("#grafic-con").animate({"height":(41*party1)+"px"},1000);
		$("#grafic-ndp").animate({"height":(41*party2)+"px"},1000);
		$("#grafic-gre").animate({"height":(41*party3)+"px"},1000);
		$("#grafic-lib").animate({"height":(41*party4)+"px"},1000);
	}
	
	$(".votingBoxGra").click(function(){
		openGrapficBox=0;
		$("#grafic-con").stop();
		$("#grafic-ndp").stop();
		$("#grafic-gre").stop();
		$("#grafic-lib").stop();
		$(this).fadeOut(500);
		$("#grafic-con").animate({"height":"0px"},1000);
		$("#grafic-ndp").animate({"height":"0px"},1000);
		$("#grafic-gre").animate({"height":"0px"},1000);
		$("#grafic-lib").animate({"height":"0px"},1000);
	});

	$(".see-you-vote").click(function(){
		if(openGrapficBox==0){
			openGrapficBox=1;
			$("#grafic-con").stop();
			$("#grafic-ndp").stop();
			$("#grafic-gre").stop();
			$("#grafic-lib").stop();
			$("#grafic-con").css("height","0px");
			$("#grafic-ndp").css("height","0px");
			$("#grafic-gre").css("height","0px");
			$("#grafic-lib").css("height","0px");
			$(".votingBoxGra").eq(0).fadeIn(500);
			showGraphicVote();
		}else{
			openGrapficBox=0;
			$("#grafic-con").stop();
			$("#grafic-ndp").stop();
			$("#grafic-gre").stop();
			$("#grafic-lib").stop();
			$(".votingBoxGra").eq(0).fadeOut(500);
			$("#grafic-con").animate({"height":"0px"},1000);
			$("#grafic-ndp").animate({"height":"0px"},1000);
			$("#grafic-gre").animate({"height":"0px"},1000);
			$("#grafic-lib").animate({"height":"0px"},1000);
		}
		
	});

