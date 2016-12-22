<li class="box-label">CRM</li>
<li><a href="<?= base_url() ?>">Home</a><?= ($this->router->fetch_class() == 'Home' && $this->router->fetch_method() == 'index') ? '<i class="ion-ios-circle-filled color"></i>' : null; ?></li>
<li><a href="<?= base_url('sobre') ?>">Sobre</a><?= ($this->router->fetch_class() == 'Home' && $this->router->fetch_method() == 'Sobre') ? '<i class="ion-ios-circle-filled color"></i>' : null; ?></li>
<li><a href="<?= base_url('servicos') ?>">Serviços</a><?= ($this->router->fetch_class() == 'Servicos' && $this->router->fetch_method() == 'index') ? '<i class="ion-ios-circle-filled color"></i>' : null; ?></li>
<li><a href="<?= base_url('projetos') ?>">Projetos</a><?= ($this->router->fetch_class() == 'Projetos' && $this->router->fetch_method() == 'index') ? '<i class="ion-ios-circle-filled color"></i>' : null; ?></li>
<li><a href="<?= base_url('contatos') ?>">Contato</a><?= ($this->router->fetch_class() == 'Contatos' && $this->router->fetch_method() == 'index') ? '<i class="ion-ios-circle-filled color"></i>' : null; ?></li>
<li><a href="<?= base_url('trabalhe-conosco') ?>">Trabalhe Conosco</a><?= ($this->router->fetch_class() == 'Contatos' && $this->router->fetch_method() == 'TrabalheConosco') ? '<i class="ion-ios-circle-filled color"></i>' : null; ?></li>

<li class="box-label">Siga</li>
<?php if (!empty($empresa->company_facebook)) { ?>
    <li class="box-social"><a target="_blank" href="http://facebook.com/<?= $empresa->company_facebook ?>"><i class="ion-social-facebook"></i></a></li>
<?php } ?>

<?php if (!empty($empresa->company_instagram)) { ?>
    <li class="box-social"><a target="_blank" href="http://instagram.com/<?= $empresa->company_instagram ?>"><i class="ion-social-instagram-outline"></i></a></li>
<?php } ?>

<?php if (!empty($empresa->company_twitter)) { ?>
    <li class="box-social"><a target="_blank" href="http://twitter.com/<?= $empresa->company_twitter ?>"><i class="ion-social-twitter"></i></a></li>
<?php } ?>

<?php if (!empty($empresa->company_linkedin)) { ?>
    <li class="box-social"><a target="_blank" href="http://lekedin.com/<?= $empresa->company_linkedin ?>"><i class="ion-social-linkedin"></i></a></li>
<?php } ?>

<?php if (!empty($empresa->company_dribble)) { ?>
    <li class="box-social"><a target="_blank" href="https://dribbble.com/<?= $empresa->company_dribble ?>"><i class="ion-social-dribbble-outline"></i></a></li>
<?php } ?>

<?php if (!empty($empresa->company_skype)) { ?>
    <li class="box-social"><a target="_blank" href="https://skype.com/<?= $empresa->company_skype ?>"><i class="ion-social-skype"></i></a></li>
<?php } ?>

<?php if (!empty($empresa->company_gplus)) { ?>
    <li class="box-social"><a target="_blank" href="https://plus.google.com/+<?= $empresa->company_gplus ?>"><i class="ion-social-googleplus"></i></a></li>
<?php } ?>

<?php if (!empty($empresa->company_tumbler)) { ?>
    <li class="box-social"><a target="_blank" href="<?= $empresa->company_tumbler ?>.tumblr.com"><i class="ion-social-tumblr"></i></a></li>
<?php } ?>

<?php if (!empty($empresa->company_foursquare)) { ?>
    <li class="box-social"><a target="_blank" href="https://pt.foursquare.com/v/<?= $empresa->company_foursquare ?>"><i class="ion-social-foursquare"></i></a></li>
<?php } ?>

<?php if (!empty($empresa->company_youtube)) { ?>
    <li class="box-social"><a target="_blank" href="https://youtube.com.br/<?= $empresa->company_youtube ?>"><i class="ion-social-youtube"></i></a></li>
<?php } ?>