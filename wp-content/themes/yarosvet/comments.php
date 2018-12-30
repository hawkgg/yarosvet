<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package marketing
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
  if ( post_password_required() ) {
    return;
  }
?>

<!-- Comments -->
<div class="empty-space marg-lg-b50 marg-sm-b30"></div>
<div class="tt-devider"></div>
<div class="empty-space marg-lg-b50 marg-sm-b30"></div>
<section class="coment-item">
  <!--<section class="post-comment" id="comments">-->
  <?php if(have_comments()): ?>
  <div class="tt-title-2">
    <h4 class="c-h4"><?php echo get_comments_number(); ?> <?php esc_html_e('Comments', 'marketing'); ?></h4>
  </div>
  <div class="empty-space marg-lg-b30"></div>
  <?php endif; ?>
  <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
    <nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
      <h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'marketing' ); ?></h2>
      <div class="nav-links">

        <div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'marketing' ) ); ?></div>
        <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'marketing' ) ); ?></div>

      </div><!-- .nav-links -->
    </nav><!-- #comment-nav-above -->
  <?php endif; // check for comment navigation ?>

  <!--</section>-->

  <!-- Add Comment -->
  <div class="comment-form tt-comment-post-form clearfix">

    <?php
      $commenter = wp_get_current_commenter();
      $req       = get_option( 'require_name_email' );
      $aria_req  = ( $req ? " aria-required='true'" : '' );

      $args = array(
        'id_form'           => 'commentform',
        'id_submit'         => 'comment_submit',
        'title_reply'       => esc_html__( 'Leave a Comment' ,'marketing'),
        'title_reply_to'    => esc_html__( 'Leave a Comment to %s'  ,'marketing'),
        'cancel_reply_link' => esc_html__( 'Cancel Comment'  ,'marketing'),
        'label_submit'      => esc_html__( 'Post Comment'  ,'marketing'),
        'comment_field'     => '
          <textarea name="comment" id="text" ' . $aria_req . ' class="c-area type-2 form-white placeholder" rows="10" placeholder="'.esc_html__('Your Comment', 'marketing').'"  maxlength="400"></textarea>
          ',
        'must_log_in'          => '<div class="simple-text"><p class="must-log-in">' .  wp_kses_post(sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ,'marketing' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) )) . '</p></div>',
        'logged_in_as'         => '<div class="simple-text"><p class="logged-in-as">' . wp_kses_post(sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>'  ,'marketing'), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) ). '</p></div>',
        'comment_notes_before' => '<div class="empty-space marg-lg-b30"></div><div class="simple-text size-3"><p>'.esc_html__('Your email address will not be published. Required fields are marked *', 'marketing').'</p></div>',
        'comment_notes_after'  => '',
        'class_submit'         => '',
        'fields' => apply_filters( 'comment_form_default_fields',
          array(
            'author' => '
                <div class="row"><div class="col-sm-6">
                  <!-- Name -->
                  <input type="text" name="author" id="name" ' . $aria_req . ' class="c-input type-2 form-white placeholder" placeholder="'.esc_html__('Name', 'marketing').'" maxlength="100">',

            'email' => '
                <input type="email" name="email" id="email" placeholder="'.esc_html__('Email', 'marketing').'" class="c-input type-2 form-white placeholder" maxlength="100">',

            'url' => '
              <input type="text" name="url" id="website" placeholder="'.esc_html__('Website', 'marketing').'" class="c-input type-2 form-white m-b-20 placeholder" maxlength="100"></div></div>',
          )
        )
      );
      comment_form($args);
    ?>
    <!-- End Form -->

  </div>
  <!-- End Add Comment -->
  <?php if(have_comments()): ?>
    <div class="empty-space marg-lg-b50 marg-sm-b30"></div>
    <div class="tt-devider"></div>
    <div class="empty-space marg-lg-b50 marg-sm-b30"></div>
    <ul class="tt-comment">
      <?php
        wp_list_comments( array(
          'callback'     => 'marketing_comment',
          'end-callback' => 'marketing_close_comment',
          'style'        => 'ul',
          'short_ping'   => true,
        ) );
      ?>
    </ul>
  <?php endif; ?>
</section>
<!--end of comments-->
