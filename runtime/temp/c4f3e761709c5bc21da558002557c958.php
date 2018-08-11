<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:69:"D:\phpstudy\WWW\duty\public/../application/admin\view\task\index.html";i:1513752263;s:53:"D:\phpstudy\WWW\duty\application\admin\view\base.html";i:1513755622;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="__STATIC__/admin/css/font-awesome.min.css"/>
    <script src="__STATIC__/admin/js/jquery.js"></script>
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
                        <h3 class="panel-title">任务管理</h3>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="<?php echo url('admin/task/index'); ?>" class="quickMenuLink">
                                <i class="fa fa-w fa-joomla"></i>
                                任务列表
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
                
<style>
    .nav-tabs li.active a{
        border: 1px solid #428bca !important;
        background-color: #428bca !important;
        color: #ffffff;
    }
</style>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">任务管理</h3>
    </div>
    <div class="panel-body">
        <!-- TAB NAVIGATION -->
        <ul class="nav nav-tabs">
            <li class="active"><a href="<?php echo url('index'); ?>">列表</a></li>
            <li><a href="<?php echo url('store'); ?>">新增</a></li>
        </ul>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>编号</th>
                <th>任务名称</th>
                <th>任务状态</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): if( count($data)==0 ) : echo "" ;else: foreach($data as $key=>$v): ?>
            <tr>
                <td><?php echo $v['tid']; ?></td>
                <td><?php echo $v['title']; ?></td>
                <td>
                    <?php if($v['status']): ?>
                    已完成
                    <?php else: ?>
                    未完成
                    <?php endif; ?>
                </td>
                <td>
                    <a href="<?php echo url('edit',['id'=>$v['tid']]); ?>" class="btn btn-primary">编辑</a>
                    <a href="javascript:;" onclick="del(<?php echo $v['tid']; ?>)" class="btn btn-danger">删除</a>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <?php echo $data->render(); ?>
        <script>
            function del(id) {
               if(confirm('确定要删除吗')){
                   location.href="<?php echo url('del'); ?>"+'?id='+id;
               }
            }
        </script>
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