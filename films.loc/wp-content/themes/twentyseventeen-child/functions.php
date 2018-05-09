<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
}


function register_film_product_type() {
    class WC_Product_Film extends WC_Product_Simple {
        public function __construct($product) {
            $this->product_type = 'film';
            parent::__construct($product);
        }
    }
}
add_action('init', 'register_film_product_type');

function add_film_product($types) {
    $types['film'] = __('Film');
    return $types;
}
add_filter('product_type_selector', 'add_film_product');

function woocommerce_product_class( $classname, $product_type ) {
    if ( $product_type == 'film' ) {
        $classname = 'WC_Product_Film';
    }
    return $classname;
}
add_filter( 'woocommerce_product_class', 'woocommerce_product_class', 10, 2 );

function wh_film_admin_custom_js() {
    if ('product' != get_post_type()) :
        return;
    endif;
    ?>
    <script type='text/javascript'>
        jQuery(document).ready(function () {
            //for Price tab
            jQuery('.product_data_tabs .general_tab').addClass('show_if_film').show();
            jQuery('#general_product_data .pricing').addClass('show_if_film').show();
            //for Inventory tab
            jQuery('.inventory_options').addClass('show_if_film').show();
            jQuery('#inventory_product_data ._manage_stock_field').addClass('show_if_film').show();
            jQuery('#inventory_product_data ._sold_individually_field').parent().addClass('show_if_film').show();
            jQuery('#inventory_product_data ._sold_individually_field').addClass('show_if_film').show();
        });
    </script>
    <?php
}
add_action('admin_footer', 'wh_film_admin_custom_js');

//SKYPE FIELD IN REGISTER FORM
/**
* Add new register fields for WooCommerce registration.
 */
function wooc_extra_register_fields() {
    ?>
    <div class="clear"></div>
    <p class="form-row form-row-wide">
        <label for="skype"><?php _e( 'Skype', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="text" class="input-text" name="skype" id="skype" value="<?php if ( ! empty( $_POST['skype'] ) ) esc_attr_e( $_POST['skype'] ); ?>" />
    </p>
    <?php
}
add_action( 'woocommerce_register_form_start', 'wooc_extra_register_fields' );

// Add the custom field "favorite_color"
add_action( 'woocommerce_edit_account_form', 'add_skype_edit_account_form' );
function add_skype_edit_account_form() {
    $user = wp_get_current_user();
    ?>
    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
        <label for="skype"><?php _e( 'Skype', 'woocommerce' ); ?>
            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="skype" id="skype" value="<?php echo esc_attr( $user->skype ); ?>" />
    </p>
    <?php
}

add_action( 'woocommerce_save_account_details', 'save_skype_account_details', 12, 1 );
function save_skype_account_details( $user_id ) {

    if( isset( $_POST['skype'] ) )
        update_user_meta( $user_id, 'skype', sanitize_text_field( $_POST['skype'] ) );

}

/**
 * Validate the extra register fields.
 *
 * @param WP_Error $validation_errors Errors.
 *
 * @return WP_Error
 */
function wooc_validate_extra_register_fields( $errors, $username, $email ) {
    if ( isset( $_POST['skype'] ) && empty( $_POST['skype'] ) ) {
        $errors->add( 'skype_error', __( '<strong>Error</strong>: Skype is required!.', 'woocommerce' ) );
    }
    return $errors;
}
add_filter( 'woocommerce_registration_errors', 'wooc_validate_extra_register_fields', 10, 3 );

/**
 * Save the extra register fields.
 *
 * @param int $customer_id Current customer ID.
 */
function wooc_save_extra_register_fields( $customer_id ) {
    if ( isset( $_POST['skype'] ) ) {
        // WooCommerce skype
        update_user_meta( $customer_id, 'skype', sanitize_text_field( $_POST['skype'] ) );
    }
}
add_action( 'woocommerce_created_customer', 'wooc_save_extra_register_fields' );