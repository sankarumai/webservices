<?php 

	$response 	=	array();

	require_once __DIR__ . '/dbconnect.php';

	$db 		=	new dbconnect(); 

	if(isset($_GET['opt1'])&&isset($_GET['opt2']))
	{
		$username	=	$_GET['opt1'];
		$password	=	$_GET['opt2'];

		$result		=	mysql_query("SELECT username , password from login where username = '$username' and password = '$password'");

		if(mysql_num_rows($result)>0)
		{
			$response['success']	=	1;
			$response['message']	=	'Succesfull login';

			echo json_encode($response);

		}else
		{
			$response['success']	=	0;
			$response['message']	=	'Login failed';

			echo json_encode($response);

		}
	}
	elseif (isset($_GET['opt1'])) {
		# code...
		$val	=	$_GET['opt1'];
		if ($val === 'notify') {

			$response['success']	=	1;
			$response['message']	=	'Welcome to SBIT';

			echo json_encode($response);
			
		}elseif ($val === 'town') {
			
			$result		=	mysql_query("SELECT TownName from town ");

			if(mysql_num_rows($result)>0){

				$response['success']	=	1;

				$response['users']	=	array();
				while ($rows = mysql_fetch_array($result)) {
					# code...
					$users	=	array();
					$users['TownName']		=	$rows['TownName'];
				
					array_push($response['users'], $users);
				}
				echo json_encode($response);
				
			}
		}
		elseif ($val === 'doctor') {
			
			$result		=	mysql_query("SELECT DoctorName from doctor ");

			if(mysql_num_rows($result)>0){

				$response['success']	=	1;

				$response['users']	=	array();
				while ($rows = mysql_fetch_array($result)) {
					# code...
					$users	=	array();
					$users['DoctorName']		=	$rows['DoctorName'];
				
					array_push($response['users'], $users);
				}
				echo json_encode($response);
				
			}
		}
		elseif ($val === 'product') {
			
			$result		=	mysql_query("SELECT ProductName from product ");

			if(mysql_num_rows($result)>0){

				$response['success']	=	1;

				$response['users']	=	array();
				while ($rows = mysql_fetch_array($result)) {
					# code...
					$users	=	array();
					$users['ProductName']		=	$rows['ProductName'];
				
					array_push($response['users'], $users);
				}
				echo json_encode($response);
				
			}
		}
		elseif ($val === 'gift') {
			
			$result		=	mysql_query("SELECT GiftName from gift ");

			if(mysql_num_rows($result)>0){

				$response['success']	=	1;

				$response['users']	=	array();
				while ($rows = mysql_fetch_array($result)) {
					# code...
					$users	=	array();
					$users['GiftName']		=	$rows['GiftName'];
				
					array_push($response['users'], $users);
				}
				echo json_encode($response);
				
			}
		}
		elseif ($val === 'work') {
			
			$result		=	mysql_query("SELECT PersonName from person ");

			if(mysql_num_rows($result)>0){

				$response['success']	=	1;

				$response['users']	=	array();
				while ($rows = mysql_fetch_array($result)) {
					# code...
					$users	=	array();
					$users['PersonName']		=	$rows['PersonName'];
				
					array_push($response['users'], $users);
				}
				echo json_encode($response);
				
			}
		}
	}
	else
	{
		$response['success']	=	0;
		$response['message']	=	'Invalid Path';

		echo json_encode($response);

	}
	
 ?>