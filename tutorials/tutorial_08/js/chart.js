$(document).ready(function () {
    graph();
});

function graph() {
    {
        var name = [];
        var age = [];

        for (var i in data) {
            name.push(data[i].student_name);
            age.push(data[i].age);
        }

        var chartdata = {
            labels: name,
            datasets: [
                {
                    label: "Age",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "rgba(59, 89, 152, 0.75)",
                    borderColor: "rgba(59, 89, 152, 1)",
                    pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
                    pointHoverBorderColor: "rgba(59, 89, 152, 1)",
                    data: age,
                },
            ],
        };

        var graphTarget = $("#myCanvas");

        new Chart(graphTarget, {
            type: "line",
            data: chartdata,
        });
    }
}
