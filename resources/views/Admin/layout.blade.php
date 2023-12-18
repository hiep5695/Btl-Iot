<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IOT DEMO</title>

    <!-- Core CSS - Include with every page -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Blank -->

    <!-- SB Admin CSS - Include with every page -->
    <link href="{{ asset('admin/css/sb-admin.css') }}" rel="stylesheet">
    <!-- load cdn ckeditor (muốn sử dụng offline thì phải download về) -->
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
</head>

<body>

    <div id="wrapper">

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Admin</a>
            </div>
            <!-- /.navbar-header -->
            <div class="navbar-default navbar-static-side" role="navigation" style="background-color: yellow;color: yellow;">

                <div class="sidebar-collapse" >
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="{{ url('backend/doam') }}"><i class="fa fa-table fa-fw"></i>Độ ẩm đo được</a>
                        </li>
                        <li>
                            <a href="{{ url('backend/tudong') }}"><i class="fa fa-table fa-fw"></i>Thời gian bơm nước</a>
                        </li>
                        {{-- <li>
                            <a href="{{ url('backend/lsdoam') }}"><i class="fa fa-table fa-fw"></i>Lịch sử độ ẩm</a>
                        </li> --}}

                        <li>
                            <a href="{{ url('backend/logout') }}"><i class="fa fa-edit fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /#side-menu -->
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper" style="padding-top: 20px;background: aliceblue;">
            <div class="row">
                <div class="col-lg-12">
                    <!-- content here -->
                    @yield('do-du-lieu-tu-view')
                    <!-- end content -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="{{ asset('admin/js/jquery-1.10.2.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>

    <!-- Page-Level Plugin Scripts - Blank -->

    <!-- SB Admin Scripts - Include with every page -->
    <script src="{{ asset('admin/js/sb-admin.js') }}"></script>
    <script>
        function sendDataToServer() {
            var initialState = 0;
            $.get("http://68.183.236.192/-QKPnSkVxFV-Hhw70YVxs2kVJHfhGKmC/get/V1", function(data) {
                // Chuyển đổi dữ liệu nhận được thành số nguyên
                initialState = parseInt(data);
                console.log(data);
               


            });

            // Đường dẫn để gửi dữ liệu đến
            var endpoint = 'http://localhost/IOT/public/backend/update';

            // Gửi dữ liệu bằng phương thức GET
            $.get(endpoint, initialState, function(response) {

                console.log(response);
            });
        }

        // Hàm để kiểm tra và gửi dữ liệu khi đến giờ
        function checkAndSendData() {
            // Tạo một đối tượng Date để lấy giờ hiện tại
            var currentTime = new Date();
            var targetHour = 51; // Đặt giờ bạn muốn kiểm tra
            console.log(targetHour);
            if (currentTime.getMinutes() === targetHour) {
                console.log("123");
                 sendDataToServer();
               
            }
        }

        // Gọi hàm để kiểm tra và gửi dữ liệu mỗi phút
        setInterval(checkAndSendData, 6000);

        // Chạy hàm lần đầu để kiểm tra và gửi dữ liệu ngay từ đầu
        checkAndSendData();
    </script>
    }
    </script>

    <!-- Page-Level Demo Scripts - Blank - Use for reference -->

</body>

</html>
