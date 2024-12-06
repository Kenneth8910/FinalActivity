<?php

    include 'topside.html';;

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

$resumeId = $_GET['id'];

// Fetch the resume data
$sql = "SELECT * FROM resumes WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $resumeId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Resume not found.";
    exit; // Stop further execution if no resume is found
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $firstName = $_POST['first_name'];
    $middleName = $_POST['middle_name'];
    $lastName = $_POST['last_name'];
    $address = $_POST['address'];
    $cellphone = $_POST['cellphone'];
    $email = $_POST['email'];
    $birthdate = $_POST['birthdate'];
    $age = $_POST['age'];
    $civilStatus = $_POST['civil_status'];
    $religion = $_POST['religion'];
    $gender = $_POST['gender'];
    $objective = $_POST['objective'];
    $tertiary = $_POST['tertiary'];
    $tertiaryAddress = $_POST['tertiary_address'];
    $tertiaryCourse = $_POST['tertiary_course'];
    $tertiaryAcademicYear = $_POST['tertiary_academic_year'];
    $secondary = $_POST['secondary'];
    $secondaryAddress = $_POST['secondary_address'];
    $secondaryAcademicYear = $_POST['secondary_academic_year'];
    $juniorHigh = $_POST['junior_high'];
    $juniorHighAddress = $_POST['junior_high_address'];
    $juniorAcademicYear = $_POST['junior_academic_year'];
    $primarySchool = $_POST['primary_school'];
    $primaryAddress = $_POST['primary_address'];
    $primaryAcademicYear = $_POST['primary_academic_year'];

    // Prepare the update statement
    $sql = "UPDATE resumes SET 
        first_name = ?, 
        middle_name = ?, 
        last_name = ?, 
        address = ?, 
        cellphone = ?, 
        email = ?, 
        birthdate = ?, 
        age = ?, 
        civil_status = ?, 
        religion = ?, 
        gender = ?, 
        objective = ?, 
        tertiary = ?, 
        tertiary_address = ?, 
        tertiary_course = ?, 
        tertiary_academic_year = ?, 
        secondary = ?, 
        secondary_address = ?, 
        secondary_academic_year = ?, 
        junior_high = ?, 
        junior_high_address = ?, 
        junior_academic_year = ?, 
        primary_school = ?, 
        primary_address = ?, 
        primary_academic_year = ? 
    WHERE id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt-> bind_param("sssssssssssssssssssssssssi", $firstName, $middleName, $lastName, $address, $cellphone, $email, $birthdate, $age, $civilStatus, $religion, $gender, $objective, $tertiary, $tertiaryAddress, $tertiaryCourse, $tertiaryAcademicYear, $secondary, $secondaryAddress, $secondaryAcademicYear, $juniorHigh, $juniorHighAddress, $juniorAcademicYear, $primarySchool, $primaryAddress, $primaryAcademicYear, $id);

    if ($stmt->execute()) {
        header("Location: viewing_page.blade.php?id=$id");
        exit; // Ensure no further code is executed after redirection
    } else {
        echo "Error updating resume: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Resume</title>
    <style>
        body {
            margin-top: 45px;
        }

        .input-group{
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        label{
            flex: 0 0 150px; /* Adjust the width as needed */
            margin-right: 100px;
            margin-left: 50px;
            margin-bottom: 5px;
            font-weight: bold
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="number"],
        textarea
        {
            flex: 1;
            padding: 5px;
            margin-right: 50px;
            margin-bottom: 5px;
            border-radius: 5px;
            border: solid 1px;
            height: 30px;
        }

        .button-container{
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .button-container button{
            color: white;
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: #28a745;
            font-weight: bold;
        }

        .button-container button:hover{
            border: solid black 1px;
            box-shadow: 0 0 5px blackgrey;
        }

    </style>
</head>
<body>
    <h2>Edit Resume</h2>

    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    
        <div class="input-group">
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" value="<?php echo htmlspecialchars($row['first_name']); ?>">
        </div>
    
        <div class="input-group">
            <label for="middle_name">Middle Name:</label>
            <input type="text" name="middle_name" value="<?php echo htmlspecialchars($row['middle_name']); ?>">
        </div>
            
        <div class="input-group">
            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" value="<?php echo htmlspecialchars($row['last_name']); ?>">
        </div>
    
        <div class="input-group">
            <label for="address">Address:</label>
            <input type="text" name="address" value="<?php echo htmlspecialchars($row['address']); ?>">
        </div>
            
                <div class="input-group">
            <label for="cellphone">Cellphone Number:</label>
            <input type="text" name="cellphone" value="<?php echo htmlspecialchars($row['cellphone']); ?>">
        </div>

        <div class="input-group">
            <label for="email">Email Address:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>">
        </div>

        <div class="input-group">
            <label for="birthdate">Birthdate:</label>
            <input type="date" name="birthdate" value="<?php echo htmlspecialchars($row['birthdate']); ?>">
        </div>

        <div class="input-group">
            <label for="age">Age:</label>
            <input type="number" name="age" value="<?php echo htmlspecialchars($row['age']); ?>">
        </div>

        <div class="input-group">
            <label for="civil_status">Civil Status:</label>
            <input type="text" name="civil_status" value="<?php echo htmlspecialchars($row['civil_status']); ?>">
        </div>

        <div class="input-group">
            <label for="religion">Religion:</label>
            <input type="text" name="religion" value="<?php echo htmlspecialchars($row['religion']); ?>">
        </div>

        <div class="input-group">
            <label for="gender">Gender:</label>
            <input type="text" name="gender" value="<?php echo htmlspecialchars($row['gender']); ?>">
        </div>

        <div class="input-group">
            <label for="objective">Objective:</label>
            <textarea name="objective"><?php echo htmlspecialchars($row['objective']); ?></textarea>
        </div>

        <div class="input-group">
            <label for="tertiary">Tertiary Education:</label>
            <input type="text" name="tertiary" value="<?php echo htmlspecialchars($row['tertiary']); ?>">
        </div>

        <div class="input-group">
            <label for="tertiary_address">Tertiary Address:</label>
            <input type="text" name="tertiary_address" value="<?php echo htmlspecialchars($row['tertiary_address']); ?>">
        </div>

        <div class="input-group">
            <label for="tertiary_course">Tertiary Course:</label>
            <input type="text" name="tertiary_course" value="<?php echo htmlspecialchars($row['tertiary_course']); ?>">
        </div>

        <div class="input-group">
            <label for="tertiary_academic_year">Tertiary Academic Year:</label>
            <input type="text" name="tertiary_academic_year" value="<?php echo htmlspecialchars($row['tertiary_academic_year']); ?>">
        </div>

        <div class="input-group">
            <label for="secondary">Secondary Education:</label>
            <input type="text" name="secondary" value="<?php echo htmlspecialchars($row['secondary']); ?>">
        </div>

        <div class="input-group">
            <label for="secondary_address">Secondary Address:</label>
            <input type="text" name="secondary_address" value="<?php echo htmlspecialchars($row['secondary_address']); ?>">
        </div>

        <div class="input-group">
            <label for="secondary_academic_year">Secondary Academic Year:</label>
            <input type="text" name="secondary_academic_year" value="<?php echo htmlspecialchars($row['secondary_academic_year']); ?>">
        </div>

        <div class="input-group">
            <label for="junior_high">Junior High School:</label>
            <input type="text" name="junior_high" value="<?php echo htmlspecialchars($row['junior_high']); ?>">
        </div>

        <div class="input-group">
            <label for="junior_high_address">Junior High Address:</label>
            <input type="text" name="junior_high_address" value="<?php echo htmlspecialchars($row['junior_high_address']); ?>">
        </div>

        <div class="input-group">
            <label for="junior_academic_year">Junior Academic Year:</label>
            <input type="text" name="junior_academic_year" value="<?php echo htmlspecialchars($row['junior_academic_year']); ?>">
        </div>

        <div class="input-group">
            <label for="primary_school">Primary School:</label>
            <input type="text" name="primary_school" value="<?php echo htmlspecialchars($row['primary_school']); ?>">
        </div>

        <div class="input-group">
            <label for="primary_address">Primary Address:</label>
            <input type="text" name="primary_address" value="<?php echo htmlspecialchars($row['primary_address']); ?>">
        </div>

        <div class="input-group">
            <label for="primary_academic_year">Primary Academic Year:</label>
            <input type="text" name="primary_academic_year" value="<?php echo htmlspecialchars($row['primary_academic_year']); ?>">
        </div>

        <div class="button-container">
            <button type="submit">Update Resume</button>
        </div>
    </form>

</body>
</html>

<?php
$stmt->close();
$conn->close();
?>