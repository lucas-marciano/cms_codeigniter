<li class="box-label">CRM</li>
<li><a href="<?= base_url() ?>">Home</a><?= ($this->router->fetch_class() == 'Home' && $this->router->fetch_method() == 'index') ? '<i class="ion-ios-circle-filled color"></i>' : null; ?></li>
<li><a href="<?= base_url('sobre') ?>">Sobre</a><?= ($this->router->fetch_class() == 'Home' && $this->router->fetch_method() == 'Sobre') ? '<i class="ion-ios-circle-filled color"></i>' : null; ?></li>
<li><a href="<?= base_url('servicos') ?>">Serviços</a><?= ($this->router->fetch_class() == 'Servicos' && $this->router->fetch_method() == 'index') ? '<i class="ion-ios-circle-filled color"></i>' : null; ?></li>
<li><a href="<?= base_url('projetos') ?>">Projetos</a><?= ($this->router->fetch_class() == 'Projetos' && $this->router->fetch_method() == 'index') ? '<i class="ion-ios-circle-filled color"></i>' : null; ?></li>
<li><a href="<?= base_url('contatos') ?>">Contato</a><?= ($this->router->fetch_class() == 'Contatos' && $this->router->fetch_method() == 'index') ? '<i class="ion-ios-circle-filled color"></i>' : null; ?></li>
<li><a href="<?= base_url('trabalhe-conosco') ?>">Trabalhe Conosco</a><?= ($this->router->fetch_class() == 'Contatos' && $this->router->fetch_method() == 'TrabalheConosco') ? '<i class="ion-ios-circle-filled color"></i>' : null; ?></li>

<li class="box-label">Siga</li>
<li class="box-social"><a href="#0"><i class="ion-social-facebook"></i></a></li>
<li class="box-social"><a href="#0"><i class="ion-social-instagram-outline"></i></a></li>
<li class="box-social"><a href="#0"><i class="ion-social-twitter"></i></a></li>
<li class="box-social"><a href="#0"><i class="ion-social-linkedin"></i></a></li>