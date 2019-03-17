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
	
	$sql = "SELECT title, newsDate, page, event, recordNUM FROM `newspaper` Where newsDate = '1871-11-17'";
	
	$results = $conn->query($sql);
	echo '<table>';
	//this echos a table containing the results
	while ($row = $results->fetch_assoc()) {
		$i = 0;
		echo '<tr>';
		foreach($row as $field) {
			if($i === 0){
				echo '<td><a href="#">'. htmlspecialchars($field) .'</a></td>';
				$i++;
			}
			elseif($i === 3){
				echo '<td><i class="far fa-newspaper"></i></td>';
				$i++;
			}
			elseif($i === 4){
				echo '<td style="display: none;">' . htmlspecialchars($field) .'</a></td>';
			}
			else{
				echo '<td>' . htmlspecialchars($field) . '</td>';
				$i++;
			}
		}
		echo '</tr><br>';
	}
	echo "</table>";

?>