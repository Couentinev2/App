<?php
$current_language = pll_current_language();
get_header();
?>
<div id="page-404">
	<div class="wrapper !pt-[120px] pb-[64px] md:pb-[80px] lg:!py-[160px]">
		<div class="grid gap-[80px] lg:gap-[120px]">
			<section class="m-auto max-w-[1000px]">

				<?php if ($current_language == 'en') {
					echo '<h1 class="scale-50-40-28 text-center mb-[8px] md:mb-[12px] lg:mb-[15px] text-black">Oops! Page Not Found</h1>
			<p class="scale-21-21-18 text-center text-black">Looks like you’ve taken a wrong turn. But don’t worry, we’ve got you covered.</p>';
				} else if ($current_language == 'cn') {
					echo '<h1 class="scale-50-40-28 text-center mb-[8px] md:mb-[12px] lg:mb-[15px] text-black">Oops！页面未找到</h1>
			<p class="scale-21-21-18 text-center text-black">看来有人好像走错了...别着急，我们会为您提供帮助！</p>';
				} else if ($current_language == 'ko') {
					echo '<h1 class="scale-50-40-28 text-center mb-[8px] md:mb-[12px] lg:mb-[15px] text-black">페이지를 찾을 수 없습니다 </h1>
			<p class="scale-21-21-18 text-center text-black">해당 페이지는 주소가 변경되었거나 삭제되었을 수 있습니다. <br>아래 링크를 통해 원하시는 콘텐츠를 찾아보세요.
			</p>';
				} else if ($current_language == 'ja') {
					echo '<h1 class="scale-50-40-28 text-center mb-[8px] md:mb-[12px] lg:mb-[15px] text-black">お探しのページが <br> 見つかりません</h1>
			<p class="scale-21-21-18 text-center text-black">アクセスしたページは、アドレスが変更されたか、削除された可能性があります。 <br>下記リンクからお探しのコンテンツをご覧ください。</p>';
				};
				?>
				<div class="primary-slate-btn m-auto mt-[42px]">
					<a href="<?php echo pll__('/'); ?>">
						<span><?php echo pll__('Return to homepage'); ?></span>
					</a>
				</div>
			</section>

			<section>
				<div class="grid md:grid-cols-3 gap-[40px] lg:gap-[80px]">
					<div class="md:col-span-1 flex flex-col border-t-2 border-[#cccccc]">
						<div class="pt-[24px]">
							<div class="grid gap-[24px]">
								<div class="grid gap-[8px]">
									<h3 class="scale-18-18-16 m-0 text-black"><?php echo pll__('Press'); ?></h3>
									<p class="fixed-16 text-black m-0"><?php echo pll__('Learn about AppLovin and stay up to date on company news.'); ?></p>
								</div>
								<div class="blue-link-16 mt-auto">
									<a href="<?php echo pll__('/press/'); ?>">
										<span><?php echo pll__('Take me there'); ?></span>
										<?php echo file_get_contents(get_template_directory() . '/images/arrow_forward.svg'); ?>
									</a>
								</div>
							</div>
						</div>
					</div>

					<div class="md:col-span-1 flex flex-col border-t-2 border-[#cccccc]">
						<div class="pt-[24px]">
							<div class="grid gap-[24px]">
								<div class="grid gap-[8px]">
									<h3 class="scale-18-18-16 m-0 text-black"><?php echo pll__('Resource Center'); ?></h3>
									<p class="fixed-16 text-black m-0"><?php echo pll__('Discover resources to help grow your app business.'); ?></p>
								</div>
								<div class="blue-link-16 mt-auto">
									<a href="<?php echo pll__('/resource-center/'); ?>">
										<span><?php echo pll__('Visit the hub'); ?></span>
										<?php echo file_get_contents(get_template_directory() . '/images/arrow_forward.svg'); ?>
									</a>
								</div>
							</div>
						</div>
					</div>

					<div class="md:col-span-1 flex flex-col border-t-2 border-[#cccccc]">
						<div class="pt-[24px]">
							<div class="grid gap-[24px]">
								<div class="grid gap-[8px]">
									<h3 class="scale-18-18-16 m-0 text-black"><?php echo pll__('Careers'); ?></h3>
									<p class="fixed-16 text-black m-0"><?php echo pll__('Interested in joining our team? Check out our open positions.'); ?></p>
								</div>
								<div class="blue-link-16 mt-auto">
									<a href="<?php echo pll__('/jobs/'); ?>">
										<span><?php echo pll__('Grow with us'); ?></span>
										<?php echo file_get_contents(get_template_directory() . '/images/arrow_forward.svg'); ?>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
<?php get_footer(); ?>