<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" href="./styling/style.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>
<body>
  <div class="login">
  <div class="login_form">
    <!-- Login form container -->
    <form id="loginForm">

<!-- Email input box -->
<div class="input_box">
  <label for="email">Email</label>
  <input type="text" id="email" placeholder="Enter email address" required />
</div>

<!-- Password input box -->
<div class="input_box">
  <div class="password_title">
    <label for="password">Password</label>
    <a href="#">Forgot Password? </a>
  </div>
  <input type="password" id="password" placeholder="Enter your password" required />
</div>

<!-- Login button -->
<button type="submit">Login</button>
</form>

    <!-- Message container to show errors or success -->
    <div id="message"></div>
  </div>
  </div>
  <script src="./script.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</body>
</html>
