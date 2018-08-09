<?php
declare(strict_types=1);

( function () {
    $dt_group_field_options = Disciple_Tools_Groups_Post_Type::instance()->get_custom_fields_settings( false );
    get_header(); ?>

    <div id="errors"> </div>
    <div data-sticky-container class="hide-for-small-only" style="z-index: 9">
        <nav aria-label="<?php esc_attr_e( "You are here:" ); ?>" role="navigation"
             data-sticky data-options="marginTop:3;" style="width:100%" data-top-anchor="1"
             class="second-bar">
            <div class="container-width center">
                <a class="button dt-green" style="margin-bottom:0" href="<?php echo esc_url( home_url( '/' ) ) . "groups/new" ?>">
                    <img style="display: inline-block;" src="<?php echo esc_html( get_template_directory_uri() . '/dt-assets/images/circle-add.svg' ) ?>"/>
                    <span class="hide-for-small-only"><?php esc_html_e( "Create new group", "disciple_tools" ); ?></span>
                </a>
                <a class="button" style="margin-bottom:0" data-open="filter-modal">
                    <img style="display: inline-block;" src="<?php echo esc_html( get_template_directory_uri() . '/dt-assets/images/filter.svg' ) ?>"/>
                    <span class="hide-for-small-only"><?php esc_html_e( "Filter groups", 'disciple_tools' ) ?></span>
                </a>
                <input class="search-input" style="max-width:200px;display: inline-block;margin-bottom:0" type="search" id="search-query" placeholder="search groups">
                <button class="button" style="margin-bottom:0" id="search">
                    <img style="display: inline-block;" src="<?php echo esc_html( get_template_directory_uri() . '/dt-assets/images/search-white.svg' ) ?>"/>
                    <?php esc_html_e( "Search", 'disciple_tools' ) ?>
                </button>
            </div>
        </nav>
    </div>
    <nav  role="navigation" style="width:100%;"
          class="second-bar show-for-small-only center">
        <a class="button dt-green" style="margin-bottom:0" href="<?php echo esc_url( home_url( '/' ) ) . "groups/new" ?>">
            <img style="display: inline-block;" src="<?php echo esc_html( get_template_directory_uri() . '/dt-assets/images/circle-add.svg' ) ?>"/>
            <span class="hide-for-small-only"><?php esc_html_e( "Create new group", "disciple_tools" ); ?></span>
        </a>
        <a class="button" style="margin-bottom:0" data-open="filter-modal">
            <img style="display: inline-block;" src="<?php echo esc_html( get_template_directory_uri() . '/dt-assets/images/filter.svg' ) ?>"/>
            <span class="hide-for-small-only"><?php esc_html_e( "Filter groups", 'disciple_tools' ) ?></span>
        </a>
        <a class="button" style="margin-bottom:0" id="open-search">
            <img style="display: inline-block;" src="<?php echo esc_html( get_template_directory_uri() . '/dt-assets/images/search.svg' ) ?>"/>
            <span class="hide-for-small-only"><?php esc_html_e( "Search groups", 'disciple_tools' ) ?></span>
        </a>
        <div class="hideable-search" style="display: none; margin-top:5px">
            <input class="search-input-mobile" style="max-width:200px;display: inline-block;margin-bottom:0" type="search" id="search-query-mobile" placeholder="search groups">
            <button class="button" style="margin-bottom:0" id="search-mobile"><?php esc_html_e( "Search", 'disciple_tools' ) ?></button>
        </div>
    </nav>


    <div id="content">

        <div id="inner-content" class="grid-x grid-margin-x">

            <aside class="large-3 cell padding-bottom hide-for-small-only">
                <div class="bordered-box js-pane-filters">
                    <?php /* Javascript my move .js-filters-modal-content to this location. */ ?>
                </div>
            </aside>

            <aside class="cell padding-bottom show-for-small-only">
                <div class="bordered-box" style="padding-top:5px;padding-bottom:5px">
                    <div class="js-list-filter filter--closed">
                        <div class="filter__title js-list-filter-title" style="margin-bottom:0"><?php esc_html_e( "Filters" ); ?>
                            <div style="display: inline-block" class="loading-spinner active"></div>
                        </div>
                        <div class="js-filters-accordion"></div>
                    </div>
                </div>
            </aside>

            <div class="reveal js-filters-modal" id="filters-modal">
                <div class="js-filters-modal-content">
                    <h5 class="hide-for-small-only"><?php esc_html_e( "Filters", "disciple_tools" ); ?></h5>
                    <div class="list-views">
                        <label class="list-view">
                            <input type="radio" name="view" value="all" class="js-list-view" autocomplete="off">
                            <?php esc_html_e( "All groups", "disciple_tools" ); ?>
                            <span class="list-view__count js-list-view-count" data-value="all_groups">.</span>
                        </label>
                        <label class="list-view">
                            <input type="radio" name="view" value="my" class="js-list-view" checked autocomplete="off">
                            <?php esc_html_e( "My groups", "disciple_tools" ); ?>
                            <span class="list-view__count js-list-view-count" data-value="my_groups">.</span>
                        </label>
                        <label class="list-view">
                            <input type="radio" name="view" value="shared_with_me" class="js-list-view" autocomplete="off">
                            <?php esc_html_e( "Groups shared with me", "disciple_tools" ); ?>
                            <span class="list-view__count js-list-view-count" data-value="groups_shared_with_me">.</span>
                        </label>
                    </div>
                    <h5><?php esc_html_e( 'Custom Filters', "disciple_tools" ); ?></h5>
                    <div style="margin-bottom: 5px">
                        <a data-open="filter-modal"><img style="display: inline-block; margin-right:12px" src="<?php echo esc_html( get_template_directory_uri() . '/dt-assets/images/circle-add-blue.svg' ) ?>"/><?php esc_html_e( "Add new filter", 'disciple_tools' ) ?></a>
                    </div>
                    <div class="custom-filters">
                    </div>
                    <div id="saved-filters"></div>
                </div>
            </div>

            <main id="main" class="large-9 cell padding-bottom" role="main">

                <?php get_template_part( 'dt-assets/parts/content', 'groups' ); ?>

            </main> <!-- end #main -->

        </div> <!-- end #inner-content -->

    </div> <!-- end #content -->


    <div class="reveal" id="filter-modal" data-reveal>
        <div class="grid-container" >
            <div class="grid-x">
                <div class="cell small-4">
                    <h3><?php esc_html_e( 'New Filter', 'disciple_tools' )?></h3>
                </div>
                <div class="cell small-8">
                    <div id="selected-filters"></div>
                </div>
            </div>
            <div class="grid-x">
                <div class="cell small-4 filter-modal-left">
                    <?php $fields = [ "assigned_to", "group_status", "group_type", "locations" ];
                    $fields = apply_filters( 'dt_filters_additional_fields', $fields, "groups" );
                    $connections = Disciple_Tools_Posts::$connection_types;
                    $connections["assigned_to"] = [ "name" => __( "Assigned To", 'disciple_tools' ) ];
                    ?>
                    <ul class="vertical tabs" data-tabs id="example-tabs">
                        <?php foreach ( $fields as $index => $field ) :
                            if ( $field === "health_metrics" ) : ?>
                                <li class="tabs-title" data-field="<?php echo esc_html( $field )?>">
                                    <a href="#<?php echo esc_html( $field )?>">
                                        <?php echo esc_html( "Health Metrics" ) ?></a>
                                </li>
                            <?php elseif ( isset( $dt_group_field_options[$field]["name"] ) ) : ?>
                                <li class="tabs-title <?php if ( $index === 0 ){ echo "is-active"; } ?>" data-field="<?php echo esc_html( $field )?>">
                                    <a href="#<?php echo esc_html( $field )?>" <?php if ( $index === 0 ){ echo 'aria-selected="true"'; } ?>>
                                        <?php echo esc_html( $dt_group_field_options[$field]["name"] ) ?></a>
                                </li>
                            <?php elseif ( in_array( $field, array_keys( $connections ) ) ) : ?>
                                <li class="tabs-title" data-field="<?php echo esc_html( $field )?>">
                                    <a href="#<?php echo esc_html( $field )?>">
                                        <?php echo esc_html( $connections[$field]["name"] ) ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="cell small-8 tabs-content filter-modal-right" data-tabs-content="example-tabs">
                    <?php foreach ( $fields as $index => $field ) :
                        $is_multi_select = isset( $dt_group_field_options[$field] ) && $dt_group_field_options[$field]["type"] == "multi_select";
                        if ( in_array( $field, array_keys( $connections ) ) || $is_multi_select ) : ?>
                            <div class="tabs-panel <?php if ( $index === 0 ){ echo "is-active"; } ?>" id="<?php echo esc_html( $field ) ?>">
                                <div class="<?php echo esc_html( $field );?>  <?php echo esc_html( $is_multi_select ? "multi_select" : "" ) ?> details" >
                                    <var id="<?php echo esc_html( $field ) ?>-result-container" class="result-container <?php echo esc_html( $field ) ?>-result-container"></var>
                                    <div id="<?php echo esc_html( $field ) ?>_t" name="form-<?php echo esc_html( $field ) ?>" class="scrollable-typeahead typeahead-margin-when-active">
                                        <div class="typeahead__container">
                                            <div class="typeahead__field">
                                            <span class="typeahead__query">
                                                <input class="js-typeahead-<?php echo esc_html( $field ) ?>" data-field="<?php echo esc_html( $field ) ?>"
                                                       name="<?php echo esc_html( $field ) ?>[query]" placeholder="<?php esc_html_e( "Type to Search", 'disciple_tools' ) ?>"
                                                       autocomplete="off">
                                            </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php elseif ( $field == "health_metrics" ) : ?>
                            <div class="tabs-panel" id="health_metrics">
                                <div id="health_metrics-options">
                                    <?php foreach ( $dt_group_field_options as $dt_field_key => $dt_field_value ) :
                                        if ( strpos( $dt_field_key, "church_" ) === 0 ) : ?>
                                            <div>
                                                <label style="cursor: pointer;">
                                                    <input type="checkbox" value="<?php echo esc_html( $dt_field_key ) ?>" class="milestone-filter" autocomplete="off">
                                                    <?php echo esc_html( $dt_field_value["name"] ) ?>
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="tabs-panel" id="<?php echo esc_html( $field ) ?>">
                                <div id="<?php echo esc_html( $field ) ?>-options">
                                    <?php if ( isset( $dt_group_field_options[$field] ) && $dt_group_field_options[$field]["type"] == "key_select" ) :
                                        foreach ( $dt_group_field_options[$field]["default"] as $option_key => $option_value ) : ?>
                                            <div class="key_select_options">
                                                <label style="cursor: pointer">
                                                    <input autocomplete="off" type="checkbox" data-field="<?php echo esc_html( $field ) ?>"
                                                           value="<?php echo esc_html( $option_key ) ?>"> <?php echo esc_html( $option_value ) ?>
                                                </label>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php elseif ( isset( $dt_group_field_options[$field] ) && $dt_group_field_options[$field]["type"] == "key_select" ) : ?>

                                    <?php endif; ?>
                                </div>
                            </div>

                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="grid-x grid-padding-x">
            <div class="cell small-4 filter-modal-left">
                <button class="button button-cancel clear" data-close aria-label="Close reveal" type="button">
                    <?php esc_html_e( 'Cancel', 'disciple_tools' )?>
                </button>
            </div>
            <div class="cell small-8 filter-modal-right confirm-buttons">
                <button class="button loader confirm-filter-contacts" type="button" id="confirm-filter-contacts" data-close >
                    <?php esc_html_e( 'Filter Groups', 'disciple_tools' )?>
                </button>
                <button class="button loader confirm-filter-contacts" type="button" id="save-filter-edits" data-close style="display: none">
                    <?php esc_html_e( 'Save', 'disciple_tools' )?>
                </button>
            </div>
        </div>
        <button class="close-button" data-close aria-label="Close modal" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>


    <?php get_template_part( 'dt-assets/parts/modals/modal', 'filters' ); ?>

    <?php
} )();
get_footer(); ?>
