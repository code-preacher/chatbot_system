<?php
include_once "library/lib.php";
include_once "classes/crud.php";

$crud=new Crud;
$lib=new Lib;


$response=$crud->displaySearchWithOption('bot','reply','question',$_POST['text']);
if ($response) {
	$replay=$response['reply'];
	echo '<pre>'.$replay.'</pre>';
} else {
	echo "Sorry can't understand you, please try another question!";
}

?>