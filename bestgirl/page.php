<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="menu-list" id="main" role="main">
    <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
        <h3 class="post-title" itemprop="name headline"><?php $this->title() ?></h3>
        <div class="post-content" itemprop="articleBody">
            <?php $this->content(); ?>
        </div>
    </article>
</div>
<!-- end #main-->
<div class="post-near">
    <ul>
        <li>&larr; <?php $this->thePrev('%s','沉鱼落雁 闭月羞花 ^_^'); ?></li>
        <li>&rarr; <?php $this->theNext('%s','所谓伊人 在水一方 ^_^'); ?></li>
    </ul>
</div>
<div class=" floatr"><?php AnotherLike_Plugin::theLike(); ?></div>
<?php $this->need('footer.php'); ?>
