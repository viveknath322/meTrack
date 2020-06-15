<?php
/**
 * Search Form
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="text" class="search-field" placeholder="<?php esc_attr_e( 'Search here...', 'alpas' ); ?>" value="<?php echo get_search_query(); ?>" name="s" required>
    <button type="submit" class="search-submit">
        <i class="fa fa-search"></i>
    </button>
</form>
