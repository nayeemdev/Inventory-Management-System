
<section class="forms">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-close">
                        <div class="dropdown">
                            <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                            <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                        </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                        <h3 class="h4">Admin Edit Credit</h3>
                    </div>
                    <div class="card-body">
                        <!--            <p>Lorem ipsum dolor sit amet consectetur.</p>-->
                        <?php echo $this->Form->create('Credit'); ?>
                        <?php echo $this->Form->input('id') ?>
                        <div class="form-group">
                            <?php echo $this->Form->input('paidby',['label'=> 'Paid By','class' => 'form-control']); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('description',['label'=> 'Description','class' => 'form-control']); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('amount',['label'=> 'Amount','class' => 'form-control','type'=>'number']); ?>
                        </div>
                        <!--                <div class="form-group">-->
                        <!--                    <label class="form-control-label">Password</label>-->
                        <!--                    <input type="password" placeholder="Password" class="form-control">-->
                        <!--                </div>-->
                        <div class="form-group">
                            <!--                    <input type="submit" value="Signin" class="btn btn-primary">-->
                            <?php //echo $this->Form->end(__('Submit',['class'=> 'btn btn-primary'])); ?>
                            <button class="btn btn-outline-primary btn-block">Edit Credit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
