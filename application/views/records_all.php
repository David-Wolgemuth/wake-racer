<?php $this->load->view('partials/header'); ?>


<div class="container">
	<h1 class="page-header text-center">Records</h1>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<form id="parameters" action="<?= base_url("records/index")?>" method="POST">
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
				<div class="form-group">
					<label>Boat Type</label>
					<input type="checkbox" name="boat_type[]" value="canoe" checked>Canoe
					<input type="checkbox" name="boat_type[]" value="kayak" checked>Kayak
				</div>
				<div class="form-group">
					<label for="Gender">Gender</label>
					<input type="checkbox" name="gender[]" value="1" checked>Male
					<input type="checkbox" name="gender[]" value="0" checked>Female
				</div>
				<div class="form-group">
					<input id="name-search" type="text" name="name" placeholder="George Washington">
				</div>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<table class="table table-striped">
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

<script>
$(document).ready(function () {

function get_table() {
	$.post("/records/index_html/", $("#parameters").serialize(), function(res) {
		$("table").html(res);
	});
}
$('select, input').on("change", function() {
	get_table();
});
$('input').on("keyup", function() {
	get_table();
});
// $(document).on("keyup", "#name-search", function() {
// 	get_table();
// });



});
</script>