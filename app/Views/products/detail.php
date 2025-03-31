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
		<div id="primary">
			<div class="entry-content">
				<div class="wpb-content-wrapper">
					<div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid single-service-page sectpad">
						<div class="single-side-left wpb_column vc_column_container vc_col-sm-4">
							<div class="vc_column-inner">
								<div class="wpb_wrapper">
									<div class="single-sidebar-widget">
										<!-- <div class="special-links">
											<ul>
												<li><a href="index.htm">行動電話連接元件</a></li>
												<li>
													<a href="../oil-and-lubricant/index.htm">高頻同軸連接元件</a>
												</li>
												<li>
													<a href="../meterial-engineering/index.htm">IC 插座</a>
												</li>
												<li>
													<a href="../mechanical-engineering/index.htm">PoGo Pin 接點連接器</a>
												</li>
												<li>
													<a href="../chemical-research/index.htm">通信面板夾線端子</a>
												</li>
												<li>
													<a href="../alternate-energy/index.htm">電路板連接元件</a>
												</li>
												<li>
													<a href="../agricultural-processing/index.htm">RJ45 網路連接器</a>
												</li>
											</ul>
										</div> -->
									</div>

									<div class="single-sidebar-widget">
										<div class="single-service-pdf">
											<h3><a href="#">下載手冊</a></h3>
										</div>
									</div>

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
										<!-- Banner image -->
										<div class="image-box clearfix resp-img-box-sol wpb_column vc_column_container vc_col-sm-12">
											<div class="vc_column-inner">
												<div class="wpb_wrapper">
													<div class="wpb_single_image wpb_content_element vc_align_center">
														<figure class="wpb_wrapper vc_figure">
															<div class="vc_single_image-wrapper vc_box_border_grey">
																<img fetchpriority="high"
																	decoding="async"
																	width="1200"
																	height="150"
																	src="/public/images/products/Product/<?= $data['p_Image'] ?>"
																	class="vc_single_image-img attachment-full"
																	alt="<?= $data['p_Name'] ?>" />
															</div>
														</figure>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="vc_row wpb_row vc_inner vc_row-fluid">
										<div class="wpb_column vc_column_container vc_col-sm-12">
											<div class="vc_column-inner">
												<div class="wpb_wrapper">
													<!-- Main title -->
													<h2 class="wpb_heading" style="color: #666; border-bottom: 2px solid #ffc107; padding-bottom: 10px; margin-bottom: 20px;"><?= $data['p_Name'] ?></h2>

													<!-- Subtitle -->
													<!-- <h3 class="wpb_heading" style="color: #666; font-weight: normal; margin-bottom: 20px;"></h3> -->

													<!-- Product title -->
													<!-- <h4 class="wpb_heading" style="color: #333; margin-bottom: 30px;">3976.99.0030.001 MINIATURE STRAIGHT FEMALE SMD RF ANTENNA SWITCH</h4> -->

													<div class="vc_row wpb_row vc_inner vc_row-fluid">
														<!-- Features section - Left Column -->
														<div class="wpb_column vc_column_container vc_col-sm-9">
															<div class="vc_column-inner">
																<div class="wpb_wrapper">
																	<div class="wpb_text_column wpb_content_element">
																		<div class="wpb_wrapper">
																			<!-- <h5 style="color: #666; margin-bottom: 15px;">Features</h5> -->
																			<!-- <ul style="list-style: none; padding-left: 0; color: #666;">
																				<li style="margin-bottom: 8px;">• Ultra low height</li>
																				<li style="margin-bottom: 8px;">• 10,000 mating cycles</li>
																				<li style="margin-bottom: 8px;">• To application matched thickness of surface layers</li>
																				<li style="margin-bottom: 8px;">• Robust design due to deep drawn housing</li>
																				<li style="margin-bottom: 8px;">• Excellent guiding feature</li>
																				<li style="margin-bottom: 8px;">• Size：D：3.1，H：1.75</li>
																			</ul> -->
																			<?= nl2br($data['p_Description'])  ?>
																		</div>
																	</div>
																</div>
															</div>
														</div>

														<!-- Product image - Right Column -->
														<!-- <div class="wpb_column vc_column_container vc_col-sm-3">
															<div class="vc_column-inner">
																<div class="wpb_wrapper">
																	<div class="wpb_single_image wpb_content_element vc_align_center">
																		<figure class="wpb_wrapper vc_figure">
																			<div class="vc_single_image-wrapper vc_box_border_grey" style="border: 1px solid #ddd; padding: 10px;">
																				<img width="200"
																					height="200"
																					src="/public/images/03_product/03-2/img_01.png"
																					class="vc_single_image-img"
																					alt="RF Antenna Switch" />
																			</div>
																		</figure>
																	</div>
																</div>
															</div>
														</div> -->
													</div>

													<!-- Action buttons -->
													<!-- <div class="wpb_text_column wpb_content_element">
														<div class="wpb_wrapper links">
															<a href="#" style="color: #0066cc; text-decoration: none; margin-right: 15px;">詳細資料</a>
															<a href="#" style="color: #0066cc; text-decoration: none;">下載</a>
														</div>
													</div> -->
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