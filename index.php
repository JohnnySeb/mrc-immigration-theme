<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>


  </head>

  <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <?php do_action('get_header'); ?>

    <?php echo view(app('sage.view'), app('sage.data'))->render(); ?>
    <script src="https://kit.fontawesome.com/d331117e13.js" crossorigin="anonymous"></script>

    <?php do_action('get_footer'); ?>
    <?php wp_footer(); ?>
  </body>
</html>
