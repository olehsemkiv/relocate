<?php
global $wp_query;

if (is_category() || is_tax()) {
    $blocks = get_field('blocks', get_queried_object());
} else {
    $blocks = get_field('blocks', $wp_query->post->ID);
}
?>

<?php
if (!empty($blocks)) {
    foreach ($blocks as $block) {
        $blockname = str_replace("_", "-", $block['acf_fc_layout']);
        get_template_part(
            'views/blocks/' . $blockname,
            NULL,
            array('fields' => $block)
        );
    };
}
?>
