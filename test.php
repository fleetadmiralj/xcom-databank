
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>War of the Chosen - Season 3 Databank</title>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Ubuntu:500" rel="stylesheet">
<link rel="stylesheet" href="/xcom/css/style.css">
<link rel="stylesheet" href="/xcom/css/footable.bootstrap.min.css">	</head>
	<body>
		<div id="main">
			<div id="page-top">
				<header>
					<div id="head-container">
						<div id="head-small">Christopher Odd's</div>
						<h1 id="head-main">War of the Chosen - Season 3 Databank</h1>
					</div>
				</header>				
				<nav id="navigation">
					<ul id="nav-list">
						<li class="nav-item home"><a href="/xcom/"><span class="mobile-icon"><img src="/xcom/img/icons/nav/home.png" alt="Home" /></span>This is a long link name</a></li>
						<li class="nav-item soldiers"><a href="/xcom/soldier/"><span class="mobile-icon"><img src="/xcom/img/icons/nav/soldiers.png" alt="Soldiers List" /></span>This is a long link name</a></li>
						<li class="nav-item missions"><a href="/xcom/mission/"><span class="mobile-icon"><img src="/xcom/img/icons/nav/missions.png" alt="Mission List" /></span>This is a long link name</a></li>
						<li class="nav-item covert"><a href="/xcom/covert/"><span class="mobile-icon"><img src="/xcom/img/icons/nav/covert.png" alt="Covert Actions" /></span>This is a long link name</a></li>
						<li class="nav-item gear"><a href="/xcom/gear/">This is a long link name</a></li>
						<li class="nav-item about"><a href="/xcom/about/">This is a long link name</a></li>
						<li class="nav-item more hidden"><a href="#"><span class="mobile-icon"><img src="/xcom/img/icons/nav/menu.png" alt="Expand Menu" /></span>More</a>
							<ul></ul>
						</li>
					</ul>
				</nav>			
			</div>
			<div class="container">
				<h2>XCOM Gear Inventory</h2>
			</div>
		</div>
		<footer id="site-footer">
			<p class="col-md-10 col-md-offset-1 col-xs-12">&copy; <a href="http://www.joshchambers.me/">Josh Chambers</a> - 2018.</p>
		</footer>	
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script defer src="https://use.fontawesome.com/releases/v5.0.2/js/all.js"></script>
		<script src="/xcom/js/jquery.tablesorter.min.js"></script>
		<!-- <script src="/xcom/js/footable.min.js"></script> -->
		<script src="/xcom/js/collapse.js"></script>
		<script src="/xcom/js/jquery.matchHeight.js"></script>
		<script src="/xcom/js/utility.js"></script>	<script src="/xcom/js/covert-table-sort.js"></script>
		
		<script type="text/javascript">
			function calcWidth() {
				console.clear();
				var navwidth = 0;
				console.log('default: ' + navwidth);
				var i = 1;
				var morewidth = $('#nav-list .more').outerWidth(true);
				$('#nav-list > li:not(.more)').each(function() {
					navwidth += $(this).outerWidth( true );
				console.log('Link #' + i + ': ' + $(this).outerWidth(true) + ' (' + navwidth + ')');
					i = i + 1;
				});
				var availablespace = $('nav').outerWidth() - morewidth;
				console.log('nav width: ' + $('nav').outerWidth(true));
				console.log('more width: ' + morewidth);
				console.log('available width (outerWidth(true)): ' + availablespace);
				console.log('available width (outerWidth()): ' + $('nav').outerWidth());
				console.log('available width (innerWidth()): ' + $('nav').innerWidth());
				console.log('available width (width()): ' + $('nav').width());
				console.log('difference: ' + (availablespace - navwidth));
			  
				if (navwidth > availablespace) {
					var lastItem = $('#nav-list > li:not(.more)').last();
					lastItem.attr('data-width', lastItem.outerWidth(true));
					lastItem.prependTo($('#nav-list .more ul'));
					calcWidth();
				} else {
					var firstMoreElement = $('#nav-list li.more li').first();
					if (navwidth + firstMoreElement.data('width') < availablespace) {
						firstMoreElement.insertBefore($('#nav-list .more'));
					}
				}
			  
				if ($('.more li').length > 0) {
					$('.more').css('display','inline-block');
				} else {
					$('.more').css('display','none');
				}
			}
			
			$(window).on('resize load',function(){
				calcWidth();
			});
		</script>
	</body>
</html>