<div class="row">
    <div class="sizeBox col-lg-9">
        <div class="card">
            <div class="card-body">
                <!-- <div class="row mb-2">
                    <div class="col-md-6">
                    </div>

                    <div class="col-md-6">
                        <div class="btn-group mr-2 mb-2 mb-sm-0 MediaMore right">
                            <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                更多 <i class="mdi mdi-dots-vertical ml-2"></i>
                            </button>
                            <div class="dropdown-menu">
                                <span id="nestable-media">
                                    <span class="dropdown-item pointer" data-action="expand-all">扩展媒体分类</span>
                                    <span class="dropdown-item" data-action="collapse-all">折合媒体分类</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="row" id="select_media"></div>

                <div class="row mt-4">
                    <div class="col-sm-6">
                        <div>
                            <!-- <p class="mb-sm-0">当页分类有{{$bData['end_media']}}? 个媒体，后端媒体一共有 {{$bData['allCount']}} 个</p> -->
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
        <div class="card MediaCategoryCard">
            <!-- <div class="page-select-media-category">
                <center>媒体分类</center>
            </div> -->

            <span id="nestable-media">

                <button type="button" class="btn btn-outline-primary btn-block waves-effect waves-light" onclick="media_all()">
                    全部媒体
                </button>

                <button type="button" class="btn btn-outline-success btn-block waves-effect waves-light media-category-expand-all" data-action="expand-all-media">扩展</button>

                <button type="button" class="btn btn-outline-success btn-block waves-effect waves-light media-category-collapse-all" data-action="collapse-all-media">折合</button>

            </span>

            <!-- <div class="btn btn-outline-success btn-block waves-effect waves-light" class="allMedia">
                
            </div> -->

            <div class="space-20"></div>
            
            <div class="menu">
                <center>
                  <!-- <div id="load"></div> -->

                    <div class="dd" id="nestable-media-category">
                        <div id="get_media"></div>
                    </div>

                  <input type="hidden" id="nestable-output-media-category">

                </center>
            </div>
        </div>

        <div class="media-upload-btn-right">
            <button type="button" class="btn w-md btn-light" data-dismiss="modal" id="media-submit">提交</button>
                          &nbsp;&nbsp;&nbsp;&nbsp;
            <span type="button" class="btn w-md btn-secondary" data-dismiss="modal" id="reset">取消</span>
        </div>

    </div>

</div>