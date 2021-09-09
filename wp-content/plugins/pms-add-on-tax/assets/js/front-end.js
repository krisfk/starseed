jQuery( function( $ ) {

    var $section_billing_details = $('.pms-section-billing-details')

    // Subscription plan and payment gateway selector
    var subscription_plan_selector = 'input[name=subscription_plans]'
    var paygate_selector 		   = 'input[name=pay_gate]'

    // Check to see if this is a PB form with email confirmation active
    var is_pb_email_confirmation_on = ( $section_billing_details.siblings('.pms-email-confirmation-payment-message').length > 0 ? true : false )

    // Tax vars
    var $tax_container = $('.pms-price-breakdown__holder')
    var $tax_price     = $('.pms-price-breakdown .pms-subtotal__value')
    var $tax_tax       = $('.pms-price-breakdown .pms-tax__value')
    var $tax_label     = $('.pms-price-breakdown .pms-tax__label')
    var $tax_total     = $('.pms-price-breakdown .pms-total__value')

    // Billing
    var tax_country_selector = '.pms-billing-details #pms_billing_country'
    var tax_state_selector   = '.pms-billing-details #pms_billing_state'
    var tax_city_selector    = '.pms-billing-details #pms_billing_city'
    var tax_vat_selector     = '.pms-billing-details #pms_vat_number'

    var checkedVatNumber         = ''

    // $pms_checked_subscription is coming from the main plugin front-end.js
    $(document).ready( function() {

        // if( !( $pms_checked_subscription.length > 0 ) )
        //     return

        // If no email confirmation and subscription is not free, show billing details
        if ( $pms_checked_subscription.length > 0 && !is_pb_email_confirmation_on && $pms_checked_subscription.data('price') != 0 )
            $section_billing_details.show()

        $(document).on( 'click', paygate_selector, function() {

            if( $pms_checked_subscription.length > 0 && !is_pb_email_confirmation_on && $pms_checked_subscription.data('price') != 0 ){
                $section_billing_details = $('.pms-section-billing-details')
                $section_billing_details.show()
            }

	    })

	    $(document).on( 'click', subscription_plan_selector, function() {

            if( ! is_pb_email_confirmation_on )
                $(paygate_selector + ':checked').trigger('click')

            pms_tax_price_breakdown()
            pms_tax_show_euvat_field_only_for_eu_countries()

	    })

	    $(document).on( 'change', '#pms_billing_country, #pms_billing_state, #pms_billing_city, .pms_pwyw_pricing', function() {

            pms_tax_price_breakdown()
            pms_tax_show_euvat_field_only_for_eu_countries()


	    })

	    $(document).on( 'keyup', '.pms_pwyw_pricing', function() {

            pms_tax_price_breakdown()
            pms_tax_show_euvat_field_only_for_eu_countries()

	    })

	    $(document).on( 'change', '#pms_billing_country', pms_tax_validate_vat )

	    $(document).on( 'input', '#pms_vat_number', pms_tax_validate_vat )

        $(document).on( 'pms_discount_success', pms_tax_price_breakdown )

        $(document).on( 'pms_discount_error', pms_tax_price_breakdown )

        pms_tax_price_breakdown()
        pms_tax_show_euvat_field_only_for_eu_countries()

    })

    function pms_tax_price_breakdown(){

        var price = $pms_checked_subscription.data('price')

        if( pms_tax_apply_sign_up_fee() ){

            // if plan has trial and signup fee, breakdown tax based on the signup fee since that's paid right now
            if( $pms_checked_subscription.data('trial') && $pms_checked_subscription.data('trial') == '1' )
                price = parseFloat( $pms_checked_subscription.data('sign_up_fee') )
            // if plan doesnt have trial, add signup fee to price
            else
                price = parseFloat( price ) + parseFloat( $pms_checked_subscription.data('sign_up_fee') )

        }

        if( !( price > 0 )  || ( typeof $pms_checked_subscription.data('tax-exempt') != 'undefined' && $pms_checked_subscription.data('tax-exempt') == 1 )){
            $tax_container.hide()
            return
        }

        var tax_country = $( tax_country_selector ).val()
        var tax_state   = $( tax_state_selector ).val()
        var tax_city    = $( tax_city_selector ).val()

        if( !tax_country || tax_country.length === 0 )
            return

        var tax_rate = pms_tax_get_rate( tax_country, tax_state, tax_city )

        if( tax_rate && tax_rate.tax_rate > 0 ){

            var valid_vat = pms_tax_is_vat_number_valid()

            // determine tax breakdown
            if( PMSTaxOptions.prices_include_tax == 'true' ){

                if( valid_vat && PMSTaxOptions.euvat_merchant_country != tax_country ) {

                    var tax      = 0
                    var subtotal = price
                    var total    = price

                } else {

                    var tax      = price - ( price / ( tax_rate.tax_rate / 100 + 1 ) )
                    var subtotal = price - tax
                    var total    = price

                }

            } else {

                if( valid_vat && PMSTaxOptions.euvat_merchant_country != tax_country ) {

                    var subtotal = price
                    var tax      = 0
                    var total    = price

                } else {

                    var subtotal = price
                    var tax      = subtotal * ( tax_rate.tax_rate / 100 )
                    var total    = subtotal * ( 1 + tax_rate.tax_rate / 100 )

                }

            }

            // Set initial price
            $tax_price.text( pms_tax_format_number( subtotal ) )

            // Set tax label
            if( valid_vat && PMSTaxOptions.euvat_merchant_country != tax_country )
                $tax_label.text( tax_rate.tax_name + ':' )
            else
                $tax_label.text( tax_rate.tax_rate + '% ' + tax_rate.tax_name + ':' )

            // Set tax amount
            $tax_tax.text( pms_tax_format_number( tax ) )

            // Set total price
            $tax_total.text( pms_tax_format_number( total ) )

            $tax_container.show()

        }
        else
            $tax_container.hide()

    }

    function pms_tax_get_rate( country, state = '*', city = '*' ){

        if( !PMSTaxOptions )
            return false

        if( !country || country.length === 0 )
            return { tax_name : PMSTaxOptions.default_tax_name, tax_rate : PMSTaxOptions.default_tax_rate }

        if( !state || state.length === 0 )
            state = '*'
        else
            state = state.toUpperCase()

        if( !city || city.length === 0 )
            city = '*'
        else
            city = city.toLowerCase()

        // Check if a rate with the country, state and city combination exists
        var found_rate = pms_tax_find_rate( country, state, city )

        // Remove city and search again
        if( !found_rate && city != '*' )
            found_rate = pms_tax_find_rate( country, state, '*' )

        // Remove state and search again
        if( !found_rate && state != '*' )
            found_rate = pms_tax_find_rate( country, '*', '*' )

        // If EU VAT enabled, fallback to the default in-plugin rates if no custom ones are set
        if( !found_rate && PMSTaxOptions.euvat_enabled == 'true' && PMSTaxOptions.euvat_country_rates ){

            if( PMSTaxOptions.euvat_country_rates[country] )
                found_rate = { tax_name: PMSTaxOptions.euvat_tax_name, tax_rate : PMSTaxOptions.euvat_country_rates[country].rate }

        }

        // fallback to default rate value if not empty
        if( !found_rate && PMSTaxOptions.default_tax_rate != '0' )
            found_rate = { tax_name : PMSTaxOptions.default_tax_name, tax_rate : PMSTaxOptions.default_tax_rate }

        return found_rate

    }

    function pms_tax_find_rate( country, state, city ){

        var tax_rates = PMSTaxOptions.tax_rates

        if( !tax_rates || tax_rates.length === 0 )
            return false

        for( var i = 0; i < tax_rates.length; i++ ){

            if( tax_rates[i].tax_country == country && tax_rates[i].tax_state == state && tax_rates[i].tax_city.toLowerCase() == city )
                return tax_rates[i]

        }

        return false

    }

    function pms_tax_format_number( value ){

        if( !PMSTaxOptions.locale )
            return pms_tax_round_number( value, 2 )

        var option = {
            maximumFractionDigits : 2
        }

        if( PMSTaxOptions && PMSTaxOptions.price_trim_zeroes == 'false' )
            option.minimumFractionDigits = 2

        var formatter = new Intl.NumberFormat( PMSTaxOptions.locale, option )

        value = formatter.format( value )

        if( PMSTaxOptions.currency_position == 'before' )
            return PMSTaxOptions.currency_symbol + value
        else
            return value + PMSTaxOptions.currency_symbol

    }

    function pms_tax_round_number( value, precision ){

        var multiplier = Math.pow( 10, precision || 0 )

        return Math.round( value * multiplier ) / multiplier

    }

    function pms_tax_is_vat_number_valid(){

        var validVat = jQuery( '#pms_vat_number' ).data( 'vat-valid' )

        if( typeof validVat !== 'undefined' && validVat == true )
            return true

        return false

    }

    function pms_tax_show_euvat_field_only_for_eu_countries(){

        var tax_country = $( tax_country_selector ).val()

        if( PMSTaxOptions && PMSTaxOptions.euvat_country_rates && PMSTaxOptions.euvat_country_rates[tax_country] && PMSTaxOptions.euvat_country_rates[tax_country].rate > 0 )
            jQuery( '.pms-billing-details .pms-vat-number' ).show()
        else
            jQuery( '.pms-billing-details .pms-vat-number' ).hide()

    }

    function pms_tax_validate_vat( vat_number ){

        if( PMSTaxOptions && PMSTaxOptions.euvat_enabled && PMSTaxOptions.euvat_enabled != 'true' )
            return

        if( vat_number == '' ){
            $('.pms-vat-number .pms_field-success-wrapper').hide()
            $('.pms-vat-number .pms_field-errors-wrapper').remove()
        } else if( vat_number == checkedVatNumber )
            return

        $('.pms-vat-number .pms_field-success-wrapper').hide()
        $('.pms-vat-number .pms_field-errors-wrapper').remove()

        var tax_country = $( tax_country_selector ).val(), default_length = 8
        var vat_number  = $( tax_vat_selector ).val()

        checkedVatNumber = vat_number

        if( !(tax_country.length > 0) || !( vat_number.length > 0 ) )
            return

        /**
         * determine minimum length based on country
         *
         * ideally we would validate the format with regex, but this is good enough for now
         */
        if( PMSTaxOptions.euvat_numbers_minimum_char && PMSTaxOptions.euvat_numbers_minimum_char[tax_country] )
            default_length = PMSTaxOptions.euvat_numbers_minimum_char[tax_country]

        // remove country prefix from vat number
        if( vat_number.indexOf( tax_country ) == 0 )
            vat_number = vat_number.substring( tax_country.length )

        if( vat_number.length >= default_length ){

            checkedVatNumber = vat_number

            var data            = {}
                data.action     = 'pms_tax_validate_vat'
                data.vatNumber  = vat_number
                data.vatCountry = tax_country


            $.post( PMSTaxOptions.ajax_url, data, function( response ) {

                if( !response )
                    return

                response = JSON.parse( response )

                if( response.status ) {

                    $('.pms-vat-number .pms_field-success-wrapper').hide()
                    $('.pms-vat-number .pms_field-errors-wrapper').remove()

                    if( response.status == 'valid' ){

                        var message = PMSTaxOptions.euvat_number_valid_message

                        if( PMSTaxOptions.euvat_merchant_country == tax_country )
                            message = PMSTaxOptions.euvat_number_valid_message_same_country

                        // using data here so this attribute can't be seen in the DOM
                        $('#pms_vat_number').data( 'vat-valid', true )

                        if( !( $('.pms-vat-number .pms_field-success-wrapper').length > 0 ) )
                            $('#pms_vat_number').parent().after( '<div class="pms_field-success-wrapper"><p>' + message + '</p></div>' )
                        else {
                            $('.pms-vat-number .pms_field-success-wrapper').html( '<p>' + message + '</p>' )
                            $('.pms-vat-number .pms_field-success-wrapper').show()
                        }

                        pms_tax_price_breakdown()

                    } else if( response.status == 'invalid' ) {

                        $('#pms_vat_number').data( 'vat-valid', false )

                        $.pms_add_field_error( PMSTaxOptions.euvat_number_invalid_message, 'pms_vat_number' )

                        pms_tax_price_breakdown()

                    }
                }

            })

        } else {

            $.pms_add_field_error( PMSTaxOptions.euvat_number_short_message, 'pms_vat_number' )

            $('#pms_vat_number').data( 'vat-valid', false )

            pms_tax_price_breakdown()

        }

    }

    function pms_tax_apply_sign_up_fee(){


        var locations = [ 'pms_register', 'pms_new_subscription', 'pms_confirm_retry_payment_subscription', 'register', 'pms_upgrade_subscription' ],
            checked_subscription = jQuery( subscription_plan_selector + '[type=radio]' ).length > 0 ? jQuery( subscription_plan_selector + '[type=radio]:checked' ) : jQuery( subscription_plan_selector + '[type=hidden]' )

        if( locations.includes( jQuery( '.pms-form .pms-form-submit' ).attr('name') ) ||
            locations.includes( jQuery( '.wppb-user-forms .form-submit input[type="submit"]' ).attr('name') ) ||
            locations.includes( jQuery( '#pms-upgrade-subscription-form input[name="pms_upgrade_subscription"]').attr('name') ) ) {

            if( typeof checked_subscription.data('sign_up_fee') != 'undefined' && checked_subscription.data('sign_up_fee') != 0 && ( !checked_subscription.data('discounted-price') || ( checked_subscription.data('discounted-price') == 'false' && checked_subscription.data('sign_up_fee') != 0 ) ) )
                return true

        }

        return false

    }
})
