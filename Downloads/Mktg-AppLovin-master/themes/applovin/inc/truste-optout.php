<?php
// TRUSTe badges (pulled into top of Privacy Policy pages)
?>

<a href="https://privacy.truste.com/privacy-seal/validation?rid=b660c4bf-c1cd-44c9-a527-f428e5f1f5d2" class="truste-badge"><img src="https://applovincore.wpengine.com/wp-content/themes/applovin/images/badge-truste-certified-privacy.gif" width="160" height="44" alt="TRUSTe Certified Privacy" /></a>
<a href="https://privacy.truste.com/privacy-seal/validation?rid=0d325ffb-5c6a-4c69-9edd-3380254e97d6" class="truste-badge"><img src="https://applovincore.wpengine.com/wp-content/themes/applovin/images/badge-truste-trusted-data.gif" width="160" height="44" alt="TRUSTe Trusted Data" /></a><a href="https://www.applovin.com/optout" class="opt-out">
<?php
if ( is_page( 'privacy' ) ) {
	echo 'Opt Out';
} elseif ( is_page( 'privacy-cn' ) ) {
	echo '选择退出';
} elseif ( is_page( 'privacy-de' ) ) {
	echo 'Austreten';
} elseif ( is_page( 'privacy-jp' ) ) {
	echo 'オプトアウト';
} elseif ( is_page( 'privacy-kr' ) ) {
	echo '수신 거부';
} else {
	echo 'Opt Out';
}
?>
</a>
