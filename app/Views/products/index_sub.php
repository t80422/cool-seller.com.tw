<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>

<div id="content" class="site-content site">
	<div class="page-header-wrap clearfix ind_row_parallax" style="background-color: #13314c; color: #ffffff">
		<div class="inner-banner2 clearfix" style="background-image: url(/public/images/about/bg.png)">
			<div class="container clearfix">
				<h2 class="page-title" style="color: #ffffff">公司產品</h2>
			</div>
		</div>
	</div>

	<?= $this->include('partials/_breadcumb'); ?>

	<div class="container">
		<div id="primary" class="">
			<div class="entry-content">
				<div class="wpb-content-wrapper">
					<div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid single-service-page sectpad">
						<div class="single-side-left wpb_column vc_column_container vc_col-sm-4">
							<div class="vc_column-inner">
								<div class="wpb_wrapper">
									<div class="single-sidebar-widget">
										<div class="special-links">
											<ul>
												<?php foreach ($mains as $main): ?>
													<li>
														<a href="/products/index_sub/<?= $main['pmc_Id'] ?>"><?= $main['pmc_Name'] ?></a>
													</li>
												<?php endforeach; ?>
											</ul>
										</div>
									</div>

									<!-- <div class="single-sidebar-widget">
										<div class="single-service-pdf">
											<h3>
												<a href="#">下載手冊</a>
											</h3>
										</div>
									</div> -->

									<div class="wpb_text_column wpb_content_element">
										<div class="wpb_wrapper">
											<div class="single-sidebar-widget">
												<div class="single-service-contact">
													<h3>聯絡我們幫忙?</h3>

													<p>
														如您對本公司產品有任何疑問或想進一步了解。
														您可以將問題以電話或發送電子郵件給我們，專員將竭誠的為您服務解說。
													</p>

													<p>
														<a href="/contact">
															聯絡我們
															<i class="fa fa-angle-double-right"></i>
														</a>
													</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="content-right pull-right tab-content wpb_column vc_column_container vc_col-sm-8">
							<div class="vc_column-inner">
								<div class="wpb_wrapper">
									<div class="vc_row wpb_row vc_inner vc_row-fluid">
										<!-- 調整圖片容器寬度為 12 列 -->
										<div class="image-box clearfix resp-img-box-sol wpb_column vc_column_container vc_col-sm-12">
											<div class="vc_column-inner">
												<div class="wpb_wrapper">
													<div class="wpb_single_image wpb_content_element vc_align_center">
														<figure class="wpb_wrapper vc_figure">
															<div
																class="vc_single_image-wrapper vc_box_border_grey">
																<img
																	fetchpriority="high"
																	decoding="async"
																	width="1200"
																	height="600"
																	src="<?= base_url('public/images/products/MainCategories/' . $mainProduct['pmc_ImageFile']) ?>"
																	class="vc_single_image-img attachment-full"
																	alt=""
																	title="<?= $mainProduct['pmc_Name'] ?>" />
															</div>
														</figure>
													</div>
												</div>
											</div>
										</div>
									</div>

									<p><?= $mainProduct['pmc_Desc'] ?></p>

									<!-- 搜尋區塊 -->
									<div class="vc_row wpb_row vc_inner vc_row-fluid">
										<div class="wpb_column vc_column_container vc_col-sm-12">
											<div class="vc_column-inner">
												<div class="wpb_wrapper">
													<div class="child-page-wrapper" style="margin-top: 40px">
														<!-- 第一排 3張圖片 -->
														<?php
														$subProductGroups = array_chunk($subProducts, 3);
														foreach ($subProductGroups as $group):
														?>
															<div class="grid-wrapper grid-3-columns grid-row">
																<?php foreach ($group as $subProduct): ?>
																	<div class="our-pro-slider grid-sm-4">
																		<div class="pro-sliders">
																			<div class="item item-client">
																				<div class="post-image our-t-client">
																					<a href="/products/index/<?= $subProduct['psc_Id'] ?>" class="post-image our-t-client">
																						<img
																							src="<?= base_url('public/images/products/SubCategories/' . $subProduct['psc_Image']) ?>"
																							alt="<?= $subProduct['psc_Name'] ?>"
																							title="<?= $subProduct['psc_Name'] ?>"
																							width="340"
																							height="246" />
																					</a>
																				</div>
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
					<div class="vc_row-full-width vc_clearfix"></div>
				</div>
			</div>
			<!-- .entry-content -->
			<!-- #main -->
		</div>
		<!-- #primary -->
	</div>
</div>

<?= $this->endSection() ?>