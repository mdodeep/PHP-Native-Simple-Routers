<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <title>MDRouter</title>
</head>

<body>
    <div class="container">
        <div class="my-5">
            <div class="row">
                <div class="col-xl-6">
                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title">Test Page</h5>
                            <p class="card-text">You can visit the example page.</p>
                            <a class="btn btn-primary active" href="<?php echo APP_URL; ?>page-1" role="button">Page 1</a>
                            <a class="btn btn-warning" href="<?php echo APP_URL; ?>page-2" role="button">Page 2</a>
                            <a class="btn btn-success" href="<?php echo APP_URL; ?>param/dody/LvMEeyGNucQ7" role="button">Test Parameter</a>
                        </div>
                        <div class="card-footer text-body-secondary">
                            <div class="d-flex justify-content-between">
                                <small>Hello World !</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title">Documentation</h5>
                            <p class="card-text">Refer to the usage documentation for how to use this router.</p>
                            <a href="https://mdody.com/project/php-native-router" class="btn btn-primary"><i class="bi bi-arrow-return-right"></i> Go To Link</a>
                        </div>
                        <div class="card-footer text-body-secondary">
                            <div class="d-flex justify-content-between">
                                <small>Crafted With <span class="text-danger"><i class="bi bi-heart-fill"></i></span> By <a href="https://mdody.com/" style="text-decoration: none;" class="link-primary">Dody</a></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Page 2</h5>
                            <p class="card-text">Hi, this is how the <strong>Page 2</strong> page looks like.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>