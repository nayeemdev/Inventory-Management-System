

<section class="forms">
    <div class="container-fluid section-top">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center custom-bg-color text-white">
                        <h3 class="h4"><i class="fas fa-edit"></i> Edit</h3>
                    </div>
                    <div class="card-body">
                        <!--            <p>Lorem ipsum dolor sit amet consectetur.</p>-->
                        <?php echo $this->Form->create('Expence'); ?>
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
                        
                        <div class="row">
                            <div class="offset-md-4"></div>
                            <div class="col-md-4">
                            <div class="form-group">
                            <!--                    <input type="submit" value="Signin" class="btn btn-primary">-->
                            <?php //echo $this->Form->end(__('Submit',['class'=> 'btn btn-primary'])); ?>

                            <button class="btn btn-outline-primary btn-block"><i class="fas fa-save"></i> Save</button>
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