
	
<?php
	$connect=mysqli_connect("localhost","root","","adminpamel") or die ("Connection Failed");
	class admin1
	{
		function edit()
		{
			global $connect,$name,$content,$status;
			if (!empty($_POST['editid']))
			{
				$id=$_POST['editid'];
				$query="update page set name='$name',content='$content',status='$status' where id='$id'";
			}
			else
			{
				$query="insert into page (name,content,status) values('$name','$content','$status')";
			}
		
			if(mysqli_query($connect,$query))
			{
				echo "record inserted";
			}
			else
			{
				echo "record not inserted";
			}
		}
		function edit2()
		{
			global $connect,$r;
			if(!empty($_GET['eid']))
			{
				$id=$_GET['eid'];
				$query="select * from page where id=$id";
				$result=mysqli_query($connect,$query);
				$r=mysqli_fetch_assoc($result);
			}
		}
		function show()
		{
			global $connect,$r;
				if(!empty($_GET['s']))
				{
					$search=$_GET['s'];
					$query="select * from page where name like '%$search%'";
				}
				else
				{
					$query="select * from page";
				}
				$result= mysqli_query($connect,$query);
				while($row = mysqli_fetch_assoc($result))
				{
					$data[]=$row;
				}
				return($data);
		}
		function delete1()
		{
			global $connect;
			if(!empty($_GET['did']))
			{
				$id=$_GET['did'];
				$query="delete from page where id=$id";
				if(mysqli_query($connect,$query))
				{
					?>
						<script>
							alert("record Deleted");
						</script>
					<?php
				}
				else
				{
					?>
						<script>
							alert("record  not Deleted");
						</script>
					<?php
				}
			}
		}
	}
?>