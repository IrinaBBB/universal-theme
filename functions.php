<?php

// Добавление дополнительных возможностей
if (! function_exists('universal_theme_setup')) : 
    function universal_theme_setup() {
        // Добавление тега title
        add_theme_support( 'title-tag' ); 

        // Добавление миниатюр
        add_theme_support( 'post-thumbnails', array('post') );

        // Добавление пользовательского логотипа
        add_theme_support( 'custom-logo', [
            'width'                  => 163,
            'flex-height'            => true,
            'header-text'            => 'Universal',
            'unlink-homepage-logo'   => false
        ]);


            // Регистрация меню
            register_nav_menus([
                'header_menu' => 'Меню в шапке',
                'footer_menu' => 'Меню в подвале'
            ]);

    }
endif;
add_action( 'after_setup_theme', 'universal_theme_setup' );

## отключаем создание миниатюр файлов для указанных размеров
add_filter( 'intermediate_image_sizes', 'delete_intermediate_image_sizes' );
function delete_intermediate_image_sizes( $sizes ){
    // размеры которые нужно удалить
    return array_diff( $sizes, [
        'medium_large',
        'large',
        '1536x1536',
        '2048x2048',
    ] );

    if (function_exists('add_image_size')) {
        add_image_size('homepae-thumb', 65, 65, true);
    }
}

// Подключение стилей и шрифтов
function enqueue_universal_style() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_style('universal-theme', get_template_directory_uri() . '/assets/css/universal-theme.css', 'style');
//    wp_enqueue_style('Roboto-Slab', '<link rel="preconnect" href="https://fonts.gstatic.com">
//<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@700&display=swap" rel="stylesheet">');
}
add_action( 'wp_enqueue_scripts', 'enqueue_universal_style' );
