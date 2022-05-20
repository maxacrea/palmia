<?php
$texte = get_field('citation_texte')
? get_field('citation_texte')
    : '....';
?>
<div class="pl-citation" style="background: url(<?php echo get_field('image_de_fond_citation') ? get_field('image_de_fond_citation') : get_template_directory_uri() .  '/images/citation.png'; ?>) no-repeat center/cover">
    <div class="cs-content flex flex-col justify-center">
        <?= $texte; ?>

        <?php if(have_rows('call_to_action_infors')):
            while(have_rows('call_to_action_infors')): the_row(); ?>
            <a href="<?= get_sub_field('cible_action'); ?>" class="link mt-16 inline-block"><?= get_sub_field('libelle_action'); ?></a>
        <?php endwhile;
        endif; ?>
    </div>
</div>