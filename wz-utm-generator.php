<?php

/*[wz-utm-generator]*/

add_shortcode( 'wz-utm-generator', 'wz_utm_generator_shortcode' );

function wz_utm_generator_shortcode( $atts ) {?>

	<style>
		h2, h3, h4 {
			font-family: 'Montserrat';
			font-weight: 600;
			color: #212121;
		}
	
		.wz-utm-wrapper {
			max-width: 1200px;
			width: 1200px;
			margin: 0 auto;
			padding: 48px 0 48px 0;
			display: grid;
			grid-template-columns: 552px 483px;
			column-gap: 60px;
			grid-template-rows: 172px 781px;
		}
		
		.wz-utm-wrapper--result {
			max-width: 1200px;
			width: 1200px;
			margin: 0 auto;
			padding: 48px 0 48px 0;
		}
		
		.wz-utm-generator__result {
			background-color: #F6F8F9;
		}
		
		.wz-utm-title {
			font-size: 36px;
			line-height: 44px;
			margin: 0;
			margin-bottom: 24px;
		}
		
		.wz-utm-title--low {
			font-size: 24px;
			line-height: 29px;
			margin: 0;
			margin-bottom: 20px;
		}
		
		.wz-utm-title--xlow {
			font-size: 18px;
			line-height: 22px;
			margin: 0;
			margin-bottom: 20px;
		}
		
		.wz-utm-title--green {
			color: #4CAF50;
		}
		
		.wz-utm-title--separate {
			margin-top: 24px;
		}
		
		.wz-utm-input {
			border: none;
			outline: none;
			height: 56px;
			background-color: #F6F8F9;
			width: 486px;
			font-family: 'Roboto';
			font-weight: 400;
			font-size: 17px;
			line-height: 20px;
			color: #4E4E4E;
			border-radius: 4px;
			padding-left: 24px;
			padding-right: 185px;
			position: relative;
			margin-bottom: 24px;
		}
		
		.wz-utm-res__input {
			padding-right: unset;
			width: 792px;
			background-color: #fff;
		}
		
		.wz-utm-url__input {
			padding-left: 174px;
			padding-right: unset;
			margin-bottom: unset;
			width: 792px;
		}
		
		.wz-utm-input:nth-child(6) {
			margin-bottom: unset;
		}
		
		.wz-utm-url {
			position: relative;
		}
		
		.wz-utm-url__selector {
			position: absolute;
			left: 0;
			top: 0;
			z-index: 1;
			height: 56px;
			width: 146px;
			font-family: 'Roboto';
			font-weight: 400;
			font-size: 20px;
			line-height: 23px;
			color: #212121;
			border-top-left-radius: 4px;
			border-bottom-left-radius: 4px;
			overflow-y: hidden;
		}
		
		.wz-utm-url__selector--active {
			overflow-y: unset;
			border-bottom-left-radius: 0px;
		}
		
		.wz-utm-url__selector--active .wz-utm-url__selector-default {
			border-bottom-left-radius: 0px;
		}
		
		.wz-utm-url__selector--active .wz-utm-url__selector-default:after {
			transform: translateY(-50%) rotate(180deg);
		}
		
		.wz-utm-url__selector-default {
			background-color: #D2EBD3;
			border-top-left-radius: 4px;
			border-bottom-left-radius: 4px;
			position: relative;
			cursor: pointer;
		}
		
		.wz-utm-url__selector-default:after {
			content: '';
			width: 9px;
			height: 5px;
			background-image: url('/wp-content/uploads/2022/10/vector-7.svg');
			background-size: cover;
			position: absolute;
			right: 25px;
			top: 50%;
			transform: translateY(-50%) rotate(0deg);
		}
		
		.wz-utm-url__item {
			background-color: #fff;
			cursor: pointer;
		}
		
		.wz-utm-url__item:last-child {
			border-bottom-left-radius: 4px;
			border-bottom-right-radius: 4px;
		}
		
		.wz-utm-url__item--active {
			background-color: #D2EBD3;
		}
				
		.wz-utm-url__selector-default,
		.wz-utm-url__item {
			padding: 16px 53px 17px 28px;
		}
		
		.wz-utm-start {
			margin-bottom: 48px;
			grid-column: 1/3;
			grid-row: 1/2;
		}
		
		.wz-utm-workspace {
			display: flex;
			flex-direction: row;
			flex-wrap: wrap;
			width: 100%;
			margin-top: 48px;
		}
		
		.wz-utm-params {
			grid-column: 1/2;
			grid-row: 2/3;
		}
		
		.wz-utm-source {
			grid-column: 2/3;
			grid-row: 2/3;
		}
		
		.wz-utm-params__subtitle {
			display: flex;
			align-items: center;
		}
		
		.wz-utm-question {
			font-family: 'Roboto';
			font-weight: 600;
			font-size: 12px;
			line-height: 20px;
			color: #FFFFFF;
			height: 20px;
			width: 20px;
			text-align: center;
			background-color: #D9D9D9;
			border-radius: 50%;
			margin-bottom: 20px;
			margin-left: 12px;
			cursor: pointer;
		}
		
		.wz-utm-input-wrapper {
			position: relative;
			width: 486px;
		}
		
		.wz-utm-input-placeholder {
			font-family: 'Roboto';
			font-weight: 400;
			font-size: 17px;
			line-height: 160%;
			font-feature-settings: 'pnum' on, 'lnum' on;
			color: #4E4E4E;
			background: #D9D9D9;
			border-radius: 4px;
			position: absolute;
			right: 52px;
			top: 12px;
			padding: 0px 8px;
			height: 32px;
			line-height: 32px;
		}
		
		.wz-utm-input-btn {
			position: absolute;
			font-family: 'Roboto';
			font-weight: 400;
			font-size: 17px;
			line-height: 160%;
			font-feature-settings: 'pnum' on, 'lnum' on;
			color: #4E4E4E;
			background: #D9D9D9;
			border-radius: 4px;
			height: 32px;
			width: 32px;
			right: 12px;
			top: 12px;
			line-height: 32px;
			text-align: center;
			cursor: default;
			pointer-events: none;
		}
		
		.wz-utm-input-btn--unblocked {
			background: #D2EBD3;
			pointer-events: unset;
			cursor: pointer;
		}
		
		.wz-utm-input-tooltip {
			position: absolute;
			top: -55px;
			right: 0;
			font-family: 'Roboto';
			font-weight: 400;
			font-size: 12px;
			line-height: 160%;
			font-feature-settings: 'pnum' on, 'lnum' on;
			color: #4CAF50;
			background: #FFFFFF;
			filter: drop-shadow(0px 0px 7px #8c8c8c5c);
			border-radius: 4px;
			padding: 8px 12px;
			display: none;
		}
		
		.wz-utm-input-tooltip:after {
			content: ''; 
			position: absolute;
			right: 28px; 
			bottom: -16px;
			border: 8px solid transparent; 
			border-right: 8px solid #fff; 
			border-top: 8px solid #fff;
		}
		
		.wz-utm-input-tooltip--active {
			display: block;
		}
		
		.wz-utm-input-var {
			padding: 12px;
			max-height: 100px;
			width: 157px; 
			background-color: #fff;
			position: absolute;
			bottom: -96px;
			right: 0;
			border-radius: 4px;
			filter: drop-shadow(0px 0px 7px #8c8c8c5c);
			z-index: -1;
			opacity: 0;
		}
		
		.wz-utm-input-var:after {
			content: ''; 
			position: absolute;
			right: 28px; 
			top: -16px;
			border: 8px solid transparent; 
			border-right: 8px solid #fff; 
			border-bottom: 8px solid #fff;
		}
		
		.wz-utm-input-var--active {
			opacity: 1;
			z-index: 1;
		}
		
		.wz-utm-input-var-list {
			list-style: none;
			max-height: 76px;
			margin: 0;
			margin-block-start: 0;
			margin-block-end: 0;
		}
		
		.wz-utm-input-var-list__item {
			font-family: 'Roboto';
			font-weight: 400;
			font-size: 12px;
			line-height: 160%;
			font-feature-settings: 'pnum' on, 'lnum' on;
			color: #4E4E4E;
			cursor: pointer;
			display: none;
		}
		
		.wz-utm-input-var-list__title {
			font-family: 'Roboto';
			font-weight: 600;
			font-size: 12px;
			line-height: 160%;
			font-feature-settings: 'pnum' on, 'lnum' on;
			color: #4E4E4E;
			display: none;
		}
		
		.wz-utm-input-var-list__item--active {
			display: block;
		}
		
		.jspVerticalBar {
			width: 8px !important;
		}
		
		.jspTrack {
			background: #F6F8F9 !important;
		}
		
		.jspDrag {
			background: #D9D9D9 !important;
		}
		
		.wz-utm-radio {
			display: grid;
			grid-template-columns: 140px auto;
			column-gap: 64px;
			row-gap: 24px;
		}
		
		.wz-utm-radio__item {
			display: flex;
			align-items: center;
			font-family: 'Roboto';
			font-weight: 400;
			font-size: 17px;
			line-height: 20px;
			color: #4E4E4E;
			position: relative;
			cursor: pointer;
		}
		
		.wz-utm-radio__item:before {
			content: '';
			display: block;
			width: 16px;
			height: 16px;
			outline: 1px solid #4CAF50;
			border-radius: 50%;
			border: 3px solid #fff;
			background-color: #fff;
			margin-right: 16px;
		}
		
		.wz-utm-radio__item--active:before {
			background-color: #4CAF50;
		}
		
		.wz-utm-description {
			margin-top: 326px;
			max-width: 483px;
			font-family: 'Roboto';
			font-size: 18px;
			line-height: 150%;
			color: #4E4E4E;
			grid-column: 2/3;
			grid-row: 2/3;
		}
		
		.wz-utm-description__block {
			display: none;
		}
		
		.wz-utm-description__block--active {
			display: block;
		}
		
		.wz-utm-description p {
			margin: 0;
		}
		
		.wz-utm-res__btns {
			max-width: 792px;
			display: flex;
			justify-content: flex-end;
		}
		
		.wz-utm-btn {
			font-family: 'Montserrat';
			font-style: normal;
			font-weight: 600;
			font-size: 16px;
			line-height: 160%;
			display: flex;
			align-items: center;
			justify-content: center;
			font-feature-settings: 'pnum' on, 'lnum' on;
			color: #4CAF50;
			border: 2px solid #4CAF50;
			border-radius: 4px;
			cursor: pointer;
			height: 40px;
			width: 168px;
		}
		
		.wz-utm-btn--green {
			color: #fff;
			background-color: #4CAF50;
		}
		
		.wz-utm-btn:not(:last-child) {
			margin-right: 24px;
		}
		
		@media screen and (max-width: 1199px) {
			
			.jspVerticalBar {
				background: unset !important;
			}
			
			.wz-utm-wrapper,
			.wz-utm-wrapper--result {
				max-width: 320px;
				width: 320px;
				padding: 24px 0;
			}
			
			.wz-utm-title {
				font-size: 20px;
				line-height: 28px;
				margin-bottom: 20px;
			}
			
			.wz-utm-title--low {
				font-size: 18px;
				line-height: 25px;
				margin-bottom: 12px;
			}
			
			.wz-utm-question {
				font-size: 10px;
				height: 16px;
				width: 16px;
				margin-bottom: 12px;
				line-height: 16px;				
			}
			
			.wz-utm-input {
				width: 100%;
				height: 40px;
				font-size: 16px;
				line-height: 19px;
			}
			
			.wz-utm-url__input {
				padding-left: 112px;
			}
			
			.wz-utm-url__selector {
				width: 100px;
				height: 40px;
				font-size: 16px;
				line-height: 19px;
			}
			
			.wz-utm-url__selector-default, .wz-utm-url__item {
				padding: 10px 32px 11px 16px;
			}
			
			.wz-utm-url__selector-default:after {
				right: 15px;
			}
			
			.wz-utm-workspace {
				margin-top: 35px;
			}
			
			.wz-utm-input-wrapper {
				width: 100%;
			}
			
			.wz-utm-input-placeholder {
				height: 24px;
				line-height: 24px;
				top: 8px;
				font-size: 12px;
				right: 44px;
			}
			
			.wz-utm__input {
				font-size: 14px;
				line-height: 16px;
				padding-left: 16px;
				padding-right: 150px;
			}
			
			.wz-utm-input-btn {
				height: 24px;
				width: 24px;
				top: 8px;
				font-size: 11px;
				line-height: 24px;
			}
			
			.wz-utm-title--separate {
				margin-top: 0;
			}
			
			.wz-utm-radio__item {
				font-size: 14px;
				line-height: 16px;
			}
			
			.wz-utm-radio {
				column-gap: 40px;
			}
			
			.wz-utm-wrapper {
				grid-template-columns: 320px;
				grid-template-rows: 112px 248px 601px auto;
			}
			
			.wz-utm-start {
				margin-bottom: 0;
				grid-column: 1;
				grid-row: 1/2;
			}
			
			.wz-utm-params {
				grid-column: 1;
				grid-row: 3/4;
			}
			
			.wz-utm-source {
				grid-column: 1;
				grid-row: 2/3;
			}
			
			.wz-utm-description {
				grid-column: 1;
				grid-row: 4/5;
			}
			
			.wz-utm-description {
				margin-top: 0;
				font-size: 16px;
				line-height: 26px;
			}
			
			.wz-utm-res__input {
				padding-left: 16px;
				margin-bottom: 20px;
			}
			
			.wz-utm-res__btns {
				max-width: 320px;
				flex-direction: column;
			}
			
			.wz-utm-btn {
				width: 100%;
			}
			
			.wz-utm-btn:not(:last-child) {
				margin-right: unset;
				margin-bottom: 16px;
			}
		}
	</style>
	
	<link rel="stylesheet" href="/wp-content/themes/astra-child/css/jquery.jscrollpane.min.css"/>
	<script src="/wp-content/themes/astra-child/js/jquery.mousewheel.min.js"></script>
	<script src="/wp-content/themes/astra-child/js/jquery.jscrollpane.min.js"></script>
	
	<div id="wz-utm-generator" class="wz-utm-generator">
		<div class="wz-utm-generator__data">
			<div class="wz-utm-wrapper">
				<div class="wz-utm-start">
					<h2 class="wz-utm-title"><?echo do_shortcode('[wz-translate text="Your page address"]');?></h2>
					<div class="wz-utm-url">
						<div class="wz-utm-url__selector">
							<div class="wz-utm-url__selector-default">https://</div>
							<div class="wz-utm-url__item wz-utm-url__item--active">https://</div>
							<div class="wz-utm-url__item">http://</div>
						</div>
						<input class="wz-utm-input wz-utm-url__input" placeholder="<?echo do_shortcode('[wz-translate text="website address"]');?>"/>
					</div>
				</div>
				<div class="wz-utm-params">
					<h2 class="wz-utm-title"><?echo do_shortcode('[wz-translate text="Required parameters"]');?></h2>
					<div class="wz-utm-params__subtitle">
						<h3 class="wz-utm-title--low"><?echo do_shortcode('[wz-translate text="Source of the campaign"]');?></h3>
						<span class="wz-utm-question" data-id="1">?</span>
					</div>
					<div class="wz-utm-input-wrapper">
						<input id="wz-utm-input-1" class="wz-utm-input wz-utm__input" data-utm="utm_sourсe" placeholder="google, yandex, vk"/>
						<span class="wz-utm-input-placeholder">utm_sourсe</span>
						<span class="wz-utm-input-tooltip"><?echo do_shortcode('[wz-translate text="Insert Variable"]');?></span>
						<span class="wz-utm-input-btn wz-utm-input-btn--unblocked">&lbrace;&rbrace;</span>
						<div class="wz-utm-input-var">
							<noindex>
								<ul class="wz-utm-input-var-list">
									<li class="wz-utm-input-var-list__title wz-utm-input-var-list__item--active"><?echo do_shortcode('[wz-translate text="Yandex.Direct"]');?></li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{campaign_id}">{campaign_id}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{campaign_name}">{campaign_name}</li>		
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{campaign_name_lat}">{campaign_name_lat}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{campaign_type}">{campaign_type}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{ad_id}">{ad_id}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{banner_id}">{banner_id}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{keyword}">{keyword}</li>	
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{addphrases}">{addphrases}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{addphrasestext}">{addphrasestext}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{source}">{source}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{source_type}">{source_type}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{gbid}">{gbid}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{match_type}">{match_type}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{matched_keyword}">{matched_keyword}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{device_type}">{device_type}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{position}">{position}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{position_type}">{position_type}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{region_name}">{region_name}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{adtarget_name}">{adtarget_name}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{coef_goal_context_id}">{coef_goal_context_id}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{retargeting_id}">{retargeting_id}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{region_id}">{region_id}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{phrase_id}">{phrase_id}</li>
									<li class="wz-utm-input-var-list__title wz-utm-input-var-list__item--active">Google Ads/YouTube</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{campaignid}">{campaignid}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{adgroupid}">{adgroupid}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{creative}">{creative}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{keyword}">{keyword}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{matchtype}">{matchtype}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{feeditemid}">{feeditemid}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{adposition}">{adposition}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{network}">{network}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{device}">{device}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{devicemodel}">{devicemodel}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{target}">{target}</li>
									<li class="wz-utm-input-var-list__title wz-utm-input-var-list__item--active">Facebook/Instagram</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-fb="true" data-ins="true" data-var="{{campaign.id}}">{{campaign.id}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-fb="true" data-ins="true" data-var="{{campaign.name}}">{{campaign.name}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-fb="true" data-ins="true" data-var="{{adset.id}}">{{adset.id}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-fb="true" data-ins="true" data-var="{{adset.name}}">{{adset.name}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-fb="true" data-ins="true" data-var="{{ad.id}}">{{ad.id}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-fb="true" data-ins="true" data-var="{{site_source_name}}">{{site_source_name}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-fb="true" data-ins="true" data-var="{{placement}}">{{placement}}</li>
									<li class="wz-utm-input-var-list__title wz-utm-input-var-list__item--active"><?echo do_shortcode('[wz-translate text="VKontakte"]');?></li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-vk="true" data-var="{campaign_id}">{campaign_id}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-vk="true" data-var="{campaign_name}">{campaign_name}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-vk="true" data-var="{ad_id}">{ad_id}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-vk="true" data-var="{keyword}">{keyword}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-vk="true" data-var="{search_phrase}">{search_phrase}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-vk="true" data-var="{platform}">{platform}</li>
									<li class="wz-utm-input-var-list__title wz-utm-input-var-list__item--active">MyTarget</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-mt="true" data-var="{{campaign_id}}">{{campaign_id}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-mt="true" data-var="{{campaign_name}}">{{campaign_name}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-mt="true" data-var="{{banner_id}}">{{banner_id}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-mt="true" data-var="{{search_phrase}}">{{search_phrase}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-mt="true" data-var="{{geo}}">{{geo}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-mt="true" data-var="{{gender}}">{{gender}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-mt="true" data-var="{{age}}">{{age}}</li>
								</ul>
							</noindex>
						</div>
					</div>
					<div class="wz-utm-params__subtitle">
						<h3 class="wz-utm-title--low"><?echo do_shortcode('[wz-translate text="Type of traffic"]');?></h3>
						<span class="wz-utm-question" data-id="2">?</span>
					</div>
					<div class="wz-utm-input-wrapper">
						<input id="wz-utm-input-2" class="wz-utm-input wz-utm__input" data-utm="utm_medium" placeholder="cpc, cpm, social"/>
						<span class="wz-utm-input-placeholder">utm_medium</span>
						<span class="wz-utm-input-tooltip"><?echo do_shortcode('[wz-translate text="Insert Variable"]');?></span>
						<span class="wz-utm-input-btn wz-utm-input-btn--unblocked">&lbrace;&rbrace;</span>
						<div class="wz-utm-input-var">
							<noindex>
								<ul class="wz-utm-input-var-list">
									<li class="wz-utm-input-var-list__title wz-utm-input-var-list__item--active"><?echo do_shortcode('[wz-translate text="Yandex.Direct"]');?></li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{campaign_id}">{campaign_id}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{campaign_name}">{campaign_name}</li>		
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{campaign_name_lat}">{campaign_name_lat}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{campaign_type}">{campaign_type}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{ad_id}">{ad_id}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{banner_id}">{banner_id}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{keyword}">{keyword}</li>	
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{addphrases}">{addphrases}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{addphrasestext}">{addphrasestext}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{source}">{source}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{source_type}">{source_type}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{gbid}">{gbid}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{match_type}">{match_type}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{matched_keyword}">{matched_keyword}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{device_type}">{device_type}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{position}">{position}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{position_type}">{position_type}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{region_name}">{region_name}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{adtarget_name}">{adtarget_name}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{coef_goal_context_id}">{coef_goal_context_id}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{retargeting_id}">{retargeting_id}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{region_id}">{region_id}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{phrase_id}">{phrase_id}</li>
									<li class="wz-utm-input-var-list__title wz-utm-input-var-list__item--active">Google Ads/YouTube</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{campaignid}">{campaignid}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{adgroupid}">{adgroupid}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{creative}">{creative}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{keyword}">{keyword}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{matchtype}">{matchtype}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{feeditemid}">{feeditemid}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{adposition}">{adposition}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{network}">{network}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{device}">{device}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{devicemodel}">{devicemodel}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{target}">{target}</li>
									<li class="wz-utm-input-var-list__title wz-utm-input-var-list__item--active">Facebook/Instagram</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-fb="true" data-ins="true" data-var="{{campaign.id}}">{{campaign.id}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-fb="true" data-ins="true" data-var="{{campaign.name}}">{{campaign.name}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-fb="true" data-ins="true" data-var="{{adset.id}}">{{adset.id}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-fb="true" data-ins="true" data-var="{{adset.name}}">{{adset.name}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-fb="true" data-ins="true" data-var="{{ad.id}}">{{ad.id}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-fb="true" data-ins="true" data-var="{{site_source_name}}">{{site_source_name}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-fb="true" data-ins="true" data-var="{{placement}}">{{placement}}</li>
									<li class="wz-utm-input-var-list__title wz-utm-input-var-list__item--active"><?echo do_shortcode('[wz-translate text="VKontakte"]');?></li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-vk="true" data-var="{campaign_id}">{campaign_id}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-vk="true" data-var="{campaign_name}">{campaign_name}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-vk="true" data-var="{ad_id}">{ad_id}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-vk="true" data-var="{keyword}">{keyword}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-vk="true" data-var="{search_phrase}">{search_phrase}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-vk="true" data-var="{platform}">{platform}</li>
									<li class="wz-utm-input-var-list__title wz-utm-input-var-list__item--active">MyTarget</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-mt="true" data-var="{{campaign_id}}">{{campaign_id}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-mt="true" data-var="{{campaign_name}}">{{campaign_name}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-mt="true" data-var="{{banner_id}}">{{banner_id}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-mt="true" data-var="{{search_phrase}}">{{search_phrase}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-mt="true" data-var="{{geo}}">{{geo}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-mt="true" data-var="{{gender}}">{{gender}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-mt="true" data-var="{{age}}">{{age}}</li>
								</ul>
							</noindex>
						</div>
					</div>
					<div class="wz-utm-params__subtitle">
						<h3 class="wz-utm-title--low"><?echo do_shortcode('[wz-translate text="Campaign name"]');?></h3>
						<span class="wz-utm-question" data-id="3">?</span>
					</div>
					<div class="wz-utm-input-wrapper">
						<input id="wz-utm-input-3" class="wz-utm-input wz-utm__input" data-utm="utm_campaign" placeholder="promo, discount, sale"/>
						<span class="wz-utm-input-placeholder">utm_campaign</span>
						<span class="wz-utm-input-tooltip"><?echo do_shortcode('[wz-translate text="Insert Variable"]');?></span>
						<span class="wz-utm-input-btn wz-utm-input-btn--unblocked">&lbrace;&rbrace;</span>
						<div class="wz-utm-input-var">
							<noindex>
								<ul class="wz-utm-input-var-list">
									<li class="wz-utm-input-var-list__title wz-utm-input-var-list__item--active"><?echo do_shortcode('[wz-translate text="Yandex.Direct"]');?></li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{campaign_id}">{campaign_id}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{campaign_name}">{campaign_name}</li>		
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{campaign_name_lat}">{campaign_name_lat}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{campaign_type}">{campaign_type}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{ad_id}">{ad_id}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{banner_id}">{banner_id}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{keyword}">{keyword}</li>	
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{addphrases}">{addphrases}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{addphrasestext}">{addphrasestext}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{source}">{source}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{source_type}">{source_type}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{gbid}">{gbid}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{match_type}">{match_type}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{matched_keyword}">{matched_keyword}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{device_type}">{device_type}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{position}">{position}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{position_type}">{position_type}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{region_name}">{region_name}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{adtarget_name}">{adtarget_name}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{coef_goal_context_id}">{coef_goal_context_id}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{retargeting_id}">{retargeting_id}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{region_id}">{region_id}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{phrase_id}">{phrase_id}</li>
									<li class="wz-utm-input-var-list__title wz-utm-input-var-list__item--active">Google Ads/YouTube</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{campaignid}">{campaignid}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{adgroupid}">{adgroupid}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{creative}">{creative}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{keyword}">{keyword}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{matchtype}">{matchtype}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{feeditemid}">{feeditemid}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{adposition}">{adposition}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{network}">{network}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{device}">{device}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{devicemodel}">{devicemodel}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{target}">{target}</li>
									<li class="wz-utm-input-var-list__title wz-utm-input-var-list__item--active">Facebook/Instagram</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-fb="true" data-ins="true" data-var="{{campaign.id}}">{{campaign.id}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-fb="true" data-ins="true" data-var="{{campaign.name}}">{{campaign.name}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-fb="true" data-ins="true" data-var="{{adset.id}}">{{adset.id}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-fb="true" data-ins="true" data-var="{{adset.name}}">{{adset.name}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-fb="true" data-ins="true" data-var="{{ad.id}}">{{ad.id}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-fb="true" data-ins="true" data-var="{{site_source_name}}">{{site_source_name}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-fb="true" data-ins="true" data-var="{{placement}}">{{placement}}</li>
									<li class="wz-utm-input-var-list__title wz-utm-input-var-list__item--active"><?echo do_shortcode('[wz-translate text="VKontakte"]');?></li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-vk="true" data-var="{campaign_id}">{campaign_id}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-vk="true" data-var="{campaign_name}">{campaign_name}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-vk="true" data-var="{ad_id}">{ad_id}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-vk="true" data-var="{keyword}">{keyword}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-vk="true" data-var="{search_phrase}">{search_phrase}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-vk="true" data-var="{platform}">{platform}</li>
									<li class="wz-utm-input-var-list__title wz-utm-input-var-list__item--active">MyTarget</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-mt="true" data-var="{{campaign_id}}">{{campaign_id}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-mt="true" data-var="{{campaign_name}}">{{campaign_name}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-mt="true" data-var="{{banner_id}}">{{banner_id}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-mt="true" data-var="{{search_phrase}}">{{search_phrase}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-mt="true" data-var="{{geo}}">{{geo}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-mt="true" data-var="{{gender}}">{{gender}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-mt="true" data-var="{{age}}">{{age}}</li>
								</ul>
							</noindex>
						</div>
					</div>
					<h2 class="wz-utm-title wz-utm-title--separate"><?echo do_shortcode('[wz-translate text="Optional parameters"]');?></h2>
					<div class="wz-utm-params__subtitle">
						<h3 class="wz-utm-title--low"><?echo do_shortcode('[wz-translate text="Announcement identifier"]');?></h3>
						<span class="wz-utm-question" data-id="4">?</span>
					</div>
					<div class="wz-utm-input-wrapper">
						<input id="wz-utm-input-4" class="wz-utm-input wz-utm__input" data-utm="utm_content" placeholder="cpc, cpm, social"/>
						<span class="wz-utm-input-placeholder">utm_content</span>
						<span class="wz-utm-input-tooltip"><?echo do_shortcode('[wz-translate text="Insert Variable"]');?></span>
						<span class="wz-utm-input-btn wz-utm-input-btn--unblocked">&lbrace;&rbrace;</span>
						<div class="wz-utm-input-var">
							<noindex>
								<ul class="wz-utm-input-var-list">
									<li class="wz-utm-input-var-list__title wz-utm-input-var-list__item--active"><?echo do_shortcode('[wz-translate text="Yandex.Direct"]');?></li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{campaign_id}">{campaign_id}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{campaign_name}">{campaign_name}</li>		
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{campaign_name_lat}">{campaign_name_lat}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{campaign_type}">{campaign_type}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{ad_id}">{ad_id}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{banner_id}">{banner_id}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{keyword}">{keyword}</li>	
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{addphrases}">{addphrases}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{addphrasestext}">{addphrasestext}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{source}">{source}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{source_type}">{source_type}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{gbid}">{gbid}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{match_type}">{match_type}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{matched_keyword}">{matched_keyword}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{device_type}">{device_type}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{position}">{position}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{position_type}">{position_type}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{region_name}">{region_name}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{adtarget_name}">{adtarget_name}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{coef_goal_context_id}">{coef_goal_context_id}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{retargeting_id}">{retargeting_id}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{region_id}">{region_id}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{phrase_id}">{phrase_id}</li>
									<li class="wz-utm-input-var-list__title wz-utm-input-var-list__item--active">Google Ads/YouTube</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{campaignid}">{campaignid}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{adgroupid}">{adgroupid}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{creative}">{creative}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{keyword}">{keyword}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{matchtype}">{matchtype}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{feeditemid}">{feeditemid}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{adposition}">{adposition}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{network}">{network}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{device}">{device}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{devicemodel}">{devicemodel}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{target}">{target}</li>
									<li class="wz-utm-input-var-list__title wz-utm-input-var-list__item--active">Facebook/Instagram</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-fb="true" data-ins="true" data-var="{{campaign.id}}">{{campaign.id}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-fb="true" data-ins="true" data-var="{{campaign.name}}">{{campaign.name}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-fb="true" data-ins="true" data-var="{{adset.id}}">{{adset.id}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-fb="true" data-ins="true" data-var="{{adset.name}}">{{adset.name}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-fb="true" data-ins="true" data-var="{{ad.id}}">{{ad.id}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-fb="true" data-ins="true" data-var="{{site_source_name}}">{{site_source_name}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-fb="true" data-ins="true" data-var="{{placement}}">{{placement}}</li>
									<li class="wz-utm-input-var-list__title wz-utm-input-var-list__item--active"><?echo do_shortcode('[wz-translate text="VKontakte"]');?></li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-vk="true" data-var="{campaign_id}">{campaign_id}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-vk="true" data-var="{campaign_name}">{campaign_name}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-vk="true" data-var="{ad_id}">{ad_id}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-vk="true" data-var="{keyword}">{keyword}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-vk="true" data-var="{search_phrase}">{search_phrase}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-vk="true" data-var="{platform}">{platform}</li>
									<li class="wz-utm-input-var-list__title wz-utm-input-var-list__item--active">MyTarget</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-mt="true" data-var="{{campaign_id}}">{{campaign_id}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-mt="true" data-var="{{campaign_name}}">{{campaign_name}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-mt="true" data-var="{{banner_id}}">{{banner_id}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-mt="true" data-var="{{search_phrase}}">{{search_phrase}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-mt="true" data-var="{{geo}}">{{geo}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-mt="true" data-var="{{gender}}">{{gender}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-mt="true" data-var="{{age}}">{{age}}</li>
								</ul>
							</noindex>
						</div>
					</div>
					<div class="wz-utm-params__subtitle">
						<h3 class="wz-utm-title--low"><?echo do_shortcode('[wz-translate text="Keyword"]');?></h3>
						<span class="wz-utm-question" data-id="5">?</span>
					</div>
					<div class="wz-utm-input-wrapper">
						<input id="wz-utm-input-5" class="wz-utm-input wz-utm__input" data-utm="utm_term" placeholder="promo, discount, sale"/>
						<span class="wz-utm-input-placeholder">utm_term</span>
						<span class="wz-utm-input-tooltip"><?echo do_shortcode('[wz-translate text="Insert Variable"]');?></span>
						<span class="wz-utm-input-btn wz-utm-input-btn--unblocked">&lbrace;&rbrace;</span>
						<div class="wz-utm-input-var">
							<noindex>
								<ul class="wz-utm-input-var-list">
									<li class="wz-utm-input-var-list__title wz-utm-input-var-list__item--active"><?echo do_shortcode('[wz-translate text="Yandex.Direct"]');?></li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{campaign_id}">{campaign_id}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{campaign_name}">{campaign_name}</li>		
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{campaign_name_lat}">{campaign_name_lat}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{campaign_type}">{campaign_type}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{ad_id}">{ad_id}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{banner_id}">{banner_id}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{keyword}">{keyword}</li>	
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{addphrases}">{addphrases}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{addphrasestext}">{addphrasestext}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{source}">{source}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{source_type}">{source_type}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{gbid}">{gbid}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{match_type}">{match_type}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{matched_keyword}">{matched_keyword}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{device_type}">{device_type}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{position}">{position}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{position_type}">{position_type}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{region_name}">{region_name}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{adtarget_name}">{adtarget_name}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{coef_goal_context_id}">{coef_goal_context_id}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{retargeting_id}">{retargeting_id}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{region_id}">{region_id}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-yd="true" data-var="{phrase_id}">{phrase_id}</li>
									<li class="wz-utm-input-var-list__title wz-utm-input-var-list__item--active">Google Ads/YouTube</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{campaignid}">{campaignid}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{adgroupid}">{adgroupid}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{creative}">{creative}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{keyword}">{keyword}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{matchtype}">{matchtype}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{feeditemid}">{feeditemid}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{adposition}">{adposition}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{network}">{network}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{device}">{device}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{devicemodel}">{devicemodel}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-ga="true" data-yt="true" data-var="{target}">{target}</li>
									<li class="wz-utm-input-var-list__title wz-utm-input-var-list__item--active">Facebook/Instagram</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-fb="true" data-ins="true" data-var="{{campaign.id}}">{{campaign.id}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-fb="true" data-ins="true" data-var="{{campaign.name}}">{{campaign.name}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-fb="true" data-ins="true" data-var="{{adset.id}}">{{adset.id}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-fb="true" data-ins="true" data-var="{{adset.name}}">{{adset.name}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-fb="true" data-ins="true" data-var="{{ad.id}}">{{ad.id}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-fb="true" data-ins="true" data-var="{{site_source_name}}">{{site_source_name}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-fb="true" data-ins="true" data-var="{{placement}}">{{placement}}</li>
									<li class="wz-utm-input-var-list__title wz-utm-input-var-list__item--active"><?echo do_shortcode('[wz-translate text="VKontakte"]');?></li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-vk="true" data-var="{campaign_id}">{campaign_id}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-vk="true" data-var="{campaign_name}">{campaign_name}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-vk="true" data-var="{ad_id}">{ad_id}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-vk="true" data-var="{keyword}">{keyword}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-vk="true" data-var="{search_phrase}">{search_phrase}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-vk="true" data-var="{platform}">{platform}</li>
									<li class="wz-utm-input-var-list__title wz-utm-input-var-list__item--active">MyTarget</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-mt="true" data-var="{{campaign_id}}">{{campaign_id}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-mt="true" data-var="{{campaign_name}}">{{campaign_name}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-mt="true" data-var="{{banner_id}}">{{banner_id}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-mt="true" data-var="{{search_phrase}}">{{search_phrase}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-mt="true" data-var="{{geo}}">{{geo}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-mt="true" data-var="{{gender}}">{{gender}}</li>
									<li class="wz-utm-input-var-list__item wz-utm-input-var-list__item--active" data-mt="true" data-var="{{age}}">{{age}}</li>
								</ul>
							</noindex>
						</div>
					</div>
				</div>
				<div class="wz-utm-source">
					<h2 class="wz-utm-title"><?echo do_shortcode('[wz-translate text="Traffic source"]');?></h2>
					<div class="wz-utm-radio">
						<div class="wz-utm-radio__item wz-utm-radio__item--active" data-rad="wz-radio-def"><?echo do_shortcode('[wz-translate text="Optional"]');?></div>
						<div class="wz-utm-radio__item" data-rad="wz-radio-fb">Facebook</div>
						<div class="wz-utm-radio__item" data-rad="wz-radio-ins">Instagram</div>
						<div class="wz-utm-radio__item" data-rad="wz-radio-vk"><?echo do_shortcode('[wz-translate text="VKontakte"]');?></div>
						<div class="wz-utm-radio__item" data-rad="wz-radio-wa">WhatsApp</div>
						<div class="wz-utm-radio__item" data-rad="wz-radio-ga"><?echo do_shortcode('[wz-translate text="Google Ads"]');?></div>
						<div class="wz-utm-radio__item" data-rad="wz-radio-tg">Telegram</div>
						<div class="wz-utm-radio__item" data-rad="wz-radio-mt">myTarget</div>
						<div class="wz-utm-radio__item" data-rad="wz-radio-yt">YouTube</div>
						<div class="wz-utm-radio__item" data-rad="wz-radio-yd"><?echo do_shortcode('[wz-translate text="Yandex.Direct"]');?></div>
					</div>
				</div>
				<div class="wz-utm-description">
						<div class="wz-utm-description__block wz-utm-description__block--active">
							<h4 class="wz-utm-title--xlow"><?echo do_shortcode('[wz-translate text="Announcement identifier"]');?></h4>
							<?echo do_shortcode('[wz-translate text="<p><b>utm_content</b> - this optional parameter is used for additional information, allows you to separate campaigns from each other if the other parameters are the same.</p><p><b>Why do you need it:</b> Most often it is used as a label for an ad within an ad campaign. The name can be set arbitrarily, it is more convenient to use the important characteristics of the ad.</p><p><b>Example:</b> utm_content=text_link_on_left_sidebar - a text link in the left sidebar.</p>"]');?>
						</div>
						<div class="wz-utm-description__block">
							<h4 class="wz-utm-title--xlow"><?echo do_shortcode('[wz-translate text="Source of the campaign"]');?></h4>
							<?echo do_shortcode('[wz-translate text="<p><b>utm_source</b> — the name of your advertising platform.</p><p><b>Why do you need it:</b> Most often this parameter is used to refer to the advertising site from which your site traffic came.</p><p><b>Example:</b> utm_source=yandex — contextual advertising in Yandex.Direct.</p>"]');?>
						</div>
						<div class="wz-utm-description__block">
							<h4 class="wz-utm-title--xlow"><?echo do_shortcode('[wz-translate text="Type of traffic"]');?></h4>
							<?echo do_shortcode('[wz-translate text="<p><b>utm_medium</b> — type of advertising traffic.</p><p><b>Why do you need it:</b> Most often this parameter is filled with common traffic values, for example: cpc (cost per click) - this is contextual advertising with payment per click. It transmits the type of this advertisement to the analytics.</p><p><b>Example:</b> utm_medium=email – mailing list.</p>"]');?>
						</div>
						<div class="wz-utm-description__block">
							<h4 class="wz-utm-title--xlow"><?echo do_shortcode('[wz-translate text="Campaign name"]');?></h4>
							<?echo do_shortcode('[wz-translate text="<p><b>utm_campaign</b> — you can use this mandatory parameter at your discretion, as long as it transmits the campaign name from the advertising system to analytics in a way you understand.</p><p><b>Why do you need it:</b> Allows you to distinguish the results of advertising campaigns in analytics.</p><p><b>Example:</b> utm_campaign=arsens_whites_with_kittens – advertisement for belyash with special stuffing.</p>"]');?>
						</div>
						<div class="wz-utm-description__block">
							<h4 class="wz-utm-title--xlow"><?echo do_shortcode('[wz-translate text="Keyword"]');?></h4>
							<?echo do_shortcode('[wz-translate text="<p><b>utm_term</b> — this optional parameter passes the keywords used to display your ad.</p><p><b>Why do you need it:</b> Most often used to analyze the advertising campaign to the level of specific keywords.</p><p><b>Example:</b> utm_term=plastikovye_okna_zakazat — the keyword from the advertising “order plastic windows”.</p>"]');?>
						</div>
					</div>
			</div>
			
		</div>
		<div class="wz-utm-generator__result">
			<div class="wz-utm-wrapper--result">
				<h2 class="wz-utm-title wz-utm-title--green"><?echo do_shortcode('[wz-translate text="Your link"]');?></h2>
				<div class="wz-utm-res">
					<input class="wz-utm-input wz-utm-res__input" placeholder="<?echo do_shortcode('[wz-translate text="result address"]');?>"/>
					<div class="wz-utm-res__btns">
						<button id="wz-btn-clear" class="wz-utm-btn"><?echo do_shortcode('[wz-translate text="Clear"]');?></button>
						<button id="wz-btn-get" class="wz-utm-btn wz-utm-btn--green"><?echo do_shortcode('[wz-translate text="Get URL"]');?></button>
						<button id="wz-btn-copy" class="wz-utm-btn wz-utm-btn--green"><?echo do_shortcode('[wz-translate text="Copy"]');?></button>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script>
		jQuery(document).ready(function ($) {
			let inputCounter = 0;
			$('#wz-utm-generator').click(function (e) {
				let clickedElement = $(e.target);
				switch (e.target.className) {
					case 'wz-utm-url__selector-default':
						$('.wz-utm-url__selector').toggleClass('wz-utm-url__selector--active');
						break;
					case 'wz-utm-url__item':
						$('.wz-utm-url__item').removeClass('wz-utm-url__item--active');
						clickedElement.addClass('wz-utm-url__item--active');
						$('.wz-utm-url__selector-default').text(clickedElement.text());
						$('.wz-utm-url__selector').removeClass('wz-utm-url__selector--active');
						break;
					case 'wz-utm-input-btn wz-utm-input-btn--unblocked':
						clickedElement.parent().find('.wz-utm-input-var').toggleClass('wz-utm-input-var--active');
						break;
					case 'wz-utm-radio__item':
						$('.wz-utm-radio__item').removeClass('wz-utm-radio__item--active');
						clickedElement.addClass('wz-utm-radio__item--active');
						switch (clickedElement.data('rad')) {
							case 'wz-radio-ga':
								$('.wz-utm-input-btn').addClass('wz-utm-input-btn--unblocked');
								$('#wz-utm-input-1').val('google');
								$('#wz-utm-input-2').val('cpc');
								$('#wz-utm-input-3').val('{network}');
								$('#wz-utm-input-4').val('{creative}');
								$('#wz-utm-input-5').val('{keyword}');
								$('.wz-utm-input-var-list__item').removeClass('wz-utm-input-var-list__item--active');
								$('.wz-utm-input-var-list__title').removeClass('wz-utm-input-var-list__item--active');
								$('.wz-utm-input-var-list__item[data-ga="true"]').addClass('wz-utm-input-var-list__item--active');
								$('.wz-utm-input-var').removeClass('wz-utm-input-var--active');
								$('.wz-utm-input-var-list').jScrollPane();
								break;
							case 'wz-radio-mt':
								$('.wz-utm-input-btn').addClass('wz-utm-input-btn--unblocked');
								$('#wz-utm-input-1').val('mycom');
								$('#wz-utm-input-2').val('cpc');
								$('#wz-utm-input-3').val('{{campaign_id}}');
								$('#wz-utm-input-4').val('{{banner_id}}');
								$('#wz-utm-input-5').val('{{geo}}.{{gender}}.{{age}}');
								$('.wz-utm-input-var-list__item').removeClass('wz-utm-input-var-list__item--active');
								$('.wz-utm-input-var-list__title').removeClass('wz-utm-input-var-list__item--active');
								$('.wz-utm-input-var-list__item[data-mt="true"]').addClass('wz-utm-input-var-list__item--active');
								$('.wz-utm-input-var').removeClass('wz-utm-input-var--active');
								$('.wz-utm-input-var-list').jScrollPane();
								break;
							case 'wz-radio-yd':
								$('.wz-utm-input-btn').addClass('wz-utm-input-btn--unblocked');
								$('#wz-utm-input-1').val('yandex');
								$('#wz-utm-input-2').val('cpc');
								$('#wz-utm-input-3').val('{campaign_id}');
								$('#wz-utm-input-4').val('{ad_id}');
								$('#wz-utm-input-5').val('{keyword}');
								$('.wz-utm-input-var-list__item').removeClass('wz-utm-input-var-list__item--active');
								$('.wz-utm-input-var-list__title').removeClass('wz-utm-input-var-list__item--active');
								$('.wz-utm-input-var-list__item[data-yd="true"]').addClass('wz-utm-input-var-list__item--active');
								$('.wz-utm-input-var').removeClass('wz-utm-input-var--active');
								$('.wz-utm-input-var-list').jScrollPane();
								break;
							case 'wz-radio-fb':
								$('.wz-utm-input-btn').addClass('wz-utm-input-btn--unblocked');
								$('#wz-utm-input-1').val('fb');
								$('#wz-utm-input-2').val('cpc');
								$('#wz-utm-input-3').val('promo');
								$('#wz-utm-input-4').val('');
								$('#wz-utm-input-5').val('');
								$('.wz-utm-input-var-list__item').removeClass('wz-utm-input-var-list__item--active');
								$('.wz-utm-input-var-list__title').removeClass('wz-utm-input-var-list__item--active');
								$('.wz-utm-input-var-list__item[data-fb="true"]').addClass('wz-utm-input-var-list__item--active');
								$('.wz-utm-input-var').removeClass('wz-utm-input-var--active');
								$('.wz-utm-input-var-list').jScrollPane();
								break;
							case 'wz-radio-vk':
								$('.wz-utm-input-btn').addClass('wz-utm-input-btn--unblocked');
								$('#wz-utm-input-1').val('vk');
								$('#wz-utm-input-2').val('cpc');
								$('#wz-utm-input-3').val('{campaign_id}');
								$('#wz-utm-input-4').val('{ad_id}');
								$('#wz-utm-input-5').val('');
								$('.wz-utm-input-var-list__item').removeClass('wz-utm-input-var-list__item--active');
								$('.wz-utm-input-var-list__title').removeClass('wz-utm-input-var-list__item--active');
								$('.wz-utm-input-var-list__item[data-vk="true"]').addClass('wz-utm-input-var-list__item--active');
								$('.wz-utm-input-var').removeClass('wz-utm-input-var--active');
								$('.wz-utm-input-var-list').jScrollPane();
								break;
							case 'wz-radio-ins':
								$('.wz-utm-input-btn').addClass('wz-utm-input-btn--unblocked');
								$('#wz-utm-input-1').val('instagram');
								$('#wz-utm-input-2').val('cpc');
								$('#wz-utm-input-3').val('promo');
								$('#wz-utm-input-4').val('');
								$('#wz-utm-input-5').val('');
								$('.wz-utm-input-var-list__item').removeClass('wz-utm-input-var-list__item--active');
								$('.wz-utm-input-var-list__title').removeClass('wz-utm-input-var-list__item--active');
								$('.wz-utm-input-var-list__item[data-ins="true"]').addClass('wz-utm-input-var-list__item--active');
								$('.wz-utm-input-var').removeClass('wz-utm-input-var--active');
								$('.wz-utm-input-var-list').jScrollPane();	
								break;
							case 'wz-radio-def':
								$('.wz-utm-input-btn').addClass('wz-utm-input-btn--unblocked');
								$('#wz-utm-input-1').val('');
								$('#wz-utm-input-2').val('');
								$('#wz-utm-input-3').val('');
								$('#wz-utm-input-4').val('');
								$('#wz-utm-input-5').val('');
								$('.wz-utm-input-var-list__item').addClass('wz-utm-input-var-list__item--active');
								$('.wz-utm-input-var-list__title').addClass('wz-utm-input-var-list__item--active');
								$('.wz-utm-input-var').removeClass('wz-utm-input-var--active');
								$('.wz-utm-input-var-list').jScrollPane();	
								break;
							case 'wz-radio-yt':
								$('.wz-utm-input-btn').addClass('wz-utm-input-btn--unblocked');
								$('#wz-utm-input-1').val('youtube');
								$('#wz-utm-input-2').val('cpc');
								$('#wz-utm-input-3').val('{campaignid}');
								$('#wz-utm-input-4').val('{adgroupid}');
								$('#wz-utm-input-5').val('{creative}');
								$('.wz-utm-input-var-list__item').removeClass('wz-utm-input-var-list__item--active');
								$('.wz-utm-input-var-list__title').removeClass('wz-utm-input-var-list__item--active');
								$('.wz-utm-input-var-list__item[data-yt="true"]').addClass('wz-utm-input-var-list__item--active');
								$('.wz-utm-input-var').removeClass('wz-utm-input-var--active');
								$('.wz-utm-input-var-list').jScrollPane();	
								break;
							case 'wz-radio-wa':
								$('.wz-utm-input-btn').removeClass('wz-utm-input-btn--unblocked');
								$('#wz-utm-input-1').val('whatsapp');
								$('#wz-utm-input-2').val('cpc');
								$('#wz-utm-input-3').val('postname');
								$('#wz-utm-input-4').val('');
								$('#wz-utm-input-5').val('');
								$('.wz-utm-input-var-list__item').removeClass('wz-utm-input-var-list__item--active');
								$('.wz-utm-input-var-list__title').removeClass('wz-utm-input-var-list__item--active');
								$('.wz-utm-input-var-list__item[data-wa="true"]').addClass('wz-utm-input-var-list__item--active');
								$('.wz-utm-input-var').removeClass('wz-utm-input-var--active');
								$('.wz-utm-input-var-list').jScrollPane();	
								break;
							case 'wz-radio-tg':
								$('.wz-utm-input-btn').removeClass('wz-utm-input-btn--unblocked');
								$('#wz-utm-input-1').val('telegram');
								$('#wz-utm-input-2').val('cpc');
								$('#wz-utm-input-3').val('postname');
								$('#wz-utm-input-4').val('');
								$('#wz-utm-input-5').val('');
								$('.wz-utm-input-var-list__item').removeClass('wz-utm-input-var-list__item--active');
								$('.wz-utm-input-var-list__title').removeClass('wz-utm-input-var-list__item--active');
								$('.wz-utm-input-var-list__item[data-tg="true"]').addClass('wz-utm-input-var-list__item--active');
								$('.wz-utm-input-var').removeClass('wz-utm-input-var--active');
								$('.wz-utm-input-var-list').jScrollPane();
								break;
							default:
								$('.wz-utm-input-btn').removeClass('wz-utm-input-btn--unblocked');
								$('#wz-utm-input-1').val('');
								$('#wz-utm-input-2').val('');
								$('#wz-utm-input-3').val('');
								$('#wz-utm-input-4').val('');
								$('#wz-utm-input-5').val('');
								$('.wz-utm-input-var-list__item').addClass('wz-utm-input-var-list__item--active');
								$('.wz-utm-input-var-list__title').addClass('wz-utm-input-var-list__item--active');
								$('.wz-utm-input-var').removeClass('wz-utm-input-var--active');
								$('.wz-utm-input-var-list').jScrollPane();
								break;
						}
						break;
					case 'wz-utm-question':
						//$('.wz-utm-description__block').remove();
						$('.wz-utm-description__block').removeClass('wz-utm-description__block--active');
						let currentLang = $('html').attr('lang');
						console.log(currentLang);
						switch (clickedElement.data('id')) {
							case 1:
								$('.wz-utm-description__block').eq(1).addClass('wz-utm-description__block--active');
								break;
							case 2:
								$('.wz-utm-description__block').eq(2).addClass('wz-utm-description__block--active');
								break;
							case 3:
								$('.wz-utm-description__block').eq(3).addClass('wz-utm-description__block--active');		
								break;
							case 4:
								$('.wz-utm-description__block').eq(0).addClass('wz-utm-description__block--active');
								break;
							case 5:
								$('.wz-utm-description__block').eq(4).addClass('wz-utm-description__block--active');
								break;
							default:
								break;
						}
						break;
					case 'wz-utm-input-var-list__item wz-utm-input-var-list__item--active':
						clickedElement.parents('.wz-utm-input-wrapper').find('.wz-utm-input').val(clickedElement.data('var'));
						//console.log(clickedElement);
						break;
					default:
						break;
				}
				
				switch (e.target.id) {
					case 'wz-btn-clear':
						$('.wz-utm-res__input').val('');
						$('.wz-utm-input-btn').addClass('wz-utm-input-btn--unblocked');
						$('#wz-utm-input-1').val('');
						$('#wz-utm-input-2').val('');
						$('#wz-utm-input-3').val('');
						$('#wz-utm-input-4').val('');
						$('#wz-utm-input-5').val('');
						$('.wz-utm-input-var-list__item').addClass('wz-utm-input-var-list__item--active');
						$('.wz-utm-input-var').removeClass('wz-utm-input-var--active');
						$('.wz-utm-radio__item').removeClass('wz-utm-radio__item--active');
						$('.wz-utm-radio__item[data-rad="wz-radio-def"]').addClass('wz-utm-radio__item--active');
						$('.wz-utm-input-var-list').jScrollPane();
						
						break;
					case 'wz-btn-get':
						let url = $('.wz-utm-url__input').val();
						if (url != '') {
							if (url.substr(-1) == '/') {
								$('.wz-utm-res__input').val($('.wz-utm-url__item--active').text() + url + '?');
							}else{
								$('.wz-utm-res__input').val($('.wz-utm-url__item--active').text() + url + '/?');
							}
						}else{
							$('.wz-utm-res__input').val($('.wz-utm-url__item--active').text() + 'site.ru/?');
						}
						$('.wz-utm__input').each(function (index, value) {
							if ($(this).val() != '') {
								if (inputCounter == 0) {
									$('.wz-utm-res__input').val($('.wz-utm-res__input').val() + $(this).data('utm') + '=' + $(this).val())
								}else{
									$('.wz-utm-res__input').val($('.wz-utm-res__input').val() + '&' + $(this).data('utm') + '=' + $(this).val());
								}
								inputCounter++;
							}
						});
						inputCounter = 0;
						break;
					case 'wz-btn-copy':
						$('.wz-utm-res__input').select();
						document.execCommand("copy");
						break;
					default:
						break;
				}
			});
			
			if ($(window).width() > 1199) {
				$('.wz-utm-input-btn').mouseenter(function () {
					$(this).parent().find('.wz-utm-input-tooltip').addClass('wz-utm-input-tooltip--active');
				}).mouseleave(function () {
					$(this).parent().find('.wz-utm-input-tooltip').removeClass('wz-utm-input-tooltip--active');
				});
			}
			
			$('.wz-utm-input-var-list').jScrollPane();			
		});
	</script>
<?}

?>