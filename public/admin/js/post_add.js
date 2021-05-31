$(document).ready(function()
{
    var url = window.location.pathname;

    console.log(url);
    
    if(url == '/admin/post/type/add/1')
    {
        slectTemplate(1);
    } else
    {
        slectTemplate(2);
    }

    $('.addPageContent').click(function()
    {
        var target = $("select[name='selectContent']").val();
        var num = $(".num").val();

        // text, image
        create_item(target, num, data = '');

        getTemplate(target, num = 0, data = '');
        
    });

});

function create_item(target, num, data = '')
{
    if((target == 'text' || target == 'image' || target == 'video' || target == 'slider') && num > 0)
    {    
        $("#content_box_"+target).css('display','block');

        var content_num_text = $("#content_num_"+target).val();

        for(var i=1; i <= num; i++)
        {
            var content_num_textNow = Number(content_num_text) + i;

            $("#content_num_"+target).val(content_num_textNow);
            $("#number_"+target).text(content_num_textNow);

            if(target == 'text')
            {
                $("#content_"+target).append(textItem(num, content_num_textNow, data['text'+i]));
            }

            if(target == 'image')
            {
                $("#content_"+target).append(imageItem(num, content_num_textNow, data['image'+i]));
            }

            if(target == 'slider')
            {
                $("#content_"+target).append(sliderItem(num, content_num_textNow, data['slider'+i]));
            }

            if(target == 'video')
            {
                $("#content_"+target).append(videoItem(num, content_num_textNow, data['video'+i]));
            }
        }
    }
}

function getTemplate(target, num = 0, data = '')
{
    if(target == 'template')
    {
        var x = confirm('采用模板后，会清除目前的页面数据');
        if(x)
        {
            var value = $("select[name='selectTemplate']").val();
            var json = $("#templateJson").val();
            json = JSON.parse(json);
            for(var key in json)
            {
                if(json[key]['id'] == value)
                {
                    $("select[name='front_end_template']").val(json[key]['template']);

                    var number = json[key]['structure'];
                    number = JSON.parse(number);

                    for(var target in number)
                    {
                        $("#content_num_"+target).val(0);
                        $("#content_"+target).html('');

                        var num = number[target];
                        var content_num_text = $("#content_num_"+target).val();

                        if(num > 0)
                        {
                            $("#content_box_"+target).css('display','block');

                            for(var i=1; i <= num; i++)
                            {
                                var content_num_textNow = Number(content_num_text) + i;

                                $("#content_num_"+target).val(content_num_textNow);
                                $("#number_"+target).text(content_num_textNow);

                                // console.log(content_num_textNow);

                                if(target == 'text')
                                {
                                    $("#content_"+target).append(textItem(num, content_num_textNow, data['text'+i]));
                                }

                                if(target == 'image')
                                {
                                    $("#content_"+target).append(imageItem(num, content_num_textNow, data['image'+i]));
                                }

                                if(target == 'slider')
                                {
                                    $("#content_"+target).append(sliderItem(num, content_num_textNow, data['slider'+i]));
                                }

                                if(target == 'video')
                                {
                                    $("#content_"+target).append(videoItem(num, content_num_textNow, data['video'+i]));
                                }
                                
                            }
                        }
                    }

                }
            }
        }
    }
}

function onChangeStructure(value)
{
    if(value == 'template')
    {
        $("#num").css('display','none');
        $("#selectTemplate").css('display','inline-block');
    } else
    {
        $("#num").css('display','inline-block');
        $("#selectTemplate").css('display','none');
    }
}

function slectTemplate(value)
{
    $.ajax({
        url: "/api/admin/template/data/templates",
        method: "GET",
        data: {
            id: value
        },
        // dataType: "JSON",
        success: function (data)
        {
            console.log(data);

            document.getElementById("selectTemplate").innerHTML = getbackEndTemplate(data['backEnd']);
            $("#templateJson").val(JSON.stringify(data['backEnd']));

            $("#front_end_template").append(getFrontEndTemplate(data['frontEnd']));

            var url = window.location.pathname;
            var type = url.substring(21);

            if(url == '/admin/post/type/add/1')
            {
                $("select[name='front_end_template']").val('blank');
            } else
            {
                $("select[name='front_end_template']").val('blank');
            }
            
            
            $("select[name='b_posts_type']").val(type);
        }
    });
}

function editSetting(data)
{
    // 
}

function getbackEndTemplate(data)
{
    var html = '';

    for(var key in data)
    {
        html += '<option value="'+data[key]['id']+'">'+data[key]['title']+'</option>';
    }

    return html;
}

function getFrontEndTemplate(data)
{
    var html = '';

    for(var key in data)
    {
        html += '<option value="'+data[key]+'">'+data[key]+'</option>';
    }

    return html;
}

function go(name)
{
    $("#target_upload").val('');
    $("#month").val('');
    $("#fix_link").val('');
    $("#media-upload-link").val('');

    $('.media-ok-mark').removeClass('media-ok');
    $("#target_upload").val(name);
}

function removeItem(target)
{
    var x = confirm('是否删除最后一个元素');

    if(x)
    {
        var content_num_text = $("#content_num_"+target).val();
    
        if(Number(content_num_text) > 0)
        {
            $(".item_"+target+content_num_text).remove();
            var content_num_textNow = Number(content_num_text) - 1;
            $("#content_num_"+target).val(content_num_textNow);
            $("#number_"+target).text(content_num_textNow);
        }

        if(Number(content_num_text) == 1)
        {
            $("#content_box_"+target).css('display','none');
        }
    }
}

function removeItemSlider(target)
{
    var content_num_text = $("#content_num_"+target).val();

    var active = $(".item_"+target+"_"+content_num_text).hasClass("active");
    if(active == true)
    {
        alert('要转换轮播图，才能删除');
        return false;
    }

    if(Number(content_num_text) > 0)
    {
        $(".item_"+target+'_'+content_num_text).remove();
        var content_num_textNow = Number(content_num_text) - 1;
        $("#content_num_"+target).val(content_num_textNow);
        $("#number_"+target).text(content_num_textNow);
    }

    if(Number(content_num_text) == 1)
    {
        $("#slider_content1").html('');
        $("#accordion"+content_num_text).html('');

        $("#number_"+target).text(0);

        $(".content_box_"+target).css('display','none');
    }
}

function addSliderContent(position, data = '')
{
    // var content_num_text = $("#content_num_slider").val();

    var num = $("#content_num_slider"+position).val();

    var num_now = Number(num) + 1;
    $("#content_num_slider"+position).val(num_now);
    $("#number_slider"+position).text(num_now);

    // $("#slider_ol1").append(slider1Item(position, num_now, data['slider']));
    $("#slider_content"+position).append(slider2Item(position, num_now, data['slider']));
    $("#accordion"+position).append(slider3Item(position, num_now, data['slider']));
}

function textItem(num, numNow, data = '')
{
    // console.log(data);
    if(data == null)
    {
        data = '';
    }

    var html = '';

    html += '<div class="col-lg-3 item_text'+numNow+'">';
    html += '<div class="form-group mb-4">';
    html += '<label for="billing-name">文字'+numNow+'</label>';
    // html += '<i class="uil uil-trash-alt font-size-18 del_text" onclick="removeItem(\'itemText'+numNow+'\', \'text\')"></i>';
    html += '<input type="text" class="form-control" id="text'+numNow+'" name="data[text'+numNow+']" placeholder="" value="'+data+'">';
    html += '</div>';
    html += '</div>';

    return html;
}

function sliderItem(num, numNow, data = '')
{
    var html = '';

    html += '<div class="row hrBox item_slider'+numNow+'">';
    html += '<div class="col-xl-6">';
    html += '<div class="card">';
    html += '<div class="card-body">';

    html += '<div class="sliderBox">';
    html += '<span class="video-title" data-toggle="modal" data-target=".media-modal-xl">模拟效果</span>';

    html += '<span class="right margin-bottom-10">';
    html += '<a class="slider-left-btn" href="#carouselExampleIndicators'+numNow+'" role="button" data-slide="prev">';
    html += '<span type="button" class="btn btn-outline-primary w-md">上一张</span>';
    html += '</a>';

    html += '&nbsp;&nbsp;&nbsp;&nbsp;';

    html += '<a class="slider-right-btn" href="#carouselExampleIndicators'+numNow+'" role="button" data-slide="next">';
    html += '<span type="button" class="btn btn-outline-success w-md">下一张</span>';
    html += '</a>';
    html += '</span>';
    
    html += '</div>';

    html += '<div id="carouselExampleIndicators'+numNow+'" class="carousel slide" data-ride="carousel">';

    html += '<ol class="carousel-indicators" id="slider_ol'+numNow+'">';
    html += '</ol>';

    html += '<div class="carousel-inner" role="listbox" id="slider_content'+numNow+'">';  
    html += '</div>';

    html += '<a class="carousel-control-prev" href="#carouselExampleIndicators'+numNow+'" role="button" data-slide="prev">';
    html += '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
    html += '<span class="sr-only">Previous</span>';
    html += '</a>';
    html += '<a class="carousel-control-next" href="#carouselExampleIndicators'+numNow+'" role="button" data-slide="next">';
    html += '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
    html += '<span class="sr-only">Next</span>';
    html += '</a>';
    html += '</div>';
    html += '</div>';
    html += '</div>';
    html += '</div>';

    html += '<div class="col-xl-6">';
    html += '<div class="card sliderBoxRight">';
    html += '<div class="card-body">';

    html += '<div class="sliderSetting">';
    html += '<h4 class="card-title">';
    html += '设置';
    html += '</h4>';
    html += '<span type="button" class="mb-0 btn btn-outline-success waves-effect waves-light" onclick="addSliderContent('+numNow+')">添加</span>';
    html += '</div>';

    html += '图字一共 <span id="number_slider'+numNow+'">0</span>个';
    html += '<i class="uil uil-trash-alt font-size-18 del_target" onclick="removeItemSlider(\'slider'+numNow+'\')"></i>';
    html += '<input type="number" id="content_num_slider'+numNow+'" name="content_num_slider'+numNow+'" value="0" hidden>';

    html += '<div id="accordion'+numNow+'" class="custom-accordion">';

    html += '</div>';

    html += '</div>';
    html += '</div>';
    html += '</div>';

    html += '</div>';

    return html;
}

function imageItem(num, numNow, data = '')
{
    var html = '';

    html += '<div class="col-lg-3 item_image'+numNow+'">';
    html += '<div class="form-group mb-4">';
    html += '<label for="billing-name">图片'+numNow+'</label>';

    html += '<div class="row">';
    html += '<label for="title" class="col-sm-2 col-form-label">';
    html += '<button type="button" class="btn btn-outline-primary waves-effect waves-light" target="image'+numNow+'" data-toggle="modal" data-target=".media-modal-xl" onclick="go(\'image'+numNow+'\')">';
    html += '<i class="uil uil-image font-size-18"></i>';
    html += '</button>';
    html += '</label>';
    html += '<div class="col-sm-10">';

    if(data != null || data == '')
    {
        dataSrc = '/storage/media/'+data;
    }

    if(data == null || data == '')
    {
        dataSrc = '';
        data = '';
    }
    
    html += '<img class="image'+numNow+'A" target="image'+numNow+'" data-toggle="modal" data-target=".media-modal-xl" src="'+dataSrc+'" width="100%" name="data[image'+numNow+'A]" onclick="go(\'image'+numNow+'\')">';
    html += '<input type="text" id="image'+numNow+'" name="data[image'+numNow+']" value="'+data+'" hidden>';
    html += '</div>';
    html += '</div>';

    html += '<div class="row image-link">';
    html += '<label for="title" class="col-sm-3 col-form-label">文字1</label>';
    html += '<div class="col-sm-9">';
    html += '<input type="text" class="form-control" id="image'+numNow+'_text1" name="data[image'+numNow+'_text1]" placeholder="">';
    html += '</div>';
    html += '</div>';

    html += '<div class="row image-link">';
    html += '<label for="title" class="col-sm-3 col-form-label">文字2</label>';
    html += '<div class="col-sm-9">';
    html += '<input type="text" class="form-control" id="image'+numNow+'_text2" name="data[image'+numNow+'_text2]" placeholder="">';
    html += '</div>';
    html += '</div>';

    html += '<div class="row image-link">';
    html += '<label for="title" class="col-sm-3 col-form-label">链接</label>';
    html += '<div class="col-sm-9">';
    html += '<input type="text" class="form-control" id="image'+numNow+'_link" name="data[image'+numNow+'_link]" placeholder="">';
    html += '</div>';
    html += '</div>';

    html += '</div>';
    html += '</div>';

    return html;
}

function videoItem(num, numNow, data = '')
{
    var html = '';

    html += '<div class="row hrBox item_video'+numNow+'"">';
    html += '<div class="col-xl-6">';
    html += '<div class="card">';
    html += '<div class="card-body videoBox">';

    html += '<div class="videoBox'+numNow+' margin-bottom-25">';
    html += '<span class="video-title" data-toggle="modal" data-target=".media-modal-xl">视频 '+numNow+'</span>';
    html += '<span class="video-description">默认比例：16:9</span>';

    html += '<button type="button" class="btn btn-outline-primary waves-effect waves-light right" target="media1" data-toggle="modal" data-target=".media-modal-xl" onclick="go(\'video'+numNow+'\')">';
    html += '<i class="uil uil-image font-size-18"></i>';
    html += '</button>';
    html += '</div>';

    html += '<div class="embed-responsive embed-responsive-16by9 video-content">';
    html += '<video class="video'+numNow+'A" width="100%" height="" controlslist="nodownload" controls="" preload="none" poster="">';
    html += '<source src="" type="video/mp4">';
    html += '</video>';
    html += '</div>';

    html += '<input type="text" id="video'+numNow+'" name="data[video'+numNow+']" value="" hidden>';
    html += '</div>';
    html += '</div>';
    html += '</div>';

    html += '<div class="col-xl-6">';
    html += '<div class="card1">';
    html += '<div class="card-body videoBox">';

    html += '<div class="videoBox'+numNow+'">';
    html += '<span class="video-title" data-toggle="modal" data-target=".media-modal-xl">封面图 '+numNow+'</span>';

    html += '<button type="button" class="btn btn-outline-primary waves-effect waves-light right" target="media1" data-toggle="modal" data-target=".media-modal-xl" onclick="go(\'videoImage'+numNow+'\')">';
    html += '<i class="uil uil-image font-size-18"></i>';
    html += '</button>';
    html += '</div>';

    html += '<div class="row">';
    html += '<div class="col-lg-2">';
    html += '</div>';
    html += '<div class="col-lg-8">';
    html += '<img class="videoImage'+numNow+'A" target="videoImage'+numNow+'" data-toggle="modal" data-target=".media-modal-xl" src="" width="100%">';
    html += '</div>';
    html += '</div>';

    html += '<input type="text" id="videoImage'+numNow+'" name="data[videoImage'+numNow+']" value="" hidden>';

    html += '</div>';
    html += '</div>';
    html += '</div>';

    html += '</div>';

    return html;
}

function slider1Item(position, numNow, data = '')
{
    numLi = numNow - 1;

    var html = '';

    html += '<li data-target="#carouselExampleIndicators item_slider'+position+'_'+numNow+'" data-slide-to="'+numLi+'" ';

    if(numLi == 0)
    {
        html += ' class="active" ';
    }
    
    html += '></li>';

    return html;
}

function slider2Item(position, numNow, data = '')
{
    var html = '';

    html += '<div class="carousel-item item_slider'+position+'_'+numNow+' ';

    if(numNow == 1)
    {
        html += ' active ';
    }

    html += '">';
    html += '<img src="/admin/images/blank.png" alt="..." class="d-block img-fluid slider'+position+'_'+numNow+'_imageA">';
    html += '<div class="carousel-caption d-none d-md-block text-white-50">';
    // html += '<h5 class="text-white">First slide label</h5>';
    html += '</div>';
    html += '</div>';
    
    return html;
}

function slider3Item(position, numNow, data = '')
{
    var html = '';

    html += '<div class="card mb-1 shadow-none item_slider'+position+'_'+numNow+'">';
    html += '<a href="#collapse'+position+'_'+numNow+'" class="text-dark collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="collapse">';
    html += '<div class="card-header" id="heading'+position+'_'+numNow+'">';
    html += '<h6 class="m-0">';
    html += '图字'+numNow;
    html += '<i class="mdi mdi-chevron-up float-right accor-down-icon"></i>';
    html += '</h6>';
    html += '</div>';
    html += '</a>';
    html += '<div id="collapse'+position+'_'+numNow+'" class="collapse" aria-labelledby="heading'+position+'_'+numNow+'" data-parent="#accordion'+position+'">';
    html += '<div class="card-body">';

    html += '<div class="row">';
    html += '<div class="col-lg-3">';
    html += '<button type="button" class="btn btn-outline-primary waves-effect waves-light" target="slider'+position+'_'+numNow+'_image" data-toggle="modal" data-target=".media-modal-xl" onclick="go(\'slider'+position+'_'+numNow+'_image\')">';
    html += '<i class="uil uil-image font-size-18"></i>';
    html += '</button>';
    html += '</div>';
    html += '<div class="col-lg-6">';
    html += '<img class="slider'+position+'_'+numNow+'_imageA" target="slider'+position+'_'+numNow+'_image" data-toggle="modal" data-target=".media-modal-xl" src="" width="100%">';
    html += '<input type="text" id="slider'+position+'_'+numNow+'_image" name="data[slider'+position+'_'+numNow+'_image]" value="" hidden>';
    html += '</div>';
    html += '</div>';

    html += '<div class="row image-link">';
    html += '<label for="title" class="col-sm-2 col-form-label">说明</label>';
    html += '<div class="col-sm-10">';
    html += '<input type="text" class="form-control" id="slider'+position+'_'+numNow+'_text1" name="data[slider'+position+'_'+numNow+'_text1]" placeholder="" value="">';
    html += '</div>';
    html += '</div>';

    html += '<div class="row image-link">';
    html += '<label for="title" class="col-sm-2 col-form-label">文字1</label>';
    html += '<div class="col-sm-10">';
    html += '<textarea rows="3" class="form-control" id="slider'+position+'_'+numNow+'_text2" name="data[slider'+position+'_'+numNow+'_text2]" placeholder=""></textarea>';
    html += '</div>';
    html += '</div>';

    html += '<div class="row image-link">';
    html += '<label for="title" class="col-sm-2 col-form-label">文字2</label>';
    html += '<div class="col-sm-10">';
    html += '<textarea rows="3" class="form-control" id="slider'+position+'_'+numNow+'_text3" name="data[slider'+position+'_'+numNow+'_text3]" placeholder=""></textarea>';
    html += '</div>';
    html += '</div>';

    html += '<div class="row image-link">';
    html += '<label for="title" class="col-sm-2 col-form-label">链接</label>';
    html += '<div class="col-sm-10">';
    html += '<input type="text" class="form-control" id="slider'+position+'_'+numNow+'_link" name="data[slider'+position+'_'+numNow+'_link]" placeholder="">';
    html += '</div>';
    html += '</div>';

    html += '</div>';
    html += '</div>';
    html += '</div>';

    return html;
}
