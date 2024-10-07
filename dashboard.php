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
  <link rel="stylesheet" href="./styling/standard.css">
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

  <div class="navbar">
    <div class="wrap-right">
        <div class="flex justify-space-between ">
          <div class="flex align-center ">
            <div class="p-r-10 m-t-7">
              <svg xmlns="http://www.w3.org/2000/svg" height="25px" viewBox="0 -960 960 960" width="25px" fill="#4f52ba"><path d="M796-121 533-384q-30 26-69.96 40.5Q423.08-329 378-329q-108.16 0-183.08-75Q120-479 120-585t75-181q75-75 181.5-75t181 75Q632-691 632-584.85 632-542 618-502q-14 40-42 75l264 262-44 44ZM377-389q81.25 0 138.13-57.5Q572-504 572-585t-56.87-138.5Q458.25-781 377-781q-82.08 0-139.54 57.5Q180-666 180-585t57.46 138.5Q294.92-389 377-389Z"/></svg>
            </div> 
            <div>
              Search
            </div>
          </div>
          <div class="navbar-border p-l-40 p-r-40 p-t-20 p-b-20">
            <div class="flex">
              <div class="flex align-center p-r-10">
                <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#4f52ba"><path d="M222-255q63-44 125-67.5T480-346q71 0 133.5 23.5T739-255q44-54 62.5-109T820-480q0-145-97.5-242.5T480-820q-145 0-242.5 97.5T140-480q0 61 19 116t63 109Zm257.81-195q-57.81 0-97.31-39.69-39.5-39.68-39.5-97.5 0-57.81 39.69-97.31 39.68-39.5 97.5-39.5 57.81 0 97.31 39.69 39.5 39.68 39.5 97.5 0 57.81-39.69 97.31-39.68 39.5-97.5 39.5Zm.66 370Q398-80 325-111.5t-127.5-86q-54.5-54.5-86-127.27Q80-397.53 80-480.27 80-563 111.5-635.5q31.5-72.5 86-127t127.27-86q72.76-31.5 155.5-31.5 82.73 0 155.23 31.5 72.5 31.5 127 86t86 127.03q31.5 72.53 31.5 155T848.5-325q-31.5 73-86 127.5t-127.03 86Q562.94-80 480.47-80Zm-.47-60q55 0 107.5-16T691-212q-51-36-104-55t-107-19q-54 0-107 19t-104 55q51 40 103.5 56T480-140Zm0-370q34 0 55.5-21.5T557-587q0-34-21.5-55.5T480-664q-34 0-55.5 21.5T403-587q0 34 21.5 55.5T480-510Zm0-77Zm0 374Z"/></svg>
              </div>
              <div>
                <div class="title profile">
                  Gerwin de Heus
                </div>
                <div class="description">
                  Admin
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>

  <div class="dashboard p-t-40 p-b-40">
    <div class="wrap-right">
      <div class="title"><strong><h2>Dashboard</h2></strong></div>
      <div class="p-t-10">
        <div class="welcome">

        </div>
      </div>
    </div>
  </div>

  <div class="activities">
    <div class="wrap-right">
      <div class="row">
        <div class="col3">
          <div class="card p-t-50 p-b-50 p-l-30">
            <div class="user flex">
              <div class="user-img">
                <svg xmlns="http://www.w3.org/2000/svg" height="70px" width="70px" viewBox="0 -960 960 960" width="48px" fill="#161a2d"><path d="M480-481q-66 0-108-42t-42-108q0-66 42-108t108-42q66 0 108 42t42 108q0 66-42 108t-108 42ZM160-160v-94q0-38 19-65t49-41q67-30 128.5-45T480-420q62 0 123 15.5t127.92 44.69q31.3 14.13 50.19 40.97Q800-292 800-254v94H160Zm60-60h520v-34q0-16-9.5-30.5T707-306q-64-31-117-42.5T480-360q-57 0-111 11.5T252-306q-14 7-23 21.5t-9 30.5v34Zm260-321q39 0 64.5-25.5T570-631q0-39-25.5-64.5T480-721q-39 0-64.5 25.5T390-631q0 39 25.5 64.5T480-541Zm0-90Zm0 411Z"/></svg>
              </div>
              <div class="p-l-20 flex direction-c justify-center">
                <div>
                  Aantal gebruikers
                </div>
                <div>
                  <strong>1</strong>
                </div>
              </div>
              </div>
          </div>
        </div>
        <div class="col3">
          <div class="card p-t-50 p-b-50 p-l-30">
            <div class="user flex">
              <div class="memory-img">
              <svg xmlns="http://www.w3.org/2000/svg" height="70px" viewBox="0 -960 960 960" width="70px" fill="#161a2d"><path d="M377-377v-205h205v205H377Zm60-60h85v-85h-85v85Zm-77 317v-80H260q-24 0-42-18t-18-42v-100h-80v-60h80v-124h-80v-60h80v-100q0-24 18-42t42-18h100v-76h60v76h124v-76h60v76h100q24 0 42 18t18 42v100h76v60h-76v124h76v60h-76v100q0 24-18 42t-42 18H604v80h-60v-80H420v80h-60Zm344-140v-444H260v444h444ZM480-480Z"/></svg>
              </div>
              <div class="p-l-20 flex direction-c justify-center">
                <div>
                  Memory aantal
                </div>
                <div>
                  <strong>10</strong>
                </div>
              </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="questions p-t-60">
    <div class="wrap-right">
      <div class="flex">
        <div class="p-r-30">
          <div class="left">
            <div class="p-t-50 p-b-50 p-l-30">
              test
            </div>
          </div>
        </div>
        <div class="p-l-30">
          <div>
            <div class="left">
              <div class="p-t-50 p-b-50 p-l-30">
                test
              </div>
            </div>
            <div class="p-t-60">
              <div class="left">
                <div class="p-t-50 p-b-50 p-l-30">
                  test
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
<script src="./script.js"></script>
<style>
  table, th, td {
  border:1px solid black;
}
</style>
</html>