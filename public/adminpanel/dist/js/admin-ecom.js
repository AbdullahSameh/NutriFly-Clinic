


function check_all()
{
    //check_item
    $('input[class="check_item"]:checkbox').each(function () {
        if ($('input[class="check_all"]:checkbox:checked').length == 0) {
            $(this).prop('checked', false);
        } else {
            $(this).prop('checked', true);
        }
    });
}

function delete_all() {

    $(document).on('click', '.delete-all', function() {
        $('#form_data').submit();
    });
    
    $(document).on('click', '.del_all', function() {
        var adminChecked = $('input[class="check_item"]:checkbox').filter(':checked').length;
        if (adminChecked > 0) {
            $('.record_count').text(adminChecked);
            $('.empty_admin').addClass('hidden');
            $('.not_empty_admin').removeClass('hidden');
        } else {
            $('.record_count').text('');
            $('.empty_admin').removeClass('hidden');
            $('.not_empty_admin').addClass('hidden');
        }
        $('#multiDel').modal('show');
    });
}