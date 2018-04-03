<?php
/**
 * @package WordPress
 * @subpackage Adamantium - Starter Kit
 * @author Bitopia Digital Agency
 */
 
/* ---------- Todos los Custom Post Types a implementar ---------- */

/* ----- RECETAS ----- */
function cpt_recetas() { 
        register_post_type( 'receta',
                array('labels' => array(
                        'name' => __('Recetas', 'post type general name'),
                        'singular_name' => __('Receta', 'post type singular name'),
                        'all_items' => __('Todas las Recetas'),
                        'add_new' => __('Agregar nueva', 'custom post type item'),
                        'add_new_item' => __('Agregar nueva receta'),
                        'edit' => __( 'Editar' ),
                        'edit_item' => __('Editar Receta'),
                        'new_item' => __('Nueva Receta'),
                        'view_item' => __('View Post Type'),
                        'search_items' => __('Search Post Type'),
                        'not_found' =>  __('Nothing found in the Database.'),
                        'not_found_in_trash' => __('Nothing found in Trash'),
                        'parent_item_colon' => ''
                        ),
                        'description' => __( 'This is the example custom post type' ),
                        'public' => true,
                        'publicly_queryable' => true,
                        'exclude_from_search' => false,
                        'show_ui' => true,
                        'query_var' => true,
                        'menu_position' => 5,
                        'rewrite'       => array( 'slug' => 'receta', 'with_front' => false ),
                        'has_archive' => 'receta',
                        'capability_type' => 'post',
                        'hierarchical' => false, /* entrada */
                        'supports' => array( 'title', 'editor','excerpt','thumbnail', 'comments', 'sticky')
                )
        );

        register_taxonomy_for_object_type('post_tag', 'receta');
} 
add_action( 'init', 'cpt_recetas');

/* ----- PRODCTOS ----- */
function cpt_productos() { 
        register_post_type( 'producto',
                array('labels' => array(
                        'name' => __('Productos', 'post type general name'),
                        'singular_name' => __('Producto', 'post type singular name'),
                        'all_items' => __('Todos los Productos'),
                        'add_new' => __('Agregar nuevo', 'custom post type item'),
                        'add_new_item' => __('Agregar nuevo producto'),
                        'edit' => __( 'Editar' ),
                        'edit_item' => __('Editar Producto'),
                        'new_item' => __('Nuevo Producto'),
                        'view_item' => __('View Post Type'),
                        'search_items' => __('Search Post Type'),
                        'not_found' =>  __('Nothing found in the Database.'),
                        'not_found_in_trash' => __('Nothing found in Trash'),
                        'parent_item_colon' => ''
                        ),
                        'description' => __( 'This is the example custom post type' ),
                        'public' => true,
                        'publicly_queryable' => true,
                        'exclude_from_search' => false,
                        'show_ui' => true,
                        'query_var' => true,
                        'menu_position' => 5,
                        'rewrite'       => array( 'slug' => 'producto', 'with_front' => false ),
                        'has_archive' => 'producto',
                        'capability_type' => 'post',
                        'hierarchical' => false,
                        'supports' => array( 'title', 'editor','excerpt','thumbnail', 'comments', 'sticky')
                )
        );

        register_taxonomy_for_object_type('post_tag', 'producto');
} 
add_action( 'init', 'cpt_productos');

/* ----- BLOGS ----- */
function cpt_blog() { 
        register_post_type( 'blog',
                array('labels' => array(
                        'name' => __('Blogs', 'post type general name'),
                        'singular_name' => __('blog', 'post type singular name'),
                        'all_items' => __('Todas los blogs'),
                        'add_new' => __('Agregar nueva', 'custom post type item'),
                        'add_new_item' => __('Agregar nueva blog'),
                        'edit' => __( 'Editar' ),
                        'edit_item' => __('Editar blog'),
                        'new_item' => __('Nueva blog'),
                        'view_item' => __('View Post Type'),
                        'search_items' => __('Search Post Type'),
                        'not_found' =>  __('Nothing found in the Database.'),
                        'not_found_in_trash' => __('Nothing found in Trash'),
                        'parent_item_colon' => ''
                        ),
                        'description' => __( 'This is the example custom post type' ),
                        'public' => true,
                        'publicly_queryable' => true,
                        'exclude_from_search' => false,
                        'show_ui' => true,
                        'query_var' => true,
                        'menu_position' => 5,
                        'rewrite'       => array( 'slug' => 'blogs', 'with_front' => false ),
                        'has_archive' => 'blogs',
                        'capability_type' => 'post',
                        'hierarchical' => false,
                        'supports' => array( 'title', 'editor','excerpt', 'thumbnail', 'comments', 'sticky')
                )
        );
flush_rewrite_rules();
        register_taxonomy_for_object_type('post_tag', 'blog');
} 
add_action( 'init', 'cpt_blog');

/* --- TAXONOMIAS --- */
/* RECETAS */
register_taxonomy( 'tipo_receta', 
    array('receta'),
    array('hierarchical' => true,             
            'labels' => array(
                    'name' => __( 'Tipo de recetas' ),
                    'singular_name' => __( 'Tipo de receta' ),
                    'search_items' =>  __( 'Buscar Tipo de receta' ),
                    'all_items' => __( 'Todas las Tipo de recetas' ),
                    'parent_item' => __( 'Padre Tipo de receta' ),
                    'parent_item_colon' => __( 'Padre Tipo de receta:' ),
                    'edit_item' => __( 'Editar Tipo de receta' ),
                    'update_item' => __( 'Actualizar Tipo de receta' ),
                    'add_new_item' => __( 'Agregar Nueva Tipo de receta' ),
                    'new_item_name' => __( 'Nueva Tipo de receta' )
            ),
            'show_ui' => true,
            'query_var' => true,
    )
);

/* BLOGS */
register_taxonomy( 'tipo_blog', 
    array('blog'),
    array('hierarchical' => true,             
            'labels' => array(
                    'name' => __( 'Categorias' ),
                    'singular_name' => __( 'Categoria' ),
                    'search_items' =>  __( 'Buscar Categoria' ),
                    'all_items' => __( 'Todas las Categorias' ),
                    'parent_item' => __( 'Padre Categoria' ),
                    'parent_item_colon' => __( 'Padre Categoria:' ),
                    'edit_item' => __( 'Editar Categoria' ),
                    'update_item' => __( 'Actualizar Categoria' ),
                    'add_new_item' => __( 'Agregar Nueva Categoria' ),
                    'new_item_name' => __( 'Nueva Categoria' )
            ),
            'show_ui' => true,
            'query_var' => true,
    )
);

// register_taxonomy( 'tipo_descargable', 
//     array('descargable'),
//     array('hierarchical' => true,             
//             'labels' => array(
//                     'name' => __( 'Tipo' ),
//                     'singular_name' => __( 'Tipo' ),
//                     'search_items' =>  __( 'Buscar Tipo' ),
//                     'all_items' => __( 'Todos los Tipo' ),
//                     'parent_item' => __( 'Padre Tipo' ),
//                     'parent_item_colon' => __( 'Padre Tipo:' ),
//                     'edit_item' => __( 'Editar Tipo' ),
//                     'update_item' => __( 'Actualizar Tipo' ),
//                     'add_new_item' => __( 'Agregar Nuevo Tipo' ),
//                     'new_item_name' => __( 'Nuevo Tipo' )
//             ),
//             'show_ui' => true,
//             'query_var' => true,
//     )
// );

// register_taxonomy( 'subtipo_descargable', 
//     array('descargable'),
//     array('hierarchical' => true,             
//             'labels' => array(
//                     'name' => __( 'SubTipo' ),
//                     'singular_name' => __( 'SubTipo' ),
//                     'search_items' =>  __( 'Buscar SubTipo' ),
//                     'all_items' => __( 'Todos los SubTipo' ),
//                     'parent_item' => __( 'Padre SubTipo' ),
//                     'parent_item_colon' => __( 'Padre SubTipo:' ),
//                     'edit_item' => __( 'Editar SubTipo' ),
//                     'update_item' => __( 'Actualizar SubTipo' ),
//                     'add_new_item' => __( 'Agregar Nuevo SubTipo' ),
//                     'new_item_name' => __( 'Nuevo SubTipo' )
//             ),
//             'show_ui' => true,
//             'query_var' => true,
//     )
// );
?>