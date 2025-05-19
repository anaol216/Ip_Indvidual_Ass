<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
            justify-content: center;
            align-items: center;
        }

        .dashboard {
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .welcome {
            font-size: 24px;
            margin-bottom: 30px;
            color: #333;
        }

        .btn {
            text-decoration: none;
            background: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            display: inline-flex;
            align-items: center;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background: #0056b3;
        }

        .btn i {
            margin-right: 8px;
        }

        footer {
            position: absolute;
            bottom: 20px;
        }
    </style>
    <!-- Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="dashboard">
        <div class="welcome">Welcome, <strong><?php echo htmlspecialchars($username); ?></strong></div>

        <a href="logout.php" class="btn">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </div>

    <footer>
        <div>
            Logged in as <?php echo htmlspecialchars($username); ?>
        </div>
    </footer>

</body>

</html>