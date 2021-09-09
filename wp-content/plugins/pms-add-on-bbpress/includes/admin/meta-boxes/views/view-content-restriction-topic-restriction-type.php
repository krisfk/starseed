<?php
/*
 * HTML output for content restriction meta-box regarding topic restriction type
 */
?>

<div class="pms-meta-box-field-wrapper">
    <label class="pms-meta-box-field-label"><?php _e( 'Topic Restriction Mode', 'paid-member-subscriptions' ); ?></label>

    <?php $topic_restriction_mode = get_post_meta( $post_id, 'pms-bbpress-topic-restriction-mode', true ); ?>

    <?php if( get_post_type() == 'topic' ): ?>

        <label class="pms-meta-box-checkbox-label">
            <input type="radio" value="forum_default" <?php echo ( empty( $topic_restriction_mode ) || $topic_restriction_mode == 'forum_default' ? 'checked' : '' ); ?> name="pms-bbpress-topic-restriction-mode">
            <?php echo __( 'Forum Default', 'paid-member-subscriptions' ); ?>
        </label>

    <?php endif; ?>

    <label class="pms-meta-box-checkbox-label">
        <input type="radio" value="hide_topic" <?php echo ( ( empty( $topic_restriction_mode ) && get_post_type() == 'forum' ) || $topic_restriction_mode == 'hide_topic' ? 'checked' : '' ); ?> name="pms-bbpress-topic-restriction-mode">
        <?php echo __( 'Hide Topic and Replies', 'paid-member-subscriptions' ); ?>
    </label>

    <label class="pms-meta-box-checkbox-label">
        <input type="radio" value="show_topic" <?php echo ( ! empty( $topic_restriction_mode ) && $topic_restriction_mode == 'show_topic' ? 'checked' : '' ); ?> name="pms-bbpress-topic-restriction-mode">
        <?php echo __( 'Show Topic, but hide Replies', 'paid-member-subscriptions' ); ?>
    </label>

    <p class="description" style="margin-top: 10px;">
        <?php echo __( 'The option above will work only if the restriction type is Message. Redirects will take effect without regard of this option.', 'paid-member-subscriptions' ); ?>
    </p>

</div>
