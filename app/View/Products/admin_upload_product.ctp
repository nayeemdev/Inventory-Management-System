<section class="forms">
    <div class="container-fluid section-top">
        <div class="row">

            <div class="col-md-12">
                <div class="card">

                    <div class="card-header d-flex align-items-center custom-bg-color text-white">
                        <h3 class="h4"><i class="fas fa-box-open"></i> Admin Add Product</h3>
                    </div>
                    <div class="card-body">
                        <?php echo $this->Form->create('Product',array('enctype' => 'multipart/form-data')); ?>
                        <div class="form-group">
                            <?php
                            echo $this->Form->input('category_id',['class' => 'form-control', 'options' =>$categories]); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $this->Form->input('file_upload',['label'=> 'Import CSV File','class' => 'form-control','type'=>'file']); ?>
                        </div>


                        <div class="row">
                            <div class="offset-md-4"></div>
                            <div class="col-md-4">
                                <div class="form-group">
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




