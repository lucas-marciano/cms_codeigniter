<div class="row">
    <div class="col-lg-12">
        <?php if (isset($error) && $error != "") { ?>
            <div style="margin: 20px 0px;" class="alert alert-danger shadow-box row" role="alert">
                <div class="col-lg-11">
                    <?= $error ?>
                </div>
                <div class="col-lg-1 text-right">
                    <span style="color: #A94442; font-size: 26px; cursor: pointer" id="close-alert" title="Fechar"><i class="fa fa-times" aria-hidden="true"></i></span>
                </div>
            </div>
        <?php } else if (isset($sucess) && $sucess != '') { ?>
            <div style="margin: 20px 0px;" class="alert alert-success shadow-box row" role="alert">
                <div class="col-lg-11">
                    <?= $sucess ?>
                </div>
                <div class="col-lg-1 text-right">
                    <span style="color: #3C763D; font-size: 26px; cursor: pointer" id="close-alert" title="Fechar"><i class="fa fa-times" aria-hidden="true"></i></span>
                </div>
            </div>
        <?php } else if (isset($warning) && $warning != '') { ?>
            <div style="margin: 20px 0px;" class="alert alert-warning shadow-box row" role="alert">
                <div class="col-lg-11">
                    <?= $warning ?>
                </div>
                <div class="col-lg-1 text-right">
                    <span style="color: #8A6D3B; font-size: 26px; cursor: pointer" id="close-alert" title="Fechar"><i class="fa fa-times" aria-hidden="true"></i></span>
                </div>
            </div>
        <?php } ?>
    </div>
</div>