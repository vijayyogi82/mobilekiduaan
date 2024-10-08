$(function() {

	/* Bar-Chart1 */
	var ctx = document.getElementById("chartBar1").getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
			datasets: [{
				label: 'Views',
				data: [200, 450, 290, 367, 256, 543, 345],
				borderWidth: 2,
				backgroundColor: '#ff6600',
				borderColor: '#ff6600',
				pointBackgroundColor: '#ffffff',

			}]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			legend: {
				display: true
			},
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true,
						stepSize: 150,
						fontColor: "#77778e",
					},
					gridLines: {
						color: 'rgba(119, 119, 142, 0.2)'
					}
				}],
				xAxes: [{
					ticks: {
						display: true,
						fontColor: "#77778e",
					},
					gridLines: {
						display: false,
						color: 'rgba(119, 119, 142, 0.2)'
					}
				}]
			},
			legend: {
				labels: {
					fontColor: "#77778e"
				},
			},
		}
	});

	
});