<div class="row" id="postContentBox">
    <div class="col-lg-8">

        <div class="media-uplaod">
            <button type="button" class="btn btn-outline-primary waves-effect waves-light media-editor" data-toggle="modal" data-target=".media-modal-xl">媒体</button>
            
            <span class="right">
                <button type="button" class="btn btn-outline-primary waves-effect waves-light media-color" data-toggle="modal" data-target=".media-color-modal-xl">颜色</button>
            </span>
        </div>

        <div class="form-group mb-4">

            <input type="hidden" name="content" id="content" value="">

            @if($bData['editor'] == 2)
            <input type="text" name="editorType" value="2" hidden>
            <div id="Weditor"></div>
            <script>
                var content = $("#content").val();
                $("#Weditor").html(content);
            </script>
            @else
            <input type="text" name="editorType" value="1" hidden>
            <div id="summernote"></div>
            <script>
                var content = $("#content").val();
                $("#summernote").html(content);
            </script>
            @endif

        </div>

        <input type="text" id="b_posts_type_id" name="b_posts_type_id" value="{{$bPostType->id}}" hidden>

        <div class="card" id="postCatTag" style="display: none;">
            <a href="#ContentBox1" class="text-dark" data-toggle="collapse">
                <div class="p-4">
                    
                    <div class="media align-items-center">
                        <div class="media-body overflow-hidden">
                            <h5 class="font-size-16 mb-1">小类+标签</h5>
                        </div>
                        <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                    </div>
                    
                </div>
            </a>

            <div id="ContentBox1" class="collapse show">
                <div class="p-4 border-top">

                    <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label for="billing-name">小类</label>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="menu">
                                            <center>
                                                <div class="dd dd-category" id="nestable-posts-category">
                                                    <div id="get_posts_category" style='max-height: 500px;overflow: auto;'></div>
                                                </div>

                                              <input type="text" id="nestable-output-media-category" hidden>

                                            </center>
                                        </div>
                                    </div>

                                    <input type="text" id="b_posts_tag_id" name="b_posts_tag_id" value="{{$bPostType->id}}" hidden>

                                    <input type="text" id="selectCategoryValue" name="selectCategoryValue" hidden>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label for="billing-name">标签</label>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="menu">
                                            <center>
                                                <div class="dd dd-tag" id="nestable-media-tag">
                                                    <div id="get_posts_tag" style='max-height: 500px;overflow: auto;'></div>
                                                </div>

                                              <input type="text" id="nestable-output-media-tag" hidden>

                                            </center>
                                        </div>
                                    </div>

                                    <input type="text" id="select_tag" name="select_tag" hidden>
                                    
                                    <input type="text" id="selectTagValue" name="selectTagValue" hidden>

                                </div>
                            </div>
                        </div>

                        
                    </div>
                    
                </div>
            </div>
        </div>

    </div>

    <div class="col-lg-4">
        <div class="custom-accordion">

            <div class="card">
                <a href="#rightBox1" class="text-dark" data-toggle="collapse">
                    <div class="p-4">
                        
                        <div class="media align-items-center">
                            <div class="media-body overflow-hidden">
                                <h5 class="font-size-16 mb-1">状态</h5>
                            </div>
                            <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                        </div>
                        
                    </div>
                </a>

                <div id="rightBox1" class="collapse show">
                    <div class="p-4 border-top">
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="form-group mb-4">

                                    <div class="form-group mb-4">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label for="formrow-firstname-input">发布状态</label>
                                                <select class="form-control" id="public" name="public">
                                                    <option value="public">发布</option>
                                                    <option value="draft">草稿</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label for="formrow-firstname-input">前端模板</label>
                                                <select class="form-control" id="front_end_template" name="front_end_template">
                                                    <!-- <option value=""></option> -->
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    @if($_SERVER['REQUEST_URI'] != '/admin/post/type/add/1')
                                    <div class="form-group mb-4">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label for="formrow-firstname-input">页面大类</label>
                                                <select class="form-control" id="b_posts_type" name="b_posts_type">
                                                    @foreach($bPostTypes as $bPostType)
                                                    <option value="{{$bPostType->id}}">{{$bPostType->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    @endif

                                    <!-- <div class="form-group mb-4">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label for="formrow-firstname-input">评论</label>
                                                <select class="form-control" id="ranking" name="ranking">
                                                    <option value="0">开启</option>
                                                    <option value="1">关闭</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="form-group mb-4">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label for="formrow-firstname-input">置顶</label>
                                                <select class="form-control" id="ranking" name="ranking">
                                                    <option value="0">否</option>
                                                    <option value="1">是</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label for="formrow-firstname-input">标记</label>
                                                <input type="text" class="form-control" name="remark" id="remark" value="">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <a href="#rightBox2" class="text-dark" data-toggle="collapse">
                    <div class="p-4">
                        
                        <div class="media align-items-center">
                            <div class="media-body overflow-hidden">
                                <h5 class="font-size-16 mb-1">横幅</h5>
                            </div>
                            <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                        </div>
                        
                    </div>
                </a>

                <div id="rightBox2" class="collapse show">
                    <div class="p-4 border-top">
                        <div class="row">

                            <div class="col-lg-12">

                                <div class="form-group mb-4">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <button type="button" class="btn btn-outline-primary waves-effect waves-light media-upload" target="banner" data-toggle="modal" data-target=".media-modal-xl" onclick="go('banner')">
                                                <i class="uil uil-image font-size-18"></i>
                                            </button>
                                        </div>

                                        <div class="col-lg-12">
                                            <img class="bannerA" target="banner" data-toggle="modal" data-target=".media-modal-xl" src="/storage/media/2021-05/bMedia_20210508_025830.jpg" width="100%" name="bannerA" onclick="go('banner')">

                                            <input type="text" id="banner" name="banner" value="2021-05/bMedia_20210508_025830.jpg" hidden>
                                        </div>
                                        
                                    </div>
                                </div>

                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <a href="#rightBox3" class="text-dark" data-toggle="collapse">
                    <div class="p-4">
                        
                        <div class="media align-items-center">
                            <div class="media-body overflow-hidden">
                                <h5 class="font-size-16 mb-1">封面图</h5>
                            </div>
                            <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                        </div>
                        
                    </div>
                </a>

                <div id="rightBox3" class="collapse show">
                    <div class="p-4 border-top">
                        <div class="row">

                            <div class="col-lg-12">

                                <div class="form-group mb-4">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <button type="button" class="btn btn-outline-primary waves-effect waves-light media-upload" target="image" data-toggle="modal" data-target=".media-modal-xl" onclick="go('image')">
                                                <i class="uil uil-image font-size-18"></i>
                                            </button>
                                        </div>

                                        <div class="col-lg-12">
                                            <img class="imageA" target="image" data-toggle="modal" data-target=".media-modal-xl" src="" width="100%" name="imageA" onclick="go('image')">

                                            <input type="hidden" id="image" name="image" value="">
                                        </div>
                                        
                                    </div>
                                </div>

                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>