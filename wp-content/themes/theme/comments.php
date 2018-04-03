<?php
/**
 * @package WordPress
 * @subpackage Adamantium - Starter Kit
 * @author Bitopia Digital Agency
 */
?>
<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to shape_comment() which is
 * located in the inc/template-tags.php file.
 *
 * @package Shape
 * @since Shape 1.0
 */
?>
<?php
    /*
     * If the current post is protected by a password and
     * the visitor has not yet entered the password we will
     * return early without loading the comments.
     */
    if ( post_password_required() )
        return;
?>
<section id="comentarios">

  <!-- <form>
              <div class="usuario" alt="Perfil"><img alt="usuario" src="<?php bloginfo('template_url'); ?>/img/user.jpg"></div>
              <textarea class="comentario" placeholder="Escriba su comentario..."></textarea>
           </form> -->

    <?php 
      $args = array(
        'id_form'           => 'commentform',
        'id_submit'         => 'submit',
        'class_submit'      => 'submit',
        'name_submit'       => 'submit',
        'title_reply'       => '',
        'title_reply_to'    => __( 'Leave a Reply to %s' ),
        'cancel_reply_link' => __( 'Cancel Reply' ),
        'comment_notes_after' => '',
        'label_submit'      => __( 'Post Comment' ),
        'format'            => 'xhtml'
        );

      comment_form($args); 
    ?>

    <?php // You can start editing here -- including this comment! ?>
 
    <?php if ( have_comments() ) : ?>
 
        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
          <!-- <nav role="navigation" id="comment-nav-above" class="site-navigation comment-navigation">
              <h1 class="assistive-text"><?php _e( 'Comment navigation', 'shape' ); ?></h1>
              <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'shape' ) ); ?></div>
              <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'shape' ) ); ?></div>
          </nav> -->
        <?php endif; // check for comment navigation ?>
    
            <?php wp_list_comments( array( 'callback' => 'shape_comment' ) ); ?>
 
        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
        <nav role="navigation" id="comment-nav-below" class="site-navigation comment-navigation">
            <h1 class="assistive-text"><?php _e( 'Comment navigation', 'shape' ); ?></h1>
            <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'shape' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'shape' ) ); ?></div>
        </nav>
        <?php endif; // check for comment navigation ?>
 
    <?php endif; // have_comments() ?>
 
    <?php
        // If comments are closed and there are comments, let's leave a little note, shall we?
        if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
    ?>
        <p class="nocomments"><?php _e( 'Comments are closed.', 'shape' ); ?></p>
    <?php endif; ?>
</section>