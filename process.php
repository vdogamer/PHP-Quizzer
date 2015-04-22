<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php
	// Check to see if score is set
	if(!isset($_SESSION['score'])){
		$_SESSION['score'] = 0;
	}

	if($_POST){
		$number = $_POST['number'];    // number is from the DOM 
		$selected_choice = $_POST['choice'];     // choice is from the DOM

		//echo $number.'<br>';
		//echo $selected_choice;

		print_r($_POST);
	}
?>