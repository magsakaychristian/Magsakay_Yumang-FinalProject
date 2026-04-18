<?php
$xml = simplexml_load_file("data.xml");

if ($xml === false) {
    die("Error: Cannot load XML file.");
}

$datas = $xml->data;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Final Project</title>

<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
    display: flex;
    background: url('pic/mainbg.jpg') no-repeat center center fixed;
    background-size: cover;
}

.sidebar {
    width: 220px;
    height: 100vh;
    background: rgba(0, 0, 0, 0.7);
    color: whitesmoke;
    padding-top: 20px;
    position: fixed;
    box-shadow: 2px 0 8px rgba(0,0,0,0.3);
}

.sidebar h2 {
    margin-bottom: 30px;
    text-align: start;
    font-weight: bold;
    letter-spacing: 2px;
}

.sidebar a {
    display: block;
    color: white;
    text-decoration: none;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 5px;
    transition: background 0.3s ease;
    letter-spacing: 2px;
}

.sidebar a:hover {
    background: #1c8a58;
}

.main {
    margin-left: 240px;
    padding: 80px 40px;
    width: 100%;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    color: white;
}

.main h2 {
    margin-bottom: 20px;
    font-weight: bold;
    font-size: 32px;
    letter-spacing: 5px;
    color: #ffffff;
}

.table-list {
    margin-top: 10px;
    padding: 30px;
    border-radius: 10px;
    width: 85%;
}

table {
    width: 100%;
    border-collapse: collapse;
    background: rgba(0, 0, 0, 0.6);
    box-shadow: 0 4px 12px rgba(1, 1, 1, 0.4);
    border-radius: 10px;
}

th, td {
    padding: 10px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

table tr:hover {
    background: rgba(3, 255, 175, 0.3);
    transition: background 0.3s ease;
}
</style>
</head>
<body>

<div class="sidebar">
    <h2>ENROLLMENT SYSTEM</h2>
    <a href="main.php">Home</a>
    <a href="ADD.php">Enroll Student</a>
    <a href="Search.php">Search Record</a>
    <a href="devs.php">About Developers</a>
</div>

<div class="main">
    <h2>LIST OF STUDENTS</h2>

    <div class="table-list">
        <table>
            <tr><th>ID</th><th>Name</th><th>Course</th></tr>
            <?php
            foreach ($datas as $data) {
                echo "<tr>";
                echo "<td>" . $data['id'] . "</td>";
                echo "<td>" . $data->name . "</td>";
                echo "<td>" . $data->course . "</td>";
                echo "</tr>";
            }   
            ?>
        </table>
    </div>
</div>

</body>
</html>
