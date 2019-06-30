
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
                        <h3 class="h4">Admin Add Salary</h3>
                    </div>
                    <div class="card-body">
                        <!--            <p>Lorem ipsum dolor sit amet consectetur.</p>-->
                        <?php echo $this->Form->create('Salary'); ?>
                        <div class="form-group">
                            <?php echo $this->Form->input('employee_id',['label'=> 'Employee','class' => 'form-control','id'=>'employee_id']); ?>
                        </div>
<!--                        <div class="form-group">-->
<!--                            --><?php //echo $this->Form->input('employee',['label'=> 'Employee','class' => 'form-control','id'=>'employee_id']); ?>
<!--                        </div>-->

                        <div class="form-group">
                            <?php echo $this->Form->input('paidby',['label'=> 'Paid By','class' => 'form-control']); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('bonus',['label'=> 'Bonus','class' => 'form-control']); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('salary',['label'=> 'Salary','class' => 'form-control disable','type'=>'number','id'=>'salary']); ?>
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
                                <button class="btn btn-outline-primary btn-block">Pay Salary</button>
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
<script>
    $(function(){
        $('#employee_id').on('change',function(){
        onload();
        })
        $(document).ready(function() {
            onload();
        });
        function onload(){
            var id =  $('#employee_id').val();
            $.ajax({
                type: "POST",
                url: ROOT + 'admin/employees/get_salary/',
                data: {
                    'data[Employee][id]' : id
                },
                success: function(res) {
                    res = $.parseJSON( res );
                    $('#salary').val(res.data);
                }
            });
        }

//            $.post(ROOT + 'admin/employees/get_salary/' + id, function (data) {
//                $('#salary').val(data);
//            });

    })
</script>