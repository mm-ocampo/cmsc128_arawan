<html>
	<head>
		<title>Add</title>
			<script type="text/javascript">
				window.onload=function(){
					addform.accession_number.onblur=validate_accession_number;
					addform.publisher.onblur = validate_publisher;
					addform.copyright_year.onblur=validate_copyright_year;
					addform.book_title.onblur = validate_title;
					addform.book_status.onblur = validate_status;
					addform.book_type.onblur=validate_type;
				}

				function validate_accession_number(){
					var str=addform.accession_number.value;
					var msg = "";

					if (str == "") msg+="Accession Number is required";
					else if (!str.match(/^[a-zA-Z0-9\-]{15}$/)) msg="Must be 15 characters.";

					document.getElementsByName("val_accession_number")[0].innerHTML= msg;
					if (msg=="") return true;
				}

				function validate_publisher(){
					var str=addform.publisher.value;
					var msg = "";

					if (str == "") msg+="Publisher is required";
					else if (str.length > 30) msg="Too long.";
					else if (str.match(/^[\+\%\^\@\!\?]+$/)) msg="Invalid.";
					
					document.getElementsByName("val_publisher")[0].innerHTML= msg;
					if (msg=="") return true;
				}

				function validate_copyright_year(){
					var str = addform.copyright_year.value;
					var msg = "";

					if(str == "") msg += "Copyright Year is required. ";
					else if(str<1900 || str>2014) msg = "Invalid Year";
					
					document.getElementsByName("val_copyright_year")[0].innerHTML=msg;

					if(msg == "") return true;
				}

				function validate_title(){
					var str=addform.book_title.value;
					var msg = "";

					if (str == "") msg+="Title is required";
					else if (str.length > 50) msg="Too long.";
					else if (str.match(/^[\+\%\^\@\!\?]+$/)) msg="Invalid.";
					
					document.getElementsByName("val_title")[0].innerHTML= msg;
					if (msg=="") return true;
				}

				function validate_status(){
					var str=addform.book_status.value;
					var msg = "";

					if (str == "") msg+="Status is required";
					else if ((str.length > 15) || (str != "available")) msg="Invalid.";
					
					document.getElementsByName("val_status")[0].innerHTML= msg;
					if (msg=="") return true;
				}

				function validate_type(){
					var str=addform.book_type.value;
					var msg = "";

					if (str == "") msg+="Type is required";
					else if ((str.length > 30) || (!str.match(/^[a-z]+$/))) msg="Invalid.";
					
					document.getElementsByName("val_type")[0].innerHTML= msg;
					if (msg=="") return true;
				}
			</script>
	</head>
	<body>
		<form name="addform" method = "post">
			Accession Number: <input type="text" id ="accession_number" name="accession_number" required><br/>
			<span name="val_accession_number"></span><br/>
			Publisher: <input type="text" id ="publisher" name="publisher" required><br/>
			<span name="val_publisher"></span><br/>
			Copyright Year: <input type="number" id ="copyright_year" name="copyright_year" required><br/>
			<span name="val_copyright_year"></span><br/>
			Title: <input type="text" id ="book_title" name="book_title" required><br/>
			<span name="val_title"></span><br/>
			Status: <input type="text" id ="book_status" name="book_status" required><br/>
			<span name="val_status"></span><br/>
			Type: <input type="text" id ="book_type" name="book_type" required><br/>
			<span name="val_type"></span><br/>
		
			<input type="submit" name="add" id="add" />
		</form>
		<?php
				$con=mysqli_connect("","root","","elib_db");

				if (mysqli_connect_errno())
				{
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}

				if (isset($_POST["add"]) ) {
					$accession_number = filter_var($_POST["accession_number"], FILTER_SANITIZE_STRING);
					$publisher = filter_var($_POST["publisher"], FILTER_SANITIZE_STRING);
					$copyright_year = filter_var($_POST["copyright_year"], FILTER_SANITIZE_STRING);
					$title = filter_var($_POST["book_title"], FILTER_SANITIZE_STRING);
					$status = filter_var($_POST["book_status"], FILTER_SANITIZE_STRING);
					$type = filter_var($_POST["book_type"], FILTER_SANITIZE_STRING);

					mysqli_query($con,"INSERT INTO material VALUES ('$accession_number', '$publisher', '$copyright_year', '$title', '$status', '$type')");
					$result = mysqli_query($con,"SELECT * FROM material");

					while($row = mysqli_fetch_array($result))
					{
						echo "<br/><b>Accession Number: </b>".$row['accession_number'];
						echo "<br/><b>Publisher: </b>".$row['publisher'];
						echo "<br/><b>Copyright Year: </b>".$row['copyright_year'];
						echo "<br/><b>Title: </b>".$row['title'];
						echo "<br/><b>Status: </b>".$row['status'];
						echo "<br/><b>Type: </b>".$row['type'];
						echo "<br>";
					}
				}
				mysqli_close($con);
		?>
	</body>
</html>
