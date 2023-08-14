<form role="search" method="get" id="searchform" class="searchform custom" action="<?php echo home_url( '/' ) ?>">
    <div class="input-group">
        <label class="screen-reader-text" for="s"><?php echo __( 'Search for:' ) ?> </label>
        <input type="text" value="<?php echo get_search_query() ?>" name="s" id="s" placeholder="Search" class="form-control"/>
        <input class="btn btn-primary" type="submit" id="searchsubmit" value="<?php echo esc_attr__( 'Go' ) ?>" />
    </div>
</form>