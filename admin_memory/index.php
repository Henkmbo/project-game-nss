<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memory</title>
    <link rel="stylesheet" href="../styling/style.css" />
    <link rel="stylesheet" href="../styling/standard.css">
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
<aside class="sidebar">
    <ul class="sidebar-links">
      <li>
        <a href="#">
          <span class="material-symbols-outlined">Home </span>Home</a>
      </li>
      <li>
        <a href="./admin_memory/index.php"><span class="material-symbols-outlined">Memory </span>Memory</a>
      </li>
      <li>
        <a href="#"><span class="material-symbols-outlined"> monitoring </span>Backend developer</a>
      </li>     
      <h4>
        <div class="menu-separator"></div>
      </h4>
      <li>
        <a href="#"><span class="material-symbols-outlined"> account_circle </span>Profile</a>
      </li>
      <li>
        <a href="#"><span class="material-symbols-outlined"> settings </span>Settings</a>
      </li>
      <li>
        <a onclick="logOut()"><span class="material-symbols-outlined"> logout </span>Logout</a>
      </li>
    </ul>
  </aside>
  <div class="wrap-right" >
        <h1 class="text-center">Memory Cards</h1>
        <table>
  <thead>
    <tr>
      <th>Questions</th>
      <th>Answers</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody id="questions">
  </tbody>
</table>
  </div>
  
<style>
    td, th {
  border: 1px solid #dddddd;
  padding: 8px;
}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
tr:nth-child(even) {
  background-color: #dddddd;
}

</style>
</body>
<script src="../script.js"></script>
</html>
