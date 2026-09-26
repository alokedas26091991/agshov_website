
$(document).ready(function() {
        $('#multiselect').multiselect({
           enableFiltering: true,
		   enableCaseInsensitiveFiltering: true,
          filterPlaceholder: 'Search for something...'
        });
		var valArr = selectArr;
        var i = 0, size = valArr.length;
		
        for (i; i < size; i++) {
            $('#multiselect').multiselect('select', valArr[i]);
        }
    });

