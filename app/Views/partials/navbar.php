<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">

  <a class="navbar-brand text-uppercase" href="<?= base_url(); ?>"> <img class="mb-0" src="<?php echo base_url('images/wplogo.png'); ?>" alt="" width="32" height="32"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('home') ?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <?php if (!loggedIn()) : ?>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('register') ?>">Register</a>
      </li>
            <li class="nav-item">
        <a class="nav-link" href="<?= base_url('login') ?>">Login</a>
      </li>
      <?php else : ?>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('logout') ?>">Logout</a>
      </li>
      <?php endif; ?>
    </ul>
  </div>
  </div>
</nav>