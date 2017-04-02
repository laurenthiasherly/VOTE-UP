function ajaxGetDatafromDatabase(provincename){
    $.ajax({
        url: 'partiesMP.php',
        type:'POST',
        data: {"province":provincename},
        success: function(data, status) {
            $("#parties-mp-list-content").html(data);
        },
        error: function(xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
        }
    });
}

