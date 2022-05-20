<?php
$category = get_field('categorie_right_type');
if(!empty($category)):
?>

<div class="container mx-auto">
    <section class="flex section gap-32">
        <div class="w-7/12 flex flex-col">
    <?php
    if(have_rows('header_right_informations')):
        while(have_rows('header_right_informations')): the_row();
            ?>
                <div class="cs-head flex flex-col items-start">
                    <h2>
                        <span><?php the_sub_field('texte_annexe_right'); ?></span>
                        <?php echo $category->name; ?>
                    </h2>

                    <?php
                    if(!empty(get_sub_field('texte_description_right'))):
                        the_sub_field('texte_description_right');
                    else:
                        echo $category->description;
                    endif; ?>

                    <a href="<?php echo get_term_link($category); ?>" class="more">Découvrir</a>
                </div>
            <?php
            endwhile;
        endif; ?>

    <?php
    if(have_rows('images_right_presentation')):
        while(have_rows('images_right_presentation')): the_row();

            $img_large = get_sub_field('large_images_de_presentation_right')
                ? get_sub_field('large_images_de_presentation_right')
                : get_template_directory_uri().'/images/cat-xs-1.png';

            $img_small = get_sub_field('small_right_images_de_presentation')
                ? get_sub_field('small_right_images_de_presentation')
                : get_template_directory_uri().'/images/cat-xs-1.png';

            ?>

            <div class="flex flex-auto w-full pt-16 gap-16">
                <div class="bordered-light">
                    <div class="item-sm" style="background: url('<?php echo $img_small ?>') no-repeat center/cover "></div>
                </div>
            </div>
        </div>

        <div class="w-5/12">
            <div class="bordered-light">
                <div class="h-full relative z-10" style="background: url('<?php echo $img_large; ?>') no-repeat center/cover "></div>
            </div>
        </div>

        <?php endwhile; ?>
        <?php endif; ?>

    </section>
</div>

<?php  endif; ?>