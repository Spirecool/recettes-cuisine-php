<?php
    include('templates/header.php');
    define('_RECIPES_IMG_PATH_', 'uploads/recipes/');

    $recipes = [
        [
            'titre' => 'Mousse au chocolat',
            'description' => 'Some quick example text to build on the card title and make up the bulk of the card\'s content.',
            'image' => '1-chocolate-au-mousse.jpg'
        ],
        [
            'titre' => 'Gratin dauphinois',
            'description' => 'Some quick example text to build on the card title and make up the bulk of the card\'s content.',
            'image' => '2-gratin-dauphinois.jpg'
        ],
        [
            'titre' => 'Salade',
            'description' => 'Some quick example text to build on the card title and make up the bulk of the card\'s content.',
            'image' => '3-salade.jpg'
        ],
    ];
?>

<div class="container">


    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="index.php" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <img src="assets/images/logo-cuisinea-horizontal.jpg" alt="Logo Cuisinea" width="250">
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">Features</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">Pricing</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">FAQs</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">About</a></li>
        </ul>

        <div class="col-md-3 text-end">
            <button type="button" class="btn btn-outline-primary me-2">Login</button>
            <button type="button" class="btn btn-primary">Sign-up</button>
        </div>
    </header>

    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
            <img src="assets/images/logo-cuisinea.jpg" class="d-block mx-lg-auto img-fluid" alt="Logo Cuisinea" width="350" loading="lazy">
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold lh-1 mb-3">Cuisinea - Recettes de cuisine</h1>
            <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Voir nos recettes</button>
            </div>
        </div>
    </div>

    <div class="row">

        <?php
        foreach ($recipes as $key => $recipe) {
        ?>

            <div class="col-md-4">
                <div class="card">
                    <img src="<?php echo _RECIPES_IMG_PATH_ . $recipe['image']; ?>" class="card-img-top" alt="<?php echo $recipe['titre']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $recipe['titre'] ?></h5>
                        <p class="card-text"><?php echo $recipe['description'] ?></p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        <?php  } ?>
    </div>

    <?php include('templates/footer.php'); ?>