<?php get_header(); ?>

    <!-- Page content-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <?php
                    if (have_posts()) {
                        while (have_posts()) {
                            the_post(); 
                        $url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID(), 'thubmnail'));    
                    ?>
                            
                            <article>
                                <!-- Post header-->
                                <header class="mb-4">
                                    <h1 class="fw-bolder mb-1"><?php the_title() ?></h1>
                                </header>
                                <!-- Preview image figure-->
                                <figure class="mb-4"><img class="img-fluid rounded" src="<?php echo $url; ?>" alt="..." /></figure>
                                <!-- Post content-->
                                <section class="mb-5">
                                    <?php the_content(); ?>
                                    <a href="<?php the_permalink() ?>" class="btn btn-primary">Read More</a>
                                </section>
                            </article>
                            
                            <?php
                        }
                    } 
                ?>
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <?php get_template_part('sidebar-template'); ?>                
            </div>
        </div>
    </div>

<?php get_footer(); ?>