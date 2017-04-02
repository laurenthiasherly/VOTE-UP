<?php include "partials/party.php"; ?>
<?php include "partials/comparison.php"; ?>
<div class="map-space">
    <div class="column map-title center">
        <h5>
            Please, select your province for more information about your Members of Parliament
        </h5>
    
    </div>
    
    
    <div id="container" class="map-style">
        <div class="loading">
            <i class="icon-spinner icon-spin icon-large"></i>
            
        </div>
    </div>
</div>

<div class="column show-for-small-only mp-title center">
    <div class="column center">
        <h1> Who's My Members of Parliament? </h1>
    </div>
    <div class="column map-title center">
        <h5>
            Please, select your province for more information about your MP
        </h5>
    
    </div>
    <form method="" action="">
        <li>
            <select id="selectProvince">
				<option value="select">Select Province</option>
                <option value="British Columbia">British Columbia</option>
                <option value="Alberta">Alberta</option>
                <option value="Saskatchewan">Saskatchewan</option>
                <option value="Manitoba">Manitoba</option>
                <option value="Ontario">Ontario</option>
                <option value="Quebec">Quebec</option>
                <option value="New Brunswick">New Brunswick</option>
                <option value="Nova Scotia">Nova Scotia</option>
                <option value="Prince Edward">Prince Edward</option>
                <option value="Newfoundland">Newfoundland and Labrador</option>
                <option value="Nuvanut">Nuvanut</option>
                <option value="Northwest Territories">Northwest Territories</option>
                <option value="Yukon">Yukon</option>

            </select>
        </li>
    </form>

</div>

<div class="mp-title-style">
    <h1 style="width:100%;text-align:center;" id="provinceNamePage"></h1>
    <div id="contentTopicMp">
    </div>
</div>


<?php include "partials/footer.php"; ?>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/maps/modules/map.js"></script>
<script src="https://code.highcharts.com/maps/modules/data.js"></script>
<script src="https://code.highcharts.com/mapdata/countries/ca/ca-all.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<!--<script src="js/main.js"></script>-->
<script src="js/ajax.js"></script>
<script>
    Highcharts.data({

    googleSpreadsheetKey: '0AoIaUO7wH1HwdDFXSlpjN2J4aGg5MkVHWVhsYmtyVWc',

    parsed: function (columns) {

        function pointClick() {
             $("#provinceNamePage").css("padding","90px 0 20px 0");
            $("#provinceNamePage").text(this.name);
            if(this.name=="Québec"){
                this.name="Quebec";
            }
			if(this.name=="Newfoundland and Labrador"){
				this.name="Newfoundland";
			}
			if(this.mae=="Northwest Territories"){
				this.name="North West Territories";
			}
            $('html, body').animate({scrollTop: $("#provinceNamePage").offset().top}, 1000);
            ajaxGetDatafromDatabase(this.name);

        }  

        var keys = columns[0],
            names = columns[1],
            numberMP = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15],
            options = {
                chart: {
                    renderTo: 'container',
                    type: 'map',
                    borderWidth: 0
                },

                title: {
                    text: ''
                },
                
                colorAxis: {

                    dataClasses: [ {
                        from: 0,
                        to: 100,
                        color: '#7f142b',
                        name: ''
                    }]
                },

                series: [{
                    data: [],
                    mapData: Highcharts.maps['countries/ca/ca-all'],
                    joinBy: 'postal-code',
                    dataLabels: {
                        enabled: true,
                        color: '#FFFFFF',
                        format: '{point.postal-code}',
                        style: {
                            textTransform: 'uppercase'
                        }
                    },
                    name: 'Province',
                    point: {
                        events: {
                            click: pointClick
                        }
                    },
                    cursor: 'pointer'
                }]
            };
        keys = keys.map(function (key) {
            return key.toUpperCase();
        });

        var index=0;

        Highcharts.each(options.series[0].mapData.features, function (mapPoint) {
            if (mapPoint.properties['postal-code']) {
                var postalCode = mapPoint.properties['postal-code'],
                    i = $.inArray(postalCode, keys);
                options.series[0].data.push(Highcharts.extend({
                    value: numberMP[index],
                    name: names[i],
                    'postal-code': postalCode,
                    row: i
                }, mapPoint));
                index+=1;
            }
        });

        window.chart = new Highcharts.Map(options);
    },

    error: function () {
        $('#container').html('<div class="loading">' +
            '<i class="icon-frown icon-large"></i> ' +
            '<p>Error loading data from Google Spreadsheets</p>' +
            '</div>');
    }
});

$(".highcharts-background").eq(0).attr("fill","#7f142b");


</script>




