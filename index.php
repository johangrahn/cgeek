<?php 

// Set error reporting for the site
// This should be set to 0 / off in production
error_reporting( E_ALL );
ini_set( "display_errors", "on");

require( "lib/NewsItem.class.php" );

$newsItems = array(
	new NewsItem( 'GIT repository for the source - 2010-03-05', 'The source code for my site is now on GitHub, so if you are interested on how my site is build the URL is:
	<a href="http://github.com/high/cgeek">http://github.com/high/cgeek</a>.' ),
	new NewsItem( 'New site up - 2010-03-05', 'Well, here is the new site. My goal is to make it as simple as possible and just display the things that are essential to me. There is no PHP or database
	backend witch means it is only one HTML-file. It is portable and easy to use. No GUI is necessary to read or write.')
);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		<title>High's page</title>
		<link rel="stylesheet" type="text/css" href="site.css" />
	</head>
	
	<body>
		<div id="content">
			<h1>
				My Life&trade;
			</h1>
			
			<p><i>
				This is my page about me. Now, you may have noticed that there is no color or graphics on this page. 
				The theme is inspired by the clean theme from <a href="http://mnmlist.com/">mnmlist.com</a> written by Leo Babauta.
				The purpose is that I want people to read what I'm writing, not looking at the pretty colors or the fancy pictures.  
			</i></p>
			
			<h2>News</h2>
		
			<?php foreach( $newsItems as $newsItem ): ?> 
			<h3><?php echo $newsItem->getTitle() ?></h3>
			<p>
				<?php echo $newsItem->getContent() ?>
			</p>
			<?php endforeach; ?>
		</div>
	</body>
</html>