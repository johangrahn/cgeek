<?php 

// Set error reporting for the site
// This should be set to 0 / off in production
error_reporting( E_ALL );
ini_set( "display_errors", "on");

// Automaticly loads each class that is needed by including 
// the definition from a file 
function __autoload( $class ) {
	$fileName = "lib/" . $class . ".class.php";
	
	if( file_exists( $fileName ) ) {
		require( $fileName );
	}
}

// This class creates an RSS feed string that can be put inside a file or directly 
// to the webbrowser 
class RSSFeed {
	
	private $newsItems;
	
	// Sets the news items that the RSS feed will contain 
	public function setNewsItems( array $newsItems ) {
		$this->newsItems = $newsItems;
	}
	
	// Return a valid RSS string of a given news items 
	public function compile() {
		$rss = '<?xml version="1.0" encoding="UTF-8" ?>
		<rss version="2.0">

		<channel>
		  <title>High\'s life &trade;</title>
		  <link>http://cgeek.net</link>
		  <description>My life on the digital media</description>';
		
		foreach( $this->newsItems as $item ) {
			$rss .= '
			<item>
			    <title>' . $item->getTitle() . '</title>
			    <link></link>
			    <description>' . $item->getContent() . '</description>
			</item>';
		}
		
		$rss .= '
			</channel>
		</rss>';
		
		return $rss;
	}
}

$newsData = array( 'title' => 'GIT repository for the source', 
				'content' => 'The source code for my site is now on GitHub, so if you are interested on how my site is build the URL is:
<a href="http://github.com/high/cgeek">http://github.com/high/cgeek</a>.', 
			'created' => mktime( 0,0,0, 3,14, 2009 )
);

$newsItem = new NewsItem();
$newsItem->loadData( $newsData );
$newsItems[] = $newsItem;

$newsData = array( 'title' => 'New site is up', 
				'content' => 'Well, here is the new site. My goal is to make it as simple as possible and just display the things that are essential to me', 
			'created' => mktime( 0,0,0, 3,12, 2010 )
);

$newsItem = new NewsItem();
$newsItem->loadData( $newsData );
$newsItems[] = $newsItem;

$rss = new RSSFeed();
$rss->setNewsItems( $newsItems );
$rssText = $rss->compile();


file_put_contents( "rss.xml", $rssText );

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		<title>High's page</title>
		<link rel="stylesheet" type="text/css" href="site.css"></link>
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
			<h3><?php echo $newsItem->getTitle() ?> - <?php echo DateFormat::toNewsDate( $newsItem->getCreatedTimestamp() ) ?></h3>
			<p>
				<?php echo $newsItem->getContent() ?>
			</p>
			<?php endforeach; ?>
		</div>
	</body>
</html>