<?php require '../config.php'; ?>
<?php loadClass('Helper')->authPage(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php echo loadClass('Html')->getHead(); ?>
	</head>

	<body>
		<?php echo loadClass('Html')->getNavbar(); ?>

		<div class="container">

			<h1>Lucee info</h1>
			<br/>
			<br/>

			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<?php if (!loadClass('Lucee')->isAvailable()): ?>
						<p>Lucee container is not running.</p>
					<?php else: ?>
						<p>Lucee container is running.</p>
					<?php endif; ?>
				</div>
			</div>

		</div><!-- /.container -->

		<?php echo loadClass('Html')->getFooter(); ?>
	</body>
</html>
