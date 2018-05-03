<div class="container-fluid">
	<div class="col-md-4 offset-md-4">

		<div class="card auth-card">
			<div class="card-body">
				<h5 class="card-title">Log in</h5>

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
							<label for="email">E-mailaddress *</label>
							<input type="email" name="email" class="form-control" id="email" required />
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="password">Password *</label>
							<input type="password" name="password" class="form-control" id="password" required />
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<button type="submit" class="btn btn-success login-btn auth-btn" name="Login">Login</button>
						</div>
					</div>
				</form>
				<!-- /Register Form -->

			</div>
		</div>

	</div>
</div>