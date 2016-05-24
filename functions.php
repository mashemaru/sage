<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php' // Theme customizer
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);


// Custom Comment
function custom_comments($comment, $args, $depth) {
 
$tag = ( 'div' === $args['style'] ) ? 'div' : 'li'; ?>
<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
    <!-- .comment-meta -->
    <div class="comment-meta">
        <!-- .comment-author -->
        <div class="comment-author">
            <?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
            <div class="comment-metadata">
            <?php printf( __( '%s' ), sprintf( '<span class="commenter">%s</span>', get_comment_author_link() ) ); ?>
              <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>" class="comment-time">
              <time datetime="<?php comment_time( 'c' ); ?>">
                <?php printf( _x( '%1$s at %2$s', '1: date, 2: time' ), get_comment_date(), get_comment_time() ); ?>
              </time>
              </a>
            </div>
            <?php comment_reply_link( array_merge( $args, array(
                    'add_below' => 'div-comment',
                    'depth'     => $depth,
                    'max_depth' => $args['max_depth'],
                    'before'    => '<div class="reply">',
                    'after'     => '</div>'
                ) ) );
                ?>
        </div>
        <!-- .comment-metadata -->
        <?php if ( '0' == $comment->comment_approved ) : ?>
        <p class="comment-awaiting-moderation">
            <?php _e( 'Your comment is awaiting moderation.' ); ?>
        </p>
        <?php endif; ?>
    </footer>
    <!-- .comment-meta -->
    <div class="comment-content">
        <?php comment_text(); ?>
    </div>
    <!-- .comment-content -->
</article>
<!-- .comment-body -->
<?php
}