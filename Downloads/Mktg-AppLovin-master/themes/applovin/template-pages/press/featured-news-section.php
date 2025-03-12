<!-- Featured News Section Start -->
<section class="featured-news" aria-labelledby="featured-section-title">
    <div class="wrapper !pt-0 grid gap-[32px] md:gap-[40px] lg:gap-[48px]">
        <h3 class="avenir-black text-black text-center m-0" id="featured-section-title"><?php the_field('featured_title'); ?></h3>
        <div class="max-w-[1200px] featured-pod-wrap">
            <?php
            $posts = get_field('top_3_news_articles');

            if ($posts) : ?>
                <?php foreach ($posts as $p) : // variable must NOT be called $post (IMPORTANT) 
                ?>
                    <a href="<?php the_field('news_article_url', $p->ID); ?>" class="featured-pod" target="_blank">
                        <div class="featured-pod-img">
                            <img src="<?php the_field('featured_article_image', $p->ID); ?>" alt="<?php the_field('news_source', $p->ID); ?> story header" class="featured-article-image" />
                        </div>
                        <div class="featured-pod-text grid gap-[32px] md:gap-[40px]">
                            <?php echo get_the_title($p->ID); ?>
                            <div class="text-[#999999] uppercase text-[12px] leading-[9px] tracking-[1px] avenir-heavy"><?php the_field('news_source', $p->ID); ?></div>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <div class="m-auto w-fit">
            <div class="secondary-slate-gray-btn">
                <a href="#stories">
                    <span><?php pll_e('See more stories'); ?></span>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- Featured News Section End -->