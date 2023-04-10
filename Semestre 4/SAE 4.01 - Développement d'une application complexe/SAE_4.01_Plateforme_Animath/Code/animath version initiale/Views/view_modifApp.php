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
                    <a class="nav-link" data-toggle="pill" href="?controller=compte&action=compte_s" role="tab" aria-controls="compte" aria-selected="false">
                        Mes informations
                    </a>
                    <a class="nav-link" data-toggle="pill" href="?controller=compte&action=planning_s" role="tab" aria-controls="planning" aria-selected="false">
                        Planning
                    </a>
                    <a class="nav-link active" data-toggle="pill" href="?controller=compte&action=modApp" role="tab" aria-controls="Modif" aria-selected="true">
                        Modifications appliquées
                    </a>
                    <a class="nav-link" data-toggle="pill" href="?controller=compte&action=creerS" role="tab" aria-controls="Csuperviseur" aria-selected="false">
                        Créer un compte superviseur
                    </a>
                    <a class="nav-link" data-toggle="pill" href="?controller=compte&action=deconnexion" role="tab" aria-controls="deconnexion" aria-selected="false">
                        Me déconnecter
                    </a>
                </div>
            </div>
            <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="compte" role="tabpanel" aria-labelledby="compte-tab">
                    <h3 class="mb-4">Modifications appliquées</h3>
                    <div style="height: 450px; overflow: auto;">
                    <table>
                        <tr>
                            <th>Nom superviseur</th>
                            <th>Action</th>
                            <th>Date</th>
                            <th>Ancienne donnée</th>
                            <th>Nouvelle donnée</th>
                        </tr>
                        <?php foreach ($modif as $v) : ?>
                            <tr>
                                <td> <?= e($v['nom']) ?> </td>
                                <td> <?= e($v['action']) ?> </td>
                                <td> <?= e($v['estampille']) ?> </td>
                                <td> <?= e($v['old_tuple']) ?> </td>
                                <td> <?= e($v['new_tuple']) ?> </td>
                            </tr>
                        <?php endforeach ?>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require "view_end.php"; ?>
