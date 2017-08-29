<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"D:\UPUPW\UPUPW_NP7.0\htdocs\yimi\public/../application/admin\view\cate\edit.html";i:1504009135;}*/ ?>
<?php echo widget('Blog/header'); ?>
	
	<div class="main-container container-fluid">
		<div class="page-container">
			            <!-- Page Sidebar -->
            <?php echo widget('Blog/left'); ?>
            <!-- /Page Sidebar -->
            <!-- Page Content -->
            <div class="page-content">
                <!-- Page Breadcrumb -->
                <div class="page-breadcrumbs">
                    <ul class="breadcrumb">
                                        <li>
                        <a href="<?php echo url('Index/index'); ?>">系统</a>
                    </li>
                                        <li>
                        <a href="<?php echo url('Cate/index'); ?>">分类管理</a>
                    </li>
                                        <li class="active">修改分类</li>
                                        </ul>
                </div>
                <!-- /Page Breadcrumb -->

                <!-- Page Body -->
                <div class="page-body">
                    
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-blue">
                <span class="widget-caption">修改分类</span>
            </div>
            <div class="widget-body">
                <div id="horizontal-form">
                    <form class="form-horizontal" role="form" action="<?php echo url('Cate/doEdit',['id'=>$data['id']]); ?>" method="post">
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">分类名</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="name" placeholder="" name="name" type="text" value="<?php echo $data['name']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">保存信息</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

                </div>
                <!-- /Page Body -->
            </div>
            <!-- /Page Content -->
		</div>	
	</div>

	    <!--Basic Scripts-->
    <script src="style/jquery_002.js"></script>
    <script src="style/bootstrap.js"></script>
    <script src="style/jquery.js"></script>
    <!--Beyond Scripts-->
    <script src="style/beyond.js"></script>
    


</body></html>