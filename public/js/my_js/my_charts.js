function create_pie_chart(pie_chart_data) {
    let data = [];
    pie_chart_data.map((value) => {
        data.push({label: value['brand'], data: value['total']});
    });

    let pie = $.plot($(".pie"), data, {
        series: {
            pie: {
                show: true,
                radius: 3 / 4,
                label: {
                    show: true,
                    radius: 3 / 4,
                    formatter: function (label, series) {

                        return '<div style="font-size:10pt;text-align:center;padding:2px;color:white;">' + label + '<br/>' + series['data'][0][1] + '</div>';
                    },
                    background: {
                        opacity: 0.5,
                        color: '#000'
                    }
                },
                innerRadius: 0.4
            },
            legend: {
                show: false
            }
        }
    })
}

