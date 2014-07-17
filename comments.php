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

            <?php
            wp_list_comments( array(
                'walker'      => new Bootstrap_Comments_Walker(),
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 64,
            ) );
            ?>

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
        'comment_field' =>
            '<div class="form-group">
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

        'logged_in_as' => '<div class="form-group form-group-submit">
                <div class="col-sm-offset-3 col-sm-9"><p class="logged-in-as">' .
            sprintf(
                __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ),
                admin_url( 'profile.php' ),
                $user_identity,
                wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
            ) . '</p></div></div>',

        'comment_notes_before' => '<p class="comment-notes">' .
            __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) .
            '</p>',

        'comment_notes_after' =>
            '<div class="form-group form-group-submit">
                <div class="col-sm-offset-3 col-sm-9" style="text-align:right;padding-top:15px;">
                    <button type="submit" class="btn btn-default">'.__('Post Comment').'</button>
                </div>
             </div>',

        'fields' => apply_filters( 'comment_form_default_fields', array(

                'author' =>
                    '<div class="form-group">
                       <label for="author" class="col-sm-3 control-label">' . __( 'Name', 'domainreference' ) .
                        '</label>
                        <div class="col-sm-9">
                            <input id="author" name="author" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                    '" ' . $aria_req . ' />
                        </div>
                     </div>',

                'email' =>
                    '<div class="form-group">
                           <label for="email" class="col-sm-3 control-label">' . __( 'Email', 'domainreference' ) .
                    '</label>
                    <div class="col-sm-9">
                        <input id="email" name="email" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) .
                    '" ' . $aria_req . ' />
                        </div>
                     </div>',

                'url' =>
                    '<div class="form-group">
                           <label for="url" class="col-sm-3 control-label">' . __( 'Website', 'domainreference' ) .
                    '</label>
                    <div class="col-sm-9">
                        <input id="url" name="url" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
                    '" ' . $aria_req . ' />
                        </div>
                     </div>',
                'submit' => ''
            )
        ),
    );
    ?>

    <?php comment_form($args); ?>

</div><!-- #comments -->