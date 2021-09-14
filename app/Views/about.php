<?= $this->extend('template/base') ?>
<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="col-md-8">
	<h1>Welcome <?= $name ?></h1>
</div>
<div class="col-md-4">
	<?= $this->include('partials/sidebar-right') ?>
</div>
<?= $this->endSection() ?>
