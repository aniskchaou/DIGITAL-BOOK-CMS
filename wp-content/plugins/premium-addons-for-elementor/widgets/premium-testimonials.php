<?php

/**
 * Premium Testimonials.
 */
namespace PremiumAddons\Widgets;

// Elementor Classes.
use Elementor\Modules\DynamicTags\Module as TagsModule;
use Elementor\Widget_Base;
use Elementor\Utils;
use Elementor\Control_Media;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Background;

// PremiumAddons Classes.
use PremiumAddons\Includes\Helper_Functions;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // If this file is called directly, abort.
}

/**
 * Class Premium_Testimonials
 */
class Premium_Testimonials extends Widget_Base {

	public function get_name() {
		return 'premium-addon-testimonials';
	}

	public function get_title() {
		return sprintf( '%1$s %2$s', Helper_Functions::get_prefix(), __( 'Testimonial', 'premium-addons-for-elementor' ) );
	}

	public function get_icon() {
		return 'pa-testimonials';
	}

	public function get_style_depends() {
		return array(
			'font-awesome-5-all',
			'premium-addons',
		);
	}

	public function get_categories() {
		return array( 'premium-elements' );
	}

	public function get_custom_help_url() {
		return 'https://premiumaddons.com/support/';
	}

	/**
	 * Register Testimonials controls.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() { // phpcs:ignore PSR2.Methods.MethodDeclaration.Underscore

		$this->start_controls_section(
			'premium_testimonial_person_settings',
			array(
				'label' => __( 'Author', 'premium-addons-for-elementor' ),
			)
		);

		$this->add_control(
			'premium_testimonial_person_image',
			array(
				'label'       => __( 'Image', 'premium-addons-for-elementor' ),
				'type'        => Controls_Manager::MEDIA,
				'dynamic'     => array( 'active' => true ),
				'default'     => array(
					'url' => Utils::get_placeholder_image_src(),
				),
				'description' => __( 'Choose an image for the author', 'premium-addons-for-elementor' ),
				'show_label'  => true,
			)
		);

		$this->add_control(
			'premium_testimonial_person_image_shape',
			array(
				'label'       => __( 'Image Style', 'premium-addons-for-elementor' ),
				'type'        => Controls_Manager::SELECT,
				'description' => __( 'Choose image style', 'premium-addons-for-elementor' ),
				'options'     => array(
					'square'  => __( 'Square', 'premium-addons-for-elementor' ),
					'circle'  => __( 'Circle', 'premium-addons-for-elementor' ),
					'rounded' => __( 'Rounded', 'premium-addons-for-elementor' ),
				),
				'default'     => 'circle',
			)
		);

		$this->add_control(
			'premium_testimonial_person_name',
			array(
				'label'       => __( 'Name', 'premium-addons-for-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => 'John Doe',
				'dynamic'     => array( 'active' => true ),
				'label_block' => true,
			)
		);

		$this->add_control(
			'premium_testimonial_person_name_size',
			array(
				'label'       => __( 'HTML Tag', 'premium-addons-for-elementor' ),
				'type'        => Controls_Manager::SELECT,
				'description' => __( 'Select a heading tag for author name', 'premium-addons-for-elementor' ),
				'options'     => array(
					'h1'   => 'H1',
					'h2'   => 'H2',
					'h3'   => 'H3',
					'h4'   => 'H4',
					'h5'   => 'H5',
					'h6'   => 'H6',
					'div'  => 'div',
					'span' => 'span',
					'p'    => 'p',
				),
				'default'     => 'h3',
				'label_block' => true,
			)
		);

		$this->add_control(
			'separator_text',
			array(
				'label'     => __( 'Separator', 'premium-addons-for-elementor' ),
				'type'      => Controls_Manager::TEXT,
				'dynamic'   => array( 'active' => true ),
				'default'   => '-',
				'separator' => 'befpre',
			)
		);

		$this->add_control(
			'separator_align',
			array(
				'label'        => __( 'Align', 'premium-addons-for-elementor' ),
				'type'         => Controls_Manager::SELECT,
				'options'      => array(
					'row'    => __( 'Inline', 'premium-addons-for-elementor' ),
					'column' => __( 'Block', 'premium-addons-for-elementor' ),
				),
				'default'      => 'row',
				'prefix_class' => 'premium-testimonial-separator-',
				'selectors'    => array(
					'{{WRAPPER}} .premium-testimonial-author-info' => 'flex-direction: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'separator_spacing',
			array(
				'label'      => __( 'Spacing', 'premium-addons-for-elementor' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', 'em' ),
				'default'    => array(
					'unit' => 'px',
					'size' => 5,
				),
				'selectors'  => array(
					'{{WRAPPER}}.premium-testimonial-separator-row .premium-testimonial-separator' => 'margin-right: calc( {{SIZE}}{{UNIT}}/2 ); margin-left: calc( {{SIZE}}{{UNIT}}/2 );',
					'{{WRAPPER}}.premium-testimonial-separator-column .premium-testimonial-separator' => 'margin-top: calc( {{SIZE}}{{UNIT}}/2 ); margin-bottom: calc( {{SIZE}}{{UNIT}}/2 );',
				),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'premium_testimonial_company_settings',
			array(
				'label' => __( 'Company', 'premium-addons-for-elementor' ),
			)
		);

		$this->add_control(
			'premium_testimonial_company_name',
			array(
				'label'       => __( 'Name', 'premium-addons-for-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => array( 'active' => true ),
				'default'     => 'Leap13',
				'label_block' => true,
			)
		);

		$this->add_control(
			'premium_testimonial_company_name_size',
			array(
				'label'       => __( 'HTML Tag', 'premium-addons-for-elementor' ),
				'type'        => Controls_Manager::SELECT,
				'description' => __( 'Select a heading tag for company name', 'premium-addons-for-elementor' ),
				'options'     => array(
					'h1'   => 'H1',
					'h2'   => 'H2',
					'h3'   => 'H3',
					'h4'   => 'H4',
					'h5'   => 'H5',
					'h6'   => 'H6',
					'div'  => 'div',
					'span' => 'span',
					'p'    => 'p',
				),
				'default'     => 'h4',
				'label_block' => true,
			)
		);

		$this->add_control(
			'premium_testimonial_company_link_switcher',
			array(
				'label'   => __( 'Link', 'premium-addons-for-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			)
		);

		$this->add_control(
			'premium_testimonial_company_link',
			array(
				'label'       => __( 'Link', 'premium-addons-for-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => array(
					'active'     => true,
					'categories' => array(
						TagsModule::POST_META_CATEGORY,
						TagsModule::URL_CATEGORY,
					),
				),
				'description' => __( 'Add company URL', 'premium-addons-for-elementor' ),
				'label_block' => true,
				'condition'   => array(
					'premium_testimonial_company_link_switcher' => 'yes',
				),
			)
		);

		$this->add_control(
			'premium_testimonial_link_target',
			array(
				'label'       => __( 'Link Target', 'premium-addons-for-elementor' ),
				'type'        => Controls_Manager::SELECT,
				'description' => __( 'Select link target', 'premium-addons-for-elementor' ),
				'options'     => array(
					'blank'  => __( 'Blank' ),
					'parent' => __( 'Parent' ),
					'self'   => __( 'Self' ),
					'top'    => __( 'Top' ),
				),
				'default'     => __( 'blank', 'premium-addons-for-elementor' ),
				'condition'   => array(
					'premium_testimonial_company_link_switcher' => 'yes',
				),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'premium_testimonial_settings',
			array(
				'label' => __( 'Content', 'premium-addons-for-elementor' ),
			)
		);

		$this->add_control(
			'premium_testimonial_content',
			array(
				'label'       => __( 'Testimonial Content', 'premium-addons-for-elementor' ),
				'type'        => Controls_Manager::WYSIWYG,
				'dynamic'     => array( 'active' => true ),
				'default'     => __( 'Donec id elit non mi porta gravida at eget metus. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Cras mattis consectetur purus sit amet fermentum. Nullam id dolor id nibh ultricies vehicula ut id elit. Donec id elit non mi porta gravida at eget metus.', 'premium-addons-for-elementor' ),
				'label_block' => true,
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_pa_docs',
			array(
				'label' => __( 'Helpful Documentations', 'premium-addons-for-elementor' ),
			)
		);

		$doc1_url = Helper_Functions::get_campaign_link( 'https://premiumaddons.com/docs/why-im-not-able-to-see-elementor-font-awesome-5-icons-in-premium-add-ons', 'editor-page', 'wp-editor', 'get-support' );

		$this->add_control(
			'doc_1',
			array(
				'type'            => Controls_Manager::RAW_HTML,
				'raw'             => sprintf( __( '%1$s I\'m not able to see Font Awesome icons in the widget » %2$s', 'premium-addons-for-elementor' ), '<a href="https://premiumaddons.com/docs/why-im-not-able-to-see-elementor-font-awesome-5-icons-in-premium-add-ons/?utm_source=papro-dashboard&utm_medium=papro-editor&utm_campaign=papro-plugin" target="_blank" rel="noopener">', '</a>' ),
				'content_classes' => 'editor-pa-doc',
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'premium_testimonial_image_style',
			array(
				'label' => __( 'Image', 'premium-addons-for-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'premium_testimonial_img_size',
			array(
				'label'      => __( 'Size', 'premium-addons-for-elementor' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', 'em' ),
				'default'    => array(
					'unit' => 'px',
					'size' => 110,
				),
				'range'      => array(
					'px' => array(
						'min' => 10,
						'max' => 150,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} .premium-testimonial-img-wrapper' => 'width: {{SIZE}}{{UNIT}}; height:{{SIZE}}{{UNIT}}',
				),
			)
		);

		$this->add_control(
			'premium_testimonial_img_border_width',
			array(
				'label'     => __( 'Border Width (PX)', 'premium-addons-for-elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'default'   => array(
					'unit' => 'px',
					'size' => 2,
				),
				'range'     => array(
					'px' => array(
						'min' => 0,
						'max' => 15,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .premium-testimonial-img-wrapper' => 'border-width: {{SIZE}}{{UNIT}}',
				),
			)
		);

		$this->add_control(
			'premium_testimonial_image_border_color',
			array(
				'label'     => __( 'Border Color', 'premium-addons-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				),
				'selectors' => array(
					'{{WRAPPER}} .premium-testimonial-img-wrapper' => 'border-color: {{VALUE}};',
				),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'premium_testimonials_person_style',
			array(
				'label' => __( 'Author', 'premium-addons-for-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'premium_testimonial_person_name_color',
			array(
				'label'     => __( 'Author Color', 'premium-addons-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				),
				'selectors' => array(
					'{{WRAPPER}} .premium-testimonial-person-name' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'author_name_typography',
				'label'    => __( 'Name Typograhy', 'premium-addons-for-elementor' ),
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .premium-testimonial-person-name',
			)
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			array(
				'name'     => 'author_name_shadow',
				'selector' => '{{WRAPPER}} .premium-testimonial-person-name',
			)
		);

		$this->add_control(
			'premium_testimonial_separator_color',
			array(
				'label'     => __( 'Separator Color', 'premium-addons-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				),
				'separator' => 'before',
				'condition' => array(
					'separator_text!' => '',
				),
				'selectors' => array(
					'{{WRAPPER}} .premium-testimonial-separator' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'separator_typography',
				'label'     => __( 'Separator Typograhy', 'premium-addons-for-elementor' ),
				'condition' => array(
					'separator_text!' => '',
				),
				'selector'  => '{{WRAPPER}} .premium-testimonial-separator',
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'premium_testimonial_company_style',
			array(
				'label' => __( 'Company', 'premium-addons-for-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'premium_testimonial_company_name_color',
			array(
				'label'     => __( 'Color', 'premium-addons-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_2,
				),
				'selectors' => array(
					'{{WRAPPER}} .premium-testimonial-company-link' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'company_name_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .premium-testimonial-company-link',
			)
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			array(
				'name'     => 'company_name_shadow',
				'selector' => '{{WRAPPER}} .premium-testimonial-company-link',
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'premium_testimonial_content_style',
			array(
				'label' => __( 'Content', 'premium-addons-for-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'premium_testimonial_content_color',
			array(
				'label'     => __( 'Color', 'premium-addons-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				),
				'selectors' => array(
					'{{WRAPPER}} .premium-testimonial-text-wrapper' => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .premium-testimonial-text-wrapper',
			)
		);

		$this->add_responsive_control(
			'premium_testimonial_margin',
			array(
				'label'      => __( 'Margin', 'premium-addons-for-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', 'em', '%' ),
				'default'    => array(
					'top'    => 15,
					'bottom' => 15,
					'left'   => 0,
					'right'  => 0,
					'unit'   => 'px',
				),
				'selectors'  => array(
					'{{WRAPPER}} .premium-testimonial-text-wrapper' => 'margin: {{top}}{{UNIT}} {{right}}{{UNIT}} {{bottom}}{{UNIT}} {{left}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'premium_testimonial_quotes',
			array(
				'label' => __( 'Quotation Icon', 'premium-addons-for-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'premium_testimonial_quote_icon_color',
			array(
				'label'     => __( 'Color', 'premium-addons-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => 'rgba(110,193,228,0.2)',
				'selectors' => array(
					'{{WRAPPER}} .premium-testimonial-upper-quote, {{WRAPPER}} .premium-testimonial-lower-quote'   => 'color: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'premium_testimonial_quotes_size',
			array(
				'label'      => __( 'Size', 'premium-addons-for-elementor' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', 'em', '%' ),
				'default'    => array(
					'unit' => 'px',
					'size' => 120,
				),
				'range'      => array(
					'px' => array(
						'min' => 5,
						'max' => 250,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} .premium-testimonial-upper-quote, {{WRAPPER}} .premium-testimonial-lower-quote' => 'font-size: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->add_responsive_control(
			'premium_testimonial_upper_quote_position',
			array(
				'label'      => __( 'Top Icon Position', 'premium-addons-for-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', 'em', '%' ),
				'default'    => array(
					'top'  => 70,
					'left' => 12,
					'unit' => 'px',
				),
				'selectors'  => array(
					'{{WRAPPER}} .premium-testimonial-upper-quote' => 'top: {{TOP}}{{UNIT}}; left:{{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->add_responsive_control(
			'premium_testimonial_lower_quote_position',
			array(
				'label'      => __( 'Bottom Icon Position', 'premium-addons-for-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', 'em', '%' ),
				'default'    => array(
					'bottom' => 3,
					'right'  => 12,
					'unit'   => 'px',
				),
				'selectors'  => array(
					'{{WRAPPER}} .premium-testimonial-lower-quote' => 'right: {{RIGHT}}{{UNIT}}; bottom: {{BOTTOM}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'premium_testimonial_container_style',
			array(
				'label' => __( 'Container', 'premium-addons-for-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'premium_testimonial_background',
				'types'    => array( 'classic', 'gradient' ),
				'selector' => '{{WRAPPER}} .premium-testimonial-content-wrapper',
			)
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'     => 'premium_testimonial_container_border',
				'selector' => '{{WRAPPER}} .premium-testimonial-content-wrapper',
			)
		);

		$this->add_control(
			'premium_testimonial_container_border_radius',
			array(
				'label'      => __( 'Border Radius', 'premium-addons-for-elementor' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', 'em', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .premium-testimonial-content-wrapper' => 'border-radius: {{SIZE}}{{UNIT}}',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'premium_testimonial_container_box_shadow',
				'selector' => '{{WRAPPER}} .premium-testimonial-content-wrapper',
			)
		);

		$this->add_responsive_control(
			'premium_testimonial_box_padding',
			array(
				'label'      => __( 'Padding', 'premium-addons-for-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', 'em', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .premium-testimonial-content-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				),
			)
		);

		$this->end_controls_section();

	}

	/**
	 * Render Testimonials widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_inline_editing_attributes( 'premium_testimonial_person_name' );
		$this->add_inline_editing_attributes( 'premium_testimonial_company_name' );
		$this->add_inline_editing_attributes( 'premium_testimonial_content', 'advanced' );
		$person_title_tag = $settings['premium_testimonial_person_name_size'];

		$company_title_tag = $settings['premium_testimonial_company_name_size'];

		$image_src = '';

		if ( ! empty( $settings['premium_testimonial_person_image']['url'] ) ) {
			$image_src = $settings['premium_testimonial_person_image']['url'];
			$alt       = esc_attr( Control_Media::get_image_alt( $settings['premium_testimonial_person_image'] ) );
		}

		$this->add_render_attribute(
			'testimonial',
			'class',
			array(
				'premium-testimonial-box',
			)
		);

		$this->add_render_attribute(
			'img_wrap',
			'class',
			array(
				'premium-testimonial-img-wrapper',
				$settings['premium_testimonial_person_image_shape'],
			)
		);

		?>
	
	<div <?php echo $this->get_render_attribute_string( 'testimonial' ); ?>>
		<div class="premium-testimonial-container">
			<i class="fa fa-quote-left premium-testimonial-upper-quote"></i>
			<div class="premium-testimonial-content-wrapper">
				<?php if ( ! empty( $image_src ) ) : ?>
					<div <?php echo $this->get_render_attribute_string( 'img_wrap' ); ?>>
						<img src="<?php echo $image_src; ?>" alt="<?php echo $alt; ?>" class="premium-testimonial-person-image">
					</div>
				<?php endif; ?>

				<div class="premium-testimonial-text-wrapper">
					<div <?php echo $this->get_render_attribute_string( 'premium_testimonial_content' ); ?>>
						<?php echo $settings['premium_testimonial_content']; ?>
					</div>
				</div>

				<div class="premium-testimonial-author-info">
					<<?php echo $person_title_tag; ?> class="premium-testimonial-person-name">
						<span <?php echo $this->get_render_attribute_string( 'premium_testimonial_person_name' ); ?>><?php echo $settings['premium_testimonial_person_name']; ?></span>
					</<?php echo $person_title_tag; ?>>
					
					<span class="premium-testimonial-separator"><?php echo esc_html( $settings['separator_text'] ); ?></span>
					
					<<?php echo $company_title_tag; ?> class="premium-testimonial-company-name">
					<?php if ( $settings['premium_testimonial_company_link_switcher'] === 'yes' ) : ?>
						<a class="premium-testimonial-company-link" href="<?php echo $settings['premium_testimonial_company_link']; ?>" target="_<?php echo $settings['premium_testimonial_link_target']; ?>">
							<span <?php echo $this->get_render_attribute_string( 'premium_testimonial_company_name' ); ?>><?php echo $settings['premium_testimonial_company_name']; ?></span>
						</a>
					<?php else : ?>
						<span class="premium-testimonial-company-link" <?php echo $this->get_render_attribute_string( 'premium_testimonial_company_name' ); ?>>
							<?php echo $settings['premium_testimonial_company_name']; ?>
						</span>
					<?php endif; ?>
					</<?php echo $company_title_tag; ?>>
				</div>
			</div>
			<i class="fa fa-quote-right premium-testimonial-lower-quote"></i>
		</div>
	</div>
		<?php

	}

	/**
	 * Render Testimonials widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function content_template() {
		?>
		<#
		
			view.addInlineEditingAttributes('premium_testimonial_person_name');
			view.addInlineEditingAttributes('premium_testimonial_company_name');
			view.addInlineEditingAttributes('premium_testimonial_content', 'advanced');
			view.addRenderAttribute('premium_testimonial_company_name', 'class', 'premium-testimonial-company-link');
			
			var personTag = settings.premium_testimonial_person_name_size,
				companyTag = settings.premium_testimonial_company_name_size,
				imageSrc = '',
				imageSrc,
				borderRadius;

			if( '' != settings.premium_testimonial_person_image.url ) {
				imageSrc = settings.premium_testimonial_person_image.url;
			}
		
			view.addRenderAttribute('testimonial', 'class', [
				'premium-testimonial-box'
			]);

			view.addRenderAttribute('img_wrap', 'class', [
				'premium-testimonial-img-wrapper',
				settings.premium_testimonial_person_image_shape
			]);
			
		
		#>
		
			<div {{{ view.getRenderAttributeString('testimonial') }}}>
				<div class="premium-testimonial-container">
					<i class="fa fa-quote-left premium-testimonial-upper-quote"></i>
					<div class="premium-testimonial-content-wrapper">
						<# if ( '' != imageSrc ) { #>
							<div {{{ view.getRenderAttributeString('img_wrap') }}}>
								<img src="{{ imageSrc }}" alt="premium-image" class="premium-testimonial-person-image">
							</div>
						<# } #>
						<div class="premium-testimonial-text-wrapper">
							<div {{{ view.getRenderAttributeString('premium_testimonial_content') }}}>{{{ settings.premium_testimonial_content }}}</div>
						</div>
						
						<div class="premium-testimonial-author-info">
							<{{{personTag}}} class="premium-testimonial-person-name">
								<span {{{ view.getRenderAttributeString('premium_testimonial_person_name') }}}>
								{{{ settings.premium_testimonial_person_name }}}
								</span>
							</{{{personTag}}}>
							
							<span class="premium-testimonial-separator"> {{{ settings.separator_text }}} </span>
							
							<{{{companyTag}}} class="premium-testimonial-company-name">
								<a href="{{ settings.premium_testimonial_company_link }}" {{{ view.getRenderAttributeString('premium_testimonial_company_name') }}}>
									{{{ settings.premium_testimonial_company_name }}}
								</a>
							</{{{companyTag}}}>
						</div>
						
					</div>
					
					<i class="fa fa-quote-right premium-testimonial-lower-quote"></i>
					
				</div>
			</div>
		
		<?php
	}

}
