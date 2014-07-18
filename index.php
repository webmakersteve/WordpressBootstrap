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

  <hr>
  
</div>

<?php get_footer(); ?>