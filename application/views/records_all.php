<?php $this->load->view('partials/header'); ?>


<div class="container">
	<h1 class="page-header text-center">Records</h1>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<form action="records/index" method="GET">
				<div class="form-group">
				<label>Distance</label>
					<select  name="distance" class="form-control">
						<option value="" selected>All Distances</option>
						<option value="200m">200m</option>
						<option value="500m">500m</option>
						<option value="1000m">1000m</option>
						<option value="5000m">5000m</option>
					</select>
				</div>
				<input class="btn btn-primary" type="submit" value="Search">
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<table class=" table table-striped">
				<thead>
					<tr>
						<th>Rank</th>
						<th>Name</th>
						<th>Age group</th>
						<th>Time</th>
						<th>Distance</th>
						<th>Gender</th>
						<th>Date</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($records as $key => $value) { ?>
						<tr>
							<td>Rank</td>
							<td><?= $value['name_first']. " " . $value['name_last'] ?></td>
							<td><?= $value['birthdate'] ?></td>
							<td><?= $value['record_time']['formatted'] ?></td>
							<td><?= $value['distance'] ?></td>
							<td><?php if($value['gender']==0){
								echo "Female";
								}
								else{
									echo "Male";
								} ?></td>
							<td><?php echo $value['record_date'] ?></td>
						</tr>	
					<?php } ?>
				</tbody>
			</table>

		</div><!-- end of col -->
	</div><!-- end of row -->
</div><!-- end of container -->

<?php $this->load->view('partials/footer'); ?>