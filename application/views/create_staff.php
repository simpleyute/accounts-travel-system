<?php include("inc/header.php"); ?>
<br>
<br>
<?php // testarray($upkeep); ?>


<div class="error_holder"><?=validation_errors()?></div>
<?php if($msg = $this->session->flashdata('message')):?>
        <div class="row ">
            <div class ="col-md-6">
                <divv class="alert alert-dismissable alert-danger">
                     <?php echo $msg; ?>    
                    </divv
            </div>       
        </div>
    <?php endif; ?>


        <?php echo form_open('staff/staff_submit') ?>
        <div class="row">
        <h4 > Enter Officer Details : </h4>
                <div class="col-md-4 col-md-offset-4">
                       
            
                        <div class="form-group">
                        <label for="" class=" form-label"> First Name </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control-lg" name="firstname" value="<?php echo set_value('firstname') ?>" placeholder="">
                            </div>
                        </div>
                
                    <div class="form-group">
                    <label for="" class="form-label"> Last Name </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control-lg" name="lastname" value="<?php echo set_value('lastname') ?>" placeholder="">
                        </div>
                    </div>
                
                    <div class="form-group">
                    <label for="" class="form-label"> Post Title </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control-lg" name="post_title" value="<?php echo set_value('post_title') ?>" placeholder="">
                        </div>
                    </div>
                
                    <div class="form-group">
                    <label for="" class="form-label"> Tax Registration Number (TRN)</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-lg" name="trn" value="<?php echo set_value('trn') ?>" placeholder="">
                        </div>
                    </div>

                    <div class="form-group ">
                    <div class="col-sm-10">
                    <label for="" class="form-label"> Location of Officer </label>
                    <label for="inputState"></label>
                    <select  class="form-control-lg" name="location_id">
                       <option value="0"  >Choose Location..</option>
                       <option value="1" <?php if(isset($_POST['location_id']) && $_POST['location_id']==1) echo ' selected';?> >Court Administration Division </option>
                       <option value="2" <?php if(isset($_POST['location_id']) && $_POST['location_id']==2) echo ' selected';?> >Supreme Court </option>
                       <option value="3" <?php if(isset($_POST['location_id']) && $_POST['location_id']==3) echo ' selected';?> >Parish Court </option>
                       <option value="4" <?php if(isset($_POST['location_id']) && $_POST['location_id']==4) echo ' selected';?> >Court of Appeal </option>
                    
                    
                        <?php /* if(count($location)):?>
                        <?php foreach($location as $x):?>
                        <option value=<?php echo $x->location_id?>>
                        <?php echo $x->location_name?></option>
                        <?php endforeach;?>
                        <?php endif; */?>
                    </select>
                    </div>
                    </div>

                    <div class="form-group ">
                    <div class="col-sm-10">
                    <label for="" class="form-label"> Type of Officer </label>
                    <label for="inputState"></label>
                    <select  class="form-control-lg" name="officer_id">
                    <option value="">Choose Type of Officer..</option>
                    <option value="1" <?php if(isset($_POST['officer_id']) && $_POST['officer_id']==1) echo ' selected';?> >Travelling Officer </option>
                    <option value="2" <?php if(isset($_POST['officer_id']) && $_POST['officer_id']==2) echo ' selected';?> >Casual Officer </option>
                    
                        <?php /* if(count($officers)):?>
                        <?php foreach($officers as $o):?>
                        <option value=<?php echo $o->officer_id?>>
                        <?php echo $o->officer_name?></option>
                        <?php endforeach;?>
                        <?php endif; */?>
                    </select>
                    </div>
                    </div>
                        

                    <div class="form-group ">
                    <div class="col-sm-10">
                    <label for="" class="form-label"> Type of Upkeep </label>
                    <label for="inputState"></label>
                    <select  class="form-control-lg" name="upkeep_id">
                    <option value="">Choose The Type of Upkeep Received ..</option>
                    <option value="1" <?php if(isset($_POST['upkeep_id']) && $_POST['upkeep_id']==1) echo ' selected';?> >Fixed Upkeep Allowance </option>
                    <option value="2" <?php if(isset($_POST['upkeep_id']) && $_POST['upkeep_id']==2) echo ' selected';?> >Fixed Walkfoot Allowance </option>
                    <option value="3" <?php if(isset($_POST['upkeep_id']) && $_POST['upkeep_id']==3) echo ' selected';?> >Judges(Partially Owned) </option>
                    <option value="4" <?php if(isset($_POST['upkeep_id']) && $_POST['upkeep_id']==4) echo ' selected';?> >(Judges) Other Partially Owned Vehicle</option>
                    <option value="5" <?php if(isset($_POST['upkeep_id']) && $_POST['upkeep_id']==5) echo ' selected';?> >Commuted Allowance</option>
                    <option value="6" <?php if(isset($_POST['upkeep_id']) && $_POST['upkeep_id']==6) echo ' selected';?> >Commuted Walkfoot Allowance </option>
                    <option value="7" <?php if(isset($_POST['upkeep_id']) && $_POST['upkeep_id']==7) echo ' selected';?> >Full Allowance </option>
                    <option value="8" <?php if(isset($_POST['upkeep_id']) && $_POST['upkeep_id']==8) echo ' selected';?> >Walkfoot Allowance </option>
                    
                        <?php /* if(count($upkeep)):?>
                        <?php foreach($upkeep as $row):?>
                        <option value=<?php echo $row->upkeep_id?>>
                        <?php echo $row->upkeep_name?></option>
                        <?php endforeach;?>
                        <?php endif; */?>
                    </select>
                    </div>
                    </div>
                
                    
                    
                    <div class="form-group">
                    <label for="" class="form-label"> Vehicle Model </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-lg" name="vehicle_model" value="<?php echo set_value('vehicle_model') ?>" placeholder="">
                        </div>  
                    </div>
                    
                    <div class="form-group">
                    <label for="" class="form-label"> Vehicle Make </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-lg" name="vehicle_make" value="<?php echo set_value('vehicle_make') ?>"  placeholder="">
                        </div>   
                    </div>

                    <div class="form-group">
                    <label for="" class="form-label"> Vehicle Chasis Number  </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-lg" name="vehicle_chasisnum" value="<?php echo set_value('vehicle_chasisnum') ?>"  placeholder="">
                        </div>  
                    </div>

                    <div class="form-group">
                    <label for="" class="form-label"> Vehicle Engine Number </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-lg" name="vehicle_engine_num"  value="<?php echo set_value('vehicle_engine_num') ?>" placeholder="">
                        </div>  
                    </div>
                    <br>
                    <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary btn-block "> Submit </button>
                    </div>
                    <hr>
                
            
            <?php echo form_close(); ?>

            </div>
            </div>
            </div>
  


<?php include("inc/footer.php"); ?>