

var d = new Date();

var month = d.getMonth()+1;
var day = d.getDate();


var output = (day<10 ? '0' : '') + day + '/' +
    (month<10 ? '0' : '') + month + '/' +d.getFullYear();
    console.log(output);

'use strict';
$(document).ready(function () {

    $('input[name="single-date-picker"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });

    $('input[name="simple_date_range_picker"]').daterangepicker();

    $('input[name="simple_date_range_picker-callback"]').daterangepicker({
        opens: 'left'
    }, function (start, end, label) {
        swal("A new date selection was made", output + ' to ' + end.format('YYYY-MM-DD'), "success")
    });

    $('input[name="datetimes"]').daterangepicker({
        timePicker: true,
        startDate: moment().startOf('hour'),
        endDate: moment().startOf('hour').add(32, 'hour'),
        locale: {
            format: 'M/DD hh:mm A'
        }
    });

    /**
     * datefilter
     */
    var datefilter = $('input[name="datefilter"]');
    datefilter.daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        }
    });

    datefilter.on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
    });

    $('input.create-event-datepicker').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        autoUpdateInput: false
    }).on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MM/DD/YYYY'));
    });

});