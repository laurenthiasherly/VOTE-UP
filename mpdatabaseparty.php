<?php 
    $host="localhost";
    $user="root";
    $password="";
    $database="party_db";

    $conn=mysqli_connect($host,$user,$password,$database);

    if(!$conn){
        echo "error : " + mysqli_connect_error();
    }else{
		$party=$_POST["party"];
		if($_POST["party"]=='democratic'){
			$party='ndp';
		}
		$Limitdef=35;
		if($_POST["type"]==1){
			$Limitdef=10;
		}
		mysqli_set_charset($conn,"utf8");
        $query="SELECT * FROM mp_tbl WHERE province ='".$_POST["province"]."' AND party = '".$party."' LIMIT ".$Limitdef;
        $result=mysqli_query($conn,$query);
//		echo $query;
        $rowData=mysqli_num_rows($result);
        $message="";
		$arrayConservative=array();
        $arrayGreen=array();
		$arrayDemocratic=array();
		$arrayLiberal=array();
		$numberCount=0;
			
        if($rowData>0){
			if($_POST["type"]==0){
				$message.="<ul class='party-mp-list-style".ceil($rowData/10)."'>";
			}else{
				$message.="<ul class='party-mp-list-style1'>";
			}
			
            while($row = mysqli_fetch_assoc($result)){
				$message.="<li>".$row["name"]."</li>";
            }
			$message.="</ul>";
        }
		
        echo $message;
        mysqli_close($conn);
    }

?>