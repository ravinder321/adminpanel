
	
<?php
	$connect=mysqli_connect("localhost","root","","adminpamel") or die ("Connection Failed");
	class admin
	{
		function login()
		{
			global $connect,$username,$password;
			if(!empty($_POST['save']))
			{
				$username=$_POST['un'];
				$password=$_POST['pw'];
				$query="select * from login where username='$username' and password='$password'";
				$result=mysqli_query($connect,$query);
				$count=mysqli_num_rows($result);
				if($count>0)
				{
					header('location:addpage.php');
				}
				else
				{
					echo"Login Not Success";
				}
			}
		}
	}
?>