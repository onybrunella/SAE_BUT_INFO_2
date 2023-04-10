<?php require "view_begin.php";?>
<section class="py-5 my-5">
    <div class="container">
        <div class="bg-white shadow rounded-lg d-block d-sm-flex">
            <div class="border-right">
                <div class="p-4">
                    <div class="img-circle text-center mb-3">
                        <img src="Content/img/compte.png" alt="Icone d'un personnage" width="100px">
                    </div>
                    <h4 class="text-center"><?=$prenom?> <?=$nom?></h4>
                </div>
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link" data-toggle="pill" href="?controller=compte&action=compte_p" role="tab" aria-controls="compte" aria-selected="false">
                        Mes informations
                    </a>
                    <a class="nav-link" data-toggle="pill" href="?controller=compte&action=planning_p" role="tab" aria-controls="planning" aria-selected="false">
                        Planning
                    </a>

                    <a class="nav-link" data-toggle="pill" href="?controller=compte&action=deconnexion" role="tab" aria-controls="deconnexion" aria-selected="false">
                        Me déconnecter
                    </a>
                </div>
            </div>
            <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="compte" role="tabpanel" aria-labelledby="compte-tab">
                    <h3 class="mb-4">Mes réservations</h3>

                </div>
            </div>
        </div>
</section>
<?php require "view_end.php"; ?>

