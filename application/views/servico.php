<?php $this->load->view('commons/header') ?>
<!-- top bar -->
<div class="top-bar">
    <h1>Serviços</h1>
    <p><a href="<?= base_url() ?>">Home</a> / Serviços</p>
</div>
<!-- end top bar -->

<div class="container main-container">
    <div class="clearfix">
        <?php foreach ($servicos as $servico) { ?>
            <!-- service-box -->
            <div class="col-md-4 service-box">
                <?php if ($servico->service_icon) { ?>
                    <i class="<?= $servico->service_icon ?> size-50 center center-block"></i>
                <?php } else if ($servico->service_picture) { ?>
                    <img width="50" src="<?= base_url('uploads/servicos/') . $servico->service_picture ?>" alt="<?= $servico->service_nome ?>" title="<?= $servico->service_nome ?>" class="size-50">
                <?php } ?>
                <h3><?= $servico->service_nome ?></h3>
                <div class="h-10"></div>
                <p><?= $servico->service_description ?></p>
            </div>
            <!-- end service-box -->
        <?php } ?>
    </div>
</div>
<?php $this->load->view('commons/footer') ?>