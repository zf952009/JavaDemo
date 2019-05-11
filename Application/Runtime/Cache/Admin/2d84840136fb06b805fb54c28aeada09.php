<?php if (!defined('THINK_PATH')) exit();?><fieldset class="layui-elem-field layui-field-title" style="margin: 30px;">
	<legend><?php echo ($title); ?></legend>
</fieldset>
<div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief" style="margin: 30px;">
	<a href="<?php echo U('admin/course/course');?>?v=<?php echo ($title); ?>&pageUP=<?php echo ($pageUP); ?>" class="layui-btn layui-btn-sm layui-btn-normal <?php echo ($disabledUP); ?>">上一页</a>
	<a href="<?php echo U('admin/course/course');?>?v=<?php echo ($title); ?>&pageNext=<?php echo ($pageNext); ?>" class="layui-btn layui-btn-sm layui-btn-normal <?php echo ($disabledNext); ?>">下一页</a>
	<a href="<?php echo U('admin/course/updatecourse');?>" class="layui-btn layui-btn-sm layui-btn-normal target="mainFrame">新增</a>
	<a href="<?php echo U('admin/course/courseselect');?>" class="layui-btn layui-btn-sm layui-btn-normal target="mainFrame">查询</a>
	<a href="<?php echo U('admin/course/coursedelete');?> " class="layui-btn layui-btn-sm layui-btn-normal target="mainFrame">删除课程</a>
	<ul class="layui-tab-title">
		<li>
			<a href="<?php echo U('admin/course/course');?>?&v=所有课程&page=1">所有课程</a>
		</li>
		<!--
        	显示所有的课程
        -->
		<?php if(is_array($value)): $k = 0; $__LIST__ = $value;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><li>
				<a href="<?php echo U('admin/course/course');?>?list2id=<?php echo ($v["list2id"]); ?>&v=<?php echo ($v["list2name"]); ?>&page=1"><?php echo ($v["list2name"]); ?></a>
			</li><?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
	<div class="layui-tab-content" style="height: 100px;">
		<div class="layui-tab-item layui-show">
			<table class="layui-table" lay-even="" lay-skin="row">
				<colgroup>
					<col width="100">
					<col width="100">
					<col width="150">
					<col width="150">
					<col width="150">
					<col width="150">
					<col width="100">
					<col width="100">
					<col>
				</colgroup>
				<thead>
					<tr>
						<th>课程编号</th>
						<th>课程名</th>
						<th>授课教师</th>
						<th>授课类型</th>
						<th>课程简介</th>
						<th>课程小节</th>
						<th>课程路径</th>
						<th>其他</th>
						<th>操作</th>
					</tr>
				</thead>

				<tbody>
					<div class="layui-tab-item">
						<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><tr>
								<td><?php echo ($value["course_id"]); ?></td>
								<td><?php echo ($value["course_name"]); ?></td>
								<td><?php echo ($value["course_teachar"]); ?></td>
								<td><?php echo ($value["list2name"]); ?></td>
								<td><?php echo ($value["course_summary"]); ?></td>
								<td><?php echo ($value["course_section_name"]); ?></td>
								<td><?php echo ($value["course_path"]); ?></td>
								<td><?php echo ($value["course_other"]); ?></td>
								<td>
									<a href="<?php echo U('admin/course/courseDetails');?>?courseid=<?php echo ($value["course_id"]); ?>&list2id=<?php echo ($value["list2id"]); ?>&teacharid=<?php echo ($value["course_teachar"]); ?>&list1id=<?php echo ($value["list1id"]); ?>" class="layui-btn" target="mainFrame">详情/修改</a>
								</td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
				</tbody>
			</table>
		</div>
	</div>
</div>

<link rel="stylesheet" type="text/css" href="/Public/admin/layui/css/layui.css" media="all" />
<script src="/Public/admin/layui/layui.js"></script>
<script type="text/javascript">
	layui.use('element', function() {
		var $ = layui.jquery,
			element = layui.element; //Tab的切换功能，切换事件监听等，需要依赖element模块
		$('.site-demo-active').on('click', function() {
			var othis = $(this),
				type = othis.data('type');
			active[type] ? active[type].call(this, othis) : '';
		});
	});
</script>