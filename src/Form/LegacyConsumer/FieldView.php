<?php

namespace Give\Form\LegacyConsumer;

use Give\Framework\FieldsAPI\FormField;
use Give\Framework\FieldsAPI\FormField\FieldTypes;

/**
 * @since 2.10.2
 */
class FieldView {

	/**
	 * @since 2.10.2
	 *
	 * @param FormField $field
	 *
	 * @return void
	 */
	public static function render( FormField $field ) {
		echo "<div class='form-row form-row-wide' data-field-type='{$field->getType()}' data-field-name='{$field->getName()}'>";
		ob_start();
		switch ( $field->getType() ) {
			case FieldTypes::TYPE_HIDDEN: // Hidden does not need a label for obvious reasons.
			case FieldTypes::TYPE_HTML: // This is a free form HTML field. They can add a label if they want.
			case FieldTypes::TYPE_RADIO: // Radio provides its own label
				break;
			default:
				include plugin_dir_path( __FILE__ ) . '/templates/label.html.php';
				break;
		}
		include plugin_dir_path( __FILE__ ) . '/templates/' . $field->getType() . '.html.php';
		echo self::mergeAttributes( ob_get_clean(), $field );
		echo '</div>';
	}

	/**
	 * @since 2.10.2
	 *
	 * @param string $html
	 * @param FormField $field
	 *
	 * @return string
	 */
	protected static function mergeAttributes( $html, $field ) {
		$attributes = array_map(
			function( $key, $value ) {
				return sprintf( '%s="%s"', $key, esc_attr( $value ) );
			},
			array_keys( $field->getAttributes() ),
			array_values( $field->getAttributes() )
		);
		return str_replace( '@attributes', implode( ' ', $attributes ), $html );
	}
}
