<?php
	//this assigns the values from the previous page to variables that can be used within the page.
	$search = $_POST['search'];
	$tableType = $_POST['tableType'];
	$dataType = $_POST['dataType'];
	$submit = $_POST['submit'];
	//includes the connection file
	include 'connect.inc.php';
	//Opens connection from connection file
	$conn = OpenCon();
	

	//These if then and else if statements are to receive the information that the user inputs and tailor a query to their criteria
	if($tableType == "obituary"){
		if($dataType == "fName" or $dataType == "lName"){
			$sql = 'SELECT * FROM `Obituaries` WHERE name LIKE "%'.$search.'%"';
		}
		elseif($dataType == "date"){
			$sql = 'SELECT name, title, date, newspaperTitle, page FROM `Obituaries` WHERE date = \''.$search.'\'';
		}
		else{
			echo "Yeah Right. You think you search that? Stupid person. Yeah, Owen I am talking to you.";
			$exitValue = 1;
		}
		$tableHeader = "<table><tr><th>Original Record Number</th><th>Name</th><th>Title</th><th>Newspaper Title</th><th>Date</th><th>Page</th><th>Transcription</th><th>Summary</th><th>Event</th><th>Record Number</th></tr>";
	}
	elseif($tableType == "marriage"){
		if($dataType == "fName" or $dataType == "lname"){
			$sql = 'SELECT * FROM `Marriages` WHERE groom LIKE "%'.$search.'%" OR bride LIKE "%'.$search.'%"';
		}
		elseif($dataType == "date"){
			$sql = 'SELECT * FROM `Marriages` WHERE marriageDate = \''.$search.'\'';
		}
		else{
			echo "Yeah Right. You think you search that? Stupid person. Yeah, Owen I am talking to you.";
			$exitValue = 1;
		}
		$tableHeader = "<table><tr><th>Original Record Number</th><th>Groom</th><th>Bride</th><th>Marriage Date</th><th>Newspaper Title</th><th>Page</th><th>Transcription</th><th>Summary</th><th>Event</th><th>Record Number</th></tr>";
	}
	elseif($tableType == "article"){
		if($dataType == "title"){
			$sql = 'SELECT * FROM `newspaper` WHERE title LIKE "%'.$search.'%"';
		}
		elseif($dataType == "date"){
			$sql = 'SELECT * FROM `newspaper` WHERE newsDate = \''.$search.'\'';
		}
		else{
			echo "Yeah Right. You think you search that? Stupid person. Yeah, Owen I am talking to you.";
			$exitValue = 1;
		}
		$tableHeader = "<table><tr><th>Original Record Number</th><th>Name</th><th>Title</th><th>Newspaper Title</th><th>Date</th><th>Page</th><th>Transcription</th><th>Summary</th><th>Event</th><th>Record Number</th></tr>";
	}
	elseif($tableType == "catholic"){
		if($dataType == "fName" or $dataType == "lName"){
			$sql = 'SELECT * FROM `catholic` WHERE lastName LIKE "%Brown%" OR firstName LIKE "%Brown%"';
		}
		elseif($dataType == "date"){
			$sql = 'SELECT * FROM `catholic` WHERE deathDate = \''.$search.'\' or burialDate = \''.$search.'\'';
		}
		else{
			echo "Yeah Right. You think you search that? Stupid person. Yeah, Owen I am talking to you.";
			$exitValue = 1;
		}
		$tableHeader = "<table><tr><th>Death Date</th><th>Burial Date</th><th>Last Name</th><th>First Name</th><th>Middle Initial</th><th>Age</th><th>Birthday</th><th>Service Location</th><th>Pastor</th><th>Funeral Home</th><th>Cemetery</th><th>Section</th><th>Lot</th><th>Placement</th><th>Veteran</th><th>Record Number</th></tr>";
	}
	elseif($tableType == "scrapbook"){
		if($dataType == "title"){
			$sql = 'SELECT * FROM `scrapbook` WHERE title LIKE "%'.$search.'%"';
		}
		elseif($dataType == "date"){
			$sql = 'SELECT * FROM `scrapbook` WHERE date = \''.$search.'\'';
		}
		else{
			echo "Yeah Right. You think you search that? Stupid person. Yeah, Owen I am talking to you.";
			$exitValue = 1;
		}
		$tableHeader = "<table><tr><th>Original Record Number</th><th>Title</th><th>Scrapbook Pages</th><th>Newspaper Title</th><th>Date</th><th>Page</th><th>Transcription</th><th>Summary</th><th>Name</th><th>Event</th><th>Record Number</th></tr>";
	}
	//this is to check for values that are not searchable on a table. If a value is searched exitValue becomes 1 and ends the process
	if($exitValue==1){
		exit();
	}
	//this gets the custom table headers per search
	echo $tableHeader;
	//this variable is an array that contains the results
	$results = $conn->query($sql);
	//this echos a table containing the results
	while ($row = $results->fetch_assoc()) {
		echo '<tr>';
		foreach($row as $field) {
			echo '<td style="border-style: solid;">' . htmlspecialchars($field) . '</td>';
		}
		echo '</tr>';
	}
	echo "</table>";

?>