<?php
//for header redirection
ob_start();

//start session - needed to capture login information
session_start();

//connnect to the controller
require("../controllers/logincontroller.php");

require_once "../controllers/Session.php";


if (isset($_POST['register_user'])){


// Get form data
	$customer_email = $_POST['customer_email'];
	$customer_name = $_POST['customer_name'];
	$customer_country = $_POST['customer_country'];
	$customer_contact = $_POST['customer_contact'];
	$customer_city = $_POST['customer_city'];
	$customer_pass = $_POST['customer_pass'];
	$user_role = $_POST['user_role'];



//    $check_email = emailExist($customer_email);
//    if ($check_email){
//        header('Location: register.php');
//        $_SESSION['email-exist'] = 'Email Already exist!!';
//    }


	$hash = password_hash($customer_pass, PASSWORD_DEFAULT);
//	check if email exist
	$register = register_user($customer_name, $customer_email, $hash,$customer_country,$customer_city,$customer_contact,$user_role);
	if ($register) {

		header('Location: login.php');
        $_SESSION['register-success'] = 'Account created successfully';
	}else{
				//echo failure
//		echo "error";
        header('Location: register.php');
        $_SESSION['register-error'] = 'Error creating account';




			}

	}


//check if login button was clicked
if (isset($_POST['login_user'])){
	//grab form details
	$customer_email = $_POST['customer_email'];
	$customer_pass = $_POST['customer_pass'];
	$check_login = login_user($customer_email);

	if ($check_login) {
		//email exist, continue to password
		//get password from database
		$hash = $check_login[0]['customer_pass'];

		if (password_verify($customer_pass, $hash))
		{
				//create session for id, role and name
				$_SESSION["user_id"] = $check_login[0]['customer_id'];

				$_SESSION["user_role"] = $check_login[0]['user_role'];
				$_SESSION["customer_name"] = $check_login[0]['customer_name'];
				$_SESSION["customer_name"] = $check_login[0]['customer_email'];

				Session::put('auth',$check_login);

				//redirection to home page
				header('Location: ../index.php');

				//to make sure the code below does not execute after redirection use exit
				exit;
		} else
		{
				//echo appropriate error

				header('Location: login.php');
		}

	} else{
		//echo appropriate error
		echo "incorrect username or password";
	}
}

if (isset($_POST['login_admin'])){
	//grab form details
	$lemail = $_POST['email'];
	$lpass = $_POST['pass'];
	$check_login = login_admin($lemail);

	if ($check_login) {
		//email exist, continue to password
		//get password from database
		$hash = $check_login[0]['admin_pass'];

		if (password_verify($lpass, $hash))
		{
				//create session for id, role and name
				$_SESSION["user_id"] = $check_login[0]['admin_id'];
				$_SESSION["user_name"] = $check_login[0]['firstname'];

				//redirection to home page
				header('Location: ../admin/index.php');

				//to make sure the code below does not execute after redirection use exit
				exit;
		} else
		{
				//echo appropriate error

				header('Location: login.php');
		}

	} else{
		//echo appropriate error
		echo "incorrect username or password";
	}
}

?>
