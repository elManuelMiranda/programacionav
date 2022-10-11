<?php

include '../app/config.php';
include "../app/ProductsController.php";
include '../app/BrandsController.php';

$productController = new ProductsController();
$products = $productController->getProducts();
$brandController = new BrandsController();
$brands = $brandController->getBrands();

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
                                                <a data-product='<?= json_encode($product) ?>' onclick="editProduct(this)" data-bs-toggle="modal" data-bs-target="#addProductModal" href="#" class="btn btn-warning mb-1 col-6">
                                                    Editar
                                                </a>
                                                <a onclick="eliminar(<?= $product->id ?>)" class="btn btn-danger mb-1 col-6">
                                                    Eliminar
                                                </a>
                                                <a href="./details.php?slug=<?= $product->slug ?>" class="btn btn-info col-12">
                                                    Detalles
                                                </a>
                                                <input type="hidden" id="basepath" value="<?= BASE_PATH ?>">
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

                <form method="post" action="<?= BASE_PATH ?>product" enctype="multipart/form-data">

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
                            <select name="brand_id" class="form-control">
                                <?php foreach ($brands as $brand) : ?>
                                    <option value="<?= $brand->id ?>"><?= $brand->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add product</button>
                        <input type="hidden" name="action" value="createProduct">
                        <input type="hidden" id="id_product" name="id">
                        <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>">
                    </div>

                </form>

            </div>
        </div>
    </div>
    <!-- SCRIPTS -->
    <?php include '../layouts/scripts.template.php'; ?>
    <script type="text/javascript">
        function eliminar(id) {
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        var bodyFormData = new FormData();
                        var basepath = document.getElementById("basepath").value;
                        bodyFormData.append('id', id);
                        bodyFormData.append('action', 'delete');
                        bodyFormData.append('super_token', "<?= $_SESSION['super_token'] ?>");

                        axios.post(basepath + 'product', bodyFormData)
                            .then(function(response) {
                                if (response.data) {
                                    swal("Poof! Your imaginary file has been deleted!", {
                                        icon: "success",
                                    });
                                } else {
                                    swal("Error", {
                                        icon: "error",
                                    });;
                                }
                            })
                            .catch(function(error) {
                                console.log(error);
                            });
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });
        }

        function editProduct(target) {

            let product = JSON.parse(target.dataset.product);

            document.getElementById('name').value = product.name;
            document.getElementById('slug').value = product.slug;
            document.getElementById('description').value = product.description;
            document.getElementById('features').value = product.features;
            document.getElementById('brand_id').value = product.brand_id;

            document.getElementById('id_product').value = product.id;


            document.getElementById('action').value = 'update';

        }
    </script>
</body>

</html>