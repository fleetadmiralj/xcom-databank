<?php include_once '/home/joshch9/project/frontInclude.php' ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include_once '/home/joshch9/xcom-databank/php/ga.php' ?>
		<?php include_once '/home/joshch9/xcom-databank/php/header-include.php' ?>
	</head>
	<body>
		<div id="main">
			<div id="page-top">
				<?php include_once '/home/joshch9/xcom-databank/php/page-head.php' ?>
				<?php include_once '/home/joshch9/xcom-databank/php/page-nav.php' ?>
			</div>
			<div class="container">
				<h2>MOCX List</h2>
				<?php
					if($_SERVER['REQUEST_URI'] == "mocxList.php") {
						createMOCXList(0);
					}
					elseif($_SERVER['REQUEST_URI'] == "/mocx/") {
						createMOCXList(1);
					}
				?>

			</div>
		</div>
	<?php include_once '/home/joshch9/xcom-databank/php/page-footer.php' ?>
	<?php include_once '/home/joshch9/xcom-databank/php/scripts-include.php' ?>
	<script src="/js/soldier-table-sort.js"></script>
	</body>
</html>