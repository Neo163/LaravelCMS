<div class="row">
    <div class="sizeBox col-lg-9">
        <div class="card">
            <div class="card-body">

                <div style="color:#990000;font-size: 14.4px;">网站红色14.4px</div>
                <div style="color:#990000;font-size: 16px;">网站红色16px</div>
                <div style="color:#990000;font-size: 20px;">网站红色20px</div>
                <div style="color:#990000;font-size: 25px;">网站红色25px</div>
                <div style="color:#990000;font-size: 30px;">网站红色30px</div>
                <div style="color:#990000;font-size: 35px;">网站红色35px</div>
                <div style="color:#990000;font-size: 40px;">网站红色40px</div>
                
                <div style="color:#708090;font-size: 16px;">SlateGray</div>
                <div style="color:#00FFFF;font-size: 16px;">Aqua</div>
                <div style="color:#0000FF;font-size: 16px;">Blue</div>
                <div style="color:#00008B;font-size: 16px;">DarkBlue </div>
                <div style="color:#9932CC;font-size: 16px;">DarkOrchid </div>
                <div style="color:#00FF00;font-size: 16px;">Lime</div>
                <div style="color:#00FA9A;font-size: 16px;">MediumSpringGreen </div>
                <div style="color:#EEE8AA;font-size: 16px;">PaleGoldenRod </div>
                <div style="color:#FFFF00;font-size: 16px;">Yellow</div>

                <div class="row mt-4">
                    <div class="col-sm-6">
                        <div>
                            <!-- <p class="mb-sm-0">当页小类有{{$bData['end_media']}}? 个媒体，后端媒体一共有 {{$bData['allCount']}} 个</p> -->
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="float-sm-right">

                        </div>
                    </div>
                </div>

                <input type="hidden" id="target_upload" name="target_upload">

                <input type="hidden" id="month" name="month">
                <input type="hidden" id="fix_link" name="fix_link">

                <input type="hidden" id="media-upload-link" name="media-upload-link">
            </div>
        </div>
    </div>

    <div class="col-lg-3" id="MediaCategory">

        <div class="media-upload-btn-right">
            <!-- <button type="button" class="btn w-md btn-light" data-dismiss="modal" id="media-submit">提交</button> -->
                &nbsp;&nbsp;&nbsp;&nbsp;

            <span type="button" class="btn w-md btn-secondary" data-dismiss="modal" id="reset">取消</span>
        </div>

    </div>

</div>

<!-- <script>
    function copy_color(copy_link, position)
    {
        console.log("<span style='color:#990000;'>#990000</span>");
        var link = copy_link;
        var timestamp = (new Date()).valueOf();

        $(position).after('<input id="urlText_'+timestamp+'" style="position:fixed;top:-200%;left:-200%;" type="text" value=' + link + '>');
        $('#urlText_'+timestamp).select(); //选择对象
        document.execCommand("Copy"); //执行浏览器复制命令

        $('#copy-link').trigger("click");
    }
</script> -->