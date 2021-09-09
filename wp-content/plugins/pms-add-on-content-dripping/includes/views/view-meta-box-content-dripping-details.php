<?php
/*
 * HTML output for the Content Dripping Set details meta-box
 */
?>

<div class="pms-meta-box-field-wrapper">

    <label for="pms-content-dripping-set-subscription-plan" class="pms-meta-box-field-label"><?php echo __( 'Subscription Plan', 'paid-member-subscriptions' ); ?></label>

    <select id="pms-content-dripping-set-subscription-plan" name="pms_content_dripping_set_subscription_plan">
        <option value="0"><?php _e( 'Choose...', 'paid-member-subscriptions' ); ?></option>
        <?php
        $subscription_plans = pms_get_subscription_plans();

        if( !empty( $subscription_plans ) ) {
            foreach( $subscription_plans as $subscription_plan )
                echo '<option value="' . esc_attr( $subscription_plan->id ) . '" ' . selected( $subscription_plan->id, $this->post_meta['pms_content_dripping_set_subscription_plan'], false ) . '>' . esc_attr( $subscription_plan->name ) . '</option>';
        }
        ?>
    </select>
    <p class="description"><?php echo __( 'Select the subscription plan for which this content dripping set should apply.', 'paid-member-subscriptions' ); ?></p>

</div>

<div class="pms-meta-box-field-wrapper">

    <label for="pms-content-dripping-set-status" class="pms-meta-box-field-label"><?php echo __( 'Status', 'paid-member-subscriptions' ); ?></label>

    <select id="pms-content-dripping-set-status" name="pms_content_dripping_set_status">
        <option value="active" <?php selected( 'active', $this->post_meta['pms_content_dripping_set_status'], true ); ?>><?php echo __( 'Active', 'paid-member-subscriptions' ); ?></option>
        <option value="inactive" <?php selected( 'inactive', $this->post_meta['pms_content_dripping_set_status'], true ); ?>><?php echo __( 'Inactive', 'paid-member-subscriptions' ); ?></option>
    </select>
    <p class="description"><?php echo __( 'Select content dripping set status.', 'paid-member-subscriptions' ); ?></p>

</div>