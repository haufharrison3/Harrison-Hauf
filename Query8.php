<table border="1">
	<tr>
		<th>Advisor</th>
		<th>Department</th>
	</tr>
<?php
$servername = "db.sice.indiana.edu";
$username = "i308f19_team64";
$password = "my+sql=i308f19_team64";
$dbname = "i308f19_team64";
$advisor = $_POST['advisor'];
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT DISTINCT CONCAT(a.fname, ' ', a.lname) AS Advisor, d.school AS School
FROM advisor as a, department as d, pursue as p
WHERE a.advisorid = p.advisorid AND p.departmentid = d.departmentid AND CONCAT(a.fname, ' ', a.lname) = '$advisor'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
	
    while($row = mysqli_fetch_assoc($result)) {
		
		
        //echo "id: " . $row["id"]. " - title: " . $row["title"]. " - year_formed: " . $row["year_formed"]. "<br>";
		echo '<tr><td>'. $row["Advisor"]. '</td><td>'. $row["School"]. '</td></tr>';
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?></table>