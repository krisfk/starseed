/*
 * JavaScript for Discount Codes cpt screen
 *
 */
jQuery( function($) {

    /*
     * When publishing or updating the Discount Code must have a title
     *
     */
    $(document).on( 'click', '#publish, #save-post', function() {

        var discountCodeTitle = $('#title').val().trim();

        if( discountCodeTitle == '' ) {

            alert( 'Discount code must have a name.' );

            return false;

        }

    });


    /*
     * Date picker for discount start and expiration date
     * Remove the default "Move to Trash button"
     * Remove the "Edit" link for Discount Code status
     * Remove the "Visibility" box for discount codes
     * Remove the "Save Draft" button
     * Remove the "Status" div
     * Remove the "Published on.." section
     * Rename metabox "Save Discount Code"
     * Change "Publish" button to "Save discount"
     */
    $(document).ready( function() {
        $("input.pms_datepicker").datepicker({dateFormat: 'yy-mm-dd'});
        $('#delete-action').remove();
        $('.edit-post-status').remove();
        $('#visibility').remove();
        $('#minor-publishing-actions').remove();
        $('div.misc-pub-post-status').remove();
        $('#misc-publishing-actions').hide();
        $('#submitdiv h3 span').html('Save Discount Code');
        $('input#publish').val('Save discount');

        // Select discount code on click
        jQuery('.pms-discount-code').click( function() {
            this.select();
        });

        // Display currency name only when discount type is "fixed amount" (not percent)
        $('#pms-discount-type').click(function() {

            if ($(this).attr("value") == "fixed") {
                $(".pms-discount-currency").toggle();
            }
        });

    });

});
