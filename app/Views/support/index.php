<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>

<style>
    /* 容器置中 */
    .service-table td:last-child,
    .driver-table td:last-child,
    .download-table td:last-child {
        text-align: center !important;
    }

    /* 下載連結樣式 */
    .download-link {
        color: #6B93CB !important;
        text-decoration: none !important;
        border-bottom: 1px solid #6B93CB !important;
        padding-bottom: 2px;
        display: inline-block;
        width: fit-content;
        margin: 0 auto;
    }

    .download-link:hover {
        opacity: 0.8;
    }

    .wpb_animate_when_almost_visible {
        opacity: 1;
    }

    .service-table-container {
        background-color: #f7f7f7;
        padding: 0;

    }

    .service-header {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
    }

    .service-header .main-title {
        font-weight: normal;
        color: #000000;
    }

    .service-header .sub-titles {
        display: flex;
        gap: 50px;
    }

    .service-header .sub-titles span {
        color: #0088cc;
    }

    .service-table td,
    .driver-table td,
    .download-table td {
        border: 1px solid #ddd !important;
        background: #fff;
    }

    .service-table tr:first-child td,
    .driver-table tr:first-child td,
    .download-table tr:first-child td {
        border-top: 1px solid #ddd !important;
    }

    .service-table,
    .driver-table,
    .download-table {
        border-collapse: collapse;
        border-spacing: 0;
    }

    .service-table tr:hover td,
    .driver-table tr:hover td,
    .download-table tr:hover td {
        background-color: #f9f9f9;
    }

    .service-table,
    .driver-table,
    .download-table {
        background-color: #fff;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .service-header,
    .driver-title {
        background-color: #f7f7f7;
        padding: 15px 20px;
        border: 1px solid #ddd;
        border-bottom: none;
    }


    .service-table {
        width: 100%;
        border-collapse: collapse;
        background-color: #f7f7f7;
    }

    .service-table td {
        padding: 12px 20px;
        border: none;
        border-bottom: 1px solid #ddd;
    }

    .service-table tr:last-child td {
        border-bottom: none;
    }

    .service-table tr:nth-child(even) {
        background-color: #ffffff;
    }

    .service-table tr td:first-child {
        width: 25%;
    }

    .service-table tr td:nth-child(2) {
        width: 35%;
    }

    .service-table tr td:nth-child(3) {
        width: 30%;
        color: #666;
    }

    .service-table tr td:last-child {
        width: 15%;
        text-align: center;
    }

    .download-icon {
        color: #0088cc;
        font-size: 20px;
    }

    .driver-table-container {
        background-color: #f7f7f7;

    }

    .driver-title {
        font-weight: normal;
        color: #000000;
        text-align: center;
        position: relative;
    }

    .service-header .main-title,
    .section-title,
    .download-title {
        font-weight: normal;
        color: #000000;
        text-align: center;
    }

    .driver-table {
        width: 100%;
        border-collapse: collapse;
    }

    .driver-table td {
        padding: 12px 20px;
        border: none;
    }

    .driver-table tr td:first-child {
        width: 35%;
    }

    .driver-table tr td:nth-child(2) {
        width: 45%;
        color: #666;
    }

    .driver-table tr td:last-child {
        width: 20%;
        text-align: right;
    }

    .download-section {
        margin-bottom: 30px;
    }

    .section-container {
        background-color: #f7f7f7;

    }

    .download-table {
        width: 100%;
        border-collapse: collapse;
    }

    .download-table td {
        padding: 12px 20px;
        border: none;
    }

    .download-table tr td:first-child {
        width: 40%;
    }

    .download-table tr td:nth-child(2) {
        width: 40%;
        color: #666;
    }

    .download-table tr td:last-child {
        width: 20%;
        text-align: right;
    }
</style>

<div id="content" class="site-content site">
    <div
        class="page-header-wrap clearfix ind_row_parallax"
        style="background-color: #13314c; color: #ffffff">
        <div
            class="inner-banner2 clearfix"
            style="background-image: url(/public/images/about/bg.png)">
            <div class="container clearfix">
                <h2 class="page-title" style="color: #ffffff">技術支援</h2>
            </div>
        </div>
    </div>

    <div class="breadcumb-wrapper">
        <div class="container clearfix">
            <span property="itemListElement" typeof="ListItem">
                <a property="item" typeof="WebPage" href="/" class="home">
                    <span property="name">首頁</span>
                </a>

                <meta property="position" content="1" />
            </span>

            <span class="font-awe">&#xF105;</span>

            <span property="itemListElement" typeof="ListItem">
                <a property="item" typeof="WebPage" href="/" class="post post-page current-item" aria-current="page">
                    <span property="name">技術支援</span>
                </a>

                <meta property="position" content="2" />
            </span>
        </div>
    </div>

    <div class="container">
        <div id="primary" class="inner_page_space">
            <div class="entry-content clearfix">
                <div class="wpb-content-wrapper">
                    <div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid core-projects vc_custom_1634219289004">
                        <div class="wpb_column vc_column_container vc_col-sm-12">
                            <div class="vc_column-inner">
                                <div class="wpb_wrapper">
                                    <div class="custom-heading wpb_content_element text-center">
                                        <h2 class="" style="text-align: center;">我們公司 OUR COMPANY</h2>
                                    </div>

                                    <div class="wpb_wrapper text-center">
                                        <p style="text-align: center;">
                                            如您對本公司產品有任何疑問或想進一步了解，隨時歡迎您的指教，<br>
                                            您可以將問題以電話、傳真或發送電子郵件給我們，我們專員將竭誠的為您服務解說，謝謝。
                                        </p>
                                    </div>

                                    <div class="service-table-container" style="margin-top: 80px;">
                                        <div class="service-header" style="display: flex; justify-content: space-between; align-items: center;">
                                            <div class="main-title">產品諮詢服務</div>
                                        </div>
                                    </div>

                                    <table class="service-table">
                                        <tbody>
                                            <?php foreach ($services as $service): ?>
                                                <tr>
                                                    <td><?= $service['c_Name'] ?></td>
                                                    <td><?= $service['c_Description'] ?></td>
                                                    <td><?= $service['c_Phone'] ?> 分機 <?= $service['c_Extension'] ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>

                                <?php foreach ($dCategories as $dc): ?>
                                    <div class="driver-table-container" style="margin-top:100px;">
                                        <div class="section-container">
                                            <div class="driver-title"><?= $dc['dc_Name'] ?></div>

                                            <table class="download-table">
                                                <tbody>
                                                    <?php if (isset($dc['downloads']) && !empty($dc['downloads'])): ?>
                                                        <?php foreach ($dc['downloads'] as $download): ?>
                                                            <tr>
                                                                <td><?= $download['d_Name'] ?></td>
                                                                <td><?= $download['d_Description'] ?></td>
                                                                <td>
                                                                    <?php if (!empty($download['d_FileName'])): ?>
                                                                        <a href="<?= base_url('support/download/' . $download['d_FileName']) ?>" class="download-link">Download</a>
                                                                    <?php endif; ?>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    <?php else: ?>
                                                        <tr>
                                                            <td colspan="3">暫無數據</td>
                                                        </tr>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vc_row-full-width vc_clearfix"></div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>