<?php 
ob_start();
session_start();

	include "../connection.php";
	
	$UserName=$_POST['txtUserID'];
	$pass=$_POST['txtPass'];
	
	$rs = mysqli_query($con,"select * from admin where UserName='".$UserName."'");
		if (mysqli_num_rows($rs)==0)
		{
		//session_register ("msg");
		$_SESSION['msg'] = "Invalid User Name";
		header ("Location:login.php");
		}
		else
		{
		$data = mysqli_fetch_array($rs);
			if ($data['Password'] == $pass)
			{
			//session_register("usemail");
			$_SESSION['usemail'] = $email;
			
			//session_register ("usname");
			$_SESSION['UserName'] = $data['Org_Name'];
		
			
					header ("Location:../index.php");
				
			}
			else
			{
			//session_register ("msg");
			$_SESSION['msg'] = "Invalid Password";
			header ("Location:login.php");
			}
	
	   }

mysqli_free_result ($rs);
?>