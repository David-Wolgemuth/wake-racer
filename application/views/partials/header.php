
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>WakeRacer</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/styles.css')?>" rel="stylesheet">

  </head>
  <body>

<!-- navbar top  begins here -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#login" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">WakeRacer</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="login">
      <ul class="nav navbar-nav">
        <?php if(!isset($this->session->userdata['is_logged_in'])){ ?>
          <li class="active"><a href="#" data-toggle="modal" data-target="#post">Post<span class="sr-only">(current)</span></a></li>
        <?php } ?>
        <li><a href="#">Ranks</a></li>
        <?php if(isset($this->session->userdata['is_logged_in'])){ ?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User Info<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Account</a></li>
              <li><a href="#">Log Out</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Contact</a></li>
            </ul>
          </li>
          <?php } ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
     <!-- loging area below -->
     <?php if(!isset($this->session->userdata['is_logged_in'])){ ?>      
      <form class="navbar-form navbar-right">
        <div class="form-group">
          <input type="text" placeholder="Email" class="form-control">
        </div>
        <div class="form-group">
          <input type="password" placeholder="Password" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Sign in</button>
        <a href="/user/new" data-toggle="modal" data-target="#register"><button class="btn btn-info">Register</button></a>
      </form>
      <!-- login area above -->
     <?php } ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!-- end of nav bar top -->

<!-- modals below -->
<?php $this->load->view('partials/modal-new-record');
$this->load->view('partials/modal-registration');
 ?>



