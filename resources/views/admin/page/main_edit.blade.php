<div class="row" id="pageContentBox">
    <div class="col-lg-8">

        <div class="media-uplaod">
            <button type="button" class="btn btn-outline-primary waves-effect waves-light media-editor" data-toggle="modal" data-target=".bs-example-modal-xl">媒体</button>
        </div>

        <div class="form-group mb-4">
            <!-- <textarea id="content" name="content" style="height:600px;"  placeholder=""></textarea> -->

            <div id="summernote"></div>
            
            <input type="hidden" name="content" id="content" value="{{$bpage->content}}">

        </div>
    </div>

    <div class="col-lg-4">
        <div class="custom-accordion">

            <div class="card">
                <a href="#rightBox1" class="text-dark" data-toggle="collapse">
                    <div class="p-4">
                        
                        <div class="media align-items-center">
                            <div class="media-body overflow-hidden">
                                <h5 class="font-size-16 mb-1">前端模板</h5>
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
                                                <select class="form-control" id="front_end_template" name="front_end_template">
                                                <!-- <option value=""></option> -->
                                            </select>
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
                <a href="#rightBox1" class="text-dark" data-toggle="collapse">
                    <div class="p-4">
                        
                        <div class="media align-items-center">
                            <div class="media-body overflow-hidden">
                                <h5 class="font-size-16 mb-1">封面图</h5>
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
                                                <button type="button" class="btn btn-outline-primary waves-effect waves-light media-upload" target="image" data-toggle="modal" data-target=".bs-example-modal-xl" onclick="go('image')">
                                                    <i class="uil uil-image font-size-18"></i>
                                                </button>
                                            </div>

                                            <div class="col-lg-12">
                                                <img class="imageA" target="image" data-toggle="modal" data-target=".bs-example-modal-xl" src="" width="100%" name="imageA" onclick="go('image')">

                                                <input type="text" id="image" name="image" value="" hidden>
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
</div>