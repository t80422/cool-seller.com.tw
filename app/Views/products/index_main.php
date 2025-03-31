<!-- 前台產品主分類 -->
<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>

<div id="content" class="site-content site">
	<div class="page-header-wrap clearfix ind_row_parallax" style="background-color: #13314c; color: #ffffff">
		<div class="inner-banner2 clearfix" style="background-image: url(/public/images/about/bg.png);">
			<div class="container clearfix">
				<h2 class="page-title" style="color: #ffffff">公司產品</h2>
			</div>
		</div>
	</div>
	
	<?= $this->include('partials/_breadcumb'); ?>

	<div class="container">
		<div id="primary" class="inner_page_space">
			<div class="entry-content clearfix">
				<div class="wpb-content-wrapper">
					<div class="vc_row-full-width vc_clearfix"></div>

					<div class="vc_row wpb_row vc_row-fluid our-client vc_custom_1634218900587">
						<div class="wpb_column vc_column_container vc_col-sm-12">
							<div class="vc_column-inner">
								<div class="wpb_wrapper">
									<div class="custom-heading wpb_content_element"></div>

									<div class="child-page-wrapper">
										<?php
										// 將產品分組，每組最多3個產品
										$productGroups = array_chunk($datas, 3);
										// 遍歷每組產品
										foreach ($productGroups as $group):
										?>
											<div class="grid-wrapper grid-3-columns grid-row">
												<?php foreach ($group as $product): ?>
													<div class="our-pro-slider grid-sm-4">
														<div class="pro-sliders">
															<div class="item item-client">
																<a href="<?= site_url('products/index_sub/') . $product['pmc_Id'] ?>" class="post-image our-t-client">
																	<img src="<?= base_url('public/images/products/MainCategories/' . $product['pmc_ImageFile']) ?>"
																		alt="<?= $product['pmc_Name'] ?>"
																		width="340"
																		height="246"
																		title="<?= $product['pmc_Name'] ?>" />
																</a>
															</div>
														</div>
													</div>
												<?php endforeach; ?>
											</div>
										<?php endforeach; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>