<?php 

	$response	=	array();


	require_once __DIR__ .'/dbconnect.php';

	$db 		= 	new dbconnect();

	//Update a data
	
	if(isset($_GET['userid'])&&isset($_GET['username']) && isset($_GET['password']) && isset($_GET['email']))
	{
		$id			=	$_GET['userid'];
		$username	=	$_GET['username'];
		$password	=	$_GET['password'];
		$email		=	$_GET['email'];

		$result		=	mysql_query("UPDATE login set username = '$username', password = '$password', email = '$email' where userid = '$id'");

		if($result)
		{
			$response['success']	=	1;
			$response['message']	=	'User Updated';

			echo json_encode($response);

		}
	}
	//INSERT a Data
	else if (isset($_GET['username']) && isset($_GET['password']) && isset($_GET['email']))
	{

		$username	=	$_GET['username'];
		$password	=	$_GET['password'];
		$email		=	$_GET['email'];


		$result		=	mysql_query("INSERT INTO login(username,password,email) VALUES ('$username','$password','$email')");

		if($result)
		{
			$response["success"]	=	1;
			$response["message"]	=	"User Created";
			echo json_encode($response);
		}
		else
		{
			$response["success"]	=	0;
			$response["message"]	=	"Error";
			echo json_encode($response);
		}
	}
	//SELECT ALL Data
 
	else if(isset($_GET['all']))
	{
		$result		=	mysql_query("SELECT * from login ");

		if(mysql_num_rows($result)>0){

			$response['success']	=	1;

			$response['users']	=	array();
			while ($rows = mysql_fetch_array($result)) {
				# code...
				$users	=	array();
				$users['userid']		=	$rows['userid'];
				$users['username']		=	$rows['username'];
				$users['password']		=	$rows['password'];
				$users['email']			=	$rows['email'];

				array_push($response['users'], $users);
			}
			echo json_encode($response);
			
		}
		else
		{
			$response['success']	=	0;
			$response['message']	=	'USer Not Found';
			
			echo json_encode($response);

		}
	}
	//SELECT Particular User Data

	else if (isset($_GET["userid"])) {
 	
		$id			= $_GET['userid'];
		$result		= mysql_query("SELECT * from login where userid = '$id'");
		if(!empty($result))
		{
			if(mysql_num_rows($result)>0)
			{
				$result					=	mysql_fetch_array($result);
				$users 					=	array();
				$users['username']		=	$result['username'];
				$users['password']		=	$result['password'];
				$users['email']			=	$result['email'];
				$response['success']	=	1;
				$response['users']		=	array();
				array_push($response['users'], $users);
				echo json_encode($response);
			}
			else
			{
				$response['success']	=	0;
				$response['message']	=	'No Data found';

				echo json_encode($response);

			}

		}else
		{
			$response['success']	=	0;
			$response['message']	=	'No Data found';

			echo json_encode($response);
		}
	}
	//DELETE Data
	else if(isset($_GET['DeleteId']))
	{
		$id 	=	$_GET['DeleteId'];
		$result	=	mysql_query("DELETE From login where userid = '$id'");

		if(mysql_affected_rows()>0)
		{
			$response['success']	=	1;
			$response['message']	=	'Successfully Deleted';

			echo json_encode($response);
			
		}
		else
		{
			$response['success']	=	0;
			$response['message']	=	'No Data found';

			echo json_encode($response);
	
		}
	}	
	else
	{
		$response["success"]	=	0;
		$response["message"]	=	"Incorrect Path";
		echo json_encode($response);
		
	}

	


 ?>