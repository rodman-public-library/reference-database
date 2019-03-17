<?php
	session_start();
	include 'includes/connect.inc.php';
	$conn = OpenCon();
	if(isset($_SESSION['cart'])){
		//Loop through it like any other array.
		$a=0;
		foreach($_SESSION['cart'] as $sql){
			//Print out the product ID.
			$a++;
			$results{$a} = $conn->query($sql);
		}
		foreach($_SESSION['typeCart'] as $typeCart){
			//Print out the product ID.
			$c++;
			$type{$c} = $typeCart;
		}
	}
	for($b = 1; $b <= $a; $b++){
		if($type{$b} === "newspaper"){
			while ($row = mysqli_fetch_array($results{$b})) {
				echo '<tr>';
				for($i = 0; $i <= 3; $i++){
					if($i === 0){
						echo '<td>'. $row['title'] .'</td>';
					}
					elseif($i === 1){
						echo '<td>' . $row['newspaperTitle'] . '</td>';
					}
					elseif($i === 2){
						echo '<td>' . $row['newsDate'] . '</td>';
					}
					elseif($i === 3){
						echo '<td>' . $row['page'] . '</td>';
					}
				}
			}
		}
		elseif($type{$b} === "obit"){
			while ($row = mysqli_fetch_array($results{$b})) {
				echo '<tr>';
				for($i = 0; $i <= 3; $i++){
					if($i === 0){
						echo '<td>'. $row['Name'] .'</td>';
					}
					elseif($i === 1){
						echo '<td>' . $row['newspaperTitle'] . '</td>';
					}
					elseif($i === 2){
						echo '<td>' . $row['Date'] . '</td>';
					}
					elseif($i === 3){
						echo '<td>' . $row['Page'] . '</td>';
					}
				}
			}
		}
		elseif($type{$b}=== "marriage"){
			while ($row = mysqli_fetch_array($results{$b})) {
				echo '<tr>';
				for($i = 0; $i <= 3; $i++){
					if($i === 0){
						echo '<td>'. $row['groom'] . '<br>' . $row['bride'] .'</td>';
					}
					elseif($i === 1){
						echo '<td>' . $row['marriageDate'] . '</td>';
					}
					elseif($i === 2){
						echo '<td>' . $row['newspaperTitle'] . '</td>';
					}
					elseif($i === 3){
						echo '<td>' . $row['page'] . '</td>';
					}
				}
			}
		}
		elseif($type{$b} === "scrapbook"){
			while ($row = mysqli_fetch_array($results{$b})) {
				echo '<tr>';
				for($i = 0; $i <= 2; $i++){
					if($i === 0){
						echo '<td>'. $row['title'] .'</td>';
					}
					elseif($i === 1){
						echo '<td>' . $row['scrapbookPages'] . '</td>';
					}
					elseif($i === 2){
						echo '<td>' . $row['event'] . '</td>';
					}
				}
			}
		}
		echo '</tr>';
	}
?>
<head>
<script type="text/javascript">

	function clickLink(){
		document.getElementById('clickme').click();
	}
</script>
</head>
<a href="?logout" style= "display: none;" id="clickme">Clear Cart</a>
<button onclick="clickLink()">Clear Cart</button>
<?php
	if(isset($_GET['logout'])) {
		session_unset();
	}
?>