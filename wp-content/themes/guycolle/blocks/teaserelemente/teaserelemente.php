<?php
/**
* Teaser Newsletter Template.
*/

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_name = 'teaserelemente-block';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}
$group = get_field('teaserelemente');
$titel = $group['titel'];
$text = $group['text'];

?>

<section <?php echo $anchor; ?>class="<?php echo esc_attr( $class_name ); ?>">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 offset-md-2">
                <h2><?php echo $titel; ?></h2>
                <?php echo $text; ?>
            </div>
        </div>
    </div>
</section>
