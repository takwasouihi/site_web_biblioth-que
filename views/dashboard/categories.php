<?php include "header.php";
include "../../entity/Categorie.php";
include "../../core/categories.php";
include "../../core/livres.php";
$l = new livres();
$c = new categories();
$categories = $c->selectcategorie();

?>
<!-- Header Section-->
<section class="dashboard-header section-padding">
    <div class="container-fluid">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ajoutModal">
            Ajouter une categorie
        </button>
        <div class="row d-flex align-items-md-stretch">


            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Listes des categories</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>

                                    <th>Nom</th>

                                    <th width="17%">Actions</th>

                                </tr>
                                </thead>
                                <?php

                                if (isset($_GET['page'])) {
                                    $page = $_GET['page'];
                                } else {
                                    $page = "";
                                }
                                if ($page == "" || $page == 1) {
                                    $page_1 = 0;
                                } else {
                                    $page_1 = ($page * 6) - 6;
                                }
                                $result = $c->afficher($page_1);

                                $count = ceil(($c->count()) / 6);


                                ?>
                                <tbody>
                                <?php
                                $j = 0;
                                foreach ($result

                                as $row)

                                {
                                $j++; ?>
                                <tr>
                                    <th scope="row"><?php echo $j; ?> </th>

                                    <td><?php echo $row["name"]; ?></td>

                                    <td>
                                        <form action="modifier_categorie.php" style="float:left;">

                                            <button class="btn btn-sm btn-success" type="submit" name="modifier"
                                                    value="modifier"><i class="fa fa-pencil"> </i> Update
                                            </button>

                                            <input type="hidden" value="<?php echo $row['id']; ?>" name="id">

                                        </form>
                                        <form action="../../core/supprimer_categorie.php" style="float:right;">
                                            <button class="btn btn-sm btn-danger" type="submit" id="supprimer"
                                                    name="supprimer" value="supprimer"><i class="fa fa-trash"></i>
                                                Delete
                                            </button>
                                            <input type="hidden" id="name" value="<?php echo $row['name']; ?>"
                                                   name="name">
                                            <input type="hidden" id="id" value="<?php echo $row['id']; ?>" name="id">
                                        </form>
                                    </td>
                                </tr>


                                </tbody>
                            <?php } ?>
                            </table>
                        </div>

                    </div>
                    <div>
                        <ul class="pagination">
                            <?php
                            if ($count > 1) {
                                for ($i = 1; $i <= $count; $i++) {
                                    if ($i == $page) {
                                        echo "<li> <a style=' color: white;  background: #33b35a ; width: 15px' href='categories.php?page={$i}'>{$i}</a> </li>  ";
                                    } else {
                                        echo "<li> <a href='categories.php?page={$i}'>{$i}</a> </li>  ";
                                    }

                                }
                            }
                            ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
</section>


<!-- Modal AJOUT  -->
<div class="modal fade" id="ajoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ajouter une categorie</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div>

                <form method="post" action="../../core/ajoutercategorie.php">


                    <div class="col-12 col-md-9">
                        <label>Categorie:</label>
                        <input type="text" required name="name" class="form-control" id="name">
                    </div>


            </div>
            <div class="modal-footer">

                <button type="submit" name='ajout' class="btn btn-primary">Ajouter</button>

                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- JavaScript files-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
<script src="vendor/jquery.cookie/jquery.cookie.js"></script>
<script src="vendor/chart.js/Chart.min.js"></script>
<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
<script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/charts-home.js"></script>
<!-- Main File-->
<script src="js/front.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

</body>
</html>