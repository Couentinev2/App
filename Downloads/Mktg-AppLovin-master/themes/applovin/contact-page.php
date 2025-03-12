<?php
/*
Template Name:  Contact Page
*/
?>
<?php get_header(); ?>
<div class="contentPage">

<div id="page-contact">
	<div class="row hero">
		<div class="inner-wrap inner-wrap-800">
			<h5>
				<?php the_field('hero_title'); ?>
			</h5>
			<h2>
				<?php the_field('hero_tagline'); ?>
			</h2>
		</div>
	</div>
	<div class="row content-row">
		<div class="inner-wrap flex-inner-wrap contact-emails-wrap">
			<div class="contact-grid">
				<div class="contact-cell-1">
					<p class="contact-title">
					<?php the_field('office_title_palo_alto'); ?>
					</p>
					<p>
					<?php the_field('address_palo_alto'); ?>
					</p>
					<a href="<?php the_field('map_link_palo_alto'); ?>" target="_blank" rel="noopener"><?php the_field('label_for_get_directions'); ?></a>
				</div>
				<div class="contact-cell-2"><p class="contact-title">
					<?php the_field('general_inquiries_subhead'); ?><br> <a href="mailto:<?php the_field('general_inquiries_email'); ?>"><?php the_field('general_inquiries_email'); ?></a>
				</p></div>
				<div class="contact-cell-3"><p class="contact-title">
					<?php the_field('sales_subhead'); ?><br> <a href="mailto:<?php the_field('sales_email'); ?>"><?php the_field('sales_email'); ?></a>
				</p></div>
				<div class="contact-cell-4"><p class="contact-title">
					<?php the_field('clients_subhead'); ?><br> <a href="<?php the_field('support_site_link'); ?>" target="_blank"><?php the_field('support_site_title'); ?></a>
				</p></div>
				<div class="contact-cell-5"><p class="contact-title">
					<?php the_field('press_subhead'); ?><br> <a href="mailto:<?php the_field('press_email'); ?>"><?php the_field('press_email'); ?></a>
				</p></div>
				<div class="contact-cell-6"><p class="contact-title">
					<?php the_field('investors_subhead'); ?><br> <a href="mailto:<?php the_field('investors_email'); ?>"><?php the_field('investors_email'); ?></a>
				</p></div>
				<div class="contact-cell-7"><p class="contact-title">
					<?php the_field('stay_connected_subhead'); ?><br> <a href="<?php the_field('blog_link_url'); ?>"><?php the_field('blog_link_text'); ?></a>
				</p></div>
				<div class="contact-cell-8">
    <?php
      if ( pll_current_language('slug') == 'en' ) {
        echo '<div class="alert-warning">
      <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="16" cy="16" r="16" fill="#FC326C"/>
<mask id="mask0_2723_2237" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="4" y="4" width="24" height="25">
<rect x="4" y="4.28906" width="24" height="24" fill="#D9D9D9"/>
</mask>
<g mask="url(#mask0_2723_2237)">
<path d="M16 20.2895C16.2833 20.2895 16.5208 20.1936 16.7125 20.002C16.9042 19.8103 17 19.5728 17 19.2895C17 19.0061 16.9042 18.7686 16.7125 18.577C16.5208 18.3853 16.2833 18.2895 16 18.2895C15.7167 18.2895 15.4792 18.3853 15.2875 18.577C15.0958 18.7686 15 19.0061 15 19.2895C15 19.5728 15.0958 19.8103 15.2875 20.002C15.4792 20.1936 15.7167 20.2895 16 20.2895ZM16 16.2895C16.2833 16.2895 16.5208 16.1936 16.7125 16.002C16.9042 15.8103 17 15.5728 17 15.2895V12.2895C17 12.0061 16.9042 11.7686 16.7125 11.577C16.5208 11.3853 16.2833 11.2895 16 11.2895C15.7167 11.2895 15.4792 11.3853 15.2875 11.577C15.0958 11.7686 15 12.0061 15 12.2895V15.2895C15 15.5728 15.0958 15.8103 15.2875 16.002C15.4792 16.1936 15.7167 16.2895 16 16.2895ZM16 26.1895C15.8833 26.1895 15.775 26.1811 15.675 26.1645C15.575 26.1478 15.475 26.1228 15.375 26.0895C13.125 25.3395 11.3333 23.952 10 21.927C8.66667 19.902 8 17.7228 8 15.3895V10.6645C8 10.2478 8.12083 9.87279 8.3625 9.53945C8.60417 9.20612 8.91667 8.96445 9.3 8.81445L15.3 6.56445C15.5333 6.48112 15.7667 6.43945 16 6.43945C16.2333 6.43945 16.4667 6.48112 16.7 6.56445L22.7 8.81445C23.0833 8.96445 23.3958 9.20612 23.6375 9.53945C23.8792 9.87279 24 10.2478 24 10.6645V15.3895C24 17.7228 23.3333 19.902 22 21.927C20.6667 23.952 18.875 25.3395 16.625 26.0895C16.525 26.1228 16.425 26.1478 16.325 26.1645C16.225 26.1811 16.1167 26.1895 16 26.1895Z" fill="white"/>
</g>
</svg>
      <p>AppLovin works with applicants through our Jobs page and applovin.com email addresses. If you are contacted through other unofficial channels, it may not be legitimate. <a href="/jobs/">Confirm the information here</a> and <a href="mailto:jobs@applovin.com">contact us directly</a> with any questions.</p>
      </div>';
      } else if ( pll_current_language('slug') == 'ja' ) {
 echo '<div class="alert-warning">
      <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="16" cy="16" r="16" fill="#FC326C"/>
<mask id="mask0_2723_2237" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="4" y="4" width="24" height="25">
<rect x="4" y="4.28906" width="24" height="24" fill="#D9D9D9"/>
</mask>
<g mask="url(#mask0_2723_2237)">
<path d="M16 20.2895C16.2833 20.2895 16.5208 20.1936 16.7125 20.002C16.9042 19.8103 17 19.5728 17 19.2895C17 19.0061 16.9042 18.7686 16.7125 18.577C16.5208 18.3853 16.2833 18.2895 16 18.2895C15.7167 18.2895 15.4792 18.3853 15.2875 18.577C15.0958 18.7686 15 19.0061 15 19.2895C15 19.5728 15.0958 19.8103 15.2875 20.002C15.4792 20.1936 15.7167 20.2895 16 20.2895ZM16 16.2895C16.2833 16.2895 16.5208 16.1936 16.7125 16.002C16.9042 15.8103 17 15.5728 17 15.2895V12.2895C17 12.0061 16.9042 11.7686 16.7125 11.577C16.5208 11.3853 16.2833 11.2895 16 11.2895C15.7167 11.2895 15.4792 11.3853 15.2875 11.577C15.0958 11.7686 15 12.0061 15 12.2895V15.2895C15 15.5728 15.0958 15.8103 15.2875 16.002C15.4792 16.1936 15.7167 16.2895 16 16.2895ZM16 26.1895C15.8833 26.1895 15.775 26.1811 15.675 26.1645C15.575 26.1478 15.475 26.1228 15.375 26.0895C13.125 25.3395 11.3333 23.952 10 21.927C8.66667 19.902 8 17.7228 8 15.3895V10.6645C8 10.2478 8.12083 9.87279 8.3625 9.53945C8.60417 9.20612 8.91667 8.96445 9.3 8.81445L15.3 6.56445C15.5333 6.48112 15.7667 6.43945 16 6.43945C16.2333 6.43945 16.4667 6.48112 16.7 6.56445L22.7 8.81445C23.0833 8.96445 23.3958 9.20612 23.6375 9.53945C23.8792 9.87279 24 10.2478 24 10.6645V15.3895C24 17.7228 23.3333 19.902 22 21.927C20.6667 23.952 18.875 25.3395 16.625 26.0895C16.525 26.1228 16.425 26.1478 16.325 26.1645C16.225 26.1811 16.1167 26.1895 16 26.1895Z" fill="white"/>
</g>
</svg>
      <p>現在、無断で弊社名を騙り、X(Twitter)のDMや、LINEアカウントを通して偽の採用情報に関するメッセージが発信されていることが確認されました。偽ウェブサイトや偽アカウントと弊社は一切関わりがございませんので、くれぐれもご注意ください。AppLovinでは、<a href="/jobs/">採用ウェブサイト</a>以外の方法で、アルバイトを含む人材募集を日本語で行うことはありません。
すでに被害にあわれている場合は、銀行および警察に早急にご相談いただくことをおすすめいたします。</p>
      </div>';
      };
?>
				
				</div>
				<div class="contact-cell-9">
					<ul class="social-icons contact-social-icons">
						<li><a href="<?php the_field('twitter_url'); ?>" target="_blank" rel="noreferrer"><img src="/wp-content/themes/applovin/images/social-icon-x-2023.svg" alt="X" /></a></li>
						<li><a href="<?php the_field('facebook_url'); ?>" target="_blank" rel="noreferrer"><img src="/wp-content/themes/applovin/images/social-icon-fb-2023.svg" alt="Facebook" /></a></li>
						<li><a href="<?php the_field('linkedin_url'); ?>" target="_blank" rel="noreferrer"><img src="/wp-content/themes/applovin/images/social-icon-li-2023.svg" alt="LinkedIn" /></a></li>
						<li><a href="<?php the_field('instagram_url'); ?>" target="_blank" rel="noreferrer"><img src="/wp-content/themes/applovin/images/social-icon-ig-2023.svg" alt="Instagram" /></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="row contact-map-wrap">
		<img src="/wp-content/themes/applovin/images/illo-map-contact-v2.png" class="illo-map-bg-contact" alt="world map showing AppLovin office locations" />
	</div>
</div>

<?php get_footer(); ?>