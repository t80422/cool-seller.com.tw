<?php $this->extend('Layout'); ?>

<?php $this->section('content'); ?>

    <main class="container-wrap">
        <div class="container-main">
            <div class="form-wrap">
                <form action="<?php echo url_to('Backend\Product::edititem'); ?>" id="myForm" method="post" enctype="multipart/form-data">
                    <div class="form-main">
                        <div class="form-title">
                            <h1>修改產品資訊</h1>
                            <input type="hidden" name="Psn" value="<?php echo $Product['p_sn']; ?>" />
                        </div>
                        <div class="form-content">
                            <div class="form-flex">
                                <div class="form-img">
                                    <div class="img-upload">
                                        <div class="upload">
                                            <input type="file" onchange="readURL(this);" name="Ppic" accept=".jpg , .jpeg , .png">
                                            <img id="previewImg" src="<?php echo $Product['p_pic'] ?? "/image/imgfile.png"; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-col">
                                        <div class="form-input">
                                            <label for="">單位名稱</label>
                                            <div class="input">
                                                <input type="text" name="Pname" required value="<?php echo $Product['p_name']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-input">
                                            <label for="">廠商碼</label>
                                            <div class="input">
                                                <input type="text" name="PScode" required value="<?php echo $Product['p_store_code']; ?>" pattern="^[A-Za-z0-9]+$">
                                            </div>
                                        </div>
                                        <div class="form-input">
                                            <label for="">條碼</label>
                                            <div class="input">
                                                <input type="text" name="Pbarcode" required value="<?php echo $Product['p_barcode']; ?>" pattern="^\d+$">
                                            </div>
                                        </div>
                                        <div class="form-input">
                                            <label for="">庫存</label>
                                            <div class="input">
                                                <input type="text" name="Pstock" required value="<?php echo $Product['p_stock']; ?>" pattern="^\d+$">
                                            </div>
                                        </div>
                                        <div class="form-input">
                                            <label for="">價格(未稅)</label>
                                            <div class="input">
                                                <input type="text" name="Pprice1" required value="<?php echo $Product['p_price']; ?>" pattern="^\d+$">
                                                <span>元</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-col">
                                        <div class="form-input">
                                            <label for="">單位</label>
                                            <div class="input">
                                                <input type="text" name="Punit" required value="<?php echo $Product['p_unit']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-input">
                                            <label for="">店內碼</label>
                                            <div class="input">
                                                <input type="text" name="PPcode" required value="<?php echo $Product['p_product_code']; ?>" pattern="^[A-Za-z0-9]+$">
                                            </div>
                                        </div>
                                        <div class="form-input">
                                            <label for="">商品儲位</label>
                                            <div class="input">
                                                <input type="text" name="Pstorage" required value="<?php echo $Product['p_storage']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-input">
                                            <label for="">建檔日期</label>
                                            <div class="input">
                                                <input type="text" readonly value="<?php echo date('Y-m-d',strtotime($Product['p_create_time'])); ?>">
                                            </div>
                                        </div>
                                        <div class="form-input">
                                            <label for="">價格(含稅)</label>
                                            <div class="input">
                                                <input type="text" name="Pprice2" readonly value="<?php echo $Product['p_price2']; ?>">
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-btn">
                        <button class="btn-cancel" type="button" onclick='history.back()'>返回</button>
                        <button class="btn-submit" type="submit">儲存</button>                        
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
        $(function(){
            $('input[name="Pprice1"]').on('input',function(){
                $('input[name="Pprice2"]').val(Math.round(($(this).val() * 1.05) * 100) / 100)
            })
        })
    </script>

<?php $this->endSection();?>


