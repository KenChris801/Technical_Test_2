<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Bootstrap -->
	<!-- CSS only -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

	<!-- Datatables -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

	<meta charset="utf-8">
	<title><?= $title ?></title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="#">Technical Assignment</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <?php if($this->session->checkCredential()) { ?>
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item <?php if(isset($content)){ if($content == 'Home') {?> active <?php }} ?>">
	        <a class="nav-link" href="<?= BASE_URL.'/main/index' ?>">Home</a>
	      </li>
	      <li class="nav-item <?php if(isset($content)){ if($content == 'Dashboard') {?> active <?php }} ?>">
	        <a class="nav-link" href="<?= BASE_URL.'/dashboard'?>">Dashboard</a>
	      </li>
	      <li class="nav-item <?php if(isset($content)){ if($content == 'Patient') {?> active <?php }} ?>">
	        <a class="nav-link" href="<?= BASE_URL.'/main/list'?>">Patients</a>
	      </li>
	      <?php if($this->session->user_data('id')==1) { ?>
	      <li class="nav-item <?php if(isset($content)){ if($content == 'Admin') {?> active <?php }} ?>">
	        <a class="nav-link" href="<?= BASE_URL.'/admin/index'?>">Admin</a>
	      </li>
	  	  <?php } ?>
	      <li class="nav-item">
	        <a class="nav-link" href="<?= BASE_URL.'/logout' ?>">Logout</a>
	      </li>
	    </ul>
	  </div>
	<?php } ?>
	</nav>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
	