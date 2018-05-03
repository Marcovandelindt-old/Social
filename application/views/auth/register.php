<div class="container-fluid">
	<div class="col-md-4 offset-md-4">

		<div class="card auth-card">
			<div class="card-body">
				<h5 class="card-title">Sign up</h5>
				<h6 class="card-subtitle mb-2 text-muted">It's totally free!</h6>
				<p class="card-text">You can create your account by filling in the form below!</p>

				<hr />

				<!-- Register Form -->
				<form method="POST" action="">

					<?php if (validation_errors()) : ?>
					<div class="col-md-12">
						<div class="alert alert-danger register-error" role="alert">
							<p><i class="fas fa-exclamation-circle"></i>&nbsp;<?php echo validation_errors('<span class="auth-error">', '</span>') ?><i class="fas fa-times float-right error-close-btn"></i></p>
						</div>
					</div>
					<?php endif; ?>

					<?php if ( isset($error) ) : ?>
					<div class="col-md-12">
						<div class="alert alert-danger regsister-error" role="alert">
							<i class="fas fa-exclamation-circle"></i>&nbsp;<?= $error ?>
						</div>
					</div>
					<?php endif; ?>

					<div class="col-md-12">
						<div class="form-group">
							<label for="username">Username *</label>
							<input type="text" name="username" class="form-control" id="username" required autofocus />
							<small id="usernameHelp" class="form-text text-muted">Please choose a minumum of three and a maximum of 25 characters</small>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="email">E-mailaddress *</label>
							<input type="email" name="email" class="form-control" id="email" required />
							<small id="emailHelp" class="form-text text-muted">Please choose your real e-mailaddress</small>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="password">Password *</label>
							<input type="password" name="password" class="form-control" id="password" required />
							<small id="passwordHelp" class="form-text text-muted">Please choose a minimum of 6 characters</small>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="passwordConfirm">Password Confirm *</label>
							<input type="password" name="password_confirm" class="form-control" id="passwordConfirm" required />
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<button type="submit" class="btn btn-success register-btn auth-btn" name="register">Register</button>
						</div>
					</div>
				</form>
				<!-- /Register Form -->

			</div>
		</div>

	</div>
</div>