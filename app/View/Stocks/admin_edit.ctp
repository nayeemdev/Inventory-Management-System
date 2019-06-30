<section class="forms">
    <div class="container-fluid section-top">
        <div class="row">

            <div class="col-md-12">
                <div class="card">

                    <div class="card-header d-flex align-items-center custom-bg-color text-white">
                        <h3 class="h4"><i class="fas fa-edit"></i> Stock Update</h3>
                    </div>
                    <div class="card-body">
                        <?php echo $this->Form->create('Stock'); ?>
                        <?php echo $this->Form->input('id');?>
                        <div class="form-group">
                            <?php
                            echo $this->Form->input('category_id',['class' => 'form-control']); ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo $this->Form->input('product_id',['class' => 'form-control']); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('int_qty',['label'=> 'Stock Amount','class' => 'form-control','type'=>'number']); ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo $this->Form->input('int_price',['label'=> 'Buying Price','class' => 'form-control','type'=>'number']); ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo $this->Form->input('cur_price',['label'=> 'Selling Price','class' => 'form-control','type'=>'number']); ?>
                        </div>
                        <div class="row">
                            <div class="offset-md-4"></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <button class="btn btn-outline-primary btn-block"><i class="fas fa-save"></i> Update</button>
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

