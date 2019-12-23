<table border="1">
	<tr>
		<th>Faculty Name</th>
		<th>Current Course</th>
		<th>Phone Number</th>
		<th>Rank</th>
		
	</tr>
<?php
$servername = "db.sice.indiana.edu";
$username = "i308f19_team64";
$password = "my+sql=i308f19_team64";
$dbname = "i308f19_team64";
$course = $_POST['course'];
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT DISTINCT CONCAT (f.fname, ' ', f.lname) as FacultyName, c.title as Course, f.phone as Phone, f.rank as Rank  
FROM faculty as f, course as c, section as se
WHERE c.courseid = se.courseid AND se.facultyid = f.facultyid AND se.sectionid NOT IN(
SELECT se.sectionid
FROM faculty as f, course as c, section as se
WHERE  c.courseid = se.courseid AND se.facultyid = f.facultyid AND c.title ='$course' )";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
	
    while($row = mysqli_fetch_assoc($result)) {
		
		
        //echo "id: " . $row["id"]. " - title: " . $row["title"]. " - year_formed: " . $row["year_formed"]. "<br>";
		echo '<tr><td>'. $row["FacultyName"]. '</td><td>'. $row["Course"]. '</td><td>'. $row["Phone"]. '</td><td>'. $row["Rank"]. '</td></tr>';
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?></table>