<?php
/**
 * Created by PhpStorm.
 * User: stephen
 * Date: 7/17/14
 * Time: 12:10 AM
 */
?>

<?php if (is_single()): ?>

<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
<?php the_content(); ?>

<?php else: ?>

<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
<?php the_content(); ?>
<small>By <?php the_author_posts_link() ?></small>

    <div class="post-meta-wrapper">

    <div class="row">

        <div class="col-sm-6 col-md-4">
            <p><span class="glyphicon glyphicon-time"></span> <?php the_time('F jS, Y') ?></p>
        </div>

        <?php $categories = get_the_category(); ?>
        <?php if ($categories): ?>
        <div class="col-sm-6 col-md-4">
            <span class="glyphicon glyphicon-folder-open"></span>
                <?php foreach( $categories as $category ): ?>
                    <a href="<?php echo get_category_link( $category->term_id ) ?>"
                       title="<?php echo esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) ?>">
                        &nbsp;<?php echo $category->cat_name ?>
                    </a>
                <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <?php $tags = get_the_tags(); ?>
        <?php if ($tags): ?>
        <div class="col-sm-6 col-md-4">
            <span class="glyphicon glyphicon-tag"></span>

                <?php foreach( $tags as $tag ): ?>
                    <a href="<?php echo get_tag_link( $tag->term_id ); ?>">
                        <?php echo $tag->name ?>
                    </a>
                <?php endforeach; ?>
        </div>
        <?php endif; ?>

    </div>

</div>

<?php endif; ?>