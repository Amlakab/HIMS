<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Database configuration
    $host = "localhost";
    $db = "hospital_managment";
    $user = "root";
    $pass = "";

    // Get form data
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $gender = trim($_POST['gender']);
    $department = trim($_POST['department']);
    $email = trim($_POST['email']);
    $mobile = trim($_POST['mobile']);
    $address = trim($_POST['address']);
    $role = trim($_POST['role']);
    $username="TGU/$fname";
    $password="$lname.@123";
    $status="untrushed";
    // Input validation
    if (empty($fname) || empty($lname) || empty($gender) || empty($department) || 
        empty($email) || empty($mobile) || empty($address) || empty($role)) {
        die("All fields are required!");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format!");
    }

    if (!preg_match('/^[0-9]{10}$/', $mobile)) {
        die("Invalid mobile number!");
    }

    // Database connection
    try {
        $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("INSERT INTO $role (Fname, Lname, Gender, Department, Email, Mobile, Address,Username,Password,Status) 
                                 VALUES (:fname, :lname, :gender, :department, :email, :mobile, :address, :username, :password, :status)");
        $stmt->execute([
            ':fname' => $fname,
            ':lname' => $lname,
            ':gender' => $gender,
            ':department' => $department,
            ':email' => $email,
            ':mobile' => $mobile,
            ':address' => $address,
            ':username' => $username,
            ':password' => $password,
            ':status' => $status,
        ]);

        ?>
        <script>
         alert("You have added user seccesfuly!");
         window.location.href='add_user.php';
        </script>
        <?php
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
}
?>
