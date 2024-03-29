<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">

  <!-- Use the .htaccess and remove these lines to avoid edge case issues.
       More info: h5bp.com/b/378 -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Portugal Trip 2011</title>
  <meta name="description" content="">
  <meta name="author" content="Jonathan Kim">

  <!-- Facebook Meta -->
  <meta property="og:title" content=""/>
  <meta property="og:url" content=""/>
  <meta property="og:description" content=""/>
  <meta property="og:type" content="website"/>
  <meta property="og:image" content="img/logo.jpg"/>
  <meta property="fb:admins" content="" />

  <!-- Mobile viewport optimized: j.mp/bplateviewport -->
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->

  <!-- Google webfonts -->
  <link href='http://fonts.googleapis.com/css?family=Delius+Swash+Caps|Alice|The+Girl+Next+Door' rel='stylesheet' type='text/css'>

  <!-- LESS: implied media="all" -->
  <link rel="stylesheet/less" type="text/css/" href="css/style.less">
  <script src="js/libs/less-1.1.4.min.js" type="text/javascript"></script>

  <!-- Fancybox -->
  <link href="css/jquery.fancybox-1.3.4.css" media="screen" rel="stylesheet" />
  <!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->

  <!-- All JavaScript at the bottom, except for this custom Modernizr build containing Respond.
       Modernizr enables HTML5 elements & feature detects; Respond is a polyfill for min/max-width CSS3 Media Queries
       For optimal performance, create your own custom Modernizr build: www.modernizr.com/download/ -->
  <script src="js/libs/modernizr-2.0.6.min.js"></script>
</head>

<body>

  <div id="container">
    <header>
        <h1>Olá!</h1>
    </header>
    <div id="main" role="main">
        <div id="subheader">
            <p>Kim family Portugal trip 2011</p>
        </div>
        <div id="upload_prompt">
            <a href="#" title="Add photos">Add photos</a>
        </div>
        <div id="thankyou">
            <h2>Obrigado!</h2>
            <div id="info">Information about upload</div>
        </div>
        <div id="upload">
            <input id="file_upload" name="file_upload" type="file" />
        </div>

        <div id="photos">
            <?php require_once('dBconnect.php'); ?>
            <?php
                $sql = "SELECT * FROM `portugal_images` WHERE hidden=0 ORDER BY date ASC";
                $rsc = mysql_query($sql);
                while($row = mysql_fetch_array($rsc)) {
            ?>
            <?php
                $max_width = 250;
                $height = $row['height'] / ($row['width'] / $max_width);
            ?>
            <div class="item" style="height: <?php echo $height; ?>px">
                <a class="gallery" rel="gallery1" href="uploads/<?php echo $row['filename']; ?>">
                    <img src="timthumb.php?src=uploads/<?php echo $row['filename']; ?>&w=<?php echo $max_width; ?>" height= "<?php echo $height; ?>" width="<?php echo $max_width;?>"/>
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
    <footer>
    </footer>
  </div> <!--! end of #container -->


  <!-- JavaScript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.6.2.min.js"><\/script>')</script>

  <!-- scripts concatenated and minified via ant build script-->
  <script defer src="js/plugins.js"></script>

  <!-- Masonry -->
  <script type="text/javascript" src="js/mylibs/jquery.masonry.min.js"></script>

  <!-- Uploadify -->
  <script type="text/javascript" src="uploadify/swfobject.js"></script>
  <script type="text/javascript" src="uploadify/jquery.uploadify.v2.1.4.js"></script>

  <!-- Fancybox -->
  <script type="text/javascript" src="js/mylibs/jquery.fancybox-1.3.4.pack.js"></script>

  <script defer src="js/script.js"></script>
  <!-- end scripts-->

  <!-- Change UA-XXXXX-X to be your site's ID -->
  <script>
    window._gaq = [['_setAccount','UAXXXXXXXX1'],['_trackPageview'],['_trackPageLoadTime']];
    Modernizr.load({
      load: ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
    });
  </script>

  <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7 ]>
    <script defer src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script defer>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->

</body>
</html>
