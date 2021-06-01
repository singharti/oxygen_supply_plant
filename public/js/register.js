
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

