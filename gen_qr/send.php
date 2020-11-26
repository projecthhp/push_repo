<?php
// notification count hours
$count_time = (int) isset($_GET['count']) ? $_GET['count'] : 10800;
if ($count_time != 10800) {
    $count_time = $count_time * 3600;
}
$num_count_hourse = $count_time / 3600;

echo "Set thời gian thành công: " . $num_count_hourse . " giờ";
?>
<html>

<head>
    <title>Tìm việc 365 | Quản lý thông báo</title>
    <meta http-equiv="refresh" content="<?php echo $count_time; ?>" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-1.10.2.js"></script>

    <style type="text/css">
        body {}

        div.container {
            width: 1000px;
            margin: 0 auto;
            position: relative;
        }

        legend {
            font-size: 30px;
            color: #555;
        }

        .btn_send {
            background: #00bcd4;
        }

        label {
            margin: 10px 0px !important;
        }

        textarea {
            resize: none !important;
        }

        .fl_window {
            width: 400px;
            position: absolute;
            right: 0;
            top: 100px;
        }

        pre,
        code {
            padding: 10px 0px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            webkit-box-sizing: border-box;
            display: block;
            white-space: pre-wrap;
            white-space: -moz-pre-wrap;
            white-space: -pre-wrap;
            white-space: -o-pre-wrap;
            word-wrap: break-word;
            width: 100%;
            overflow-x: auto;
        }
    </style>

    <style>
        .red {
            color: red;
        }

        .blue {
            color: blue;
        }

        .pink {
            color: pink;
        }
    </style>
    <script language="javascript">
        $(document).ready(function() {
            // Hàm hiển thị danh sách hàng task
            function display_html(num) {
                var html = '';

                html += '<table border="1" cellpadding="5">';
                html += '<tr>';
                html += '<td>Num</td>';
                html += '<td>Status</td>';
                html += '</tr>';

                for (var i = 0; i < num; i++) {
                    html += '<tr>';
                    html += '<td>' + (i + 1) + '</td>';
                    html += '<td id="waitting' + i + '" class="pink">Waitting...</td>';
                    html += '</tr>';
                }
                html += '</table>'

                $('#results').html(html);
            }

            // Hàm gửi ajax
            function send_ajax(num, index) {
                // Kiểm tra xem task đã hết chưa, nếu hết thì dừng
                if (index > (num - 1)) {
                    return false;
                }

                // Chuyển trang thái từ waitting san sendding
                $('#waitting' + index).removeClass('pink').addClass('red').html('Sending...');

                // var push = $('#push-thread').val();
                // console.log(push);

                // Gửi ajax
                $.ajax({
                    url: 'send_qr_queue.php',
                    type: 'post',
                    contentType: "application/json",
                    dataType: 'json',
                    success: function(result) {
                        console.log(result);
                        // Sau khi thành công thì chuyển trạng thái sang finished
                        $('#waitting' + index).removeClass('red').addClass('blue');
                        $('#waitting' + index).html('Finished');
                    },
                    error: function() {
                        console.log('Lỗi');
                        $('#waitting' + index).html('Not Finished');
                    }
                }).always(function() {
                    // Xử lý task tiếp theo
                    send_ajax(num, ++index);
                });
            }

            // Khi click gửi request
            function run() {
                // Lấy số lượng task từ user nhập vào
                var num = parseInt($('#num-thread').val());

                // Ẩn textbox và button
                // $(this).remove();
                // $('#num-thread').remove();

                // console.log(num);

                // Hiển thị table danh sách task
                display_html(num);

                // gửi ajax cho lần đầu tiên (task = 1)
                send_ajax(num, 0);
            }

            run();
        });
    </script>
</head>

<body>
    <?php
    //ini_set('max_execution_time', 300);
    include("db.php");
    // Enabling error reporting
    error_reporting(-1);
    ini_set('display_errors', 'On');

    $sql = "SELECT qr_id FROM qr_cron WHERE update_qr = 0 ORDER BY qr_id DESC LIMIT 3000";

    $resultSend = $conn->query($sql);
    $total = $resultSend->num_rows;
    //echo "t: ".$t;
    //echo "total: ".$total;
    ?>
    <input type="hidden" id="num-thread" value="<?php echo $total ?>" />
    <input type="hidden" id="push-thread" value="<?php echo json_encode($json) ?>" />
    <?php

    function console_log($data)
    {
        echo '<script>';
        echo 'console.log(' . json_encode($data) . ')';
        echo '</script>';
    }
    ?>
    <div id="results"></div>
</body>

</html>