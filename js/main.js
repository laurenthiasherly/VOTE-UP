var messageComparing="";
var topicSelected="";
var partiesSelected=0;
var changeCurrent=1;
var movingScroll=false;
var animationStatus=false;
var iScrollPos = 0;

var sizeOfScrollDiv=0;
var modalBoxShow=0;

$partyList=["conservative","democratic","green","liberal"]

$(function(){
    
    sizeOfScrollDiv=$(".scrollDiv").length;
   

    resize();
    
    if($( window ).width()>1024){
        document.body.addEventListener("wheel", myFunction);
        if($("#scrollOption").val()=="0"){
            $("body").css("overflow","hidden");
        }
    }else{
        $("body").css("overflow","auto");
    }
    
    console.log(changeCurrent + " "+sizeOfScrollDiv);
    
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
   
    $(".sidebar-topic").each(function(index){
        $(this).mouseover(function(){
            $(".tip-topic").eq(index).css("transform","translateX(185px)");
        });
        $(this).mouseout(function(){
            $(".tip-topic").eq(index).css("transform","translateX(0px)");
        });
    });
    
    $(".sidebar-topic-filt").each(function(index){
        $(this).mouseover(function(){
            $("#modal-text"+[index]).css("margin-left","0");
            $("#modal-text"+[index]).css("width","140px");
        });
        $(this).mouseout(function(){
            $("#modal-text"+[index]).css("margin-left","200px");
            $("#modal-text"+[index]).css("width","140px");
        });
        
    });
    
    
    $("#filterShow").click(function(){
        modalBoxShow=1;
//        $("body").css("overflow","hidden");
        $("#modalBox").fadeIn("0.2","swing");
    });
    
    $("#closeComparingBox").click(function(){
        modalBoxShow=0;
//        $("body").css("overflow","auto");
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
    //                   NAVIGATION BAR
    // ===================================================
    
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
    
    
    
    
    
    
    
    
    
    // ====================================================
    //                  HOMEPAGE
    // ===================================================
    
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
    
    
    
    
    
    
    // ------------ THE VIDEO -----------
    
    window.onresize = function(event){
        resize();
    }
    
    function resize(){
        //$("#my-video").css("width", window.innerWidth);
        //$("#my-video").css("height", window.innerHeight);
        $("#my-video").css("min-height", window.innerHeight);
        
        var boxHeight = $(".homepage-orange").height() + 20;
        //alert(boxHeight);
        $(".party-div-height").css("height",boxHeight);
    }
    
    
    
    // ====================================================
    //           CONSERVATIVE - ORIGINAL PAGE
    // ===================================================
    

    function conservativeDesc(){
        
        if(window.innerWidth > 1024){
            
            setInterval(function(){

                $("."+$("#type-party").val()+"-desc-para").css("margin-right","0");
                $("."+$("#type-party").val()+"-desc-title").css("width","50%");
                $(".side-topics-bar").slideDown({"display":"initial"},500);

            },2500);
        }
    }
    
    conservativeDesc();
    
    function checkBig(){
        $("#voting-icon").animate({"font-size":"24px"},1000,"swing",checkSmall);
    }
    
    function checkSmall(){
        $("#voting-icon").animate({"font-size":"20px"},1000,"swing", checkBig);
    }
    
    checkBig();
    

    
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
    
    $(".voting-icons-mediumsmall").click(function(){
        
        
        if($(this).attr('data-vote')=='0'){
            $(this).attr('src','img/conservative/badge-icon-clicked.svg');
            $(".voted-m").eq($(this).data("voted")).css("margin-top","0");
            $(".voting-icons-mediumsmall").eq($(this).data("voted")).css("width","100px");
            $(this).attr('data-vote','1');
            setCookie($(this).attr('id'),'1',1);
        }else{
            $(this).attr('src','img/conservative/badge-icon-mediumsmall.svg');
            $(".voted-m").eq($(this).data("voted")).css("margin-top","300px");
            $(".voting-icons-mediumsmall").eq($(this).data("voted")).css("width","80px");
            $(this).attr('data-vote','0');
            delete_cookie($(this).attr('id'));
        }
        updateVoting();
    });

    
    
    var partyBg = ["economy","economy", "economy", 
                    "environment","environment","environment",
                    "education","education","education",
                        "health","health","health",
                    "immigration","immigration","immigration",
                    "housing","housing","housing",
                    "foreign-policy","foreign-policy","foreign-policy",
                    "privacy","privacy","privacy",
                    "electoral-reform-1","electoral-reform-1","electoral-reform-1"];
    
//    $("#topics-bg3").css("background","url(img/conservative/"+partyBg[3]+".jpg)");
    
    $(".topics-bg").each(function(index){
        $("#topics-bg"+[index]).css("background","url(img/conservative/"+partyBg[index]+".jpg)");
        $(".topics-bg").css("background-size","cover");
        $(".topics-bg").css("background-position","center");
    });
    
    
    

    // ====================================================
    //              PARTY PAGE SCROLLING SECTION    
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
//                messageComparing+="<div class='clear-fix'>";
//                messageComparing+="<h1 class='content-topic-default'>"+$(".tip-topic").eq(index).text()+"</h1>";
//                topicSelected=$(this).text();
//                $(".party-top-comp").each(function(){
//                    if($(this).data("selected")==1){
//                        messageComparing+="<div class='content-topic-party"+partiesSelected+" col'><div class='content-showing-style'><div class='topic-title-"+$(this).text().toLocaleLowerCase()+"'>"+$(this).text()+" PARTY"+"</div><div class='comparison-content'>Proin tempus lobortis quam, non varius libero eleifend et. Aliquam vehicula, augue quis sodales lacinia, lectus felis facilisis diam, ac lacinia nulla sapien auctor orci. Ut bibendum ornare hendrerit. </div></div></div>";
//
            }
//                });
//                messageComparing+="</div>";
//            }
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
    
    
    //////////////////// AJAX ///////////////////////


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


    /////////////////////////////////////////////////
    

    window.onbeforeunload = function(){
        $('body').stop(); 
        window.scrollTo(0,0); 
    }

    // ====================================================
    //            WHO'S MY MP (MAP) PAGE 
    // ====================================================
    
    $(".map-title").css("left","0");


    // ====================================================
    //                  VOTING SYSTEM
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
        $(".voting-box").animate({"height":"0", "bottom":"-10px"},400);
    });

    $(function(){

        updateVoting();

        $('.voting').click(function(){
    //        alert($(this).attr("id"));
            if($(this).attr('data-vote')=='0'){
                $(this).css('background-color','blue');
                $(this).css('color','white');
                $(this).attr('data-vote','1');
                setCookie($(this).attr('id'),'1',1);
            }else{
                $(this).css('background-color','white');
                $(this).css('color','black');
                $(this).attr('data-vote','0');
                delete_cookie($(this).attr('id'));
            }
            updateVoting();
        });

    });

    function updateVoting(){
        party1=0;
        party2=0;
        party3=0;
        party4=0;
        for(var i=0;i<$partyList.length;i+=1){
            for(var j=1;j<=9;j+=1){
                if(checkCookie($partyList[i]+"-"+j)){
                    $("#"+$partyList[i]+"-"+j).attr('src','img/conservative/badge-icon-clicked.svg');
                    $(".voted").eq( $("#"+$partyList[i]+"-"+j).data("voted")).css("margin-top","0");
                    $(".voting-icons").eq( $("#"+$partyList[i]+"-"+j).data("voted")).css("width","120px");
                    $("#"+$partyList[i]+"-"+j).attr('data-vote','1');

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
    }

    function resetVotingBox(){
        party1=0;
        party2=0;
        party3=0;
        party4=0;
        for(var i=0;i<$partyList.length;i+=1){
            for(var j=1;j<=9;j+=1){
                if(checkCookie($partyList[i]+"-"+j)){
                   $("#"+$partyList[i]+"-"+j).attr('src','img/conservative/badge-icon.svg');
                    $(".voted").eq( $("#"+$partyList[i]+"-"+j).data("voted")).css("margin-top","300px");
                    $(".voting-icons").eq($("#"+$partyList[i]+"-"+j).data("voted")).css("width","100px");
                    $("#"+$partyList[i]+"-"+j).attr('data-vote','0');
                    delete_cookie($partyList[i]+"-"+j);
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

});


