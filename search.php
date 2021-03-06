<!DOCTYPE html>
<html>
<head>
<title>Stack Exchange</title>
<link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="header">
		<center><h1><a href="index.php">Simple StackExchange</a></h1></center>
	</div>
	<div class="content">
		<?php
			include "function/database.php";
			$conn = connect_database();
			
			$sql = "SELECT * FROM `question` WHERE topic LIKE '%".$_POST["search"]."%' OR content LIKE '%".$_POST["search"]."%'";
			$result = mysqli_query($conn,$sql);

			echo "<h2>".mysqli_num_rows($result);
			if(mysqli_num_rows($result) > 1) echo " Result(s)</h2>";
			else echo " Result</h2>";

			show_question($conn, $result);
			mysqli_close($conn);
		?>
	</div>

</body>
</html>