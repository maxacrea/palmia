<?php
    $category = get_field('collection_mise_a_la_une');

    if(!empty($category)):
        $bg = get_field('thumbotron_banniere', $category)
        ? get_field('thumbotron_banniere', $category)
        : get_template_directory_uri()."/images/head.png";
?>

    <section class="jumbotron flex" style="background: url('<?php echo $bg; ?>') no-repeat bottom center/cover">
        <div class="container mx-auto h-full flex items-center w-full">
            <div class="w-1/2">
                <h1><?= $category->name ?>
                    collections</h1>
                <span># <?= $category->count; ?> nouveau modèles</span>
                <p>
                    <?= $category->description ?>
                </p><a href="<?php echo get_term_link($category); ?>" class="btn">Découvrir</a>
            </div>
        </div>
    </section>

<?php endif; ?>