<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" class="app">
<head>
  <meta charset="utf-8" />
  <title>Mr.Rao的商城后台管理系统</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="/wancezy/JDshop/Public/Admin/css/bootstrap.css" type="text/css"/>
  <link rel="stylesheet" href="/wancezy/JDshop/Public/Admin/css/animate.css" type="text/css"/>
  <link rel="stylesheet" href="/wancezy/JDshop/Public/Admin/css/font-awesome.min.css" type="text/css"/>
  <link rel="stylesheet" href="/wancezy/JDshop/Public/Admin/css/font.css" type="text/css"/>
  <link rel="stylesheet" href="/wancezy/JDshop/Public/Admin/js/calendar/bootstrap_calendar.css" type="text/css"/>
  <link rel="stylesheet" href="/wancezy/JDshop/Public/Admin/js/jvectormap/jquery-jvectormap-1.2.2.css" type="text/css"/>
  <link rel="stylesheet" href="/wancezy/JDshop/Public/Admin/css/app.css" type="text/css"/>
  <script src="/wancezy/JDshop/node_modules/hdjs/js/jquery.min.js"></script>
  <!--[if lt IE 9]>
  <script src="/wancezy/JDshop/Public/Admin/js/ie/html5shiv.js"></script>
  <script src="/wancezy/JDshop/Public/Admin/js/ie/respond.min.js"></script>
  <script src="/wancezy/JDshop/Public/Admin/js/ie/excanvas.js"></script>
  <![endif]-->
  <script>
      //配置后台地址
      var hdjs = {
        'base': '/wancezy/JDshop/node_modules/hdjs',
        'ueditor':'',
        'uploader': "<?php echo u('system/component/uploader');?>",
        'filesLists': '/admin/Component/filesLists',
        'removeImage': '删除图片后台地址'
      };
  </script>
  <script src="/wancezy/JDshop/node_modules/hdjs/app/util.js"></script>
  <script src="/wancezy/JDshop/node_modules/hdjs/require.js"></script>
  <script src="/wancezy/JDshop/node_modules/hdjs/config.js"></script>
</head>
<body class="" ng-controller="ctrl">
  <section class="vbox">
    <header class="bg-dark dk header navbar navbar-fixed-top-xs">
      <div class="navbar-header aside-md">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
          <i class="fa fa-bars"></i>
        </a>
        <a href="index.php" class="navbar-brand" data-toggle="fullscreen"><img src="/wancezy/JDshop/Public/Admin/images/logo.png" class="m-r-sm">Mr.Rao's Shop</a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user">
          <i class="fa fa-cog"></i>
        </a>
      </div>
      <ul class="nav navbar-nav hidden-xs">
        <li class="dropdown">
          <section class="dropdown-menu aside-xl on animated fadeInLeft no-borders lt">
            <div class="wrapper lter m-t-n-xs">
              <a href="#" class="thumb pull-left m-r">
                <img src="/wancezy/JDshop/Public/Admin/images/avatar.jpg" class="img-circle">
              </a>
              <div class="clear">
                <a href="#"><span class="text-white font-bold">@Mike Mcalidek</a></span>
                <small class="block">Art Director</small>
                <a href="#" class="btn btn-xs btn-success m-t-xs">Upgrade</a>
              </div>
            </div>
            <div class="row m-l-none m-r-none m-b-n-xs text-center">
              <div class="col-xs-4">
                <div class="padder-v">
                  <span class="m-b-xs h4 block text-white">245</span>
                  <small class="text-muted">Followers</small>
                </div>
              </div>
              <div class="col-xs-4 dk">
                <div class="padder-v">
                  <span class="m-b-xs h4 block text-white">55</span>
                  <small class="text-muted">Likes</small>
                </div>
              </div>
              <div class="col-xs-4">
                <div class="padder-v">
                  <span class="m-b-xs h4 block text-white">2,035</span>
                  <small class="text-muted">Photos</small>
                </div>
              </div>
            </div>
          </section>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="thumb-sm avatar pull-left">
              <img src="/wancezy/JDshop/Public/Admin/images/avatar.jpg">
            </span>
            <?php echo session('admin.username');?>
          </a>
        </li>
        <li class="dropdown" style="margin-right: 10px">
          <div class="m-t m-l">
            <a href="<?php echo u('admin/index/out');?>" class="dropdown-toggle btn btn-xs btn-primary" title="Upgrade"><i class="fa fa-long-arrow-up"></i></a>
          </div>
        </li>
      </ul>      
    </header>
    <section>
      <section class="hbox stretch">
        <!-- .aside -->
        <aside class="bg-dark lter aside-md hidden-print hidden-xs" id="nav">          
          <section class="vbox">
            <header class="header bg-primary lter text-center clearfix">
              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-dark btn-icon" title="New project"><i class="fa fa-plus"></i></button>
                <div class="btn-group hidden-nav-xs">
                  <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
                    Switch Project
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu text-left">
                    <li><a href="#">Project</a></li>
                    <li><a href="#">Another Project</a></li>
                    <li><a href="#">More Projects</a></li>
                  </ul>
                </div>
              </div>
            </header>
            <section class="w-f scrollable">
              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">
                
                <!-- nav -->
                <nav class="nav-primary hidden-xs">
                  <ul class="nav">
                    <li>
                      <a href="index.html" >
                        <i class="fa fa-dashboard icon">
                          <b class="bg-danger"></b>
                        </i>
                        <span class="pull-right">
                          <i class="fa fa-angle-down text"></i>
                          <i class="fa fa-angle-up text-active"></i>
                        </span>
                        <span>基本配置</span>
                      </a>
                      <ul class="nav lt">
                        <li>
                          <a href="<?php echo u('admin/website/index');?>"  class="active">
                            <i class="fa fa-angle-right"></i>
                            <span>网站配置</span>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li >
                      <a href="#layout"  >
                        <i class="fa fa-columns icon">
                          <b class="bg-warning"></b>
                        </i>
                        <span class="pull-right">
                          <i class="fa fa-angle-down text"></i>
                          <i class="fa fa-angle-up text-active"></i>
                        </span>
                        <span>类型管理</span>
                      </a>
                      <ul class="nav lt">
                        <li >
                          <a href="<?php echo u('admin/type/index');?>" >
                            <i class="fa fa-angle-right"></i>
                            <span>类型列表</span>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li >
                      <a href="#uikit"  >
                        <i class="fa fa-flask icon">
                          <b class="bg-success"></b>
                        </i>
                        <span class="pull-right">
                          <i class="fa fa-angle-down text"></i>
                          <i class="fa fa-angle-up text-active"></i>
                        </span>
                        <span>分类管理</span>
                      </a>
                      <ul class="nav lt">
                        <li >
                          <a href="<?php echo u('admin/cate/index');?>" >
                            <i class="fa fa-angle-right"></i>
                            <span>分类列表</span>
                          </a>
                        </li>
                        <li >
                          <a href="<?php echo u('admin/cate/add');?>" >
                            <!--<b class="badge bg-info pull-right">369</b>-->
                            <i class="fa fa-angle-right"></i>
                            <span>顶级分类添加</span>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li >
                      <a href="#pages"  >
                        <i class="fa fa-file-text icon">
                          <b class="bg-primary"></b>
                        </i>
                        <span class="pull-right">
                          <i class="fa fa-angle-down text"></i>
                          <i class="fa fa-angle-up text-active"></i>
                        </span>
                        <span>品牌管理</span>
                      </a>
                      <ul class="nav lt">
                        <li >
                          <a href="<?php echo u('admin/brand/index');?>" >
                            <i class="fa fa-angle-right"></i>
                            <span>品牌列表</span>
                          </a>
                        </li>
                        <li >
                          <a href="<?php echo u('admin/brand/save');?>" >
                            <i class="fa fa-angle-right"></i>
                            <span>品牌添加</span>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li >
                      <a href="#uikit"  >
                        <i class="fa fa-flask icon">
                          <b class="bg-success"></b>
                        </i>
                        <span class="pull-right">
                          <i class="fa fa-angle-down text"></i>
                          <i class="fa fa-angle-up text-active"></i>
                        </span>
                        <span>商品管理</span>
                      </a>
                      <ul class="nav lt">
                        <li >
                          <a href="<?php echo u('admin/goods/index');?>" >
                            <i class="fa fa-angle-right"></i>
                            <span>商品列表</span>
                          </a>
                        </li>
                        <li >
                          <a href="<?php echo u('admin/goods/add');?>" >
                            <!--<b class="badge bg-info pull-right">369</b>-->
                            <i class="fa fa-angle-right"></i>
                            <span>商品添加</span>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li>
                      <a href="index.html" >
                        <i class="fa fa-dashboard icon">
                          <b class="bg-danger"></b>
                        </i>
                        <span class="pull-right">
                          <i class="fa fa-angle-down text"></i>
                          <i class="fa fa-angle-up text-active"></i>
                        </span>
                        <span>用户管理</span>
                      </a>
                      <ul class="nav lt">
                        <li>
                          <a href="<?php echo u('admin/ForeUser/index');?>"  class="active">
                            <i class="fa fa-angle-right"></i>
                            <span>用户列表</span>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li>
                      <a href="index.html" >
                        <i class="fa fa-columns icon">
                          <b class="bg-success"></b>
                        </i>
                        <span class="pull-right">
                          <i class="fa fa-angle-down text"></i>
                          <i class="fa fa-angle-up text-active"></i>
                        </span>
                        <span>订单管理</span>
                      </a>
                      <ul class="nav lt">
                        <li>
                          <a href="<?php echo u('admin/OrderManage/index');?>"  class="active">
                            <i class="fa fa-angle-right"></i>
                            <span>订单列表</span>
                          </a>
                        </li>
                      </ul>
                    </li>

                  </ul>
                </nav>
                <!-- / nav -->
              </div>
            </section>
            
            <footer class="footer lt hidden-xs b-t b-dark">
              <div id="chat" class="dropup">
                <section class="dropdown-menu on aside-md m-l-n">
                  <section class="panel bg-white">
                    <header class="panel-heading b-b b-light">Active chats</header>
                    <div class="panel-body animated fadeInRight">
                      <p class="text-sm">No active chats.</p>
                      <p><a href="#" class="btn btn-sm btn-default">Start a chat</a></p>
                    </div>
                  </section>
                </section>
              </div>
              <div id="invite" class="dropup">                
                <section class="dropdown-menu on aside-md m-l-n">
                  <section class="panel bg-white">
                    <header class="panel-heading b-b b-light">
                      John <i class="fa fa-circle text-success"></i>
                    </header>
                    <div class="panel-body animated fadeInRight">
                      <p class="text-sm">No contacts in your lists.</p>
                      <p><a href="#" class="btn btn-sm btn-facebook"><i class="fa fa-fw fa-facebook"></i> Invite from Facebook</a></p>
                    </div>
                  </section>
                </section>
              </div>
              <a href="#nav" data-toggle="class:nav-xs" class="pull-right btn btn-sm btn-dark btn-icon">
                <i class="fa fa-angle-left text"></i>
                <i class="fa fa-angle-right text-active"></i>
              </a>
              <div class="btn-group hidden-nav-xs">
                <button type="button" title="Chats" class="btn btn-icon btn-sm btn-dark" data-toggle="dropdown" data-target="#chat"><i class="fa fa-comment-o"></i></button>
                <button type="button" title="Contacts" class="btn btn-icon btn-sm btn-dark" data-toggle="dropdown" data-target="#invite"><i class="fa fa-facebook"></i></button>
              </div>
            </footer>
          </section>
        </aside>
        <!-- /.aside -->
        <section id="content">

          
<div class="m-b-md">
    <h2 class="m-b-none">品牌管理</h2>
</div>
<form class="form-horizontal" id="form" action="" method="post">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-group">
                <label for="" class="col-sm-2 control-label">品牌名称</label>
                <div class="col-sm-9">
                    <input type="text" name="b_name" value="<?php echo ($oldData['b_name']); ?>" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-2 control-label">品牌排序</label>
                <div class="col-sm-9">
                    <input type="text" name="b_sort" value="<?php echo ($oldData['b_sort']); ?>" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-2 control-label">所属于层数</label>
                <div class="col-sm-9">
                    <input type="text" name="b_ceng" value="<?php echo ($oldData['b_ceng']); ?>" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-2 control-label">品牌热门</label>
                <div class="col-sm-9">
                    <input type="radio" name="b_hot" checked value="1">是
                    <input type="radio" name="b_hot" value="2" <?php if($oldData['b_hot'] == 2) {echo checked;} ?>>否
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-2 control-label">品牌LOGO</label>
                <div class="col-sm-9">
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" name="b_logo" readonly="" value="<?php echo ($oldData['b_logo']); ?>">
                            <div class="input-group-btn">
                                <button onclick="upImage(this)" class="btn btn-default" type="button">选择图片</button>
                            </div>
                        </div>
                        <div class="input-group" style="margin-top:5px;">
                            <?php if($oldData['b_logo']==null): ?><img src="/wancezy/JDshop/Public/Admin/images/nopic.jpg" class="img-responsive img-thumbnail"
                                     width="150">
                                <?php else: ?>
                                <img src="<?php echo ($oldData['b_logo']); ?>" class="img-responsive img-thumbnail"
                                     width="150"><?php endif; ?>
                            <em class="close" style="position:absolute; top: 0px; right: -14px;" title="删除这张图片" onclick="removeImg(this)">×</em>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="btn btn-primary col-sm-10 col-sm-offset-1" type="submit">确定提交</button>
</form>
</div>
<script>
    //上传图片
    function upImage(obj) {
        require(['util'], function (util) {
            options = {
                multiple: false,//是否允许多图上传
                //data是向后台服务器提交的POST数据
                data:{name:'后盾人',year:2099},
            };
            util.image(function (images) {          //上传成功的图片，数组类型 
                $("[name='b_logo']").val(images[0]);
                $(".img-thumbnail").attr('src', images[0]);
            }, options)
        });
    }

    //移除图片
    function removeImg(obj) {
        $(obj).prev('img').attr('src', '/wancezy/JDshop/Public/Admin/images/nopic.jpg');
        $(obj).parent().prev().find('input').val('');
    }
</script>



          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen, open" data-target="#nav,html"></a>
        </section>
        <aside class="bg-light lter b-l aside-md hide" id="notes">
          <div class="wrapper">Notification</div>
        </aside>
      </section>
    </section>
  </section>
  <!-- Bootstrap -->
  <script src="/wancezy/JDshop/Public/Admin/js/bootstrap.js"></script>
  <script>
      require(['util', 'underscore'], function (until, _) {
          require(['/wancezy/JDshop/Public/Admin/js/app.js', 'css!/wancezy/JDshop/Public/Admin/css/app.css']);

          require(['angular', 'jquery'], function (angular, $) {
              angular.module('app', []).controller('ctrl', ['$scope', function ($scope) {
                  if (angular.isFunction(controller)) {
                      controller($scope, $, _);
                  }
              }]);
              angular.bootstrap(document.getElementsByTagName('body'), ['app']);
          });
      });
  </script>
</body>
</html>