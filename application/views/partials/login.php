
<form action="<?= base_url("sessions/create") ?>" method="POST">
    <p class="error"><?= $this->session->flashdata('login-error') ?></p>
    <label for="email">Email:</label>
    <input type="text" name="email" value="">

    <label for="password">Password:</label>
    <input type="password" name="password" value="">
    
    <input type="submit" value="Login">
</form>
