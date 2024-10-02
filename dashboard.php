<!DOCTYPE html>
<!-- Coding By CodingNepal - www.codingnepalweb.com -->
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>
  <!-- Linking Google Font Link For Icons -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="./styling/style.css" />
</head>
<body>
  <aside class="sidebar">
    <ul class="sidebar-links">
      <li>
        <a href="#">
          <span class="material-symbols-outlined">Home </span>Home</a>
      </li>
      <li>
        <a href="#"><span class="material-symbols-outlined">Memory </span>Memory</a>
      </li>
      <li>
        <a href="#"><span class="material-symbols-outlined"> monitoring </span>Backend developer</a>
      </li>     
      <h4>
        <span>Account</span>
        <div class="menu-separator"></div>
      </h4>
      <li>
        <a href="#"><span class="material-symbols-outlined"> account_circle </span>Profile</a>
      </li>
      <li>
        <a href="#"><span class="material-symbols-outlined"> settings </span>Settings</a>
      </li>
      <li>
        <a href="./index.html"><span class="material-symbols-outlined"> logout </span>Logout</a>
      </li>
    </ul>
  </aside>
  <table style="width:65%">
  <tr>
    <th>Company</th>
    <th>Contact</th>
    <th>Country</th>
  </tr>
  <tr>
    <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Centro comercial Moctezuma</td>
    <td>Francisco Chang</td>
    <td>Mexico</td>
  </tr>
</table>

</body>
<style>
  table, th, td {
  border:1px solid black;
}
</style>
</html>