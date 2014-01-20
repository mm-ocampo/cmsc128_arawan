<html>
	<head>
		<title>Dummy Delete</title>
	</head>
	<body>
		<?php

			

			$con=mysqli_connect("","root","","elib_db");

			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			$result = mysqli_query($con,"SELECT * FROM material");

			echo "<form method='post'>";
			echo "<table>";

			while($row = mysqli_fetch_array($result))
  			{
  				echo "<tr>";
  					echo "<td>".$row['accession_number']."</td>";
  					echo "<td>".$row['title']."</td>";
  					echo "<td>".$row['copyright_year']."</td>";
  					echo "<td>".$row['publisher']."</td>";
  					echo "<td>".$row['status']."</td>";
  					echo "<td>".$row['type']."</td>";
					echo "<td><input type='button' name='".$row['accession_number']."' value='Delete'/></td>";
  				echo "</tr>";

  				if(isset($_POST[$row['accession_number']]))
  				{
  					echo $row['accession_number'] . " delete";
  					delete_material($row['accession_number']);
  				}

  			}

  			echo "</table>";
  			echo "</form>";
			mysqli_close($con);

			function delete_material($material)
			{
					$con=mysqli_connect("","root","","elib_db");

					if (mysqli_connect_errno())
					{
						echo "Failed to connect to MySQL: " . mysqli_connect_error();
					}
					$result = mysqli_query($con,'DELETE FROM material WHERE accession_number="'.$material.'"');

					mysqli_close($con);

			}

		?>
	</body>
</html>