<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
            <div class="store">
				<a href="/about.html"><img class="store-img" src="/assets/img/cute.svg" alt="必须优秀 MUST.BEST"></a>
				<div class="store-info">
				    <a href="/">
					<h3>MUST.BEST</h3>
					<p>吾日三省吾身，必须优秀</p></a>
					<p>&copy; <?php echo date('Y'); ?>  MUST.BEST & THEME BY XIO.NG </p>
				</div>
			    
			</div><!-- / store -->
		</div><!-- / inner -->
			
	</div>
	<div class="menu-frame mask"></div>
	<div class="hand-back"></div>
	<div class="hand-front"></div>
</div>
<div style="display:none"><script type="text/javascript" src="https://s13.cnzz.com/z_stat.php?id=1261978160&web_id=1261978160"></script></div>
<script src='/assets/js/flower.js'></script>
<script src='/assets/js/jquery.min.js'></script>
<script src="/assets/js/custom.js"></script>
<script src="https://cdn.bootcss.com/jquery.pjax/2.0.1/jquery.pjax.min.js"></script>
<script>
    $(document).pjax('a[target!=_blank]', '#goonMusic', {fragment: '#goonMusic'});
    $(document).on('pjax:complete', function() {
        var th = $(".post-like");
        var id = th.attr('data-pid');
        var cookies = $.macaroon('_syan_like') || "";
        if (-1 !== cookies.indexOf("," + id + ",")) {
            th.find('div.fave').toggleClass("done");
        }});
        $(".post-like").on("click", function()
        });
    });
</script>
<?php $this->footer(); ?>
</body>
</html>
