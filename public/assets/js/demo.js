type = ['','info','success','warning','danger'];


demo = {    
    initChartist: function(dataSales = null){
        var optionsSales = {
          lineSmooth: false,
          low: 0,
          high: Math.max.apply(null, json.series[0]),
          showArea: true,
          height: "245px",
          axisX: {
            showGrid: false,
          },
          axisY: {
            onlyInteger: true,
          },
          lineSmooth: Chartist.Interpolation.simple({
            divisor: 2
          }),
          showLine: true,
          showPoint: false,
        };

        var responsiveSales = [
          ['screen and (max-width: 640px)', {
            axisX: {
              labelInterpolationFnc: function (value) {
                return value[0];
              }
            }
          }]
        ];

        Chartist.Line('#chartHours', dataSales, optionsSales, responsiveSales);
    },

	showNotification: function(from, align){
    	color = Math.floor((Math.random() * 4) + 1);

    	$.notify({
        	icon: "ti-gift",
        	message: "Welcome to <b>Paper Dashboard</b> - a beautiful freebie for every web developer."

        },{
            type: type[color],
            timer: 4000,
            placement: {
                from: from,
                align: align
            }
        });
	}


}
