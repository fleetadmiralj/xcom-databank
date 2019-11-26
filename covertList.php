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
				<h2>Covert Actions List</h2>
				<?php
					if($_SERVER['REQUEST_URI'] == "covertList.php") {
						createCovertList(0);
					}
					elseif($_SERVER['REQUEST_URI'] == "/covert/") {
						createCovertList(1);
					}
				?>

			</div>
		</div>
	<?php include_once '/home/joshch9/xcom-databank/php/page-footer.php' ?>
	<?php include_once '/home/joshch9/xcom-databank/php/scripts-include.php' ?>
	<script src="/js/covert-table-sort.js"></script>
	</body>
</html>