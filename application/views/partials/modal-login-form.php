<!-- load form using:  $this->load->view('partials/modal-login-form'); -->
<form class="navbar-form navbar-right" action="<?= base_url("sessions/create") ?>" method="POST">
    <div class="form-group">
        <input type="text" name="email" placeholder="Email" class="form-control">
    </div>
    <div class="form-group">
        <input type="password" name="password" placeholder="Password" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Sign in</button>
    <a href="/user/new" data-toggle="modal" data-target="#register"><button class="btn btn-info">Register</button></a>
</form>