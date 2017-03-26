var messageComparing="";
var topicSelected="";
var partiesSelected=0;
var changeCurrent=1;
var movingScroll=false;
var animationStatus=false;
var iScrollPos = 0;

$(function(){
    
    
    
    resize();
    
    
    
    
    
    
    $(this).scrollTop(0);
    if($( window ).width()>1024){
        document.body.addEventListener("wheel", myFunction);
    }
    
    
    function myFunction(size) {
   
        if(size.wheelDelta<0){
            if(!movingScroll){
                changeCurrent+=1;
                var target = $("#scroll"+changeCurrent);
                if (target.length) {
                    if(!animationStatus){
                        movingScroll=true;
                        animationStatus=true;
                        $('body').animate({scrollTop: target.offset().top}, 1000,scrollAnimationFinished);
                    }
                }
            }
        }else{
            if(!movingScroll){
                changeCurrent-=1;
                if(changeCurrent<=0){
                    changeCurrent=0;
                }
                var target = $("#scroll"+changeCurrent);
                if (target.length) {
                    if(!animationStatus){
                        movingScroll=true;
                        animationStatus=true;
                        $('body').animate({scrollTop: target.offset().top}, 1000,scrollAnimationFinished);
                    }
                }
            }
        }
    }
    
    $(".sidebar-topic").click(function() {
        $('html, body').stop();
        var target = $("#"+$(this).data("direct"));
        if (target.length) {
            changeCurrent=$(this).data("direct").match(/\d+/);
            $('html, body').animate({scrollTop: target.offset().top}, 1000);
        }
    });
   
    $(".sidebar-topic").each(function(index){
        $(this).mouseover(function(){
            $(".tip-topic").eq(index).css("transform","translateX(175px)");
        });
        $(this).mouseout(function(){
            $(".tip-topic").eq(index).css("transform","translateX(0px)");
        });
    });
    
    $("#filterShow").click(function(){
        movingScroll=true;
        $("#modalBox").fadeIn("0.2","swing");
    });
    
    $("#closeComparingBox").click(function(){
        $("#modalBox").fadeOut("0.2","swing");
    });
    
    $(".sidebar-topic-filt").click(function(){
        if($(this).data("selected")==0){
            $(this).data("selected",1);
            $(this).css("color","white");
        }else{
            $(this).data("selected",0);
            $(this).css("color","black");
        }
        updateComparingContent();
    });
    
    $(".party-top-comp").click(function(){
        if($(this).data("selected")==0){
            partiesSelected+=1;
            $(this).data("selected",1);
            $(this).css("color","white");
        }else{
            partiesSelected-=1;
            $(this).data("selected",0);
            $(this).css("color","black");
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
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
              $('html, body').delay(500).animate({
                scrollTop: target.offset().top
              }, 1000);
              return false;
            }
          }
        });
    });
    
    $("#subscribe-button").click(function(){
        $("#subscribe-box").slideToggle({"display":"initial"},2000,"ease");
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
    //                  CONSERVATIVE
    // ===================================================

    function conservativeDesc(){
        
        if(window.innerWidth > 1024){
            setInterval(function(){

                $(".conservative-desc-para").css("margin-right","0");
                $(".conservative-desc-title").css("width","50%");


            },2500);
        }
    }
    
    conservativeDesc();
    
    
    $(".voting-icons").each(function(){
        $(".voting-icons").hover(function(){
            $(".voting-icons").css("width","120px");
            
        },function(){
            $(".voting-icons").css("width","100px");
            
        });
    });
    
    (function($) {
        $.fn.clickToggle = function(func1, func2) {
            var funcs = [func1, func2];
            this.data('toggleclicked', 0);
            this.click(function() {
                var data = $(this).data();
                var tc = data.toggleclicked;
                $.proxy(funcs[tc], this)();
                data.toggleclicked = (tc + 1) % 2;
            });
            return this;
        };
    }(jQuery));
    
    $(".voting-icons").clickToggle(function(){
        $(".voting-icons").attr('src','img/conservative/badge-icon-clicked.svg');
        $(".voted").css("margin-top","0");
        $(".voting-icons").css("width","120px");

    },function(){
        $(".voting-icons").attr('src','img/conservative/badge-icon.svg');
        $(".voted").css("margin-top","800px");
        $(".voting-icons").css("width","100px");
    });
    
    
    
    $(".voting-icons-mediumsmall").clickToggle(function(){
        $(".voting-icons-mediumsmall").attr('src','img/conservative/badge-icon-clicked.svg');
        $(".voted").css("margin-top","0");
        $(".voting-icons-mediumsmall").css("width","100px");

    },function(){
        $(".voting-icons-mediumsmall").attr('src','img/conservative/badge-icon-mediumsmall.svg');
        $(".voted").css("margin-top","800px");
        $(".voting-icons-mediumsmall").css("width","80px");
    });
    
    
    
    
    
    
    
    
    
});





function scrollAnimationFinished(){
    movingScroll=false;
    animationStatus=false;
}

function updateComparingContent(){
    messageComparing="";
    $(".sidebar-topic-filt").each(function(){
        if($(this).data("selected")==1){
            messageComparing+="<div class='clear-fix'>";
            messageComparing+="<p class='content-topic-default'>"+$(this).text()+"</p>";
            topicSelected=$(this).text();
            $(".party-top-comp").each(function(){
                if($(this).data("selected")==1){
                    messageComparing+="<div class='content-topic-party"+partiesSelected+" col'><div class='content-showing-style'>"+$(this).text()+" "+topicSelected+"</div></div>";
                    
                }
            });
            messageComparing+="</div>";
        }
    });
    if(partiesSelected==0){
        $("#contentTopic").html('<p class="content-topic-default">Please select the parties and Topics.</p>');
    }else{
        $("#contentTopic").html(messageComparing);
    }
}