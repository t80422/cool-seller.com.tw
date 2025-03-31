<?php $this->extend('Layout'); ?>

<?php $this->section('content'); ?>
    <main class="container-wrap">
        <div class="container-main">
            <div class="form-wrap">
                <form action="<?php echo url_to('Backend\User::edititem'); ?>" method="post" id="myForm">
                    <div class="form-main">
                        <div class="form-title">
                            <h1>修改帳號資訊</h1>
                            <input type="hidden" name="Usn" value="<?php echo $User['u_sn']; ?>" />
                        </div>
                        <div class="form-content">
                            <div class="form-flex">
                                <div class="form-col">
                                    <div class="form-input">
                                        <label for="">名稱</label>
                                        <div class="input">
                                            <input type="text" name="name" required value="<?php echo old('name') ?? $User['u_name']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-input">
                                        <label for="">帳號</label>
                                        <div class="input">
                                            <input type="text" name="account" required value="<?php echo old('account') ?? $User['u_account']; ?>" pattern="^[A-Za-z0-9]+$">
                                        </div>
                                    </div>
                                    <div class="form-input">
                                        <label for="">密碼</label>
                                        <div class="input">
                                            <input type="text" name="pwd" required value="<?php echo old('pwd') ?? $User['u_pwd']; ?>" pattern="^[A-Za-z\d$@$!%*?&]+$">
                                        </div>
                                    </div>
                                    <div class="form-input">
                                        <label for="">信箱</label>
                                        <div class="input">
                                            <input type="email" name="email" required value="<?php echo old('email') ?? $User['u_email']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-input">
                                        <label for="">權限</label>
                                        <div class="select">
                                            <select name="power" required>
                                                <option value="1" <?php if((old('power') ?? $User['u_power']) == 1) { echo 'selected'; }?>>一般使用者</option>
                                                <option value="99" <?php if((old('power') ?? $User['u_power']) == 99) { echo 'selected'; }?>>管理者</option>
                                            </select>
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