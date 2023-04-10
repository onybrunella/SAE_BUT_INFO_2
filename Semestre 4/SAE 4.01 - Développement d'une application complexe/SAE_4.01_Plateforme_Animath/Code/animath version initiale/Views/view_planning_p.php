<?php require "view_begin.php";?>
<section class="py-5 my-5">
    <div class="container">
        <div class="bg-white shadow rounded-lg d-block d-sm-flex">
            <div class="border-right">
                <div class="p-4">
                    <div class="img-circle text-center mb-3">
                        <img src="Content/img/compte.png" alt="Icone d'un personnage" width="100px">
                    </div>
                    <h4 class="text-center"><?=$infos['prenom']?> <?=$infos['nom']?></h4>
                </div>
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link" data-toggle="pill" href="?controller=compte&action=compte_p" role="tab" aria-controls="compte" aria-selected="false">
                        Mes informations
                    </a>
                    <a class="nav-link active" data-toggle="pill" href="?controller=compte&action=planning_p" role="tab" aria-controls="planning" aria-selected="true">
                        Planning
                    </a>

                    <a class="nav-link" data-toggle="pill" href="?controller=compte&action=deconnexion" role="tab" aria-controls="deconnexion" aria-selected="false">
                        Me déconnecter
                    </a>
                </div>
            </div>
            <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="planning" role="tabpanel" aria-labelledby="planning-tab">

                    <form action="?controller=planning&action=rechercher" method="post">
                        <div  class="centerp shadow">
                            <h3>Réserver</h3>
                            <div class="standp0">
                                <select name="jour" id="standp0-select" required>
                                    <option value="" selected disabled>---jour---</option>
                                    <option value="Jeudi">Jeudi</option>
                                    <option value="Vendredi">Vendredi</option>
                                </select>
                            </div>
                            <div class="standp">
                                <select name="niveau" id="standp-select" required>
                                    <option value="" selected disabled>---niveau---</option>
                                    <option value="Primaire">Primaire</option>
                                    <option value="Collège">Collège</option>
                                    <option value="Lycée">Lycée</option>
                                </select>
                            </div>

                            <br>
                            <div class="standp3">
                                <select name="debut" id="standp3-select" required>
                                    <option value="" selected disabled>---début---</option>
                                    <option value="09:00:00">9h</option>
                                    <option value="10:00:00">10h</option>
                                    <option value="11:00:00">11h</option>
                                    <option value="12:00:00">12h</option>
                                    <option value="13:00:00">13h</option>
                                    <option value="14:00:00">14h</option>
                                    <option value="15:00:00">15h</option>
                                    <option value="16:00:00">16h</option>
                                    <option value="17:00:00">17h</option>
                                </select>
                                <br>
                                <div class="standp2">
                                    <select name="fin" id="standp2-select" required>
                                        <option value="" selected disabled>---fin---</option>
                                        <option value="10:00:00">10h</option>
                                        <option value="11:00:00">11h</option>
                                        <option value="12:00:00">12h</option>
                                        <option value="13:00:00">13h</option>
                                        <option value="14:00:00">14h</option>
                                        <option value="15:00:00">15h</option>
                                        <option value="16:00:00">16h</option>
                                        <option value="17:00:00">17h</option>
                                        <option value="18:00:00">18h</option>
                                    </select>

                                </div>

                            </div>
                            <div>
                                <input type="submit" class="rechercher" value="Rechercher">
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require "view_end.php"; ?>
