@extends("admin.layout.main")

@section("content")

<script src="<?php echo url(''); ?>/admin/bower_components/jquery/dist/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $(".input1, .submit").hide();
        $(".password").click(function(){
            if($(".input1, .submit").css("display")=="none"){
                $(".input1, .submit").show();
                $(".password").html('修改/取消');
            }else{
                $(".input1, .submit").hide();
            }
            $(".input1").toggleClass("input");
            $(".btn-default1").toggleClass("btn-default");
        });
    });
</script>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-10 col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">设置</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody><tr>
                                <th style="width: 30%">账号</th>
                                <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;操作</th>
                            </tr>
                            <tr>
                                <td>{{\Auth::guard("admin")->user()->name}}</td>
                                <td>
                                    <div class="col-xs-12 col-sm-3 col-md-3">
                                        <span class="btn btn-primary password">修改密码</span>
                                    </div>
                                
                                    <div class="col-xs-12 col-sm-9 col-md-9">
                                        <form action="/admin/setting/user/change_password" method="GET">
                                            <div class="input-group" style="width: 230px;">
                                                <input type="password" name="password" class="form-control pull-right input1" placeholder="密码..">
                                                <div class="input-group-btn">
                                                  <button type="submit" class="btn btn-default1 input1">提交</button>
                                                </div>
                                            </div>
                                            <div class="input-group" style="width: 230px;">
                                                @include("admin.layout.error")
                                            </div>
                      
                                        </form>
                                    </div>
                                   
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    
    
@endsection