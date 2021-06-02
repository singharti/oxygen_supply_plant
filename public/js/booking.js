$(function () {
    $("#date_covid_19").datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        minDate: new Date(2020, 0, 1),
        maxDate: new Date,
        defaultDate: new Date,
    });

});
$(".state").change(function () {
    $('.city').find('option').remove().end()
        .append('<option value="">Select City</option>').val('');
    var state_id = $(".state option:selected").data('id');
    $.ajax({
        type: 'GET',
        url: "/city" + "/" + state_id,
        data: {


        },
        success: function (data) {
            var $citySelect = $('.city');
            $.each(data.cities, function (key, value) {

                var $option = $("<option/>", {
                    value: value.name,
                    text: value.name
                });
                $citySelect.append($option);
            });


        },
        error: function (result) {


        }
    });
});

