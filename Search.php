<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Records</title>
    <script>
    function searchStudent() {
        var idVal = document.getElementById("searchID").value;
        if (idVal === "") { 
            alert("Please enter a Student ID."); 
            return; 
        }
        
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("info-display").innerHTML = this.responseText;
            }
        };

        xhttp.open("GET", "getInfo.php?q=" + idVal, true);
        xhttp.send();
    }
    </script>
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
            padding: 100px; 
            width: 100%; 
            color: white; 
            display: flex; 
            flex-direction: column; 
            align-items: center; 
        }
        
        .main h1 { 
            font-size: 26px; 
            letter-spacing: 4px; 
            text-shadow: 2px 2px 4px rgba(0,0,0,0.6); 
        }

        .search-container { 
            background: rgba(0,0,0,0.6); 
            padding: 20px; 
            border-radius: 10px; 
            width: 360px;   
            text-align: center; 
        }

        .search-row { display: flex; gap: 8px; justify-content: center; margin-bottom: 15px; }

        input { 
            padding: 10px; 
            font-size: 16px;
            width: 65%; 
            border-radius: 5px; 
            border: 1px solid #ccc; 
        }
        
        .btn-search { 
            background: #1c8a58; 
            color: white; 
            padding: 10px 16px; 
            border: none; 
            cursor: pointer; 
            font-weight: bold; 
            border-radius: 5px; 
        }

        #info-display { 
            margin-top: 15px; 
            background: rgba(255,255,255,0.9); 
            padding: 15px; 
            border-radius: 8px; 
            text-align: left; 
            border-left: 4px solid #1c8a58; 
            color: #222;
            line-height: 1.6;
        }

        .result-label {
            color: #1c8a58;
            font-weight: bold;
            font-size: 15px;
            letter-spacing: 1px;
        }

        .btn-group {
            margin-top: 15px;
            display: flex;
            gap: 10px;
        }

        .btn-edit {
            background: #1c8a58;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            font-weight: bold;
            font-size: 14px;
        }

        .btn-delete {
            background: #ff4444;
            color: white;
            padding: 10px 20px;
            border: none;
            outline: none;
            border-radius: 5px;
            display: inline-block;
            font-weight: bold;
            font-size: 14px;
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
    <h1>SEARCH RECORDS</h1>
    <div class="search-container">
        <h3>Enter Student ID:</h3>
        <div class="search-row">
            <input type="text" id="searchID" placeholder="Search by ID">
            <button onclick="searchStudent()" class="btn-search">Search</button>
        </div>
        <div id="info-display">Results will appear here...</div>
    </div>
</div>

</body>
</html>