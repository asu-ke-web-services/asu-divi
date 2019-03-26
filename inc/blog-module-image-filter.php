<?php
// Provides a small interface for filtering the blog module featured image size.
// Uses Carbon Fields for theme options definition.

// ===============================================
// Carbon Fields: Theme Options, Featured Blog Image Size
// ===============================================
use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'theme_options', 'ASU Divi Options' )
    ->set_page_parent( 'et_divi_options' )
    ->add_fields( array(
        Field::make( 'html', 'asudivi-blog-module-featured-image-desc' )
            ->set_html( '<h1>Blog Module Featured Image Size</h1><p>Check the box below to enable a filter for the blog module featured image size. Set the width and height to the same dimension to produce a square image.</p>' ),
        Field::make( 'checkbox', 'asudivi-blog-module-filter-state', 'Enable blog module image size filter?' )
            ->set_option_value( 'yes' ),
        Field::make( 'text', 'asudivi-blog-module-filter-width', 'Featured Image Width')
            ->set_help_text( 'Please include unit.' )
            ->set_width( 50 ),
        Field::make( 'text', 'asudivi-blog-module-filter-height', 'Featured Image Height')
            ->set_help_text( 'Please include unit.' )
            ->set_width( 50 ),
    ) );