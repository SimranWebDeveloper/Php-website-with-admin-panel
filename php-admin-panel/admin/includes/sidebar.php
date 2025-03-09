  
<!-- $_SERVER['SCRIPT_NAME'];  -butun sehiveni url-sini verir -->

<!-- strrpos($_SERVER['SCRIPT_NAME'], "/")
    Bu fonksiyon, dosya yolundaki son / karakterinin konumunu bulur. Böylece dosya adının nerede başladığını belirler. -->

<!-- substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1)
substr fonksiyonu, bulduğu konumun hemen sonrasından itibaren kalan metni (yani dosya adını) alır.
Bura /-dan basladigina gore +1 yaziriq ki /-dan sonrasini alsin
-->
<?php
$pageName= substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'],"/") +1);
?>

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" index.php">
        <h4>Funda Services</h4>
      </a>
    </div>

    <hr class="horizontal dark mt-0">

    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link  <?= $pageName=='index.php' ? 'active':''; ?>" href="index.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa fa-home   text-lg  <?= $pageName=='index.php' ? 'text-white':'text-dark'; ?> "></i>
                
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>

        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Enquiries</h6>
        </li>

        <li class="nav-item">
          <a class="nav-link  <?= $pageName=='enquiries.php' ? 'active':''; ?>" href="enquiries.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white  text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa fa-bullhorn  text-lg <?= $pageName=='enquiries.php' ? 'text-white':'text-dark'; ?>"></i>
            </div>
            <span class="nav-link-text ms-1">Enquiries</span>
          </a>
        </li>

        
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Manage Services</h6>
        </li>

        <li class="nav-item">
          <a class="nav-link  
          <?= $pageName=='services.php' ? 'active':''; ?>
          <?= $pageName=='services-create.php' ? 'active':''; ?>
          <?= $pageName=='services-edit.php' ? 'active':''; ?>
          
          " 
          href="services.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white  text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa fa-cogs text-lg <?= $pageName=='services.php' ? 'text-white':'text-dark'; ?> "></i>
            </div>
            <span class="nav-link-text ms-1">Services</span>
          </a>
        </li>


        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Site Managment</h6>
        </li>

        <li class="nav-item">
          <a class="nav-link  
          <?= $pageName=='users.php' ? 'active':''; ?>
          <?= $pageName=='users-create.php' ? 'active':''; ?>
          <?= $pageName=='users-edit.php' ? 'active':''; ?>
          
          " href="users.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white  text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa fa-user-plus text-lg <?= $pageName=='users.php' ? 'text-white':'text-dark'; ?>"></i>
            </div>
            <span class="nav-link-text ms-1">Admin / Users</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link  
          <?= $pageName=='social-media.php' ? 'active':''; ?>
          <?= $pageName=='social-media-create.php' ? 'active':''; ?>
          <?= $pageName=='social-media-edit.php' ? 'active':''; ?>
          " href="social-media.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white  text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa fa-globe text-lg <?= $pageName=='social-media.php' ? 'text-white':'text-dark'; ?>"></i>
            </div>
            <span class="nav-link-text ms-1">Social Media</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link  <?= $pageName=='settings.php' ? 'active':''; ?>" href="settings.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white  text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa fa-globe text-lg <?= $pageName=='settings.php' ? 'text-white':'text-dark'; ?>"></i>
            </div>
            <span class="nav-link-text ms-1">Settings</span>
          </a>
        </li>






      </ul>
    </div>
    <div class="sidenav-footer mx-3 ">
            <a class="btn btn-primary mt-3 w-100" href="logout.php">Logout</a>
    </div>
  </aside>