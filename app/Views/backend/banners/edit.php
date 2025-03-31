<?php $this->extend('Layout'); ?>

<?php $this->section('content'); ?>
    <main class="container-wrap">
        <div class="container-main">
            <div class="form-wrap">
                <form action="<?php echo url_to('Backend\Banners::edititem'); ?>" method="post" id="myForm"  enctype="multipart/form-data">
                    <div class="form-main">
                        <div class="form-title">
                            <h1>修改Banners資訊</h1>
                            <input type="hidden" name="datasn" value="<?php echo $Data['b_Id']; ?>" />
                        </div>
                        <div class="form-content">
                            <div class="form-flex">
                                
										<div class="form-img">
											<div class="img-upload">
												<div class="upload">
													<input type="file" onchange="readURL(this);" name="Ppic" accept=".jpg , .jpeg , .png">
													<img id="previewImg" src="<?php 
													echo ($Data['b_FileName']<>"")? ('/public/images/banners/'.$Data['b_FileName']):('/image/backend/imgfile.png');?>">
												</div>
											</div>
										</div>
										<div class="form-group">
										<div class="form-col">
										<div class="form-input">
                                            <label for="">名稱</label>
                                            <div class="input">
                                                <input type="text" name="b_Name" required  value="<?php echo old('b_Name') ?? $Data['b_Name']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-input">
                                            <label for="">說明</label>
                                            <div class="input">
                                                <input type="text" name="b_Description" required  value="<?php echo old('b_Description') ?? $Data['b_Description']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-input">
                                            <label for="">連結</label>
                                            <div class="input">
                                                <input type="text" name="b_Link" required  value="<?php echo old('b_Link') ?? $Data['b_Link']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-input">
                                            <label for="">排序</label>
                                            <div class="input">
                                                <input type="text" name="b_Sequence" required  value="<?php echo old('b_Sequence') ?? $Data['b_Sequence']; ?>" pattern="^[0-9]+$">
                                            </div>
                                        </div>
                                        <div class="form-input">
                                            <label for="">顯示</label>
                                            <div class="input">
                                                <select name="b_IsShow" required>
												<option value="1" <?php if ($Data['b_IsShow']==1){echo "selected";}?>>顯示</option>
												<option value="0" <?php if ($Data['b_IsShow']==0){echo "selected";}?>>不顯示</option>
                                                </select>
                                            </div>
                                        </div>
										 </div>
                                </div>
									
                                    
                               
                            </div>
                        </div>
                    </div>
                    <div class="form-btn">
                        <button class="btn-cancel" type="button" onclick="history.back();">返回</button>
                        <button class="btn-submit" type="submit">儲存</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

<?php $this->endSection();?>