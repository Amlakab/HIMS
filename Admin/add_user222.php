<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctor Registration Form</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<script src="bootstrap/js/jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="shortcut icon" href="" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/user_form.css">
  <script src="js/validateForm.js"></script>
  <script src="js/restrict.js"></script>
</head>
<body>
  <div class="form-container">
    <form action="" method="post">
      <h2>Doctor Registration</h2>
      <div class="form-group">
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="fname" placeholder="Enter first name" required onblur="notNull(this.value, 'fname_error');">
        <code class="text-danger small font-weight-bold float-right" id="fname_error" style="display: none;"></code>

      </div>
      <div class="form-group">
        <label for="lname">Last Name</label>
        <input type="text" id="lname" name="lname" placeholder="Enter last name" required onblur="notNull(this.value, 'lname_error');">
        <code class="text-danger small font-weight-bold float-right" id="lname_error" style="display: none;"></code>

      </div>
      <div class="form-group">
        <label for="gender">Gender</label>
        <input type="text" id="gender" name="gender" placeholder="Enter gender" required >
        <code class="text-danger small font-weight-bold float-right" id="gender_error" style="display: none;"></code>

      </div>
      <div class="form-group">
        <label for="department">Department</label>
        <input type="text" id="department" name="department" placeholder="Enter  department " required >
        <code class="text-danger small font-weight-bold float-right" id="department_error" style="display: none;"></code>

      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter email" required >
        <code class="text-danger small font-weight-bold float-right" id="email_error" style="display: none;"></code>

      </div>
      <div class="form-group">
        <label for="mobile">Mobile</label>
        <input type="text" id="mobile" name="mobile" placeholder="Enter your mobile" required >
        <code class="text-danger small font-weight-bold float-right" id="mobile_error" style="display: none;"></code>

      </div>
      <div class="form-group">
        <label for="address">Address</label>
        <input type="text" id="address" name="address" placeholder="Enter address" required >
        <code class="text-danger small font-weight-bold float-right" id="address_error" style="display: none;"></code>

      </div>
      <div class="form-group">
        <label for="address">User Role</label>
        <select  name="role" id="role" value="<?php echo $status; ?>">
        <option>doctors</option>
        <option>nurses</option>
        <option>labratorists</option>
        <option>pharmacists</option>
        <option>accountants</option>
        <option>recieptionists</option>
        <option>employeers</option>
        <option selected>Choose</option>
        </select>
        <code class="text-danger small font-weight-bold float-right" id="address_error" style="display: none;"></code>

      </div>
      <div class="row">
        <div class="col-12 col-md-6">
        <button type="button" class="submit-btn" onclick="if (validateForm()) addUser();">Register</button>
      </div>
      <div class="col-12 col-md-6">
      <button type="reset" class="submit-btn" id="reset_button">Cancel</button>
      </div>
      </div>
    </form>
  </div>

<!-- <script>
  function addUser(){
   
  }
</script> -->
    


  
       <script>
              function validateForm() {
            let isValid = true;

            // Validate First Name
            isValid &= validateText("fname", "fname_error", "First Name is required and should contain only alphabets.", /^[a-zA-Z\s]+$/);

            // Validate Last Name
            isValid &= validateText("lname", "lname_error", "Last Name is required and should contain only alphabets.", /^[a-zA-Z\s]+$/);

            // Validate Gender
            isValid &= validateText("gender", "gender_error", "Gender is required. Use 'Male', 'Female', or 'Other'.", /^(Male|Female|Other)$/i);

            // Validate Department
            isValid &= validateText("department", "department_error", "Department is required.", /.+/);

            // Validate Email
            isValid &= validateText("email", "email_error", "Enter a valid email address.", /^[^\s@]+@[^\s@]+\.[^\s@]+$/);

            // Validate Mobile
            isValid &= validateText("mobile", "mobile_error", "Enter a valid 10-digit mobile number.", /^\d{10}$/);

            // Validate Address
            isValid &= validateText("address", "address_error", "Address is required.", /.+/);

            // Validate User Role
            isValid &= validateSelect("role", "role_error", "Please select a role.");

            return !!isValid; // Convert to boolean
          }

          // General Text Validation Function
          function validateText(fieldId, errorId, errorMessage, regex) {
            const value = document.getElementById(fieldId).value.trim();
            const errorElement = document.getElementById(errorId);
            if (!value.match(regex)) {
              errorElement.textContent = errorMessage;
              errorElement.style.display = "block";
              return false;
            } else {
              errorElement.style.display = "none";
              return true;
            }
          }

          // Validate Select Field
          function validateSelect(fieldId, errorId, errorMessage) {
            const value = document.getElementById(fieldId).value;
            const errorElement = document.getElementById(errorId);
            if (value === "Choose") {
              errorElement.textContent = errorMessage;
              errorElement.style.display = "block";
              return false;
            } else {
              errorElement.style.display = "none";
              return true;
            }
          }
          function addUser() {
  alert("fdgnbfng");
  document.getElementById("medicine_acknowledgement").innerHTML = "";
  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var gender = document.getElementById("gender");
  var department = document.getElementById("department");
  var email = document.getElementById("email");
  var mobile = document.getElementById("mobile");
  var address = document.getElementById("address");
  var role = document.getElementById("role");
 
    var xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
  		if(xhttp.readyState = 4 && xhttp.status == 200)
  			document.getElementById("medicine_acknowledgement").innerHTML = xhttp.responseText;
  	};
  	xhttp.open("GET", "add_new_user.php?action=update&id=" + id + "&fname=" + fname.value + "&lname=" + lname.value + "&gender=" + gender.value + "&department=" + department.value + "&email=" + email.value + "&mobile=" + mobile.value + "&address=" + address.value + "&role="+ role, true);
    xhttp.send();
}
     </script>
</body>
</html>
