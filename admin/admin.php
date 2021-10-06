<?php
if (is_admin()){
    function custom_admin_js() {
        $screen = get_current_screen();
        if ( $screen->id != 'nav-menus' )
            return;
        ?>
        <script type="text/javascript">
            jQuery(function($) {
                var warn = false;
                $('.submit-add-to-menu').on('click', function () {
                    var num_menu = $('#menu-to-edit').children('.menu-item-depth-0').length;
                    num_menu += $('.menu-item-checkbox:checked').length;
                    if (!warn && (num_menu > 6)) {
                        warn = true;
                        alert('Не больше 6 городов');

                    }
                });
                $('#update-nav-menu').on('submit', function () {
                    var num_menu = $('#menu-to-edit').children('.menu-item-depth-0').length;
                    if (num_menu > 6) {
                        alert('Не больше 6 городов');
                        return false;
                    }
                });
            })
        </script>
        <?php
    }
    add_action('admin_footer', 'custom_admin_js');
}