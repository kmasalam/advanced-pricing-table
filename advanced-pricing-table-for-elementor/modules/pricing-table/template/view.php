<?php
$settings = $this->get_settings_for_display();
 
        $this->add_render_attribute( 'link', 'href', esc_url( $settings['link']['url'] ) );
        if ( ! empty( $settings['link']['is_external'] ) ) {
            $this->add_render_attribute( 'link', 'target', '_blank' );
        }
        if ( ! empty( $settings['link']['nofollow'] ) ) {
            $this->add_render_attribute( 'link', 'rel', 'nofollow' );
        }
      $this->add_inline_editing_attributes( 'text', 'none' );
      
      $is_feture = '';
      $is_feture2 = '';

      if($settings['show_feture'] === 'yes'){
          $is_feture = 'featured';

      }else{
        $is_feture = 'no-featured';
      }

      if($settings['show_feture'] === 'yes'){
          $is_feture2 = 'standard';
      }else{
        $is_feture2 = 'no-standard';
      }

      
    ?>
    <?php if($settings['style'] === 'style1'):?>
          <div class="advanced_addons_pricing_tbl type-1 <?php echo esc_attr($is_feture);?> <?php echo esc_html($settings['border_style']);?>">
            <?php
              if($settings['show_feture'] === 'yes') : ?>
                <div class="advanced_addons_pricing_ribbon ribbon_right">
                  <div class="advanced_addons_pricing_ribbon_content">
                    Featured
                  </div>
            </div>
              <?php endif;?>
              <div class="block_head text-center">
            <h4 class="text-afafaf font-weight-semi-bold mb-0 pricing_title"><?php echo esc_html($settings['title']);?></h4>
                <div class="block_circle bg-f5f5f5 rounded-circle d-inline-flex flex-column align-items-center justify-content-center position-relative">
                  <span class="block_currency position-absolute currency_icon">
                    <?php echo esc_html($settings['price_cur']);?>
                  </span>
                  <h3 class="font-weight-normal mb-0">
                    <span class="pricing_value">
                         <?php echo esc_html($settings['price']);?>
                    </span>   
                    </h3>
                  <p class="m-0 text-uppercase text-8f8f8f pricing_duration">
                    <?php echo esc_html($settings['price_period']);?>
                  </p>
                </div>
              </div>
              <div class="block_body text-center">
                <ul class="p-0 m-0 list-style-none">
                  <?php foreach (  $settings['list'] as $item ) : ?>
                    <li><?php echo esc_html($item['list_title']);?></li>
                  <?php endforeach;?>
                </ul>
              </div>
              <div class="block_footer text-center">
                <a <?php echo $this->get_render_attribute_string( 'link' ); ?> class="btn advanced_pricing_block_btn font-size-16 font-weight-normal d-inline-block">
                   <?php echo esc_html( $settings['button_text'] ); ?>
                </a>
              </div>
        </div>
    <?php endif;?>
    <?php if($settings['style'] === 'style2'):?>
        <div class="advanced_addons_pricing_tbl type-2 bg-fafafa <?php echo esc_attr($is_feture);?>">
              <?php
              if($settings['show_feture'] === 'yes') : ?>
                <div class="advanced_addons_pricing_ribbon ribbon_right">
                  <div class="advanced_addons_pricing_ribbon_content">
                    Featured
                  </div>
            </div>
              <?php endif;?>
                <div class="block_head text-center">
                  <i class="pricing_icon <?php echo esc_attr( $settings['icon'] ); ?>"></i>
                  <h4 class="m-0 fz-35 font-weight-semi-bold pricing_title"><?php echo esc_html($settings['title']);?></h4>
                  <h3 class="m-0 font-weight-semi-bold fz-50"> 
                    <span class="currency_icon">
                       <?php echo esc_html($settings['price_cur']);?>
                    </span> 
                    <span class="pricing_value">
                        <?php echo esc_html($settings['price']);?></h3>
                    </span>
                  <p class="m-0 font-weight-normal fz-14 pricing_duration">
                    <?php echo esc_html($settings['price_period']);?>
                  </p>
                </div>
                <div class="block_body text-center pt-3">
                  <ul class="p-0 m-0 list-style-none">
                    <?php foreach (  $settings['list'] as $item ) : ?>
                      <li><?php echo esc_html($item['list_title']);?></li>
                    <?php endforeach;?>
                  </ul>
                </div>
                <div class="block_footer text-center">
                  <a <?php echo $this->get_render_attribute_string( 'link' ); ?>>
                    <button class="btn advanced_pricing_block_btn font-size-16 font-weight-normal">
                      <?php echo esc_html( $settings['button_text'] ); ?>
                    </button>
                  </a>
                </div>
        </div>
    <?php endif;?>
    <?php if($settings['style'] === 'style3'):?>
        <div class="advanced_addons_pricing_tbl type-8 overflow-hidden  <?php echo esc_attr($is_feture);?> ">
          <?php
              if($settings['show_feture'] === 'yes') : ?>
                <div class="advanced_addons_pricing_ribbon ribbon_right">
                  <div class="advanced_addons_pricing_ribbon_content">
                    Featured
                  </div>
            </div>
              <?php endif;?>

                <div class="block_head text-center">
                  <h4 class="text-777777 font-weight-semi-bold mb-0 pricing_title">
                    <?php echo esc_html($settings['title']);?></h4>
                </div>
                <div class="block_circle rounded-circle  position-absolute">
                  <h3 class="font-weight-semi-bold  mb-0">
                    <span class="currency_icon">
                        <?php echo esc_html($settings['price_cur']);?>
                    </span>
                    <span class="pricing_value">
                         <?php echo esc_html($settings['price']);?></h3>
                    </span>
                   
                  <p class="m-0 text-lowercase fz-14 text-777777 font-weight-semi-bold pricing_duration ">
                    <?php echo esc_html($settings['price_period']);?>
                  </p>
                </div>
                <div class="block_body text-center">
                  <ul class="list-style-none pl-0 m-0">
                    <?php foreach (  $settings['list'] as $item ) : ?>
                      <li><span><?php echo esc_html($item['list_title']);?></span></li>
                    <?php endforeach;?>
                  </ul>
                  <a <?php echo $this->get_render_attribute_string( 'link' ); ?>>
                    <button class="btn advanced_pricing_block_btn bg-white font-size-16 font-weight-normal">
                      <?php echo esc_html( $settings['button_text'] ); ?>
                    </button>
                  </a>
                </div>  
        </div>
    <?php endif;?>
