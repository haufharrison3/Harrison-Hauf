<table border="1">
	<tr>
		<th>Student ID</th>
		<th>Name</th>
		<th>Parent Phone Number</th>
	</tr>
<?php
$servername = "db.sice.indiana.edu";
$username = "i308f19_team64";
$password = "my+sql=i308f19_team64";
$dbname = "i308f19_team64";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT DISTINCT g.studentid as StudentID, CONCAT(s.fname, ' ', s.lname) as Student, s.pphone as ParentNum
FROM student as s, section as se, semester as sm, grades as g
WHERE s.studentid = g.studentid AND g.sectionid = se.sectionid AND se.semesterid = sm.semesterid AND g.studentid NOT IN(
SELECT g1.studentid
FROM student as s1, section as se1, semester as sm1, grades as g1
WHERE s1.studentid = g1.studentid AND g1.sectionid = se1.sectionid AND se1.semesterid = sm1.semesterid AND (se1.semesterid = 3 OR se1.semesterid = 4))
ORDER BY Student";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
	
    while($row = mysqli_fetch_assoc($result)) {
		
		
        //echo "id: " . $row["id"]. " - title: " . $row["title"]. " - year_formed: " . $row["year_formed"]. "<br>";
		echo '<tr><td>'. $row["StudentID"]. '</td><td>'. $row["Student"]. '</td><td>'. $row["ParentNum"]. '</td></tr>';
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?></table>