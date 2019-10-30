<?php

header("Access-Control-Allow-Origin: *");

header("Content-Type:application/json;charset=UTF-8"
);

$host="localhost";$user="root";$pwd="";$db="science_quiz";

$qst=[];
$con=mysqli_connect($host,$user,$pwd);
mysqli_select_db($con,$db);

$result=mysqli_query($con,"select * from questions");

    
             while($rs=mysqli_fetch_array($result)){
                  array_push($qst,
			array( "qst"=>$rs['question'],"optA"=>$rs['optA'],"optB"=>$rs['optB'],"optC"=>$rs['optC'],"optD"=>$rs['optD'],"optE"=>$rs['optE'],"ans"=>$rs['ans'],"subject"=>$rs['subject'])
		  );
		}
		echo( json_encode($qst));
/**
$subs=["maths","physics","chemistry","geography"];
foreach($subs as $sub){
$rs=mysqli_query($con,"insert into subjects(name) value ('$sub')");
}**/
?>