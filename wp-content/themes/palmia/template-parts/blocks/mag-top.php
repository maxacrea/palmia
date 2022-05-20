<?php
    $args = [
            'post_type' => 'post',
        'posts_per_page' => 3
    ];
    $q = new WP_Query($args);
    if($q->have_posts()):
        $i = 0;
?>

<div class="section sec-mag mb-0">
    <div class="container mx-auto">
        <div class="sec-head">
            <h2 class="text-center"><?php echo get_field('titre_section_top_mag') ? get_field('titre_section_top_mag') : 'Le Mag'; ?></h2>
        </div>
        <div class="flex gap-32">
            <div class="w-8/12">

                <?php  while($q->have_posts()): $q->the_post();
                    if($i != 0) {
                        continue;
                    }
                ?>
                <div class="mag mag-view-lg">
                    <div class="w-1/2 h-full p-2">
                        <div class="mag-thumb" style="background: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), "full") ?>') no-repeat center/cover ">
                        </div>
                    </div>
                    <div class="w-1/2 h-full p-16">
                        <a class="time"><?php the_date('D d M, Y') ?></a>
                        <h3><?php the_title(); ?></h3>
                        <p>
                            <?php the_excerpt(); ?>
                        </p>
                        <a href="<?php the_permalink(); ?>" class="mt-20 more border-primary text-primary">Lire la suite</a>
                    </div>
                </div>
            <?php
                $i++;
                endwhile;
                $q->rewind_posts();
                wp_reset_query();
                ?>
            </div>

            <div class="w-4/12 flex flex-col gap-16">
                <?php
                    while($q->have_posts()): $q->the_post();
                        if($i > 1 ) :
                    ?>
                    <div class="mag mag-view">
                        <div>
                            <span class="time"><?php echo get_the_date('D d M,Y'); ?></span>
                            <h3><?php the_title(); ?></h3>
                            <p>
                                <?php the_excerpt(); ?>
                            </p>
                            <a href="<?php the_permalink(); ?>" class="mt-20 more border-primary text-primary">Lire la suite</a>
                        </div>
                    </div>
                    <?php
                        endif;
                    $i++;
                endwhile; ?>
            </div>
        </div>
    </div>
</div>

<?php
    endif;
    ?>