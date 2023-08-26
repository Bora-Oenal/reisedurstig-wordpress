<?php
function display_custom_logo() {
    $logo_id = get_theme_mod( 'logo_id' );
    if ( ! empty( $logo_id ) ) {
        $logo_url = wp_get_attachment_image_src( $logo_id, 'full' )[0];
        echo '<img src="' . esc_url( $logo_url ) . '" class="d-inline-block align-top" alt="reisedurstig-logo">';
    } else {
        echo '<img src="https://reisedurstig.de/wp-content/uploads/2020/07/reisedurstig_logo@2x.png" class="d-inline-block align-top" alt="reisedurstig-logo">';
    }
}
display_custom_logo(); // Diese Zeile aufrufen, um die Funktion auszuführen und das Logo anzuzeigen
?>
