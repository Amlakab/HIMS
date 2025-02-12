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
    <form>
      <h2>Patient Registration</h2>
      <div class="form-group">
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="fname" placeholder="Enter first name" required onblur="notNull(this.value, 'fname_error');">
        <code class="text-danger small font-weight-bold float-right" id="fname_error" style="display: none;"></code>

      </div>
      <div class="form-group">
        <label for="mname">Midle Name</label>
        <input type="text" id="mname" name="mname" placeholder="Enter midle name" required onblur="notNull(this.value, 'mname_error');">
        <code class="text-danger small font-weight-bold float-right" id="mname_error" style="display: none;"></code>

      </div>
      <div class="form-group">
        <label for="lname">Last Name</label>
        <input type="text" id="lname" name="lname" placeholder="Enter last name" required onblur="notNull(this.value, 'lname_error');">
        <code class="text-danger small font-weight-bold float-right" id="lname_error" style="display: none;"></code>

      </div>
      <div class="form-group">
        <label for="gender">Gender</label>
        <input type="text" id="gender" name="gender" placeholder="Enter gender" required onblur="notNull(this.value, 'gender_error');">
        <code class="text-danger small font-weight-bold float-right" id="gender_error" style="display: none;"></code>

      </div>
      <div class="form-group">
        <label for="age">Birthdate</label>
        <input type="text" id="birthdate" name="birthdate" placeholder="Enter  birthdate " required onblur="notNull(this.value, 'birthdate_error');">
        <code class="text-danger small font-weight-bold float-right" id="birthdate_error" style="display: none;"></code>

      </div>
      <div class="form-group">
        <label for="age">Age</label>
        <input type="number" id="age" name="age" placeholder="Enter  age " required onblur="notNull(this.value, 'age_error');">
        <code class="text-danger small font-weight-bold float-right" id="age_error" style="display: none;"></code>

      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter email" required onblur="notNull(this.value, 'email_error');">
        <code class="text-danger small font-weight-bold float-right" id="email_error" style="display: none;"></code>

      </div>
      <div class="form-group">
        <label for="address">Address</label>
        <input type="text" id="address" name="address" placeholder="Enter address" required onblur="notNull(this.value, 'address_error');">
        <code class="text-danger small font-weight-bold float-right" id="address_error" style="display: none;"></code>

      </div>
      <div class="form-group">
        <label for="address">Patient Type</label>
        <select  name="ptype" id="ptype">
        <option>Emergency</option>
        <option>Other</option>
        <option selected>Choose</option>
        </select>
        <code class="text-danger small font-weight-bold float-right" id="address_error" style="display: none;"></code>

      </div>
      <div class="row">
        <div class="col-12 col-md-6">
      <button type="submit" class="submit-btn" onclick="addUser();">Register</button>
      </div>
      <div class="col-12 col-md-6">
      <button type="reset" class="submit-btn" id="reset_button">Cancel</button>
      </div>
      </div>
    </form>
  </div>
</body>
</html>
