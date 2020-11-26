<html>

<head>
    <title>Tìm việc 365 | Quản lý thông báo</title>
    <meta http-equiv="refresh" content="<?php echo $count_time; ?>" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>

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
</head>

<body>

    <h2>Version APP</h2>

    <form>
        Tên app:<br>
        <select class="js-data-example-ajax" data="abc">
        </select>
        <br>
        Version:<br>
        <input type="text" name="version" id="version" value="1.0.0">
        <br>
        Có gì mới:<br>
        <input type="text" name="note" id="note" value="">
        <br><br>
        <input type="submit" value="Submit" id="btnUpdate">
    </form>

    <p>Hello</p>

</body>

<script>
    var studentSelect = $('.js-data-example-ajax');
    $('.js-data-example-ajax').select2({
        width: '50%',
    });
    // studentSelect.on("select2:selecting", function(e) {
    //     var data = e.params.data;
    //     console.log(studentSelect.val(data));
    // });
    $.ajax({
        url: 'select_app.php',
        // dataType: 'json',
        // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
        success: function(result) {
            // console.log(result[0]);
            // for (var i = 0; i < result.length; i++) {
            //     var option = new Option(result[i].name_app, result[i].id_app, true, true);
            studentSelect.append(result);
            // }
        },
    });
    $('.js-data-example-ajax').change(function() {
        var ver = $('option:selected').attr('data-tokens');
        // console.log(ver);
        $('#version').val(ver);
    });
</script>

<script>
    $(document).ready(function() {
        $("#btnUpdate").click(function() {
            var version_post = $('#version').val();
            var note_post = $('#note').val();
            var id_app_post = $('option:selected').val();
            $.ajax({
                url: "ajax_update.php",
                type: "post",
                dataType: "text",
                data: {
                    id_app: id_app_post,
                    version_app: version_post,
                    note: note_post
                },
                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                success: function(result) {
                    console.log(result);
                    alert("Cập nhật thành công!!!");
                    // for (var i = 0; i < result.length; i++) {
                    //     var option = new Option(result[i].name_app, result[i].id_app, true, true);
                    // }
                },
            })
        });
    });
</script>

</html>