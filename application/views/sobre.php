<?php $this->load->view('commons/header') ?>

<!-- Top bar -->
    <div class="top-bar">
        <h1>Sobre</h1>
        <p><a href="<?= base_url() ?>">Home</a> / Sobre</p>
    </div>
    <!-- end Top bar -->
    
    <!-- Main container -->
    <div class="container main-container clearfix"> 
        <div class="col-md-6">
            <img src="<?= base_url('_assets/www/img/01.jpg')?>" class="img-responsive" alt="" />
        </div>
        <div class="col-md-6">
           <h3 class="uppercase">Nome da Empresa</h3>
           <h5>Texto chamativo</h5>
           <div class="h-30"></div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliter enim nosmet ipsos nosse non possumus. Inscite autem medicinae et gubernationis ultimum cum ultimo sapientiae comparatur. Tecum optime, deinde etiam cum mediocri amico. Et nemo nimium beatus est; Ac ne plura complectar-sunt enim innumerabilia-, bene laudata virtus voluptatis aditus </p>

            <p>Tum ille: Tu autem cum ipse tantum librorum habeas, quos hic tandem requiris? Esse enim quam vellet iniquus iustus poterat inpune. </p>
            <div class="h-10"></div>
            <ul class="social-ul">
                <li class="box-social"><a href="#0"><i class="ion-social-facebook"></i></a></li>
                <li class="box-social"><a href="#0"><i class="ion-social-instagram-outline"></i></a></li>
                <li class="box-social"><a href="#0"><i class="ion-social-twitter"></i></a></li>
                <li class="box-social"><a href="#0"><i class="ion-social-dribbble"></i></a></li>
            </ul>


        </div>
    </div>
    <!-- end Main container -->

<?php $this->load->view('commons/footer') ?>