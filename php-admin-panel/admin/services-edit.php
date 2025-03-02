<?php include('includes/header.php'); ?>

<div class="row">
    <div class="card">
        <div class="card-header">
            <h4>
                Edit Services
                <a href="services.php" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">
            <?= alertMessage() ?>

            <!-- enctype="multipart/form-data"  - image icin yazilib -->
            <form action="code.php" method="POST" enctype="multipart/form-data">
            <?php
                // checkParamId -> id-nin olub olmadigini yoxlayir
                // Burdaki id-ni biz social-media.php sehivesinde 'Edit' duymesine basanda gonderirik
                $paramResult=checkParamId('id');
                if(!is_numeric($paramResult)){
                    echo "<h5>.$paramResult</h5>";
                    return false;
                }
        
                $service=getById('services',$paramResult);
                if ($service) {
                    if ($service['status']==200) {
                        ?>

                        <input type="hidden" name="serviceId" value=<?=$service['data']['id'];?> />
                        
                            <div class="mb-3">
                                <label for="">Services Name</label>
                                <input type="text" name="name" required class="form-control" value=<?=$service['data']['name'];?> />
                            </div>
                            <div class="mb-3">
                                <label for="">Small Description</label>
                            
                                <textarea name="small_description" required class="form-control"> <?=$service['data']['small_description'];?> </textarea>
                            </div>
                            <div class="mb-3">
                                <label for="">Long Description</label>
                                <textarea  name="long_description" required class="form-control mySummernote"><?=$service['data']['long_description'];?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="">Upload Image</label>
                                <input type="file" name="image"  class="form-control"  />
                                <img src="<?=$service['data']['image'];?>"  alt="<?=$service['data']['name'];?>" style="width: 70px;height: 70px;">
                            </div>

                            <h5>SEO Tags</h5>
                            <div class="mb-3">
                                <label for="">Meta Title</label>
                                <input type="text" name="meta_title" required class="form-control" value=<?=$service['data']['meta_title'];?> />
                            </div>
                            <div class="mb-3">
                                <label for="">Meta Description</label>
                                <textarea  name="meta_description" required class="form-control "><?=$service['data']['meta_description'];?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="">Meta Keyword</label>
                                <textarea name="meta_keyword" required class="form-control"> <?= $service['data']['meta_keyword']; ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="">Status (checked=hidden, un-check=visible)</label>
                                <br>
                                <input type="checkbox" name="status"  style="width: 30px;height: 30px;"  <?=$service['data']['status']==1 ? "checked": "";?>>
                            </div>



                            <div class="mb-3 text-end">
                                <button type="submit" class="btn btn-primary" name="updateService">Update Service</button>
                            </div>

                        <?php
                    }
                    else{
                        echo '<h5>No Such Data Found!</h5>';
                    }
                }
                else{
                    
                    echo '<h5>Something Went Wrong!</h5>';
                }
                
            ?>

            </form>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>o