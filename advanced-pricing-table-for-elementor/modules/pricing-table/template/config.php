<?php
/**
 * Info box widget class
 *
 * @package Advanced_Pricing
 */

use Elementor\Widget_Base;
use Elementor\Scheme_Typography;
use Elementor\Utils;
use Elementor\Control_Media;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Background as Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Perfecto APE Portfolio
 *
 * Elementor widget for APE portfolio
 *
 * @since 1.0.0
 */
class APE_table extends Widget_Base {

	public function get_name() {
		return 'APE-pricingtable';
	}

	public function get_title() {
		return esc_html__( 'Pricing Table', 'ap_elementor' );
	}

	public function get_icon() {
		return 'ad ad-injection';
	}

	public function get_categories() {
		return [ 'APE_elementor' ];
	}

	/**
	 * A list of scripts that the widgets is depended in
	 * @since 1.3.0
	 **/
	public function get_script_depends() {
		return [ 'APE-for-elementor-portfolio' ];
	}

	protected function _register_controls() {
		
		$this->start_controls_section(
			'_section_media',
			[
				'label' => __( 'Common Content', 'ap_elementor' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

      $this->add_control(
		    'style',
				[
					'label'   => __( 'Visual Style', 'ap_elementor' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'style1',
					'options' => [
						'style1' => __( 'Default Pricing Table', 'ap_elementor' ),
						'style2' => __( 'Pricing Table With Icon', 'ap_elementor' ),
						'style3' => __( 'Pricing Table Half Moon', 'ap_elementor' ),
				],
			]
        );
        
      $this->add_control(
			'title',
				[
					'label'       => __( 'Title', 'ap_elementor' ),
					'type'        => Controls_Manager::TEXT,
					'default'     => __( 'Title', 'ap_elementor' ),
					'placeholder' => __( 'Type Pricing Title Here', 'ap_elementor' ),		
				]
			);

			  
      $this->add_control(
			'desc',
				[
					'label'       => __( 'Description', 'ap_elementor' ),
					'type'        => Controls_Manager::TEXTAREA,
					'default'     => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has be', 'ap_elementor' ),
					'placeholder' => __( 'Type Pricing desc Here', 'ap_elementor' ),	
					'condition'   => [
						'style' => [ 'style8', 'style5'],
					],	
				]
			);

			$this->add_control(
			'stock',
				[
					'label'       => __( 'Stock', 'ap_elementor' ),
					'type'        => Controls_Manager::TEXT,
					'default'     => __( 'In Stock', 'ap_elementor' ),
					'placeholder' => __( 'Type Pricing Stock', 'ap_elementor' ),	
					'condition' => [	'style' => [ 'style5' ], ],	
				]
			);

	  $this->add_control(
            'image',
           		 [
                'label'     => __( 'Photo', 'ap_elementor' ),
                'type'      => Controls_Manager::MEDIA,
                'default'   => [ 'url' => Utils::get_placeholder_image_src(),],
                'condition' => [
										'style' => [ 'style5'],
										],
                ]
		    );
	   $this->add_control(
			'icon',
			[
				'label'       => __( 'Icon', 'advanced-addons-elementor' ),
				'type'        => Controls_Manager::ICON,
				'label_block' => true,
				'default'     => 'fa fa-angellist',
				'condition' => [
										'style' => [ 'style2'],
				],
                
			]
        );
        
				
		$this->end_controls_section();
				
		$this->start_controls_section(
			'_section_price',
				[
					'label' => __( 'Price', 'ap_elementor' ),
					'tab'   => Controls_Manager::TAB_CONTENT,
				]
			);

      $this->add_control(
			'price',
				[
					'label'       => __( 'Price', 'ap_elementor' ),
					'type'        => Controls_Manager::TEXT,
					'default'     => __( '49', 'ap_elementor' ),
					'placeholder' => __( 'Type Price here', 'ap_elementor' ),							
				]
				);

		$this->add_control(
				'price_cur',
						[
							'label'       => __( 'Price Currency', 'ap_elementor' ),
							'type'        => Controls_Manager::TEXT,
							'default'     => __( '$', 'ap_elementor' ),
							'placeholder' => __( 'Type Price Currency', 'ap_elementor' ),
						]
				);

		$this->add_control(
				'price_period',
						[
							'label'       => __( 'Price Period (per)', 'ap_elementor' ),
							'type'        => Controls_Manager::TEXT,
							'default'     => __( 'Per Month', 'ap_elementor' ),
							'placeholder' => __( 'Type Price Period', 'ap_elementor' ),			
						]
        		);
		$this->end_controls_section();
			
			$this->start_controls_section(
            '_section_social',
            [
                'label' => __( 'Fetures', 'ap_elementor' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
					'style' => [ 'style1','style2','style3','style4','style6','style7','style8'],
				],
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'list_title', [
                'label'         => __( 'Fetures', 'ap_elementor' ),
                'placeholder'   => __( 'Add Your Fetures', 'ap_elementor' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => false,
                'autocomplete'  => false,
                'show_external' => false,
                
            ]
				);
				$repeater->add_control(
						'show_avai',
						[
							'label'        => __( 'Show Available', 'plugin-domain' ),
							'type'         => Controls_Manager::SWITCHER,
							'label_on'     => __( 'Show', 'ap_elementor' ),
							'label_off'    => __( 'Hide', 'ap_elementor' ),
							'return_value' => 'yes',
							'default'      => 'yes',
							// 'condition'    => [
							// 			'style' => [ 'style7'],
							// 			],
						]
				);


        $repeater->end_controls_tab();
        
        $repeater->end_controls_tabs();

        $this->add_control(
					'list',
							[
								'label' => __( 'Futures List', 'ap_elementor' ),
								'type' => \Elementor\Controls_Manager::REPEATER,
								'fields' => $repeater->get_controls(),
								'default' => [
									[
										'list_title' => __( '24/7 Tech Suport', 'ap_elementor' ),
										'show_avai'  => '',
									],

									[
										'list_title' => __( 'Lorem ipsum dolor.', 'ap_elementor' ),
										'show_avai'  => '',
									],

									[
										'list_title' => __( 'ipsum dolor sit amet.', 'ap_elementor' ),
										'show_avai'  => '',
									],

									[
										'list_title' => __( 'dolor sit amet.', 'ap_elementor' ),
										'show_avai'  => '',
									],

								],
								'title_field' => '{{{ list_title }}}',
							]
						);

				$this->end_controls_section();
				
		$this->end_controls_section();
		$this->start_controls_section(
            '_section_footer',
                 [
					'label' => __( 'Footer', 'ap_elementor' ),
					'tab'   => Controls_Manager::TAB_CONTENT,
                 ]
				);

		$this->add_control(
            'button_text',
            [
                'label'       => __( 'Text', 'ap_elementor' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Button', 'ap_elementor' ),
                'placeholder' => __( 'Type button text here', 'ap_elementor' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'link',
            [
                'label'       => __( 'Link', 'ap_elementor' ),
                'type'        => Controls_Manager::URL,
                'placeholder' => __( 'https://example.com/', 'ap_elementor' ),
            ]
        );

		$this->end_controls_section();

		$this->start_controls_section(
            '_section_ribbon',
					[
						'label' => __( 'Ribbon', 'ap_elementor' ),
						'tab'   => Controls_Manager::TAB_CONTENT,
					]
				);

		$this->add_control(
			'show_feture',
				[
					'label'   => esc_html__( 'Futured ?', 'ap_elementor' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'no',
				]
        );
			
		$this->end_controls_section();

		// Style Control

		 $this->start_controls_section(
            '_section_style_common',
            [
                'label' => __( 'Style', 'ap_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
		 $this->add_control(
			'pricing_border_width',
			[
				'label' => __( 'Border Width', 'ap_elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 1,
				],
				'selectors' => [
					'{{WRAPPER}} .advanced_addons_pricing_tbl' => 'border-width: {{SIZE}}{{UNIT}} !important;',
				],
			]
		);
		  $this->add_control(
            'border_color',
            [
                'label'     => __( 'Icon Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_pricing_tbl' => 'border-color: {{VALUE}}',
                ]
            ]
        );

			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'prcing_box_shadow',
					'label' => __( 'Box Shadow', 'ap_elementor' ),
					'selector' => '{{WRAPPER}} .advanced_addons_pricing_tbl',
				]
			);

		  $this->add_group_control(
	        Group_Control_Background::get_type(),
	        [
	            'name' => 'pricing_background',
	            'label' => __( 'Background Color', 'ap_elementor' ),
	            'types' => ['gradient'],
	            'selector' => '{{WRAPPER}} .advanced_addons_pricing_tbl',
	            'condition' => [
					'style' => [ 'style1'],
				],
		        ]
		    );

		  $this->add_group_control(
	        Group_Control_Background::get_type(),
	        [
	            'name' => 'pricing_halfmoon_background',
	            'label' => __( 'Background Color', 'ap_elementor' ),
	            'types' => ['gradient'],
	            'selector' => '{{WRAPPER}} .advanced_addons_pricing_tbl.type-8 .block_body',
	            'condition' => [
					'style' => [ 'style3'],
				],
		        ]
		    );

		  $this->add_responsive_control(
		    'border_style',
				[
					'label'   => __( 'Border Style', 'ap_elementor' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'border-solid',
					'options' => [
						' border-none ' => __( 'None', 'ap_elementor' ),
						' border-dashed ' => __( 'Dashed', 'ap_elementor' ),
						' border-solid ' => __( 'Solid', 'ap_elementor' ),
						],
					'condition' => [
						'style' => [ 'style1'],
					],

			]
        );

		 $this->add_responsive_control(
            'pricing_padding',
            [
                'label'      => __( 'Padding', 'ap_elementor'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .advanced_addons_pricing_tbl ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'pricing_margin',
            [
                'label'      => __( 'Margin', 'ap_elementor'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .advanced_addons_pricing_tbl' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->end_controls_section();

         $this->start_controls_section(
            '_section_style_color',
            [
                'label' => __( 'Header', 'ap_elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

         $this->add_control(
            'icon_color',
            [
                'label'     => __( 'Icon Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_pricing_tbl .pricing_icon' => 'color: {{VALUE}}',
                ],
                'condition' => [
					'style' => [ 'style2'],
				],
            ]
        );

        $this->add_control(
			'icon_size',
			[
				'label' => __( 'Icon Size', 'ap_elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 36,
				],
				'selectors' => [
					'{{WRAPPER}} .currency_icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'style' => [ 'style2'],
				],
			]
		);

        $this->add_group_control(
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'content_typography',
                'label'    => __( 'Title Typography', 'advanced-addons-elementor' ),
                'selector' => '{{WRAPPER}} .advanced_addons_pricing_tbl .pricing_title',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

		$this->add_control(
            'title_color',
            [
                'label'     => __( 'Title Icon Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_pricing_tbl .pricing_title' => 'color: {{VALUE}}',
                ],
            ]
        );

          $this->end_controls_section();
          // 
           $this->start_controls_section(
	            '_section_pricing',
	            [
	                'label' => __( 'Pricing Area', 'ap_elementor' ),
	                'tab'   => Controls_Manager::TAB_STYLE,
	            ]
	        );

         $this->add_control(
            'pricing_icon_color',
            [
                'label'     => __( 'Currency Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .currency_icon' => 'color: {{VALUE}}',
                ]
            ]
        );


        $this->add_group_control(
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'price_value_typography',
                'label'    => __( 'Pricing Value Typography', 'advanced-addons-elementor' ),
                'selector' => '{{WRAPPER}} .advanced_addons_pricing_tbl .pricing_value',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_control(
            'price_value_color',
            [
                'label'     => __( 'Pricing value Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_pricing_tbl .pricing_value' => 'color: {{VALUE}}',
                ],
            ]
        );

		$this->add_control(
            'duration_color',
            [
                'label'     => __( 'Duration Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_pricing_tbl .pricing_duration' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'duration_typography',
                'label'    => __( 'Pricing Value Typography', 'advanced-addons-elementor' ),
                'selector' => '{{WRAPPER}} .advanced_addons_pricing_tbl .pricing_duration',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

        

          $this->end_controls_section();
          //  End

          //  Start Pricing Circle
          $this->start_controls_section(
	            '_section_pricing_color',
	            [
	                'label' => __( 'Pricing Circle', 'ap_elementor' ),
	                'tab'   => Controls_Manager::TAB_STYLE,
	                'condition'     => [
		                'style' => array('style1','style3'),
		            ]
	            ]
	        );

          $this->add_group_control(
		        Group_Control_Background::get_type(),
		        [
		            'name' => 'pricing_circle_background',
		            'label' => __( 'Background Color', 'ap_elementor' ),
		            'types' => ['gradient'],
		            'selector' => '{{WRAPPER}} .block_circle',
		            
			        ]
			    );
          	$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'circle_shadow',
					'label' => __( 'Box Shadow', 'ap_elementor' ),
					'selector' => '{{WRAPPER}} .block_circle',
				]
			);

          $this->end_controls_section();
          // End Pricing Circle

          //  Start Pricing Body
           $this->start_controls_section(
	            '_section_pricing_body',
	            [
	                'label' => __( 'Pricing Body', 'ap_elementor' ),
	                'tab'   => Controls_Manager::TAB_STYLE,
	            ]
	        );

         $this->add_group_control(
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'option_typography',
                'label'    => __( 'Pricing Option Typography', 'advanced-addons-elementor' ),
                'selector' => '{{WRAPPER}} .advanced_addons_pricing_tbl .block_body li',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

         $this->add_control(
            'option_color',
            [
                'label'     => __( 'Option Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_pricing_tbl .block_body li' => 'color: {{VALUE}}',
                ],
            ]
        );

          $this->end_controls_section();
          // End Pricing Body Options

          //  Start Pricing Body
	          
           $this->start_controls_section(
	            '_section_pricing_footer',
	            [
	                'label' => __( 'Pricing Button', 'ap_elementor' ),
	                'tab'   => Controls_Manager::TAB_STYLE,
	            ]
	        );
           $this->start_controls_tabs( 'tabs2_button_style' );
           $this->start_controls_tab(
		        'tab_button_normal',
		        [
		            'label' => __( 'Normal', 'ap_elementor' ),
		        ]
		    );
           $this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'prcing_button_shadow',
					'label' => __( 'Box Shadow', 'ap_elementor' ),
					'selector' => '{{WRAPPER}} .advanced_addons_pricing_tbl .advanced_pricing_block_btn',
				]
			);

           $this->add_group_control(
		        Group_Control_Background::get_type(),
		        [
	            'name' => 'pricing_button_background',
	            'label' => __( 'Background Color', 'ap_elementor' ),
	            'types' => ['gradient'],
	            'selector' => '{{WRAPPER}} .advanced_addons_pricing_tbl .advanced_pricing_block_btn',
	            
		        ]
		    );

         $this->add_group_control(
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'footer_button_typography',
                'label'    => __( 'Footer Button Typography', 'ap_elementor' ),
                'selector' => '{{WRAPPER}} .advanced_addons_pricing_tbl .advanced_pricing_block_btn',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );
         $this->add_control(
            'border_color',
            [
                'label'     => __( 'Button Border Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_pricing_tbl .advanced_pricing_block_btn' => 'border-color: {{VALUE}}',
                ],
            ]
        );
         $this->add_control(
			'button_border_width',
			[
				'label' => __( 'Border Width', 'ap_elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 1,
				],
				'selectors' => [
					'{{WRAPPER}} .advanced_addons_pricing_tbl .advanced_pricing_block_btn' => 'border-width: {{SIZE}}{{UNIT} !important};',
				],
			]
		);
     $this->add_responsive_control(
        'pricing_button_padding',
        [
            'label'      => __( 'Button Size', 'ap_elementor'),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors'  => [
                '{{WRAPPER}} .advanced_addons_pricing_tbl .advanced_pricing_block_btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );
     
     $this->add_responsive_control(
        'pricing_button_radius',
        [
            'label'      => __( 'Border Radius', 'ap_elementor'),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors'  => [
                '{{WRAPPER}} .advanced_addons_pricing_tbl .advanced_pricing_block_btn ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
        ]
    );


         $this->add_control(
            'button_color',
            [
                'label'     => __( 'Footer Button Color', 'ap_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_pricing_tbl .advanced_pricing_block_btn' => 'color: {{VALUE}}',
                ],
            ]
        );
          $this->end_controls_tab();


          $this->start_controls_tab(
		        'tab_button_hover',
		        [
		            'label' => __( 'Hover', 'ap_elementor' ),
		        ]
		    );
           $this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'hover_prcing_button_shadow',
					'label' => __( 'Box Shadow', 'ap_elementor' ),
					'selector' => '{{WRAPPER}} .advanced_addons_pricing_tbl .advanced_pricing_block_btn:hover',
				]
			);
          $this->add_responsive_control(
		        'hover_pricing_button_padding',
		        [
		            'label'      => __( 'Button Size', 'ap_elementor'),
		            'type'       => Controls_Manager::DIMENSIONS,
		            'size_units' => ['px', 'em', '%'],
		            'selectors'  => [
		                '{{WRAPPER}} .advanced_addons_pricing_tbl .advanced_pricing_block_btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
		            ],
		        ]
		    );
          $this->add_control(
            'hover_border_color',
            [
                'label'     => __( 'Button Border Color', 'advanced-addons-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_pricing_tbl .advanced_pricing_block_btn:hover' => 'border-color: {{VALUE}}',
                ],
            ]
        );
          $this->add_control(
			'hover_button_border_width',
			[
				'label' => __( 'Border Width', 'ap_elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 1,
				],
				'selectors' => [
					'{{WRAPPER}} .advanced_addons_pricing_tbl .advanced_pricing_block_btn:hover' => 'border-width: {{SIZE}}{{UNIT} !important};',
				],
			]
		);
       $this->add_group_control(
	        Group_Control_Background::get_type(),
	        [
            'name' => 'hover_pricing_button_background',
            'label' => __( 'Background Color', 'ap_elementor' ),
            'types' => ['gradient'],
            'selector' => '{{WRAPPER}} .advanced_addons_pricing_tbl .advanced_pricing_block_btn:hover',
            
	        ]
	    );
          $this->add_control(
            'hover_button_color',
            [
                'label'     => __( 'Hover Button Color', 'ap_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_pricing_tbl .advanced_pricing_block_btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

          $this->end_controls_tab();
          $this->end_controls_tabs();


          $this->end_controls_section();

          //  Start Pricing Body
           $this->start_controls_section(
	            '_section_pricing_ribbon',
	            [
	                'label' => __( 'Pricing Ribbon', 'ap_elementor' ),
	                'tab'   => Controls_Manager::TAB_STYLE,
	                'condition' => [
						'show_feture' => 'yes',
					],
	            ]
	        );

         $this->add_group_control(
            Group_Control_Typography:: get_type(),
            [
                'name'     => 'ribon_typography',
                'label'    => __( 'Pricing RIbbon Typography', 'ap_elementor' ),
                'selector' => '{{WRAPPER}} .advanced_addons_pricing_ribbon_content',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
            ]
        );

         $this->add_group_control(
	        Group_Control_Background::get_type(),
	        [
	            'name' => 'ribbon_background',
	            'label' => __( 'Background Color', 'ap_elementor' ),
	            'types' => ['gradient'],
	            'selector' => '{{WRAPPER}} .advanced_addons_pricing_ribbon_content',
		        ]
		    );
         $this->add_control(
			'pricing_ribbon_position',
			[
				'label' => __( 'Ribbon Position', 'ap_elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .advanced_addons_pricing_ribbon' => 'padding: {{SIZE}}{{UNIT}} 0 0 {{SIZE}}{{UNIT}} !important;',
				],
			]
		);

         $this->add_control(
            'option_color',
            [
                'label'     => __( 'Ribbon Text Color', 'ap_elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .advanced_addons_pricing_ribbon_content' => 'color: {{VALUE}}',
                ],
            ]
        );

          $this->end_controls_section();
          // End Pricing Body Options

	}

	protected function render() {
		require APE_PATH . '/modules/pricing-table/template/view.php';
	}

}
