<?php
/**
 * Flatsome functions and definitions
 *
 * @package flatsome
 */

require get_template_directory() . '/inc/init.php';

/**
 * Note: It's not recommended to add any custom code here. Please use a child theme so that your customizations aren't lost during updates.
 * Learn more here: http://codex.wordpress.org/Child_Themes
 */

//require get_template_directory() . '/inc/custom-wp-admin.php';

add_filter( 'woocommerce_product_tabs', 'wcs_woo_remove_reviews_tab', 98 );
function wcs_woo_remove_reviews_tab($tabs) {
    unset($tabs['reviews']);
    return $tabs;
}

add_action( 'woocommerce_archive_description', 'woocommerce_category_image', 2 );
function woocommerce_category_image() {
    if ( is_product_category() ){
        global $wp_query;
        $cat = $wp_query->get_queried_object();
        $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
        $image = wp_get_attachment_url( $thumbnail_id );
        if ( $image ) {
            echo '<img style="float: left; display: block; width: 55%; margin-right: 20px" src="' . $image . '" alt="' . $cat->name . '" />';
        }
        echo '<h1>' . $cat->name . '</h1>';
    }
}

/**
 * Register widgets
 */
add_action('widgets_init', 'foxtail_register_widgets');

function foxtail_register_widgets()
{
    register_widget('Foxtail_Recent_Posts_Widget');
}

/**
 * Class Foxtail_Recent_Posts_Widget
 */

if (!class_exists('Foxtail_Recent_Posts_Widget'))
{
    class Foxtail_Recent_Posts_Widget extends WP_Widget {

        function __construct() {
            /* Widget settings. */
            $widget_ops = array( 'classname' => 'foxtail-recent-posts-widget', 'description' => 'Foxtail Recent Posts Widget, recent posts with thumbnail' );
            /* Widget control settings. */
            $control_ops = array( 'id_base' => 'foxtail-recent-posts-widget' );
            /* Create the widget. */
            parent::__construct('foxtail-recent-posts-widget', 'Foxtail Recent Posts Widget', $widget_ops, $control_ops);
        }

        function form( $instance ) {

            $default = array(
                'title' => __('Recent Posts', 'foxtail'),
                'post_type' => 'post',
                'post_number' => 5,
                'category_id' => ''
            );
            $instance = wp_parse_args( (array) $instance, $default );
            $title = esc_attr($instance['title']);
            $post_type = esc_attr($instance['post_type']);
            $post_number = esc_attr($instance['post_number']);
            $category_id = esc_attr($instance['category_id']);

            echo '<p>'.__('Widget title', 'foxtail').' <input type="text" class="widefat" name="'.$this->get_field_name('title').'" value="'.$title.'" /></p>';
            echo '<p>'.__('Post type', 'foxtail').' <input type="text" class="widefat" name="'.$this->get_field_name('post_type').'" value="'.$post_type.'" /></p>';
            echo '<p>'.__('Number of posts', 'foxtail').' <input type="text" class="widefat" name="'.$this->get_field_name('post_number').'" value="'.$post_number.'" /></p>';
            echo '<p>'.__('Category id', 'foxtail').' <input type="text" class="widefat" name="'.$this->get_field_name('category_id').'" value="'.$category_id.'" /></p>';

        }

        function update( $new_instance, $old_instance ) {
            $instance = $old_instance;

            $instance['title'] = strip_tags($new_instance['title']);
            $instance['post_type'] = strip_tags($new_instance['post_type']);
            $instance['post_number'] = strip_tags($new_instance['post_number']);
            $instance['category_id'] = strip_tags($new_instance['category_id']);

            return $instance;
        }

        function widget( $args, $instance ) {
            extract($args);
            $title = apply_filters( 'widget_title', $instance['title'] );
            $post_type = $instance['post_type'];
            $post_number = $instance['post_number'];
            $category_id = $instance['category_id'];

            echo $before_widget; ?>

            <h3 class="widget-title"><?= $title ?></h3>
            <div class="is-divider small"></div>

            <?php
            $args = array(
                'post_type' => $post_type,
                'posts_per_page' => $post_number
            );

            if ($category_id != '') $args['cat'] = $category_id;
            query_posts( $args );
            ?>

            <ul class="foxtail-recent-posts-widget">

                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                    <li class="item">
                        <a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
                    </li>

                <?php endwhile; endif; ?>
                <?php wp_reset_query() ?>

            </ul>

            <?php echo $after_widget;
        }

    }
    // end class
}