<?php

include "../app/ProductsController.php";

$productController = new ProductsController();
$products = $productController->getProducts();

?>

<!DOCTYPE html>
<html>

<head>
    <?php include '../layouts/head.template.php'; ?>
</head>
<!-- mfloriano_19@alu.uabcs.mx  a0uGqZBW!mA1o0 -->

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
                            <label>/Products</label>
                        </div>
                        <div class="col">
                            <button data-bs-toggle="modal" data-bs-target="#addProductModal" class=" float-end btn btn-primary">Add product</button>
                        </div>
                    </div>
                </section>

                <section>

                    <div class="row">

                        <?php if (isset($products) && count($products)) : ?>
                            <?php foreach ($products as $product) : ?>

                                <div class="col-md-4 col-sm-12">

                                    <div class="card mb-2">
                                        <img src="<?= $product->cover ?>" class="card-img-top" alt="<?= $product->name ?>">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $product->name ?></h5>
                                            <h6 class="card-subtitle mb-2 text-muted"><?= $product->brand->name ?></h6>
                                            <p class="card-text"><?= $product->description ?></p>

                                            <div class="row">
                                                <a data-bs-toggle="modal" data-bs-target="#addProductModal" href="#" class="btn btn-warning mb-1 col-6">
                                                    Editar
                                                </a>
                                                <a onclick="eliminar(this)" class="btn btn-danger mb-1 col-6">
                                                    Eliminar
                                                </a>
                                                <a href="./details.php?slug=<?= $product->slug ?>" class="btn btn-info col-12">
                                                    Detalles
                                                </a>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                </section>


            </div>

        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add a product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="post" action="../app/ProductsController.php" enctype="multipart/form-data">

                    <div class="modal-body">

                        <label>Name</label>
                        <div class="input-group mb-3">
                            <input name="name" type="text" class="form-control" placeholder="Product name" aria-label="Name" required>
                        </div>

                        <label>Slug</label>
                        <div class="input-group mb-3">
                            <input name="slug" type="text" class="form-control" placeholder="Product slug" aria-label="Slug" required>
                        </div>

                        <label>Description</label>
                        <div class="input-group mb-3">
                            <input name="description" type="text" class="form-control" placeholder="Product description" aria-label="Name" required>
                        </div>

                        <label>Features</label>
                        <div class="input-group mb-3">
                            <input name="features" type="text" class="form-control" placeholder="Product features" aria-label="Features" required>
                        </div>

                        <label>Cover</label>
                        <div class="input-group mb-3">
                            <input name="cover" type="file" class="form-control" placeholder="Product cover" aria-label="Cover" required>
                        </div>

                        <label>Brand ID</label>
                        <div class="input-group mb-3">
                            <input name="brand_id" type="text" class="form-control" placeholder="Product Brand ID" aria-label="Brand ID" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add product</button>
                        <input type="hidden" name="action" value="createProduct">
                    </div>

                </form>

            </div>
        </div>
    </div>
    <!-- SCRIPTS -->
    <?php include '../layouts/scripts.template.php'; ?>

</body>

</html>