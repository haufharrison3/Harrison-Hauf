<table border="1">
	<tr>
		<th>Section</th>
		<th>Student</th>
		<th>AVG</th>
		
	</tr>
<?php
$servername = "db.sice.indiana.edu";
$username = "i308f19_team64";
$password = "my+sql=i308f19_team64";
$dbname = "i308f19_team64";
$section = $_POST['section'];
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT se.sectionid AS Section, IFNULL(CONCAT(s.fname, ' ', s.lname), 'Total average GPA') as Student, AVG(g.gpa) as GPA
FROM section as se, student as s, grades as g
WHERE se.sectionid=g.sectionid AND s.studentid=g.studentid AND se.sectionid='$section'
GROUP BY s.lname  WITH ROLLUP";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
	
    while($row = mysqli_fetch_assoc($result)) {
		
		
        //echo "id: " . $row["id"]. " - title: " . $row["title"]. " - year_formed: " . $row["year_formed"]. "<br>";
		echo '<tr><td>'. $row["Section"]. '</td><td>'. $row["Student"]. '</td><td>'. $row["GPA"]. '</td></tr>';
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?></table>