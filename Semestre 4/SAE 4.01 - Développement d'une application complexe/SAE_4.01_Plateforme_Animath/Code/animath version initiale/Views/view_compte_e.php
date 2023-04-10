<?php require "view_begin.php";?>
    <section class="py-5 my-5">
        <div class="container">
            <div class="bg-white shadow rounded-lg d-block d-sm-flex">
                <div class="border-right">
                    <div class="p-4">
                        <div class="img-circle text-center mb-3">
                            <img src="Content/img/compte.png" alt="Icone d'un personnage" width="100px">
                        </div>
                        <h4 class="text-center"> <?=$nom['nom']?></h4>
                    </div>
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" data-toggle="pill" href="#planning" role="tab" aria-controls="compte" aria-selected="true">
                            Planning
                        </a>
                        <a class="nav-link" data-toggle="pill" href="?controller=compte&action=deconnexion" role="tab" aria-controls="deconnexion" aria-selected="false">
                            Retour à la page d'accueil
                        </a>
                    </div>
                </div>
                <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="planning" role="tabpanel" aria-labelledby="compte-tab">
                        <h3 class="mb-4">Planning</h3>
                        <div class="aff">
                            <div style="height: 500px; overflow: auto;">
                                <details class="d1">
                                    <summary><strong>Jeudi</strong></summary>
                                    <table>
                                        <thead>
                                        <tr>
                                            <td>Créneaux</td>
                                            <td>Établissement</td>
                                            <td>Niveau</td>
                                            <td>Nombre d'élèves</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($infosJ as $v) : ?>
                                            <tr>
                                                <td><?=$v['heure_d']?> - <?=$v['heure_f']?></td>
                                                <td><?=$v['etablissement']?></td>
                                                <td><?=$v['niveau']?></td>
                                                <td><?=$v['nb_eleve']?></td>
                                            </tr>
                                            <?php endforeach?>
                                        </tbody>
                                    </table>
                                </details>
                                </details>
                                <details class="d1">
                                    <summary><strong>Vendredi</strong></summary>
                                    <table>
                                        <thead>
                                        <tr>
                                            <td>Créneaux</td>
                                            <td>Établissement</td>
                                            <td>Niveau</td>
                                            <td>Nombre d'élèves</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($infosV as $v) : ?>
                                            <tr>
                                                <td><?=$v['heure_d']?> - <?=$v['heure_f']?></td>
                                                <td><?=$v['etablissement']?></td>
                                                <td><?=$v['niveau']?></td>
                                                <td><?=$v['nb_eleve']?></td>
                                            </tr>
                                            <?php endforeach?>
                                        </tbody>
                                    </table>
                                </details>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php require "view_end.php"; ?>