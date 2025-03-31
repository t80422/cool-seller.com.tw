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

									<div class="single-sidebar-widget">
										<div class="single-service-pdf">
											<h3>
												<a href="#">下載手冊</a>
											</h3>
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
									<!-- 搜尋區塊 -->
									<div class="vc_row wpb_row vc_inner vc_row-fluid">
										<div class="wpb_column vc_column_container vc_col-sm-12">
											<div class="vc_column-inner">
												<div class="wpb_wrapper">
													<!-- 圖片區塊 -->
													<div class="child-page-wrapper" style="margin-top: 40px">
														<!-- 第一排 3張圖片 -->
														<?php
														$productGroups = array_chunk($products, 3);
														foreach ($productGroups as $group):
														?>
															<div class="grid-wrapper grid-3-columns grid-row">
																<?php foreach ($group as $product): ?>
																	<div class="our-pro-slider grid-sm-4">
																		<div class="pro-sliders">
																			<div class="item item-client">
																				<div class="post-image our-t-client">
																					<a href="/products/detail/<?= $product['p_Id'] ?>" class="post-image our-t-client">
																						<img
																							src="<?= base_url('public/images/products/Product/' . $product['p_Image']) ?>"
																							alt="<?= $product['p_Name'] ?>"
																							title="<?= $product['p_Name'] ?>"
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

											<!--分頁-->
											<div class="row" style="margin: 60px 0 40px 0;">
												<div class="col-12 d-flex justify-content-center">
													<nav aria-label="產品分頁導航">
														<ul class="pagination">
															<?php
															// 構建分頁的基本URL，保留所有搜尋參數
															$baseUrl = '/products/global-search/?';
															$queryParams = $_GET;
															unset($queryParams['page']); // 移除現有的page參數
															if (!empty($queryParams)) {
																$baseUrl .= http_build_query($queryParams) . '&';
															}
															?>

															<!-- 上一頁按鈕 -->
															<li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
																<a class="page-link" href="<?= $baseUrl ?>page=<?= $page - 1 ?>" aria-label="Previous">
																	<span aria-hidden="true">&laquo;</span>
																</a>
															</li>

															<?php
															// 確定要顯示的頁碼範圍
															$startPage = max(1, $page - 2);
															$endPage = min($totalPages, $page + 2);

															// 確保總是顯示至少5個頁碼（如果總頁數足夠）
															if ($endPage - $startPage + 1 < 5 && $totalPages >= 5) {
																if ($startPage == 1) {
																	$endPage = min($totalPages, 5);
																} else {
																	$startPage = max(1, $totalPages - 4);
																}
															}

															// 顯示第一頁（如果不在範圍內）
															if ($startPage > 1): ?>
																<li class="page-item">
																	<a class="page-link" href="<?= $baseUrl ?>page=1">1</a>
																</li>
																<?php if ($startPage > 2): ?>
																	<li class="page-item disabled">
																		<span class="page-link">...</span>
																	</li>
																<?php endif; ?>
															<?php endif; ?>

															<!-- 顯示頁碼 -->
															<?php for ($i = $startPage; $i <= $endPage; $i++): ?>
																<li class="page-item <?= $i == $page ? 'active' : '' ?>">
																	<a class="page-link" href="<?= $baseUrl ?>page=<?= $i ?>"><?= $i ?></a>
																</li>
															<?php endfor; ?>

															<!-- 顯示最後一頁（如果不在範圍內） -->
															<?php if ($endPage < $totalPages): ?>
																<?php if ($endPage < $totalPages - 1): ?>
																	<li class="page-item disabled">
																		<span class="page-link">...</span>
																	</li>
																<?php endif; ?>
																<li class="page-item">
																	<a class="page-link" href="<?= $baseUrl ?>page=<?= $totalPages ?>"><?= $totalPages ?></a>
																</li>
															<?php endif; ?>

															<!-- 下一頁按鈕 -->
															<li class="page-item <?= $page >= $totalPages ? 'disabled' : '' ?>">
																<a class="page-link" href="<?= $baseUrl ?>page=<?= $page + 1 ?>" aria-label="Next">
																	<span aria-hidden="true">&raquo;</span>
																</a>
															</li>
														</ul>
													</nav>
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
		</div>
	</div>
</div>

<?= $this->endSection() ?>