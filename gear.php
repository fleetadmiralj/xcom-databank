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
				<h2>XCOM Gear Inventory</h2>
				<div class="row gear-row">
				<?php
					getGear('Armor', 'Armor');
					getGear('Weapon (Primary)', 'Primary Weapons');
					getGear('Weapon (Secondary)', 'Secondary Weapons');
					getGear('Utility', 'Utility Items');
					getGear('Grenade', 'Grenades');
					getGear('Ammo', 'Ammo');
					getGear('% Weapon', 'Heavy & Powered Weapons');
					getGear('Attachments', 'Weapon Attachments');
					getGear('PCS Chip', 'PCS Chips');
				?>
				</div>
			</div>
		</div>
	<?php include_once '/home/joshch9/xcom-databank/php/page-footer.php' ?>
	<?php include_once '/home/joshch9/xcom-databank/php/scripts-include.php' ?>
	<script src="/xcom/js/covert-table-sort.js"></script>
	</body>
</html>