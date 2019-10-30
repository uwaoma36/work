<?php

header("Access-Control-Allow-Origin: *");

header("Content-Type:application/json;charset=UTF-8");

$param=json_decode($_GET['data']);
$msg=array("msg"=>"");
//$out=array("name"=>"abu");
//$param=json_encode($param);

$qst=trim($param->quest);
$opta=trim($param->opta);
$optb=trim($param->optb);
$optc=trim($param->optc);
$optd=trim($param->optd);
$opte=trim($param->opte);
$ans=trim($param->ans);
$subj=trim($param->subj);
 

$host="localhost";
$account="root";
$password="";
$connect= mysqli_connect($host,$account,$password)or
 die("server error");
$db =mysqli_select_db($connect,"science_quiz") or die("database error");

$result=mysqli_query($connect,"insert into questions(question,optA,optB,optC,optD,optE,ans,subject) values ('$qst','$opta','$optb','$optc','$optd','$opte','$ans','$subj')");

if($result==1){
$msg['msg']="question submit successful.";
echo(json_encode($msg));
}
else{
$msg['msg']="question already exists.";
echo(json_encode($msg));
}


?>