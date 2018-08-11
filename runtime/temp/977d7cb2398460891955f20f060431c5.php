<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"D:\phpstudy\WWW\duty\public/../application/admin\view\entry\index.html";i:1513739428;s:53:"D:\phpstudy\WWW\duty\application\admin\view\base.html";i:1513739428;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="__STATIC__/admin/css/font-awesome.min.css"/>
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<body>
<div>
    <!--头部导航-->
    <nav class="navbar-inverse" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">返回首页</a>
            <a class="navbar-brand" href="<?php echo url('admin/entry/index'); ?>">后台首页</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-w fa-user"></i>
                        <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
    <!--头部导航结束-->
    <!--主体内容-->
    <div class="container-fluid admin-menu" style="margin-top: 10px;">
        <div class="row">
            <!--左侧菜单-->
            <div class="col-xs-12 col-sm-3 col-lg-2 left-menu">

                <div class="panel panel-default">
                    <!--员工管理-->
                    <div class="panel-heading">
                        <h3 class="panel-title">员工管理</h3>
                    </div>
                    <ul class="list-group menus">
                        <li class="list-group-item">
                            <a href="<?php echo url('admin/person/index'); ?>" class="quickMenuLink">
                                <i class="fa fa-w fa-user"></i>
                                员工列表
                            </a>
                        </li>
                    </ul>
                    <!--员工结束-->
                    <!--工作管理-->
                    <div class="panel-heading">
                        <h3 class="panel-title">工作管理</h3>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="<?php echo url('admin/work/index'); ?>" class="quickMenuLink">
                                <i class="fa fa-w fa-joomla"></i>
                                工作列表
                            </a>
                        </li>
                    </ul>
                    <!--工作管理结束-->
                    
                </div>
            </div>


            <style>
                .list-group-item{
                    cursor: pointer;
                }
                .quickMenuLink{
                    color: black;
                    text-decoration: none;

                }
                .quickMenuLink:hover{
                    text-decoration: none;
                    color: black;
                }
                .quickMenuLink i{
                    color: #337ab7;
                }
            </style>
            <!--左侧菜单结束-->
            <!--右侧内容-->
            <div class="col-xs-12 col-sm-9 col-lg-10">
                
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">后台首页</h3>
    </div>
    <div class="panel-body">
        欢迎来到后台首页
    </div>
</div>

            </div>
            <!--右侧内容结束-->
        </div>
    </div>
    <!--主体内容-->
</div>
</body>
</body>
</html>