<table border="1">
	<tr>
		<th>Room ID</th>
		<th>Room Number</th>
		<th>Building Name</th>
	</tr>
<?php
$servername = "db.sice.indiana.edu";
$username = "i308f19_team64";
$password = "my+sql=i308f19_team64";
$dbname = "i308f19_team64";
$feature2 = $_POST['feature2'];
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT rf.roomid, rf.feature2, r.roomnum, b.name AS BuildingName FROM roomfeature AS rf, room AS r, building AS b WHERE rf.roomid = r.roomid AND r.buildingid = b.buildingid AND feature2 = '$feature2'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
	
    while($row = mysqli_fetch_assoc($result)) {
		
		
        //echo "id: " . $row["id"]. " - title: " . $row["title"]. " - year_formed: " . $row["year_formed"]. "<br>";
	echo '<tr><td>'. $row["roomid"]. '</td><td>'. $row["roomnum"]. '</td><td>'. $row["BuildingName"]. '</td></tr>';
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?></table>