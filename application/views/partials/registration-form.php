<!-- load form using:  $this->load->view('partials/registration-form'); -->
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <form action="<?= base_url("users/create") ?>" method="POST">
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


                <!-- I think these are extrlmly important for querying later -->
                <!-- boat type : Canoe or Kayak -->
                <!-- Gender -->
                <!-- Birthdate -->
                <!-- city and state -->
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
            <div class="form-group">
                <input class="btn btn-success form-control " type="submit" value="Register">
            </div>
        </form>
    </div>
</div>
