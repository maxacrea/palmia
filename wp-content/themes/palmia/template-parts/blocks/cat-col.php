<?php
$category = get_field('categorie_col_type');
if(!empty($category)):
    ?>

    <div class="container mx-auto">
        <section class="flex section gap-32 relative">

            <div class="cs-absolute">
                <?php
                if(have_rows('header_col_informations')):
                    while(have_rows('header_col_informations')): the_row();
                    ?>
                    <div class="cs-head">
                        <h2>
                            <span><?php the_sub_field('texte_annexe_col'); ?></span>
                            <?= $category->name; ?>
                        </h2>
                        <?php
                        if(!empty(get_sub_field('texte_description_col'))):
                            the_sub_field('texte_description_col');
                        else:
                            echo $category->description;
                        endif; ?>
                        <a href="<?php echo get_term_link($category); ?>" class="more">Découvrir</a>
                    </div>
                    <?php
                    endwhile;
                endif;
                    ?>
            </div>
            <?php
            if(have_rows('images_col_presentation')):
            ?>
            <div class="w-11/12 flex">
                <div class="flex flex-auto w-full pt-16 gap-12">
                    <?php
                    while(have_rows('images_col_presentation')): the_row();
                        $image = get_sub_field('image_colone_images_presentation')
                        ? get_sub_field('image_colone_images_presentation') :
                            get_template_directory_uri().'/images/cat2.png';
                    ?>
                    <div class="w-full">
                        <div class="item-sm" style="height: 580px; background: url('<?php echo $image; ?>') no-repeat center/cover "></div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <?php endif; ?>
        </section>
    </div>

<?php endif; ?>