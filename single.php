<?php get_header(); ?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="jumbotron">
        <div class="container">
            <h1><?php the_title() ?></h1>
            <small><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></small>
            <!--p><a class="btn btn-inverse btn-lg" role="button">Learn more &raquo;</a></p-->
        </div>
    </div>

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">

                <div class="col-md-6 col-md-offset-3">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                    <?php the_content(); ?>

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