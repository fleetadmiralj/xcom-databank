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

					/* Soldier Statistics:
							- Number of Soldiers
							- Number of Soldiers by Rank
							- Number of Soldiers by Class
							- Number of Soldiers Currently Killed
							- Total shots, damage, aliens/lost killed
					*/
					$soldierCount = 0;
					$soldierRanks = [];
					$soldierClass = [];
					$soldiersKilled = 0;
					
					$shotsTaken = 0;
					$shotsHit = 0;
					$overwatchTaken = 0;
					$overwatchHit = 0;
					$damage = 0;
					$alienKills = 0;
					$lostKills = 0;
					
					$dbh = openDatabase();
		
					// Get number of soldiers in the db
					$stmt = $dbh->prepare("SELECT * from xcom_soldier");
					$stmt -> execute();
					$soldierCount = $stmt->rowCount();
					
					// Get Count of Soldier Rank Levels
					$stmt = $dbh->prepare("SELECT soldier.id, rank.name from xcom_soldier as soldier
						LEFT JOIN xcom_rank as rank on rank.id = soldier.rank_id");
					$stmt -> execute();
						
					$soldierRanks[8] = 0;
					$soldierRanks[7] = 0;
					$soldierRanks[6] = 0;
					$soldierRanks[5] = 0;
					$soldierRanks[4] = 0;
					$soldierRanks[3] = 0;
					$soldierRanks[2] = 0;
					$soldierRanks[1] = 0;
						
					while ($row = $stmt->fetch()) {
						if($row['name'] == "Rookie")
							$soldierRanks[1]++;
						if($row['name'] == "Squaddie" or $row['name'] == "Initiate" or $row['name'] == "Squire")
							$soldierRanks[2]++;
						if($row['name'] == "Corporal" or $row['name'] == "Acolyte" or $row['name'] == "Aspirant")
							$soldierRanks[3]++;
						if($row['name'] == "Sergeant" or $row['name'] == "Adept" or $row['name'] == "Knight")
							$soldierRanks[4]++;
						if($row['name'] == "Lieutenant" or $row['name'] == "Disciple" or $row['name'] == "Cavalier")
							$soldierRanks[5]++;
						if($row['name'] == "Captain" or $row['name'] == "Mystic" or $row['name'] == "Vanguard")
							$soldierRanks[6]++;
						if($row['name'] == "Major" or $row['name'] == "Warlock" or $row['name'] == "Paladin")
							$soldierRanks[7]++;
						if($row['name'] == "Colonel" or $row['name'] == "Magus" or $row['name'] == "Champion")
							$soldierRanks[8]++;
					}
					
					// Get Count of Soldier Classes
					$stmt = $dbh->prepare("SELECT soldier.id, class.name from xcom_soldier as soldier
						LEFT JOIN xcom_class as class on class.id = soldier.class_id");
					$stmt -> execute();
					
					while ($row = $stmt->fetch()) {
						$soldierClass[$row['name']]++;
					}
					arsort($soldierClass);
					
					// Get Soldier Killed Count
					$stmt = $dbh->prepare("SELECT * from xcom_soldier WHERE killed = 1");
					$stmt -> execute();
					$soldiersKilled = $stmt->rowCount();
					
					// Get Battle Statistics
					$stmt = $dbh->prepare("SELECT * from xcom_soldier_mission");
					$stmt -> execute();
					
					while ($row = $stmt->fetch()) {
						$shotsTaken += $row['shots_taken'];
						$shotsHit += $row['shots_hit'];
						$overwatchTaken += $row['overwatch_taken'];
						$overwatchHit += $row['overwatch_hit'];
						$meleeTaken += $row['melee_taken'];
						$meleeHit += $row['melee_hit'];
						$damage += $row['damage'];
						$alienKills += $row['killed_aliens'];
						$lostKills += $row['killed_lost'];
					}
					
					$shotPct = round($shotsHit / $shotsTaken, 2) * 100;
					$overwatchPct = round($overwatchHit / $overwatchTaken, 2) * 100;
					$meleePct = round($meleeHit / $meleeTaken, 2) * 100;
				?>
				<div class="card mb-3">
					<div class="card-header"><h3 class="mb-0">Soldier Statistics</h3></div>
					<div class="card-body">
						<h5><strong>Total Soldiers:</strong> <?php echo $soldierCount; ?></h5>
						<h5><strong>Soldiers Killed:</strong> <?php echo $soldiersKilled; ?></h5>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 col-xs-6">
						<h3>Soldiers by Rank</h3>
						<table border="0" cellspacing="5" cellpadding="5" class="stats-table">
							<tr>
								<td><strong>Colonels:</strong></td>
								<td><?php echo $soldierRanks[8]; ?></td>
							</tr>
							<tr>
								<td><strong>Majors:</strong></td>
								<td><?php echo $soldierRanks[7]; ?></td>
							</tr>
							<tr>
								<td><strong>Captains:</strong></td>
								<td><?php echo $soldierRanks[6]; ?></td>
							</tr>
							<tr>
								<td><strong>Lieutenants:</strong></td>
								<td><?php echo $soldierRanks[5]; ?></td>
							</tr>
							<tr>
								<td><strong>Sergeants:</strong></td>
								<td><?php echo $soldierRanks[4]; ?></td>
							</tr>
							<tr>
								<td><strong>Corporals:</strong></td>
								<td><?php echo $soldierRanks[3]; ?></td>
							</tr>
							<tr>
								<td><strong>Squaddies:</strong></td>
								<td><?php echo $soldierRanks[2]; ?></td>
							</tr>
							<tr>
								<td><strong>Rookies:</strong></td>
								<td><?php echo $soldierRanks[1]; ?></td>
							</tr>
						</table>
					</div>
					<div class="col-sm-4 col-xs-6">
						<h3>Soldiers by Class</h3>
						<table border="0" cellspacing="5" cellpadding="5" class="stats-table">
							<?
							foreach($soldierClass as $key => $value) { ?>
							<tr>
								<td><strong><?php echo $key; ?></strong></td>
								<td><?php echo $value; ?></td>
							</tr>
							<?php
							}
						?>
						</table>
					</div>
					<div class="col-sm-4 col-xs-6">
						<h3>Battle Statistics</h3>
						<table border="0" cellspacing="5" cellpadding="5" class="stats-table">
							<tr>
								<td><strong>Total Shots:</strong></td>
								<td><?php echo number_format($shotsHit)." / ".number_format($shotsTaken)." (".$shotPct."%)"; ?></td>
							</tr>
							<tr>
								<td><strong>Overwatch Shots:</strong></td>
								<td><?php echo number_format($overwatchHit)." / ".number_format($overwatchTaken)." (".$overwatchPct."%)"; ?></td>
							</tr>
							<tr>
								<td><strong>Melee:</strong></td>
								<td><?php echo number_format($meleeHit)." / ".number_format($meleeTaken)." (".$meleePct."%)"; ?></td>
							</tr>
							<tr>
								<td><strong>Damage Dealt:</strong></td>
								<td><?php echo number_format($damage); ?></td>
							</tr>
							<tr>
								<td><strong>Aliens Killed:</strong></td>
								<td><?php echo number_format($alienKills); ?></td>
							</tr>
							<tr>
								<td><strong>Lost Killed:</strong></td>
								<td><?php echo number_format($lostKills); ?></td>
							</tr>
							<tr>
								<td><strong>Total Killed:</strong></td>
								<td><?php echo number_format($alienKills + $lostKills); ?></td>
							</tr>
						</table>
					</div>
				</div>
				<hr />
				<?php
				
					/* Mission Statistics
							- Total Missions
							- Completed / Failed Missions
							- Missions by Type
							- Missions by Difficulty
							- Missions by Rating
							- Chosen Encounters by Chosen
					*/
				
					$missions = 0;
					$completed = 0;
					$failed = 0;
					$missionType = "";
					$missionArray = [];
					
					$difficulty = [];
					$rating = [];
					$chosen = [];
				
					$stmt = $dbh->prepare("SELECT complete from xcom_mission");
					$stmt -> execute();
					$missions = $stmt->rowCount();
					
					while ($row = $stmt->fetch()) {
						if($row['complete'] == 1)
							$completed += 1;
						else
							$failed += 1;
					}
					
					$stmt = $dbh->prepare("SELECT type.description from xcom_mission as mission
						LEFT JOIN xcom_objective as objective on mission.objective_id = objective.id
						LEFT JOIN xcom_mission_type as type on objective.mission_type_id = type.id");
					$missionFile = file('/home/joshch9/project/config/missionType.txt');
					$stmt -> execute();
					
					while ($row = $stmt->fetch()) {
						$missionType = $row['description'];
						if($missionType == "Gatecrasher" or $missionType == "ADVENT Blacksite" or $missionType == "Codex Brain Coordinates" or $missionType == "Blacksite Data Coordinates" or $missionType == "ADVENT Network Tower" or $missionType == "Alien Fortress") {
							$missionType = "Story Mission";
						}
						elseif($missionType == "Chosen Hunter Stronghold" or $missionType == "Chosen Assassin Stronghold" or $missionType == "Chosen Warlock Stronghold") {
							$missionType = "Chosen Stronghold";
						}
						elseif($missionType == "Triangulated Position" or $missionType == "Encrypted Signal")
							$missionType = "DLC Mission";
						else {
							$missionType = $missionType;
						}
						
						if(array_key_exists($missionType, $missionArray))
							$missionArray[$missionType] += 1;
						else
							$missionArray[$missionType] = 1;
					}
					arsort($missionArray);
					
					$stmt = $dbh->prepare("SELECT * from xcom_mission where difficulty = ?");
					$difficultyFile = file('/home/joshch9/project/config/difficulty.txt');
					foreach($difficultyFile as $name)
					{
						$stmt->bindParam(1, trim($name));
						$stmt -> execute();
						$difficulty[trim($name)] = $stmt->rowCount();
					}
					
					$stmt = $dbh->prepare("SELECT * from xcom_mission where rating = ?");
					$ratingFile = file('/home/joshch9/project/config/rating.txt');
					foreach($ratingFile as $name)
					{
						$stmt->bindParam(1, trim($name));
						$stmt -> execute();
						$rating[trim($name)] = $stmt->rowCount();
					}
					
					$stmt = $dbh->prepare("SELECT mission.id from xcom_mission as mission
						LEFT JOIN xcom_chosen as chosen on chosen.id = mission.chosen_id
						WHERE chosen.type = ?");
					$chosenFile = file('/home/joshch9/project/config/chosen.txt');
					foreach($chosenFile as $name)
					{
						if(trim($name) != "None") {
							$stmt->bindParam(1, trim($name));
							$stmt -> execute();
							$chosen[trim($name)] = $stmt->rowCount();
						}
					}
					arsort($chosen);
					?>
				<div class="card mb-3">
					<div class="card-header"><h3 class="mb-0">Mission Statistics</h3></div>
					<div class="card-body">
						<h5><strong>Total Missions:</strong> <?php echo $missions; ?></h5>
						<h5><strong>Completed:</strong> <?php echo ($completed); ?> | <strong>Failed:</strong> <?php echo $failed; ?></h5>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3 col-xs-6">
						<h3>Mission Types</h3>
						<table border="0" cellspacing="5" cellpadding="5" class="stats-table">
						<?
							foreach($missionArray as $key => $value) { ?>
							<tr>
								<td><strong><?php echo $key; ?></strong></td>
								<td><?php echo $value; ?></td>
							</tr>
							<?php
							}
						?>
						</table>
					</div>
					<div class="col-sm-3 col-xs-6">
						<h3>Mission Difficulty</h3>
						<table border="0" cellspacing="5" cellpadding="5" class="stats-table">
						<?
							foreach($difficulty as $key => $value) { ?>
							<tr>
								<td><strong><?php echo $key; ?></strong></td>
								<td><?php echo $value; ?></td>
							</tr>
							<?php
							}
						?>
						</table>
					</div>
					<div class="col-sm-3 col-xs-6">
						<h3>Mission Ratings</h3>
						<table border="0" cellspacing="5" cellpadding="5" class="stats-table">
						<?
							foreach($rating as $key => $value) { ?>
							<tr>
								<td><strong><?php echo $key; ?></strong></td>
								<td><?php echo $value; ?></td>
							</tr>
							<?php
							}
						?>
						</table>
					</div>
					<div class="col-sm-3 col-xs-6">
						<h3>Chosen Encounters</h3>
						<table border="0" cellspacing="5" cellpadding="5" class="stats-table">
						<?
							foreach($chosen as $key => $value) { ?>
							<tr>
								<td><strong><?php echo $key; ?></strong></td>
								<td><?php echo $value; ?></td>
							</tr>
							<?php
							}
						?>
						</table>
					</div>
				</div>
				<hr />
				<?php
					/* Covert Op Stats
							- Total Covert Ops
							- Covert Ops by Faction
							- Covert Ops by Soldier
					*/
					
					$covertOps = 0;
					$faction = [];
					$operative = [];
					$operativeName = [];
					
					$stmt = $dbh->prepare("SELECT * from xcom_covert_action");
					$stmt -> execute();
					$covertOps = $stmt->rowCount();
					
					$stmt = $dbh->prepare("SELECT * from xcom_covert_action where faction = ?");
					$factionFile = file('/home/joshch9/project/config/faction.txt');
					foreach($factionFile as $name)
					{
						$stmt->bindParam(1, trim($name));
						$stmt -> execute();
						$faction[trim($name)] = $stmt->rowCount();
					}
					arsort($faction);
					
					$stmt = $dbh->prepare("SELECT id FROM xcom_soldier");
					$stmt -> execute();
					while ($row = $stmt->fetch()) {
						$operative[$row['id']] = 0;
					}
					
					$stmt = $dbh->prepare("SELECT soldier.first_name, soldier.last_name, soldier.nickname from xcom_covert_operative as operative
						LEFT JOIN xcom_soldier as soldier on operative.soldier_id = soldier.id
						WHERE operative.soldier_id IS NOT NULL
                        ORDER BY soldier.last_name");
					$stmt -> execute();
					while ($row = $stmt->fetch()) {
					$name = $row['first_name'].' "'.$row['nickname'].'" '.$row['last_name'];
						if(array_key_exists($name, $operativeName))
							$operativeName[$name] += 1;
						else
							$operativeName[$name] = 1;
					}
					arsort($operativeName);  
				?>
				<div class="card mb-3">
					<div class="card-header"><h3 class="mb-0">Covert Action Statistics</h3></div>
					<div class="card-body">
						<h5><strong>Total Covert Actions:</strong> <?php echo $covertOps; ?></h5>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 col-xs-6">
						<h3>Actions by Faction</h3>
						<table border="0" cellspacing="5" cellpadding="5" class="stats-table">
						<?
							foreach($faction as $key => $value) { ?>
							<tr>
								<td><strong><?php echo $key; ?></strong></td>
								<td><?php echo $value; ?></td>
							</tr>
							<?php
							}
						?>
						</table>
					</div>
					<div class="col-sm-4 col-xs-6">
						<h3>Actions by Soldier</h3>
						<table border="0" cellspacing="5" cellpadding="5" class="stats-table">
						<?
							foreach($operativeName as $key => $value) { ?>
							<tr>
								<td><strong><?php echo $key; ?></strong></td>
								<td><?php echo $value; ?></td>
							</tr>
							<?php
							}
						?>
						</table>
					</div>
				</div>
				<hr />
				<?php
					/* Alien Statistics
						- Total Aliens
						- Total Lost
						- Total Aliens Encountered/Killed by Alien
						- Total Lost Encountered/Killed by Lost
					*/
					
					$totalAliens = 0;
					$totalLost = 0;
					$aliensKilled = 0;
					$lostKilled = 0;
					$aliens = [];
					$lost = [];
					$lostPct = 0;
					$alienPct = 0;
					
					$stmt = $dbh->prepare("SELECT ma.id, ma.encountered as encountered, ma.killed as killed, aliens.name as alien, type.name as type from xcom_mission_alien as ma
						LEFT JOIN xcom_aliens as aliens on ma.alien_id = aliens.id
						LEFT JOIN xcom_alien_type as type on aliens.type_id = type.id
						ORDER BY type.name, aliens.name");
					$stmt -> execute();

					while ($row = $stmt->fetch()) {
						if($row['type'] != "The Lost") {
							$totalAliens += $row['encountered'];
							$aliensKilled += $row['killed'];
							
							$aliens[$row['type']][$row['alien']]['encountered'] += $row['encountered'];
							$aliens[$row['type']][$row['alien']]['killed'] += $row['killed'];
							$aliens[$row['type']]['encountered'] += $row['encountered'];
							$aliens[$row['type']]['killed'] += $row['killed'];
						} else {
							$totalLost += $row['encountered'];
							$lostKilled += $row['killed'];
							
							$aliens[$row['type']][$row['alien']]['encountered'] += $row['encountered'];
							$aliens[$row['type']][$row['alien']]['killed'] += $row['killed'];
							$aliens[$row['type']]['encountered'] += $row['encountered'];
							$aliens[$row['type']]['killed'] += $row['killed'];
						}
					}
					array_multisort(array_column($aliens, 'encountered'), SORT_DESC, $aliens);
					
					$alienPct = round($aliensKilled / $totalAliens, 2) * 100;
					$lostPct = round($lostKilled / $totalLost, 2) * 100;
				?>
				<div class="card mb-3">
					<div class="card-header"><h3 class="mb-0">Alien Statistics</h3></div>
					<div class="card-body">
						<p>Numbers may differ from soldier stats due to Aliens and Lost killing each other</p>
						<h5><strong>Aliens Killed/Encountered:</strong> <?php echo $aliensKilled." / ".$totalAliens." (".$alienPct."%)"; ?></h5>
						<h5><strong>Lost Killed/Encountered:</strong> <?php echo $lostKilled." / ".$totalLost." (".$lostPct."%)"; ?></h5>
					</div>
				</div>
				<div class="row">
				<h3 class="col-12">Killed/Encountered by Alien</h3>
						<?
							foreach($aliens as $key => $value) { 
								$killPct = round($value['killed'] / $value['encountered'], 2) * 100;
							?>
					<div class="col-12 col-md-6 col-lg-4 mb-3">
						<div class="card">
							<div class="card-header"><strong><?php echo $key; ?></strong> - <?php echo $value['killed']." / ".$value['encountered']." (".$killPct."%)"; ?></div>
							<?php
								$alien = $value;
								arsort($alien);
								foreach($alien as $key => $value) {
							?>
							<ul class="list-group list-group-flush">
							<?php
									if($key != "killed" and $key != "encountered") {
										$killPct = round($value['killed'] / $value['encountered'], 2) * 100;
							?>
							<li class="list-group-item"><strong><?php echo $key; ?></strong> - <?php echo $value['killed']." / ".$value['encountered']." (".$killPct."%)"; ?></li>
							<?php
									}
							?>
							</ul>
							<?php
								}
							?>
						</div>
					</div>
						<?php
							}
						?>
				</div>
				
			</div>
		</div>
	<?php include_once '/home/joshch9/xcom-databank/php/page-footer.php' ?>
	<?php include_once '/home/joshch9/xcom-databank/php/scripts-include.php' ?>
	<script src="/xcom/js/soldier-table-sort.js"></script>
	</body>
</html>