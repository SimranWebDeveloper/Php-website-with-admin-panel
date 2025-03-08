<?php include('includes/header.php'); ?>

<div class="row">

    <div class="col-md-12">

        <?= alertMessage()?>
    </div>
    
    <div class="col-md-3 mb-4">
        <div class="card card-body p-3">
            <p class=" text-sm   mb-0 text-capitalize font-weight-bold">Total Users</p>
            <h5 class=" font-weight-bolder mb-0"> 
                <?=getCount('users'); ?>    
            </h5>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card card-body p-3">
            <p class=" text-sm   mb-0 text-capitalize font-weight-bold">Total Services</p>
            <h5 class=" font-weight-bolder mb-0"> 
                <?=getCount('services'); ?>    
            </h5>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card card-body p-3">
            <p class=" text-sm   mb-0 text-capitalize font-weight-bold">Total Social Media</p>
            <h5 class=" font-weight-bolder mb-0">
                <?=getCount('social_medias'); ?>
            </h5>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card card-body p-3">
            <p class=" text-sm   mb-0 text-capitalize font-weight-bold">Total Enquires</p>
            <h5 class=" font-weight-bolder mb-0">
                <?=getCount('enquires'); ?>
            </h5>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card card-body p-3">
            <p class=" text-sm   mb-0 text-capitalize font-weight-bold">Today  Enquires</p>
            <h5 class=" font-weight-bolder mb-0">
                <?php
                    $todayDate=date('Y-m-d');
                    $query="SELECT * FROM enquires WHERE create_at='$todayDate'";
                    $result=mysqli_query($conn,$query);
                    $totalCount=mysqli_num_rows($result);
                    echo $totalCount;
                ?>
            </h5>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card card-body p-3">
            <p class=" text-sm   mb-0 text-capitalize font-weight-bold">Total Completed Enquires</p>
            <h5 class=" font-weight-bolder mb-0">
                <?php
                    $todayDate=date('Y-m-d');
                    $query="SELECT * FROM enquires WHERE status='completed'";
                    $result=mysqli_query($conn,$query);
                    $totalCount=mysqli_num_rows($result);
                    echo $totalCount;
                ?>
            </h5>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card card-body p-3">
            <p class=" text-sm   mb-0 text-capitalize font-weight-bold">Total Cancelled Enquires</p>
            <h5 class=" font-weight-bolder mb-0">
                <?php
                    $todayDate=date('Y-m-d');
                    $query="SELECT * FROM enquires WHERE status='cancel'";
                    $result=mysqli_query($conn,$query);
                    $totalCount=mysqli_num_rows($result);
                    echo $totalCount;
                ?>
            </h5>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>