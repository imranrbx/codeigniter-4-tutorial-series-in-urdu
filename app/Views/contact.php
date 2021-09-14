<?= $this->extend('template/base') ?>
<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="col-md-3">
    <?= $this->include('partials/sidebar-left') ?>
</div>

<div class="col-md-6">

<h1>Contact Us Via <?= $email ?> </h1>

<?= $c_f['form_open'] ?>
<div class="form-group">
    <?= form_label('Enter Your Email') ?>
    <?= $c_f['email'] ?>
    <?php if ($validator != null and $validator->hasError('email')) : ?>
            <?= $validator->showError('email', 'my_single'); ?>
    <?php endif; ?>
</div>
<div class="form-group">
    <?= form_label('Enter Your Name') ?>
    <?= $c_f['name'] ?>
    <?php if ($validator != null and $validator->hasError('name')) : ?>
        <?= $validator->showError('name', 'my_single'); ?>
    <?php endif; ?>
</div>
<div class="form-group">
    <?= form_label('Enter Your Message') ?>
    <?= $c_f['message'] ?>
    <?php if ($validator != null and $validator->hasError('message')) : ?>
        <?= $validator->showError('message', 'my_single'); ?>
    <?php endif; ?>
</div>
<div class="form-group">
    <?= form_submit(['value' => 'Contact Us' , 'class'=>'btn btn-primary']) ?>
</div>
<?= $c_f['form_close'] ?>
</div>
<div class="col-md-3">
    <?= $this->include('partials/sidebar-right') ?>
</div>
<?= $this->endSection() ?>
