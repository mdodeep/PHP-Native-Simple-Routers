<?php get_header(); ?>
<div class="row">
    <div class="col-xl-6 col-lg-6">
        <div class="card" style="min-height:17rem !important;">
            <div class="card-header">
                <div class="card-title">
                    <img src="<?php echo APP_ASSETS_PATH; ?>static/images/edit-code.svg" class="img img-fluid" style="max-width:79px;max-height:79px;">
                </div>
            </div>
            <div class="card-body">
                <div class="card-text">
                    <h5>PHP Native Mini Router</h5>
                    <p>Hello friends, this repository is a simple router written using the PHP Native programming language to help you do simple tasks/thesis/projects.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-6">
        <div class="card" style="min-height:17rem !important;">
            <div class="card-header">
                <div class="card-title">
                    <img src="<?php echo APP_ASSETS_PATH; ?>static/images/menu.svg" class="img img-fluid" style="max-width:79px;max-height:79px;">
                </div>
            </div>
            <div class="card-body">
                <div class="card-text">
                    <h5>Simple Page Router</h5>
                    <p>Select the menu option for testing the router page on the following button.</p>
                    <div class="d-flex flex-row">
                        <div class="pe-1"><a href="<?php routeTo('page-1'); ?>" class="btn btn-primary btn-sm">Page 1</a></div>
                        <div class="pe-1"><a href="<?php routeTo('page-2'); ?>" class="btn btn-success btn-sm active">Page 2</a></div>
                        <div class="pe-1"><a href="<?php routeTo('profile/dody'); ?>" class="btn btn-danger btn-sm">Parameter Page</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card" style="min-height:17rem !important;">
            <div class="card-header">
                <div class="card-title">
                    <img src="<?php echo APP_ASSETS_PATH; ?>static/images/page.svg" class="img img-fluid" style="max-width:79px;max-height:79px;">
                </div>
            </div>
            <div class="card-body">
                <div class="card-text">
                    <h5><?php echo $pageTitle; ?></h5>
                    <p>Hi, this is the display from <?php echo $pageTitle; ?>. The router successfully displays <?php echo $pageTitle; ?>.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>