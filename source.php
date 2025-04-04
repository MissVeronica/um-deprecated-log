<?php
add_action( 'wp_trigger_error_run', 'wp_trigger_error_run_stack_trace', 10, 3 );
function wp_trigger_error_run_stack_trace( $function_name, $message, $error_level ) {
    $trace  = '<div>' . date_i18n( 'Y-m-d H:i:s ', current_time( 'timestamp' )) . '</div>';
    $trace .= '<div>Function: ' . esc_attr( $function_name ) . '</div>';
    $trace .= '<div>Message: ' . esc_attr( $message ) . '</div>';
    $trace .= '<div>Error: ' . esc_attr( $error_level ) . '</div>';
    $e = new \Exception;
    $trace .= '<div><pre>' . str_replace( ABSPATH, '...', $e->getTraceAsString()) . '</pre></div>';
    file_put_contents( WP_CONTENT_DIR . '/um_trace_log.html', $trace, FILE_APPEND );
}
