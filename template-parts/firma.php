<?php
/**
 * Firma: créditos del proyecto, al final de cada página.
 * Edita aquí el texto si quieres cambiarlo.
 *
 * @package Art_Child
 */

defined( 'ABSPATH' ) || exit;
?>
<aside class="art-firma" aria-label="Sobre este proyecto">
	<div class="site-container">
		<svg class="art-firma__trazo" viewBox="0 64 800 196" aria-hidden="true" focusable="false">
			<path pathLength="1" d="M20 226 C90 230 150 220 205 224 C255 228 292 182 268 150 C246 121 204 146 226 178 C246 206 300 222 352 214 C395 208 430 222 460 244 C420 212 376 170 380 128 C384 88 440 78 460 118 C480 78 536 88 540 128 C544 170 500 212 460 244 C492 232 530 220 580 222 C640 224 700 230 780 222"/>
		</svg>
		<p>
			<strong><?php echo esc_html( get_bloginfo( 'name' ) ); ?></strong> es mi proyecto personal.
			¿Quieres que tu web llegue más lejos? Contrata SEO&nbsp;y&nbsp;GEO en
			<a href="https://trailseo.com/">trailseo.com</a> y el mantenimiento de tu WordPress en
			<a href="https://nexopress.com/">nexopress.com</a>.
		</p>
	</div>
</aside>
