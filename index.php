<?php
	require_once( 'library/photoshelter.class.php' );
	$args = array( 'username' => 'poraschaudhary' );
	$ps = new PHOTOSHELTER($args);
	$user = $ps->user_detail();
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo _CODENAME; ?> v <?php echo _VERSION; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="Photoshelter, PhotoshelterAPI, GitHub Project, Ulhas Vardhan Golchha">
		<meta name="description" content="Unofficial PhotoshelterAPI for putting up the gallery on your non Photoshelter websites.">
		<meta name="author" content="Ulhas Vardhan Golchha">
		<link href="https://plus.google.com/100459034318170995980/" rel="publisher">
		<meta property="fb:admins" content="619145803">
		<!--[if lt IE 9]>
		<script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css" type="text/css" />
		<link rel="stylesheet" href="css/bootstrap-extended.min.css" type="text/css" />	
	</head>

	<body data-spy="scroll">

		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="brand" href="./"><?php echo _CODENAME; ?></a>
					<div class="nav-collapse" id="main-menu">
						<ul class="nav pull-right" id="main-menu-rights">
							<li><a href="http://www.technologyunited.in/" target="_blank" onclick="_gaq.push(['_trackEvent', 'Navigation actions', 'Navigation links', 'Technology United']);">Technology United</a></li>
							<li><a href="http://www.ulhas.net/" target="_blank" onclick="_gaq.push(['_trackEvent', 'Navigation actions', 'Navigation links', 'Ulhas Vardhan Golchha']);">Ulhas Vardhan Golchha</a></li>
							<li><a href="<?php echo _URL; ?>/issues" target="_blank" onclick="_gaq.push(['_trackEvent', 'Navigation actions', 'Navigation links', 'Photoshelter Feedback/Issues']);">Feedback/Issues</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<section>
				<div class="row">
					<div class="span12">
						<div class="page-header">
							<h1><?php echo _CODENAME; ?><small>v <?php echo _VERSION; ?></small><small><a href="<?php echo _URL; ?>" target="_blank" onclick="_gaq.push(['_trackEvent', 'Body actions', 'Body links', 'GitHub Project']);" title="<?php echo _CODENAME; ?>">GitHub</a></small></h1>
						</div>
					</div>
				</div>
				<?php if ( $user ) { ?>
				<div class="row">
					<div class="span4">
						<div class="page-header">
							<h3><?php echo '<a href="' . $user['_link'] . '" target="_blank" onclick="_gaq.push([\'_trackEvent\', \'Body actions\', \'Body links\', \'' . $user['_title'] . '\']);">' . $user['_title'] . '</a>'; ?><small><?php echo $user['_updated']; ?></small></h3>
						</div>
						<?php echo $ps->list_gallery_names(); ?>
					</div>
					<div class="span8">
						<?php echo $ps->list_gallery(); ?>
					</div>
				</div>
				<?php } ?>
			</section>

			<footer class="footer">
				<div class="row">
					<div class="span12">
						<div class="social">
							<ul class="social-buttons">
							  <li>
								<iframe class="github-btn" src="http://ghbtns.com/github-btn.html?user=golchha21&amp;repo=PhotoshelterAPI&amp;type=watch&amp;count=true" allowtransparency="true" frameborder="0" height="20px" scrolling="0" width="100px"></iframe>
							  </li>
							  <li>
								<iframe class="github-btn" src="http://ghbtns.com/github-btn.html?user=golchha21&amp;repo=PhotoshelterAPI&amp;type=fork&amp;count=true" allowtransparency="true" frameborder="0" height="20px" scrolling="0" width="102px"></iframe>
							  </li>
							  <li>
								<iframe class="github-btn" src="http://ghbtns.com/github-btn.html?user=golchha21&type=follow&count=true" allowtransparency="true" frameborder="0" scrolling="0" width="165" height="20"></iframe>
							  </li>
							  <li>
								<a href="https://twitter.com/golchha21" class="twitter-follow-button" data-link-color="#0069D6" data-show-count="true">Follow @golchha21</a>
							  </li>
							  <li>
								<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo _URL; ?>" data-text="Unofficial PhotoshelterAPI for putting up the gallery on your non Photoshelter websites." data-via="golchha21">Tweet</a></iframe>
							  </li>
							  <li>
								<span class="g-plusone" data-size="tall" data-annotation="inline" data-width="120" data-href="<?php echo _URL; ?>"></span>
							  </li>
							  <li>
								<span class="fb-like" data-href="<?php echo _URL; ?>" data-send="true" data-layout="button_count" data-width="150" data-show-faces="false"></span>
							  </li>
							</ul>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="span4">
						<div class="page-header">
							<h4>Catch me at: </h4>
						</div>
						<ul class="social_icons">
							<li class="facebook"><a data-original-title="Find us on Facebook" id="tfacebook" href="https://www.facebook.com/golchha21" rel="tooltip" target="_blank" onclick="_gaq.push(['_trackEvent', 'Footer actions', 'Social links', 'Facebook']);">Facebook<span></span></a></li>
							<li class="twitter"><a data-original-title="Follow us on Twitter" id="ttwitter" href="https://www.twitter.com/golchha21" rel="tooltip" target="_blank" onclick="_gaq.push(['_trackEvent', 'Footer actions', 'Social links', 'Twitter']);">Twitter<span></span></a></li>
							<li class="googleplus"><a data-original-title="Follow us on Google+" id="tgoogleplus" href="https://plus.google.com/100459034318170995980" rel="tooltip" target="_blank" onclick="_gaq.push(['_trackEvent', 'Footer actions', 'Social links', 'Google+']);">Google+<span></span></a></li>
							<li class="linkedin"><a data-original-title="Follow us on LinkedIn" id="tlinkedin" href="http://www.linkedin.com/in/golchha21" rel="tooltip" target="_blank" onclick="_gaq.push(['_trackEvent', 'Footer actions', 'Social links', 'LinkedIn']);">LinkedIn+<span></span></a></li>
						</ul>
					</div>
					<div class="span8">
						<div class="page-header">
							<h4>Credits: </h4>
						</div>
						<p>Supported by <a href="http://www.technologyunited.in/" id="credittuamc" target="_blank" onclick="_gaq.push(['_trackEvent', 'Footer actions', 'Footer links', 'Supported by']);">Technology United</a>. Developed by <a href="http://www.ulhas.net" target="_blank" onclick="_gaq.push(['_trackEvent', 'Footer actions', 'Social links', 'Developed by Ulhas Vardhan Golchha']);">Ulhas Vardhan Golchha</a>.<br/>Code licensed under the <a href="http://www.apache.org/licenses/LICENSE-2.0" target="_blank" onclick="_gaq.push(['_trackEvent', 'Footer actions', 'Social links', 'Apache License v2.0']);">Apache License v2.0</a>.</p>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="span12">
						<p class="copyright pull-left">Copyright &copy; 2013, <a href="http://www.technologyunited.in/" id="credittuamc" target="_blank" onclick="_gaq.push(['_trackEvent', 'Footer actions', 'Footer links', 'Copyright']);" title="Technology United">Technology United</a>. All rights reserved.</p>
						<p class="pull-right"><a href="#top">Back to top</a></p>
					</div>
				</div>
			</footer>

		</div>
		
		<script src='js/jquery.js'></script>
		<script src='js/bootstrap.min.js'></script>
		<script src='js/jquery.smooth-scroll.min.js'></script>
		<script src='js/jquery.masonry.js'></script>
		<script src='js/social.tracker.js'></script>
		<script src='js/prettify.js'></script>
		<script src='js/scripts.js'></script>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		<script type='text/javascript'>
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-5397392-9']);
		  _gaq.push(['_trackPageview']);
		  
		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		  (function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=220974161291591";
			fjs.parentNode.insertBefore(js, fjs);
		  }(document, 'script', 'facebook-jssdk'));
	
		  (function() {
			var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
			po.src = 'https://apis.google.com/js/plusone.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
		  })();
		  
		  _ga.trackTwitter();
		  _ga.trackFacebook();
		</script>
	</body>
</html>