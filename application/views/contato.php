<?php $this->load->view('commons/header') ?>
<!-- top bar -->
    <div class="top-bar">
        <h1>Contato</h1>
        <p><a href="<?= base_url() ?>">Home</a> / Contato</p>
    </div>
    <!-- end top bar -->

    <!-- main-container -->
    <div class="container main-container">
        <div class="col-md-6">
            <form method="POST" action="<?= base_url('contatos') ?>">
                <input type="hidden" name="contato_tipo" value="0">
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-contact">
                            <input type="text" name="contato_nome">
                            <span>Seu nome</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-contact">
                            <input type="text" name="contato_email">
                            <span>Seu email</span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-contact">
                            <input type="text" name="contato_assunto">
                            <span>Assunto</span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="textarea-contact">
                            <textarea name="contato_mensagem"></textarea>
                            <span>Mensagem</span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button name="action-submit" class="btn btn-box">Enviar</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-6">
            <h3 class="text-uppercase"><?= $empresa->company_name ?></h3>
            <h5>Nos envie sua dúvida, reclamção ou agradecimento</h5>
            <div class="h-30"></div>
            <p style="text-align: justify;">Gostária de contratar nossos serviços 
            ou mandar alguma dúvida/sugestão? Por meio desse formulário é possivel
            falar diretamente conosco e em até 24h estaremos respondendo a sua mensagem. </p>
            <p>Desde já agradecemos o seu contato!</p>
            <div class="contact-info">
                <p><i class="ion-android-call"></i> <?= $empresa->company_phone ?></p>
                <p><i class="ion-ios-email"></i> <?= $empresa->company_email ?></p>
            </div>
        </div>


    </div>
    <!-- end main-container -->
<?php $this->load->view('commons/footer') ?>