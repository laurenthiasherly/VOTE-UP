function ajaxGetDatafromDatabase(provincename){
    $.ajax({
        url: 'lauren.php',
        success: function(data, status) {
            $("#contentTopic").html(data);
        },
        error: function(xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
        }
    });
}

