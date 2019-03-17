<?php
	$keyword = $_POST['form-search'];
	if(strpos($keyword, ' ') !== false){
		$checkSpace = 1;
	}
	if($checkSpace === 1 && !empty($keyword) && !empty($date)){
		$sql = "SELECT groom, bride, marriageDate, page, recordNUM FROM `Marriages` Where (bride LIKE '%";
		$words = explode(" ", $keyword);
		$sql2 = "%') OR (groom LIKE '%";
		$sql3 = "%') AND marriageDate = '".$date."') Order BY marriageDate DESC";
		foreach ($words as $word){
			$sql .= $word ."%' AND bride LIKE '%";
			$sql2 .= $word ."%' AND groom LIKE '%";
		}
		$sql = substr($sql, 0, -20);
		$sql2 = substr($sql2, 0, -20);
		$sql .= $sql2;
		$sql .= $sql3;
	}
	elseif($checkSpace === 1 && !empty($keyword) && empty($date)){
		$sql = "SELECT groom, bride, marriageDate, page, recordNUM FROM `Marriages` Where (bride LIKE '%". $keyword . "%' OR groom LIKE '%". $keyword . "%') Order BY marriageDate DESC";
	}
	elseif (!empty($keyword) && !empty($date)) {
		//header("Location: newspaperSearch.html?bothFilled");
		$sql = "SELECT groom, bride, marriageDate, page, recordNUM FROM `Marriages` Where (bride LIKE '%". $keyword . "%' OR groom LIKE '%". $keyword . "%') AND marriageDate = '".$date."') Order BY marriageDate DESC";
	}
	elseif (empty($keyword)) {
		if (empty($date)) {
			header("Location: newspaperSearch.html?bothEmpty");
		}
		else{
			$sql = "SELECT groom, bride, marriageDate, page, recordNUM FROM `Marriages` Where (bride LIKE '%". $keyword . "%' OR groom LIKE '%". $keyword ." %') Order BY marriageDate DESC";
		}
	}
	elseif (!empty($keyword)) {
		$sql = "SELECT groom, bride, marriageDate, page, recordNUM FROM `Marriages` Where (bride LIKE '%". $keyword . "%' OR groom LIKE '%". $keyword . "%') Order BY marriageDate DESC";
	}
	//Opens connection from connection file
	$conn = OpenCon();
	$results = $conn->query($sql);
?>