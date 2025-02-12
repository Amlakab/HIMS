<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Database configuration
    $host = "localhost";
    $db = "hospital_managment";
    $user = "root";
    $pass = "";

    // Get form data
    $fname = trim($_POST['fname']);
    $mname = trim($_POST['mname']);
    $lname = trim($_POST['lname']);
    $gender = trim($_POST['gender']);
    $birthdate = trim($_POST['birthdate']);
    $age = trim($_POST['age']);
    $email = trim($_POST['email']);
    $mobile = trim($_POST['mobile']);
    $address = trim($_POST['address']);
    $role = trim($_POST['role']);
    $username="TGU/$fname";
    $password="$lname.@123";
    $status="new";
    $available="untrushed";
    // Input validation
    if (empty($fname) || empty($mname) || empty($lname) || empty($gender) || empty($birthdate) || empty($age) || 
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

        $stmt = $conn->prepare("INSERT INTO patients (Fname, Mname, Lname, Gender, Brthdate, Age, Ptype, Email, Mobile, Address,Username,Password,Status,Available) 
                                 VALUES (:fname, :mname, :lname, :gender, :birthdate, :age, :role, :email, :mobile, :address, :username, :password, :status, :available)");
        $stmt->execute([
            ':fname' => $fname,
            ':mname' => $mname,
            ':lname' => $lname,
            ':gender' => $gender,
            ':birthdate' => $birthdate,
            ':age' => $age,
            ':role' => $role,
            ':email' => $email,
            ':mobile' => $mobile,
            ':address' => $address,
            ':username' => $username,
            ':password' => $password,
            ':status' => $status,
            ':available' => $available,
        ]);

        ?>
        <script>
         alert("You have added patient seccesfuly!");
         window.location.href='add_user.php';
        </script>
        <?php
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
}
?>
