<?php
/*
Template Name: BF Phygital
*/  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" >
<head lang="en-US">
  <!--<meta http-equiv="x-ua-compatible" content="IE=edge">-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <title>Brand Fuel - Let's Get Phygital!</title>

  <!-- Favicons -->
  <link rel="shortcut icon" href="https://www.brandfuel.com/wp-content/uploads/2014/06/57.png">
  <link rel="apple-touch-icon" href="https://www.brandfuel.com/wp-content/uploads/2014/06/57.png">
  <link rel="apple-touch-icon" sizes="114x114" href="https://www.brandfuel.com/wp-content/uploads/2014/06/114.png">
  <link rel="apple-touch-icon" sizes="72x72" href="https://www.brandfuel.com/wp-content/uploads/2014/06/72.png">
  <link rel="apple-touch-icon" sizes="144x144" href="https://www.brandfuel.com/wp-content/uploads/2014/06/144.png">

  <meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1"/>
  <link rel="canonical" href="https://www.brandfuel.com/phygital" />
  <meta property="og:locale" content="en_US" />
  <meta property="og:type" content="article" />
  <meta property="og:title" content="Brand Fuel - Let's Get Phygital!" />
  <meta property="og:description" content="SUBMIT" />
  <meta property="og:url" content="https://www.brandfuel.com/phygital/" />
  <meta property="og:site_name" content="Brand Fuel" />
  <meta property="og:image" content="https://files.brandfuel.com/wp-content/uploads/2014/05/logo2.png" />
  <meta property="og:image:secure_url" content="https://files.brandfuel.com/wp-content/uploads/2014/05/logo2.png" />
  <meta property="og:image:width" content="250" />
  <meta property="og:image:height" content="220" />

  <link href='https://fonts.googleapis.com/css?family=Open Sans:400,900,700,300' rel='stylesheet' type='text/css'>
  <link href="https://6degrees.art/project/css/easter_island.css" rel="stylesheet">
  <script type="text/javascript" src="https://6degrees.art/project/js/easter_island.js"></script>

  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-7229411-11', 'auto');
    ga('send', 'pageview');

  </script>
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="//html5shiv.min.js"></script>
  <script src="//respond.js"></script>
  <![endif]-->

</head>

<body>
  <div id="wrap">

    <div id="main" role="main">

      <div id="content">
        <?php while ( have_posts() ) : the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile; ?>

      </div><!-- // #content -->

    </div><!-- // #main -->

  </div>
</body>
</html>
