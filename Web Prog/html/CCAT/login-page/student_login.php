<?php
include('db.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM students WHERE email='$email'");
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['student_id'] = $user['id'];
        $_SESSION['student_name'] = $user['full_name'];
        header("Location: student_profile.php");
        exit;
    } else {
        echo "<script>alert('Invalid credentials!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Student Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body { background-color: #f4f6f9; font-family: 'Poppins', sans-serif; }
.form-container { background: #fff; border-radius: 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.1);
max-width: 450px; margin: 80px auto; padding: 35px; }
</style>
</head>
<body>

<div class="form-container">
  <h3 class="text-center mb-4">🔑 Student Login</h3>
  <form method="POST">
    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Password</label>
      <input type="password" name="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary w-100">Login</button>
    <p class="text-center mt-3">New user? <a href="student_register.php">Register</a></p>
  </form>
</div>

</body>
</html>
