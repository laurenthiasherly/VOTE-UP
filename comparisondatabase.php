<?php 

    $host="localhost";
    $user="root";
    $password="";
    $database="party_db";

    $conn=mysqli_connect($host,$user,$password,$database);

    if(!$conn){
        echo "error : " + mysqli_connect_error();
    }else{
        mysqli_set_charset($conn,"utf8");
        $topicList=explode(",",$_POST["topics"]);
        $arrrayParty=explode(",",$_POST["party"]);
        $arrrayParty=convertShorttoCom($arrrayParty);
        $arrrayParty=addPartyQuery($arrrayParty,'party');
        $topicList=addPartyQuery($topicList,'topic');
        $query="SELECT * FROM party_tbl WHERE (".join(" OR ",$arrrayParty).") AND (".join(" OR ",$topicList).") ORDER BY topic";
//        echo $query;
        $result=mysqli_query($conn,$query);

        $rowData=mysqli_num_rows($result);

        $message="";

        if($rowData>0){
            $counter=0;
            $counterrow=0;
            while($row = mysqli_fetch_assoc($result)){
                if(count($arrrayParty)<=3){
                    if($counter==0){
                        $message.="<div class='clear-fix'>";
                        $message.="<h1 class='content-topic-default'>".$row['topic']."</h1>";
                    }
                    $message.="<div class='content-topic-party".count($arrrayParty)." col'><div class='content-showing-style'><div class='topic-title-".strtolower(str_replace("NDP","democratic",$row['party']))."'>".strtoupper($row['party'])." PARTY"."</div><div class='comparison-content'>".$row['column-1-p1']."</div></div></div>";
                    $counter+=1;
                    if($counter==count($arrrayParty)){
                        $message.="</div>";
                        $counter=0;
                    }
                }else{
                    if($counter==0){
                        $message.="<div class='clear-fix'>";
                        $message.="<h1 class='content-topic-default'>".$row['topic']."</h1>";
                    }
                    if($counterrow==0){
                        $message.="<div class='large-6 column'>";
                    }
                    $message.="<div class='content-topic-party".count($arrrayParty)." col'><div class='content-showing-style'><div class='topic-title-".strtolower(str_replace("NDP","democratic",$row['party']))."'>".strtoupper($row['party'])." PARTY"."</div><div class='comparison-content'>".$row['column-1-p1']."</div></div></div>";
                    $counter+=1;
                    $counterrow+=1;
                    if($counterrow==2){
                        $message.="</div>";
                        $counterrow=0;
                    }
                    if($counter==count($arrrayParty)){
                        $message.="</div>";
                        $counter=0;
                    }
                }
            }
        }
        echo $message;
        mysqli_close($conn);
    }


    function addPartyQuery($arrayP,$conca){
        for($i=0;$i<count($arrayP);$i+=1){
            $arrayP[$i]=$conca."='".str_replace("DEMOCRATIC","NDP",$arrayP[$i])."'";
        }
        return $arrayP;
    }

    function convertShorttoCom($arrayP){
        for($i=0;$i<count($arrayP);$i+=1){
            $arrayP[$i]=searchChangeName($arrayP[$i]);
        }
        return $arrayP;
    }

    function searchChangeName($partyname){
        if($partyname=="LI"){
            return str_replace("LI","Liberal",$partyname);
        }else if($partyname=="CO"){
            return str_replace("CO","Conservative",$partyname);
        }else  if($partyname=="GR"){
            return str_replace("GR","Green",$partyname);
        }else {
            return $partyname;
        } 
    }

?>