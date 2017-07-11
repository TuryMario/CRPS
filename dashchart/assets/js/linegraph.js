$(document).ready(function(){
	$.ajax({
		url: "http://localhost/CRPS/dashchart/followersdata.php",
		type: "GET",
		success: function(data){
			console.log(data);

			var userid = [];
			var prob =[];

			for (var i in data) {
				userid.push("train"+ data[i].userid);
				prob.push(data[i].probability);
			}

			var chartdata = {
				labels: userid,
				datasets: [
					// {
					// 	label: 'facebook',
					// 	fill: 'false',
					// 	lineTension: '0.01',
					// 	backgroundColor: 'rgba(59, 89, 152, 0.75)',
					// 	borderColor: 'rgba(59, 89, 152, 1)',
					// 	pointHoverBackgroundColor: 'rgba(59, 89, 152, 1)',
					// 	pointHoverBorderColor: 'rgba(59, 89, 152, 0.75)',
					// 	data: facebook_follower
					// },
					// {
					// 	label: 'twitter',
					// 	fill: 'false',
					// 	lineTension: '0.1',
					// 	backgroundColor: 'rgba(29, 202, 255, 0.75)',
					// 	borderColor: 'rgba(29, 202, 255, 1)',
					// 	pointHoverBackgroundColor: 'rgba(529, 202, 255, 1)',
					// 	pointHoverBorderColor: 'rgba(29, 202, 255, 0.75)',
					// 	data: twitter_follower
					// },
					{
						label: 'training',
						fill: 'false',
						lineTension: '0.1',
						backgroundColor: 'rgba(221, 72, 54, 0.75)',
						borderColor: 'rgba(221, 72, 54, 1)',
						pointHoverBackgroundColor: 'rgba(221, 72, 54, 1)',
						pointHoverBorderColor: 'rgba(221, 72, 54, 0.75)',
						data: prob
					},
				]
			};
			var ctx = $("#linegraph");

			var lineGraph = new Chart(ctx, {
				type: 'line',
				data: chartdata
			});

		},
		error: function(data){
			console.log("Error occured");
		}
	})
});