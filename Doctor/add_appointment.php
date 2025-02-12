<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Appointment Registration Form</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/user_form.css">
</head>
<body>
  <div class="form-container">
    <form id="registrationForm" action="register_appointment.php" method="post">
      <h2>Appointment Registration</h2>

      <div class="form-group">
        <label for="pid">Patient Id</label>
        <input type="text" id="pid" name="pid" placeholder="Enter patient id" required>
        <small class="text-danger" id="pid_error"></small>
      </div>

      <div class="form-group">
        <label for="fname">Patient First Name</label>
        <input type="text" id="fname" name="fname" placeholder="Enter first name" required>
        <small class="text-danger" id="fname_error"></small>
      </div>

      <div class="form-group">
        <label for="lname">Patient Last Name</label>
        <input type="text" id="lname" name="lname" placeholder="Enter last name" required>
        <small class="text-danger" id="lname_error"></small>
      </div>

      <div class="form-group">
        <label for="adate">Appointment Date</label>
        <input type="date" id="adate" name="adate" placeholder="Enter appointment date" required>
        <small class="text-danger" id="adate_error"></small>
      </div>

      <div class="form-group">
        <label for="dname">Docter Name</label>
        <input type="text" id="dname" name="dname" placeholder="Enter doctor name" required>
        <small class="text-danger" id="dname_error"></small>
      </div>

      <div class="form-group">
        <label for="dcontact">Docter Contact</label>
        <input type="text" id="dcontact" name="dcontact" placeholder="Enter Doctor contact" required>
        <small class="text-danger" id="dcontact_error"></small>
      </div>

      <div class="row">
        <div class="col-md-6">
          <button type="submit" name="submit" class="btn btn-success">Register</button>
        </div>
        <div class="col-md-6">
          <button type="reset" class="btn btn-danger">Cancel</button>
        </div>
      </div>
    </form>
  </div>

  <script>
    document.getElementById('registrationForm').addEventListener('submit', function (e) {
      let isValid = true;

      const regexName = /^[a-zA-Z]+$/;
      const regexMobile = /^[0-9]{10}$/;
      const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

      const fname = document.getElementById('fname');
      const lname = document.getElementById('lname');
      const dname = document.getElementById('dname');
      const mobile = document.getElementById('dcontact');

      if (!regexName.test(fname.value)) {
        isValid = false;
        document.getElementById('fname_error').textContent = 'Invalid first name!, Please enter valid first name it should contain only alphabets.!';
      } else {
        document.getElementById('fname_error').textContent = '';
      }

      if (!regexName.test(lname.value)) {
        isValid = false;
        document.getElementById('lname_error').textContent = 'Invalid last name!, Please enter valid last name it should contain only alphabets.!';
      } else {
        document.getElementById('lname_error').textContent = '';
      }

      if (!regexName.test(dname.value)) {
        isValid = false;
        document.getElementById('dname_error').textContent = 'Invalid doctor name!, Please enter valid doctor name it should contain only alphabets.!';
      } else {
        document.getElementById('dname_error').textContent = '';
      }

      if (!regexMobile.test(mobile.value)) {
        isValid = false;
        document.getElementById('dcontact_error').textContent = 'Invalid mobile number!, Please enter a valid 10-digit mobile number.!';
      } else {
        document.getElementById('dcontact_error').textContent = '';
      }


      if (!isValid) {
        e.preventDefault();
      }
    });

  </script>
</body>
</html>
