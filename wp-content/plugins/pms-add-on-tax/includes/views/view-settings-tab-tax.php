<?php
/**
 * HTML Output for the PMS Settings page -> Tax tab
 */
?>

<div id="pms-settings-tax" class="pms-tab <?php echo ( $active_tab == 'tax' ? 'tab-active' : '' ); ?>">

    <?php do_action( 'pms-settings-page_tab_tax_before_content', $options ); ?>

    <div id="enable-tax">

        <div class="pms-form-field-wrapper">
            <label class="pms-form-field-label" for="enable-tax"><?php _e( 'Enable Tax Rates', 'paid-member-subscriptions' ) ?></label>

            <p class="description"><input type="checkbox" id="enable-tax" name="pms_tax_settings[enable_tax]" value="1" <?php echo ( isset( $options['enable_tax'] ) ? checked($options['enable_tax'], '1', false) : '' ); ?> /><?php _e( '<strong>Enable taxes and tax calculations on all subscription plan purchases. </strong>', 'paid-member-subscriptions' ); ?></p>
        </div>

        <?php do_action( 'pms-settings-enable_tax_after_content', $options ); ?>

    </div>

    <div id="tax-options">

        <h4 class="pms-subsection-title"><?php _e( 'Tax Options', 'paid-member-subscriptions' ); ?></h4>

        <div class="pms-form-field-wrapper">
            <label class="pms-form-field-label"><?php _e( 'Prices entered with tax', 'paid-member-subscriptions' ) ?></label>

            <?php // Set default
            if ( !isset($options['prices_include_tax'] ) )
            $options['prices_include_tax'] = 'no'; ?>

            <div>
                <label>
                    <input type="radio" name="pms_tax_settings[prices_include_tax]" value="yes" <?php checked($options['prices_include_tax'], 'yes', true); ?> />
                    <span><?php _e( 'Yes, I will enter subscription prices inclusive of tax', 'paid-member-subscriptions' ); ?></span>
                </label>
            </div>

            <div>
                <label>
                    <input type="radio" name="pms_tax_settings[prices_include_tax]" value="no"  <?php checked($options['prices_include_tax'], 'no', true); ?> />
                    <span><?php _e( 'No, I will enter subscription prices exclusive of tax', 'paid-member-subscriptions' ); ?></span>
                </label>
            </div>

        </div>

        <div class="pms-form-field-wrapper">
            <label class="pms-form-field-label" for="default-billing-country"><?php _e( 'Default Billing Country', 'paid-member-subscriptions' ) ?></label>

            <select id="default-billing-country" class="pms-chosen" name="pms_tax_settings[default-billing-country]">
                <option value="" <?php selected( isset( $options['default-billing-country'] ) ? $options['default-billing-country'] : '', '') ?>><?php _e( 'None', 'paid-member-subscriptions' ); ?></option>

                <?php
                    $countries = pms_get_countries();
                    unset( $countries[''] );

                    foreach( $countries as $key => $value )
                        echo '<option value="'.$key.'" '. selected( isset( $options['default-billing-country'] ) ? $options['default-billing-country'] : '', $key ) .'>'.$value.'</option>';
                ?>

            </select>

            <p class="description">
                <?php _e( 'Pre-select the Billing Country field from the form.', 'paid-member-subscriptions' ); ?>
            </p>
        </div>

        <div class="pms-form-field-wrapper">
            <label class="pms-form-field-label" for="eu-vat-enable"><?php _e( 'Enable EU VAT', 'paid-member-subscriptions' ) ?></label>

            <p class="description">
                <input type="checkbox" id="eu-vat-enable" name="pms_tax_settings[eu-vat-enable]" value="1" <?php echo ( isset( $options['eu-vat-enable'] ) ? checked($options['eu-vat-enable'], '1', false) : '' ); ?> />
                <?php _e( 'Enable EU VAT on subscription purchases. <br> Your customers will also be able to provide a VAT ID in order to be exempt of paying the vat.<br>', 'paid-member-subscriptions' ); ?>
                <?php _e( 'The plugin already includes the VAT rates for EU countries so you don\'t have to add them, but you can overwrite them below if necessary.', 'paid-member-subscriptions' ); ?>
            </p>
        </div>

        <div class="pms-form-field-wrapper" id="eu-merchant__wrapper">
            <label class="pms-form-field-label" for="merchant-vat-country"><?php _e( 'Merchant VAT Country', 'paid-member-subscriptions' ) ?></label>

            <select id="merchant-vat-country" class="pms-chosen" name="pms_tax_settings[merchant-vat-country]">

                <?php
                    foreach( pms_tax_get_eu_vat_countries( true ) as $key => $value )
                        echo '<option value="'.$key.'" '. selected( isset( $options['merchant-vat-country'] ) ? $options['merchant-vat-country'] : '', $key ) .'>'.$value.'</option>';
                ?>

            </select>

            <p class="description">
                <?php _e( 'Select the Country where the VAT MOSS of your business is registered.', 'paid-member-subscriptions' ); ?>
            </p>
        </div>

        <?php do_action( 'pms-settings-page_tax_options_after_content', $options ); ?>

    </div>

    <div id="tax-rates">

        <h4 class="pms-subsection-title"><?php _e('Tax Rates', 'paid-member-subscriptions'); ?></h4>

        <?php if(isset( $tax_rates ) && !empty( $tax_rates )): ?>

        <div id="custom-tax-rates">

            <table id="pms_custom_tax_rates" class="wp-list-table widefat">
                <thead>
                <tr>
                    <th scope="col" class="manage-column"><?php _e('Country', 'paid-member-subscriptions'); ?></th>
                    <th scope="col" class="manage-column"><?php _e('State', 'paid-member-subscriptions'); ?></th>
                    <th scope="col" class="manage-column"><?php _e('City', 'paid-member-subscriptions'); ?></th>
                    <th scope="col" class="manage-column"><?php _e('Rate %', 'paid-member-subscriptions'); ?></th>
                    <th scope="col" class="manage-column"><?php _e('Name', 'paid-member-subscriptions'); ?></th>
                    <th scope="col" class="manage-column">&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach( $tax_rates as $i => $tax_rate ): ?>
                    <tr id="pms_tax_rate_row_<?php echo $tax_rate['id']; ?>" <?php echo ( ( ($i % 2) == 0 ) ? 'class="alternate"' : '' ); ?>>
                        <td><?php echo empty($tax_rate['tax_country']) ? '*' : $tax_rate['tax_country']; ?></td>
                        <td><?php echo empty($tax_rate['tax_state']) ? '*' : $tax_rate['tax_state']; ?></td>
                        <td><?php echo empty($tax_rate['tax_city']) ? '*' : $tax_rate['tax_city']; ?></td>
                        <td><?php echo number_format($tax_rate['tax_rate'], 2); ?>%</td>
                        <td><?php echo $tax_rate['tax_name']; ?></td>
                        <td width="25px"><a title="<?php _e('Delete','paid-member-subscriptions'); ?>" href="" class="pms-tax-rate-remove alignright" data-id="<?php echo $tax_rate['id']; ?>"><span class="dashicons dashicons-no-alt"></span></a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

        </div>

            <div>&nbsp;</div>

            <div style="float: right;">
                <strong><a href="<?php
                    echo add_query_arg( array( 'action' => 'pms_export_tax_rates', 'pms-tax-nonce' => wp_create_nonce( 'pms_tax_export_rates' ) ), admin_url( 'admin-ajax.php' ) );
                    ?>" class="button"><?php _e('Export Tax Rates', 'memberpress'); ?></a></strong>

                <strong><a href="<?php
                    echo wp_nonce_url (add_query_arg( array('pms-action' => 'pms_clear_tax_rates'), pms_get_current_page_url() ), 'pms_clear_tax_rates', 'pms-tax' );
                    ?>" class="button" onclick="if(!confirm('<?php _e('Are you sure? This will delete all tax rates from the database', 'paid-member-subscriptions'); ?>')){return false;}"><?php _e('Clear Tax Rates', 'paid-member-subscriptions'); ?></a></strong>
            </div>
            <br/>

        <?php else: ?>
            <div id="custom-tax-rates"><strong><?php _e('No custom tax rates have been set. You can add some by uploading a CSV file below.', 'paid-member-subscriptions'); ?></strong></div>
        <?php endif; ?>

        <div class="pms-form-field-wrapper">

            <label class="pms-form-field-label" for="default-tax-rate"><?php _e('Default Tax Rate (%)', 'paid-member-subscriptions'); ?></label>

            <input type="text" id="default-tax-rate" name="pms_tax_settings[default_tax_rate]" value="<?php echo isset( $options['default_tax_rate'] ) ? (float)$options['default_tax_rate'] : 0; ?>" />

            <p class="description"><?php _e('Enter a tax percentage. Customers not in a specific tax rate (defined above) will be charged this rate.'); ?></p>

        </div>

        <div class="pms-form-field-wrapper">

            <label class="pms-form-field-label" for="tax-rates-csv"><?php _e('Upload Tax Rates', 'paid-member-subscriptions'); ?></label>

            <input type="file" id="tax-rates-csv" name="pms_tax_rates_csv" />

            <p class="description"><?php _e('Upload Tax Rates via a CSV file. Use this to select a csv file, then to upload, just click "Save Settings" button.', 'paid-member-subscriptions')?> </p>
            <p class="description"><a href="<?php echo PMS_TAX_PLUGIN_DIR_URL . 'sample-data/sample_tax_rates.csv'; ?>"> <?php _e('Download this sample CSV Tax Rates file', 'paid-member-subscriptions')?></a> <?php _e(' and modify it by adding your required tax rates.','paid-member-subscriptions')?></p>


        </div>

        <?php do_action('pms-settings-page_tax_rates_after_content', $options); ?>

    </div>

</div>
