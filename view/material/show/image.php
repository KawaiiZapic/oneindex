<?php view::layout('layout')?>

<?php view::begin('content');?>
	
<div class="mdui-container-fluid">
	<br>
<a href="<?php e($item['downloadUrl']);?>" data-fancybox="image-list"><img class="mdui-img-fluid mdui-center" src="<?php e($item['downloadUrl']);?>"/></a>
	<br>
	<div class="mdui-textfield">
	  <label class="mdui-textfield-label">下载地址</label>
	  <input class="mdui-textfield-input" type="text" value="<?php e($url);?>" readonly/>
	</div>
	<div class="mdui-textfield">
	  <label class="mdui-textfield-label">HTML 引用地址</label>
	  <input class="mdui-textfield-input" type="text" value="<img src='<?php e($url);?>' />" readonly/>
	</div>
        <div class="mdui-textfield">
	  <label class="mdui-textfield-label">Markdown 引用地址</label>
	  <input class="mdui-textfield-input" type="text" value="![](<?php e($url);?>)" readonly/>
	</div>
        <br>
</div>
<a href="<?php e($url);?>" class="mdui-fab mdui-fab-fixed mdui-ripple mdui-color-theme-accent"><i class="mdui-icon material-icons">file_download</i></a>
<?php view::end('content');?>
