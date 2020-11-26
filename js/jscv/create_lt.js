

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

$(function () {
    $(document).on('click', '.fieldgroup_controls .remove', function (e) {
        var item = $(this).parent().parent();
        var itemId = item.attr('id');
        var parentRemoveId = '#' + item.parent().attr('id');
        item.remove();
        for (var h = 0; h < sortAbleArea.length; h++) {
            if (sortAbleArea[h].el === parentRemoveId) {
                $.removeItem(sortAbleArea[h].area, itemId);

                $.initSortable(sortAbleArea[h], false);
                $.upAndDown(item, sortAbleArea[h].el);

                return false;
            }
        }
    });



    $(document).on('click', '.blockControls .an-muc', function (e) {
        var item = $(this).parent().parent();
        var itemId = item.attr('id');
        var parentRemoveId = '#' + item.parent().attr('id');
        item.hide();

        for (var h = 0; h < sortAbleArea.length; h++) {
            if (sortAbleArea[h].el === parentRemoveId) {
                $.hideBlock(sortAbleArea[h].area, itemId);

                $.initSortable(sortAbleArea[h], false);
                $.upAndDown(item, sortAbleArea[h].el);

                return false;
            }
        }
    });

    $(document).on('click', '.js-edit-content', function (e) {
        $(this).parent().parent().addClass('edit-content');
        $(this).parent().html('<div class="save js-save-content" title="Lưu"><i class="fa fa-floppy-o"></i>&nbspSave</div>');
    });

    $(document).on('click', '.js-save-content', function (e) {
        var div = $(this).parent().parent();
        var bar = div.removeClass('edit-content').find('.bar-exp');
        var p = div.find('.bar-value-exp input').val();
        if (p > 100) { p = 100; } else if (p < 0) { p = 0; }
        bar.html('<div style="width: ' + p + '%"></div>');
        $(this).parent().html('<div class="clone" title="Thêm"><i class="fa fa-plus"></i> Thêm</div>\n' +
            '<div class="edit js-edit-content" title="Sửa"><i class="fa fa-edit"></i> Sửa </div>\n' +
            '<div class="remove" title="Xóa"><i class="fa fa-minus"></i> Xóa </div>');
    });

    //Declare sortable area and item want to sort here
    var sortAbleArea = [
        { el: '#sortable', item: '.block', area: 'menu' },
        { el: '#sort_block', item: '.cvo-block', area: 'experiences' }
    ];

    //Initial json data
    var data = {
        css: [],
        avatar: '',
        lto_name: '',
        profile: []
    };

    //Create order data for first time
    $.createOrder = function (area, id, order) {
        var sub = { id: id, order: order, content: '' };
        data[area].push(sub);
    };

    //Remove item from data
    $.removeItem = function (area, id) {
        data[area].forEach(function (arrayItem, index) {
            if (data[area][index].id === id) {
                data[area].splice(index, 1);
            }
        });
    };

    //Hide block from data
    $.hideBlock = function (area, id) {
        data[area].forEach(function (arrayItem, index) {
            if (data[area][index].id === id) {
                //data[area][index].status = 'hide';
                $('#layout-editor').find("[blockkey='" + id + "']").removeClass('active');
            }
        });
    };

    $.showBlock = function (area, id) {
        data[area].forEach(function (arrayItem, index) {
            if (data[area][index].id === id) {
                //data[area][index].status = null;
            }
        });
    };
    //Update order by id
    $.updateOrder = function (area, id, order) {
        for (var i = 0; i < data[area].length; i++) {
            if (data[area][i].id === id) {
                data[area][i].order = order;

                return false;
            }
        }
    };

    $.initSortable = function (sortable, updown) {
        var item = $(sortable.el + ' ' + sortable.item);
        //Handle sortable
        $(sortable.el).sortable({
            cancel: 'input, [contenteditable]',

            create: function (event, ui) {
                item.each(function (e) {
                    $.createOrder(sortable.area, $(this).attr('id'), ($(this).index() + 1));
                });
            },

            update: function (event, ui) {
                item.each(function (e) {
                    $.updateOrder(sortable.area, $(this).attr('id'), ($(this).index() + 1));
                });

                //console.log(data);
            }
        });

        if (updown) {
            $.upAndDown(item, sortable.el);
        }

    };

    $.upAndDown = function (items, sortableEl) {
        items.each(function () {
            var self = $(this);
            //console.log(self)
            $(this).find('.up').on('click', function () {
                if (!self.is(':first-child')) {
                    var prev = self.prev();
                    self.insertBefore(prev).hide().fadeIn();
                    $(sortableEl).sortable('option', 'update')();
                }
            });

            $(this).find('.down').on('click', function () {
                if (!self.is(':last-child')) {
                    var next = self.next();
                    self.insertAfter(next).hide().fadeIn();
                    $(sortableEl).sortable('option', 'update')();
                }
            })
        });
    };

    //Start create data
    for (var l = 0; l < sortAbleArea.length; l++) {
        $.initSortable(sortAbleArea[l], true);
    }

    //Get content and export to json data
    $.exportData = function () {
        data['css'] = {
            color: $('#toolbar-color .color.active').attr('data-color'),
            font: $('#font-selector').find("option:selected").val(),
            font_size: $('#cvo-toolbar .fontsize.active').attr('data-size'),
            font_spacing: $('#cvo-toolbar .line-height.active').attr('data-spacing')
        }

        var lt_title = $('#letter-title').text();

        data['lt_title'] = lt_title;
        data['avatar'] = $('#cvo-profile-avatar').attr('src');
        data['lto_day'] = $('#lto-day').text();

        data['content'] = $('#lto-content').html();


        data['profile'] = {
            lto_name: $('#lto-name').text(),
            lto_job: $('#lto-job').text(),
            lto_email: $('#lto-email').text(),
            lto_phone: $('#lto-phone').text(),
            lto_address: $('#lto-address').text()
        }

        var status = '';

        var ar_data = JSON.stringify(data);
        var ar_data_re = ar_data.replace(/\\n/g, '\\\\' + 'n');
        var ar_data_re2 = ar_data_re.replace(/\\t/g, '\\\\' + 't');
        console.log(ar_data);

        var idlt = $('#idlt').val();
        // console.log(idlt);
        var lang = $('#cvo-toolbar-lang .active').attr('data-lang');
        $.ajax({
            cache: false,
            type: "POST",
            url: "../ajax/SaveLTByUv.php",
            dataType: 'json',
            data: { idlt: idlt, ar_data: ar_data, lang: lang },
            success: function (result) {
                console.log(result);
                if (result != false) {
                    //$('.bg-spinner').remove();     
                }
            }
        });
        //console.log(JSON.stringify(data));
    };
    var is_busy = false;
    $('#btn-save-lt').on('click', function () {
        var phone = $('#lto-phone').text();
        var email = $('#lto-email').text();
        var address = $('#lto-address').text();
        var fname = $('#lto-name').text();
        var content = $('#lto-content').text();
        content = content.trim();
        var msg_err = [];

        if (phone == '' || email == '' || fname == '' || address == '' || content == '') {
            if (fname == '') {
                document.getElementById("lto-name").style.outline = "1px dashed red";
                msg_err.push("Họ tên");
            }
            if (phone == '') {
                document.getElementById("lto-phone").style.outline = "1px dashed red";
                msg_err.push("Số điện thoại");
            }
            if (email == '') {
                document.getElementById("lto-email").style.outline = "1px dashed red";
                msg_err.push("Email");
            }
            if (address == '') {
                document.getElementById("lto-address").style.outline = "1px dashed red";
                msg_err.push("Địa chỉ");
            }
            if (content == '') {
                document.getElementById("lto-content").style.outline = "1px dashed red";
                msg_err.push("Nội dung");
            }
            var msg = '<div class="v-modal" style="z-index: 2009;"></div><div tabindex="-1" class="el-message-box__wrapper" style="z-index: 2010;">';
            msg += '<div class="el-message-box"><div class="el-message-box__header"><div class="el-message-box__title">Thông báo</div></div><div class="el-message-box__content"><div class="el-message-box__status el-icon-warning"></div><div class="el-message-box__message" style="margin-left: 50px;">';
            msg += 'Bạn chưa điền đầy đủ trường: <span style="color:red">' + msg_err.join() + '</span></div></div>';
            msg += '<div class="el-message-box__btns">';
            msg += '<button type="button" onclick="hide()" class="el-button el-button--default"><span>Hủy bỏ</span></button>';
            $('body').append(msg);

            return false;
        }
        if (!/^[0-9]+$/.test(phone)) {
            var msg = '<div class="v-modal" style="z-index: 2009;"></div><div tabindex="-1" class="el-message-box__wrapper" style="z-index: 2010;">';
            msg += '<div class="el-message-box"><div class="el-message-box__header"><div class="el-message-box__title">Thông báo</div></div><div class="el-message-box__content"><div class="el-message-box__status el-icon-warning"></div><div class="el-message-box__message" style="margin-left: 50px;">';
            msg += 'Số điện thoại không hợp lệ</div></div>';
            msg += '<div class="el-message-box__btns">';
            msg += '<button type="button" onclick="hide()" class="el-button el-button--default"><span>Hủy bỏ</span></button>';
            $('body').append(msg);

            return false;
        }

        $(window).scrollTop(0);
        $(window).scrollLeft(0);

        $('#cvo-toolbar').removeClass('fx');
        $('body').append('<div class="bg-spinner"><div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div></div>');
        $.exportData();

        //var ckcook = $('#ckcook').val();
        //        if(ckcook==1){
        //            $('#cv-profile-phone').text('Xem ở trên');
        //            $('#cv-profile-email').text('Xem ở trên');
        //        }
        html2canvas($('#form-letter')[0], {
            allowTaint: true,
            onrendered: function (canvas) {
                //var image_cv = Canvas2Image.convertToPNG(canvas); //to generate an image from canvas
                //   img.image_pro = image_cv.getAttribute('src');
                var img_val = canvas.toDataURL("image/png", 1.0);
                var idlt = $('#idlt').val();
                var iduser = $('#uid_cv').val();

                if (is_busy == true) {
                    return false;
                }
                $.ajax({
                    cache: false,
                    type: "POST",
                    url: "/home/post_lt.php",
                    data: { img_val: img_val, iduser: iduser, idlt: idlt },
                    beforeSend: function (response) {
                        $('.bg-spinner').remove();
                        $('body').append('<div class="bg-spinner"><div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div></div>');
                    },
                    success: function (html) {

                        var msg = '<div class="v-modal" style="z-index: 2009;"></div><div tabindex="-1" class="el-message-box__wrapper" style="z-index: 2010;">';
                        msg += '<div class="el-message-box"><div class="el-message-box__header"><div class="el-message-box__title">Thông báo</div></div><div class="el-message-box__content"><div class="el-message-box__status el-icon-warning"></div><div class="el-message-box__message" style="margin-left: 50px;">';
                        msg += 'Thư của bạn đã được lưu thành công</div></div>';
                        msg += '<div class="el-message-box__btns">';
                        //msg += '<button type="button" onclick="hidemsg()" class="el-button el-button--default"><span>Hủy bỏ</span></button>';
                        msg += '<button type="button" onclick="closepopup()" class="el-button el-button--default el-button--primary "><span>Đóng</span></button></div></div></div>';
                        $('body').append(msg);
                        //}
                        $('.bg-spinner').remove();
                        is_busy = false;
                    }
                });
            }
        });
        //////////////////////        
    });


    $.randomStr = function () {
        return Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);
    }
    //Them tool
    //color
    $(document).on('click', '#toolbar-color .color', function (e) {
        $('#toolbar-color .color').removeClass('active');
        $(this).addClass('active');
        var newcolor = $(this).attr('data-color');
        var oldlink = $('#cv-color-css').attr('href');
        var newlink = oldlink.slice(0, oldlink.lastIndexOf("/")) + '/' + newcolor + '.css';
        $('#cv-color-css').attr('href', newlink);
    });
    //font
    $(document).on('change', '#toolbar-font #font-selector', function (e) {
        var newfont = $(this).find("option:selected").val();
        var oldlink = $('#cv-font').attr('href');
        var newlink = oldlink.slice(0, oldlink.lastIndexOf("/")) + '/' + newfont + '.css';
        $('#cv-font').attr('href', newlink);
    });
    //font-size
    $(document).on('click', '#cvo-toolbar .fontsize', function (e) {
        $('#cvo-toolbar .fontsize').removeClass('active');
        $(this).addClass('active');
        var newsize = $(this).attr('data-size');
        var oldlink = $('#cv-font-size').attr('href');
        var newlink = oldlink.slice(0, oldlink.lastIndexOf("/")) + '/' + newsize + '.css';
        $('#cv-font-size').attr('href', newlink);
    });
    //line height
    $(document).on('click', '#cvo-toolbar .line-height', function (e) {
        $('#cvo-toolbar .line-height').removeClass('active');
        $(this).addClass('active');
        var newspacing = $(this).attr('data-spacing');
        var oldlink = $('#cv-cpacing-css').attr('href');
        var newlink = oldlink.slice(0, oldlink.lastIndexOf("/")) + '/' + newspacing + '.css';
        $('#cv-cpacing-css').attr('href', newlink);
    });

    //languages
    $(document).on('click', '#cvo-toolbar-lang .btn-lang-option', function () {
        var lang = $(this).attr('data-lang');
        if (lang != '') {
            setCookie('lang', lang, 86400);
            location.reload();
        }
    });

    $(document).on('click', '#layout-editor .group .block', function (e) {
        var id = $(this).attr('blockkey');
        var boxid = $(this).attr('blockmain');
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
            $.hideBlock(boxid, id);
            $('#' + id).hide();
        } else {
            $(this).addClass('active');
            $.showBlock(boxid, id);
            $('#' + id).show();
        }
    });
    $(document).on('click', '#btn-edit-layout', function (e) {
        $('#layout-editor-container').show();
        $('#btn-shadow').show();
    });
    $(document).on('click', '.action-bar .btn-finish', function (e) {
        $('#layout-editor-container').hide();
        $('#btn-shadow').hide();
    });
});
function closepopup() {
    $('.bg-spinner').remove();
    $('.v-modal').hide();
    $('.el-message-box').hide();
    window.location.href = '/ung-vien/thu-xin-viec.html';;
}
function save_cv_login(uid) {
    if ($(window).width() < 1300) {
        $(window).scrollTop(0);
        $(window).scrollLeft(0);
    }
    $('#cvo-toolbar').removeClass('fx');
    $('body').append('<div class="bg-spinner"><div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div></div>');
    $.exportData();
    var is_busy = false;
    $('#cv-profile-phone').text('Xem ở trên');
    $('#cv-profile-email').text('Xem ở trên');
    html2canvas($('#form-letter'), {
        onrendered: function (canvas) {
            var img_val = canvas.toDataURL("image/png", 1.0);
            var name = $('#lto-name').text();
            console.log(uid);
            //var uid = $('#uid_cv').val();
            var idlt = $('#idlt').val();
            if (name == '') {
                name = $('#cv_alias').val();
            }
            if (is_busy == true) {
                return false;
            }
            $.ajax({
                cache: false,
                type: "POST",
                url: "/home/post_lt.php",
                data: { img_val: img_val, name: name, idlt: idlt, iduser: uid },
                beforeSend: function (response) {
                    $('.bg-spinner').remove();
                    $('body').append('<div class="bg-spinner"><div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div></div>');
                },
                success: function (html) {
                    window.location.href = '/ung-vien/xac-thuc-tai-khoan.html';
                    $('.bg-spinner').remove();
                    is_busy = false;


                }

            });
        }
    });
}

function btnsb() {
    if ($(window).width() < 1300) {
        $(window).scrollTop(0);
        $(window).scrollLeft(0);
    }

    $('#cvo-toolbar').removeClass('fx');
    $.exportData();
    //$('#form_log').submit();
}
