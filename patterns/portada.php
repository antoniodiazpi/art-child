<?php
/**
 * Title: Portada · Una línea, una vida
 * Slug: art-child/portada
 * Categories: art-child, featured
 * Keywords: portada, inicio, hero, dibujo
 * Description: Titular grande con el estilo «Trazo», entradilla, dos botones y un dibujo de una sola línea que se dibuja solo.
 *
 * @package Art_Child
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"className":"art-portada","layout":{"type":"constrained"}} -->
<div class="wp-block-group art-portada"><!-- wp:paragraph {"align":"center","className":"art-eyebrow"} -->
<p class="has-text-align-center art-eyebrow">Cuaderno de dibujo</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","level":1,"className":"is-style-trazo"} -->
<h1 class="wp-block-heading has-text-align-center is-style-trazo">Dibujar una vida</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","className":"art-lead"} -->
<p class="has-text-align-center art-lead">Una línea cada día. Un lugar tranquilo para mirar, aprender y volver a dibujar.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#obra">Ver la obra</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#proyecto">Sobre el proyecto</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:image {"sizeSlug":"full","linkDestination":"none","lightbox":{"enabled":false}} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/linea.svg' ); ?>" alt="Una sola línea continua que dibuja un bucle y un corazón"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->
