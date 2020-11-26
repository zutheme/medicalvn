<?php
namespace Elementor\Core\Kits\Documents\Tabs;

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Controls\Repeater as Global_Style_Repeater;
use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Global_Colors extends Tab_Base {

	const COLOR_PRIMARY = 'globals/colors?id=primary';
	const COLOR_SECONDARY = 'globals/colors?id=secondary';
	const COLOR_TEXT = 'globals/colors?id=text';
	const COLOR_ACCENT = 'globals/colors?id=accent';

	public function get_id() {
		return 'global-colors';
	}

	public function get_title() {
		return __( 'Global Colors', 'elementor' );
	}

	protected function register_tab_controls() {
		$this->start_controls_section(
			'section_global_colors',
			[
				'label' => __( 'Global Colors', 'elementor' ),
				'tab' => $this->get_id(),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'title',
			[
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'required' => true,
			]
		);

		// Color Value
		$repeater->add_control(
			'color',
			[
				'type' => Controls_Manager::COLOR,
				'label_block' => true,
				'dynamic' => [],
				'selectors' => [
					'{{WRAPPER}}' => '--e-global-color-{{_id.VALUE}}: {{VALUE}}',
				],
				'global' => [
					'active' => false,
				],
			]
		);

		$default_colors = [
			[
				'_id' => 'primary',
				'title' => __( 'Primary', 'elementor' ),
				'color' => '#6EC1E4',
			],
			[
				'_id' => 'secondary',
				'title' => __( 'Secondary', 'elementor' ),
				'color' => '#54595F',
			],
			[
				'_id' => 'text',
				'title' => __( 'Text', 'elementor' ),
				'color' => '#7A7A7A',
			],
			[
				'_id' => 'accent',
				'title' => __( 'Accent', 'elementor' ),
				'color' => '#61CE70',
			],
		];

		$this->add_control(
			'system_colors',
			[
				'type' => Global_Style_Repeater::CONTROL_TYPE,
				'fields' => $repeater->get_controls(),
				'default' => $default_colors,
				'item_actions' => [
					'add' => false,
					'remove' => false,
				],
			]
		);

		$this->add_control(
			'custom_colors',
			[
				'type' => Global_Style_Repeater::CONTROL_TYPE,
				'fields' => $repeater->get_controls(),
			]
		);

		$this->end_controls_section();
	}
}
