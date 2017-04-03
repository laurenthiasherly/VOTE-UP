<?php 
    $host="localhost";
    $user="root";
    $password="";
    $database="party_db";

    $conn=mysqli_connect($host,$user,$password,$database);

    if(!$conn){
        echo "error : " + mysqli_connect_error();
    }else{
//         $query="SELECT * FROM mp_tbl WHERE province = 'British Columbia'";
		mysqli_set_charset($conn,"utf8");
        $query="SELECT * FROM mp_tbl WHERE province ='".$_POST["province"]."'";
        $result=mysqli_query($conn,$query);

        $rowData=mysqli_num_rows($result);

//        echo $query;
        
        $message="";
		$arrayConservative=array();
        $arrayGreen=array();
		$arrayDemocratic=array();
		$arrayLiberal=array();
		$numberCount=0;
			
        if($rowData>0){
            while($row = mysqli_fetch_assoc($result)){
				$message="";
				if($row['party']=='NDP'){
					$numberCount=count($arrayDemocratic)%2;
				}else if($row['party']=='Conservative'){
					$numberCount=count($arrayConservative)%2;
				}else if($row['party']=='Green'){
					$numberCount=count($arrayGreen)%2;
				}else {
					$numberCount=count($arrayLiberal)%2;
				}
				$message.=	"<div class='mp-picture background-mp-".trim(strtolower($row['party'])).$numberCount."'>";
				$message.=      "<div class='mp-info'>";
				$message.=          "<img class='mp-style' src='".$row["img"]."' />";
				$message.=      "</div>";
				$message.=      "<p>".$row["name"]."</p>";
				$message.=      "<p>".$row["local"]."</p>";
				$message.=      "<p><a target='_blank' href='".$row["link"]."'>Detail</a></p>";
				$message.=  "</div>";
				if($row['party']=='NDP'){
					array_push($arrayDemocratic,$message);
				}else if($row['party']=='Conservative'){
					array_push($arrayConservative,$message);
				}else if($row['party']=='Green'){
					array_push($arrayGreen,$message);
				}else {
					array_push($arrayLiberal,$message);
				}
            }
        }
		$message="<div class='small-12 medium-6 large-3 column'>";
		$message.="<div class='mp-ct-title-gr'><h2>GREEN PARTY</h2></div>";
		if(count($arrayGreen)!=0){
			foreach($arrayGreen as $value){
				$message.=$value;
			}
		}else{
			$message.="<p>GREEN HAS NO MEMBERS IN ".strtoupper($_POST["province"])."</p>";
		}
		
		$message.="</div>";
		$message.="<div class='small-12 medium-6 large-3 column'>";
		$message.="<div class='mp-ct-title-co'><h2>CONSERVATIVE PARTY</h2></div>";
		if(count($arrayConservative)!=0){
			foreach($arrayConservative as $value){
				$message.=$value;
			}
		}else{
			$message.="<p>CONSERVATIVE HAS NO MEMBERS IN ".strtoupper($_POST["province"])."</p>";
		}
		$message.="</div>";
		$message.="<div class='small-12 medium-6 large-3 column'>";
		$message.="<div class='mp-ct-title-ndp'><h2>NDP PARTY</h2></div>";
		if(count($arrayDemocratic)!=0){
			foreach($arrayDemocratic as $value){
				$message.=$value;
			}
		}else{
			$message.="<p>NDP HAS NO MEMBERS IN ".strtoupper($_POST["province"])."</p>";
		}
		$message.="</div>";
		$message.="<div class='small-12 medium-6 large-3 column'>";
		$message.="<div class='mp-ct-title-li'><h2>LIBERAL PARTY</h2></div>";
		if(count($arrayLiberal)!=0){
			foreach($arrayLiberal as $value){
				$message.=$value;
			}
		}else{
			$message.="<p>LIBERAL HAS NO MEMBERS IN ".strtoupper($_POST["province"])."</p>";
		}
		$message.="</div>";
		
        echo $message;
        mysqli_close($conn);
    }

?>