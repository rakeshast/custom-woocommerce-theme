
<?php //if (!is_account_page()) : ?>
    <?php //get_header(); ?>
<?php //else: ?>
    <?php //get_header('login'); ?>
<?php //endif; ?>
<?php get_header(); ?>
    <!-- Page content-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>