<?php

/**
 *
 * VC Custom Templates
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_vc_templates(){
  $templates = array();
  $data = array();
  $data['name'] = esc_html__( 'Blog Post', 'marketing-addons' );
  $data['disabled'] = true;
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/40.jpg' );
  $data['sort_name'] = 'Blog';
  $data['custom_class'] = 'blog';
  $data['content'] = <<<CONTENT
[vc_row][vc_column][rs_section_heading small_heading="Story Telling" big_heading="Latest Blog Posts"][rs_space lg_device="35" md_device="" sm_device="30" xs_device=""][rs_blog][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'Slider Classic', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/30.jpg' );
  $data['sort_name'] = 'Slider';
  $data['custom_class'] = 'general slider';
  $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" fluid="stretch_row_content"][vc_column][rs_hero_slider style="style4"][rs_hero_slider_item background="http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/11/bg-1.png" object="http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/11/object-2.png" small_heading="Brands go big with Digital Marketing & SEO!" heading="SEO & Digital Strategy for Big Brands " btn_text="Free SEO Analysis " btn_link="url:http%3A%2F%2Fwordpress-104454-297862.cloudwaysapps.com%2Fdemo%2Fmarketingpro%2Fseo-analysis%2F|||"][/rs_hero_slider][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'Slider With Subscription', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/35.jpg' );
  $data['sort_name'] = 'Slider';
  $data['custom_class'] = 'general slider';
  $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" fluid="stretch_row_content"][vc_column][rs_hero_slider style="style2" pagination="no"][rs_hero_slider_item object="http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/11/user.png" small_heading="Pro tips that will help you grow your business" heading="Growth hack sales funnel secrets brought to you" form_id="4"][/rs_hero_slider][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'Slider Modern', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/34.jpg' );
  $data['sort_name'] = 'Slider';
  $data['custom_class'] = 'general slider';
  $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" fluid="stretch_row_content"][vc_column][rs_hero_slider][rs_hero_slider_item background="http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/10/bg-2-6.png" object="http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/10/seo-slide.png" small_heading="Yes, we’ll help you achieve your marketing & business goals." heading="Digital Marketing Made Easy" btn_text="Get Marketing Pro" btn_link="url:%23|||"][/rs_hero_slider][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'Slider Content Top', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/41.jpg' );
  $data['sort_name'] = 'Slider';
  $data['custom_class'] = 'general slider';
  $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" fluid="stretch_row_content"][vc_column][rs_hero_slider style="style3" pagination="no"][rs_hero_slider_item background="http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/11/bg_2.jpg" object="http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/11/thumb_2.png" small_heading="Yes, we’ll help you achieve your marketing & business goals. " heading="Double Conversions in 60 Days" btn_text="Get Marketing Pro"][/rs_hero_slider][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'Slider With Video', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/33.jpg' );
  $data['sort_name'] = 'Slider';
  $data['custom_class'] = 'general sider';
  $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" fluid="stretch_row_content"][vc_column][rs_hero_video_banner small_heading="Fully customizable. One click demo import. No coding required." big_heading="Marketing Pro Video Showreel " btn_text="Get Theme Now" video_url="http://youtu.be/03hk9TW5Mt4" big_heading_color="#ffffff" small_heading_color="rgba(255,255,255,0.8)" poster_img="1297"][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'Slider Content Middle', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/31.jpg' );
  $data['sort_name'] = 'Slider';
  $data['custom_class'] = 'general slider';
  $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" fluid="stretch_row_content"][vc_column][rs_hero_slider style="style5" big_heading_color="#30373b" small_heading_color="rgba(48,55,59,0.8)" btn_text_color="#ffffff"][rs_hero_slider_item background="http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/11/event.png" small_heading="Drag &amp; drop. One Click demos. No coding required. " heading="Make Event Pages in Minutes" btn_text="Get Tickets Now" btn_link="url:%23|||"][/rs_hero_slider][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'Custom Slider', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  false );
  $data['sort_name'] = 'Slider';
  $data['custom_class'] = 'general slider';
  $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" fluid="stretch_row_content"][vc_column][rs_hero_slider style="style6"][rs_hero_slider_item background="http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/11/event.png"][/rs_hero_slider][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'Insta Slider', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/44.jpg' );
  $data['sort_name'] = 'Slider';
  $data['custom_class'] = 'general slider';
  $data['content'] = <<<CONTENT
[vc_row css=".vc_custom_1547973338341{margin-top: 40px !important;margin-bottom: 50px !important;}"][vc_column][rs_section_heading tag="h2" text_align="center" big_heading="Примеры работ" text="Примеры работ" class="mb-4"][vc_column_text]</p>
<p>[iscwp-slider username="koridze_remont.kvartir" show_likes_count="false" show_comments_count="false" popup_gallery="false" dots="false" slidestoshow="3"]</p>
<p>[/vc_column_text][rs_button align="text-center" style="type-5" size="size-3" btn_link="url:%2Fportfolio|title:%D0%91%D0%BE%D1%8C%D1%88%D0%B5%20%D1%80%D0%B0%D0%B1%D0%BE%D1%82||" btn_text="Больше работ" class="mt-4"][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'Under construction', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/42.jpg' );
  // $data['sort_name'] = '';
  // $data['custom_class'] = '';
  $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" content_placement="middle" fluid="stretch_row_content"][vc_column][vc_empty_space height="170px"][vc_custom_heading text="Раздел в разработке" font_container="tag:h2|font_size:30|text_align:center" google_fonts="font_family:Roboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic|font_style:400%20regular%3A400%3Anormal"][vc_empty_space height="50px"][vc_row_inner][vc_column_inner el_class="mb-3 mb-md-0" width="1/3" offset="vc_col-sm-offset-2 vc_col-sm-4 vc_col-xs-offset-3 vc_col-xs-6"][rs_button align="text-right" btn_text="На главную" btn_link="url:%2F|||"][/vc_column_inner][vc_column_inner width="1/3" offset="vc_col-sm-offset-0 vc_col-sm-4 vc_col-xs-offset-3 vc_col-xs-6"][rs_button btn_text="Назад" btn_link="url:javascript%3Ahistory.back(1)%3B|||"][/vc_column_inner][/vc_row_inner][vc_empty_space height="170px"][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'Form order', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/43.jpg' );
  $data['sort_name'] = 'cta';
  $data['custom_class'] = 'general cta';
  $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row" css=".vc_custom_1547967521998{margin-bottom: 30px !important;}"][vc_column][vc_row_inner][vc_column_inner el_class="orange-form-wrap" width="2/3" offset="vc_col-md-offset-2 vc_col-md-8 vc_col-xs-offset-1 vc_col-xs-10"][rs_section_heading tag="h2" text_align="center" text="Мы делаем замеры бесплатно!" class="mt-0"][vc_column_text dp_text_size="size-3" font="Verdana" text_color="#ffffff" class="text-white mb-2"] Для точного расчета стоимости работ, Вы можете бесплатно вызвать сметчика-консультанта. Он сделает обмер помещения, обсудит с Вами необходимые работы и применяемые материалы. После этого мы предоставим точную детальную смету на работы и строительные материалы для ремонта Вашей квартиры [/vc_column_text][rs_special_text tag="div" align="center" font_weight="400"] [contact-form-7 id="1665" html_class="form-row justify-content-center"] [/rs_special_text][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'Icon Box With Image Icon', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/24.jpg' );
  $data['sort_name'] = 'Icon Box';
  $data['custom_class'] = 'general icon-box';
  $data['content'] = <<<CONTENT
[vc_row][vc_column][vc_row_inner][vc_column_inner][rs_section_heading small_heading="Thats right" big_heading="Boost your Brand"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="1/3"][rs_icon_box style="type-4" img_icon="882" heading="Web Analytics "]Mobile ready proprietary dedication intuitive. Thought leadership pass the clap hackathon wearables All without having to rely on anything.[/rs_icon_box][rs_space lg_device="40" md_device="" sm_device="" xs_device=""][rs_icon_box style="type-4" img_icon="893" heading="World Class"]Mobile ready proprietary dedication intuitive. Thought leadership pass the clap hackathon wearables All without having to rely on anything.[/rs_icon_box][/vc_column_inner][vc_column_inner width="1/3"][rs_icon_box style="type-4" img_icon="884" heading="Business Goal"]Dynamic content brand voice council tweens sticky content responsive ROI. Dynamic content CRM target audience buzz engagement.[/rs_icon_box][rs_space lg_device="40" md_device="" sm_device="" xs_device=""][rs_icon_box style="type-4" img_icon="894" heading="SEO Growth"]Mobile ready proprietary dedication intuitive. Thought leadership pass the clap hackathon wearables All without having to rely on anything.[/rs_icon_box][/vc_column_inner][vc_column_inner width="1/3"][rs_icon_box style="type-4" img_icon="883" heading="Email Management"]Thought leadership iterative seed money lean content proprietary. Snackable content quiet period. Actual email marketing & conversion.[/rs_icon_box][rs_space lg_device="40" md_device="" sm_device="" xs_device=""][rs_icon_box style="type-4" img_icon="892" heading="Social Management "]Mobile ready proprietary dedication intuitive. Thought leadership pass the clap hackathon wearables All without having to rely on anything.[/rs_icon_box][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'Icon Box With Image Middle', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/26.jpg' );
  $data['sort_name'] = 'icon-box';
  $data['custom_class'] = 'general icon-box';
  $data['content'] = <<<CONTENT
[vc_row][vc_column][rs_section_heading small_heading="data driven " big_heading="Lets Improve your SEO"][rs_space lg_device="35" md_device="" sm_device="30" xs_device=""][/vc_column][/vc_row][vc_row][vc_column width="1/3"][rs_icon_box icon="lnr lnr-chart-bars" heading="Business Goal"]Dynamic content brand voice council tweens sticky content responsive ROI.[/rs_icon_box][rs_space lg_device="40" md_device="" sm_device="" xs_device=""][rs_icon_box icon="lnr lnr-laptop-phone" heading="Web Analytics "]Mobile ready proprietary dedication intuitive. Thought leadership pass.[/rs_icon_box][/vc_column][vc_column width="1/3"][rs_image_block align="center-block" shadow="no" image="http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/11/Untitled-1-1.png"][/vc_column][vc_column width="1/3"][rs_icon_box icon="lnr lnr-store" heading="Landing Made Easy"]Thought leadership iterative seed money lean content proprietary.[/rs_icon_box][rs_space lg_device="40" md_device="" sm_device="" xs_device=""][rs_icon_box icon="lnr lnr-pie-chart" heading="Goal Driven"]Dynamic content brand voice council tweens sticky content responsive ROI.[/rs_icon_box][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'Icon Box Modern Two Column', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/20.jpg' );
  $data['sort_name'] = 'icon-box';
  $data['custom_class'] = 'general icon-box';
  $data['content'] = <<<CONTENT
[vc_row][vc_column width="5/6" class_type="sm" offset="vc_col-sm-offset-1"][rs_section_heading small_heading="Internet Marketing" big_heading="Marketers Best Kept Secret"][rs_space lg_device="35" md_device="" sm_device="30" xs_device=""][vc_row_inner][vc_column_inner width="1/2" class_type="sm"][rs_icon_box icon="lnr lnr-rocket" color="color-2" heading="Skyscraper Formula"]Platform omnichannel click bait thought leadership pivot. Disrupt council conversions.[/rs_icon_box][/vc_column_inner][vc_column_inner width="1/2" class_type="sm"][rs_icon_box icon="lnr lnr-store" color="color-2" heading="In-house Experts"]Content curation market share customer engagement buzz flat design vertical-specific.[/rs_icon_box][/vc_column_inner][/vc_row_inner][rs_space lg_device="40" md_device="" sm_device="30" xs_device=""][vc_row_inner][vc_column_inner width="1/2" class_type="sm"][rs_icon_box icon="lnr lnr-thumbs-up" color="color-2" heading="Proven Methods"]Thought leadership iterative seed money lean content proprietary. Snackable content period.[/rs_icon_box][/vc_column_inner][vc_column_inner width="1/2" class_type="sm"][rs_icon_box icon="lnr lnr-envelope" color="color-2" heading="Email Growth"]Content curation market share customer engagement buzz flat design vertical-specific.[/rs_icon_box][/vc_column_inner][/vc_row_inner][rs_space lg_device="40" md_device="" sm_device="30" xs_device=""][vc_row_inner][vc_column_inner width="1/2" class_type="sm"][rs_icon_box icon="lnr lnr-poop" color="color-2" heading="No Bullshit "]Platform omnichannel click bait thought leadership pivot. Disrupt taste conversions.[/rs_icon_box][/vc_column_inner][vc_column_inner width="1/2" class_type="sm"][rs_icon_box icon="lnr lnr-users" color="color-2" heading="Customer Support"]Thought leadership iterative seed money lean content proprietary. Snackable quiet period.[/rs_icon_box][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'Icon Box Four Column', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/21.jpg' );
  $data['sort_name'] = 'Icon Box';
  $data['custom_class'] = 'general icon-box';
  $data['content'] = <<<CONTENT
[vc_row][vc_column][rs_section_heading small_heading="SEO MADE EASY" big_heading="Marketers best kept secret"][rs_space lg_device="40" md_device="" sm_device="30" xs_device=""][vc_row_inner][vc_column_inner width="1/4" class="col-sm-6"][rs_icon_box style="type-2" icon="lnr lnr-rocket" heading="No Bullshit"]Mobile ready proprietary dedication intuitive. Thought leadership pass the clap hackathon wearables.[/rs_icon_box][/vc_column_inner][vc_column_inner width="1/4" class="col-sm-6"][rs_icon_box style="type-2" icon="lnr lnr-chart-bars" heading="Growth Analaysis"]Platform omnichannel click bait thought leadership pivot. Disrupt taste makers council emerging.[/rs_icon_box][/vc_column_inner][vc_column_inner width="1/4" class="col-sm-6"][rs_icon_box style="type-2" icon="lnr lnr-poop" heading="Skyscraper Formula"]Thought leadership iterative seed money lean content proprietary. Snackable content quiet period.[/rs_icon_box][/vc_column_inner][vc_column_inner width="1/4"][rs_icon_box style="type-2" icon="lnr lnr-smile" heading="Happy Marketers"]Virality The Cloud content marketing thought leadership. CRM scalability mobile ready.[/rs_icon_box][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'Icon Box Three Column Two Rows', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/22.jpg' );
  $data['sort_name'] = 'Icon Box';
  $data['custom_class'] = 'general icon-box';
  $data['content'] = <<<CONTENT
[vc_row][vc_column][rs_section_heading small_heading="SEO MADE EASY" big_heading="Marketers best kept secret"][rs_space lg_device="40" md_device="" sm_device="30" xs_device=""][vc_row_inner][vc_column_inner width="1/3" class="col-sm-6"][rs_icon_box style="type-2" icon="lnr lnr-rocket" heading="Skyrocket your Business"]Mobile ready proprietary dedication intuitive. Thought leadership pass the clap hackathon wearables.[/rs_icon_box][rs_space lg_device="40" md_device="" sm_device="" xs_device=""][/vc_column_inner][vc_column_inner width="1/3"][rs_icon_box style="type-2" icon="lnr lnr-earth" heading="Global Audience "]Platform omnichannel click bait thought leadership pivot. Disrupt taste makers council emerging.[/rs_icon_box][rs_space lg_device="40" md_device="" sm_device="" xs_device=""][/vc_column_inner][vc_column_inner width="1/3"][rs_icon_box style="type-2" icon="lnr lnr-laptop" heading="Digital Strategy"]Thought leadership iterative seed money lean content proprietary. Snackable content quiet period.[/rs_icon_box][rs_space lg_device="40" md_device="" sm_device="" xs_device=""][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="1/3" class="col-sm-6"][rs_icon_box style="type-2" icon="lnr lnr-database" heading="Data Driven"]Mobile ready proprietary dedication intuitive. Thought leadership pass the clap hackathon wearables.[/rs_icon_box][/vc_column_inner][vc_column_inner width="1/3"][rs_icon_box style="type-2" icon="lnr lnr-chart-bars" heading="Growth Analaysis"]Platform omnichannel click bait thought leadership pivot. Disrupt taste makers council emerging.[/rs_icon_box][/vc_column_inner][vc_column_inner width="1/3"][rs_icon_box style="type-2" icon="lnr lnr-apartment" heading="Empire Business "]Thought leadership iterative seed money lean content proprietary. Snackable content quiet period.[/rs_icon_box][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'Icon Box With Border', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/22.jpg' );
  $data['sort_name'] = 'Icon Box';
  $data['custom_class'] = 'general icon-box';
  $data['content'] = <<<CONTENT
[vc_row][vc_column width="1/3"][rs_icon_box style="type-5" icon="lnr lnr-chart-bars" color="color-2" heading=" Risk and Financial Advisory"]Our contact center advisory practice focuses on improving customer care, shared services, help desk, tech support and collections contact centers.[/rs_icon_box][/vc_column][vc_column width="1/3"][rs_icon_box style="type-5" icon="lnr lnr-pie-chart" color="color-2" heading="Customer Analytics"]As the world’s largest consulting firm, we can help you take decisive action and achieve sustainable results. We begin by framing the ambition.[/rs_icon_box][/vc_column][vc_column width="1/3"][rs_icon_box style="type-5" icon="lnr lnr-database" color="color-2" heading="Result-driven Consulting"]No matter how complex your business questions, we have the capabilities and experience to deliver the answers you need to move forward.[/rs_icon_box][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'Icon Box With Image Left', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/25.jpg' );
  $data['sort_name'] = 'Icon Box';
  $data['custom_class'] = 'general icon-box';
  $data['content'] = <<<CONTENT
[vc_row 0=""][vc_column 0=""][vc_row_inner 0=""][vc_column_inner width="1/3"][rs_image_block shadow="no" image="http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/11/man.jpg"][/vc_column_inner][vc_column_inner width="1/3"][rs_space lg_device="15" md_device="" sm_device="" xs_device=""][rs_icon_box icon="lnr lnr-gift" heading="Email Management"]Thought leadership iterative seed money lean content proprietary. Snackable content quiet period. Actual email marketing & conversion.[/rs_icon_box][rs_space lg_device="40" md_device="" sm_device="" xs_device=""][rs_icon_box icon="lnr lnr-store" heading="Social Management "]Mobile ready proprietary dedication intuitive. Thought leadership pass the clap hackathon wearables All without having to rely on anything.[/rs_icon_box][rs_space lg_device="40" md_device="" sm_device="" xs_device=""][rs_icon_box icon="lnr lnr-pie-chart" heading="Data Driven"]Mobile ready proprietary dedication intuitive. Thought leadership pass the clap hackathon wearables All without having to rely on anything.[/rs_icon_box][/vc_column_inner][vc_column_inner width="1/3"][rs_space lg_device="15" md_device="" sm_device="" xs_device=""][rs_icon_box icon="lnr lnr-chart-bars" heading="Business Goal"]Dynamic content brand voice council tweens sticky content responsive ROI. Dynamic content CRM target audience buzz engagement.[/rs_icon_box][rs_space lg_device="40" md_device="" sm_device="" xs_device=""][rs_icon_box icon="lnr lnr-laptop" heading="SEO Growth"]Mobile ready proprietary dedication intuitive. Thought leadership pass the clap hackathon wearables All without having to rely on anything.[/rs_icon_box][rs_space lg_device="40" md_device="" sm_device="" xs_device=""][rs_icon_box icon="lnr lnr-map" heading="Strategic Consulting"]Mobile ready proprietary dedication intuitive. Thought leadership pass the clap hackathon wearables All without having to rely on anything.[/rs_icon_box][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'Icon Box With Image Right', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/27.jpg' );
  $data['sort_name'] = 'Icon Box';
  $data['custom_class'] = 'general icon-box';
  $data['content'] = <<<CONTENT
[vc_row][vc_column width="1/2"][rs_icon_box icon="lnr lnr-database" heading="Business Mode"]Mobile ready proprietary dedication intuitive. Thought leadership pass the clap hackathon wearables.[/rs_icon_box][rs_space lg_device="40" md_device="" sm_device="" xs_device=""][rs_icon_box icon="lnr lnr-music-note" heading="Web Analytics "]Mobile ready proprietary dedication intuitive. Thought leadership pass the clap hackathon wearables.[/rs_icon_box][rs_space lg_device="40" md_device="" sm_device="" xs_device=""][rs_icon_box icon="lnr lnr-bicycle" heading="Marketing Goals"]Mobile ready proprietary dedication intuitive. Thought leadership pass the clap hackathon wearables.[/rs_icon_box][/vc_column][vc_column width="1/2"][rs_image_block shadow="no" image="http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/11/03.png"][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'Banner About', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/2.jpg' );
  $data['sort_name'] = 'Banner';
  $data['custom_class'] = 'general banner';
  $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content"][vc_column width="1/3"][/vc_column][vc_column width="1/3"][vc_column_text]<h3 class="special-text" style="font-size: 21px; line-height: 1.5em; text-align: center; font-weight: 400; color: #949494;">We thrive on <strong>building relationships</strong> and take great pride in the company we keep. Also, we live SEO & marketing!</h3>[/vc_column_text][rs_space lg_device="20" md_device="" sm_device="" xs_device=""][rs_button align="text-center" btn_text="Learn More"][rs_space lg_device="40" md_device="" sm_device="" xs_device=""][/vc_column][vc_column width="1/3"][/vc_column][/vc_row][vc_row][vc_column][rs_image_block align="center-block" shadow="no" image="http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/11/1-1.png"][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'Banner With Video Right', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/6.jpg' );
  $data['sort_name'] = 'Banner';
  $data['custom_class'] = 'general banner';
  $data['content'] = <<<CONTENT
[vc_row][vc_column width="1/2"][rs_text_block_with_button heading="How we help brands " btn_text="Learn More" btn_link="url:%23|||"]Seed money optimized for social sharing chatvertizing brand awareness granular thought leadership. Engagement tweens native content drone. Hit the like button CPM holistic content marketing responsive. Viral native content Gen Y long-tail chatvertizing engagement. Scalability long-tail big data. Seamless cross-device leverage CRM target influencer B2C B2B. Target audience conversation marketing.[/rs_text_block_with_button][/vc_column][vc_column width="1/2" class_type="sm"][rs_image_video_block video_url="http://www.youtube.com/embed/wTcNtgA6gHs" image="http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/11/Untitled-7.png"][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'Banner About 2', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/3.jpg' );
  $data['sort_name'] = 'Banner';
  $data['custom_class'] = 'general banner';
  $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" fluid="stretch_row_content"][vc_column][rs_space lg_device="100" md_device="" sm_device="" xs_device=""][rs_divider][rs_space lg_device="100" md_device="" sm_device="" xs_device=""][/vc_column][/vc_row][vc_row][vc_column][vc_column_text]<h1 class="special-text" style="font-size: 28px; line-height: 1.5em; text-align: center; font-weight: 300; color: #30373b;">Innovative solutions to move your business forward.</h1>[/vc_column_text][rs_space lg_device="20" md_device="" sm_device="" xs_device=""][rs_button align="text-center" btn_text="Get Started Now"][rs_space lg_device="50" md_device="" sm_device="" xs_device=""][/vc_column][/vc_row][vc_row][vc_column][rs_image_block align="center-block" shadow="no" image="http://themebubble.com/demo/marketingpro/wp-content/uploads/2017/06/img-min.png"][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'Banner With Image Left', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/5.jpg' );
  $data['sort_name'] = 'Banner';
  $data['custom_class'] = 'general banner';
  $data['content'] = <<<CONTENT
[vc_row][vc_column width="1/2"][rs_image_block align="center-block" image="http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/11/simple_2.jpg"][/vc_column][vc_column width="1/2" class_type="sm"][rs_text_block_with_button heading="Grow Business While Travelling" btn_text="Learn More" btn_link="url:%23|||"]Seed money optimized for social sharing chatvertizing brand awareness granular thought leadership. Engagement tweens native content drone. Hit the like button CPM holistic content marketing responsive. Viral native content Gen Y long-tail chatvertizing engagement. Scalability long-tail big data. Seamless cross-device leverage CRM target influencer B2C B2B. Target audience conversation marketing.[/rs_text_block_with_button][/vc_column][/vc_row][vc_row][vc_column][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'Banner With Image Right', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/4.jpg' );
  $data['sort_name'] = 'Banner';
  $data['custom_class'] = 'general banner';
  $data['content'] = <<<CONTENT
[vc_row][vc_column width="5/6" class_type="sm" offset="vc_col-sm-offset-1"][vc_row_inner][vc_column_inner width="1/2"][rs_text_block_with_button heading="Conversions & More" btn_text="Learn More"]Seed money optimized for social sharing chatvertizing brand awareness granular thought leadership. Engagement tweens native content drone. Hit the like button CPM holistic content marketing responsive.[/rs_text_block_with_button][/vc_column_inner][vc_column_inner width="1/2"][rs_image_block shadow="no" image="http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/11/girl.jpg"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'Case Study', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/11.jpg' );
  $data['sort_name'] = 'case';
  $data['custom_class'] = 'general case';
  $data['content'] = <<<CONTENT
[vc_row][vc_column][rs_section_heading small_heading="Market Your Mind" big_heading="Case Studies"][rs_space lg_device="35" md_device="" sm_device="30" xs_device=""][rs_case_study style="style2" filter="no"][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'Case Study With Filter', 'marketing-addons' );
  $data['disabled'] = true;
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/34.jpg' );
  $data['sort_name'] = 'case';
  $data['custom_class'] = 'general case';
  $data['content'] = <<<CONTENT
[vc_row][vc_column][rs_section_heading small_heading="Market Your Mind" big_heading="Case Studies"][rs_space lg_device="35" md_device="" sm_device="30" xs_device=""][rs_case_study][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'Divider With Space', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/14.jpg' );
  $data['sort_name'] = 'misc';
  $data['custom_class'] = 'general misc';
  $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" fluid="stretch_row_content"][vc_column 0=""][rs_space lg_device="95" md_device="" sm_device="50" xs_device="30"][rs_divider 0=""][rs_space lg_device="95" md_device="" sm_device="50" xs_device="30"][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'Space', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/36.jpg' );
  $data['sort_name'] = 'misc';
  $data['custom_class'] = 'general misc';
  $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" fluid="stretch_row_content"][vc_column 0=""][rs_space lg_device="95" md_device="" sm_device="50" xs_device="30"][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'Testimonial Classic', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/39.jpg' );
  $data['sort_name'] = 'testimonial';
  $data['custom_class'] = 'general testimonial';
  $data['content'] = <<<CONTENT
[vc_row][vc_column][rs_section_heading small_heading="Lovely Customer " big_heading="Don't Take Our Word for It"][rs_space lg_device="35" md_device="" sm_device="30" xs_device=""][/vc_column][/vc_row][vc_row][vc_column width="5/6" offset="vc_col-lg-offset-1"][rs_testimonial limit="4"][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'Team Column 4', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/37.jpg' );
  $data['sort_name'] = 'team';
  $data['custom_class'] = 'general team';
  $data['content'] = <<<CONTENT
[vc_row][vc_column][rs_section_heading small_heading="Story Telling" big_heading="Meet Our Team"][rs_space lg_device="35" md_device="" sm_device="30" xs_device=""][vc_row_inner][vc_column_inner width="1/4"][rs_team][/vc_column_inner][vc_column_inner width="1/4"][rs_team][/vc_column_inner][vc_column_inner width="1/4"][rs_team][/vc_column_inner][vc_column_inner width="1/4"][rs_team][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'Testimonial 3 Column', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/38.jpg' );
  $data['sort_name'] = 'testimonial';
  $data['custom_class'] = 'general testimonial';
  $data['content'] = <<<CONTENT
[vc_row][vc_column][rs_section_heading small_heading="Lovely Customers" big_heading="Don't take our word for it"][rs_space lg_device="40" md_device="" sm_device="30" xs_device=""][rs_testimonial style="type-2" limit="4"][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'Pricing Table 3 Column', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/29.jpg' );
  $data['sort_name'] = 'pricing';
  $data['custom_class'] = 'general pricing';
  $data['content'] = <<<CONTENT
[vc_row][vc_column][rs_section_heading small_heading="Lovely Customers" big_heading="Simple Pricing for All"][rs_space lg_device="40" md_device="" sm_device="30" xs_device=""][vc_row_inner][vc_column_inner width="1/3" class_type="sm"][rs_pricing_table plan="Entrepreneur" price="10" feature="Limited marketing & growth hacks|Basic Email list building techniques|Invitation to Secret group|Secret Business Group|Free Landing Page"][/vc_column_inner][vc_column_inner width="1/3" class_type="sm"][rs_pricing_table plan="Growing Business" price="29" feature="Limited marketing & growth hacks|Basic Email list building techniques|Invitation to Secret group|Secret Business Group|Free Landing Page"][/vc_column_inner][vc_column_inner width="1/3" class_type="sm"][rs_pricing_table plan="Pro Business" price="39" feature="Limited marketing & growth hacks|Basic Email list building techniques|Invitation to Secret group|Secret Business Group|Free Landing Page"][/vc_column_inner][/vc_row_inner][rs_space lg_device="40" md_device="" sm_device="" xs_device=""][rs_button align="text-center" btn_link="url:%23|||" btn_text="Start Free Trial"][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'Pricing Table 2 Column', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/28.jpg' );
  $data['sort_name'] = 'pricing';
  $data['custom_class'] = 'general pricing';
  $data['content'] = <<<CONTENT
[vc_row][vc_column][rs_section_heading small_heading="Lovely Customers" big_heading="Simple Pricing for All"][rs_space lg_device="40" md_device="" sm_device="30" xs_device=""][vc_row_inner][vc_column_inner width="1/2"][rs_pricing_table plan="Regular Licence " price="49" feature="Quality checked & reviewed by Envato designer & developers |Future updates available for free with plugins|6 months support from ThemeBubble team"][rs_space lg_device="30" md_device="" sm_device="" xs_device=""][rs_button align="text-center" color="color-4" btn_text="Purchase Now"][/vc_column_inner][vc_column_inner width="1/2"][rs_pricing_table plan="Regular Licence " price="199" feature="Quality checked & reviewed by Envato designer & developers |Future updates available for free with plugins|6 months support from ThemeBubble team"][rs_space lg_device="30" md_device="" sm_device="" xs_device=""][rs_button align="text-center" color="color-4" btn_text="Purchase Now"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'Slider Gallery', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/13.jpg' );
  $data['sort_name'] = 'slider_gallery';
  $data['custom_class'] = 'general client';
  $data['content'] = <<<CONTENT
[vc_row][vc_column][rs_slider_gallery image="http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/10/partner_4.png,http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/10/partner_1.png,http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/10/partner_3.png,http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/10/partner_4.png,http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/10/partner_1.png,http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/10/partner_5.png"][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'FAQ', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/15.jpg' );
  $data['sort_name'] = 'faq';
  $data['custom_class'] = 'general faq';
  $data['content'] = <<<CONTENT
[vc_row][vc_column][rs_section_heading small_heading="Go ahead" big_heading="Frequently Asked Questions"][rs_space lg_device="35" md_device="" sm_device="30" xs_device=""][vc_accordion][vc_accordion_tab title="Is this WordPress theme customizable? "][vc_column_text]Yeah, completely. You can create your own layout using our elements with Visual Composer (No coding required). And, editing existing content is as easy as you update your Facebook status.[/vc_column_text][/vc_accordion_tab][vc_accordion_tab title="Do I need to pay for future updates? "][vc_column_text]Nope. You pay only once. And, we got your back. Awesome, right?[/vc_column_text][/vc_accordion_tab][vc_accordion_tab title="Why is your product so special? "][vc_column_text]Because we tried to make an industry best product. Something everyone would love. Design is cutting edge. Editing and creating new layouts is super easy. what could go wrong?[/vc_column_text][/vc_accordion_tab][/vc_accordion][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'Call To Action Classic', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/8.jpg' );
  $data['sort_name'] = 'cta';
  $data['custom_class'] = 'general cta';
  $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1479040683569{background-image: url(http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/10/bg-sub.png?id=279) !important; overflow:visible !important;}"][vc_column][rs_cta image="http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/10/tt-banner_2.png" heading="Exclusive SEO Backlinking Formula Marketing Giveaway (Worth $99)" btn_text="Call to Action " btn_link="url:%23|||"][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'Call To Action With Subscription', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/9.jpg' );
  $data['sort_name'] = 'cta';
  $data['custom_class'] = 'general cta';
  $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1481190430852{background-image: url(http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/11/bg-3.png?id=814) !important; overflow:visible !important;}"][vc_column][rs_newsletter big_heading="Get Exclusive Marketing Tools" small_heading="Enter your email to get access to my free tools for marketers." image="http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/10/tt-banner.png"][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'Call To Action With Subscription 2', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/10.jpg' );
  $data['sort_name'] = 'cta';
  $data['custom_class'] = 'general cta';
  $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content" fluid="stretch_row_only" css=".vc_custom_1497774163483{background-image: url(http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/10/bg-1.jpg?id=73) !important;}"][vc_column][rs_newsletter style="style2" big_heading="Get marketing tips every week, in your inbox" small_heading="We share secret resources. Become the first one to know when we post stuff!" form_id="2"][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'About Intro', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/1.jpg' );
  $data['sort_name'] = 'misc';
  $data['custom_class'] = 'general misc';
  $data['content'] = <<<CONTENT
[vc_row][vc_column][rs_section_heading small_heading="Thats right" big_heading="Business led. People driven."][rs_space lg_device="40" md_device="" sm_device="" xs_device=""][/vc_column][/vc_row][vc_row][vc_column width="1/3"][vc_column_text]<h1 class="special-text" style="font-size: 28px; line-height: 1.5em; text-align: left; font-weight: 400; color: #30373b;">We thrive on building relationships and take great pride in the company we keep.</h1>[/vc_column_text][rs_space lg_device="20" md_device="" sm_device="" xs_device=""][rs_button style="type-4" btn_text="Learn More" btn_link="url:http%3A%2F%2Fwordpress-104454-297862.cloudwaysapps.com%2Fdemo%2Fmarketingpro%2Ffaq%2F|||"][/vc_column][vc_column width="1/3"][vc_column_text]Dynamic content brand voice council tweens sticky content responsive ROI. Dynamic content CRM target audience buzz engagement. Thought leadership iterative seed money lean content proprietary.[/vc_column_text][rs_space lg_device="20" md_device="" sm_device="" xs_device=""][rs_image_block shadow="no" image="1559"][/vc_column][vc_column width="1/3"][rs_image_block shadow="no" image="http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/11/new.png"][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'Featured Tabs', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/17.jpg' );
  $data['sort_name'] = 'featured-tabs';
  $data['custom_class'] = 'general featured-tabs';
  $data['content'] = <<<CONTENT
[vc_row 0=""][vc_column 0=""][rs_section_heading small_heading=" BEST KEPT SECRET" big_heading="Enterpreneur Meets Marketer"][rs_space lg_device="40" md_device="" sm_device="30" xs_device=""][vc_tta_tabs style="style2" active="1"][vc_tta_section icon="lnr lnr-home" title="Growth Hack"][rs_space lg_device="5" md_device="" sm_device="" xs_device=""][vc_row_inner 0=""][vc_column_inner width="1/2" class_type="sm"][rs_icon_box style="type-3" icon="lnr lnr-license" heading="Get Certified "]Mobile ready proprietary dedication intuitive. Thought leadership pass the clap hackathon wearables.[/rs_icon_box][rs_space lg_device="30" md_device="" sm_device="" xs_device=""][rs_icon_box style="type-3" icon="lnr lnr-pie-chart" heading="Business Boost"]Mobile ready proprietary dedication intuitive. Thought leadership pass the clap hackathon wearables.[/rs_icon_box][/vc_column_inner][vc_column_inner width="1/2" class_type="sm"][rs_icon_box style="type-3" icon="lnr lnr-earth" heading="All Over the Web"]Platform omnichannel click bait thought leadership pivot. Disrupt taste makers council conversions emerging.[/rs_icon_box][rs_space lg_device="30" md_device="" sm_device="" xs_device=""][rs_icon_box style="type-3" icon="lnr lnr-paperclip" heading="Social Consultant"]Platform omnichannel click bait thought leadership pivot. Disrupt taste makers council conversions emerging.[/rs_icon_box][/vc_column_inner][/vc_row_inner][/vc_tta_section][vc_tta_section icon="lnr lnr-home" title="Consulting"][rs_space lg_device="5" md_device="" sm_device="" xs_device=""][vc_row_inner 0=""][vc_column_inner width="1/2" class_type="sm"][rs_icon_box style="type-3" icon="lnr lnr-envelope" heading="Get Certified "]Mobile ready proprietary dedication intuitive. Thought leadership pass the clap hackathon wearables.[/rs_icon_box][rs_space lg_device="30" md_device="" sm_device="" xs_device=""][rs_icon_box style="type-3" icon="lnr lnr-map" heading="Business Boost"]Mobile ready proprietary dedication intuitive. Thought leadership pass the clap hackathon wearables.[/rs_icon_box][/vc_column_inner][vc_column_inner width="1/2" class_type="sm"][rs_icon_box style="type-3" icon="lnr lnr-diamond" heading="All Over the Web"]Platform omnichannel click bait thought leadership pivot. Disrupt taste makers council conversions emerging.[/rs_icon_box][rs_space lg_device="30" md_device="" sm_device="" xs_device=""][rs_icon_box style="type-3" icon="lnr lnr-heart" heading="Social Consultant"]Platform omnichannel click bait thought leadership pivot. Disrupt taste makers council conversions emerging.[/rs_icon_box][/vc_column_inner][/vc_row_inner][rs_space lg_device="100" md_device="" sm_device="" xs_device=""][/vc_tta_section][vc_tta_section icon="lnr lnr-home" title="eBook Seminar"][rs_space lg_device="5" md_device="" sm_device="" xs_device=""][vc_row_inner 0=""][vc_column_inner width="1/2" class_type="sm"][rs_icon_box style="type-3" icon="lnr lnr-file-empty" heading="Get Certified "]Mobile ready proprietary dedication intuitive. Thought leadership pass the clap hackathon wearables.[/rs_icon_box][rs_space lg_device="30" md_device="" sm_device="" xs_device=""][rs_icon_box style="type-3" icon="lnr lnr-pie-chart" heading="Business Boost"]Mobile ready proprietary dedication intuitive. Thought leadership pass the clap hackathon wearables.[/rs_icon_box][/vc_column_inner][vc_column_inner width="1/2" class_type="sm"][rs_icon_box style="type-3" icon="lnr lnr-earth" heading="All Over the Web"]Platform omnichannel click bait thought leadership pivot. Disrupt taste makers council conversions emerging.[/rs_icon_box][rs_space lg_device="30" md_device="" sm_device="" xs_device=""][rs_icon_box style="type-3" icon="lnr lnr-heart" heading="Social Consultant"]Platform omnichannel click bait thought leadership pivot. Disrupt taste makers council conversions emerging.[/rs_icon_box][/vc_column_inner][/vc_row_inner][rs_space lg_device="100" md_device="" sm_device="" xs_device=""][/vc_tta_section][vc_tta_section icon="lnr lnr-home" title="Pay Per Click"][rs_space lg_device="5" md_device="" sm_device="" xs_device=""][vc_row_inner 0=""][vc_column_inner width="1/2" class_type="sm"][rs_icon_box style="type-3" icon="lnr lnr-briefcase" heading="Get Certified "]Mobile ready proprietary dedication intuitive. Thought leadership pass the clap hackathon wearables.[/rs_icon_box][rs_space lg_device="30" md_device="" sm_device="" xs_device=""][rs_icon_box style="type-3" icon="lnr lnr-pie-chart" heading="Business Boost"]Mobile ready proprietary dedication intuitive. Thought leadership pass the clap hackathon wearables.[/rs_icon_box][/vc_column_inner][vc_column_inner width="1/2" class_type="sm"][rs_icon_box style="type-3" icon="lnr lnr-earth" heading="All Over the Web"]Platform omnichannel click bait thought leadership pivot. Disrupt taste makers council conversions emerging.[/rs_icon_box][rs_space lg_device="30" md_device="" sm_device="" xs_device=""][rs_icon_box style="type-3" icon="lnr lnr-store" heading="Social Consultant"]Platform omnichannel click bait thought leadership pivot. Disrupt taste makers council conversions emerging.[/rs_icon_box][/vc_column_inner][/vc_row_inner][/vc_tta_section][/vc_tta_tabs][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'Featured Tabs 2', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/18.jpg' );
  $data['sort_name'] = 'featured-tabs';
  $data['custom_class'] = 'general featured-tabs';
  $data['content'] = <<<CONTENT
[vc_row][vc_column width="5/6" class_type="sm" offset="vc_col-sm-offset-1"][rs_section_heading small_heading="SEO MADE EASY" big_heading="Simplify your Business"][rs_space lg_device="40" md_device="" sm_device="30" xs_device=""][vc_tta_tabs active="1"][vc_tta_section icon="lnr lnr-chart-bars" title="Analytics "][vc_row_inner][vc_column_inner width="5/12"][vc_column_text dp_text_size="size-3"]
<h3><small>Inbound Marketing Formula</small></h3>Content curation market share customer engagement buzz flat design vertical-specific. Thought leadership iterative seed money lean content proprietary.
Content curation market share customer.
Engagement buzz flat design vertical-specific.
Insight on your business on any period of time.
Disrupt taste makers council conversions.
[/vc_column_text][/vc_column_inner][vc_column_inner width="7/12"][rs_image_block shadow="no" image="http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/10/hm.png"][/vc_column_inner][/vc_row_inner][/vc_tta_section][vc_tta_section icon="lnr lnr-hand" title="Add On"][vc_row_inner][vc_column_inner width="7/12"][rs_image_block shadow="no" image="http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/10/girl-1.png"][/vc_column_inner][vc_column_inner width="5/12"][vc_column_text dp_text_size="size-3"]
<h3><small>Inbound Marketing Formula</small></h3>Content curation market share customer.
Engagement buzz flat design vertical-specific.
Platform omnichannel click bait thought.
Disrupt taste makers council conversions.
Insight on your business on any period of time.
Great Marketing formulas to boost up business.
[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_tta_section][vc_tta_section icon="lnr lnr-pie-chart" title="Infographics"][vc_row_inner][vc_column_inner width="5/12"][vc_column_text dp_text_size="size-3"]
<h3><small>Inbound Marketing Formula</small></h3>Content curation market share customer engagement buzz flat design vertical-specific. Thought leadership iterative seed money lean content proprietary.
Content curation market share customer.
Engagement buzz flat design vertical-specific.
Platform omnichannel click bait thought.
Disrupt taste makers council conversions.
Insight on your business on any period of time.
[/vc_column_text][/vc_column_inner][vc_column_inner width="7/12"][rs_image_block shadow="no" image="http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/10/hm.png"][/vc_column_inner][/vc_row_inner][/vc_tta_section][vc_tta_section icon="lnr lnr-laptop-phone" title="Marketing Tools"][vc_row_inner][vc_column_inner width="7/12"][rs_image_block shadow="no" image="http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/10/girl-1.png"][/vc_column_inner][vc_column_inner width="5/12"][vc_column_text dp_text_size="size-3"]
<h3><small>Inbound Marketing Formula</small></h3>Content curation market share customer engagement buzz flat design vertical-specific. Thought leadership iterative seed money lean content proprietary.
Content curation market share customer.
Engagement buzz flat design vertical-specific.
Platform omnichannel click bait thought.
Disrupt taste makers council conversions.
Insight on your business on any period of time.
[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_tta_section][vc_tta_section icon="lnr lnr-pencil" title="Marketing Ideas"][vc_row_inner][vc_column_inner width="5/12"][vc_column_text dp_text_size="size-3"]
<h3><small>Inbound Marketing Formula</small></h3>Content curation market share customer engagement buzz flat design vertical-specific. Thought leadership iterative seed money lean content proprietary.
Content curation market share customer.
Engagement buzz flat design vertical-specific.
Platform omnichannel click bait thought.
Disrupt taste makers council conversions.
Insight on your business on any period of time.
[/vc_column_text][/vc_column_inner][vc_column_inner width="7/12"][rs_image_block shadow="no" image="http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/10/hm.png"][/vc_column_inner][/vc_row_inner][/vc_tta_section][/vc_tta_tabs][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'Featured Accordion With Image', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/16.jpg' );
  $data['sort_name'] = 'misc';
  $data['custom_class'] = 'general misc';
  $data['content'] = <<<CONTENT
[vc_row][vc_column width="1/3"][rs_image_block align="center-block" shadow="no" image="http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/11/2-1.png"][/vc_column][vc_column width="2/3"][vc_column_text]<h1 class="special-text" style="font-size: 30px; line-height: 1.5em; text-align: left; font-weight: 700; color: #30373b;">Business Management & Consulting</h1>[/vc_column_text][rs_space lg_device="10" md_device="" sm_device="" xs_device=""][vc_column_text]Dynamic content brand voice council tweens sticky content responsive ROI. Dynamic content CRM target audience buzz engagement.[/vc_column_text][rs_space lg_device="50" md_device="" sm_device="" xs_device=""][vc_accordion][vc_accordion_tab title="Identifying Brand Goals"][vc_column_text]Seed money optimized for social sharing chatvertizing brand awareness granular thought leadership. Engagement tweens native content drone.[/vc_column_text][/vc_accordion_tab][vc_accordion_tab title="Audience Insight "][vc_column_text]Seed money optimized for social sharing chatvertizing brand awareness granular thought leadership. Engagement tweens native content drone. Hit the like button CPM holistic content marketing responsive.[/vc_column_text][/vc_accordion_tab][/vc_accordion][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'Featured Tabs With Image and Icon', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/19.jpg' );
  $data['sort_name'] = 'featured-tabs';
  $data['custom_class'] = 'general featured-tabs';
  $data['content'] = <<<CONTENT
[vc_row][vc_column][rs_section_heading small_heading=" BEST KEPT SECRET" big_heading="Enterpreneur Meets Marketer"][rs_space lg_device="40" md_device="" sm_device="30" xs_device=""][vc_tta_tabs style="style2" active="1"][vc_tta_section icon="lnr lnr-home" title="Growth Hack"][rs_space lg_device="5" md_device="" sm_device="" xs_device=""][vc_row_inner][vc_column_inner width="1/2" class_type="sm"][rs_image_block shadow="no" image="http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/12/people.jpg"][/vc_column_inner][vc_column_inner width="1/2"][rs_icon_box style="type-3" icon="lnr lnr-diamond" heading="Social Consultant"]Platform omnichannel click bait thought leadership pivot.[/rs_icon_box][rs_space lg_device="30" md_device="" sm_device="" xs_device=""][rs_icon_box style="type-3" icon="lnr lnr-funnel" heading="Sales Funnel"]Platform omnichannel click bait thought leadership pivot.[/rs_icon_box][rs_space lg_device="30" md_device="" sm_device="" xs_device=""][rs_icon_box style="type-3" icon="lnr lnr-earth" heading="All Over the Web"]Platform omnichannel click bait thought leadership pivot.[/rs_icon_box][rs_space lg_device="100" md_device="" sm_device="" xs_device=""][/vc_column_inner][/vc_row_inner][/vc_tta_section][vc_tta_section icon="lnr lnr-home" title="Facebook Ads"][rs_space lg_device="5" md_device="" sm_device="" xs_device=""][vc_row_inner][vc_column_inner width="1/2" class_type="sm"][rs_image_block shadow="no" image="http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/12/people.jpg"][/vc_column_inner][vc_column_inner width="1/2"][rs_icon_box style="type-3" icon="lnr lnr-diamond" heading="Social Consultant"]Platform omnichannel click bait thought leadership pivot. Disrupt taste makers council conversions emerging.[/rs_icon_box][rs_space lg_device="30" md_device="" sm_device="" xs_device=""][rs_icon_box style="type-3" icon="lnr lnr-funnel" heading="Sales Funnel"]Platform omnichannel click bait thought leadership pivot. Disrupt taste makers council conversions emerging.[/rs_icon_box][rs_space lg_device="30" md_device="" sm_device="" xs_device=""][rs_icon_box style="type-3" icon="lnr lnr-earth" heading="All Over the Web"]Platform omnichannel click bait thought leadership pivot. Disrupt taste makers council conversions emerging.[/rs_icon_box][rs_space lg_device="100" md_device="" sm_device="" xs_device=""][/vc_column_inner][/vc_row_inner][/vc_tta_section][vc_tta_section icon="lnr lnr-home" title="Data Analyst "][rs_space lg_device="5" md_device="" sm_device="" xs_device=""][vc_row_inner][vc_column_inner width="1/2" class_type="sm"][rs_image_block shadow="no" image="http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/12/people.jpg"][/vc_column_inner][vc_column_inner width="1/2"][rs_icon_box style="type-3" icon="lnr lnr-diamond" heading="Social Consultant"]Platform omnichannel click bait thought leadership pivot. Disrupt taste makers council conversions emerging.[/rs_icon_box][rs_space lg_device="30" md_device="" sm_device="" xs_device=""][rs_icon_box style="type-3" icon="lnr lnr-funnel" heading="Sales Funnel"]Platform omnichannel click bait thought leadership pivot. Disrupt taste makers council conversions emerging.[/rs_icon_box][rs_space lg_device="30" md_device="" sm_device="" xs_device=""][rs_icon_box style="type-3" icon="lnr lnr-earth" heading="All Over the Web"]Platform omnichannel click bait thought leadership pivot. Disrupt taste makers council conversions emerging.[/rs_icon_box][rs_space lg_device="100" md_device="" sm_device="" xs_device=""][/vc_column_inner][/vc_row_inner][/vc_tta_section][vc_tta_section icon="lnr lnr-home" title="Consulting"][rs_space lg_device="5" md_device="" sm_device="" xs_device=""][vc_row_inner][vc_column_inner width="1/2" class_type="sm"][rs_image_block shadow="no" image="http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/12/people.jpg"][/vc_column_inner][vc_column_inner width="1/2"][rs_icon_box style="type-3" icon="lnr lnr-diamond" heading="Social Consultant"]Platform omnichannel click bait thought leadership pivot. Disrupt taste makers council conversions emerging.[/rs_icon_box][rs_space lg_device="30" md_device="" sm_device="" xs_device=""][rs_icon_box style="type-3" icon="lnr lnr-funnel" heading="Sales Funnel"]Platform omnichannel click bait thought leadership pivot. Disrupt taste makers council conversions emerging.[/rs_icon_box][rs_space lg_device="30" md_device="" sm_device="" xs_device=""][rs_icon_box style="type-3" icon="lnr lnr-earth" heading="All Over the Web"]Platform omnichannel click bait thought leadership pivot. Disrupt taste makers council conversions emerging.[/rs_icon_box][rs_space lg_device="100" md_device="" sm_device="" xs_device=""][/vc_column_inner][/vc_row_inner][/vc_tta_section][vc_tta_section icon="lnr lnr-home" title="eBook Seminar"][rs_space lg_device="5" md_device="" sm_device="" xs_device=""][vc_row_inner][vc_column_inner width="1/2" class_type="sm"][rs_image_block shadow="no" image="http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/12/people.jpg"][/vc_column_inner][vc_column_inner width="1/2"][rs_icon_box style="type-3" icon="lnr lnr-diamond" heading="Social Consultant"]Platform omnichannel click bait thought leadership pivot. Disrupt taste makers council conversions emerging.[/rs_icon_box][rs_space lg_device="30" md_device="" sm_device="" xs_device=""][rs_icon_box style="type-3" icon="lnr lnr-funnel" heading="Sales Funnel"]Platform omnichannel click bait thought leadership pivot. Disrupt taste makers council conversions emerging.[/rs_icon_box][rs_space lg_device="30" md_device="" sm_device="" xs_device=""][rs_icon_box style="type-3" icon="lnr lnr-earth" heading="All Over the Web"]Platform omnichannel click bait thought leadership pivot. Disrupt taste makers council conversions emerging.[/rs_icon_box][rs_space lg_device="100" md_device="" sm_device="" xs_device=""][/vc_column_inner][/vc_row_inner][/vc_tta_section][vc_tta_section icon="lnr lnr-home" title="Webinar"][rs_space lg_device="5" md_device="" sm_device="" xs_device=""][vc_row_inner][vc_column_inner width="1/2" class_type="sm"][rs_image_block shadow="no" image="http://themebubble.com/demo/marketingpro/wp-content/uploads/2016/12/people.jpg"][/vc_column_inner][vc_column_inner width="1/2"][rs_icon_box style="type-3" icon="lnr lnr-diamond" heading="Social Consultant"]Platform omnichannel click bait thought leadership pivot. Disrupt taste makers council conversions emerging.[/rs_icon_box][rs_space lg_device="30" md_device="" sm_device="" xs_device=""][rs_icon_box style="type-3" icon="lnr lnr-funnel" heading="Sales Funnel"]Platform omnichannel click bait thought leadership pivot. Disrupt taste makers council conversions emerging.[/rs_icon_box][rs_space lg_device="30" md_device="" sm_device="" xs_device=""][rs_icon_box style="type-3" icon="lnr lnr-earth" heading="All Over the Web"]Platform omnichannel click bait thought leadership pivot. Disrupt taste makers council conversions emerging.[/rs_icon_box][/vc_column_inner][/vc_row_inner][/vc_tta_section][/vc_tta_tabs][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;
  $data = array();
  $data['name'] = esc_html__( 'Google Map', 'marketing-addons' );
  $data['disabled'] = true; //disable it to not show in the default tab
  $data['image_path'] = preg_replace( '/\s/', '%20',  plugins_url('/assets/img/templates/', __FILE__) . '/32.jpg' );
  $data['sort_name'] = 'map';
  $data['custom_class'] = 'general map';
  $data['content'] = <<<CONTENT
[vc_row full_width="stretch_row_content_no_spaces" fluid="stretch_row_content"][vc_column][rs_google_map latidude="38.934274" longitude="-78.198075" string="Hello World " zoom_size="10"][/vc_column][/vc_row]
CONTENT;
  $templates[] = $data;

  
  return $templates;
}

/**
 *
 * Remove All VC Templates
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_reset_default_templates( $data ) {
  return array();
}
add_filter( 'vc_load_default_templates', 'rs_reset_default_templates' );

/**
 *
 * Load Templates
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function rs_add_default_templates() {
  $templates = rs_vc_templates();
  return array_map( 'vc_add_default_templates', $templates );
}

rs_add_default_templates();