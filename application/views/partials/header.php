
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
<nav class="navbar navbar-default navbar-fixed-top">
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
        <?php if(isset($this->session->userdata['user_id'])){ ?>
          <li class="active"><a href="#" data-toggle="modal" data-target="#post">Post<span class="sr-only">(current)</span></a></li>
        <?php } ?>
        <li><a href="#">Ranks</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <?php if(isset($this->session->userdata['user_id'])){ 
               $this->load->view('partials/modal-account-info');
               } ?>
       <?php if(!isset($this->session->userdata['user_id'])){ 
              $this->load->view('partials/modal-login-form');
              } ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!-- end of nav bar top -->

<!-- alert message if failed login -->
<?php
if($this->session->flashdata('login-error')){ ?>
  <div class="alert alert-danger" role="alert"><?php echo $this->session->flashdata('login-error');?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
     </button> </div>
 <?php };
?>
<!-- alert message if failed register -->
<?php
if($this->session->flashdata('register-error')){ ?>
  <div class="alert alert-danger" role="alert"><?php echo $this->session->flashdata('register-error');?>
    <a href="/user/new" data-toggle="modal" data-target="#register" class="alert-link">Try Again?</a>
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
     </button>        
  </div>
 <?php };
?>

<!-- modals below -->
<?php $this->load->view('partials/modal-new-record');
$this->load->view('partials/modal-registration');
 ?>



