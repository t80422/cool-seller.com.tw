<?php $this->extend('Layout'); ?>

<?php $this->section('content'); ?>

    <main class="container-wrap">
        <div class="container-main">
            <div class="form-wrap">
                <form action="<?php echo url_to('Backend\Banners::additem'); ?>" id="myForm" method="post" enctype="multipart/form-data">
                    <div class="form-main">
                        <div class="form-title">
                            <h1>新增Banners資訊</h1>
                        </div>
                        <div class="form-content">
                            <div class="form-flex">
                                <div class="form-img">
                                    <div class="img-upload">
                                        <div class="upload">
                                            <input type="file" onchange="readURL(this);" name="Ppic" required accept=".jpg , .jpeg , .png">
                                            <img id="previewImg" src="/image/backend/imgfile.png">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-col">
                                        <div class="form-input">
                                            <label for="">名稱</label>
                                            <div class="input">
                                                <input type="text" name="b_Name" required>
                                            </div>
                                        </div>
                                        <div class="form-input">
                                            <label for="">說明</label>
                                            <div class="input">
                                                <input type="text" name="b_Description" required>
                                            </div>
                                        </div>
                                        <div class="form-input">
                                            <label for="">連結</label>
                                            <div class="input">
                                                <input type="text" name="b_Link" required>
                                            </div>
                                        </div>
                                        <div class="form-input">
                                            <label for="">排序</label>
                                            <div class="input">
                                                <input type="text" name="b_Sequence" required pattern="^[0-9]+$">
                                            </div>
                                        </div>
                                        <div class="form-input">
                                            <label for="">顯示</label>
                                            <div class="input">
                                                <select name="b_IsShow" required>
												<option value="1" selected>顯示</option>
												<option value="0">不顯示</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-col">
                                       <div class="form-input">
                                            <label for="">建檔日期</label>
                                            <div class="input">
                                                <input type="text" value="系統自動帶入" readonly>
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


