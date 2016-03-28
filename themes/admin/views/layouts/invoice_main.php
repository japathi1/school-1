<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <?php
      $baseUrl = Yii::app()->theme->baseUrl; 
      $cs = Yii::app()->getClientScript();
      Yii::app()->clientScript->registerCoreScript('jquery');
    ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>/dist/css/invoice.css">
  </head>
  <body>
  		<?php echo $content; ?> 
      <script type="text/javascript">
        (function(d){
          var js, id = 'cirkle-iapi', ref = d.getElementsByTagName('script')[0];
          if (d.getElementById(id)) {return;}
          js = d.createElement('script'); js.id = id;;
          js.src = "//cdn.cirklepay.com/api/cirklepay.iapi-1.0.1.js";
          ref.parentNode.insertBefore(js, ref);
        }(document));
      </script>
  </body>
</html>