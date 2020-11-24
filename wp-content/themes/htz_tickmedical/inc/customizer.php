<?php
/*htz Theme Customizer.*
 * @package htz */

/*Create options page*/
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Tùy chỉnh',
		'menu_title'	=> 'Tùy chỉnh',
		'menu_slug' 	=> 'customizer',
		'capability'	=> 'edit_posts',
		'icon_url' 		=> 'dashicons-hammer',
		'id'			=> 'customizer',
		'post_id' 		=> 'customizer',
	));
}

/*Add FTP field group*/
if( function_exists('acf_add_local_field_group') ) {
	
	acf_add_local_field_group(	array(
		'key'		=> 'customizer_setup',
		'title' 	=> __( 'Cài đặt', 'htz' ),
		'fields' 	=> array (
			/*Logo*/
            array (
				'key'   		=> 'tab_hotro',
				'label' 		=> __( 'Logo  ', 'htz' ),
				'name'  		=> 'tab_hotro',
				'type'  		=> 'tab',
				'placement' 	=> 'left',
			),
			
			array (
				'key'   		=> 'itobjects',
				'label' 		=> __( 'Itobject', 'htz' ),
				'name'  		=> 'itobjects',
				'type'  		=> 'text', 
			),
	
			 array (
				'key'   		=> 'logo',
				'label' 		=> __( 'Logo', 'htz' ),
				'name'  		=> 'logo',
				'type'  		=> 'image',
			),
			array (
				'key'   		=> 'logo_mobile',
				'label' 		=> __( 'Logo mobile', 'htz' ),
				'name'  		=> 'logo_mobile',
				'type'  		=> 'image',
			),
			 array (
				'key'   		=> 'favicon',
				'label' 		=> __( 'Favicon', 'htz' ),
				'name'  		=> 'favicon',
				'type'  		=> 'image',
			),
			 
			 array (
				'key'   		=> 'keywords',
				'label' 		=> __( 'Keywords', 'htz' ),
				'name'  		=> 'keywords',
				'type'  		=> 'textarea',
			),
		
		    array (
				'key'   		=> 'description',
				'label' 		=> __( 'Description', 'htz' ),
				'name'  		=> 'description',
				'type'  		=> 'textarea',
			),
	
		  //Head
			array (
				'key'   		=> 'tab_header',
				'label' 		=> __( 'Header', 'htz' ),
				'name'  		=> 'tab_header',
				'type'  		=> 'tab',
				'placement' 	=> 'left',
			),

		 
		 array (
				'key'   		=> 'header_phone1',
				'label' 		=> __( 'Số điện thoại 1', 'htz' ),
				'name'  		=> 'header_phone1',
				'type'  		=> 'text',
			),
		 array (
				'key'   		=> 'header_phone2',
				'label' 		=> __( 'Số điện thoại 2', 'htz' ),
				'name'  		=> 'header_phone2',
				'type'  		=> 'text',
			),
		 array (
				'key'   		=> 'header_top',
				'label' 		=> __( 'Dia chi top', 'htz' ),
				'name'  		=> 'header_top',
				'type'  		=> 'text',
			),
		  array (
				'key'   		=> 'header_address',
				'label' 		=> __( 'Dia chi', 'htz' ),
				'name'  		=> 'header_address',
				'type'  		=> 'text',
			),
		  array (
				'key'   		=> 'header_email',
				'label' 		=> __( 'Email', 'htz' ),
				'name'  		=> 'header_email',
				'type'  		=> 'text',
			),
		  array (
				'key'   		=> 'zalo',
				'label' 		=> __( 'Zalo', 'htz' ),
				'name'  		=> 'zalo',
				'type'  		=> 'text',
			),
			
		  
		    array (
				'key'   		=> 'idfacebook',
				'label' 		=> __( 'facebook', 'htz' ),
				'name'  		=> 'idfacebook',
				'type'  		=> 'text',
			),	
			 array (
				'key'   		=> 'idyoutube',
				'label' 		=> __( 'Youtube', 'htz' ),
				'name'  		=> 'idyoutube',
				'type'  		=> 'text',
			),
			  array (
				'key'   		=> 'twiter',
				'label' 		=> __( 'twiter', 'htz' ),
				'name'  		=> 'twiter',
				'type'  		=> 'text',
			),
			  array (
				'key'   		=> 'intagram',
				'label' 		=> __( 'intagram', 'htz' ),
				'name'  		=> 'intagram',
				'type'  		=> 'text',
			),
     	/*slider*/
			  array (
					'key'   		=> 'tab_slider',
					'label' 		=> __( 'slider', 'htz' ),
					'name'  		=> 'tab_slider',
					'type'  		=> 'tab',
					'placement' 	=> 'left',
				),
		 
			
				array (
				'key'   		=> 'slider',
				'label' 		=> __( 'Hình slider (1349x594)', 'htz' ),
				'name'  		=> 'slider',
				'type'  		=> 'repeater',
				//'layout'	   => 'block',
				'layout'	   => 'table',
				'button_label' => __( 'Thêm', 'htz' ),
				'sub_fields' => array (
					array (
						'key'   		=> 'image_slider',
						'label' 		=> __( 'slider desktop', 'htz' ),
						'name'  		=> 'image_slider',
						'type'  		=> 'image',
					),
					 
					array (
						'key'   		=> 'image_slider_mobile',
						'label' 		=> __( 'slider mobile', 'htz' ),
						'name'  		=> 'image_slider_mobile',
						'type'  		=> 'image',
					), 
					 
					array (
						'key'   		=> 'link_slider',
						'label' 		=> __( 'Link', 'htz' ),
						'name'  		=> 'link_slider',
						'type'  		=> 'text',
					 
					),
				),
			),
			/*slider video */
			/*slider*/
		  array (
				'key'   		=> 'tab_slider_video',
				'label' 		=> __( 'slider video', 'htz' ),
				'name'  		=> 'tab_slider_video',
				'type'  		=> 'tab',
				'placement' 	=> 'left',
			),
		 
		 	array (
				'key'   		=> 'slider_video_header',
				'label' 		=> __( 'Tieu de ', 'htz' ),
				'name'  		=> 'slider_video_header',
				'type'  		=> 'text',
			),

		    array (
				'key'   		=> 'slider_video_description',
				'label' 		=> __( 'Mo ta', 'htz' ),
				'name'  		=> 'slider_video_description',
				'type'  		=> 'textarea',	
			),
			
			array (
			'key'   		=> 'slider_video',
			'label' 		=> __( 'Ảnh đại diện video (1349x594)', 'htz' ),
			'name'  		=> 'slider_video',
			'type'  		=> 'repeater',
			//'layout'	   => 'block',
			'layout'	   => 'table',
			'button_label' => __( 'Thêm', 'htz' ),
			'sub_fields' => array (
				array (
					'key'   		=> 'image_slider_video',
					'label' 		=> __( 'slider desktop', 'htz' ),
					'name'  		=> 'image_slider_video',
					'type'  		=> 'image',
				),
				 
				array (
					'key'   		=> 'link_slider_video',
					'label' 		=> __( 'id video', 'htz' ),
					'name'  		=> 'link_slider_video',
					'type'  		=> 'text',
				 
				),
			),
		),
			/*khuyen mai*/
			array (
				'key'   		=> 'promotion',
				'label' 		=> __( 'Khuyến mãi', 'htz' ),
				'name'  		=> 'promotion',
				'type'  		=> 'tab',
				'placement' 	=> 'left',
			),

		    array (
				'key'   		=> 'promotion_header',
				'label' 		=> __( 'Tiêu đề khuen mãi', 'htz' ),
				'name'  		=> 'promotion_header',
				'type'  		=> 'text',	
			),
	 		/*action*/
			array (
				'key'   		=> 'callaction',
				'label' 		=> __( 'Kêu gọi hành động', 'htz' ),
				'name'  		=> 'callaction',
				'type'  		=> 'tab',
				'placement' 	=> 'left',
			),
			array (
				'key'   		=> 'callaction_phone',
				'label' 		=> __( 'Điện thoại', 'htz' ),
				'name'  		=> 'callaction_phone',
				'type'  		=> 'text',	
			),
		    array (
				'key'   		=> 'callaction_decs',
				'label' 		=> __( 'Mô tả', 'htz' ),
				'name'  		=> 'callaction_decs',
				'type'  		=> 'textarea',	
			),
			array (
				'key'   		=> 'callaction_background',
				'label' 		=> __( 'Ảnh nền', 'htz' ),
				'name'  		=> 'callaction_background',
				'type'  		=> 'image',	
			),
			/*About us*/
			array (
				'key'   		=> 'about',
				'label' 		=> __( 'Về chúng tôi', 'htz' ),
				'name'  		=> 'about',
				'type'  		=> 'tab',
				'placement' 	=> 'left',
			),
			array (
				'key'   		=> 'about_header',
				'label' 		=> __( 'Tiêu đề', 'htz' ),
				'name'  		=> 'about_header',
				'type'  		=> 'text',	
			),
			array (
				'key'   		=> 'about_title',
				'label' 		=> __( 'Tiêu đề bài viết', 'htz' ),
				'name'  		=> 'about_title',
				'type'  		=> 'text',	
			),
		    array (
				'key'   		=> 'about_decs',
				'label' 		=> __( 'Mô tả', 'htz' ),
				'name'  		=> 'about_decs',
				'type'  		=> 'textarea',	
			),
			array (
				'key'   		=> 'about_background',
				'label' 		=> __( 'Ảnh nền (1920px x 1291px)', 'htz' ),
				'name'  		=> 'about_background',
				'type'  		=> 'image',	
			),
			array (
				'key'   		=> 'about_test',
				'label' 		=> __( 'Ảnh đại diện', 'htz' ),
				'name'  		=> 'about_test',
				'type'  		=> 'image',	
			),
			array (
				'key'   		=> 'about_button',
				'label' 		=> __( 'Ảnh nut', 'htz' ),
				'name'  		=> 'about_button',
				'type'  		=> 'image',	
			),
			array (
				'key'   		=> 'about_link',
				'label' 		=> __( 'Link test', 'htz' ),
				'name'  		=> 'about_link',
				'type'  		=> 'text',	
			),
			array (
				'key'   		=> 'about_point',
				'label' 		=> __( 'anh chi tay', 'htz' ),
				'name'  		=> 'about_point',
				'type'  		=> 'image',	
			),
			/*Dich vu*/
			array (
				'key'   		=> 'service',
				'label' 		=> __( 'Dịch vụ', 'htz' ),
				'name'  		=> 'service',
				'type'  		=> 'tab',
				'placement' 	=> 'left',
			),
			array (
				'key'   		=> 'service_header',
				'label' 		=> __( 'Tiêu đề', 'htz' ),
				'name'  		=> 'service_header',
				'type'  		=> 'text',	
			),
		    array (
				'key'   		=> 'service_decs',
				'label' 		=> __( 'Mô tả', 'htz' ),
				'name'  		=> 'service_decs',
				'type'  		=> 'textarea',	
			),
			array (
				'key'   		=> 'service_background',
				'label' 		=> __( 'Ảnh nền (1901px x 962px)', 'htz' ),
				'name'  		=> 'service_background',
				'type'  		=> 'image',	
			),
			/*Đội ngũ*/
			array (
				'key'   		=> 'doctor',
				'label' 		=> __( 'Đội ngũ', 'htz' ),
				'name'  		=> 'doctor',
				'type'  		=> 'tab',
				'placement' 	=> 'left',
			),
			array (
				'key'   		=> 'doctor_header',
				'label' 		=> __( 'Tiêu đề', 'htz' ),
				'name'  		=> 'doctor_header',
				'type'  		=> 'text',	
			),
		    array (
				'key'   		=> 'doctor_decs',
				'label' 		=> __( 'Mô tả', 'htz' ),
				'name'  		=> 'doctor_decs',
				'type'  		=> 'textarea',	
			),
			array (
				'key'   		=> 'doctor_thumbnail',
				'label' 		=> __( 'Ảnh đại diện', 'htz' ),
				'name'  		=> 'doctor_thumbnail',
				'type'  		=> 'image',	
			),
			array (
				'key'   		=> 'doctor_thumbnail_title',
				'label' 		=> __( 'Title', 'htz' ),
				'name'  		=> 'doctor_thumbnail_title',
				'type'  		=> 'text',	
			),
			array (
				'key'   		=> 'doctor_thumbnail_link',
				'label' 		=> __( 'Link', 'htz' ),
				'name'  		=> 'doctor_thumbnail_link',
				'type'  		=> 'text',	
			),
			array (
				'key'   		=> 'doctor_thumbnail_title_video',
				'label' 		=> __( 'Title video', 'htz' ),
				'name'  		=> 'doctor_thumbnail_title_video',
				'type'  		=> 'text',	
			),
			array (
				'key'   		=> 'doctor_thumbnail_title_link',
				'label' 		=> __( 'Link video', 'htz' ),
				'name'  		=> 'doctor_thumbnail_title_link',
				'type'  		=> 'text',	
			),
			/*Chuyen vien*/
			array (
				'key'   		=> 'chuyenvien',
				'label' 		=> __( 'Chuyen vien', 'htz' ),
				'name'  		=> 'chuyenvien',
				'type'  		=> 'tab',
				'placement' 	=> 'left',
			),
			array (
				'key'   		=> 'chuyenvien_header',
				'label' 		=> __( 'Tiêu đề', 'htz' ),
				'name'  		=> 'chuyenvien_header',
				'type'  		=> 'text',	
			),
		    array (
				'key'   		=> 'chuyenvien_decs',
				'label' 		=> __( 'Mô tả', 'htz' ),
				'name'  		=> 'chuyenvien_decs',
				'type'  		=> 'textarea',	
			),
			 array (
				'key'   		=> 'chuyenvien_image',
				'label' 		=> __( 'Mô tả', 'htz' ),
				'name'  		=> 'chuyenvien_image',
				'type'  		=> 'image',	
			),
			 array (
				'key'   		=> 'chuyenvien_title',
				'label' 		=> __( 'Tiêu đề bài viết', 'htz' ),
				'name'  		=> 'chuyenvien_title',
				'type'  		=> 'text',	
			),
			 array (
				'key'   		=> 'chuyenvien_link',
				'label' 		=> __( 'liên kết', 'htz' ),
				'name'  		=> 'chuyenvien_link',
				'type'  		=> 'text',	
			),
			  array (
				'key'   		=> 'chuyenvien_video_title',
				'label' 		=> __( 'Tiêu đề bài viết', 'htz' ),
				'name'  		=> 'chuyenvien_video_title',
				'type'  		=> 'text',	
			),
			 array (
				'key'   		=> 'chuyenvien_video_link',
				'label' 		=> __( 'liên kết', 'htz' ),
				'name'  		=> 'chuyenvien_video_link',
				'type'  		=> 'text',	
			),
			/*Câu chuyện khách hàng*/
			array (
				'key'   		=> 'story',
				'label' 		=> __( 'Câu chuyện khách hàng', 'htz' ),
				'name'  		=> 'story',
				'type'  		=> 'tab',
				'placement' 	=> 'left',
			),
			array (
				'key'   		=> 'story_header',
				'label' 		=> __( 'Tiêu đề', 'htz' ),
				'name'  		=> 'story_header',
				'type'  		=> 'text',	
			),
		    array (
				'key'   		=> 'story_decs',
				'label' 		=> __( 'Mô tả', 'htz' ),
				'name'  		=> 'story_decs',
				'type'  		=> 'textarea',	
			),
			/*Câu chuyện khách hàng*/
			array (
				'key'   		=> 'story',
				'label' 		=> __( 'Câu chuyện khách hàng', 'htz' ),
				'name'  		=> 'story',
				'type'  		=> 'tab',
				'placement' 	=> 'left',
			),
			array (
				'key'   		=> 'story_header',
				'label' 		=> __( 'Tiêu đề', 'htz' ),
				'name'  		=> 'story_header',
				'type'  		=> 'text',	
			),
		    array (
				'key'   		=> 'story_decs',
				'label' 		=> __( 'Mô tả', 'htz' ),
				'name'  		=> 'story_decs',
				'type'  		=> 'textarea',	
			),

			/*Đánh giá khách hàng*/
			array (
				'key'   		=> 'review',
				'label' 		=> __( 'Ý kiến khách hàng', 'htz' ),
				'name'  		=> 'review',
				'type'  		=> 'tab',
				'placement' 	=> 'left',
			),
			array (
				'key'   		=> 'review_header',
				'label' 		=> __( 'Tiêu đề', 'htz' ),
				'name'  		=> 'review_header',
				'type'  		=> 'text',	
			),
		    array (
				'key'   		=> 'review_decs',
				'label' 		=> __( 'Mô tả', 'htz' ),
				'name'  		=> 'review_decs',
				'type'  		=> 'textarea',	
			),
			 array (
				'key'   		=> 'review_background',
				'label' 		=> __( 'Hình nền', 'htz' ),
				'name'  		=> 'review_background',
				'type'  		=> 'image',	
			),
			 /*blog*/
			array (
				'key'   		=> 'blog',
				'label' 		=> __( 'Tin tức', 'htz' ),
				'name'  		=> 'blog',
				'type'  		=> 'tab',
				'placement' 	=> 'left',
			),
			array (
				'key'   		=> 'blog_header',
				'label' 		=> __( 'Tiêu đề', 'htz' ),
				'name'  		=> 'blog_header',
				'type'  		=> 'text',	
			),
		    array (
				'key'   		=> 'blog_decs',
				'label' 		=> __( 'Mô tả', 'htz' ),
				'name'  		=> 'blog_decs',
				'type'  		=> 'textarea',	
			),
			 array (
				'key'   		=> 'blog_background',
				'label' 		=> __( 'Hình nền', 'htz' ),
				'name'  		=> 'blog_background',
				'type'  		=> 'image',	
			),
			 /*blog chuyen gia*/
			array (
				'key'   		=> 'blog-chuyengia',
				'label' 		=> __( 'Chuyen gia', 'htz' ),
				'name'  		=> 'blog-chuyengia',
				'type'  		=> 'tab',
				'placement' 	=> 'left',
			),
			array (
				'key'   		=> 'blog_header_chuyengia',
				'label' 		=> __( 'Tiêu đề', 'htz' ),
				'name'  		=> 'blog_header_chuyengia',
				'type'  		=> 'text',	
			),
		    array (
				'key'   		=> 'blog_decs_chuyengia',
				'label' 		=> __( 'Mô tả', 'htz' ),
				'name'  		=> 'blog_decs_chuyengia',
				'type'  		=> 'textarea',	
			),
			/*blog chuyen gia*/
			array (
				'key'   		=> 'blog-hoidap',
				'label' 		=> __( 'Hoi dap', 'htz' ),
				'name'  		=> 'blog-hoidap',
				'type'  		=> 'tab',
				'placement' 	=> 'left',
			),
			array (
				'key'   		=> 'blog_header_hoidap',
				'label' 		=> __( 'Tiêu đề', 'htz' ),
				'name'  		=> 'blog_header_hoidap',
				'type'  		=> 'text',	
			),
		    array (
				'key'   		=> 'blog_decs_hoidap',
				'label' 		=> __( 'Mô tả', 'htz' ),
				'name'  		=> 'blog_decs_hoidap',
				'type'  		=> 'textarea',	
			),
			/*partner*/
			array (
				'key'   		=> 'section_partner',
				'label' 		=> __( 'section partner', 'htz' ),
				'name'  		=> 'partner_header_genaral',
				'type'  		=> 'tab',
				'placement' 	=> 'left',
			),

		    array (
				'key'   		=> 'partner_header',
				'label' 		=> __( 'Tiêu đề đối tác', 'htz' ),
				'name'  		=> 'partner_header',
				'type'  		=> 'text',	
			),
	 		array (
				'key'   		=> 'partner_caption',
				'label' 		=> __( 'Mô tả', 'htz' ),
				'name'  		=> 'partner_caption',
				'type'  		=> 'textarea',
			),

		    
			array (
				'key'   		=> 'partner_image',
				'label' 		=> __( 'Hình logo', 'htz' ),
				'name'  		=> 'partner_image',
				'type'  		=> 'repeater',
				'layout'	   => 'table',
				'button_label' => __( 'Thêm', 'htz' ),
				'sub_fields' => array (
					array (
						'key'   		=> 'image_partner',
						'label' 		=> __( 'Hình ảnh', 'htz' ),
						'name'  		=> 'image_partner_thumb',
						'type'  		=> 'image',
					),
					 
					 
					 
					array (
						'key'   		=> 'link_partner_logo',
						'label' 		=> __( 'Link', 'htz' ),
						'name'  		=> 'link_partner_logo',
						'type'  		=> 'text',
					 
					),
					
				),
			),
			
			/* consultant */
			array (
				'key'   		=> 'register_tab',
				'label' 		=> __( 'Dang ky', 'htz' ),
				'name'  		=> 'register_tab',
				'type'  		=> 'tab',
				'placement' 	=> 'left',
			),
			array (
					'key'   		=> 'register_header',
					'label' 		=> __( 'Keu goi hanh dong', 'htz' ),
					'name'  		=> 'register_header',
					/*'type'  		=> 'text',*/
					'type'  		=> 'textarea',
				 
				),
			array (
					'key'   		=> 'register_image',
					'label' 		=> __( 'anh chuyen gia', 'htz' ),
					'name'  		=> 'register_image',
					/*'type'  		=> 'text',*/
					'type'  		=> 'image',
				 
				),


			/* khach hang */
			array (
				'key'   		=> 'customer_tab',
				'label' 		=> __( 'Khach hang', 'htz' ),
				'name'  		=> 'customer_tab',
				'type'  		=> 'tab',
				'placement' 	=> 'left',
			),
			array (
					'key'   		=> 'customer_banner',
					'label' 		=> __( 'banner tin khach hang (300 x 600 px)', 'htz' ),
					'name'  		=> 'customer_header',
					'type'  		=> 'image',
				 
				),
			//uu dai
			array (
					'key'   		=> 'gift',
					'label' 		=> __( 'Nhan qua tang', 'htz' ),
					'name'  		=> 'gift',
					'type'  		=> 'tab',
					'placement' 	=> 'left',
				),
				array (
					'key'   		=> 'gift_image_head',
					'label' 		=> __( 'anh qua (150 x 150)', 'htz' ),
					'name'  		=> 'gift_image_head',
					'type'  		=> 'image',
				 
				),
				array (
					'key'   		=> 'gift_header',
					'label' 		=> __( 'Tieu đề', 'htz' ),
					'name'  		=> 'gift_header',
					'type'  		=> 'text',
				),
				array (
					'key'   		=> 'gift_image1',
					'label' 		=> __( 'anh qua (740 x 440)', 'htz' ),
					'name'  		=> 'gift_image1',
					'type'  		=> 'image',
				 
				),
				array (
					'key'   		=> 'gift_image2',
					'label' 		=> __( 'anhanh qua (740 x 440)', 'htz' ),
					'name'  		=> 'gift_image2',
					'type'  		=> 'image',
				 
				),
				array (
					'key'   		=> 'gift_action',
					'label' 		=> __( 'Tieu đề', 'htz' ),
					'name'  		=> 'gift_action',
					'type'  		=> 'textarea',
				),
				array (
					'key'   		=> 'gift_button',
					'label' 		=> __( 'anh nut', 'htz' ),
					'name'  		=> 'gift_button',
					'type'  		=> 'image',
				),
			/* footer */
			array (
				'key'   		=> 'footer',
				'label' 		=> __( 'Chan trang', 'htz' ),
				'name'  		=> 'footer',
				'type'  		=> 'tab',
				'placement' 	=> 'left',
			),
			array (
					'key'   		=> 'footer_logo',
					'label' 		=> __( 'logo footer', 'htz' ),
					'name'  		=> 'footer_logo',
					/*'type'  		=> 'text',*/
					'type'  		=> 'image',
				 
				),
			array (
					'key'   		=> 'footer_desc',
					'label' 		=> __( 'mo ta', 'htz' ),
					'name'  		=> 'footer_desc',
					'type'  		=> 'textarea',
				 
				),
			array (
					'key'   		=> 'footer_chinhanh',
					'label' 		=> __( 'Chi nhanh', 'htz' ),
					'name'  		=> 'footer_chinhanh',
					'type'  		=> 'textarea',
				 
				),
			array (
					'key'   		=> 'footer_giayphep',
					'label' 		=> __( 'Chi nhanh', 'htz' ),
					'name'  		=> 'footer_giayphep',
					'type'  		=> 'textarea',
				 
				),
			array (
					'key'   		=> 'footer_bocongthuong_link',
					'label' 		=> __( 'link bo cong thuong', 'htz' ),
					'name'  		=> 'footer_bocongthuong_link',
					'type'  		=> 'text',
				 
				),
			array (
					'key'   		=> 'footer_bocongthuong_logo',
					'label' 		=> __( 'logo thong bao bo cong thuong', 'htz' ),
					'name'  		=> 'footer_bocongthuong_logo',
					'type'  		=> 'image',
				 
				),
			/* footer */
			array (
				'key'   		=> 'banner',
				'label' 		=> __( 'Banner', 'htz' ),
				'name'  		=> 'banner',
				'type'  		=> 'tab',
				'placement' 	=> 'left',
			),
			array (
					'key'   		=> 'banner_single',
					'label' 		=> __( 'banner chi tiet', 'htz' ),
					'name'  		=> 'banner_single',
					/*'type'  		=> 'text',*/
					'type'  		=> 'image',
				 
				),
			array (
					'key'   		=> 'banner_single_logo',
					'label' 		=> __( 'logo chi tiet', 'htz' ),
					'name'  		=> 'banner_single_logo',
					/*'type'  		=> 'text',*/
					'type'  		=> 'image',
				 
				),
			/* footer */
			array (
				'key'   		=> 'reg_foot',
				'label' 		=> __( 'form dang ky chan trang', 'htz' ),
				'name'  		=> 'reg_foot',
				'type'  		=> 'tab',
				'placement' 	=> 'left',
			),
			array (
					'key'   		=> 'reg_foot_single',
					'label' 		=> __( 'mo ta', 'htz' ),
					'name'  		=> 'reg_foot_single',
					'type'  		=> 'textarea',
				),
			array (
					'key'   		=> 'reg_foot_button',
					'label' 		=> __( 'nut dang ky', 'htz' ),
					'name'  		=> 'reg_foot_button',
					'type'  		=> 'text',
				),
			/* menu top */
			/*slider*/
		  array (
				'key'   		=> 'tab_menu-top',
				'label' 		=> __( 'menu top', 'htz' ),
				'name'  		=> 'tab_menu-top',
				'type'  		=> 'tab',
				'placement' 	=> 'left',
			),
			array (
			'key'   		=> 'menu-top',
			'label' 		=> __( 'menu top', 'htz' ),
			'name'  		=> 'menu-top',
			'type'  		=> 'repeater',
			//'layout'	   => 'block',
			'layout'	   => 'table',
			'button_label' => __( 'Thêm', 'htz' ),
			'sub_fields' => array (
					array (
						'key'   		=> 'menu-top_cate',
						'label' 		=> __( 'Ten chuyen muc', 'htz' ),
						'name'  		=> 'menu-top_cate',
						'type'  		=> 'text',
					),
					array (
						'key'   		=> 'menu-top_cate_link',
						'label' 		=> __( 'Link home', 'htz' ),
						'name'  		=> 'menu-top_cate_link',
						'type'  		=> 'text',
					 
					),
					array (
						'key'   		=> 'menu-top_cate_link_single',
						'label' 		=> __( 'Link single', 'htz' ),
						'name'  		=> 'menu-top_cate_link_single',
						'type'  		=> 'text',
					 
					),
				),
			),
			
			 array (
				'key'   		=> 'menu-bottom',
				'label' 		=> __( 'menu bottom', 'htz' ),
				'name'  		=> 'menu-bottom',
				'type'  		=> 'tab',
				'placement' 	=> 'left',
			),
			 array (
					'key'   		=> 'menu-bottom-phone',
					'label' 		=> __( 'icon phone menu', 'htz' ),
					'name'  		=> 'menu-bottom-phone',
					'type'  		=> 'image',
				),
			 array (
					'key'   		=> 'menu-bottom-phone-link',
					'label' 		=> __( 'icon phone menu', 'htz' ),
					'name'  		=> 'menu-bottom-phone-link',
					'type'  		=> 'text',
				),
			 array (
					'key'   		=> 'menu-bottom-zalo',
					'label' 		=> __( 'icon zalo menu', 'htz' ),
					'name'  		=> 'menu-bottom-zalo',
					'type'  		=> 'image',
				),
			 array (
					'key'   		=> 'menu-bottom-zalo-link',
					'label' 		=> __( 'icon zalo menu', 'htz' ),
					'name'  		=> 'menu-bottom-zalo-link',
					'type'  		=> 'text',
				),
			array (
					'key'   		=> 'menu-bottom-messenger',
					'label' 		=> __( 'icon messenger menu', 'htz' ),
					'name'  		=> 'menu-bottom-messenger',
					'type'  		=> 'image',
				),
			array (
					'key'   		=> 'menu-bottom-messenger-link',
					'label' 		=> __( 'link messenger menu', 'htz' ),
					'name'  		=> 'menu-bottom-messenger-link',
					'type'  		=> 'text',
				),
			array (
					'key'   		=> 'menu-bottom-reg',
					'label' 		=> __( 'nut dang ky menu', 'htz' ),
					'name'  		=> 'menu-bottom-reg',
					'type'  		=> 'image',
				),
			array (
					'key'   		=> 'menu-bottom-reg-link',
					'label' 		=> __( 'nut dang ky menu', 'htz' ),
					'name'  		=> 'menu-bottom-reg0link',
					'type'  		=> 'text',
				),
			array (
					'key'   		=> 'menu-bottom-bar',
					'label' 		=> __( 'icon bar menu', 'htz' ),
					'name'  		=> 'menu-bottom-bar',
					'type'  		=> 'image',
				),
			/*===============================================*/
			
			
		),
		'location' => array (
			array (
				array (
					'param'    => 'options_page',
					'operator' => '==',
					'value'    => 'customizer',
				),
			),
		),
	));
}