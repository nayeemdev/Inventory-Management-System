<section class="tables">
	<div class="container-fluid section-top">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
<!-- 					<div class="card-close">
						<div class="dropdown">
							<button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
							<div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
						</div>
					</div> -->
					<div class="card-header d-flex align-items-center custom-bg-color text-white">
						<h3 class="h4"><i class="fas fa-balance-scale"></i> Ledger</h3>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="offset-md-2 offset-sm-1"></div>
							<div class="col-md-8 col-sm-4">
								<form class="form-inline">
									<div class="col-md-5">
										<div class="form-group">
											<label for="start" class="sr-only">Start</label>
											<input id="start" name="start" type="month" value="Jane Doe" class="mr-3 form-control">
										</div>
									</div>
									<div class="col-md-5">
										<div class="form-group">
											<label for="end" class="sr-only">End</label>
											<input id="end" type="month" name="end" placeholder="Username" class="mr-3 form-control">
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<button type="submit"  class="btn btn-outline-primary"><i class="fas fa-check-circle"></i> Submit</button>
										</div>
									</div>
								</form>
							</div>
						</div>

					</div>
					<div class="card-body">
						<div class="table-responsive">
							<?php

							foreach ($ledgers as $ledger):
								?>
							<table class="table">
								<thead>
								<tr>
									<th><?php echo $this->Paginator->sort('Date'); ?></th>
									<th><?php echo $this->Paginator->sort('Description'); ?></th>
									<th><?php echo $this->Paginator->sort('Expence', 'Debit'); ?></th>
									<th><?php echo $this->Paginator->sort('Income', 'Credit'); ?></th>
									<th><?php echo $this->Paginator->sort('Balance'); ?></th>
<!--<th>--><?php //echo $this->Paginator->sort('created'); ?><!--</th>-->
<!--<th>--><?php //echo $this->Paginator->sort('modified'); ?><!--</th>-->
<!--<th class="actions">--><?php //echo __('Actions'); ?><!--</th>-->
								</tr>
								</thead>
								<tbody>
								<?php $last_info = AppHelper::last_period($ledger['Period']['id']) ?>
								<tr class="custom-bg-color text-white">
									<td colspan="4">Opening <?php echo $ledger['Period']['period'] ?></td>
									<td><?php echo empty($last_info['amount'])?0:$last_info['amount'] ?></td>
								</tr>
								<?php
								$balance = empty($last_info['amount'])?0:$last_info['amount'];
								$total_credit = 0;
								$total_expence = 0;
								foreach ($ledger['Ledger'] as $math):
								?>
									<tr>
										<td><?php echo date_format(date_create($math['created']),'jS F G:ia');; ?>&nbsp;</td>
										<?php
										$credit = AppHelper::credit_description($math['credit_id']);
										$employee = AppHelper::employee_name($math['salary_id']);
										$expence = AppHelper::expence_description($math['expence_id']);
										$total_credit = $total_credit+$math['credit'];
										$total_expence = $total_expence+$math['debit'];
										?>
										<td>
											<?php
											if(!empty($credit)){
												echo h($credit);
											} elseif (!empty($employee)){
												echo "Salary Paid To ".$employee;
											} elseif (!empty($expence)){
												echo $expence;
											}


											?>
										</td>

										<td><?php echo h($math['debit']); ?>&nbsp;</td>
										<td><?php echo h($math['credit']); ?>&nbsp;</td>
										<?php $balance = $balance+$math['credit']-$math['debit'] ?>
										<td><?php echo h($balance); ?>&nbsp;</td>
<!--                                        <td>--><?php //echo h($ledger['Ledger']['created']); ?><!--&nbsp;</td>-->
<!--                                        <td>--><?php //echo h($ledger['Ledger']['modified']); ?><!--&nbsp;</td>-->

									</tr>

								<?php endforeach; ?>
								<tr class="custom-bg-color text-white">
									<td colspan="2">Ending <?php echo $ledger['Period']['period'] ?></td>
									<td><?php echo $total_expence ?></td>
									<td><?php echo $total_credit ?></td>
									<td><?php echo empty($ledger['Period']['amount'])?$last_info['amount']:$ledger['Period']['amount']?></td>
								</tr>
								</tbody>
							</table>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>
<script>
	document.getElementById('start').valueAsDate = new Date();
	document.getElementById('end').valueAsDate = new Date();
</script>