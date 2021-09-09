jQuery( function($) {

	var $subscription_type_field_wrapper = $('#pms-subscription-plan-type').closest('.pms-meta-box-field-wrapper');
	var $expiration_date_field_wrapper   = $('#pms-subscription-plan-expiration-date').closest('.pms-meta-box-field-wrapper');
	var $duration_field_wrapper 	     = $('#pms-subscription-plan-duration').closest('.pms-meta-box-field-wrapper');
	var $renewal_field_wrapper 			 = $('#pms-subscription-plan-recurring').closest('.pms-meta-box-field-wrapper');

	// Set state of the renewal field initial value
	if( $renewal_field_wrapper )
		var renewal_initial_value = $renewal_field_wrapper.find('select').val();

	/**
	 * Initialize Datepicker
	 *
	 */
	$("#pms-subscription-plan-expiration-date.pms_datepicker").datepicker({dateFormat: 'yy-mm-dd'});

	/**
	 * Move Expiration Date under the Duration field
	 *
	 */
	$duration_field_wrapper.after( $expiration_date_field_wrapper );

	/**
	 * Preserve state of the "renewal_initial_value" variable
	 *
	 */
	if( $renewal_field_wrapper ) {

		$(document).on( 'change', '#pms-subscription-plan-recurring', function() {
			renewal_initial_value = $(this).val();
		});

	}

	/**
	 * Show appropiate fields (duration or expiration and renewal) on document ready
	 *
	 */
	if( $subscription_type_field_wrapper.find('select').val() == 'fixed-period' ) {

		$duration_field_wrapper.hide();
		$expiration_date_field_wrapper.show();

		if( $renewal_field_wrapper ) {
			$renewal_field_wrapper.hide();
			$renewal_field_wrapper.find('select option[value="3"]').attr( 'selected', true );
		}

	} else {

		$duration_field_wrapper.show();
		$expiration_date_field_wrapper.hide();

		if( $renewal_field_wrapper ) {
			$renewal_field_wrapper.show();
			$renewal_field_wrapper.find('select option[value="' + renewal_initial_value + '"]').attr( 'selected', true );
		}

	}


	/**
	 * Show appropiate fields (duration or expiration and renewal) on subscription type select change
	 *
	 */
	$(document).on( 'change', '#pms-subscription-plan-type', function() {

		if( $subscription_type_field_wrapper.find('select').val() == 'fixed-period' ) {

			$duration_field_wrapper.hide();
			$expiration_date_field_wrapper.show();

			if( $renewal_field_wrapper ) {
				$renewal_field_wrapper.hide();
				$renewal_field_wrapper.find('select option[value="3"]').attr( 'selected', true );
			}

		} else {

			$duration_field_wrapper.show();
			$expiration_date_field_wrapper.hide();

			if( $renewal_field_wrapper ) {
				$renewal_field_wrapper.show();
				$renewal_field_wrapper.find('select option[value="' + renewal_initial_value + '"]').attr( 'selected', true );
			}

		}

	});

});
