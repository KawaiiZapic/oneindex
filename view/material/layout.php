<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no"/>
	<title><?php e($title.' - '.config('site_name'));?></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdui@0.4.1/dist/css/mdui.min.css" integrity="sha256-lCFxSSYsY5OMx6y8gp8/j6NVngvBh3ulMtrf4SX5Z5A=" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/mdui@0.4.1/dist/js/mdui.min.js" integrity="sha256-dZxrLDxoyEQADIAGrWhPtWqjDFvZZBigzArprSzkKgI=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/pjax@0.2.8/pjax.min.js"></script>
	<style>
		.mdui-appbar .mdui-toolbar{
			height:56px;
			font-size: 16px;
		}
		.mdui-toolbar>*{
			padding: 0 6px;
			margin: 0 2px;
			opacity:0.5;
		}
		.mdui-toolbar>.mdui-typo-headline{
			padding: 0 16px 0 0;
		}
		.mdui-toolbar>i{
			padding: 0;
		}
		.mdui-toolbar>a:hover,a.mdui-typo-headline,a.active{
			opacity:1;
		}
		.mdui-container{
			max-width:980px;
		}
		.mdui-list-item{
			-webkit-transition:none;
			transition:none;
		}
		.mdui-list>.th{
			background-color:initial;
		}
		.mdui-list-item>a{
			width:100%;
			line-height: 48px
		}
		.mdui-list-item{
			margin: 2px 0px;
			padding:0;
		}
		.mdui-toolbar>a:last-child{
			opacity:1;
		}
		#content, #load-face{
			transition:opacity .25s;
		}

		@media screen and (max-width:980px){
			.mdui-container{
				width:100% !important;
				margin:0px;
			}
			.mdui-toolbar>*{
				display: none;
			}
			.mdui-toolbar>a:last-child,.mdui-toolbar>.mdui-typo-headline,.mdui-toolbar>i:first-child{
				display: block;
			}
		}
	</style>
</head>
<body class="mdui-theme-primary-pink mdui-theme-accent-pink">
	<header class="mdui-appbar mdui-color-theme">
		<div id="path" class="mdui-toolbar mdui-container">
			<a href="/" class="mdui-typo-headline"><?php e(config('site_name'));?></a>
			<?php foreach((array)$navs as $n=>$l):?>
			<i class="mdui-icon material-icons mdui-icon-dark" style="margin:0;">chevron_right</i>
			<a href="<?php e($l);?>"><?php e($n);?></a>
			<?php endforeach;?>
			<!--<a href="javascript:;" class="mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">refresh</i></a>-->
		</div>
	</header>
	
	<div id="content" class="mdui-container">
    	<?php view::section('content');?>
	</div>
<script>
var p = new Pjax({elements:[".mdui-list-item:not(.file) a","#path a[href]"],selectors:["#path","title","#content"],cacheBust:false});
$(document).on("pjax:send",function(){
	$(".load-face").remove();
                $("#content").after('<div class="load-face mdui-valign" style="pointer-events:none;height:100vh;position:fixed;top:0;left:0;width:100vw;opacity:0;"><div style="width:20vw;height:20vw;max-width:64px;max-height:64px;" class="mdui-center mdui-spinner"></div></div>');
                setTimeout(function(){
                        $("#content").css("opacity","0").css("pointer-events","none");
                        $(".load-face").css("opacity","1");
                },10);
                mdui.mutation();
        }).on("pjax:error",function(){
                location.reload();
        }).on("pjax:complete",function(){
                $("#content").css("opacity","1").css("pointer-events","");
                $(".load-face").css("opacity","0").transitionEnd(function(){
                        $(".load-face").remove();
                });

        });
</script>
</body>
</html>
