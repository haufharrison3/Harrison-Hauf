<table border="1">
	<tr>
		<th>Student</th>
		<th>Letter Grade</th>
		<th>Total Credit Hours</th>
		<th>Title</th>
		<th>AVG GPA</th>
	</tr>
<?php
$servername = "db.sice.indiana.edu";
$username = "i308f19_team64";
$password = "my+sql=i308f19_team64";
$dbname = "i308f19_team64";
$student = $_POST['student'];
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT '$student' as Student, g.lettergrade as LetterGrade, SUM(c.creditHrs) as TotalCreditHrs, c.title as Title, AVG(g.gpa) as AvgGPA
FROM student as s, grades as g, section as se, course as c, semester as sm
WHERE c.courseid = se.courseid AND se.sectionid = g.sectionid AND g.studentid = s.studentid AND se.semesterid = sm.semesterid AND g.lettergrade != 'F' AND CONCAT(s.fname, ' ', s.lname)='$student'
GROUP BY c.title
ORDER BY se.sectionid";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
	
    while($row = mysqli_fetch_assoc($result)) {
		
		
        //echo "id: " . $row["id"]. " - title: " . $row["title"]. " - year_formed: " . $row["year_formed"]. "<br>";
		echo '<tr><td>'. $row["Student"]. '</td><td>'. $row["LetterGrade"]. '</td><td>'. $row["TotalCreditHrs"]. '</td><td>'. $row["Title"]. '</td><td>'. $row["AvgGPA"]. '</td></tr>';
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?></table>