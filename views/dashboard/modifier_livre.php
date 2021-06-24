<?php include "header.php";
include "../../entity/Categorie.php";
include "../../core/categories.php";
include "../../core/livres.php";

$c = new categories();
$categories = $c->selectcategorie();
if (isset($_GET['id'])) {
    $l = new livres();
    $result = $l->afficherlivre($_GET['id']);
}
?>
<?php
foreach ($result

as $row){
$id = $row['ID'];
$reference = $row['reference'];
$titre = $row['titre'];

$nomAuteur = $row['nomAuteur'];
$categorie = $row['categorie'];
$description = $row['description'];
$stock = $row['stock'];
$image = $row['image'];
$prix = $row['prix'];


?>

<!-- Header Section-->
<section class="dashboard-header section-padding">
    <div class="container-fluid">
        <div class="row d-flex align-items-md-stretch">

            <form method="post" action="../../core/modifier_livre.php" enctype='multipart/form-data' style="margin: 0 auto;
    width:80%">


                <input type="text" hidden name="ID" value=" <?php echo $id; ?>" class="form-control" id="ID">
                <div class="col-12 col-md-9">
                    <label>Reférence:</label>
                    <input type="text" required name="reference" value=" <?php echo $reference; ?>" class="form-control"
                           id="reference">
                </div>
                <div class="col-12 col-md-9">
                    <label>Titre:</label>
                    <input type="text" required name="titre" value=" <?php echo $titre; ?> " class="form-control"
                           id="titre">
                </div>
                <div class="col-12 col-md-9">
                    <label>Auteur:</label>
                    <input type="text" required name="auteur" value=" <?php echo $nomAuteur; ?>" class="form-control"
                           id="auteur">
                </div>
                <div class="col-12 col-md-9">
                    <label>Date de sortie:</label>
                    <input type="date" id="date" name="date" class="form-control " required><br>
                </div>

                <div class="col-12 col-md-9">
                    <label>Categorie</label>

                    <select class="myselect" style="width:200px;" name="categorie" id="categorie">
                        <option value="<?php echo $categorie; ?>">Selected:<?php echo $categorie; ?></option><?php
                        foreach ($categories as $row2) { ?>
                            <option value="<?php echo $row2['name']; ?>">  <?php echo $row2['name']; ?></option>
                        <?php } ?>
                    </select>


                </div>
                <div class="col-12 col-md-9">
                    <label>DESCRIPTION:</label>
                    <textarea type="text" name="description" required class="form-control"
                              id="des"> <?php echo $description; ?></textarea>
                </div>


                <div class="col-12 col-md-9">
                    <label>PRIX:</label>
                    <input style="width: 200px" required type="number" name="prix" value="<?php echo $prix; ?>"
                           class="form-control" id="prix">
                    <span id="error_price" class="text-danger"></span>
                </div>
                <div class="col-12 col-md-9">

                    <label>Stock:</label>
                    <input style="width: 200px" required type="number" name="stock" value="<?php echo $stock; ?>"
                           class="form-control" id="stock">
                    <span id="error_stock" class="text-danger"></span>

                </div>
                <div class="col-12 col-md-9">
                    <label for="images_input" class=" form-control-label">Images </label>
                    <input type="file" id="images_input" name="fileToUpload" onchange="readURL(this);"
                           class="form-control-file">
                    <br>
                    <img id="preview" src="#" alt=""/>


                </div>
                <div class="col-12 col-md-9">
                    <label for="images_input" class=" form-control-label">ancienne image </label><br>
                    <img height="100px" width="200px" src="../livres/<?php echo $image; ?>"/>
                </div>

        </div>
        <div>
            <br>
            <br>
            <button type="submit" name='modifier' class="btn btn-primary">modifier</button>
            <button type="reset" class="btn btn-secondary" data-dismiss="modal">reset</button>
        </div>
        </form>
        <?PHP

        }
        ?>
    </div>
</section>


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
</body>
</html>