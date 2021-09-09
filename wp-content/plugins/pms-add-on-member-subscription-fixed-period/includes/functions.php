<?php

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;

// Return if PMS is not active
if( ! defined( 'PMS_VERSION' ) ) return;

/**
 * Filter the subscription plans returned by the "get_subscription_plans()" function
 *
 * @param array $subscription_plans
 * @param bool  $only_active
 *
 */
function pms_msfp_get_subscription_plans_filter_by_period( $subscription_plans, $only_active ) {

	if( ! $only_active )
		return $subscription_plans;

	if( ! is_array( $subscription_plans ) )
		return $subscription_plans;

	/* filter this only on frontend. for instance in the PB field we need them all */
	if( is_admin() )
		return $subscription_plans;

	foreach( $subscription_plans as $key => $subscription_plan ) {

		$subscription_type = get_post_meta( $subscription_plan->id, 'pms_subscription_plan_type', true );
		$expiration_date   = get_post_meta( $subscription_plan->id, 'pms_subscription_plan_expiration_date', true );

		if ( $subscription_type == 'fixed-period' ) {
			if ( empty( $expiration_date ) )
				unset( $subscription_plans[$key] );
			else if ( time() > strtotime( $expiration_date . ' 23:59:59' ) )
				unset( $subscription_plans[$key] );
		}
	}

	$subscription_plans = array_values( $subscription_plans );

	return $subscription_plans;

}
add_filter( 'pms_get_subscription_plans', 'pms_msfp_get_subscription_plans_filter_by_period', 20, 2 );


/**
 * Filter the subscription plans returned by the "pms_get_subscription_plan_upgrades()" function
 *
 * @param array $subscription_plans
 * @param int   $subscription_plan_id
 * @param bool  $only_active
 *
 */
function pms_msfp_get_subscription_plan_upgrades_filter_by_period( $subscription_plans, $subscription_plan_id, $only_active ) {

	if( ! $only_active )
		return $subscription_plans;

	if( ! is_array( $subscription_plans ) )
		return $subscription_plans;

	if( is_admin() )
		return $subscription_plans;

	foreach( $subscription_plans as $key => $subscription_plan ) {

		$subscription_type = get_post_meta( $subscription_plan->id, 'pms_subscription_plan_type', true );
		$expiration_date   = get_post_meta( $subscription_plan->id, 'pms_subscription_plan_expiration_date', true );

		if( $subscription_type == 'fixed-period' && ! empty( $expiration_date ) && time() > strtotime( $expiration_date . ' 23:59:59' ) )
			unset( $subscription_plans[$key] );

	}

	$subscription_plans = array_values( $subscription_plans );

	return $subscription_plans;

}
add_filter( 'pms_get_subscription_plan_upgrades', 'pms_msfp_get_subscription_plan_upgrades_filter_by_period', 20, 3 );


/**
 * Modified the default price / duration output that is being displayed when selecting a subscription plan
 * to match the expiration date
 *
 * @param string 				$output
 * @param PMS_Subscription_Plan $subscription_plan
 *
 * @return $output
 *
 */
function pms_msfp_subscription_plan_output_duration_by_period( $output, $subscription_plan ) {

	$subscription_type = get_post_meta( $subscription_plan->id, 'pms_subscription_plan_type', true );
	$expiration_date   = get_post_meta( $subscription_plan->id, 'pms_subscription_plan_expiration_date', true );

	if( $subscription_type == 'fixed-period' )
		$output = sprintf( __( ' until %s', 'paid-member-subscriptions' ), date_i18n( get_option( 'date_format' ), strtotime( $expiration_date ) ) );


	return $output;

}
add_filter( 'pms_subscription_plan_output_duration', 'pms_msfp_subscription_plan_output_duration_by_period', 20, 2 );


/**
 * Changes the message that is being displayed for the member when confirming the renewal
 * of a subscription
 *
 * @param string 				$output
 * @param PMS_Subscription_Plan $subscription_plan
 *
 */
function pms_msfp_renew_subscription_before_form( $output, $subscription_plan ) {

	$subscription_type = get_post_meta( $subscription_plan->id, 'pms_subscription_plan_type', true );
	$expiration_date   = get_post_meta( $subscription_plan->id, 'pms_subscription_plan_expiration_date', true );

	if( $subscription_type != 'fixed-period' || empty( $expiration_date ) )
		return $output;

	$output = '<p>' . sprintf( __( 'Renew %s subscription. The subscription will be active until %s', 'paid-member-subscriptions' ), $subscription_plan->name, date( get_option( 'date_format' ), strtotime( $expiration_date ) ) ) . '</p>';

	return $output;

}
add_filter( 'pms_renew_subscription_before_form', 'pms_msfp_renew_subscription_before_form', 20, 2 );


/**
 * Updates the member's subscription expiration date to the fixed one when the member subscription
 * is being inserted or updated in the database
 *
 * @param int   $member_subscription_id
 * @param array $data
 *
 */
function pms_msfp_member_subscription_update_expiration_date( $member_subscription_id, $data ) {

	if( is_admin() )
		return;

	if( empty( $data['expiration_date'] ) )
		return;

	$member_subscription = pms_get_member_subscription( $member_subscription_id );

	$subscription_type = get_post_meta( $member_subscription->subscription_plan_id, 'pms_subscription_plan_type', true );
	$expiration_date   = get_post_meta( $member_subscription->subscription_plan_id, 'pms_subscription_plan_expiration_date', true );

	if( $subscription_type != 'fixed-period' || empty( $expiration_date ) )
		return;

	// Add also the time
	$expiration_date = $expiration_date . ' 23:59:59';

	if( $expiration_date == $data['expiration_date'] )
		return;

	$member_subscription->update( array( 'expiration_date' => $expiration_date ) );

}
add_action( 'pms_member_subscription_insert', 'pms_msfp_member_subscription_update_expiration_date', 20, 2 );
add_action( 'pms_member_subscription_update', 'pms_msfp_member_subscription_update_expiration_date', 20, 2 );
