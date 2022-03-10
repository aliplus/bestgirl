<?php
/**
 * 这是一套新皮肤must.best
 * 
 * @package Typecho Best Theme 
 * @author Xio.ng
 * @version 1.0
 * @link https://xio.ng
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>
 
<div class="menu-list" id="main" role="main">
	<?php while($this->next()): ?>
        <article itemscope itemtype="http://schema.org/BlogPosting">
			<div class="menu-item">
				<h3 class="menu-name"><a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title(11,'..'); ?></a></h3>
                <div class="menu-price">
				   <?php AnotherLike_Plugin::theLike(); ?>
                </div>
			</div>
	    </article>
	<?php endwhile; ?>
</div>
<!-- / menu-list -->

<?php $this->pageNav('&laquo;', '&raquo;'); ?>
<?php $this->need('footer.php'); ?>