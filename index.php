<?php get_header(); ?>

<div class="jumbotron">
  <div class="container">
    <h1><?php echo bloginfo('title'); ?></h1>
    <p><?php echo bloginfo('description'); ?></p>
    <!--p><a class="btn btn-inverse btn-lg" role="button">Learn more &raquo;</a></p-->
  </div>
</div>

<div class="container">
  <!-- Example row of columns -->
    <div class="row">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="col-md-6 col-md-offset-3">
            <?php get_template_part( 'content', get_post_format() ); ?>
        </div>
        <?php endwhile; else: ?>
        <div class="col-md-6 col-md-offset-3">
            No Posts
        </div>
        <?php endif; ?>

    </div>

  <div class="row">
    <div class="col-md-4">
      <h2>Heading</h2>
      <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
      <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
    </div>
    <div class="col-md-4">
      <h2>Heading</h2>
      <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
      <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
   </div>
    <div class="col-md-4">
      <h2>Heading</h2>
      <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
      <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
    </div>
  </div>

  <hr>
  
</div>

<?php get_footer(); ?>