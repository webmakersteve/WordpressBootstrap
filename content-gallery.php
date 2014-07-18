<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>

<section class="gallery">

    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
<?php $gallery = get_post_gallery( get_the_ID(), false);

        $ids = explode(",", $gallery['ids']);
        ?><ol class="carousel-indicators"><?php
        foreach ($ids as $k => $id ): ?>
            <li data-target="#carousel-example-generic" data-slide-to="<?=$k?>"<?php if ($k == 0) echo ' class="active"'?>></li>
        <?php endforeach ?>
        </ol>
        <div class="carousel-inner">
        <?php foreach( $gallery['src'] as $k => $img ): ?>
        <!-- Wrapper for slides -->
            <div class="item<?=($k==0) ? ' active':''?>">
                <img src="<?=$img?>" alt="">
            </div>
        <?php endforeach; ?>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>


</section>