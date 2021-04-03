<!DOCTYPE html>
<!--[if lt IE 7]> <html lang="en" class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html lang="en" class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html lang="en" class="lt-ie9"> <![endif]-->
<!--[if IE 9]>    <html lang="en" class="ie9"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <title>Menu management</title>
    

</head>
<body>

  <link rel="stylesheet" href="/resources/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="/resources/bootstrap-4.6.0/css/bootstrap.min.css">
  <script src="/resources/js/jquery-3.5.1.js"></script>
  <script src="/resources/bootstrap-4.6.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="/admin/css/menu.css">
    
  <div class="sidenav">
    <div class="list-group">
      <span id="nestable-menu">

        <span href="#" class="list-group-item list-group-item-action btn-sidebar lang" data-toggle="modal" data-target="#myModal" id="addRecord" key="add"></span>
        <span href="#" class="list-group-item list-group-item-action list-group-item-primary btn-sidebar lang" data-action="expand-all" key="expand">
        </span>
        <span href="#" class="list-group-item list-group-item-action list-group-item-secondary btn-sidebar lang" data-action="collapse-all" key="collapse">
        </span>

        <span href="#" class="list-group-item list-group-item-action list-group-item-success btn-sidebar" id="languageEN">English</span>
        <span href="#" class="list-group-item list-group-item-action list-group-item-danger btn-sidebar" id="languageTC">繁體中文</span>

    </span>

    </div>

  </div>
  
  <div class="main">
    <center>
      <div id="load"></div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="container">
                      <h2 class="menu-title lang" key="title"></h2>

                      <!-- The Modal -->
                      <div class="modal fade" id="myModal">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            
                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h4 class="modal-title lang" key="add"></h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            
                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="form">
                                  <div class="form-group row">
                                    <label for="icon" class="col-sm-2 col-form-label lang" key="iconName"></label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="icon" placeholder="">
                                    </div>
                                  </div>

                                  <div class="form-group row">
                                    <label for="english" class="col-sm-2 col-form-label lang" key="english"></label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="english" placeholder="" required>
                                    </div>
                                  </div>

                                  <div class="form-group row">
                                    <label for="chinese" class="col-sm-2 col-form-label lang" key="chinese"></label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="chinese" placeholder="" required>
                                    </div>
                                  </div>

                                  <div class="form-group row">
                                    <label for="english_link" class="col-sm-2 col-form-label lang" key="link"></label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="english_link" placeholder="">
                                    </div>
                                  </div>

                                  <div class="form-group row">
                                    <label for="new_subject_code" class="col-sm-2 col-form-label lang" key="subjectCode"></label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="new_subject_code" placeholder="">
                                    </div>
                                  </div>

                                  <div class="form-group row">
                                    <label for="remarks" class="col-sm-2 col-form-label lang" key="remarks"></label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="remarks" placeholder="">
                                    </div>
                                  </div>

                                  <input type="hidden" id="id">
                                  
                                </div>
                            </div>
                            
                            <!-- Modal footer -->
                            <div class="modal-footer">
                              <span type="button" class="btn btn-primary lang" data-dismiss="modal" id="submit" key="submit"></span>
                              <span type="button" class="btn btn-secondary lang" data-dismiss="modal" id="reset" key="cancel"></span>
                            </div>
                            
                          </div>
                        </div>
                      </div>
                      
                    </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="dd" id="nestable">

                <div id="get_menu"></div>

                </div>
            </div>
        </div>

      <input type="hidden1" id="nestable-output">

    </center>
  </div>  
  
  <script src="/admin/js/menu.js"></script>
  <script src="/resources/js/jquery-3.5.1.js"></script>
  <script src="/resources/js/jquery.nestable.js"></script>
  
  <script src="/resources/js/languages.js"></script>

</body>
</html>
