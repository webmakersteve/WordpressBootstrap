<?php
/**
 * Created by PhpStorm.
 * User: stephen
 * Date: 7/17/14
 * Time: 12:10 AM
 */
?>
    <h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
    <?php the_content(); ?>
    <small><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></small>