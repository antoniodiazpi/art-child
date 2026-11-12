<?php
/**
 * Art Child — tema hijo de Kadence para «Dibujar una vida».
 *
 * Proyecto personal: https://dibujarunavida.com/
 * SEO y GEO: https://trailseo.com/ · Mantenimiento de WordPress: https://nexopress.com/
 *
 * @package Art_Child
 */

defined( 'ABSPATH' ) || exit;

define( 'ART_CHILD_VERSION', '1.0.0' );

/**
 * Paletas de color. Cada nombre es un material de dibujo; los huecos
 * siguen el orden de Kadence (1 acento, 3 titulares, 4 texto, 8–9 fondos).
 */
function art_child_palettes() {
	$names = array( 'Ultramar', 'Cobalto', 'Tinta', 'Grafito', 'Carboncillo', 'Difumino', 'Lienzo', 'Papel', 'Lámina' );
	$sets  = array(
		'palette'        => array( '#2a3fd4', '#1a2a99', '#1d1d1f', '#3a3a3c', '#6e6e73', '#86868b', '#e8e6e1', '#f5f4f1', '#ffffff' ), // Día.
		'second-palette' => array( '#7b93ff', '#a9b8ff', '#f5f5f7', '#d2d2d7', '#a1a1a6', '#6e6e73', '#2c2c2e', '#0f0f10', '#1c1c1e' ), // Noche.
	);
	$sets['third-palette'] = $sets['palette'];

	$palettes = array( 'active' => 'palette' );
	foreach ( $sets as $key => $colors ) {
		foreach ( $colors as $i => $color ) {
			$palettes[ $key ][] = array(
				'color' => $color,
				'slug'  => 'palette' . ( $i + 1 ),
				'name'  => $names[ $i ],
			);
		}
	}
	return $palettes;
}

/**
 * 1. Estilos: Kadence carga los suyos; aquí solo se añade el del tema hijo,
 * después, para que pueda afinarlos.
 */
add_action(
	'wp_enqueue_scripts',
	function () {
		wp_enqueue_style( 'art-child', get_stylesheet_uri(), array(), ART_CHILD_VERSION );
	},
	20
);

add_action(
	'after_setup_theme',
	function () {
		add_editor_style( 'style.css' );
	},
	20
);

/**
 * 2. Valores por defecto de Kadence: paleta y escala tipográfica.
 * Son solo el punto de partida; todo sigue editable en el Personalizador.
 */
add_filter(
	'kadence_global_palette_defaults',
	function () {
		return wp_json_encode( art_child_palettes() );
	}
);

add_filter(
	'kadence_theme_options_defaults',
	function ( $defaults ) {
		// Escritorio, tableta, móvil (px) e interlineado.
		$scale = array(
			'h1_font' => array( 56, 44, 36, 1.07 ),
			'h2_font' => array( 40, 34, 28, 1.1 ),
			'h3_font' => array( 28, 24, 22, 1.2 ),
			'h4_font' => array( 22, 20, 19, 1.3 ),
			'h5_font' => array( 19, 18, 17, 1.4 ),
			'h6_font' => array( 13, 13, 13, 1.5 ),
		);
		foreach ( $scale as $key => $v ) {
			if ( isset( $defaults[ $key ] ) && is_array( $defaults[ $key ] ) ) {
				$defaults[ $key ]['size']       = array( 'desktop' => $v[0], 'tablet' => $v[1], 'mobile' => $v[2] );
				$defaults[ $key ]['lineHeight'] = array( 'desktop' => $v[3] );
				$defaults[ $key ]['weight']     = '600';
				$defaults[ $key ]['variant']    = '600';
			}
		}
		if ( isset( $defaults['header_sticky'] ) ) {
			$defaults['header_sticky'] = 'main'; // Cabecera fija y translúcida.
		}
		return $defaults;
	}
);

/**
 * 3. La paleta de Kadence se guarda para todo el sitio. Al activar el tema
 * se aparca la anterior para que se vea la de Art Child; al cambiar de
 * tema se devuelve tal cual estaba.
 */
add_action(
	'after_switch_theme',
	function () {
		$current = get_option( 'kadence_global_palette' );
		if ( false !== $current && false === get_option( 'art_child_paleta_anterior' ) ) {
			update_option( 'art_child_paleta_anterior', $current, false );
			delete_option( 'kadence_global_palette' );
		}
	}
);

add_action(
	'switch_theme',
	function () {
		$previous = get_option( 'art_child_paleta_anterior' );
		if ( false !== $previous ) {
			update_option( 'kadence_global_palette', $previous );
			delete_option( 'art_child_paleta_anterior' );
		}
	}
);

/**
 * 4. Estilos de bloque y categoría de patrones.
 * Los patrones viven en /patterns y WordPress los registra solo.
 */
add_action(
	'init',
	function () {
		register_block_style( 'core/heading', array( 'name' => 'trazo', 'label' => 'Trazo' ) );
		register_block_style( 'core/image', array( 'name' => 'marco', 'label' => 'Marco' ) );
		register_block_style( 'core/group', array( 'name' => 'lamina', 'label' => 'Lámina' ) );

		register_block_pattern_category( 'art-child', array( 'label' => 'Dibujar una vida' ) );
	}
);

/**
 * 5. Las imágenes se amplían al hacer clic (lightbox nativo de WordPress):
 * en una web de arte, la obra se mira en grande.
 */
add_filter(
	'wp_theme_json_data_theme',
	function ( $theme_json ) {
		return $theme_json->update_with(
			array(
				'version'  => 2,
				'settings' => array(
					'blocks' => array(
						'core/image' => array( 'lightbox' => array( 'enabled' => true ) ),
					),
				),
			)
		);
	}
);

/**
 * 6. Firma: créditos del proyecto al final de cada página.
 * El texto está en template-parts/firma.php. Para quitarla:
 * remove_action( 'kadence_after_footer', 'art_child_firma' );
 */
function art_child_firma() {
	get_template_part( 'template-parts/firma' );
}
add_action( 'kadence_after_footer', 'art_child_firma' );
