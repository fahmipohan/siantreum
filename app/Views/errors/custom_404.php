<!DOCTYPE html>
<html lang="en">
<?= $this->include('layout/header') ?>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="page-error">
                    <div class="page-inner">
                        <h1>404</h1>
                        <div class="page-description">
                            The page you were looking for could not be found.
                        </div>
                        <div class="page-search">
                            <div class="mt-3">
                                <a href="<?=site_url('/')?>">Back to Home</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="simple-footer mt-5">
                    Copyright &copy; Connecting Dots Nusa
                </div>
            </div>
        </section>
    </div>

    <?= $this->include('layout/js') ?>
    
</body>

</html>