<p>
    <?php printf( esc_html__( 'You are currently using %d out of %d member slots available for your subscription', 'paid-member-subscriptions' ), pms_gm_get_used_seats( $subscription->id ), pms_gm_get_total_seats( $subscription ) ); ?>
</p>

<?php
    $members_list = pms_gm_get_group_members( $subscription->id );
?>

<h3>
    <?php esc_html_e( 'Members List', 'paid-member-subscriptions' ); ?>
</h3>

<div id="pms-members-table">
    <div class="pms-members-table__wrap">
        <div class="pms-members-table__search search">
            <label>
                <span class="screen-reader-text"><?php esc_html_e( 'Search For:', 'paid-member-subscriptions' ); ?></span>
                <input class="search-field fuzzy-search" type="search" placeholder="<?php esc_html_e( 'Search...', 'paid-member-subscriptions' ); ?>" value="">
            </label>
        </div>

        <div class="pms-members-table__messages"></div>
    </div>

    <table>
        <thead>
            <tr>
                <th class="sort cell-1" data-sort="pms-members-list__email">
                    <div class="pms-members-table__thwrap">
                        <?php esc_html_e( 'Email', 'paid-member-subscriptions' ); ?>
                    </div>
                </th>
                <th class="sort cell-2" data-sort="pms-members-list__name">
                    <div class="pms-members-table__thwrap">
                        <?php esc_html_e( 'Name', 'paid-member-subscriptions' ); ?>
                    </div>
                </th>
                <th class="sort desc cell-3" data-sort="pms-members-list__status">
                    <div class="pms-members-table__thwrap">
                        <?php esc_html_e( 'Status', 'paid-member-subscriptions' ); ?>
                    </div>
                </th>
                <th class="cell-4"><?php esc_html_e( 'Actions', 'paid-member-subscriptions' ); ?></th>
            </tr>
        </thead>

        <tbody class="pms-members-list list">
            <?php foreach( $members_list as $member_reference ) : ?>
                <tr>
                    <?php
                        $row = array();
                        $i = 0;

                        if( is_numeric( $member_reference ) ){
                            $member_user_id = pms_gm_get_member_subscription_user_id( $member_reference );

                            $row['email']   = pms_gm_get_email_by_user_id( $member_user_id );
                            $row['name']    = pms_gm_get_user_name( $member_user_id, true );
                            $row['status']  = pms_gm_is_group_owner( $member_reference ) ? esc_html__( 'Owner', 'paid-member-subscriptions' ) : esc_html__( 'Registered', 'paid-member-subscriptions' );;
                            $row['actions'] = $this->get_members_row_actions( $member_reference, $subscription->id );
                        } else {
                            $row['email']   = $member_reference;
                            $row['name']    = '';
                            $row['status']  = esc_html__( 'Invited', 'paid-member-subscriptions' );
                            $row['actions'] = $this->get_members_row_actions( $member_reference, $subscription->id );
                        }
                    ?>

                    <?php foreach( $row as $key => $value ) : $i++; ?>
                        <td class="pms-members-list__<?php echo $key; ?> cell-<?php echo $i; ?>"><?php echo $value ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <ul class="pms-gm-pagination"></ul>
</div>
