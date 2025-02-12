<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal with ID</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php
     $id=1234;
    ?>
    <div class="container mt-5">
        <a href="sampliamlakie.php?id=<?php echo $id ?>" class="btn btn-primary">Open Modal with ID</a>
    </div>

    <div class="modal fade" id="registrationModal" tabindex="-1" aria-labelledby="registrationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registrationModalLabel">Register</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="registrationForm">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                    <!-- The dynamic ID will appear here -->
                </div>
            </div>
        </div>
    </div>

    <script>
        // Function to get query parameters from the URL
        function getQueryParam(param) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(param);
        }

        // Extract 'id' from the URL and use it
        const id = getQueryParam('id');
        if (id) {
            // Pass the ID to the modal dynamically
            const modalBody = document.querySelector('#registrationModal .modal-body');
            modalBody.innerHTML += `<p>Selected ID: ${id}</p>`;
            
            // Automatically show the modal if ID exists
            const modal = new bootstrap.Modal(document.getElementById('registrationModal'));
            modal.show();
        }
    </script>
</body>
</html>
