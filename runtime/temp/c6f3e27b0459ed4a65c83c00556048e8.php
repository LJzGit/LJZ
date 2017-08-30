<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"D:\UPUPW\UPUPW_NP7.0\htdocs\yimi\public/../application/admin\view\goods\edit.html";i:1504093623;}*/ ?>
<?php echo widget('Blog/header'); ?>
	<!-- /头部 -->

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
                        <a href="#">系统</a>
                    </li>
                                        <li>
                        <a href="<?php echo url('Goods/index'); ?>">商品列表</a>
                    </li>
                                        <li class="active">修改商品</li>
                                        </ul>
                </div>
                <!-- /Page Breadcrumb -->

                <!-- Page Body -->
                <div class="page-body">

<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-blue">
                <span class="widget-caption">修改商品</span>
            </div>
            <div class="widget-body">
                <div id="horizontal-form">
                    <form class="form-horizontal" role="form" action="<?php echo url('Goods/doEdit',['id'=>$data['goods_id']]); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label no-padding-right">商品名称</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="goods_name" placeholder="" name="goods_name" required="" type="text"value="<?php echo $data['goods_name']; ?>">
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label no-padding-right">所属分类</label>
                            <div class="col-sm-6">
                                <select name="cate_id" style="width: 100%;">
                                    <option value=""><?php echo $data['name']; ?></option>
                                    <?php foreach($cate as $v): ?>
                                    <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label no-padding-right">进价</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="market_price" placeholder="" name="market_price" type="text" value="<?php echo $data['market_price']; ?>">
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>

                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label no-padding-right">售价</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="sell_price" placeholder=""required="" name="sell_price" type="text"value="<?php echo $data['sell_price']; ?>">
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>

                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label no-padding-right">积分</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="point" placeholder=""required="" name="point" type="text"value="<?php echo $data['point']; ?>">
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>

                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label no-padding-right">库存量</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="store" placeholder=""required="" name="store" type="text"value="<?php echo $data['store']; ?>">
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>

                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label no-padding-right">描述</label>
                            <div class="col-sm-6">
                                <textarea name="desc" class="form-control"><?php echo $data['desc']; ?></textarea>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="is_show" class="col-sm-2 control-label no-padding-right">是否上架</label>

                            <div class="col-xs-4">
                                <label>
                                    <input class="checkbox-slider slider-icon yesno" name="is_up" <?php if($data['is_up'] == 1): ?>checked="checked"<?php endif; ?> type="checkbox">
                                    <span class="text"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label no-padding-right">商品详细信息</label>
                            <div class="col-sm-6">
                                <textarea name="content" id="content"><?php echo $data['content']; ?></textarea>
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
    <script src="__STATIC__/ueditor/ueditor.config.js"></script>
    <script src="__STATIC__/ueditor/ueditor.all.min.js"></script>
    <script src="__STATIC__/ueditor/lang/zh-cn/zh-cn.js"></script>
    <script src="__STATIC__/admin/style/jquery_002.js"></script>
    <script src="__STATIC__/admin/style/bootstrap.js"></script>
    <script src="__STATIC__/admin/style/jquery.js"></script>
    <!--Beyond Scripts-->
    <script src="__STATIC__/admin/style/beyond.js"></script>
    <script type="text/javascript">

        //实例化编辑器
        //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
        UE.getEditor('content',{initialFrameWidth:800,initialFrameHeight:400});


    </script>


</body></html>