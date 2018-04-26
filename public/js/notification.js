

$('#globe').click(function () {
    var url = urlBase + '/readNotification';
    $.ajax({
        data: {
            '_token': _token
        },
        type: 'POST',
        dataType: 'json',
        url: url,
        success: function () {
            $('#notificationNumber').remove();
        }, error: function (response) {

        }

    });
});