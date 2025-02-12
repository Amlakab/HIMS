<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Medicine Registration Form</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/user_form.css">
</head>
<body>
  <div class="form-container">
    <form id="registrationForm" action="register_medicine.php" method="post">
      <h2>Fill Thus Medicine Creation Form</h2>

      <div class="form-group">
        <label for="mname">Medicine Name</label>
        <input type="text" id="mname" name="mname" placeholder="Enter medicine name" required>
        <small class="text-danger" id="mname_error"></small>
      </div>

      <div class="form-group">
        <label for="mtype">Medicine Type</label>
        <input type="text" id="mtype" name="mtype" placeholder="Enter medicine type" required>
        <small class="text-danger" id="mtype_error"></small>
      </div>
      <div class="form-group">
        <label for="mprice">Medicine Price</label>
        <input type="number" id="mprice" name="mprice" placeholder="Enter medicine price" required>
        <small class="text-danger" id="mprice_error"></small>
      </div>
      <div class="form-group">
        <label for="mquantity">Medicine Quantity</label>
        <input type="text" id="mquantity" name="mquantity" placeholder="Enter medicine quantity" required>
        <small class="text-danger" id="mquantity_error"></small>
      </div>
      <div class="form-group">
        <label for="mweight">Medicine weight</label>
        <input type="text" id="mweight" name="mweight" placeholder="Enter medicine weight" required>
        <small class="text-danger" id="mweight_error"></small>
      </div>
      <div class="form-group">
        <label for="mexpairdate">Medicine Expiredate</label>
        <input type="date" id="mexpairdate" name="mexpairdate" placeholder="Enter medicine expairdate" required>
        <small class="text-danger" id="mexpairdate_error"></small>
      </div>
      <div class="form-group">
        <label for="campuny">Medicine Campuny</label>
        <input type="text" id="campuny" name="campuny" placeholder="Enter medicine campuny" required>
        <small class="text-danger" id="campuny_error"></small>
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

      const mname = document.getElementById('mname');
      const mtype = document.getElementById('campuny');

      if (!regexName.test(mname.value)) {
        isValid = false;
        document.getElementById('mname_error').textContent = 'Invalid first medicine name!, Please enter valid medicine name it should contain only alphabets.!';
      } else {
        document.getElementById('mname_error').textContent = '';
      }

      if (!regexName.test(lname.value)) {
        isValid = false;
        document.getElementById('campuny_error').textContent = 'Invalid campuny!, Please enter valid campuny it should contain only alphabets.!';
      } else {
        document.getElementById('campuny_error').textContent = '';
      }

      if (!isValid) {
        e.preventDefault();
      }
    });

  </script>
</body>
</html>
