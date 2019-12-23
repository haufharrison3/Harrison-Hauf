<?php
$con = mysqli_connect("db.sice.indiana.edu","i308f19_team64","my+sql=i308f19_team64","i308f19_team64");
// Check connection
if (mysqli_connect_errno())
{echo "Failed to connect to MySQL: " . mysqli_connect_error() . "<br>"; }
else 
{ echo "Established Database Connection <br>";}

//escape variables for security sql injection
$year = mysqli_real_escape_string($con, $_POST['form-year']);
$title = mysqli_real_escape_string($con, $_POST['form-title']);
$publisher = mysqli_real_escape_string($con, $_POST['form-publisher']);
$media = mysqli_real_escape_string($con, $_POST['form-media']);
$feature2 = mysqli_real_escape_string($con, $_POST['form-query1']);

//Insert query to insert form data into the album table
$sql = "SELECT roomid FROM roomfeature WHERE feature2 = $feature2";
//check for error on insert
if (!mysqli_query($con,$sql))
{ die('Error: ' . mysqli_error($con)) . "<br>"; }

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
	
    while($row = mysqli_fetch_assoc($result)) {
		
		
        //echo "id: " . $row["id"]. " - title: " . $row["title"]. " - year_formed: " . $row["year_formed"]. "<br>";
		echo '<tr><td>'. $row["roomid"]. '</td></tr>';
    }
} else {
    echo "0 results";
}
mysqli_close($con);
?>