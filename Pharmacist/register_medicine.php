<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Database configuration
    $host = "localhost";
    $db = "hospital_managment";
    $user = "root";
    $pass = "";

    // Get form data
    $mname = trim($_POST['mname']);
    $mtype = trim($_POST['mtype']);
    $mprice = trim($_POST['mprice']);
    $mquantity = trim($_POST['mquantity']);
    $mweight = trim($_POST['mweight']);
    $mexpairdate = trim($_POST['mexpairdate']);
    $campuny = trim($_POST['campuny']);
    $status="untrushed";
    // Input validation
    if (empty($mname) || empty($mtype)  ) {
        die("All fields are required!");
    }

    // Database connection
    try {
        $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("INSERT INTO medicines (Mname, Mtype, Mprice, Mweight, Mquantity, Mexpairdate, Mcampuny,Status) 
                                 VALUES (:mname, :mtype, :mprice, :mweight, :mquantity, :mexpirdate, :campuny, :status)");
        $stmt->execute([
            ':mname' => $mname,
            ':mtype' => $mtype,
            ':mprice' => $mprice,
            ':mweight' => $mweight,
            ':mquantity' => $mquantity,
            ':mexpirdate' => $mexpairdate,
            ':campuny' => $campuny,
            ':status' => $status,
        ]);

        ?>
        <script>
         alert("You have added medicine seccesfuly!");
         window.location.href='add_medicine.php';
        </script>
        <?php
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
}
?>
