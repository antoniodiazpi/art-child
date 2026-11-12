<?php
/**
 * Title: Obra destacada
 * Slug: art-child/obra
 * Categories: art-child, featured
 * Keywords: obra, dibujo, cuadro, galería
 * Description: Una obra enmarcada con el estilo «Marco», su cartela y un breve texto. Sustituye la imagen por tu dibujo.
 *
 * @package Art_Child
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:columns {"verticalAlignment":"center","anchor":"obra"} -->
<div class="wp-block-columns are-vertically-aligned-center" id="obra"><!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"is-style-marco"} -->
<figure class="wp-block-image size-full is-style-marco"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/obra.svg' ); ?>" alt="Dibujo a una sola línea: un bucle y un corazón sobre papel"/><figcaption class="wp-element-caption"><strong>Una línea, una vida</strong> · Tinta sobre papel, 2026</figcaption></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"className":"art-eyebrow"} -->
<p class="art-eyebrow">Obra destacada</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading">Una línea, una vida.</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Cuenta aquí la historia de la obra: qué te llevó a dibujarla, con qué materiales y cuánto tiempo le dedicaste.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"art-enlace"} -->
<p class="art-enlace"><a href="#">Ver la serie completa ›</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->
