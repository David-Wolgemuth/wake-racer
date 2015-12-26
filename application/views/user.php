<?php $this->load->view('partials/header'); ?>

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<h1 class="page-header text-center"><?php echo ucwords($this->session->userdata('name_first')); ?></h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Time</th>
						<th>Distance</th>
						<th>Date</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($records as $key => $value) { ?>
						<tr>
							<td><?php echo $value['record_time'] ?></td>
							<td><?php echo $value['distance'] ?></td>
							<td><?php echo $value['record_date'] ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>


<?php $this->load->view('partials/footer'); ?>