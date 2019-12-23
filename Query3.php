<table border="1">
	<tr>
		<th>Student</th>
		<th>Sum</th>
		<th>AVG</th>
		<th>CreditsRequired</th>
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

$sql = "SELECT CONCAT(s.fname, ' ', s.lname) as Student, SUM(c.creditHrs) as Sum,AVG(g.gpa) as AVG, m.creditsrequired as CreditsRequired
FROM student as s, grades as g, course as c, section as se, major as m
WHERE s.studentid = g.studentid AND g.sectionid = se.sectionid AND se.courseid = c.courseid AND g.lettergrade != 'F' 
GROUP BY Student
HAVING SUM(c.creditHrs) >= m.creditsrequired
ORDER BY m.majorname, Student";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
	
    while($row = mysqli_fetch_assoc($result)) {
		
		
        //echo "id: " . $row["id"]. " - title: " . $row["title"]. " - year_formed: " . $row["year_formed"]. "<br>";
		echo '<tr><td>'. $row["Student"]. '</td><td>'. $row["Sum"]. '</td><td>'. $row["AVG"]. '</td><td>'. $row["CreditsRequired"]. '</td></tr>';
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?></table>