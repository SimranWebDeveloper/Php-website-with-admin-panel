<div class="sticky-top">
  <div class="bg-primary py-2">

    <div class="container">
      <div class="row">
        <div class="col-md-6 text-white">
          Email: <?= webSetting('email1') ?? "";?>
          Phone:  <?= webSetting('phone1') ?? "";?>
        </div>
        <div class="col-md-6">
          Social Media :
        </div>
      </div>
    </div>
  </div>

  <nav class="navbar navbar-expand-lg bg-white sticky-top shadow">
    <div class="container">
  
      <a class="navbar-brand" href="#"><?= webSetting('title') ?? "Website";?></a>
  
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link " href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about-us.php">About us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="services.php">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact-us.php">Contact us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>
