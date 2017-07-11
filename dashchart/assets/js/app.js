$(document).ready(function(){
	$.ajax({
		url: "http://localhost/CRPS/dashchart/data.php",
		method : "GET",
		success: function(data){
			console.log(data);
			var prob = [];
			var occ =[];

			for (var i in data) {
				prob.push(data[i].probability);
				occ.push(data[i].occurance);
			}

			var chartdata = {
				labels: prob,
				datasets: [
					{
						label: 'Credit Score',
						backgroundColor: '#69b0f5',
						borderColor: '#CDCDCD',
						hoverBackgroundColor: '#17334e',
						hoverBorderColor: '#FFAAFF',
						data: occ
					}
				]
			};
			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata
			});
		},
		error: function(data){
			//console.log(data);
		}
	});


});