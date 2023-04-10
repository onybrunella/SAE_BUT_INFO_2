<?php require "view_begin.php";?>
<section id="accueil" class="accueil">
    <div class="container position-relative">
        <div class="row gy-5">
            <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
                <h2>Dédra"<span>math</span>"isons les mathématiques</h2>
                <p>Pour plus d'informations, cliquez sur les liens ci-dessous.</p>
                <div class="d-flex justify-content-center justify-content-lg-start">
                    <a href="https://salon-math.fr/" class="animath-lien">Site du Salon Culture & Jeux mathématiques</a>
                </div>
                <div class="d-flex justify-content-center justify-content-lg-start">
                    <a href="?controller=home&action=faq" class="faq">FAQ</a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2">
                <img src="Content/img/Animath.png" class="imganimath" alt="Logo de l'association Animath disposé sur un tableau noir" width="600px">
            </div>
        </div>
    </div>
    <div class="carres position-relative">
        <div class="container position-relative">
            <div class="row gy-3 mt-3">
                <div class="col-xl-3 col-md-6">
                    <div class="personnage">
                        <h4 class="nom">
                            <a href="?controller=login&action=login_p" class="stretched-link">Je suis un enseignant</a>
                        </h4>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="personnage">
                        <h4 class="nom">
                            <a href="?controller=login&action=login_exp" class="stretched-link">Je suis un exposant</a>
                        </h4>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="personnage">
                        <h4 class="nom">
                            <a href="?controller=login&action=login_s" class="stretched-link">Je suis un superviseur</a>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require "view_end.php"; ?>
