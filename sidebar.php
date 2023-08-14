<?php 

// Call Sidebar 1
// if ( is_active_sidebar( 'sidebar-1' ) ) {
//     dynamic_sidebar( 'sidebar-1' );
// }

?>

<!-- Search widget-->
<div class="card mb-4">
    <div class="card-header">Search</div>
    <div class="card-body">
        <?php get_search_form(); ?>
    </div>
</div>
<!-- Categories widget-->
<div class="card mb-4">
    <div class="card-header">Categories</div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <ul class="list-unstyled mb-0">
                    <li><a href="#!">Web Design</a></li>
                    <li><a href="#!">HTML</a></li>
                    <li><a href="#!">Freebies</a></li>
                </ul>
            </div>
            <div class="col-sm-6">
                <ul class="list-unstyled mb-0">
                    <li><a href="#!">JavaScript</a></li>
                    <li><a href="#!">CSS</a></li>
                    <li><a href="#!">Tutorials</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Side widget-->
<div class="card mb-4">
    <div class="card-header">Side Widget</div>
    <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature
        the Bootstrap 5 card component!</div>
</div>