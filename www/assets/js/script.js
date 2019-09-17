$(function () {
    //AJAX EM PROCESSO02 SEGURADORA
    $(document).on('click', '.value', function (e) {
        e.preventDefault();
        var value = $(this).val();

        $.ajax({
            type: 'POST',
            url: 'ajax.php',
            data: {value: value},
            success: function (data) {
                $('.alert').html(data[value]);
                $('#home').html(data.home);
                $('#service').html(data.service);
                $('#contact').html(data.contact);
            }
        });
    });
});