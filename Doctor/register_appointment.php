<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Database configuration
    $host = "localhost";
    $db = "hospital_managment";
    $user = "root";
    $pass = "";

    // Get form data
    $pid = trim($_POST['pid']);
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $adate = trim($_POST['adate']);
    $dname = trim($_POST['dname']);
    $dcontact = trim($_POST['dcontact']);
    $status="untrushed";
    // Input validation
    if (empty($fname) || empty($lname) || empty($adate) || empty($dname) || 
        empty($dcontact)) {
        die("All fields are required!");
    }


    if (!preg_match('/^[0-9]{10}$/', $dcontact)) {
        die("Invalid mobile number!");
    }

    // Database connection
    try {
        $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("INSERT INTO appointments (Pid, Fname, Lname, Adate, Dname, Dcontact, Status) 
                                 VALUES (:pid, :fname, :lname, :adate, :dname, :dcontact, :status)");
        $stmt->execute([
            ':pid' => $pid,
            ':fname' => $fname,
            ':lname' => $lname,
            ':adate' => $adate,
            ':dname' => $dname,
            ':dcontact' => $dcontact,
            ':status' => $status,
        ]);

        ?>
        <script>
         alert("You have added appointment seccesfuly!");
         window.location.href='add_appointment.php';
        </script>
        <?php
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
}
?>
