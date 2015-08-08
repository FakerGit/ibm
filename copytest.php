<!DOCTYPE html>
<html>
<head>
<title>ZeroClipboard Test</title>
<meta charset="utf-8">
<style type="text/css">
.line{margin-bottom:20px;}
/* 复制提示 */
.copy-tips{position:fixed;z-index:999;bottom:50%;left:50%;margin:0 0 -20px -80px;background-color:rgba(0, 0, 0, 0.2);filter:progid:DXImageTransform.Microsoft.Gradient(startColorstr=#30000000, endColorstr=#30000000);padding:6px;}
.copy-tips-wrap{padding:10px 20px;text-align:center;border:1px solid #F4D9A6;background-color:#FFFDEE;font-size:14px;}
</style>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.zclip.js"></script>
</head>
<body>
<div class="line">
    <h2>demo1 点击复制当前文本</h2>
    <a href="#none" class="copy">点击复制我</a>
</div>
<div class="line">
    <h2>demo2 点击复制表单中的文本</h2>
    <a href="#none" class="copy-input">点击复制单中的文本</a>
    <input type="text" class="input" value="输入要复制的内容" />
</div>
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
/* 定义所有class为copy标签，点击后可复制被点击对象的文本 */
    $(".copy").zclip({
        path: "js/ZeroClipboard.swf",
        copy: function(){
        return $(this).text();
        },
        beforeCopy:function(){/* 按住鼠标时的操作 */
            $(this).css("color","orange");
        },
        afterCopy:function(){/* 复制成功后的操作 */
            var $copysuc = $("<div class='copy-tips'><div class='copy-tips-wrap'>☺ 复制成功</div></div>");
            $("body").find(".copy-tips").remove().end().append($copysuc);
            $(".copy-tips").fadeOut(3000);
        }
    });
/* 定义所有class为copy-input标签，点击后可复制class为input的文本 */
    $(".copy-input").zclip({
        path: "js/ZeroClipboard.swf",
        copy: function(){
        return $(this).parent().find(".input").val();
        },
        afterCopy:function(){/* 复制成功后的操作 */
            var $copysuc = $("<div class='copy-tips'><div class='copy-tips-wrap'>☺ 复制成功</div></div>");
            $("body").find(".copy-tips").remove().end().append($copysuc);
            $(".copy-tips").fadeOut(3000);
        }
    });
});
</script>