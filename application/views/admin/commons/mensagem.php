<div class="row">
    <?php if ($this->session->flashdata('sucess') !== NULL) { ?>
        <div style="margin: 20px 0px;" class="alert alert-success shadow-box row" role="alert">
            <div class="col-lg-11">
                <?= $this->session->flashdata('sucess') ?>
            </div>
            <div class="col-lg-1 text-right">
                <span style="color: #3C763D; font-size: 26px; cursor: pointer" id="close-alert" title="Fechar"><i class="fa fa-times" aria-hidden="true"></i></span>
            </div>
        </div>
        <?php $this->session->unset_tempdata('sucess'); ?>    
    <?php } else if ($this->session->flashdata('error') !== NULL) { ?>
        <div style="margin: 20px 0px;" class="alert alert-danger shadow-box row" role="alert">
            <div class="col-lg-11">
                <?= $this->session->flashdata('error') ?>
            </div>
            <div class="col-lg-1 text-right">
                <span style="color: #A94442; font-size: 26px; cursor: pointer" id="close-alert" title="Fechar"><i class="fa fa-times" aria-hidden="true"></i></span>
            </div>
        </div>
        <?php $this->session->unset_tempdata('error'); ?> 
    <?php } ?>
</div>