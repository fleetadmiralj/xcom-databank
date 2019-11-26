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
				<h2>About this Website</h2>
				<p>I wanted to create this website, both to give me some experience doing more programming with PHP and Databases, but also because I thought it would be fun to have a handy place to look up stats from <a href="https://www.youtube.com/user/ChristopherOdd">Christopher Odd's</a> XCOM 2: War of the Chosen YouTube series</a> at a glance.</p>
				
				<p>For season 5, Stats are being counted thus:</p>
				
				<ul>
					<li>Shots: All shots that are at enemies or damage enemies (eg at explosives, claymores, etc) are counted. Shots towards objects such as the Chosen Psi-Capaciter or transmitter nodes are not.</li>
					<li>Melee/Other: This counts all melee attacks (slash, rend, justice, kinetic strike, etc.) whether they are guaranteed or not. Psionic and hacking attempts are not counted.</li>
					<li>Damage: I'm counting damage on any soldier or alien, but not on objects. Once again, I'm also counting all indirect damage (damage from falling, damage from status effects, etc.) as well. All damage from claymores is credited toward the Reaper who threw it (but if someone throws a grenade to blow it up, the grande damage counts towards the thrower).</li>
				</ul>
				
				<h2>MVP Calculations</h2>
				<p>I am also doing my own MVP calculations. While the mod in the game that awards MVP is cool, it can make some really wonky decisions. So I'm doing my own points based MVP calculations, with the following points system:</p>
				<ul>
					<li>Shots with a chance to hit of 60% or better: 1pt for a hit, -1pt for a miss</li>
					<li>Shots with a 31% - 59% chance to hit: 1.5pt for a hit</li>
					<li>Shots with a 30% or under chance to hit: 2pts for a hit</li>
					<li>Overwatch shots: 1pt for a hit, regardless of chance, no penalty for miss</li>
					<li>Melee/Other non-guaranteed attacks: 1pt for a hit, -1pt for a miss</li>
					<li>Damage: 1pt for every point of enemy damage, -2pts for every point of friendly fire damage</li>
					<li>Kills: 3pt for Lost kill, 10pts for ADVENT/Alien kill, 15pts for a Chosen/Ruler kill</li>
				</ul>
				
				<h2>About the Series</h2>
				<p>Obviously, this series is played by and posted by Christopher Odd, but I wanted to post some possibly useful links about and surrounding it anyway:</p>
				<h3>XCOM 2: War of the Chosen Season 5 Links</h3>
				<ul>
					<li><a href="https://www.youtube.com/playlist?list=PLj_Goi54wf0cO-1VtHYJhp476bH7i6nJw">War of the Chosen Season 5 YouTube Playlist</a></li>
					<li><a href="https://steamcommunity.com/sharedfiles/filedetails/?id=1786820449">Season 5 Mod List</a></li>
					<li><a href="https://cdn.discordapp.com/attachments/218080838368231434/632865529937526795/Patreon_Pool_-_13_October.bin">Season 5 Patreon Character Pool</a></li>
					<li><a href="https://docs.google.com/document/d/1XQxuKLAu1ogAOpZE_02p6hcSKBGflVeAUocXX30hLiQ/edit?usp=sharing">Season 5 Roleplay Logs (Episodes 1 - 15)</a></li>
					<li><a href="https://docs.google.com/document/d/12Zff_XPtLTIyOEJzC2LJa9gBcetl5npQzwjB6dkofOU/edit?usp=sharing">Season 5 Roleplay Logs (Episodes 16 - 30)</a></li>
					<li><a href="https://docs.google.com/document/d/1dqxJoFliNOJmv2N0abCP54_LUKFOfF9PUOplFyAlCoM/edit?usp=sharing">Season 5 Roleplay Logs (Episodes 31 - 45)</a></li>
					<li><a href="https://docs.google.com/document/d/1QqE9g-Rinv9PSUtAuw6LsbdKK-U6aZIlOL_bzcv5I5o/edit?usp=sharing">Season 5 ADVENT Roleplay Logs</a></li>
				</ul>
					
					
				<h3>Christopher Odd Links</h3>
				<ul>
					<li><a href="https://www.youtube.com/user/ChristopherOdd">Christopher Odd's YouTube Channel</a></li>
					<li><a href="https://twitter.com/christopher_odd">Christopher Odd's Twitter</a></li>
					<li><a href="https://discord.gg/christopherodd">Christopher Odd's Discord</a></li>
					<li><a href="http://www.patreon.com/christopherodd">Christopher Odd's Patreon</a></li>
				</ul>
				
				<h3>Credits</h3>
				<ul>
					<li><a href="https://getbootstrap.com/">Bootstrap Toolkit</a></li>
					<li><a href="https://jquery.com/">jQuery</a></li>
					<li><a href="http://tablesorter.com/docs/">jQuery Table Sorter 2.0</a> by Christian Bach <a href="https://mottie.github.io/tablesorter/docs/index.html">fork by Rob Garrison</a></li>
					<li><a href="https://igorescobar.github.io/jQuery-Mask-Plugin/">jQuery Mask Plugin</a> by Igor Escobar</li>
					<li><a href="https://www.flaticon.com/packs/military-base">FlatIcon Military Base icon set</a> by <a href="https://www.flaticon.com/authors/freepik">Freepik</a></li>
					<li><a href="https://www.flaticon.com/packs/essential-set-2">FlatIcon Essential icon set</a> by <a href="https://www.flaticon.com/authors/smashicons">Smashicons</a></li>
					<li><a href="https://www.flaticon.com/packs/business-collection-6">FlatIcon Business Collection icon set</a> by <a href="https://www.flaticon.com/authors/gregor-cresnar">Gregor Cresnar</a></li>
			</div>
		</div>
	<?php include_once '/home/joshch9/xcom-databank/php/page-footer.php' ?>
	<?php include_once '/home/joshch9/xcom-databank/php/scripts-include.php' ?>
	</body>
</html>