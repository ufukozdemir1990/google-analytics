window.onload = function () {
    let chart_view = new CanvasJS.Chart("chart-view", {
        animationEnabled: true,
        exportEnabled: true,
        theme: "light2",
        axisX:{
            labelFontSize: 13,
        },
        axisY: {
            title: "Saatlik Veriler",
        },
        toolTip:{
            shared:true
        },
        legend:{
            cursor:"pointer",
            verticalAlign: "bottom",
            horizontalAlign: "center",
            dockInsidePlotArea: false,
            fontSize: 10,
            itemclick: toogleDataSeries
        },
        data: [
            {
                type: "splineArea",
                showInLegend: true,
                name: "Görüntülenme",
                markerType: "square",
                dataPoints: $('#chart-view').data('session')

            },
            {
                type: "splineArea",
                showInLegend: true,
                name: "Ziyaretçi",
                lineDashType: "dash",
                dataPoints: $('#chart-view').data('pageviews')
            }
        ]
    });
    let chart_traffic = new CanvasJS.Chart("chart-traffic", {
        animationEnabled: true,
        exportEnabled: true,
        theme: "light2",
        axisX:{
            labelFontSize: 13,
        },
        axisY: {
            title: "Saatlik Veriler",
        },
        legend:{
            verticalAlign: "top",
            horizontalAlign: "center",
            dockInsidePlotArea: false,
            fontSize: 10
        },
        data: [{
            type: "column",
            showInLegend: false,
            legendMarkerColor: "grey",
            dataPoints: $('#chart-traffic').data('traffic')
        }]
    });
    let chart_device = new CanvasJS.Chart("chart-device", {
        animationEnabled: true,
        exportEnabled: true,
        theme: "light2",
        axisX:{
            labelFontSize: 13,
        },
        axisY: {
            title: "Saatlik Veriler",
        },
        legend:{
            verticalAlign: "bottom",
            horizontalAlign: "center",
            dockInsidePlotArea: false,
            fontSize: 10
        },
        data: [{
            type: "pie",
            startAngle: 25,
            toolTipContent: "<b>{label}</b>: {y}",
            showInLegend: "true",
            legendText: "{label}",
            indexLabelFontSize: 16,
            indexLabel: "{label} - {y}",
            dataPoints: $('#chart-device').data('device')
        }]
    });
    let chart_browser = new CanvasJS.Chart("chart-browser", {
        animationEnabled: true,
        exportEnabled: true,
        theme: "light2",
        axisX:{
            labelFontSize: 13,
        },
        axisY: {
            title: "Saatlik Veriler",
        },
        legend:{
            verticalAlign: "bottom",
            horizontalAlign: "center",
            dockInsidePlotArea: false,
            fontSize: 10
        },
        data: [{
            type: "pie",
            startAngle: 25,
            toolTipContent: "<b>{label}</b>: {y}",
            showInLegend: "true",
            legendText: "{label}",
            indexLabelFontSize: 16,
            indexLabel: "{label} - {y}",
            dataPoints: $('#chart-browser').data('browser')
        }]
    });

    chart_view.render();
    chart_traffic.render();
    chart_device.render();
    chart_browser.render();

    function toogleDataSeries(e){
        if (typeof(e.dataSeries.visible) == "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        } else{
            e.dataSeries.visible = true;
        }
        chart_view.render();
    }
};