<?= $this->extend('template/base') ?>
<?php $this->section('title') ?>
User Profile
<?php $this->endSection() ?>
<?php $this->section('content') ?>
<div class="col-md-12">
  <div class="container mt-5">
     <div class="row">
        <div class="col-sm-10"><h1><?= session()->get('user')['username'] ?? 'N/A' ?></h1></div>
        <div class="col-sm-2"><a href="/users" class="float-right"><img title="profile image" class="img-circle img-responsive" src="http://www.gravatar.com/avatar/28fd20ccec6865e2d5f0e1f4446eb7bf?s=100"></a></div>
    </div>
    <div class="row">
        <?php
       
        if (session()->getFlashData('errors') != null) :
            $errors = session()->getFlashData('errors');
            var_dump($errors);
        endif;
       
        ?>
    <div class="col-sm-3"><!--left col-->
    
      <div class="text-center">
        <img src="<?= $thumbnail ? base_url('writable/uploads/images/'.$thumbnail) : 'http://ssl.gstatic.com/accounts/ui/avatar_2x.png' ?>" class="avatar img-circle img-thumbnail" alt="avatar">
        <h6>Upload a different photo...</h6>
        <form class="form" action="<?= base_url('/users/'.$id.'/upload') ?>" method="post" id="updateprofilephoto" enctype="multipart/form-data">
          <?= csrf_field() ?>
        <input type="file" class="text-center center-block file-upload" name="thumbnail" />
        <input type="submit" class="btn btn-primary btn-block" value="Upload">
        </form>
      </div>
        </div><!--/col-3-->
        <div class="col-sm-9">
          <?php if ($message = session()->getFlashData('message')) :?>
            <p class="alert alert-<?= key($message) ?>"><?= current($message) ?></p>
          <?php endif; ?>
            <ul class="nav nav-tabs">
                <li class="nav-item "><a class="nav-link active" data-toggle="tab" href="#profile">Profile</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#editprofile">Edit Profile</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#changepassword">Change Password</a></li>

            </ul>

              
          <div class="tab-content">
            <div class="tab-pane active" id="profile">
              <h2>Profile</h2>
                <hr/>
                     <div class="row my-4">
                          <div class="col-sm-12">
                              <strong>Full name: </strong>
                             <?= $name ?? 'N/A' ?>
                          </div>              
                      </div>
                      <div class="row my-4">
                          <div class="col-sm-6">
                              <strong>Email: </strong>
                              <?= session()->get('user')['email'] ?? 'N/A' ?>
                          </div>
                           <div class="col-sm-6">
                              <strong>AddressL </strong>
                              <?= $address ?? 'N/A' ?>
                          </div>
                      </div>   
                       <div class="row my-4">
                          <div class="col-sm-4">
                              <strong>City: </strong>
                             <?= $city ?? 'N/A' ?>
                          </div>
                           <div class="col-sm-4">
                              <strong>State: </strong>
                              <?= $state ?? 'N/A' ?>
                          </div>

                          <div class="col-sm-4">
                              <strong>Country: </strong>
                             <?= $country ?? 'N/A' ?>
                          </div>
                      </div>     
             </div><!--/tab-pane-->
             <div class="tab-pane" id="editprofile"> 
             <?php if (allowEdit(session()->get('user')['id'])) : ?>  
               <h2>Edit Profile</h2>
               <hr/>
                  <form class="form" action="<?= base_url('/users/'.$id.'/profile') ?>" method="post" id="editprofileform">
                      <?= csrf_field() ?>
                      <div class="form-group">  
                          <div class="col-sm-12 row">
                              <label for="first_name">Full name</label>
                              <input type="text" class="form-control <?= isset($errors['name']) ? 'is-invalid' : ''  ?>" name="name" value="<?= old('name') ?? $name ?>" id="first_name" placeholder="first name" title="enter your first name if any.">
                              <?php if (isset($errors['name'])) : ?>
                            <p class="invalid-feedback">
                                    <?= $errors['name'] ?>
                            </p>
                              <?php endif; ?>
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-sm-6">
                              <label for="email">Email</label>
                              <input type="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : ''  ?>" name="email" value="<?= old('email') ?? session()->get('user')['email'] ?>" id="email" placeholder="you@email.com" title="enter your email.">
                          </div>
                           <div class="col-sm-6">
                              <label for="address">Address</label>
                              <input type="text" class="form-control <?= isset($errors['address']) ? 'is-invalid' : ''  ?>" name="address" value="<?= old('address') ?? $address ?>"  id="address" placeholder="Address" title="Address">
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-sm-4">
                              <label for="city">City</label>
                              <input type="text" class="form-control <?= isset($errors['city']) ? 'is-invalid' : ''  ?>" name="city" value="<?= old('city') ?? $city ?>"  id="city" placeholder="City name" title="City Name.">
                          </div>
                           <div class="col-sm-4">
                              <label for="state">State</label>
                              <input type="text" class="form-control <?= isset($errors['state']) ? 'is-invalid' : ''  ?>" name="state" value="<?= old('state') ?? $state ?>" id="state" placeholder="State Name" title="State Name">
                          </div>

                          <div class="col-sm-4">
                              <label for="country">Country</label>
                              <input type="text" class="form-control <?= isset($errors['country']) ? 'is-invalid' : ''  ?>" name="country" value="<?= old('country') ?? $country ?>" id="country" placeholder="Country Name" title="Country Name">
                          </div>
                      </div>     
                      <div class="form-group row">
                           <div class="col-sm-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit">Save</button>
                                <button class="btn btn-lg" type="reset"> Reset</button>
                            </div>
                      </div>
                </form>
             <?php else : ?>
               <h2>You are Not LoggedIn</h2>
             <?php endif; ?>
             </div><!--/tab-pane-->
             <div class="tab-pane" id="changepassword"> 
              <?php if (allowEdit(session()->get('user')['id'])) : ?>
                <h2>Change Password</h2>
                  <form class="form" action="<?= base_url('/users/password') ?>" method="post" id="changepasswordform">
                    <?= csrf_field() ?>
                      <div class="form-group row">
                          <div class="col-sm-12">
                              <label for="old_password">Old Password</label>
                              <input type="password" name="old_password" class="form-control" id="old_password" placeholder="Old Password" title="Old Password">
                          </div>
                      </div>
                      <div class="form-group row">
                          
                          <div class="col-sm-12">
                              <label for="password">Password</label>
                              <input type="password" class="form-control" name="password" id="password" placeholder="New Password" title="New Password.">
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-sm-12">
                            <label for="password2">Verify Password</label>
                              <input type="password" class="form-control" name="password_confirmation" id="password2" placeholder="Confirm Password" title="Confirm Password.">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-sm-12">
                                <br>
                                <button class="btn btn-lg btn-success float-left" type="submit">Save</button>
                                <!--<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>-->
                            </div>
                      </div>
                </form>
              <?php else :  ?>
                  <h2>You are Not LoggedIn</h2>
              <?php endif; ?>
              </div>
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
      </div> <!-- /container -->
</div><!--/col-12-->
<?php $this->endSection() ?>