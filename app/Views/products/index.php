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
												<?php foreach ($subProducts as $subP): ?>
													<li>
														<a href="/products/index/<?= $subP['psc_Id'] ?>"><?= $subP['psc_Name'] ?></a>
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
									<div class="vc_row wpb_row vc_inner vc_row-fluid">
										<!-- 調整圖片容器寬度為 12 列 -->
										<div class="image-box clearfix resp-img-box-sol wpb_column vc_column_container vc_col-sm-12">
											<div class="vc_column-inner">
												<div class="wpb_wrapper">
													<div class="wpb_single_image wpb_content_element vc_align_center">
														<figure class="wpb_wrapper vc_figure">
															<div class="vc_single_image-wrapper vc_box_border_grey">
																<img
																	fetchpriority="high"
																	decoding="async"
																	width="1200"
																	height="600"
																	src="<?= base_url('public/images/products/SubCategories/' . $subProduct['psc_Image']) ?>"
																	class="vc_single_image-img attachment-full"
																	alt=""
																	title="<?= $subProduct['psc_Name'] ?>" />
															</div>
														</figure>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- 搜尋與篩選區塊 -->
									<div class="vc_row wpb_row vc_inner vc_row-fluid">
										<div class="wpb_column vc_column_container vc_col-sm-12">
											<div class="vc_column-inner">
												<div class="wpb_wrapper">
													<!-- 搜尋框和標籤篩選表單 -->
													<form action="/produ
													cts/index/<?= $subProduct['psc_Id'] ?>" method="get">
														<!-- 搜尋框 -->
														<div class="search-container" style="text-align: center;margin: 40px auto;max-width: 1200px;position: relative;">
															<input
																id="product-search-input"
																name="keyword"
																type="text"
																placeholder="請輸入關鍵字搜尋"
																value="<?= $keyword ?? '' ?>"
																style="width: 100%;
																		padding: 10px 40px 10px 15px;
																		border: 1px solid #ddd;
																		border-radius: 4px;
																		font-size: 16px;box-sizing:
																		border-box;" />

															<button
																type="submit"
																style="position: absolute;
																			right: 10px;
																			top: 50%;
																			transform: translateY(-50%);
																			border: none;
																			background: none;
																			cursor: pointer;">
																<i class="fa fa-search" style="color: #666"></i>
															</button>
														</div>

														<!-- 標籤篩選區塊 -->
														<div class="filter-tags-container">
															<h4 style="margin-bottom: 15px;">按標籤篩選：</h4>

															<div class="tag-checkboxes" style="display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 20px;">
																<?php foreach ($tags as $tag): ?>
																	<?php
																	// 判斷標籤是否被選中
																	$isSelected = in_array($tag, $selectedTags ?? []);
																	// 設置選中標籤的樣式
																	$bgColor = $isSelected ? '#e6f2f9' : '#f8f8f8';
																	$borderColor = $isSelected ? '#88c6e7' : '#ddd';
																	?>
																	<label style="display: inline-flex;
																		align-items: center;
																		margin-right: 5px;
																		padding: 4px 8px;
																		background: <?= $bgColor ?>;
																		border: 1px solid <?= $borderColor ?>;
																		border-radius: 4px;
																		font-size: 13px;
																		cursor: pointer;">

																		<input type="checkbox"
																			name="tags[]"
																			value="<?= $tag ?>"
																			<?= $isSelected ? 'checked' : '' ?>
																			class="tag-checkbox"
																			style="margin-right: 5px;">
																		<?= $tag ?>
																	</label>
																<?php endforeach; ?>
															</div>

															<!-- 篩選按鈕 -->
															<div style="display: flex; justify-content: space-between; margin-bottom: 20px;">
																<button type="submit" style="background: #1a73e8; color: white; border: none; border-radius: 4px; padding: 8px 15px; cursor: pointer; font-size: 14px;">
																	套用篩選
																</button>

																<!-- 清除篩選按鈕 (有選擇時顯示) -->
																<?php if (!empty($keyword) || !empty($selectedTags)): ?>
																	<a href="/products/index/<?= $subProduct['psc_Id'] ?>" style="display: inline-block; background: #f2f2f2; color: #666; border: none; border-radius: 4px; padding: 8px 15px; text-decoration: none; font-size: 14px;">
																		清除篩選
																	</a>
																<?php endif; ?>
															</div>
														</div>
													</form>
													<!-- 產品列表 -->
													<div class="child-page-wrapper" style="margin: 40px 0 60px 0; min-height: 400px;">
														<?php if (!empty($products)): ?>
															<?php
															$productsGroups = array_chunk($products, 3);
															foreach ($productsGroups as $group):
															?>
																<div class="grid-wrapper grid-3-columns grid-row" style="margin-bottom: 30px;">
																	<?php foreach ($group as $product): ?>
																		<div class="our-pro-slider grid-sm-4" style="margin-bottom: 20px;">
																			<div class="pro-sliders">
																				<div class="item item-client">
																					<div class="post-image our-t-client" style="border: 1px solid #eee; border-radius: 8px; overflow: hidden;">
																						<a href="/products/detail/<?= $product['p_Id'] ?>" class="post-image our-t-client">
																							<img
																								src="<?= base_url('public/images/products/product/' . $product['p_Image']) ?>"
																								alt="<?= $product['p_Name'] ?>"
																								title="<?= $product['p_Name'] ?>"
																								width="340"
																								height="246"
																								style="object-fit: cover; width: 100%; height: 246px;" />
																						</a>
																						<!-- 添加產品名稱顯示 -->
																						<div style="text-align: center; padding: 15px; background: #fff;">
																							<h4 style="margin: 0; font-size: 16px; line-height: 1.4;"><?= $product['p_Name'] ?></h4>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																	<?php endforeach; ?>
																</div>
															<?php endforeach; ?>
														<?php else: ?>
															<div style="text-align: center; padding: 40px 0;">
																<p style="color: #666; font-size: 16px;">暫無相關產品</p>
															</div>
														<?php endif; ?>
													</div>
												</div>
											</div>
											<!-- 分頁 -->
											<div class="row" style="margin: 60px 0 40px 0;">
												<div class="col-12 d-flex justify-content-center" style="display: flex; justify-content: center;">
													<nav aria-label="產品分頁導航">
														<ul class="pagination">
															<?php
															// 構建分頁的基本URL，保留所有搜尋參數
															$baseUrl = '/products/index/' . $subProduct['psc_Id'] . '?';
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

<?= $this->section('scripts') ?>
<script>
	$(function() {
		// 標籤點擊效果增強
		$('.tag-checkbox').on('change', function() {
			const label = $(this).closest('label');

			if (this.checked) {
				// 選中狀態
				label.css({
					'background-color': '#e6f2f9',
					'border-color': '#88c6e7'
				});
			} else {
				// 未選中狀態
				label.css({
					'background-color': '#f8f8f8',
					'border-color': '#ddd'
				});
			}
		});
	});
</script>
<?= $this->endSection() ?>