<?php if (!defined('THINK_PATH')) exit();?><fieldset class="layui-elem-field layui-field-title" style="margin: 30px;">
    <legend><?php echo ($title); ?></legend>
</fieldset>

<div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief" style="margin: 30px;">
    <a href="<?php echo U('admin/teachar/teachar');?>?title=<?php echo ($title); ?>&pageUP=<?php echo ($pageUP); ?>"
       class="layui-btn layui-btn-sm layui-btn-normal <?php echo ($disabledUP); ?>">上一页</a>
    <a href="<?php echo U('admin/teachar/teachar');?>?title=<?php echo ($title); ?>&pageNext=<?php echo ($pageNext); ?>"
       class="layui-btn layui-btn-sm layui-btn-normal <?php echo ($disabledNext); ?>">下一页</a>
    <a href="<?php echo U('admin/teachar/teacharadd');?>" class="layui-btn layui-btn-sm layui-btn-normal target=" mainFrame">新增</a>
    <a href="<?php echo U('admin/teachar/teacharselect');?>" class="layui-btn layui-btn-sm layui-btn-normal target="
       mainFrame">查询</a>
    <a href="<?php echo U('admin/teachar/teachardelete');?> " class="layui-btn layui-btn-sm layui-btn-normal target=" mainFrame">删除用户</a>

    <ul class="layui-tab-title">
        <li class="">
            <a href="<?php echo U( 'admin/index/teachar');?>?title=所有教师&page=1&course2_id=0">所有教师</a>
        </li>
        <!--
            显示所有的课程
        -->
        <?php if(is_array($navs2 )): $i = 0; $__LIST__ = $navs2 ;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><li>
                <a href="<?php echo U( 'admin/index/teachar');?>?title=<?php echo ($value["nav2_name"]); ?>&page=1&course2_id=<?php echo ($value["id"]); ?>"><?php echo ($value["nav2_name"]); ?></a>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
    <div class="layui-tab-content " style="height: 100px; ">
        <div class="layui-tab-item layui-show ">
            <table class="layui-table " lay-even=" " lay-skin="row ">
                <colgroup>
                    <col width="100 ">
                    <col width="100 ">
                    <col width="150 ">
                    <col width="150 ">
                    <col width="150 ">
                    <col width="150 ">
                    <col width="100 ">
                    <col>
                </colgroup>
                <thead>
                <tr>
                    <th>编号</th>
                    <th>用户名</th>
                    <th>电子邮箱</th>
                    <th>授课类型</th>
                    <th>教授课程</th>
                    <th>是否为管理员</th>
                    <th>是否禁用</th>
                    <th>操作</th>
                </tr>
                </thead>

                <tbody>
                <div class="layui-tab-item ">
                    <?php if(is_array($data )): $i = 0; $__LIST__ = $data ;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value ): $mod = ($i % 2 );++$i;?><tr>
                            <td><?php echo ($value["teachingid"]); ?></td>
                            <td><?php echo ($value["teachingname"]); ?></td>
                            <td><?php echo ($value["teachingemail"]); ?></td>
                            <td><?php echo ($value["teachingtype"]); ?></td>
                            <td><?php echo ($value["teachingcourses"]); ?></td>
                            <td><?php echo ($value["teachingisadmin"]); ?></td>
                            <td><?php echo ($value["techinglocked"]); ?></td>
                            <td>
                                <a href="<?php echo U( 'admin/teachar/teacharDetails');?>?TeachingID=<?php echo ($value["teachingid"]); ?>"
                                   class="layui-btn " target="mainFrame">详情/修改</a>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                </tbody>
            </table>
        </div>
    </div>
</div>
<link rel="stylesheet " type="text/css " href="/Public/admin/layui/css/layui.css " media="all "/>
<script src="/Public/admin/layui/layui.js "></script>
<script type="text/javascript ">
    layui.use('element', function () {
        var $ = layui.jquery,
            element = layui.element; //Tab的切换功能，切换事件监听等，需要依赖element模块
        $('.site-demo-active').on('click', function () {
            var othis = $(this),
                type = othis.data('type');
            active[type] ? active[type].call(this, othis) : '';
        });
    });
</script>