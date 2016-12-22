<div class="session-header">
    <h2>Parceiros</h2>
    <p>Conheça alguns dos nossos parceiros</p>
    <div class="parceiros_container">
        <?php foreach ($parceiros as $parceiro) { ?>
            <div class="parceiros_item">
                <img src="<?= base_url('uploads/parceiros/') . $parceiro->partners_avatar ?>" alt="<?= $parceiro->partners_name ?>" title="<?= $parceiro->partners_name ?>" class="img-responsive" />
            </div>
        <?php } ?>
    </div>
</div>