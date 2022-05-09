<?php

	require ('db.php');

	$task = htmlspecialchars( $_POST['task'] );
	if ( empty( $task ) )
	{
		$task = htmlspecialchars( $_GET['task'] );
	}

	if(empty($task)) 
	{
		header('Location: index.php');
	}


	switch ( $task )   
	{
       
 		case "login" :	

		session_start();
        $email = mysql_real_escape_string(htmlspecialchars( $_POST['email'] ));
        $password = mysql_real_escape_string(htmlspecialchars( $_POST['password'] ));
		if(empty($email)) {
			$_SESSION['alert1'] = '1';
			header('Location: login.php'); exit();
		}
		if(empty($password)) {
			$_SESSION['alert1'] = '1';
			header('Location: login.php'); exit();
		}

                $numrows = mysql_num_rows(mysql_query("SELECT `id` FROM `users` WHERE `email` = '".$email."' && `password` = '".$password."'" ));
                if ( $numrows == 1 )
                {
			$rows = mysql_fetch_array(mysql_query( "SELECT `id`, `email`, `password` FROM `users` WHERE `email` = '".$email."' && `password` = '".$password."'" ));

			$_SESSION['id'] = $rows['id'];
			$_SESSION['alert'] = '1';
			header('Location: index.php');

		} else {
			$_SESSION['alert'] = '1';
			header('Location: login.php'); exit();
		}

		break;


		case "register" :

		session_start();
		$firstname = mysql_real_escape_string(htmlspecialchars( $_POST['fname'] ));
		$lastname = mysql_real_escape_string(htmlspecialchars( $_POST['lname'] ));
		$email = mysql_real_escape_string(htmlspecialchars( $_POST['email'] ));
        $password = mysql_real_escape_string(htmlspecialchars( $_POST['password'] ));
		if(empty($firstname)) {
			$_SESSION['alert'] = '1';
			header('Location: register.php'); exit();
		}
		if(empty($lastname)) {
			$_SESSION['alert'] = '1';
			header('Location: register.php'); exit();
		}
		if(empty($email)) {
			$_SESSION['alert'] = '1';
			header('Location: register.php'); exit();
		}
		if(empty($password)) {
			$_SESSION['alert'] = '1';
			header('Location: register.php'); exit();
		}
		$firstname = preg_replace("/[^A-Za-z0-9-]/", '', $firstname);
		$lastname = preg_replace("/[^A-Za-z0-9-]/", '', $lastname);
		$email = preg_replace("/[^A-Za-z0-9-]/", '', $email);
		$password = preg_replace("/[^A-Za-z0-9-]/", '', $password);

			
		$checkuser = mysql_num_rows(mysql_query("SELECT * FROM users WHERE email='$email'"));
		if($checkuser == '0'){

			$addclient = mysql_query("INSERT INTO users SET firstname='".$firstname."', lastname='".$lastname."', email='".$email."', password='".$password."'");

			if($addclient === TRUE){
				$_SESSION['alert2'] = '1';
				header('Location: login.php'); exit();
			} else {
				$_SESSION['alert'] = '1';
				header('Location: register.php'); exit();
			}

		} else {
			$_SESSION['alert1'] = '1';
			header('Location: register.php'); exit();
		}

		break;

	}
?>