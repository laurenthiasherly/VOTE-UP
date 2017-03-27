<?php 

    $host="localhost";
    $user="root";
    $password="";
    $database="vote_db";

    $conn=mysqli_connect($host,$user,$password,$database);

    if(!$conn){
        echo "error : " + mysqli_connect_error();
    }else{
        
        $query="SELECT * FROM mp_tbl WHERE province = '".$_POST["province"]."'";
        $result=mysqli_query($conn,$query);

        $rowData=mysqli_num_rows($result);

//        echo $query;
        
        $message="";
        
        $count=1;
        $countData=0;

        if($rowData>0){
            while($row = mysqli_fetch_assoc($result)){
                if(($countData%2)==0){
                    $message.="<div class='background-mp".$count."'>";
                    $message.="<div class='row'>";
                    $message.=  "<div class='column small-12 medium-6 large-6 mp-picture'>";
                    $message.=      "<div class='mp-info'>";
                    $message.=          "<img class='mp-style' src='".$row["img"]."' />";
                    $message.=          "<p>".$row["name"]."</p>";
                    $message.=      "</div>";
                    $message.=  "</div>";
                    $message.=  "<div class='column small-12 medium-6 large-6 background-content-mp".$count."'>";
                    $message.=  "</div>";
                    $message.="</div>";
                    $message.="</div>";
                    $count+=1;
                    if($count==3){
                        $count=1;
                    }
                    $countData+=1;
                }else{
                    $message.="<div class='background-mp".$count."'>";
                    $message.="<div class='row'>";
                    $message.=  "<div class='column small-12 medium-6 large-6 background-content-mp".$count."'>";
                    $message.=  "</div>";
                    $message.=  "<div class='column small-12 medium-6 large-6 mp-picture'>";
                    $message.=      "<div class='mp-info'>";
                    $message.=      "<img class='mp-style' src='".$row["img"]."' />";
                    $message.=      "<p>".$row["name"]."</p>";
                    $message.=  "</div>";
                    $message.=  "</div>";
                    $message.="</div>";
                    $message.="</div>";
                    $count+=1;
                    if($count==3){
                        $count=1;
                    }
                    $countData+=1;
                }
                
            }
        }
        echo $message;
        mysqli_close($conn);
    }

?>