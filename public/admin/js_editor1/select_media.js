media_all();

function media_all()
{
    $.ajax({
        url: "/api/admin/media/select/data",
        method: "GET",
        success: function (data)
        {
            // console.log(data);

            document.getElementById("select_media").innerHTML = select_media(data['media']);
        }
    });
}

function media_category(id)
{
    $.ajax({
        url: "/api/admin/media/select/category/"+id,
        method: "GET",
        success: function (data)
        {
            // console.log(data);

            document.getElementById("select_media").innerHTML = select_media(data['media']);
        }
    });
}

function select_media(data)
{
    var html = '';

    for (var key in data) // foreach, 順次序
    {
        var id = data[key]['id'];
        var title = data[key]['title'];
        var month = data[key]['month'];
        var fix_link = data[key]['fix_link'];

        html += '<div class="col-xl-2 col-sm-2 selectImgBox">';
        html += '<div class="selectImgBox1">';

        if(GetExtensionFileName(fix_link) == 'jpg' || GetExtensionFileName(fix_link) == 'jpeg' || GetExtensionFileName(fix_link) == 'png' || GetExtensionFileName(fix_link) == 'gif')
        {
            html += '<img src="/storage/media/'+month+'/'+fix_link+'" alt="'+title+'" width="100%" " onclick="selectImg(\''+id+'\', \''+month+'\', \''+data[key]['fix_link']+'\')">';
        } else if(GetExtensionFileName(fix_link) == 'mp4' || GetExtensionFileName(fix_link) == 'mkv' || GetExtensionFileName(fix_link) == 'wmv')
        {
            html +='<video width="100%" height="" controlslist="nodownload" controls="" preload="none" poster="">';
            html += '<source src="/storage/media/'+month+'/'+data[key]['fix_link']+'" type="video/mp4">';
            html += '</video>';
            
        } else
        {
            html += '文件格式为：.'+GetExtensionFileName(data[key]['fix_link']) ;
        }

        html += '<i id="media-ok-mark-'+id+'" class="uil uil-check-square font-size-30 media-ok-mark"></i>';
        html += '</div>';
        html += '<div class="select-media-title">'+title+'</div>';
        html += '<div class="selectImgBox2">';
        html += '<li class="list-inline-item">';
        html += '<a href="javascript:void(0);" class="px-2 text-danger copy_link" title="Copy" onclick="copy_link(\'/storage/media/'+month+'/'+fix_link+'\', \'#media-upload-link\')"><i class="uil uil-copy font-size-25"></i></a>';
        html += '</li>';
        html += '<li class="list-inline-item">';
        html += '<a href="javascript:void(0);" class="px-2 text-success" onclick="selectImg(\''+id+'\', \''+month+'\', \''+fix_link+'\')"><i class="uil uil-check-circle font-size-25"></i></a>';
        html += '</li>';
        html += '</div>';
        html += '</div>';
        html += '';
        html += '';
    }

    return html;
}