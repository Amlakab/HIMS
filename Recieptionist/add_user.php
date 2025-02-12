<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctor Registration Form</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/user_form.css">
</head>
<body>
  <div class="form-container">
    <form id="registrationForm" action="register.php" method="post">
      <h2>Doctor Registration</h2>

      <div class="form-group">
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="fname" placeholder="Enter first name" required>
        <small class="text-danger" id="fname_error"></small>
      </div>
      
      <div class="form-group">
        <label for="mname">Middle Name</label>
        <input type="text" id="mname" name="mname" placeholder="Enter mname name" required>
        <small class="text-danger" id="mname_error"></small>
      </div>

      <div class="form-group">
        <label for="lname">Last Name</label>
        <input type="text" id="lname" name="lname" placeholder="Enter last name" required>
        <small class="text-danger" id="lname_error"></small>
      </div>

      <div class="form-group">
        <label for="gender">Gender</label>
        <select id="role" name="gender" required>
          <option value="">Select Gender</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          <!-- Add other roles -->
        </select>
        <small class="text-danger" id="gender_error"></small>
      </div>
      
      <div class="form-group">
        <label for="birthdate">Birthdate </label>
        <input type="date" id="birthdate" name="birthdate" placeholder="Enter birthdate" required>
        <small class="text-danger" id="birthdate_error"></small>
      </div>

      <div class="form-group">
        <label for="age">Age</label>
        <input type="number" id="age" min="0" max="120" name="age" placeholder="Enter age" required>
        <small class="text-danger" id="age_error"></small>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter email" required>
        <small class="text-danger" id="email_error"></small>
      </div>

      <div class="form-group">
        <label for="mobile">Mobile</label>
        <input type="text" id="mobile" name="mobile" placeholder="Enter mobile number" required>
        <small class="text-danger" id="mobile_error"></small>
      </div>

      <div class="form-group">
        <label for="address">Address</label>
        <input type="text" id="address" name="address" placeholder="Enter address" required>
        <small class="text-danger" id="address_error"></small>
      </div>

      <div class="form-group">
        <label for="role">Patient Type</label>
        <select id="role" name="role" required>
          <option value="">Choose</option>
          <option value="Emergency">Emergency</option>
          <option value="Other">Other</option>
          <!-- Add other roles -->
        </select>
        <small class="text-danger" id="role_error"></small>
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
      const mname = document.getElementById('mname');
      const lname = document.getElementById('lname');
      const mobile = document.getElementById('mobile');
      const email = document.getElementById('email');

      if (!regexName.test(fname.value)) {
        isValid = false;
        document.getElementById('fname_error').textContent = 'Invalid first name!, Please enter valid first name it should contain only alphabets.!';
      } else {
        document.getElementById('fname_error').textContent = '';
      }
      if (!regexName.test(mname.value)) {
        isValid = false;
        document.getElementById('mname_error').textContent = 'Invalid middle name!, Please enter valid middle name it should contain only alphabets.!';
      } else {
        document.getElementById('mname_error').textContent = '';
      }

      if (!regexName.test(lname.value)) {
        isValid = false;
        document.getElementById('lname_error').textContent = 'Invalid last name!, Please enter valid last name it should contain only alphabets.!';
      } else {
        document.getElementById('lname_error').textContent = '';
      }

      if (!regexMobile.test(mobile.value)) {
        isValid = false;
        document.getElementById('mobile_error').textContent = 'Invalid mobile number!, Please enter a valid 10-digit mobile number.!';
      } else {
        document.getElementById('mobile_error').textContent = '';
      }

      if (!regexEmail.test(email.value)) {
        isValid = false;
        document.getElementById('email_error').textContent = 'Invalid email!, Please enter a valid email that contain @gmail.com address.!';
      } else {
        document.getElementById('email_error').textContent = '';
      }

      if (!isValid) {
        e.preventDefault();
      }
    });

  </script>
</body>
</html>
