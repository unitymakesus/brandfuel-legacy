<?php
/*
Template Name: BF Phygital
*/  ?>

<!DOCTYPE html>
<html>
<head lang="en-US">
  <!--<meta http-equiv="x-ua-compatible" content="IE=edge">-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Brand Fuel - Let's Get Phygital!</title>

  <!-- Favicons -->
  <link rel="shortcut icon" href="https://www.brandfuel.com/wp-content/uploads/2014/06/57.png">
  <link rel="apple-touch-icon" href="https://www.brandfuel.com/wp-content/uploads/2014/06/57.png">
  <link rel="apple-touch-icon" sizes="114x114" href="https://www.brandfuel.com/wp-content/uploads/2014/06/114.png">
  <link rel="apple-touch-icon" sizes="72x72" href="https://www.brandfuel.com/wp-content/uploads/2014/06/72.png">
  <link rel="apple-touch-icon" sizes="144x144" href="https://www.brandfuel.com/wp-content/uploads/2014/06/144.png">

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

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<link href="https://6degrees.art/project/easter_island.css" rel="stylesheet">
<script  type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script  type="text/javascript" src="https://6degrees.art/project/easter_island.js"></script>
</head>

<body class="page-template-default page page-id-5694 wpb-js-composer js-comp-ver-6.0.5 vc_responsive">
  <div id="fb-root"></div>
  <div id="wrap" class="">

    <div id="main" role="main">

      <div class="top-30">
        <div class="row" id="fullwidth">

          <div id="content" class="col-md-12 bottom-sm-30">

            <!--content goes in here-->
            <?php while ( have_posts() ) : the_post(); ?>

              <?php the_content(); ?>

            <?php endwhile; ?>


          </div><!-- // #content -->


        </div><!-- // .row -->
      </div><!-- // .top-30 -->

    </div><!-- // #main -->

  </div>
</body>
</html>
