
<?php 
$pageTitle="Home";
include('includes/header.php')
?>

<div class="container">
    <?= alertMessage()?>
    <h4>Home Page</h4>
</div>

<div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/images/slider-1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="assets/images/slider-2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="assets/images/slider-3.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button> 
</div>


<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h4>Wellcome to <?=webSetting('title') ;?></h4>
                <div class="underline mx-auto"></div>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum perferendis aperiam explicabo eligendi voluptate aspernatur eaque culpa, consequatur veniam iusto impedit quibusdam. Impedit libero quidem tempore ex error officiis voluptate.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum perferendis aperiam explicabo eligendi voluptate aspernatur eaque culpa, consequatur veniam iusto impedit quibusdam. Impedit libero quidem tempore ex error officiis voluptate.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="py-5 bg-light">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="col-md-12 text-center">
                    <h4>Our Services</h4>
                    <div class="underline mx-auto"></div>
                </div>
            </div>

        <?php
                $serviceQuery="SELECT * FROM services WHERE status='0' LIMIT 6";
                $result=mysqli_query($conn,$serviceQuery);

                if ($result) {
                    if (mysqli_num_rows($result)>0) {
                        
                        foreach ($result as $row) {
                            ?>
                                <div class="col-md-4 mb-3">
                                    <div class="card shadow">
                                        <?php if ($row['image'] !=''):?>
                                            <img src="admin/<?= $row['image'] ?>" class="w-100 rounded" alt="Img" style="min-height: 200px;max-height:200px;" />
                                            <?php else :?>
                                            <img src="assets/images/no-img.jpg" class="w-100 rounded" alt="Img" style="min-height: 200px;max-height:200px;" />
                                        <?php endif;?>

                                        <div class="card-body">
                                            <h5><?=$row['name'] ?></h5>
                                            <p><?=$row['small_description'] ?></p>
                                            <div>
                                                <a href="service.php?slug=<?=$row['slug']?>" class="text-primary">read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }
                    }else{
                        ?>
                        <div class="col-md-3 mb-3">
                            <h5>No Service Avilable! </h5>
                        </div>
                        <?php
                    }
                }else{
                    ?>
                    <div class="col-md-3 mb-3">
                        <h5>Something Went Wrong! </h5>
                    </div>
                    <?php
                }
            ?>
        </div>
    </div>
</div>



<?php include('includes/footer.php')
?>