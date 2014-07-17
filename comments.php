<?php

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>

<div id="comments" class="comments-area">

    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php
            printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'twentythirteen' ),
                number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
            ?>
        </h2>

        <ol class="media-list">
            <?php
            /*
             <ul class="media-list">
              <li class="media">
                <a class="pull-left" href="#">
                  <img class="media-object" src="..." alt="...">
                </a>
                <div class="media-body">
                  <h4 class="media-heading">Media heading</h4>
                  ...
                </div>
              </li>
            </ul>
             */
            ?>
            <?php
            wp_list_comments( array(
                'walker'      => new Bootstrap_Comments_Walker(),
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 74,
            ) );
            ?>
        </ol><!-- .comment-list -->

        <?php
        // Are there comments to navigate through?
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
            ?>
            <nav class="navigation comment-navigation" role="navigation">
                <h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'twentythirteen' ); ?></h1>
                <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentythirteen' ) ); ?></div>
                <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentythirteen' ) ); ?></div>
            </nav><!-- .comment-navigation -->
        <?php endif; // Check for comment navigation ?>

        <?php if ( ! comments_open() && get_comments_number() ) : ?>
            <p class="no-comments"><?php _e( 'Comments are closed.' , 'twentythirteen' ); ?></p>
        <?php endif; ?>

    <?php endif; // have_comments() ?>

    <?php
    $args = array(
        'id_form'           => 'commentform',
        'id_submit'         => 'submit',
        'title_reply'       => __( 'Leave a Reply' ),
        'title_reply_to'    => __( 'Leave a Reply to %s' ),
        'cancel_reply_link' => __( 'Cancel Reply' ),
        'label_submit'      => __( 'Post Comment' ),

        'comment_field' =>  '
            <div class="form-group">
                <label for="comment" class="col-sm-3 control-label">' . _x( 'Comment', 'noun' ) .
                '</label>
                <div class="col-sm-9">
                    <textarea id="comment" name="comment" rows="8" class="form-control" aria-required="true"></textarea>
                </div>
             </div>',

        'must_log_in' => '<p class="must-log-in">' .
            sprintf(
                __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
                wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
            ) . '</p>',

        'logged_in_as' => '<p class="logged-in-as">' .
            sprintf(
                __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ),
                admin_url( 'profile.php' ),
                $user_identity,
                wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
            ) . '</p>',

        'comment_notes_before' => '<p class="comment-notes">' .
            __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) .
            '</p>',

        'comment_notes_after' => '<button type="submit" class="btn btn-default">'.__('Post Comment').'</button>',

        'fields' => apply_filters( 'comment_form_default_fields', array(

                'author' =>
                    '<p class="comment-form-author">' .
                    '<label for="author">' . __( 'Name', 'domainreference' ) . '</label> ' .
                    ( $req ? '<span class="required">*</span>' : '' ) .
                    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                    '" size="30"' . $aria_req . ' /></p>',

                'email' =>
                    '<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' .
                    ( $req ? '<span class="required">*</span>' : '' ) .
                    '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                    '" size="30"' . $aria_req . ' /></p>',

                'url' =>
                    '<p class="comment-form-url"><label for="url">' .
                    __( 'Website', 'domainreference' ) . '</label>' .
                    '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
                    '" size="30" /></p>'
            )
        ),
    );
    ?>

    <?php comment_form($args); ?>

</div><!-- #comments -->