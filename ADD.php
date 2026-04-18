<?php
if (isset($_POST['submit'])) {
    $xml = simplexml_load_file('data.xml');
    
    $newName = trim($_POST['name']);
    $newCourse = trim($_POST['course']);
    $nameExists = false;

    foreach ($xml->data as $node) {

        if (strcasecmp((string)$node->name, $newName) == 0) {
            $nameExists = true;
            break;
        }
    }

    if ($nameExists) {
  
        echo "<script>alert('Error: This student name is already enrolled!'); window.history.back();</script>";
    } else {
      
        $maxId = 0;
        foreach ($xml->data as $node) {
            $maxId = max($maxId, (int)$node['id']);
        }

        $newData = $xml->addChild('data');
        $newData->addAttribute('id', $maxId + 1);
        $newData->addChild('name', htmlspecialchars($newName));
        $newData->addChild('course', htmlspecialchars($newCourse));

        if ($xml->asXML('data.xml')) {
            echo "<script>alert('Student Enrolled Successfully!'); window.location.href='main.php';</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Enroll Student</title>
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

    .sidebar a {
        display: block;
                color: white;
                text-decoration: none;
                padding: 10px;
                margin-bottom: 10px;
                border-radius: 5px;
                transition: background 1.5s ease;
                letter-spacing: 2px;
    }

    .sidebar h2 {
                margin-bottom: 30px;
                text-align: start;
                font-weight: bold;
                letter-spacing: 2px;
    }



    .sidebar a:hover {
        background: #1c8a58;
    }

.main {
    margin-left: 240px;
    padding: 150px;
    width: 100%;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    color: white;
}

.main h2 {

    font-size: 28px;
    letter-spacing: 5px;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.6);
    margin-top: -50px;
}

.form-container {
    background: rgba(0,0,0,0.6);
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.4);
    margin-top: -15px;
}

table { 
    border-collapse: collapse; 
    border: none; 
}

td {
    padding: 15px;
    font-size: 16px;
    color: white;
    font-weight: bold;
}

input {
    padding: 10px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid #ccc;
    width: 250px;
}

.btn-enroll {
    background: #1c8a58;
    color: white;
    padding: 12px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
    font-weight: bold;
    margin-top: 20px;
    text-transform: uppercase;
    transition: background 0.3s ease, transform 0.2s ease;
}

.btn-enroll:hover {
    background: #28b873;
    transform: scale(1.05);
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
    <h2>ENROLL NEW STUDENT</h2>

    <div class="form-container">
        <form method="POST">
            <table>
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="name" required placeholder="Enter Name"></td>
                </tr>
                <tr>
                    <td>Course:</td>
                    <td><input type="text" name="course" required placeholder="Enter Course"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" name="submit" class="btn-enroll">Enroll Student</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

</body>
</html>