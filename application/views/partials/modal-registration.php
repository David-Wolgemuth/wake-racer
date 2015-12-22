<!-- load form using:  $this->load->view('partials/modal-registration'); -->

<div class="modal fade" id="register" tabindex="-2" role="dialog" aria-labelledby="register">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="registration">Register</h4>
      </div>
      <div class="modal-body">

        <div class="row">
    <div class=" col-sm-10 col-sm-offset-1">
        <form action="<?= base_url("users/create") ?>" method="POST">
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="name">First Name:</label>
                    <p class="error"><?= $this->session->flashdata('name_first-error') ?></p>
                    <input  class="form-control" type="text" name="name_first" placeholder="George" value="<?= $this->session->flashdata('name_first-old') ?>">
                </div>
                <div class="form-group">
                    <label for="name">Last Name:</label>
                    <p class="error"><?= $this->session->flashdata('name_last-error') ?></p>
                    <input class="form-control" type="text" name="name_last" placeholder="Washington" value="<?= $this->session->flashdata('name_last-old') ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <p class="error"><?= $this->session->flashdata('email-error') ?></p>
                    <input class="form-control" type="text" name="email" placeholder="george@washington.com" value="<?= $this->session->flashdata('email-old') ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <p class="error"><?= $this->session->flashdata('password-error') ?></p>
                    <input  class="form-control" type="password" name="password" placeholder="Password" value="<?= $this->session->flashdata('password-old') ?>">
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <p class="error"><?= $this->session->flashdata('confirm_password-error') ?></p>
                    <input  class="form-control" type="password" name="confirm_password" placeholder="Confirm Password" value="<?= $this->session->flashdata('confirm_password-old') ?>">
                </div>
            </div><!-- end of left side -->
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <p class="error"><?= $this->session->flashdata('gender-error') ?></p>
                    <select name="gender" class="form-control">
                        <option class="form-control" disabled selected>Gender</option>
                        <option class="form-control" value="1">Male</option>
                        <option class="form-control" value="0">Female</option>
                    </select>
                </div>
                <!-- <div class="form-group">
                    <label for="boat_type">Boat Type</label>
                    <p class="error"><?= $this->session->flashdata('boat_type-error') ?></p>
                    <select  class="form-control">
                        <option disabled selected>Boat type</option>
                        <option value="canoe">Canoe</option>
                        <option value="kayak">Kayak</option>
                    </select>
                </div> -->
                <div class="form-group">
                    <label>Birth date</label>
                    <p class="error"><?= $this->session->flashdata('birthdate_type-error') ?></p>
                    <input type="date" class="form-control" name="birthdate"  placeholder="Birth day">
                </div>
                <!-- <div class="form-group">
                    <label>State</label>
                    <p class="error"><?= $this->session->flashdata('state-error') ?></p>
                    <input type="text" name="state" class="form-control" placeholder="State">
                </div>
                <div class="form-group">
                    <label>City</label>
                    <p class="error"><?= $this->session->flashdata('city-error') ?></p>
                    <input type="text" name="city" class="form-control" placeholder="City">
                </div> -->
            </div><!-- end of right side -->
            <div class="form-group">
                <input class="btn btn-success form-control" type="submit" value="Register">
            </div>
        </form>
    </div>
    
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">registration</button>
      </div>
    </div>
  </div>
</div>