<?php
$xml = simplexml_load_file("data.xml");

$id = $_GET['id'] ?? "";
$name = "";
$course = "";

if ($id !== "") {
    $result = $xml->xpath("//data[@id='$id']");
    if ($result) {
        $name = (string)$result[0]->name;
        $course = (string)$result[0]->course;
    }
}

if (isset($_POST['update_submit'])) {
    $targetId = $_POST['student_id'];
    $result = $xml->xpath("//data[@id='$targetId']");
    
    if ($result) {
        $result[0]->name = trim($_POST['new_name']);
        $result[0]->course = trim($_POST['new_course']);
        
        if ($xml->asXML("data.xml")) {
            echo "<script>alert('Record Updated Successfully!'); window.location.href='main.php';</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Student</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            background: url('pic/mainbg.jpg') no-repeat center center fixed;
            background-size: cover;
            color: white;
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
            margin-left: 260px;
            padding: 50px;
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .edit-card {
            background: rgba(0, 0, 0, 0.6);
            padding: 40px;
            border-radius: 15px;
            width: 450px;
            border-left: 5px solid #1c8a58;
        }

        .edit-card h2 {
            color: #ffffff;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #ffffff  ;
        }

        input {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            margin-bottom: 25px;
            border-radius: 5px;
            border: 1px solid #1c8a58;
            background: #fff;
            color: #222;
            box-sizing: border-box;
        }

        .btn-save {
            background: #1c8a58;
            color: white;
            padding: 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-weight: bold;
        }

        .btn-save:hover {
            background: #28b873;
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
    <div class="edit-card">
        <h2>EDIT STUDENT</h2>
        <form method="POST">
            <input type="hidden" name="student_id" value="<?php echo htmlspecialchars($id); ?>">

            <label>Student Name</label>
            <input type="text" name="new_name" value="<?php echo htmlspecialchars($name); ?>" required>

            <label>Course</label>
            <input type="text" name="new_course" value="<?php echo htmlspecialchars($course); ?>" required>

            <button type="submit" name="update_submit" class="btn-save">SAVE CHANGES</button>
        </form>
    </div>
</div>

</body>
</html>