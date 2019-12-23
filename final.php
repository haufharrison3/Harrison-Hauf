<!doctype html>
<html>
<body>
<h1> Group 64 Final Project </h1>
<h3> Harrison Hauf, Annie Lalor, Ethan Tromiczak, Omar Hani </h3>
<br>
<br>
<h2> Query 1b </h2>
<h3> Produce a class roster for a *specified section* sorted by student’s last name, first name. At the end, include the average grade (GPA for the class.) (10 points)</h3>
<form action="Query4.php" method="post">
Select a Section: <select name="section"> <br>
<?php
$conn = mysqli_connect("db.soic.indiana.edu","i308f19_team64","my+sql=i308f19_team64","i308f19_team64");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error() . "<br>");
}
    $result = mysqli_query($conn,"SELECT distinct sectionid FROM section ORDER BY sectionid");
    while ($row = mysqli_fetch_assoc($result)) {
                  unset($id, $name);
                  $id = $row['sectionid'];
                  $name = $row['sectionid']; 
                  echo '<option value="'.$id.'">'.$name.'</option>';
}
?> 
    </select>
</br>
<br>
<input type="submit" value="Select Query 1b">
</form>
<br>

<h2> Query 2a </h2>
<h3> Produce a list of rooms that are equipped with *some feature*—e.g., “wired instructor station”. (5 points) </h3>
<form action="Query2.php" method="post">
Select a Room Feature: <select name="feature2"> <br>
<?php
$conn = mysqli_connect("db.soic.indiana.edu","i308f19_team64","my+sql=i308f19_team64","i308f19_team64");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error() . "<br>");
}
    $result = mysqli_query($conn,"SELECT distinct feature2 FROM roomfeature");
    while ($row = mysqli_fetch_assoc($result)) {
                  unset($id, $name);
                  $id = $row['feature2'];
                  $name = $row['feature2']; 
                  echo '<option value="'.$id.'">'.$name.'</option>';
}
?> 
    </select>
</br>
<p>(choose white boards)<p>
<br>

<input type="submit" value="Select Query 2a">
</form>
<br>

<h2> Query 3b </h2>
<h3> Produce a list of faculty who have never taught a *specified course*. (10 points) </h3>
<br>
<form action="Query7.php" method="post">
Select a Course: <select name="course"> <br>
<?php
$conn = mysqli_connect("db.soic.indiana.edu","i308f19_team64","my+sql=i308f19_team64","i308f19_team64");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error() . "<br>");
}
    $result = mysqli_query($conn,"SELECT title FROM course ORDER BY title");
    while ($row = mysqli_fetch_assoc($result)) {
                  unset($id, $name);
                  $id = $row['title'];
                  $name = $row['title']; 
                  echo '<option value="'.$id.'">'.$name.'</option>';
}
?> 
    </select>
</br>
<br>
<input type="submit" value="Select Query 3b">
</form>
<br>

<h2> Query 5c </h2>
<h3> Produce a chronological list of all courses taken by a *specified student*. Show grades earned. Include overall hours earned and GPA at the end. (Hint: An F does not earn hours.) (15 points)</h3>
<br>
<form action="Query6.php" method="post">
Select a Student: <select name="student"> <br>
<?php
$conn = mysqli_connect("db.soic.indiana.edu","i308f19_team64","my+sql=i308f19_team64","i308f19_team64");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error() . "<br>");
}
    $result = mysqli_query($conn,"SELECT CONCAT(s.fname, ' ',s.lname) as FullName FROM student as s ORDER BY FullName");
    while ($row = mysqli_fetch_assoc($result)) {
                  unset($id, $name);
                  $id = $row['FullName'];
                  $name = $row['FullName']; 
                  echo '<option value="'.$id.'">'.$name.'</option>';
}
?> 
    </select>
</br>
<br>
<input type="submit" value="Select Query 5c">
</form>
<br>

<h2> Query 8b </h2>
<h3> Produce an alphabetical list of students who have not attended during the two most recent semesters along with their parents’ phone number. (10 points) </h3>
<br>
<form action="Query5.php" method="post">

<input type="submit" value="Select Query 8b">
</form>

<br>

<h2> Query 9c </h2>
<h3> Produce a list of students with hours earned and overall GPA who have met the graduation requirements for any major. Sort by major and then by student. (15 points) </h3>
<br>
<form action="Query3.php" method="post">
 

<input type="submit" value="Select Query 9c">
</form>
<br>


<h2> Additional Queries </h2>
<br>
<form action="Query8.php" method="post">
<p><strong> Select an Advisor and display the Department they work in</strong></p>
Select an Advisor: <select name="advisor"> <br>
<?php
$conn = mysqli_connect("db.soic.indiana.edu","i308f19_team64","my+sql=i308f19_team64","i308f19_team64");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error() . "<br>");
}
    $result = mysqli_query($conn,"SELECT CONCAT(a.fname, ' ',a.lname) as FullName FROM advisor AS a ORDER BY FullName");
    while ($row = mysqli_fetch_assoc($result)) {
                  unset($id, $name);
                  $id = $row['FullName'];
                  $name = $row['FullName']; 
                  echo '<option value="'.$id.'">'.$name.'</option>';
}
?> 
    </select>
</br>
<br>

<input type="submit" value="Select Advisor and Department">
</form>
<br>

<br>
<form action="Query9.php" method="post">
<p><strong>Select a Department and display the Student in that Department</strong></p>
Select a Department: <select name="department"> <br>
<?php
$conn = mysqli_connect("db.soic.indiana.edu","i308f19_team64","my+sql=i308f19_team64","i308f19_team64");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error() . "<br>");
}
    $result = mysqli_query($conn,"SELECT school FROM department ORDER BY school");
    while ($row = mysqli_fetch_assoc($result)) {
                  unset($id, $name);
                  $id = $row['school'];
                  $name = $row['school']; 
                  echo '<option value="'.$id.'">'.$name.'</option>';
}
?> 
    </select>
</br>
<br>

<input type="submit" value="Select Department and Student">
</form>
<br>


</body>
</html>
