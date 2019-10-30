<?php

header("Access-Control-Allow-Origin: *");

header("Content-Type:application/json;charset=UTF-8"
);

$param=json_decode($_GET['q']);
$qt=[];
$msg=array("msg"=>"");

$qst=$param->qst;
$type=trim($param->type);
$sbj=trim($param->sbj);
$oriq=trim($param->oriq);

$host="localhost";
$account="root";
$password="";
$connect= mysqli_connect($host,$account,$password)or
 die("server error");
$db =mysqli_select_db($connect,"science_quiz") or die("database error");

switch($type){
	case "delete" :
			$result=mysqli_query($connect,"delete  from questions where question='$qst'");
		$msg['msg']="question deleted successfully.";
		echo (json_encode($msg));
		break;
	case "all"  :
	$result=mysqli_query($connect,"select * from questions");

	while($rs=mysqli_fetch_array($result)){

		array_push($qt, array( "qst"=>$rs['question'],"optA"=>$rs['optA'],"optB"=>$rs['optB'],"optC"=>$rs['optC'],"optD"=>$rs['optD'],"optE"=>$rs['optE'],"ans"=>$rs['ans'],"subject"=>$rs['subject']) );
                }
                echo( json_encode($qt));
		
		break;
		
	case "update" :
	
	
	//error_log(print_r($qst, true ));
	
	
 	 $result=mysqli_query($connect,"update questions set question='$qst->qst', optA='$qst->optA', optB='$qst->optB' ,optC='$qst->optC',optD='$qst->optD', optE='$qst->optE', ans='$qst->ans' where subject='$sbj' and question='$oriq'");

	  
	     if($result){
		$msg['msg']="question update successful.";
			echo json_encode($msg);
		}
		else{
		$msg['msg']="question update error.";
		echo json_encode($msg);
}
	     break;
	default:null;	

}

?>