<?php
    $category = get_field('categorie_left_type');
    if(!empty($category)):
?>

    <div class="container mx-auto">
        <section class="flex section gap-32">
        <?php
        if(have_rows('images_de_presentation')):
            while(have_rows('images_de_presentation')): the_row();
                $img_large = get_sub_field('large_images_de_presentation')
                    ? get_sub_field('large_images_de_presentation')
                    : get_template_directory_uri().'/images/cat-xs-1.png';

                ?>
                <div class="w-5/12">
                    <div class="h-full pb-12 pl-20 bordered-light-left">
                        <div class="h-full relative  z-10" style="background: url('<?php echo $img_large; ?>') no-repeat center/cover "></div>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php endif; ?>
            <div class="w-7/12 flex flex-col">
                <?php
                if(have_rows('header_informations')):
                    while(have_rows('header_informations')): the_row();
                ?>
                <div class="cs-head flex flex-col items-start">
                    <h2>
                        <span><?php the_sub_field('texte_annexe'); ?></span>
                        <?= $category->name; ?>
                    </h2>

                    <?php
                    if(!empty(get_sub_field('texte_description'))):
                        the_sub_field('texte_description');
                    else:
                        echo $category->description;
                    endif; ?>
                    <a href="<?php echo get_term_link($category); ?>" class="more">Découvrir</a>
                </div>
                <?php endwhile; ?>
                <?php endif; ?>

                <?php
                if(have_rows('images_de_presentation')):
                    while(have_rows('images_de_presentation')): the_row();

                    $img_large = get_sub_field('large_images_de_presentation')
                    ? get_sub_field('large_images_de_presentation')
                        : get_template_directory_uri().'/images/cat-xs-1.png';

                    $img_sm_left = get_sub_field('small_gauche_images_de_presentation')
                        ? get_sub_field('small_gauche_images_de_presentation')
                        : get_template_directory_uri().'/images/cat-xs-1.png';

                    $img_sm_right = get_sub_field('small_droite_images_de_presentation')
                        ? get_sub_field('small_droite_images_de_presentation')
                        : get_template_directory_uri().'/images/cat-xs-1.png';
                    ?>
                    <div class="cs-rows-2col">
                        <div class="w-1/2">
                            <div class="item-sm" style="background: url('<?php echo $img_sm_right; ?>') no-repeat center/cover "></div>
                        </div>
                        <div class="w-1/2">
                            <div class="item-sm" style="background: url('<?php echo $img_sm_left; ?>') no-repeat center/cover "></div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </section>
    </div>

<?php endif; ?>