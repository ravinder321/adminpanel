<?php
	include('common/connection.php');
	if(!empty($_POST['save']))
	{
		$old=$_POST['old'];
		$new=$_POST['new'];
		$nnew=$_POST['nnew'];
		if($new==$nnew)
		{
			$query="select * from login where password='$old'";
			$result=mysqli_query($connect,$query);
			$count=mysqli_num_rows($result);
			if($count>0)
			{
				$query="update login set password='$new'";
				mysqli_query($connect,$query);
				echo "Password Updated Successfully";
			}
			else
			{
				echo "Old Password Does Not Match";
			}
		}
		else
		{
			echo "New Password & Confirm New Password does not match";
		}
		
	}
?>
<html>
	<head>
		<title></title>
	</head>
	<link rel="stylesheet" type="text/css" href="css/style2.css"/>
	<body>
		<!--maincontainer goes here--!>
		<?php include('common/header.php');?>
		
		<!--maincontainer ends here--!>
		<!--maincontainer2 goes here--!>
		<div class="maincontainer3">
				<!--innercontainer2 goes here--!>
			<div class="left">
				<?php include('common/list.php');?>
			</div>
				<!--innercontainer2 ends here--!>
				<!--innercontainer3 goes here--!>
			<div class="right">
				<p class="page">Change Password</p>
				<div class="as">Change Password</div>
				<div class="table2">
				<form method="post">
					<input type="hidden" name="editid" value="<?php if(!empty($r['id'])) echo $r['id']?>" />
						<!--table3 goes here--!>
					<table class="table" border="1">
						<tr>
							<td>Enter Old password <input type="text"	name="old" /></td>
						</tr>
						<tr>
							<td>Enter New password <input type="text"	name="new" /></td>
						</tr>
						<tr>
							<td>Confirm New password <input type="text"	name="nnew"  /></td>
						</tr>
					</table>
					<!--table3 ends here--!>
						<input class="save" type="submit" name="save" value="save"/>
						<input class="cancel" type="button" value="Cancel"/>
						</form>
				</div>
			</div>
					<!--innercontainer3 ends here--!>
		</div>
				<!--maincontainer2 ends here--!>
			<div class="last"></div>
	</body>
</html>