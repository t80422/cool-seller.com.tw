<div class="breadcumb-wrapper">
		<div class="container clearfix">
			<?php foreach ($breadcrumbs as $index => $breadcrumb): ?>
				<?php if ($index > 0): ?>
					<span class="font-awe">&#xF105;</span>
				<?php endif; ?>

				<span property="itemListElement" typeof="ListItem">
					<?php if (isset($breadcrumb['active']) && $breadcrumb['active']): ?>
						<span property="name"><?= $breadcrumb['name'] ?></span>
					<?php else: ?>
						<a property="item" typeof="WebPage" href="<?= $breadcrumb['url'] ?>" class="<?= $index === 0 ? 'home' : '' ?>">
							<span property="name"><?= $breadcrumb['name'] ?></span>
						</a>
					<?php endif; ?>
					<meta property="position" content="<?= $breadcrumb['position'] ?>" />
				</span>
			<?php endforeach; ?>
		</div>
	</div>