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

		// redirect the user to the next question
		$next = $number++;

		/*
		*	Get total number of questions
		*/

		$query = "SELECT * FROM `questions`";

		// Get result
		$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
		$total = $results->num_rows;

		/*
		*	Get correct choice
		*/

		$query = "SELECT * FROM `choices`
					WHERE question_number = $number AND is_correct = 1";

		// Get result
		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

		// Get row
		$row = $result->fetch_assoc();

		// Set the correct choice
		$correct_choice = $row['id'];

		// Compare
		if($correct_choice == $selected_choice){

			// Answer is correct
			$_SESSION['score']++;
		}

		// Check to see if this is the last question
		if($number == $total){

			header("Location: final.php");
			exit();

		} else {
			header("Location: question.php?n=".$next)
		}
	}
?>