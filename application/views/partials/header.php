<!DOCTYPE html>
<html lang="en">
	<head>

		<!-- Meta Tags -->
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit-no" />

		<title><?= ucfirst($pageName) ?></title>

		<!-- Bootstrap CSS CDN -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

		<!-- Application CSS -->
		<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/public/css/app.css" media="screen" />

		<!-- FontAwesome CDN -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" integrity="sha384-p2jx59pefphTFIpeqCcISO9MdVfIm4pNnsL08A6v5vaQc4owkQqxMV8kg4Yvhaw/" crossorigin="anonymous">

	</head>
	<body class="<?= ( $pageName == 'register' || $pageName == 'login' ? 'auth-body' : '' ) ?>">

		<?php 
		if ($pageName !== 'register' && $pageName !== 'login') {
			?>

			<!-- Navigation -->
			<nav class="navbar navbar-expand-lg navbar-light bg-light" id="mainNavigation">
				<a class="navbar-brand" href="<?= base_url() ?>">
					Social
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarLinkList" aria-controls="navbarLinkList" aria-expaned="false">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarLinkList">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item <?= ( $pageName == 'home' ? 'active' : '' ) ?>">
							<a class="nav-link" href="<?= base_url() ?>">Home</a>
						</li>
						<li class="nav-item <?= ( $pageName == 'mentions' ? 'active' : '' ) ?>">
							<a class="nav-link" href="<?= base_url('mentions') ?>">Mentions</a>
						</li>
						<li class="nav-item <?= ( $pageName == 'messages' ? 'active' : '' ) ?>">
							<a class="nav-link" href="<?= base_url('messages') ?>">Messages</a>
						</li>
						<li class="nav-item <?= ( $pageName == 'friends' ? 'active' : '' ) ?>">
							<a class="nav-link" href="<?= base_url('friends') ?>">Friends</a>
						</li>
						<li class="nav-item <?= ( $pageName == 'profile' ? 'active' : '' ) ?>">
							<a class="nav-link" href="<?= base_url('profile') ?>">My Profile</a>
						</li>
					</ul>
				</div>
			</nav> 
			<!-- /Navigation -->

			<?php
		}
		?>
