<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 12/23/18
 * Time: 1:00 PM
 */ ?>


<section class="forms">
    <div class="container-fluid section-top">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center custom-bg-color text-white">
                        <h3 class="h4">Admin Reset Password</h3>
                    </div>
                    <div class="card-body">
                        <!--            <p>Lorem ipsum dolor sit amet consectetur.</p>-->
                        <?php echo $this->Form->create('User'); ?>
                        <div class="form-group">
                            <?php echo $this->Form->input('old_password',['label'=> 'Old Password','class' => 'form-control','type' => 'password']); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('new_password',['label'=> 'New Password','class' => 'form-control','type' => 'password']); ?>
                        </div>
                        <div class="row">
                            <div class="offset-md-4"></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <!--                    <input type="submit" value="Signin" class="btn btn-primary">-->
                                    <?php //echo $this->Form->end(__('Submit',['class'=> 'btn btn-primary'])); ?>
                                    <button class="btn btn-outline-primary btn-block"><i class="fas fa-key"></i> Reset Password</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
