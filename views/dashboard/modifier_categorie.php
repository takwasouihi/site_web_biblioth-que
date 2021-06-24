<?php include "header.php";
include "../../entity/Categorie.php";
include "../../core/categories.php";
include "../../core/livres.php";


if (isset($_GET['id'])) {
    $c = new categories();
    $result = $c->affichercategorie($_GET['id']);
}
?>
<?php
foreach ($result

as $row){
$id = $row['id'];
$nom = $row['name'];


?>

<!-- Header Section-->
<section class="dashboard-header section-padding">
    <div class="container-fluid">
        <div class="row d-flex align-items-md-stretch">

            <form method="post" action="../../core/modifier_categorie.php" style="margin: 0 auto;
    width:80%">


                <input type="text" hidden name="ID" value=" <?php echo $id; ?>" class="form-control" id="ID">
                <div class="col-12 col-md-9">
                    <label>Categorie:</label>
                    <input type="text" required name="name" value=" <?php echo $nom; ?>" class="form-control"
                           id="reference">
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