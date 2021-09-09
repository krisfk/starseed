<?php
/**
 * HTML Output for the front-end price breakdown
 */

// load some defaults based on the currently selected plan ? If URL parameters are set
?>

<ul class="pms-field-section pms-price-breakdown__holder">

    <li class="pms-field pms-field-type-heading">
        <h3><?php _e( 'Your Purchase', 'paid-member-subscriptions' ); ?></h3>
    </li>

    <div class="pms-price-breakdown">

        <table>
            <tr>
                <td class="pms-label pms-subtotal__label"><?php _e( 'Subtotal:', 'paid-member-subscriptions' ); ?></td>
                <td class="pms-value pms-subtotal__value"></td>
            </tr>

            <tr>
                <td class="pms-label pms-tax__label"><?php _e( 'VAT/Tax:', 'paid-member-subscriptions' ); ?></td>
                <td class="pms-value pms-tax__value"></td>
            </tr>

            <tr>
                <td class="pms-label pms-total__label"><?php _e( 'Total Price:', 'paid-member-subscriptions' ); ?></td>
                <td class="pms-value pms-total__value"></td>
            </tr>
        </table>

    </div>

</ul>
