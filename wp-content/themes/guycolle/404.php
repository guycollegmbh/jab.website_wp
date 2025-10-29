<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header();

$gruppe = get_field('header_404', 'option');
$title = $gruppe['headline'];
?>
<div class="error-page">
    <div class="error-box">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="text-layer">
                        <span class="error">404 - Oops...</span>
                        <h1><?php echo $title; ?></h1>
                        <a href="/"><i class="fas fa-arrow-left"></i> Zurück zur Startseite</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
