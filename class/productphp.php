<?php
	$connect=mysqli_connect("localhost","root","","adminpamel") or die ("Connection Failed");
	class admin3
	{
		function edit()
		{
			global $connect;
			$catid=$_POST['catname'];
			$pname=$_POST['pname'];
			$pdescription=$_POST['pdescription'];
			$pprice=$_POST['pprice'];
			$imagename=$_FILES['pimage']['name'];
			$ptemp=$_FILES['pimage']['tmp_name'];
			$currenttime=round(microtime(true)* 1000);
			$extarr=explode(".",$imagename);
			$ext=$extarr['1'];
			$fullfilename=$currenttime.".".$ext;
			if (!empty($_POST['editid']))
			{
				$id=$_POST['editid'];
				$query="update product set pname='$pname',pdescription='$pdescription',pprice='$pprice',pimage='$fullfilename' where id='$id'";
			}
			else
			{
				$query="insert into product (category_id,pname,pdescription,pprice,pimage) value('$catid','$pname','$pdescription','$pprice','$fullfilename')";
			}
			if(mysqli_query($connect,$query))
			{
					move_uploaded_file($ptemp,"uploadimage/".$fullfilename);
				?>
				<script>
					alert("Product inserted");
				</script>
				<?php
			}
			else
			{
				?>
				<script>
					alert("Product Not inserted");
				</script>
				<?php
			}
		}
		function edit1($id)
		{
			global $connect;
			$query="select * from product where id=$id";
			$result=mysqli_query($connect,$query);
			return mysqli_fetch_assoc($result);
		}
		function show()
		{
			global $connect;
				if(!empty($_GET['s']))
				{
					$search=$_GET['s'];
					$query="select * from product where pname like '%$search%'";
				}
				else
				{
					$query="select * from product";
				}
				$result= mysqli_query($connect,$query);
				while($row = mysqli_fetch_assoc($result))
				{
					$data[]=$row;
				}
				return($data);
		}
		function showcat()
		{
			global $connect;
			$query="select * from category";
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
				$query="delete from product where id=$id";
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