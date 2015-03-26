<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <?php
  $meta = array(
    "title" => "Comparing two years of SXSW side-party permits",
    "description" => "The City of Austin has studied the proliferation of South by Southwest side parties as part of a bigger examination of SXSW safety after the tragic car crash during last year’s SXSW festival that killed four people. And, seperately, a study by SXSW suggested re-evaluating how many pop-up events were allowed during the week of the festival.",
    "thumbnail" => "http://projects.statesman.com/news/sxsw-temporary-permits/assets/share.png", // needs update
    "shortcut_icon" => "http://media.cmgdigital.com/shared/theme-assets/242014/www.statesman.com_5126cb2068bd43d1ab4e17660ac48255.ico",
    "apple_touch_icon" => "http://media.cmgdigital.com/shared/theme-assets/242014/www.statesman.com_fa2d2d6e73614535b997734c7e7d2287.png",
    "url" => "http://projects.statesman.com/news/sxsw-temporary-permits/",
    "twitter" => "statesman"
  );
?>

  <title>Interactive: <?php print $meta['title']; ?> | Austin American-Statesman</title>
  <link rel="shortcut icon" href="<?php print $meta['shortcut_icon']; ?>" />
  <link rel="apple-touch-icon" href="<?php print $meta['apple_touch_icon']; ?>" />

  <link rel="canonical" href="<?php print $meta['url']; ?>" />

  <meta name="description" content="<?php print $meta['description']; ?>">

  <meta property="og:title" content="<?php print $meta['title']; ?>"/>
  <meta property="og:description" content="<?php print $meta['description']; ?>"/>
  <meta property="og:image" content="<?php print $meta['thumbnail']; ?>"/>
  <meta property="og:url" content="<?php print $meta['url']; ?>"/>

  <meta name="twitter:card" content="summary" />
  <meta name="twitter:site" content="@<?php print $meta['twitter']; ?>" />
  <meta name="twitter:title" content="<?php print $meta['title']; ?>" />
  <meta name="twitter:description" content="<?php print $meta['description']; ?>" />
  <meta name="twitter:image" content="<?php print $meta['thumbnail']; ?>" />
  <meta name="twitter:url" content="<?php print $meta['url']; ?>" />

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="dist/style.css">

  <link href='http://fonts.googleapis.com/css?family=Lusitana:400,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Merriweather+Sans:400,300,300italic,400italic,700italic,700,800,800italic' rel='stylesheet' type='text/css'>


  <?php /* CMG advertising and analytics */ ?>
  <?php include "includes/advertising.inc"; ?>
  <?php include "includes/metrics-head.inc"; ?>

</head>
<body>
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="http://www.statesman.com/" target="_blank">
        <img class="visible-xs visible-sm" width="103" height="26" src="assets/logo-short-black.png" />
        <img class="hidden-xs hidden-sm" width="273" height="26" src="assets/logo.png" />
      </a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right social hidden-xs">
        <li><a target="_blank" href="https://www.facebook.com/sharer.php?u=<?php echo urlencode($meta['url']); ?>"><i class="fa fa-facebook-square"></i></a></li>
        <li><a target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo urlencode($meta['url']); ?>&via=<?php print urlencode($meta['twitter']); ?>&text=<?php print urlencode($meta['title']); ?>"><i class="fa fa-twitter"></i></a></li>
        <li><a target="_blank" href="https://plus.google.com/share?url=<?php echo urlencode($meta['url']); ?>"><i class="fa fa-google-plus"></i></a></li>
      </ul>
    </div>
  </div>
</nav>

  <article class="container">
    <div class="row">
      <div class="col-xs-12 header">
        <h1>Comparing two years of SXSW event permits</h1>
        <p>Published Saturday, March 14, 2015</p>
        <p class="author">By Christian McDonald, Andrew Chavez and Lilly Rockwell</p>
        <p>The city of Austin has studied the proliferation of South by Southwest side parties as part of a bigger examination of SXSW safety after the tragic car crash during last year’s festival that killed four people. And, separately, a study by SXSW suggested re-evaluating how many pop-up events were allowed during the week of the festival.</p>
        <p>The below map uses city data to compare the number of temporary permits for South by Southwest week events in 2014 and 2015. Read more: <a href="http://www.mystatesman.com/news/news/local/austin-curbs-temporary-events-during-sxsw-but-not-/nkW68/#f0d9ca8e.257250.735683/" target="_blank">Austin curbs temporary events during SXSW — but not as much as planned</a></p>
      </div>

      <div class="col-md-9 col-sm-8 col-xs-12">
        <div id="map"></div>
      </div>

      <div class="col-md-3 col-sm-4 col-xs-12">
        <div id="year-toggle" class="list-group">
          <div class="list-group-item active">
            <h4 class="list-group-item-heading"><i class="fa fa-filter"></i> Filter by year</h4>
          </div>
          <a href="#" class="list-group-item selected year-2015" data-year="2015">
            <h4 class="list-group-item-heading"><i class="fa fa-square"></i> 2015 <i class="status-icon pull-right"></i></h4>
            <p class="list-group-item-text">Includes South by Southwest events that have been tentatively approved or are under review by the City of Austin.</p>
            <p class="list-group-item-text note"><i class="fa fa-asterisk"></i> <em>Indicates an event that is under review, as of March 13</em></p>
          </a>
          <a href="#" class="list-group-item selected year-2014" data-year="2014">
            <h4 class="list-group-item-heading"><i class="fa fa-circle"></i> 2014 <i class="status-icon pull-right"></i></h4>
            <p class="list-group-item-text">Includes all events during South by Southwest week that were approved by the city.</p>
          </a>
        </div>
      </div>
  </article>

  <!-- bottom matter -->
  <?php include "includes/banner-ad.inc";?>
  <?php include "includes/legal.inc";?>
  <?php include "includes/project-metrics.inc"; ?>
  <?php include "includes/metrics.inc"; ?>

  <script src="dist/scripts.js"></script>

  <?php if($_SERVER['SERVER_NAME'] === 'localhost'): ?>
    <script src="//localhost:35729/livereload.js"></script>
  <?php endif; ?>
</body>
</html>
