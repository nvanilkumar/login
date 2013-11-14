$(document).ready(function() {
    $.fn.dataTableExt.afnFiltering.push(function(oSettings, aData, iDataIndex) {
		//volunteers, teachers, active and inactive
        var volunteers = $('#volunteers').is(':checked');
		var teachers = $('#teachers').is(':checked');
        if (volunteers && aData[4] ==1)
		{
            return true;
        }
		
		if (teachers && aData[4] ==2)
		{
            return true;
        }
         
        return false;
    });
    var oTable = $('#list_user').dataTable();
    $('#volunteers, #teachers').live("click", function(e) { 
        oTable.fnDraw();
    });

});