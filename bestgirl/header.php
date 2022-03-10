<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no,viewport-fit=cover" />
    <?php $this->header('generator=&template=&pingback=&xmlrpc=&wlw='); ?>
    <link rel="icon" type="image/svg+xml" href="/assets/img/icon.svg">
    <link rel="icon" type="image/svg+xml" sizes="144x144" href="/assets/img/icon.svg">
    <link rel="apple-touch-icon" type="image/svg+xml" href="/assets/img/icon.svg">
    <title><?php $this->archiveTitle(array(
                'category'  =>  _t('分类 %s 下的文章'),
                'search'    =>  _t('包含关键字 %s 的文章'),
                'tag'       =>  _t('标签 %s 下的文章'),
                'author'    =>  _t('%s 发布的文章')
            ), '', ' - '); ?><?php $this->options->title(); ?></title>

    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<!--[if lt IE 8]>
    <div class="browsehappy" role="dialog"><?php _e('当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/">升级你的浏览器</a>'); ?>.</div>
<![endif]-->

<div id="goonMusic" class="wrap">
	<div class="menu-frame menu">
		<div class="inner">
			<div class="menu-head">
			    <a href="/">
				<h2 class="menu-title">必须优秀 MUST.BEST</h2>
				<p class="menu-info"><?php $this->random() ?></p>
                </a>
			</div>