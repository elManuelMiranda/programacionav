<?php

include '../app/ProductsController.php';
$productController = new ProductsController();
$slug = $_GET['slug'];
$productDetails = $productController->getDetails($slug);


?>

<!DOCTYPE html>
<html>

<head>
    <?php include '../layouts/head.template.php'; ?>
</head>

<body>

    <!-- NAVBAR -->
    <?php include '../layouts/nav.template.php'; ?>

    <div class="container-fluid">

        <div class="row">

            <!-- SIDEBAR -->
            <?php include '../layouts/sidebar.template.php'; ?>

            <div class="col-md-10 col-lg-10 col-sm-12">

                <section>
                    <div class="row bg-light m-2">
                        <div class="col">
                            <label>
                                /Product/Details
                            </label>
                        </div>
                    </div>
                </section>

                <section>

                    <div class="row">

                        <div class="col-md-4 col-sm-12">

                            <div class="card mb-2">
                                <img src="<?= $productDetails->cover ?>" class="card-img-top" alt="<?= $productDetails->name ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $productDetails->name ?></h5>

                                    <h6 class="card-subtitle mb-2 text-muted"><b>Brand:</b> <?= $productDetails->brand->name ?></h6>

                                    <p class="card-text"><b>Description:</b> <?= $productDetails->description ?></p>

                                    <p class="card-text"><b>Features:</b> <?= $productDetails->features ?></p>

                                    <b class="card-text">Categories:</b></br>
                                    <?php foreach ($productDetails->categories as $category) : ?>
                                        <?= $category->name ?></br>
                                    <?php endforeach; ?>

                                    <b class="card-text">Tags:</br></b>
                                    <?php foreach ($productDetails->tags as $tag) : ?>
                                        <?= $tag->name ?></br>
                                    <?php endforeach; ?>

                                    <div class="row">
                                        <a data-bs-toggle="modal" data-bs-target="#addProductModal" href="#" class="btn btn-warning mb-1 col-6">
                                            Editar
                                        </a>
                                        <a onclick="eliminar(this)" class="btn btn-danger mb-1 col-6">
                                            Eliminar
                                        </a>
                                        <!-- <a href="#" class="btn btn-info col-12">
                                            Detalles
                                        </a> -->
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>

                </section>


            </div>

        </div>

    </div>
    <!-- SCRIPTS -->
    <?php include '../layouts/scripts.template.php'; ?>
    <script type="text/javascript">
        function eliminar(target) {
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                        });
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });
        }
    </script>
</body>

</html>