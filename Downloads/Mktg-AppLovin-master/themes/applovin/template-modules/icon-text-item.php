<?php
/**
 * Icon Text Item Module
 * 
 * @param string $layout - The layout type ('values' or 'culture')
 * @param array $items - Array of items with their content
 */

function get_translations() {
    return [
        'en' => [
            'Product first',
            'Always pursue excellence',
            'Speed wins',
            'Never stop hustling',
            'Challenge the status quo',
            'Lead by doing'
        ],
        'ja' => [
            'プロダクトファースト',
            '常に卓越したものを追求する',
            '素早く行動する',
            '止まらず努力し続ける',
            '現状を打破する',
            '実行して導く'
        ],
        'cn' => [
            '以产品为核心',
            '始终追求卓越',
            '行动迅速',
            '持续全力以赴',
            '打破常规',
            '行胜于言'
        ],
        'ko' => [
            '제품을 우선시하기',
            '우수성을 추구하기',
            '빠르게 움직이기',
            '멈추지않고 노력하기',
            '기존 방식에 도전하기',
            '실천하고 행동하기'
        ]
    ];
}

function get_shared_content() {
    $current_language = pll_current_language();
    $translations = get_translations();
    $texts = isset($translations[$current_language]) ? $translations[$current_language] : $translations['en'];

    return [
        [
            'image' => 'https://storage.googleapis.com/applovin_assets_us/svg/icon-product.svg',
            'alt' => 'Decorative icon representing product-first approach',
            'text' => $texts[0]
        ],
        [
            'image' => 'https://storage.googleapis.com/applovin_assets_us/svg/icon-always.svg',
            'alt' => 'Decorative icon representing pursuit of excellence',
            'text' => $texts[1]
        ],
        [
            'image' => 'https://storage.googleapis.com/applovin_assets_us/svg/icon-speed.svg',
            'alt' => 'Decorative icon representing speed and efficiency',
            'text' => $texts[2]
        ],
        [
            'image' => 'https://storage.googleapis.com/applovin_assets_us/svg/icon-never.svg',
            'alt' => 'Decorative icon representing continuous hustle',
            'text' => $texts[3]
        ],
        [
            'image' => 'https://storage.googleapis.com/applovin_assets_us/svg/icon-chellenge.svg',
            'alt' => 'Decorative icon representing innovation and challenging norms',
            'text' => $texts[4]
        ],
        [
            'image' => 'https://storage.googleapis.com/applovin_assets_us/svg/icon-lead.svg',
            'alt' => 'Decorative icon representing leadership through action',
            'text' => $texts[5]
        ]
    ];
}

function render_icon_text_items($layout = 'values', $items = null) {
    if ($items === null) {
        $items = get_shared_content();
    }

    foreach ($items as $item) {
        if ($layout === 'values') {
            // Values section layout
            ?>
            <div class="inline-flex flex-row items-center text-black">
                <img class="w-[64px] h-[64px]" src="<?php echo $item['image']; ?>" alt="<?php echo $item['alt']; ?>" />
                <div class="ml-[16px] text-left">
                    <h3 class="scale-24-21-18 values-header-title"><?php echo $item['text']; ?></h3>
                </div>
            </div>
            <?php
        } else if ($layout === 'culture') {
            // Culture section layout
            ?>
            <div class="culture">
                <img class="culture-image" src="<?php echo $item['image']; ?>" alt="<?php echo $item['alt']; ?> ">
                <p class="scale-18-18-16"><?php echo $item['text']; ?></p>
            </div>
            <?php
        }
    }
}
?> 