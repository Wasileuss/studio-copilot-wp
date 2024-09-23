<?php
add_action('wp_enqueue_scripts', 'copilot_scripts' );
add_action('wp_enqueue_scripts', 'copilot_styles' );
add_action( 'init', 'true_jquery_register' );
function copilot_scripts () {

    wp_enqueue_script('my-theme-script', get_template_directory_uri() . '/assets/js/app.js', [], null, true);

    // wp_enqueue_script('my-theme-custom-script', get_template_directory_uri() . '/assets/js/custom.js', array(), null, true);
}

function copilot_styles() {
    
    wp_enqueue_style('my-theme-style', get_stylesheet_uri());
    
    wp_enqueue_style('my-custom-style', get_template_directory_uri() . '/style-custom.css');
}

function true_jquery_register() {
	if ( !is_admin() ) {
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js', [], null, true );
		wp_enqueue_script( 'jquery' );
	}
}

add_theme_support('custom-logo');

add_theme_support('menus');

add_filter('nav_menu_item_attributes', 'add_class_to_main_menu', 10, 3 );
function add_class_to_main_menu( $atts, $item, $args ) {
    if ( $args -> menu === 'Main' ) {
        $atts['class'] = 'menu__item';
        if($item -> current == true){
            $atts['class'] = 'menu__item menu__item--active';
        }
    }
    return $atts;
}

add_filter('nav_menu_link_attributes', 'add_class_to_main_menu_links', 10, 3 );
function add_class_to_main_menu_links( $atts, $item, $args ) {
    if ( $args -> menu === 'Main' ) {
        $atts['class'] = 'menu__link';
        if($item -> current == true){
            $atts['class'] = 'menu__link';
        }
    }
    return $atts;
}

// add_theme_support( 'post-thumbnails' );

// Реєструємо кастомний тип запису "plans"
function plans() {
    $args = [
        'public' => true,
        'label'  => 'Plans',
        'supports' => [ 'title', 'editor', 'custom-fields' ],
        'taxonomies' => [ 'category', 'post_tag' ],
        'orderby' => 'date',
        'order' => 'ASC',
        'has_archive' => true
    ];
    register_post_type( 'plans', $args );
}
add_action( 'init', 'plans' );

// Додаємо метабокси до кастомного типу запису "plans"
// Додаємо метабокс до кастомного типу запису "plans"
function add_plans_list_metabox() {
    add_meta_box(
        'plans_list_metabox',    // Ідентифікатор метабокса
        'Plans List',            // Назва метабокса
        'render_plans_list_metabox', // Функція для рендерингу метабокса
        'plans',                 // Тип запису
        'normal',                // Контекст (положення на сторінці редагування)
        'high'                   // Пріоритет
    );
}
add_action( 'add_meta_boxes', 'add_plans_list_metabox' );

// Функція для рендерингу полів у метабоксі
function render_plans_list_metabox( $post ) {
    // Отримуємо існуючі значення метаполя, якщо воно існує
    $plans_list = get_post_meta( $post->ID, '_plans_list', true );

    // Додаємо кнопку для додавання нових елементів
    echo '<div id="plans_list_wrapper">';
    
    if (!empty($plans_list) && is_array($plans_list)) {
        foreach ($plans_list as $index => $plan) {
            $content = isset($plan['content']) ? esc_textarea($plan['content']) : '';
            $class = isset($plan['class']) ? esc_attr($plan['class']) : '';

            echo '<div class="plans-list-item" style="margin-bottom: 10px;">';
            echo '<textarea name="plans_list[' . $index . '][content]" rows="3" style="width: 100%;" placeholder="Content">' . $content . '</textarea>';
            echo '<input type="text" name="plans_list[' . $index . '][class]" style="width: 100%;" placeholder="Class" value="' . $class . '"/>';
            echo '<button type="button" class="remove-plan-item" style="margin-top: 5px;">Remove</button>';
            echo '</div>';
        }
    } else {
        // Порожній запис за замовчуванням
        echo '<div class="plans-list-item" style="margin-bottom: 10px;">';
        echo '<textarea name="plans_list[0][content]" rows="3" style="width: 100%;" placeholder="Content"></textarea>';
        echo '<input type="text" name="plans_list[0][class]" style="width: 100%;" placeholder="Class"/>';
        echo '<button type="button" class="remove-plan-item" style="margin-top: 5px;">Remove</button>';
        echo '</div>';
    }

    echo '</div>';
    echo '<button type="button" id="add-plan-item">Add New Item</button>';

    // JavaScript для динамічного додавання/видалення полів
    ?>
    <script>
        (function($) {
            $(document).ready(function() {
                var index = <?php echo !empty($plans_list) ? count($plans_list) : 1; ?>;

                $('#add-plan-item').on('click', function() {
                    var newItem = '<div class="plans-list-item" style="margin-bottom: 10px;">';
                    newItem += '<textarea name="plans_list[' + index + '][content]" rows="3" style="width: 100%;" placeholder="Content"></textarea>';
                    newItem += '<input type="text" name="plans_list[' + index + '][class]" style="width: 100%;" placeholder="Class"/>';
                    newItem += '<button type="button" class="remove-plan-item" style="margin-top: 5px;">Remove</button>';
                    newItem += '</div>';

                    $('#plans_list_wrapper').append(newItem);
                    index++;
                });

                $('#plans_list_wrapper').on('click', '.remove-plan-item', function() {
                    $(this).parent('.plans-list-item').remove();
                });
            });
        })(jQuery);
    </script>
    <?php
}

// Зберігаємо дані метаполя
function save_plans_list_metabox( $post_id ) {
    if (isset($_POST['plans_list']) && is_array($_POST['plans_list'])) {
        $plans_list = array_map(function($item) {
            return [
                'content' => sanitize_textarea_field($item['content']),
                'class' => sanitize_text_field($item['class']),
            ];
        }, $_POST['plans_list']);

        update_post_meta($post_id, '_plans_list', $plans_list);
    } else {
        delete_post_meta($post_id, '_plans_list');
    }
}
add_action( 'save_post', 'save_plans_list_metabox' );
