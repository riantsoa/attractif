//open dropdown login-box
$('#login-btn').click(function(event) {
    event.preventDefault();
    if ($('#login-box').hasClass('active')) {
        $('#login-box').removeClass('active');
    } else {
        $('#login-box').addClass('active');
    }
});
