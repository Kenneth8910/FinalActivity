<?php
    include 'topside.html';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "onlineresume";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, first_name, middle_name, last_name FROM resumes";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .container {
            margin-top: 80px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .view-card {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            margin: 10px;
            width: 100vh;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .view-card h2 {
            margin: 0;
        }

        .view-card a {
            display: inline-block;
            padding: 5px 10px;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;            
            background-color: #28a745;
            text-decoration: none;
            margin-left: 10px;
        }

        .view-card a:hover{
            box-shadow: 0px 0px 5px rgb(85, 85, 85);
        }

        .name-container{
            flex: 1;
        }

        .button-container{
            display: flex;
            gap: 10px;
        }


    </style>
</head>
<body>
    <div class="container">
        <?php while($row = $result->fetch_assoc()) { ?>
            <div class="view-card">
                <div class="name-container">
                    <h2 style="font-family: calibri"><?php echo $row['first_name'] . ' ' . $row['middle_name'] . ' ' . $row['last_name']; ?></h2>
                </div>
                <div class="button-container">
                    <a href="viewing_page.blade.php?id=<?php echo $row['id']; ?>" class="view-button">View</a>
                    <a href="editing_page.blade.php?id=<?php echo $row['id']; ?>" class="edit-button">Edit</a>
                </div>
            </div>
        <?php } ?>
    </div>

</body>
</html>