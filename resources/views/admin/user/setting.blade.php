@extends("admin.layout.main")

@section("content")
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
                                <th>账号</th>
                                <th>操作</th>
                            </tr>
                            <tr>
                                <td>{{\Auth::guard("admin")->user()->name}}</td>
                                <td>
                                    <span class="h3"><a href="<?php echo url(''); ?>/admin/setting/user/changePassword" type="button" class="btn btn-info">修改密码</a></span>
                                    @if (1 == 1)
                                    
                                    @endif
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