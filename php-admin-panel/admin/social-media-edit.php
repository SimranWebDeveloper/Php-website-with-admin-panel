<?php include('includes/header.php'); ?>

<div class="row">
    <div class="card">
        <div class="card-header">
            <h4>
                Edit Social Media
                <a href="social-media.php" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">
            <?= alertMessage() ?>
            <form action="code.php" method="POST">

                <?php
                    // checkParamId -> id-nin olub olmadigini yoxlayir
                    // Burdaki id-ni biz social-media.php sehivesinde 'Edit' duymesine basanda gonderirik
                $paramResult=checkParamId('id');
                    if(!is_numeric($paramResult)){
                        echo "<h5>.$paramResult</h5>";
                        return false;
                    }
                    else{
                        $socialMedia=getById('social_medias',$paramResult);
                        if ($socialMedia['status']==200) {
                            ?>
                                <input type="hidden" name="socialMedialId" value="<?=$socialMedia['data']['id'] ?>">
                                <div class="mb-3">
                                    <label for="">Social Media Name</label>
                                    <input type="text" value="<?=$socialMedia['data']['name']  ?>" name="name" required class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="">Social Media URL/Link</label>
                                    <input type="text" value="<?=$socialMedia['data']['url']  ?>" name="url" required class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="">Status</label>
                                    <br>
                                    <input type="checkbox" <?=$socialMedia['data']['status']==1 ? "checked":""?>   name="status"  style="width: 30px;height: 30px;">
                                </div>
                    
                                <div class="mb-3 text-end">
                                    <button type="submit" class="btn btn-primary" name="updateSocialMedia">Update</button>
                                </div>

                            <?php
                        }
                        else{
                            echo  '<h5>'.$socialMedia['message'].'</h5>';
                        }

                    }

                ?>

            </form>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>o