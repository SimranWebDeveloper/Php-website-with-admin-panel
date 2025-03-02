<?php include('includes/header.php'); ?>

<div class="row">
    <div class="card">
        <div class="card-header">
            <h4>
                View Enquiries 
                <a href="enquiries.php" class="btn btn-danger btn-sm mb-0 float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">
        <?= alertMessage(); ?>
            <?php 
            // editlenecek id-ni tuturuq
                $paramResult=checkParamId('id');
                if(!is_numeric($paramResult)){
                    echo "<h5>.$paramResult</h5>";
                    return false;
                }

               $enquiry=getById('enquires',$paramResult);
               if ($enquiry) {
                ?>

               <table class="table table-bordered table-striped">
                   <tbody>

                       <tr >
                           <td width="30%">Enquiries Id</td>
                           <td><?=$enquiry['data']['id']; ?></td>
                       </tr>
                       <tr>
                           <td> Name</td>
                           <td><?=$enquiry['data']['name']; ?></td>
                       </tr>
                       <tr>
                           <td> Email</td>
                           <td><?=$enquiry['data']['email']; ?></td>
                       </tr>
                       <tr>
                           <td> Phone</td>
                           <td><?=$enquiry['data']['phone']; ?></td>
                       </tr>
                       <tr>
                           <td> Service</td>
                           <td><?=$enquiry['data']['service']; ?></td>
                       </tr>
                       <tr>
                           <td> Message</td>
                           <td><?=$enquiry['data']['message']; ?></td>
                       </tr>
                       <tr>
                           <td> Status</td>
                           <td><?=$enquiry['data']['status']; ?></td>
                       </tr>
                       <tr>
                           <td> Created At</td>
                           <td><?=$enquiry['data']['create_at']; ?></td>
                       </tr>
                   </tbody>
               </table>

               <div class="mt-3">
                <div class="card card-body border">
                    <form action="code.php" method="POST">
                        
                        <input type="hidden" name="enquiryId" value=<?=$enquiry['data']['id'];?> />

                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Update Statsus</label>
                                <select name="status" class="form-select">
                                    <option value="pending" 
                                        <?=$enquiry['data']['status']=='pending'?'selected':'';?> 
                                    >
                                        Pending
                                    </option>
                                    <option value="completed" 
                                        <?=$enquiry['data']['status']=='completed'?'selected':'';?>
                                    >
                                    Completed
                                </option>
                                    <option value="cancel" 
                                        <?=$enquiry['data']['status']=='cancel'?'selected':'';?>
                                    >
                                    Cancel
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-8">
                                <br>
                                <button type="submit" name="updateEnquiryStatus" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
               </div>

               <?php
               } 
               else{
                echo "<h5>No Record Found</h5>";
               }
            ?>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
