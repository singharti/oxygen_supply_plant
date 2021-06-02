    $(function() {
        $("#date").datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            minDate: new Date(2020, 0, 1),
            maxDate: new Date,
            defaultDate: new Date,
        });

    });