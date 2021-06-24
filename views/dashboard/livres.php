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
            Ajouter un livre
        </button>
        <div class="row d-flex align-items-md-stretch">


            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Listes des livres</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Referecne</th>
                                    <th>Titre</th>
                                    <th>Auteur</th>
                                    <th>Categorie</th>
                                    <th>Description</th>
                                    <th>Date de sortie</th>
                                    <th>Image</th>
                                    <th>Prix</th>
                                    <th>Stock</th>
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
                                $result = $l->afficher($page_1);

                                $count = ceil(($l->count()) / 6);


                                ?>
                                <tbody>
                                <?php
                                $j = 0;
                                foreach ($result as $row)

                                {   $j++; ?>
                                <tr>
                                    <th scope="row"><?php echo $j ; ?></th>
                                    <td><?php echo $row["reference"]; ?></td>
                                    <td><?php echo $row["titre"]; ?></td>
                                    <td><?php echo $row["nomAuteur"]; ?></td>
                                    <td><?php echo $row["categorie"]; ?></td>
                                    <td><?php echo $row["description"]; ?></td>
                                    <td><?php echo $row["dateS"]; ?></td>
                                    <td><img id="output2" style="  height:70px  ;width:110px ;   "
                                             src="../livres/<?php echo $row["image"] ?>"/></td>
                                    <td><?php echo $row["prix"]; ?></td>
                                    <td><?php echo $row["stock"]; ?></td>
                                    <td>
                                        <form action="modifier_livre.php" style="float:left;">

                                            <button class="btn btn-sm btn-success" type="submit" name="modifier"
                                                    value="modifier"><i class="fa fa-pencil"> </i> Update
                                            </button>

                                            <input type="hidden" value="<?php echo $row['ID']; ?>" name="id">

                                        </form>
                                        <form action="../../core/supprimer_livre.php" style="float:right;">
                                            <button class="btn btn-sm btn-danger" type="submit" id="supprimer"
                                                    name="supprimer" value="supprimer"><i class="fa fa-trash"></i>
                                                Delete
                                            </button>

                                            <input type="hidden" id="id" value="<?php echo $row['ID']; ?>" name="id">
                                        </form>
                                    </td>
                                </tr>


                                </tbody>
                                <?php } ?>
                            </table>
                        </div>
                        <div>
                            <ul class="pagination">
                                <?php
                                if ($count > 1) {
                                    for ($i = 1; $i <= $count; $i++) {
                                        if ($i == $page) {
                                            echo "<li> <a  style=' color: white;  background: #33b35a ; width: 15px' href='livres.php?page={$i}'>{$i}</a> </li>  ";
                                        } else {
                                            echo "<li> <a href='livres.php?page={$i}'>{$i}</a> </li>  ";
                                        }

                                    }
                                }
                                ?>

                            </ul>
                        </div>
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
                <h5 class="modal-title" id="exampleModalLabel">ajouter un livre</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div>

                <form method="post" action="../../core/ajouterlivre.php" enctype='multipart/form-data'>


                    <div class="col-12 col-md-9">
                        <label>Reférence:</label>
                        <input type="text" required name="reference" class="form-control" id="reference">
                    </div>
                    <div class="col-12 col-md-9">
                        <label>Titre:</label>
                        <input type="text" required name="titre" class="form-control" id="titre">
                    </div>
                    <div class="col-12 col-md-9">
                        <label>Auteur:</label>
                        <input type="text" required name="auteur" class="form-control" id="auteur">
                    </div>
                    <div class="col-12 col-md-9">
                        <label>Date de sortie:</label>
                        <input type="date" id="date" name="date" class="form-control " required><br>
                    </div>

                    <div class="col-12 col-md-9">
                        <label>Categorie</label>
                        <?php if ($categories->rowCount() > 0) { ?>
                            <select class="myselect" style="width:200px;" name="categorie" id="categorie"> <?php
                                foreach ($categories

                                as $row) { ?>
                                <option value="<?PHP echo $row['name']; ?>">  <?PHP echo $row['name'];
                                    } ?></option>
                            </select>

                        <?php } else { ?>  <h4 style="color:#ff004a">vous n'avez pas encore de
                            catégorie </h4>    <?php } ?>

                    </div>
                    <div class="col-12 col-md-9">
                        <label>DESCRIPTION:</label>
                        <textarea type="text" name="description" required class="form-control" id="des"> </textarea>
                    </div>


                    <div class="col-12 col-md-9">
                        <label>PRIX:</label>
                        <input style="width: 200px" required type="number" name="prix" class="form-control" id="prix">
                        <span id="error_price" class="text-danger"></span>
                    </div>
                    <div class="col-12 col-md-9">

                        <label>Stock:</label>
                        <input style="width: 200px" required type="number" name="stock" class="form-control" id="stock">
                        <span id="error_stock" class="text-danger"></span>

                    </div>
                    <div class="col-12 col-md-9">
                        <label for="images_input" class=" form-control-label">Images </label>
                        <input type="file" required id="images_input" name="fileToUpload" onchange="readURL(this);"
                               class="form-control-file">
                        <br>
                        <img id="preview" src="#" alt=""/>


                    </div>

            </div>
            <div class="modal-footer">
                <?php if ($categories->rowCount() <= 0) { ?>
                    <input type="submit" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal2"
                           value="Envoyer" id="button-blue" name="button-blue">
                <?php } else { ?>
                    <button type="submit" name='ajout' class="btn btn-primary">Ajouter</button>
                <?php } ?>
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <h4 style="color: red">vous devez ajouter au moins une categorie
                    <a href="categories.php">ajouter une categorie ..</a>
                </h4>
            </div>

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
<script src="js/verifier.js"></script>
</body>
</html>