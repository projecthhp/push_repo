<html>
    <head>
        <title>Tìm việc 365 | Quản lý thông báo</title>
<!--        <meta http-equiv="refresh" content="5"/>-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="https://timviec365.vn/images/logo-2.png">
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">

        <style type="text/css">
            body{
            }
            div.container{
                width: 1000px;
                margin: 0 auto;
                position: relative;
            }
            legend{
                font-size: 30px;
                color: #555;
            }
            .btn_send{
                background: #00bcd4;
            }
            label{
                margin:10px 0px !important;
            }
            textarea{
                resize: none !important;
            }
            .fl_window{
                width: 400px;
                position: absolute;
                right: 0;
                top:100px;
            }
            pre, code {
                padding:10px 0px;
                box-sizing:border-box;
                -moz-box-sizing:border-box;
                webkit-box-sizing:border-box;
                display:block;
                white-space: pre-wrap;
                white-space: -moz-pre-wrap;
                white-space: -pre-wrap;
                white-space: -o-pre-wrap;
                word-wrap: break-word;
                width:100%; overflow-x:auto;
            }

            img{
                background-color: #00bcd4;
            }

        </style>
    </head>
    <body>
        <div class="container">
            <div class="fl_window">
                <div><img src="https://timviec365.vn/images/logo-2.png" width="200" alt="Firebase"/></div>
                <br/>
            </div>

            <form action="send.php" class="pure-form pure-form-stacked" method="get">
                <fieldset>
                    <legend>Thời gian gửi thông báo ( giờ )</legend>

                    <label for="redId">Nhập thời gian gửi thông báo ( mặc định là 3 giờ )</label>
                    <input type="text" id="count" name="count" class="pure-input-1-2" placeholder="Nhập số giờ gửi 1 lần">
                    <button type="submit" class="pure-button pure-button-primary btn_send">Tiếp tục</button>
                </fieldset>
            </form>
            <br/><br/><br/><br/>
        </div>
    </body>
</html>