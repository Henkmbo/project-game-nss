<!DOCTYPE html>
<!-- Source Codes By CodingNepal - www.codingnepalweb.com -->
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Form in HTML and CSS | CodingNepal</title>
  <link rel="stylesheet" href="./login.css" />
</head>
<body>
  <div class="login_form">
    <!-- Login form container -->
    <form action="#">

      <!-- Email input box -->
      <div class="input_box">
        <label for="email">Email</label>
        <input type="email" id="email" placeholder="Enter email address" required />
      </div>

      <!-- Paswwrod input box -->
      <div class="input_box">
        <div class="password_title">
          <label for="password">Password</label>
          <a href="#">Forgot Password?</a>
        </div>

        <input type="password" id="password" placeholder="Enter your password" required />
      </div>

       <!-- Login button -->
      <button type="submit">Log In</button>
    </form>
  </div>
</body>
</html>