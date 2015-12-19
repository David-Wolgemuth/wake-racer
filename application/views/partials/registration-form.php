<!-- load form using:  $this->load->view('partials/registration-form'); -->
<form action="<?= base_url("users/create") ?>" method="POST">
    <label for="name">First Name:</label>
    <p class="error"><?= $this->session->flashdata('name_first-error') ?></p>
    <input type="text" name="name_first" placeholder="George" value="<?= $this->session->flashdata('name_first-old') ?>">

    <label for="name">Last Name:</label>
    <p class="error"><?= $this->session->flashdata('name_last-error') ?></p>
    <input type="text" name="name_last" placeholder="Washington" value="<?= $this->session->flashdata('name_last-old') ?>">

    <label for="email">Email:</label>
    <p class="error"><?= $this->session->flashdata('email-error') ?></p>
    <input type="text" name="email" placeholder="george@washington.com" value="<?= $this->session->flashdata('email-old') ?>">

    <label for="password">Password:</label>
    <p class="error"><?= $this->session->flashdata('password-error') ?></p>
    <input type="password" name="password" placeholder="Password" value="<?= $this->session->flashdata('password-old') ?>">

    <label for="confirm_password">Confirm Password</label>
    <p class="error"><?= $this->session->flashdata('confirm_password-error') ?></p>
    <input type="password" name="confirm_password" placeholder="Confirm Password" value="<?= $this->session->flashdata('confirm_password-old') ?>">

    <input type="submit" value="Register">
</form>
