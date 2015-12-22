<!-- load form using:  $this->load->view('partials/modal-registration'); -->

<div class="modal fade" id="new_team" tabindex="-2" role="dialog" aria-labelledby="new_team">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Register</h4>
      </div>
      <div class="modal-body">

        <div class="row">
    <div class=" col-sm-10 col-sm-offset-1">
        <form action="<?= base_url("users/create") ?>" method="POST">
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="team_name"></label>
                    <p class="error"><?= $this->session->flashdata('name_first-error') ?></p>
                    <input  class="form-control" type="text" name="team_name" placeholder="Team Name" value="<?= $this->session->flashdata('name_first-old') ?>">
                </div>
                <div class="form-group">
                    <label for="state"></label>
                    <p class="error"><?= $this->session->flashdata('state_first-error') ?></p>
                    <input  class="form-control" type="text" name="state" placeholder="State" value="<?= $this->session->flashdata('name_first-old') ?>">
                </div>
                <div class="form-group">
                    <label for="city"></label>
                    <p class="error"><?= $this->session->flashdata('city_first-error') ?></p>
                    <input  class="form-control" type="text" name="city" placeholder="City" value="<?= $this->session->flashdata('name_first-old') ?>">
                </div>
            </div><!-- end of left side -->
            <div class="col-sm-6 col-md-6">
            </div><!-- end of right side -->
            <div class="form-group">
                <input class="btn btn-success form-control" type="submit" value="Create Team">
            </div>
        </form>
    </div>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>