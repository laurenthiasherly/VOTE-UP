function ajaxGetDatafromDatabase(provincename){
    $.ajax({
        url: 'mpdatabase.php',
		type: 'POST',
		data: {'province':provincename},
        success: function(data, status) {
            $("#contentTopicMp").html(data);
        },
        error: function(xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
        }
    });
}

$('#selectProvince').change(function(){
	if($(this).val()=="select"){
		$("#contentTopicMp").html("");
	}else{
		ajaxGetDatafromDatabase($(this).val());
	}
});

function ajaxPartiesGetDatafromDatabase(provincename,party){
    $.ajax({
        url: 'mpdatabase.php',
		type: 'POST',
		data: {'province':provincename,'party':party},
        success: function(data, status) {
            $("#contentTopicMp").html(data);
        },
        error: function(xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
        }
    });
}