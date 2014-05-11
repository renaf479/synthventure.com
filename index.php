<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Synth</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/main.min.css">
    </head>
    <body>
    	<?php
    		preg_match("`(?<=\.)\w+$`", $_SERVER['SERVER_NAME'], $tld);
    		switch($tld[0]) {
    			case 'technology':
    				$company	= 'technology';
    				break;
	    		default:
	    			$company	= '________';
	    			break;
    		}
    	?>
    	<div id="content">
    		<div id="synth_venture">
    			<div id="synth" class="inline">synth//</div><?php echo $company;?>
    		</div>
    	</div>
    	<footer id="copyright">
			Copyright &copy; 2014 <a href="mailto:contact@synthventure.com">Synth Venture</a>
		</footer>
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
		  ga('create', 'UA-50432975-1', 'synthventure.com');
		  ga('send', 'pageview');
		
		</script>
    </body>
</html>
