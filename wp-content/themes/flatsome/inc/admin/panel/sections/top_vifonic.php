<?php
/**
 * Flatome Panel
 */
?>
<?php add_thickbox(); ?>
<?php $flatsome_ver = wp_get_theme( get_template() );  ?>
<h1>
    <?php echo '<strong>Welcome to VIFONIC</strong>'; ?>
</h1>
<div class="about-text">
<?php _e( 'Thanks for Choosing VIFONIC - The worlds most powerful WooCommerce and Multi-Purpose Theme. This page will help you quickly get up and running with VIFONIC.', 'flatsome-admin' ); ?>
</div>

<div class="wp-badge fl-badge">Version <?php echo $flatsome_ver['Version']; ?></div>
