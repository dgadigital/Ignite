<form role="search" method="get" class="search-form mb-5" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="row">
        <label class="search-job-field col-8 pl-0 mb-0">
<!--             <span class="screen-reader-text" style="position: absolute !important; clip: rect(1px, 1px, 1px, 1px); padding: 0 !important; border: 0 !important; height: 1px !important; width: 1px !important; overflow: hidden;">
    <?php echo _x( 'Search for:', 'label', 'your-text-domain' ); ?>
</span> -->
            <input type="search" id="search-box-all" class="form-control search-jobs" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'your-text-domain' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
        </label>
        <button type="submit" class="btn btn-solid col-4"><?php echo esc_html_x( 'Search', 'submit button', 'your-text-domain' ); ?></button>
    </div>
</form>