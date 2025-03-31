<?php $this->extend('Layout'); ?>

<?php $this->section('content'); ?>
    <main class="container-wrap">
        <div class="container-main">
            <div class="form-wrap">
                <form action="<?php echo url_to('Backend\ProductSC::edititem'); ?>" method="post" id="myForm"  enctype="multipart/form-data">
                    <div class="form-main">
                        <div class="form-title">
                            <h1>修改產品小分類</h1>
<?php //print_r($Data->psc_Id);exit();?>  							
                            <input type="hidden" name="datasn" value="<?php echo $Data->psc_Id; ?>" />
                        </div>
                        <div class="form-content">
                            <div class="form-flex">
                              
										<div class="form-img">
											<div class="img-upload">
												<div class="upload">
													<input type="file" onchange="readURL(this);" name="Ppic" accept=".jpg , .jpeg , .png">
													<img id="previewImg" src="<?php echo ($Data->psc_Image<>"")? ('/public/images/products/categories/'.$Data->psc_Image):('/image/backend/imgfile.png');?>">
												</div>
											</div>
										</div>
										<div class="form-group">
										<div class="form-col">
										<div class="form-input">
                                            <label for="">大分類名稱</label>
                                            <div class="input">
												<select name="psc_pmc_Id" required>
												<?php foreach($MCData as $data):	?>
                                                <option value="<?php echo $data["pmc_Id"];?>" <?php if($data["pmc_Id"]==$Data->psc_pmc_Id){echo "selected";}?>><?php echo $data["pmc_Name"];?></option>
												<?php endforeach; ?>												
                                                </select>
                                            </div>
                                        </div>
										<div class="form-input">
                                            <label for="">小分類名稱</label>
                                            <div class="input">
                                                <input type="text" name="psc_Name" required  value="<?php echo old('psc_Name') ?? $Data->psc_Name; ?>">
                                            </div>
                                        </div>
                                        <div class="form-input">
                                            <label for="">排序</label>
                                            <div class="input">
                                                <input type="text" name="psc_Sort" required  value="<?php echo old('psc_Sort') ?? $Data->psc_Sort; ?>" pattern="^[0-9]+$">
                                            </div>
                                        </div>
                                        <div class="form-input">
                                            <label for="">顯示</label>
                                            <div class="input">
                                                <select name="psc_Enabled" required>
												<option value="1" <?php if ($Data->psc_Enabled==1){echo "selected";}?>>顯示</option>
												<option value="0" <?php if ($Data->psc_Enabled==0){echo "selected";}?>>不顯示</option>
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