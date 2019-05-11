<?php if (!defined('THINK_PATH')) exit();?><meta charset="UTF-8" />
<div class="layui-row layui-col-space5">
	<div class="layui-col-md4">
		<div class="grid-demo grid-demo-bg1">&nbsp;</div>
	</div>
	<div class="layui-col-md4">
		<div class="grid-demo">
			<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
				<legend>课程上传页面</legend>
			</fieldset>
			<form action="<?php echo U('admin/course/upload');?>" method="post" enctype="multipart/form-data" class="layui-form">

				<div class="layui-form-item">
					<label class="layui-form-label">课程名</label>
					<div class="layui-input-inline">
						<input type="text" name="course_name" lay-verify="title" autocomplete="off" placeholder="请输入课程名" class="layui-input">
					</div>
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label">选择课程类型</label>
					<div class="layui-input-inline">
						<select name="list2id" lay-filter="">
							<option value="">请选择</option>
							<?php if(is_array($arr2)): $k = 0; $__LIST__ = $arr2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value2): $mod = ($k % 2 );++$k;?><option value="<?php echo ($k); ?>"><?php echo ($value2["$k"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</div>
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label">选择授课老师</label>
					<div class="layui-input-inline">
						<select name="course_teachar" lay-filter="">
							<option value="">请选择</option>
							<?php if(is_array($arr1)): $i = 0; $__LIST__ = $arr1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value1): $mod = ($i % 2 );++$i;?><option value="<?php echo ($value1["teachingid"]); ?>"><?php echo ($value1["teachingname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</div>
				</div>

				<div class="layui-form-item layui-form-text">
					<label class="layui-form-label">课程简介</label>
					<div class="layui-input-block">
						<textarea placeholder="请输入课程简介" name="course_summary" class="layui-textarea"></textarea>
					</div>
				</div>

				<div class="layui-upload">
					<button type="button" class="layui-btn layui-btn-normal" id="testList">选择课程</button>
					<div class="layui-upload-list">
						<table class="layui-table">
							<thead>
								<tr>
									<th>文件名</th>
									<th>大小</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody id="demoList"></tbody>
						</table>
					</div>
				</div>
				<input type="submit" name="" class="layui-btn" value="开始上传" />
			</form>
		</div>
	</div>
	<div class="layui-col-md4">
		<div class="grid-demo grid-demo-bg1">&nbsp;</div>
	</div>
</div>

<link rel="stylesheet" type="text/css" href="/Public/admin/layui/css/layui.css" media="all" />
<script src="/Public/admin/layui/layui.js"></script>
<script>
	layui.use(['upload', 'form', 'layedit', 'laydate'], function() {
		var $ = layui.jquery,
			upload = layui.upload;
		var form = layui.form;

		//多文件列表示例
		var demoListView = $('#demoList'),
			uploadListIns = upload.render({
				elem: '#testList',
				url: '/upload/',
				accept: 'file',
				field: 'course[]',
				multiple: true,
				auto: false,
				bindAction: '#testListAction',
				choose: function(obj) {
					var files = this.files = obj.pushFile(); //将每次选择的文件追加到文件队列
					//读取本地文件
					obj.preview(function(index, file, result) {
						var tr = $(['<tr id="upload-' + index + '">', '<td>' + file.name + '</td>', '<td>' + (file.size / 1014).toFixed(1) + 'kb</td>', '<td>', '<button class="layui-btn layui-btn-xs demo-reload layui-hide">重传</button>', '<button class="layui-btn layui-btn-xs layui-btn-danger demo-delete">删除</button>', '</td>', '</tr>'].join(''));

						//单个重传
						tr.find('.demo-reload').on('click', function() {
							obj.upload(index, file);
						});

						//删除
						tr.find('.demo-delete').on('click', function() {
							delete files[index]; //删除对应的文件
							tr.remove();
							uploadListIns.config.elem.next()[0].value = ''; //清空 input file 值，以免删除后出现同名文件不可选
						});

						demoListView.append(tr);
					});
				},
				done: function(res, index, upload) {
					if(res.code == 0) { //上传成功
						var tr = demoListView.find('tr#upload-' + index),
							tds = tr.children();
						tds.eq(2).html('<span style="color: #5FB878;">上传成功</span>');
						tds.eq(3).html(''); //清空操作
						return delete this.files[index]; //删除文件队列已经上传成功的文件
					}
					this.error(index, upload);
				},
				error: function(index, upload) {
					var tr = demoListView.find('tr#upload-' + index),
						tds = tr.children();
					tds.eq(2).html('<span style="color: #FF5722;">上传失败</span>');
					tds.eq(3).find('.demo-reload').removeClass('layui-hide'); //显示重传
				}
			});
	});
</script>