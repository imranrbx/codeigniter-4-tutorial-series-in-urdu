<?php $this->extend('template/base');?>
<?php $this->section('styles');?>
<link rel="stylesheet" href="<?php echo base_url('css/login.css'); ?>">
<?php $this->endSection();?>
<?php $this->section('content');?>

<div class="col-md-12">
<?php if (session()->getFlashData('success') != null): ?>
<div class="alert alert-success">
  <p><?=session()->getFlashData('success')?></p>
</div>
<?php endif;?>
<form action="<?=base_url('login')?>" class="form-signin" method="post">
<?=csrf_field()?>
  <div class="text-center">
    <h2 class="display-4 mb-3">Please Login</h2>
   <?php if (session()->getFlashData('error') != null): ?>
    <p class="text-danger"><?=session()->getFlashData('error');?></p>
   <?php endif;?>
  </div>
<hr class="colorgraph">
        <div class="form-label-group" >
                <input type="email" value="<?=old('email')?>" name="email" id="inputEmail" class="form-control" placeholder="Email" required>
                 <label for="inputEmail">Email</label>
            </div>

  <div class="form-label-group">
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <label for="inputPassword">Password</label>
  </div>
  <hr class="colorgraph">
   <div class="row">
        <div class="col-sm-12 col-md-6">
            <input type="submit" value="Login" class="btn btn-primary btn-block btn-lg" name="register" tabindex="7"></div>
            <div class="col-sm-12 col-md-6">
                <a href="<?php echo base_url('register'); ?>" class="btn btn-success btn-block btn-lg">Register</a></div>
            </div>
</form>
</div>
<?php $this->endSection();?>