<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Panel</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="public/css/main.css"> -->
	<style type="text/css">
		.registro {
			min-height: 600px;
		}
	</style>
</head>
<!-- mfloriano_19@alu.uabcs.mx  a0uGqZBW!mA1o0 -->

<body>
	<div class="container recolor">

		<section>

			<div class="row registro justify-content-md-center align-items-center">

				<div class="col-md-6 col-sm-12 p-3 border">
					<fieldset>
						<form method="post" action="app/AuthController.php">

							<h1 class="text-center">
								Panel access
							</h1>
							<div class="mb-3">
								<label>Email</label>
								<div class="input-group mb-3">
									<input name="email" type="email" class="form-control" placeholder="email@domain.com" aria-label="Username" aria-describedby="basic-addon1" required>
								</div>
							</div>

							<div class="mb-3">
								<label>Password</label>
								<div class="input-group mb-3">
									<input name="password" type="password" class="form-control" placeholder="********" aria-label="Username" aria-describedby="basic-addon1" required>
								</div>
							</div>
							<button class="btn btn-primary col-12" type="submit">Log in</button>
							<input type="hidden" name="action" value="access">
						</form>
					</fieldset>
				</div>
			</div>
		</section>

		<section>

		</section>

	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
</body>

</html>