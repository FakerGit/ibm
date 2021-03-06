<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>编辑文章</title>
<script charset="utf-8" src="/editor/kindeditor.js"></script>
<script charset="utf-8" src="/editor/lang/zh_CN.js"></script>
<script>
KindEditor.ready(function(K) {
	 var editor = K.create('#text');
	 // 取得HTML内容
	 html = editor.html();

     // 同步数据后可以直接取得textarea的value
     editor.sync();
     html = document.getElementById('text').value; // 原生API
     html = K('#text').val(); // KindEditor Node API
     html = $('#text').val(); // jQuery

     // 设置HTML内容
     editor.html('HTML内容');	
});
</script>
</head>

<body>
<form name="editor" id="editor" action="gettext.php" method="post">
<label class="lab">标题</label>
<input id="title" name="title" style="width:658px;"/>
<br/>
<div>
<label class="lab" style="vertical-align:top">简介</label>
<textarea id="introduction" name="introduction" style="width:656px;resize:none" rows="4" >
</textarea>
</div>
<textarea id="text" name="text" style="width:700px;height:300px;resize:none">
</textarea>
<div class="formitm">
                <label class="lab">请选择要发布的模块：</label>
                    <select id="module" name="module">
                    <option value="0" selected="selected">请选择</option>
                    <option value="1">科技快讯</option>
                    <option value="2">主机技术</option>
                    <option value="3">科普乐园</option>
                    <option value="4">知识问答</option>
                    </select>
            </div>
<button class="u-btn" type="submit" name="submit" id="submit">提交</button>&nbsp;
<button class="u-btn" type="reset">重置</button>
</body>
</html>