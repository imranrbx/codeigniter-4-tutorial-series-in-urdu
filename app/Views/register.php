<?php  $this->extend('template/base'); ?>
<?php $this->section('styles'); ?>
<link rel="stylesheet" href="<?php echo base_url('css/login.css'); ?>">
<?php $this->endSection(); ?>
<?php $this->section('content'); ?>
 <div class="col-xs-12 col-sm-8 col-md-6 offset-sm-2 offset-md-3">

    <?php
    $errors = [];
    if (session()->getFlashData('errors') != null) :
        $errors = session()->getFlashData('errors');
    endif;

    ?>
    <form role="form" class="form-signin" method="post" action="<?= base_url('register') ?>">
        <?= csrf_field() ?>
        <div class="text-center mb-3">
        <h2 class="display-4 text-center">Please Sign Up </h2>
            </div>
            <hr class="colorgraph">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" name="name" id="name" class="form-control input-lg <?= isset($errors['name']) ? 'is-invalid' : ''  ?>" value="<?= old('name') ?>" placeholder="Full Name" tabindex="1">
                        <?php if (isset($errors['name'])) : ?>
                            <p class="invalid-feedback">
                                <?= $errors['name'] ?>
                            </p>
                        <?php endif;?>
                        
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" name="username" value="<?= old('username') ?>" id="username" class="form-control input-lg  <?= isset($errors['username']) ? 'is-invalid' : ''  ?>" placeholder="Username" tabindex="2">
                          <?php if (isset($errors['username'])) : ?>
                            <p class="invalid-feedback">
                                <?= $errors['username'] ?>
                            </p>
                          <?php endif; ?>
                    </div>
                   
                </div>
            </div>
            <div class="form-group">
                <input type="email" name="email" id="email" value="<?= old('email') ?>" class="form-control input-lg <?=isset($errors['email']) ? 'is-invalid' : ''  ?>" placeholder="example@example.com" tabindex="3">
                 <?php if (isset($errors['email'])) : ?>
                            <p class="invalid-feedback">
                                <?= $errors['email'] ?>
                            </p>
                 <?php endif;?>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control input-lg <?= isset($errors['password']) ? 'is-invalid' : ''  ?>" placeholder="Password" tabindex="4">
                        <?php if (isset($errors['password'])) : ?>
                            <p class="invalid-feedback">
                                <?= $errors['password'] ?>
                            </p>
                        <?php endif; ?>
                    </div>
                     
                </div>
                <div class=" col-md-12">
                    <div class="form-group">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg <?= isset($errors['password_confirmation']) ? 'is-invalid' : ''  ?>" placeholder="Confirm Password" tabindex="5">
                        <?php if ($errors != null and isset($errors['password_confirmation'])) : ?>
                            <p class="invalid-feedback">
                                <?= $errors['password_confirmation'] ?>
                            </p>
                        <?php endif;?>
                    </div>
                     
                </div>
            </div>
            <hr class="colorgraph">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <input type="submit" value="Register" class="btn btn-primary btn-block btn-lg" name="register" tabindex="6"></div>
                <div class="col-xs-12 col-md-6">
                    <a  tabindex="7" href="<?php echo base_url('login'); ?>" class="btn btn-success btn-block btn-lg">Sign In</a></div>
            </div>
        </form>
    </div>
</div>

<?php $this->endSection(); ?>
