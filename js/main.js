var messageComparing="";
var topicSelected="";
var partiesSelected=0;
var changeCurrent=1;
var movingScroll=false;
var animationStatus=false;
var iScrollPos = 0;

//Fix1
var sizeOfScrollDiv=0;


$(function(){
    
    //Fix1
    sizeOfScrollDiv=$(".scrollDiv").length;
   
    resize();
    
    $(this).scrollTop(0);
    
    
    
    document.body.addEventListener("wheel", myFunction);
    
    function myFunction(size) {
        getpositionActual();
        if(size.wheelDelta<0){
            
            if(!movingScroll){
                changeCurrent+=1;
                //Fix1
                if(changeCurrent<=sizeOfScrollDiv){
                    var target = $("#scroll"+changeCurrent);
                    if (target.length) {
                        if(!animationStatus){
                            movingScroll=true;
                            animationStatus=true;
                            $('body').animate({scrollTop: target.offset().top}, 1000).delay(200).animate({},scrollAnimationFinished);
                        }
                    }
                    //Fix1
                }else{
                    changeCurrent=sizeOfScrollDiv;
                }
            }
        }else{
            if(!movingScroll){
                changeCurrent-=1;
                //Fix1
                if(changeCurrent<=0){
                    changeCurrent=1;
                }else{
                    var target = $("#scroll"+changeCurrent);
                    if (target.length) {
                        if(!animationStatus){
                            movingScroll=true;
                            animationStatus=true;
                            $('body').animate({scrollTop: target.offset().top}, 1000).delay(200).animate({},scrollAnimationFinished);
                        }
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
            $("#nav-"+navParty[index]).css("padding","10px 20px 0 20px");

        },function(){
            $("#nav-"+navParty[index]).css("border-top","none");
        });
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
    });    
    $(".homepage-orange").mouseout(function(){
        $(".homepage-orange-hover").css("transform","translate(0,0)");              
    });
    
    
    $(".homepage-blue").mouseover(function(){
        $(".homepage-blue-hover").css("transform","translate(-100%,0)");          
    });    
    $(".homepage-blue").mouseout(function(){
        $(".homepage-blue-hover").css("transform","translate(0,0)");              
    });
    
    
    $(".homepage-green").mouseover(function(){
        $(".homepage-green-hover").css("transform","translate(100%,0)");          
    });    
    $(".homepage-green").mouseout(function(){
        $(".homepage-green-hover").css("transform","translate(0,0)");              
    });
    
    
    $(".homepage-red").mouseover(function(){
        $(".homepage-red-hover").css("transform","translate(100%,0)");          
    });    
    $(".homepage-red").mouseout(function(){
        $(".homepage-red-hover").css("transform","translate(0,0)");              
    });
    // ------------ THE VIDEO -----------
    
    window.onresize = function(event){
        resize();
    }
    
    function resize(){
        $("#my-video").css("width", window.innerWidth);
        $("#my-video").css("height", window.innerHeight);
        $("#my-video").css("min-height", window.innerHeight);
          
        
        var boxHeight = $(".homepage-orange").height() + 20;
        //alert(boxHeight);
        $(".party-div-height").css("height",boxHeight);
    }
    
    getpositionActual();
    
});

function getpositionActual(){
    console.log(document.body.scrollTop);
    for(var i=0;i<sizeOfScrollDiv;i++){
        console.log(document.getElementsByClassName('scrollDiv')[i].getBoundingClientRect().top);
    }
}



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

window.onbeforeunload = function(){
    $('body').stop(); 
    window.scrollTo(0,0); 
}