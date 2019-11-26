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

<?php
	if(isset($_GET['id'])) {
		$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
		if(is_numeric($id) and is_integer((int) $id)) {
			getEpisode("id", $id);
		}
	}
	elseif(isset($_GET['name'])) {
		$name = $_GET['name'];
		getEpisode("name", $name);
	}
	else { ?>
		<h2>So Commander, what exactly DID you do to humanity when ADVENT captured you?</h2>
		<p>There was an error attempting to retrieve that mission.</p>
		<?php
	}
?>
			</div>
		</div>
	<?php include_once '/home/joshch9/xcom-databank/php/page-footer.php' ?>
	<?php include_once '/home/joshch9/xcom-databank/php/scripts-include.php' ?>
	<script src="/js/soldier-table-sort.js"></script>
	<script src="/js/alien-table-sort.js"></script> 
	</body>
</html>