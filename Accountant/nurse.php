<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <style>
        /* Smooth animation for rows */
        tbody tr {
            opacity: 0;
            transform: translateX(-20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        /* Modal animation */
        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <main class="content px-3 py-2">
        <div class="container-fluid">
            <div class="mb-3">
                <h4>Admin Dashboard</h4>
            </div>
            <!-- Table Element -->
            <div class="card border-0">
                <div class="card-header">
                    <h5 class="card-title">Patient List Needs Indoor</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped animated-table">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Id</th>
                                <th>Birthdate</th>
                                <th>Age</th>
                                <th>Address</th>
                                <th>Type</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Blood Pressure</th>
                                <th>Weight</th>
                                <th>Temperature</th>
                                <th>Height</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include ('../db_connection.php');
                            $status = "inpatient";
                            $seq_no = 0;
                            $sql = "SELECT * FROM patients WHERE Status='$status'";
                            $result = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $seq_no++;
                                ?>
                                <tr>
                                    <td><?php echo $seq_no; ?></td>
                                    <td><?php echo $row['Fname']; ?></td>
                                    <td><?php echo $row['Mname']; ?></td>
                                    <td><?php echo $row['Lname']; ?></td>
                                    <td><?php echo $row['Id']; ?></td>
                                    <td><?php echo $row['Brthdate']; ?></td>
                                    <td><?php echo $row['Age']; ?></td>
                                    <td><?php echo $row['Address']; ?></td>
                                    <td><?php echo $row['Ptype']; ?></td>
                                    <td><?php echo $row['Email']; ?></td>
                                    <td><?php echo $row['Gender']; ?></td>
                                    <td><?php echo $row['Bpresure']; ?></td>
                                    <td><?php echo $row['Weight']; ?></td>
                                    <td><?php echo $row['Temprature']; ?></td>
                                    <td><?php echo $row['Height']; ?></td>
                                    <td>
                                        <button class="btn btn-primary btn-view" data-id="<?php echo $row['Id']; ?>">View</button>
                                        <button class="btn btn-success btn-allocate" data-id="<?php echo $row['Id']; ?>">Admit</button>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <!-- View Modal -->
    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content fade-in">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel">Patient Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="viewModalContent"></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Allocate Modal -->
    <div class="modal fade" id="allocateModal" tabindex="-1" aria-labelledby="allocateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content fade-in">
                <div class="modal-header">
                    <h5 class="modal-title" id="allocateModalLabel">Admit Patient</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="allocateModalContent"></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const viewModal = new bootstrap.Modal(document.getElementById("viewModal"));
            const allocateModal = new bootstrap.Modal(document.getElementById("allocateModal"));

            // Handle View Button Click
            document.querySelectorAll(".btn-view").forEach((button) => {
                button.addEventListener("click", () => {
                    const id = button.getAttribute("data-id");
                    fetch(`fetch_patient.php?id=${id}`)
                        .then((response) => response.json())
                        .then((data) => {
                            document.getElementById("viewModalContent").innerHTML = `
                                <strong>First Name:</strong> ${data.Fname}<br>
                                <strong>Last Name:</strong> ${data.Lname}<br>
                                <strong>Age:</strong> ${data.Age}<br>
                                <strong>Email:</strong> ${data.Email}
                            `;
                            viewModal.show();
                        });
                });
            });

            // Handle Allocate Button Click
            document.querySelectorAll(".btn-allocate").forEach((button) => {
                button.addEventListener("click", () => {
                    const id = button.getAttribute("data-id");
                    document.getElementById("allocateModalContent").innerText = `Confirm admission for patient ID: ${id}`;
                    allocateModal.show();
                });
            });

            // Smooth animation for table rows
            const rows = document.querySelectorAll("tbody tr");
            rows.forEach((row, index) => {
                setTimeout(() => {
                    row.style.opacity = "1";
                    row.style.transform = "translateX(0)";
                }, index * 200);
            });
        });
    </script>
</body>
</html>
