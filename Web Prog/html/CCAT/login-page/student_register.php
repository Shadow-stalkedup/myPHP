<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = $_POST['full_name'];
    $student_id = $_POST['student_id'];
    $registration_number = $_POST['registration_number'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];
    $semester = $_POST['semester'];
    $present_address = $_POST['present_address'];
    $permanent_address = $_POST['permanent_address'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $image = '';
    if (!empty($_FILES['image']['name'])) {
        $target_dir = "uploads/students/";
        if (!is_dir($target_dir)) mkdir($target_dir, 0777, true);
        $image = $target_dir . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES["image"]["tmp_name"], $image);
    }

    $sql = "INSERT INTO students (full_name, student_id, registration_number, email, phone, department, semester, present_address, permanent_address, password, image)
            VALUES ('$full_name', '$student_id', '$registration_number', '$email', '$phone', '$department', '$semester', '$present_address', '$permanent_address', '$password', '$image')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Registration successful! Please login.'); window.location='student_login.php';</script>";
    } else {
        echo "<script>alert('Error: Email or Student ID already exists!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Student Registration</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body { background-color: #f4f6f9; font-family: 'Poppins', sans-serif; }
.form-container {
  background: #fff;
  border-radius: 15px;
  box-shadow: 0 4px 20px rgba(0,0,0,0.1);
  max-width: 700px;
  margin: 40px auto;
  padding: 35px;
}
.image-preview {
  margin-top: 10px;
  max-height: 180px;
  border-radius: 10px;
}
</style>
</head>
<body>

<div class="form-container">
  <h3 class="text-center mb-4">🎓 Student Registration</h3>
  <form method="POST" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-6 mb-3">
        <label>Full Name</label>
        <input type="text" name="full_name" class="form-control" required>
      </div>
      <div class="col-md-6 mb-3">
        <label>Student ID</label>
        <input type="text" name="student_id" class="form-control" required>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 mb-3">
        <label>Registration Number</label>
        <input type="text" name="registration_number" class="form-control" required>
      </div>
      <div class="col-md-6 mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 mb-3">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control" required>
      </div>
      <div class="col-md-6 mb-3">
        <label>Department</label>
        <input type="text" name="department" class="form-control" required>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 mb-3">
        <label>Semester</label>
        <input type="text" name="semester" class="form-control" required>
      </div>
      <div class="col-md-6 mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 mb-3">
      <label>Gender:</label>
      
      <input type="radio" name="gen" value="M">Male
      <input type="radio" name="gen" value="F">Female
    </div>
    <div class="col-md-6 mb-3">
  Date of birth:
  <input type="date" name="birth">
</div>
</div>



    <div class="mb-3">
      <label>Present Address</label>
      <textarea name="present_address" class="form-control" rows="2" required></textarea>
    </div>

    <div class="mb-3">
      <label>Permanent Address</label>
      <textarea name="permanent_address" class="form-control" rows="2" required></textarea>
    </div>

    <div class="mb-3">
      <label>Profile Image</label>
      <input type="file" name="image" class="form-control" accept="image/*" onchange="previewImage(event)">
      <img id="preview" class="image-preview img-fluid mt-2" alt="">
    </div>

    <button type="submit" class="btn btn-primary w-100">Register</button>
    <p class="text-center mt-3">Already have an account? <a href="student_login.php">Login</a></p>
  </form>
</div>

<script>
function previewImage(event) {
  const output = document.getElementById('preview');
  output.src = URL.createObjectURL(event.target.files[0]);
}
</script>

</body>
</html>
