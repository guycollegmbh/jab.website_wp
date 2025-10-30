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
$logo = $group['logo'];
$slogan = $group['slogan'];
$headerbg = $group['headerbg'];
$headerbgm = $group['headerbgm'];
$opening = $group['opening'];
$lead = $group['lead'];
$cta = $group['cta'];
$ctam = $group['ctam'];
$cta_link = $group['cta_link'];
$text = $group['text'];
$bsport = $group['bsport'];

?>

<section <?php echo $anchor; ?>class="<?php echo esc_attr( $class_name ); ?>">
    <div class="header">
        <?php if ( ! empty( $headerbg ) ):
            $video_url = is_array( $headerbg ) ? $headerbg['url'] : $headerbg;
        ?>
            <div class="background-video-wrapper">
                <video autoplay muted loop playsinline class="background-video">
                    <source src="<?php echo esc_url( $video_url ); ?>" type="video/mp4">
                </video>
            </div>
        <?php endif; ?>

        <?php if ( ! empty( $headerbgm ) ):
            $mobile_image_url = is_array( $headerbgm ) ? $headerbgm['url'] : $headerbgm;
        ?>
            <div class="background-mobile-image" style="background-image: url('<?php echo esc_url( $mobile_image_url ); ?>')"></div>
        <?php endif; ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="slogan">
                            <?php if ( ! empty( $slogan ) ): ?>
                                <?php echo $slogan; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-end">
                        <?php if ( ! empty( $logo ) ): ?>
                            <img src="<?php echo esc_url($logo['url']); ?>" alt="Logo" class="img-fluid teaser-logo">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1 col-md-1 offset-3 offset-md-5">
                        <a href="#contentNL" class="arrowdown"><img src="/wp-content/themes/guycolle/assets/images/arrow_down.svg" alt="Go to Content"></a>
                    </div>
                </div>
            </div>
    </div>
    <div id="contentNL" class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-9 col-md-4 offset-3 offset-md-5">
                    <?php if ( ! empty( $opening ) ): ?><div class="opening"><?php echo $opening; ?></div><?php endif; ?>
                    <?php if ( ! empty( $lead ) ): ?><div class="lead"><?php echo $lead; ?></div><?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-9 offset-md-3">
                    <?php if ( ! empty( $cta ) ): ?><div class="cta"><img src="<?php echo esc_url($cta['url']); ?>" alt="Get on the list" class="img-fluid teaser-cta" onclick="openNewsletterModal()"></div><?php endif; ?>
                    <?php if ( ! empty( $ctam ) ): ?><div class="cta-mobile"><img src="<?php echo esc_url($ctam['url']); ?>" alt="Get on the list" class="img-fluid teaser-cta" onclick="openNewsletterModal()"></div><?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-9 col-md-4 offset-3 offset-md-5">
                    <?php if ( ! empty( $text ) ): ?><div class="text"><?php echo $text; ?></div><?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal newsletter" id="newsletterModal" style="display: none;">
        <div class="modal-backdrop"></div>
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <button class="modal-close" aria-label="Close modal">&times;</button>
                <div class="modal-body">
                    <?php if ( ! empty( $bsport ) ): ?>
                        <?php echo $bsport; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
