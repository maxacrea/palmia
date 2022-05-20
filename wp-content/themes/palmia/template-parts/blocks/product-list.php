<?php
$titre = get_field('libelle_section')
? get_field('libelle_section')
: 'Pour vous ...';

$type = get_field('type_list')
? get_field('type_list')
    : 'last';

switch ($type) {
    case 'selection':
        $array = [];
        foreach (get_field('selections_type') as $id) {
            array_push($array, $id['produit_selections']);
        }
        $args = array(
            'post_type'		=> 'product',
            'post__in' => $array
        );
        break;
    case 'collection':
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 4,
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'id',
                    'terms' => get_field('collection_de_produit_type')
                )
            )
        );
        break;
    default:
        $args = [
            'post_type' => 'product',
            'posts_per_page' => 4
        ];
}

$products = new WP_Query($args);

if($products->have_posts()):
?>

<div class="container mx-auto pt-20">
    <h2 class="mb-20"><?= $titre; ?></h2>
    <?php
    if(get_field('is_active_tabs')):
    ?>

        <nav class="tabs-nav flex mt-12 mb-20 items-center gap-32">
            <a href="" class="active link-nav">#Tous</a>
            <a href="" class="link-nav">#visités</a>
            <a href="" class="link-nav">#nouveaux</a>
            <a href="" class="link-nav">#cout de coeur</a>
        </nav>
    <?php endif; ?>
    <div class="list-product">
        <?php while($products->have_posts()): $products->the_post(); ?>
        <?php wc_get_template_part( 'content', 'product' ); ?>
        <?php endwhile; ?>
    </div>
</div>

<?php  endif; ?>