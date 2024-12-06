<?php
$host = 'localhost';
$db = 'onlineresume';
$user = 'root';
$pass = '';

include 'topside.html';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$current_id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

$sql = "SELECT * FROM resumes WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $current_id);
$stmt->execute();
$result = $stmt->get_result();

$notification = "";

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $applicationStatus = $row['application_status'];

    // check form submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status'])) {
        $newStatus = $_POST['application_status'];

        // prepare update statement
        $updateSql = "UPDATE resumes SET application_status = ? WHERE id = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("si", $newStatus, $current_id);

        if ($updateStmt->execute()) {
            $notification = "<div style='color: green; font-weight: bold;'>Application status updated successfully!</div>";
        } else {
            $notification = "<div style='color: red; font-weight: bold;'>Error updating application status: " . $updateStmt->error . "</div>";
        }

        $updateStmt->close();
    }

    //navigation
    $next_id = $current_id + 1;
    $next_sql = "SELECT * FROM resumes WHERE id = $next_id";
    $next_result = $conn->query($next_sql);
    $has_next = $next_result->num_rows > 0;

    $prev_id = max(1, $current_id - 1);
    $prev_sql = "SELECT * FROM resumes WHERE id = $prev_id";
    $prev_result = $conn->query($prev_sql);
    $has_prev = $prev_result->num_rows > 0;
    ?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <style>
            html, body{
                margin-top: 45px;
            }
            .container{
                margin: 0px auto;
                width: 210mm;
                height: 297mm;
                border: 1px solid black;
                box-shadow: 0 0px 5px;
                padding: 30px;
            }

            .personal_information {
                display: grid;
                grid-template-columns: 1fr 1fr;
                grid-gap: 5px;
            }

            .personal_information label{
                font-weight: bold;
                text-align: left;
            }

            .education_title{
                font-size: 18px;
                margin: 0;
            }

            .education p{
                margin: 10px;
            }

            .button-container{
                display: flex;
                justify-content: center;
            }

            .button-container button{
                padding: 10px;
                border-radius: 5px;
                border: none;
                background-color: #28a745;
                color: white;
                font-weight: bold
            }

            .button-container button:hover{
                border: solid 1px black;
                box-shadow: 0 0 5px grey;
            }
            
            .footer-holder{
                display: flex;
                justify-content: flex-end;
            }
            .footer{
                text-align: center;
            }

            .notification {
                text-align: center;
                margin: 10px auto;
                padding: 10px;
                display: inline;
            }

            .status{
                text-align: center;
                margin: 10px auto;
                border: 1px solid black;
                padding: 20px;
                width: 210mm;
            }

            .status p{
                font-weight: bold;
                margin-top: 0;
                margin-bottom: 0;
            }

            .update-button{
                display: flex;
                justify-content: center;
                margin: 10px;
                padding: 10px;
            }

            .update-button button{
                padding: 10px;
                border-radius: 5px;
                border: none;
                background-color: #28a745;
                color: white;
                font-weight: bold;
                margin-left: 10px
            }

            .update-button button:hover{
                border: solid 1px black;
                box-shadow: 0 0 5px grey;
            }

            .status-group {
                display: flex;
                align-items: center;
                margin-right: 10px;
            }

            .status-group label {
                font-weight: bold;
                margin-right: 10px;
            }
        </style>
    </head>
        <body>
            
            <div class="button-container">
                
                <?php if ($has_prev): ?>
                    <button onclick="location.href='?id=<?php echo $prev_id; ?>'" style="margin-right: 20px">
                        Previous Resume
                    </button>
                <?php endif; ?>
                <button onclick="location.href='editing_page.blade.php?id=<?php echo $row['id']; ?>'" style="margin-right: 20px">
                    Edit Resume
                </button>
                <?php if ($has_next): ?>
                    <button onclick="location.href='?id=<?php echo $next_id; ?>'">
                        Next Resume
                    </button>
                <?php else: ?>
                    <button disabled>
                        Next Resume
                    </button>
                <?php endif; ?>
            </div>

            <?php if ($notification): ?>
            <div class="notification">
                <?php echo $notification; ?>
            </div>
            <?php endif; ?>

            <div class="status">
                <p>Application Status: </p><?php echo $row["application_status"]?>
                <p>Application Link</p><?php echo $row["application_link"]?>
            </div>

            <div class="container">

            <h2 style="margin-top: 0;">
                <?php echo $row["first_name"] . " " . $row["middle_name"] . " " . $row["last_name"] ; ?>
            </h2>

            <p><b>Address: </b>
                <?php echo $row["address"]?></p>

            <p><b>Cellphone No.: </b> 
                <?php echo $row["cellphone"]?></p>

            <p><b>Email Address:</b> <u style="color: blue">
                <?php echo $row["email"]?></u></p>
            
            <hr style="height: 1px;" color="black">

            <h3><b><u>CAREER OBJECTIVE</u></b></h3>
            <p><?php echo $row["objective"]?>
            </p>

            <hr style="height: 1px;" color="black">

            
            <h3><b><u>PERSONAL INFORMATION</u></b></h3>
            <div class="personal_information">
            <label>Date of Birth:</label> <span><?php echo $row["birthdate"]?></span>
            <label>Age: </label>          <span><?php echo $row["age"]?></span>
            <label>Civil Status:</label>  <span><?php echo $row["civil_status"]?></span>
            <label>Religion:</label>      <span><?php echo $row["religion"]?></span>
            <label>Gender:</label>        <span><?php echo $row["gender"]?></span>
            </div>

            <hr style="height: 1px;" color="black">


            <h3><b><u>EDUCATIONAL ATTAINMENT</u></b></h3>

            <div class= "education">
            <h3 class="education_title"><b>Tertiary Education</b></h3>
            <p><b><?php echo $row["tertiary"]?></b></p>
            <p><?php echo $row["tertiary_address"]?></p>
            <p><?php echo $row["tertiary_course"]?></p>
            <p><?php echo $row["tertiary_academic_year"]?></p>

            <h3 class="education_title"><b>Secondary Education</b></h3>
            <p><b><?php echo $row["secondary"]?></b></p>
            <p><?php echo $row["secondary_address"]?></p>
            <p><?php echo $row["secondary_academic_year"]?></p>

            <p><b><?php echo $row["junior_high"]?></b></p>
            <p><?php echo $row["junior_high_address"]?></p>
            <p><?php echo $row["junior_academic_year"]?></p>

            <h3 class="education_title"><b>Primary Education</b></h3>
            <p><b><?php echo $row["primary_school"]?></b></p>
            <p><?php echo $row["primary_address"]?></p>
            <p><?php echo $row["primary_academic_year"]?></p>
            </div>

            <hr style="height: 1px;" color="black">

            <p style="text-align: center;"><i>I hereby that all the above information is true and correct to the best of my knowledge and belief.</i></p>            
            
            
            <div class="footer-holder">
                <div class="footer">
                    <div style="margin: 5px;"> </div>
                    <h3 style="margin-bottom: 0px;"><?php echo $row["first_name"] . " " . $row["middle_name"] . " " . $row["last_name"] ; ?></h3>
                    <hr style="width: 80mm; margin-top: 10px; height: 2px; background-color:black">
                    <div style="font-size: 18px; color: black; text-transform: uppercase; text-align: center;">
                        APPLICANT
                    </div>
                </div>
            </div>
        </div>

        <form method="post" action="">
            <div class="update-button">
                <div class="status-group">
                    <label for="application_status">Application Status:</label>
                        <select name="application_status" id="application_status">
                            <option value="Applied" <?php if ($applicationStatus == 'Applied') echo 'selected'; ?>>Applied</option>
                            <option value="Interviewed" <?php if ($applicationStatus == 'Interviewed') echo 'selected'; ?>>Interviewed</option>
                            <option value="Rejected" <?php if ($applicationStatus == 'Rejected') echo 'selected'; ?>>Rejected</option>
                            <option value="Hired " <?php if ($applicationStatus == 'Hired') echo 'selected'; ?>>Hired</option>
                        </select>
                </div>
                <button type="submit" name="update_status">Submit</button>
            </div>
        </form>
        </body>
</html>

<?php
} else {
    echo "0 results";
}
// Close the connection
$conn->close();
?>