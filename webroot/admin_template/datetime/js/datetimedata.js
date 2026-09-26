
    $(function () {
		$('#datetimepicker1').datetimepicker({format: 'DD/MM/YYYY'});
		$('#datetimepicker2').datetimepicker({format: 'DD/MM/YYYY'});
		$('#datetimepicker3').datetimepicker({format: 'DD/MM/YYYY'});
        $('#datetimepicker6').datetimepicker({format: 'DD/MM/YYYY'});
        $('#datetimepicker7').datetimepicker({
			format: 'DD/MM/YYYY',
            useCurrent: false //Important! See issue #1075
        });
        $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function (e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });
        
 $('.multiselect-group').before('<input type="checkbox" />');
$(document).on('click', '.multiselect-group', function(event) {
    var checkAll = true;
    var $opts = $(this).parent().nextUntil(':has(.multiselect-group)'); 
    var $inactive = $opts.filter(':not(.active)'); 
    var $toggleMe = $inactive;
    if ($inactive.length == 0) { 
        $toggleMe = $opts;
        checkAll = false;
    }
    $toggleMe.find('input').click();
    $(this).parent().find('input').attr('checked', checkAll);
    event.preventDefault();
});
    });
									
		

