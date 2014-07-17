<?php get_header(); ?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="jumbotron">
        <div class="container">
            <h1><?php the_title() ?></h1>
            <small><span class="glyphicon glyphicon-time"></span> <?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></small>
            <!--p><a class="btn btn-inverse btn-lg" role="button">Learn more &raquo;</a></p-->
        </div>
    </div>

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">

                <div class="col-md-6 col-md-offset-3">
                    <?php get_template_part( 'content', get_post_format() ); ?>
                </div>

                <div class="col-md-6 col-md-offset-3">
                    <?php comments_template(); ?>
                </div>

        </div>

        <hr>

    </div>

<?php endwhile; else: ?>
    <div class="col-md-6 col-md-offset-3">
        No Posts
    </div>
<?php endif; ?>

<?php get_footer(); ?>