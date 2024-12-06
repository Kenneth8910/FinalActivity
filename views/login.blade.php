<?php 
$host = 'localhost';
$db = 'adminlogin';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the submitted username and password
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("SELECT password FROM admin WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    // Check if the user exists
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            session_start();
            $_SESSION['username'] = $username;

            header("Location: dashboard.blade.php");
            exit();
        } else {
            $error_message = "Invalid password.";
        }
    } else {
        $error_message = "No admin found with that username.";
    }

    $stmt->close();
}
$conn->close();

?>

<!DOCTYPE html>
<html lang=en>

    <head>
        <style>
            h1{
                text-align: center
            }

            form {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }

            input[type=text], input[type=password] {
                width: 100%;
                padding: 12px 20px;
                margin: 10px 0;
                display: inline-block;
                border: 1px solid #ccc;
                box-sizing: border-box;
                border-radius: 5px;
            }

            button{
                background-color: rgb(72, 121, 0);
                color: white;
                padding: 10px 10px;
                border: none;
                cursor: pointer;
                width: 100%;
                border-radius: 5px;
            }

            .container {
                padding: 16px;
                margin: 20px
            }

            .logincard{
                border: 3px solid #f1f1f1;
                border-radius: 10px;
                padding: 20px;
                margin: 0 auto; 
                height: 90mm;
                width: 200mm;
            }

            .error {
                color: red;
                text-align: center;
            }
            
        </style>
    </head>

    <body>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="logincard">
                        <h1><b>LOG IN</b></h1>

                    <div class="container">
                        <label for="username"><b>Username</b></label>
                        <input type="text" placeholder="Enter Username" name="username" required>
                    
                        <label for="password"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="password" required>

                        <button type="submit">Login</button>

                        <?php if (!empty($error_message)): ?>
                        <div class="error"><?php echo $error_message; ?></div>
                        <?php endif; ?>

                    </div>
                </div>
            </form>

    </body>
    
</html>