<?php 

	/**
	* 
	*/
	class dbconnect 
	{
		
		function __construct()
		{
			# code...
			$this->connect();
		}

		function __destruct()
		{
			# code...
			$this->close();
		}

		function connect(){

			require_once __DIR__.'/dbconfig.php';

			$con 	=	mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die(mysql_error());

			$db 	=	mysql_select_db(DB_DATABASE) or die(mysql_error());

			return $con;
		}

		function close()
		{
			mysql_close();
		}
	}
 ?>