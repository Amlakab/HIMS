function deleteUser(id,role) {
  var confirmation = confirm("Are you sure?");
  if(confirmation) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if(xhttp.readyState = 4 && xhttp.status == 200)
        document.getElementById('user_div').innerHTML = xhttp.responseText;
    };
    xhttp.open("GET", "manage_user.php?action=delete&id=" + id + "&role="+ role, true);
    xhttp.send();
  }
}

function editUser(id,role) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if(xhttp.readyState = 4 && xhttp.status == 200)
      document.getElementById('user_div').innerHTML = xhttp.responseText;
  };
  xhttp.open("GET", "manage_user.php?action=edit&id=" + id+ "&role="+ role, true);
  xhttp.send();
}

function updateUser(id,role) {
  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var gender = document.getElementById("gender");
  var department = document.getElementById("department");
  var email = document.getElementById("email");
  var mobile = document.getElementById("mobile");
  var address = document.getElementById("address");

  if(!notNull(fname.value, "fname_error"))
    fname.focus();
  else if(!notNull(lname.value, "lname_error"))
    lname.focus();
  else if(!notNull(gender.value, "gender_error"))
    gender.focus();
  else if(!notNull(department.value, "department_error"))
    department.focus();
  else if(!notNull(email.value, "email_error"))
    email.focus();
  else if(!notNull(mobile.value, "mobile_error"))
    mobile.focus();
  else if(!notNull(address.value, "address_error"))
    address.focus();
  else {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if(xhttp.readyState = 4 && xhttp.status == 200)
        document.getElementById('user_div').innerHTML = xhttp.responseText;
    };
    xhttp.open("GET", "manage_user.php?action=update&id=" + id + "&fname=" + fname.value + "&lname=" + lname.value + "&gender=" + gender.value + "&department=" + department.value + "&email=" + email.value + "&mobile=" + mobile.value + "&address=" + address.value + "&role="+ role, true);
    xhttp.send();
  }
}

function cancel() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if(xhttp.readyState = 4 && xhttp.status == 200)
      document.getElementById('medicines_div').innerHTML = xhttp.responseText;
  };
  xhttp.open("GET", "manage_user.php?action=cancel", true);
  xhttp.send();
}

function searchMedicine(text, tag , role ) {
  if(tag == "fname") {
    document.getElementById("by_lname").value = "";
    document.getElementById("by_id").value = "";
  }
  if(tag == "lname") {
    document.getElementById("by_fname").value = "";
    document.getElementById("by_id").value = "";
  }
  if(tag == "id") {
    document.getElementById("by_fname").value = "";
    document.getElementById("by_lname").value = "";
  }

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if(xhttp.readyState = 4 && xhttp.status == 200)
      document.getElementById('user_div').innerHTML = xhttp.responseText;
  };
  xhttp.open("GET", "manage_user.php?action=search&text=" + text + "&tag=" + tag +"&role=" + role, true);
  xhttp.send();
}
