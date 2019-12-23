<table border="1">
	<tr>
		<th>Student Name</th>
		<th>Email</th>
		<th>School</th>
		
	</tr>
<?php
$servername = "db.sice.indiana.edu";
$username = "i308f19_team64";
$password = "my+sql=i308f19_team64";
$dbname = "i308f19_team64";
$department = $_POST['department'];
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT DISTINCT CONCAT(s.fname, ' ', s.lname) as Name, se.email as Email, d.school as School
FROM student as s, pursue as p, studentemail as se, department as d
WHERE s.studentid = se.studentid AND s.studentid = p.studentid AND p.departmentid = d.departmentid AND d.school = '$department'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
	
    while($row = mysqli_fetch_assoc($result)) {
		
		
        //echo "id: " . $row["id"]. " - title: " . $row["title"]. " - year_formed: " . $row["year_formed"]. "<br>";
		echo '<tr><td>'. $row["Name"]. '</td><td>'. $row["Email"]. '</td><td>'. $row["School"]. '</td></tr>';
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?></table>