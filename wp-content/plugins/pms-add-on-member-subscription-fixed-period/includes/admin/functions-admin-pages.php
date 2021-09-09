<?php

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;

// Return if PMS is not active
if( ! defined( 'PMS_VERSION' ) ) return;


/**
 * Add the extra fields needed in the Subscription Plan Details meta-box
 *
 * @param int $subscription_plan_id
 *
 */
function pms_msfp_add_subscription_plan_settings_fields( $subscription_plan_id ) {

	$subscription_type = get_post_meta( $subscription_plan_id, 'pms_subscription_plan_type', true );
	$expiration_date   = get_post_meta( $subscription_plan_id, 'pms_subscription_plan_expiration_date', true );

	$types = array(
		'regular'      => __( 'Regular', 'paid-member-subscriptions' ),
		'fixed-period' => __( 'Fixed Period', 'paid-member-subscriptions' ),
	);

	$types = apply_filters( 'pms_subscription_plan_types', $types );
	?>

	<!-- Subscription Plan Type -->
	<div class="pms-meta-box-field-wrapper">

	    <label for="pms-subscription-plan-type" class="pms-meta-box-field-label"><?php esc_html_e( 'Subscription Type', 'paid-member-subscriptions' ); ?></label>

	    <select id="pms-subscription-plan-type" name="pms_subscription_plan_type">

			<?php foreach( $types as $slug => $label ) : ?>
	        	<option value="<?php echo $slug; ?>" <?php selected( $subscription_type, $slug ); ?>><?php echo $label; ?></option>
			<?php endforeach; ?>

	    </select>
	    <p class="description"><?php esc_html_e( 'Please select the duration type for this subscription plan.', 'paid-member-subscriptions' ); ?></p>

	</div>


	<!-- Expiration Date -->
	<div class="pms-meta-box-field-wrapper">

	    <label for="pms-subscription-plan-expiration-date" class="pms-meta-box-field-label"><?php esc_html_e( 'Expiration Date', 'paid-member-subscriptions' ); ?></label>

	    <input type="text" id="pms-subscription-plan-expiration-date" name="pms_subscription_plan_expiration_date" class="pms_datepicker" value="<?php echo $expiration_date; ?>" />

	    <p class="description"><?php esc_html_e( 'The date at which member subscriptions associated with this subscription plan should expire.', 'paid-member-subscriptions' ); ?></p>

	</div>

	<?php

}
add_action( 'pms_view_meta_box_subscription_details_top', 'pms_msfp_add_subscription_plan_settings_fields' );


/**
 * Save the extra fields from the Subscription Plan Details meta-box on post save
 *
 * @param int $subscription_plan_id
 *
 */
function pms_msfp_save_subscription_plan_settings_fields( $subscription_plan_id ) {

	if( empty( $_POST['post_ID'] ) )
        return;

    if( $subscription_plan_id != $_POST['post_ID'] )
        return;

    if( isset( $_POST['pms_subscription_plan_type'] ) )
        update_post_meta( $subscription_plan_id, 'pms_subscription_plan_type', sanitize_text_field( $_POST['pms_subscription_plan_type'] ) );

    if( isset( $_POST['pms_subscription_plan_expiration_date'] ) )
        update_post_meta( $subscription_plan_id, 'pms_subscription_plan_expiration_date', sanitize_text_field( $_POST['pms_subscription_plan_expiration_date'] ) );

}
add_action( 'pms_save_meta_box_pms-subscription', 'pms_msfp_save_subscription_plan_settings_fields' );


/**
 * Changes the subscription plan price output in the price column from the subscription plans list table
 *
 * @param string $output
 * @param int 	 $subscription_plan_id
 *
 */
function pms_msfp_list_table_subscription_plans_column_price_output( $output, $subscription_plan_id ) {

	$subscription_type = get_post_meta( $subscription_plan_id, 'pms_subscription_plan_type', true );
	$expiration_date   = get_post_meta( $subscription_plan_id, 'pms_subscription_plan_expiration_date', true );

	if( $subscription_type == 'fixed-period' && ! empty( $expiration_date ) ) {

		$subscription_plan = pms_get_subscription_plan( $subscription_plan_id );

		$output = pms_format_price( $subscription_plan->price, pms_get_active_currency() ) . ' / ' . date( get_option( 'date_format' ), strtotime( $expiration_date ) );

	}

	return $output;

}
add_filter( 'pms_list_table_subscription_plans_column_price_output', 'pms_msfp_list_table_subscription_plans_column_price_output', 20, 2 );
