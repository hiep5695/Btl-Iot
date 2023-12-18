@extends('admin.layout')
@section('do-du-lieu-tu-view')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Biểu đồ độ chạy theo thời gian</title>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/moment"></script>
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    </head>

    <body>

        <div style="width: 700px; height: 400px; margin-left: 120px; margin-top: 150px;display:flex;">
            <canvas id="myChart" width="20" height="10"></canvas>
            <div style="margin-left: 100px; width:100px;">
                <h3 style="width:150px;">Máy bơm</h3>
                <label class="switch">
                    <input type="checkbox" id="toggleSwitch">
                    <span class="slider round"></span>
                </label>
            </div>
        </div>



        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart;

            // Dữ liệu mẫu ban đầu
            var chartData = {
                labels: [],
                datasets: [{
                    label: 'Độ ẩm',
                    data: [],
                    fill: false,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2
                }]
            };

            function updateChart(data) {
                chartData.labels.push(moment().format('h:mm:ss a'));
                chartData.datasets[0].data.push(data);
                if (myChart) {
                    myChart.update();
                } else {
                    myChart = new Chart(ctx, {
                        type: 'line',
                        data: chartData,
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    max: 100,
                                    min: 0,
                                    title: {
                                        text: "Độ ẩm"
                                    }
                                },
                                x: {
                                    type: 'category',
                                    title: {
                                        display: true,
                                        text: 'Thời gian'
                                    }
                                }
                            }
                        }
                    });
                }
            }

            // Hàm để thực hiện cập nhật và vẽ biểu đồ
            function updateAndDrawChart() {
                fetchData().then(data => {
                    console.log(data);
                    updateChart(data);
                });
            }
            // Hàm để lấy dữ liệu từ API (Sử dụng JSONPlaceholder để mô phỏng)
            function fetchData() {
                return fetch('http://68.183.236.192/-QKPnSkVxFV-Hhw70YVxs2kVJHfhGKmC/get/V5')
                    .then(response => response.json())
                    .then(data => {
                        return parseFloat(data[0]);

                    }) // Giả sử bạn muốn lấy một số từ dữ liệu trả về
                    .catch(error => {
                        console.error('Error fetching data:', error);
                        return null;
                    });
            }

            // Gọi hàm updateAndDrawChart khi trang được tải
            updateAndDrawChart();

            // Gọi hàm updateAndDrawChart liên tục sau mỗi 2 giây
            setInterval(updateAndDrawChart, 2000);
            $(document).ready(function() {
                // Lấy trạng thái ban đầu từ URL
                $.get("http://68.183.236.192/-QKPnSkVxFV-Hhw70YVxs2kVJHfhGKmC/get/V4", function(data) {
                    // Chuyển đổi dữ liệu nhận được thành số nguyên
                    var initialState = parseInt(data);

                    // Nếu initialState là 1, đặt trạng thái ban đầu của công tắc chuyển đổi là true (được chọn), ngược lại là false
                    $('#toggleSwitch').prop('checked', initialState === 1);

                    // Cập nhật trạng thái ban đầu
                    updateState();
                });

                // Trạng thái ban đầu
                var currentState = 0;

                // Hàm cập nhật trạng thái dựa trên công tắc chuyển đổi
                function updateState() {
                    currentState = $('#toggleSwitch').prop('checked') ? 1 : 0;
                    updateURLs();
                }

                // Hàm cập nhật các URL với trạng thái hiện tại
                function updateURLs() {
                    var updateURL = "http://68.183.236.192/-QKPnSkVxFV-Hhw70YVxs2kVJHfhGKmC/update/V4?value=" +
                        currentState;
                    var getURL = "http://68.183.236.192/-QKPnSkVxFV-Hhw70YVxs2kVJHfhGKmC/get/V0";
                    $.get(updateURL, function(response) {
                        console.log(currentState);
                    });
                }

                // Bộ lắng nghe sự kiện cho sự thay đổi của công tắc chuyển đổi
                $('#toggleSwitch').change(function() {
                    updateState();
                });
            });
        </script>
        <style>
            .switch {
                position: relative;
                display: inline-block;
                width: 60px;
                height: 34px;
            }

            .switch input {
                opacity: 0;
                width: 0;
                height: 0;
            }

            .slider {
                position: absolute;
                cursor: pointer;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: #ccc;
                -webkit-transition: .4s;
                transition: .4s;
            }

            .slider:before {
                position: absolute;
                content: "";
                height: 26px;
                width: 26px;
                left: 4px;
                bottom: 4px;
                background-color: white;
                -webkit-transition: .4s;
                transition: .4s;
            }

            input:checked+.slider {
                background-color: #2196F3;
            }

            input:focus+.slider {
                box-shadow: 0 0 1px #2196F3;
            }

            input:checked+.slider:before {
                -webkit-transform: translateX(26px);
                -ms-transform: translateX(26px);
                transform: translateX(26px);
            }

            /* Rounded sliders */
            .slider.round {
                border-radius: 34px;
            }

            .slider.round:before {
                border-radius: 50%;
            }
        </style>
    </body>

    </html>
@endsection
