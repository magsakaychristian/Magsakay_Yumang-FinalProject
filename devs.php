<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Creators</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            background: url('pic/devmain.jpg') no-repeat center center fixed;
            background-size: cover;
        }

    .sidebar {
                width: 220px;
                height: 100vh;
                background: rgba(34, 31, 31, 0.7);
                color: whitesmoke;
                padding-top: 20px;
                position: fixed;
                box-shadow: 2px 0 8px rgba(16, 214, 76, 0.3);
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
            margin-left: 260px;
            padding: 40px 20px; 
            flex: 1;
            text-align: center;
            min-height: 100vh;
            color: white;
        }

        .main h2 {
            margin-bottom: 150px;
            letter-spacing: 5px;
            font-size: 26px;

        }


        .dev-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 90px;
        }

        .dev-card {
            flex: 0 0 300px;
            border-radius: 12px;
            padding: 30px;
            text-align: center;
            box-shadow: 0  5px 15px rgba(151, 235, 169, 0.6);
            background: rgba(0, 0, 0, 0.7);
            transition: transform 0.3s ease;
        }

        .dev-card:hover {
            transform: translateY(-5px);
        }

        .dev-card img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            margin-bottom: 15px;
            border: 3px solid #1c8a58;
        }

        .dev-card h3 {
            margin: 10px 0;
        }

        .dev-card p {
            margin: 5px 0;
            font-size: 14px;
            color: rgba(28, 138, 88, 0.8);
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
        <h2>MEET OUR DEVELOPERS</h2>

        <div class="dev-container">
            <div class="dev-card"> 
                <img src="pic/jian.png" alt="Jian">
                <h3>Jian Carlo L. Yumang</h3>
                <p>Web Systems and Design</p>
            </div>

            <div class="dev-card"> 
                <img src="pic/ben.jfif" alt="Christian">
                <h3>Christian Reiven C. Magsakay</h3>
                <p>Web Systems and Database</p>
            </div>
        </div>
    </div>

</body>
</html>