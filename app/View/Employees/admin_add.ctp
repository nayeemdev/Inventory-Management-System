
<section class="forms">
    <div class="container-fluid section-top">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <!--<div class="card-close">
                        <div class="dropdown">
                            <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                            <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                        </div>
                    </div>-->
                    <div class="card-header d-flex align-items-center custom-bg-color text-white">
                        <h3 class="h4">Admin Add Employee</h3>
                    </div>
                    <div class="card-body">
                        <!--            <p>Lorem ipsum dolor sit amet consectetur.</p>-->
                        <?php echo $this->Form->create('Employee'); ?>
                        <div class="form-group">
                            <?php echo $this->Form->input('name',['label'=> 'Name','class' => 'form-control']); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('salary',['label'=> 'Salary','class' => 'form-control','type'=>'number']); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('description',['label'=> 'Description','class' => 'form-control']); ?>
                        </div>
                        <!--                <div class="form-group">-->
                        <!--                    <label class="form-control-label">Password</label>-->
                        <!--                    <input type="password" placeholder="Password" class="form-control">-->
                        <!--                </div>-->
                        <div class="row">
                            <div class="offset-md-4"></div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <!--                    <input type="submit" value="Signin" class="btn btn-primary">-->
                                <?php //echo $this->Form->end(__('Submit',['class'=> 'btn btn-primary'])); ?>
                                <button class="btn btn-outline-primary btn-block">Add Credit</button>
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