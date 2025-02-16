
<?php 
$pageTitle="Services";
include('includes/header.php');

if (isset($_GET['slug'])) {
    if ($_GET['slug']==null) {
        redirect('services.php','');
    }
}else{
    redirect('services.php','');

}

$slug=validate($_GET['slug']);
$service="SELECT * FROM services WHERE status='0' AND slug='$slug' LIMIT 1 ";
$result=mysqli_query($conn,$service); 

if (!$result) {
    redirect('services.php','');
}

//yuxaridaki url-ni slugdan goturur ve bizde slugi deyisende xeta vermemesi ucun evvelki sehiveye qaytaririq
if (mysqli_num_rows($result)==0) {
    redirect('services.php','');
}

$rowData=mysqli_fetch_assoc($result);
?>


<div class="py-5 bg-secondary">
    <div class="container">
        <h4 class="text-white text-center"> <?= $rowData['name'] ?></h4>
    </div>
</div>

<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-body shadow-sm">
                <h4><?= $rowData['name'] ?></h4>
                <div class="underline"></div>
                <p>
                    <?= $rowData['small_description'] ?>
                </p>
                <div class="mb-3">

                    <?php if($rowData['image'] != '') : ?>
                    <img src="admin/<?= $rowData['image']; ?>" class="w-100 rounded" alt="Img" 
                    />
                    <?php else: ?>
                        <img src="assets/images/no-img.jpg"  class="w-100 rounded"  alt="Img" 
                        />
                    <?php endif; ?>
                </div>
                <p><?= $rowData['long_description'] ?></p>
            </div>
            </div>
        </div>
    </div>
</div>




<?php include('includes/footer.php')
?>