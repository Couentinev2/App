<style>
	.secondmenu {
		width: 100%;
		z-index: 990;
	}
	body {
	color:#000;
	}
	#rc-main-nav-row {
		transition:.25s all cubic-bezier(.77,0,.175,1);
		border-top: 1px solid rgba(230,230,230,1);
		border-bottom: 1px solid rgba(230,230,230,0);
		margin-top: 12px;
	}
#rc-main-nav {
    display: grid;
    grid-template-columns: 1fr auto auto;
    grid-template-rows: repeat(2, auto);
    grid-column-gap: 16px;
    grid-row-gap: 0px;
    align-items: center;
    margin:24px 0 12px;
    width: 100%;
}
.rc-nav-title-path { grid-area: 1 / 1 / 2 / 2;
text-align: left;}
#rc-subnav-search { grid-area: 1 / 2 / 2 / 3; }
#rc-subnav-toggle { grid-area: 1 / 3 / 2 / 4; }
#rc-dropdown-subnavs { grid-area: 2 / 1 / 3 / 4; }


	.rc-nav-title-path a {
		color:inherit;
	}
.dark .rc-nav-title-path {
    color: #fff;
}
.dark #rc-main-nav-row {
	border-top: 1px solid rgba(230,230,230,0.1);
}
.dark #rc-main-nav-row.active {
	border-top: 1px solid rgba(230,230,230,1);
}
.dark #rc-main-nav-row.active .rc-nav-title-path, #rc-main-nav-row.scrolled .rc-nav-title-path{
    color: #000;
}


#rc-main-nav h2 {
		display:inline-block;
		font-size:inherit!important;
		margin:0;
	}
	.title-path-divider {
		color:#ccc;
	}
	#rc-dropdown-subnavs {
		display: grid;
		grid-template-columns: 17% 20.5% auto;
		grid-template-rows: 1fr;
		grid-column-gap: 0px;
		grid-row-gap: 0px;
		font-size:14px;
		margin:40px 0;
		}
		
		.rc-subnav-1 { grid-area: 1 / 1 / 2 / 2; }
		.rc-subnav-2 { grid-area: 1 / 2 / 2 / 3;
		}
		.rc-subnav-3 { grid-area: 1 / 3 / 2 / 4;
		}
		.rc-subnav { 
		padding:0 40px;
		text-align:left;
}
		.rc-subnav:first-child { 
		padding-left:0;
}
		.rc-subnav:last-child { 
		padding-right:0;
}
		.rc-subnav:nth-child(n + 2) {
		border-left: 1px solid #E6E6E6;
}
		.rc-subnav-3 ul {
    column-count: 3;
}
		.rc-subnav ul {
		    list-style:none;
		    padding:0;
		    line-height:1em;
		    margin:24px 0 0;
}
.rc-subnav-title {
	font-family:'Avenir Heavy';
	font-weight:700;
}
		.rc-subnav li:nth-child(n + 2) {
		    margin-top:1.5em;
}
		.rc-subnav a { 
		color:#000;
}
		.rc-subnav .no-posts { 
		color:#999;
		display:none;
}
#rc-nav-ui {
display: flex;
align-items: flex-start;
gap: 16px;
}
#rc-subnav-toggle, #rc-subnav-search {
	height:40px;
}
#rc-subnav-toggle {
	cursor:pointer;
	display: flex;
	width: 200px;
	padding: 0.4em 0.85em 0.2em;
	justify-content: space-between;
	align-items: center;
	border-radius: 4px;
	border: 1px solid #CCC;
color: #000;
font-size: 14px;
font-family: 'Avenir Heavy';
font-weight: 700;
line-height: 1.5em;
}
#rc-subnav-toggle > svg {
width: 7px;
height: 4px;
flex-shrink: 0;
transform:rotate(180deg);
}
.dark #rc-subnav-toggle {
    color: #fff;
}
.dark #rc-subnav-toggle > svg > * {
    fill: white;
}
.dark #rc-main-nav-row.active #rc-subnav-toggle, #rc-main-nav-row.scrolled #rc-subnav-toggle {
    color: #000;
}
.dark #rc-main-nav-row.active #rc-subnav-toggle > svg > *, #rc-main-nav-row.scrolled #rc-subnav-toggle > svg > *  {
    fill: black;
}
.active #rc-subnav-toggle > svg {
transform:rotate(0deg);
}
#rc-subnav-closer {
    grid-area: 1 / 3 / 2 / 4;
    justify-self: flex-end;
    background-image: url("data:image/svg+xml,%3Csvg width='24' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M19.9989 4L4 20' stroke='black' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/%3E%3Cpath d='M20 20.0002L4 4.00049' stroke='black' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E%0A");
    background-repeat: no-repeat;
    background-position: right center;
	width:24px;
	height:24px;
    display:none;
}
#rc-subnav-search {
display: flex;
min-width: 200px;
padding: 8px 12px;
align-items: center;
gap: 8px;
border-radius: 4px;
border: 1px solid #CCC;
font-size: 14px;
}
#rc-subnav-search > button {
-webkit-appearance: none;
    border: none;
    background-color: transparent;
    margin:0;
    padding:0;
    display: flex;
    cursor:pointer;
}
#rc-subnav-search > button > svg {
width: 15px;
height: auto;
flex-shrink: 0;
}
.dark #rc-subnav-search > button > svg > * {
    stroke: white;
}
.dark #rc-main-nav-row.active #rc-subnav-search > button > svg > *, #rc-main-nav-row.scrolled #rc-subnav-search > button > svg > * {
    stroke: black;
}
#rc-subnav-search input#s {
border:none;
min-width: 172px;
outline: none;
background-color: transparent;
color: #999;
}


@media all and (max-width:1024px) {
#rc-main-nav {
grid-template-columns: repeat(3, auto);
grid-template-rows: repeat(3, auto);
grid-row-gap: 0;
}

.rc-nav-title-path { grid-area: 1 / 1 / 2 / 3; }
#rc-subnav-search { grid-area: 2 / 1 / 3 / 4;
	display:none;
}
#rc-subnav-toggle { grid-area: 1 / 3 / 2 / 4;
justify-self: flex-end;
}
#rc-dropdown-subnavs { grid-area: 3 / 1 / 4 / 4;
    border-top: 1px solid #ccc;
    margin-top: 32px;
    }

#rc-subnav-search {
	margin-top:32px;
}

.active #rc-subnav-search {
	display:flex;
}

	#rc-dropdown-subnavs {
			grid-template-columns: repeat(2, 1fr);
			grid-template-rows: repeat(2, auto);
		}
		
		.rc-subnav-1 { grid-area: 1 / 1 / 2 / 2; }
		.rc-subnav-2 { grid-area: 1 / 2 / 2 / 3;
		}
		.rc-subnav-3 { grid-area: 2 / 1 / 3 / 3;
		}
		.rc-subnav:nth-child(n + 2) {
			border-left: none;
		}
		.rc-subnav {
			padding: 40px 0;
		}
		.rc-subnav-3 {
			border-top: 1px solid #E6E6E6;
		}
		.rc-subnav-3 ul {
			column-count: 2;
		}
		.active #rc-subnav-toggle {
		grid-area: 1 / 3 / 2 / 4;
		opacity:0;
		justify-self: flex-end;
		width: 24px;
		overflow: hidden;
		z-index:10;
		}

		.active #rc-subnav-closer {
			display:block;
		}
}
@media all and (max-width:640px) {
		#rc-main-nav {
		grid-row-gap: 16px;
	}
	#rc-dropdown-subnavs {
			grid-template-columns: 1fr;
			grid-template-rows: repeat(3, auto);
		}
		
		.rc-subnav-1 { grid-area: 1 / 1 / 2 / 2; }
		.rc-subnav-2 { grid-area: 2 / 1 / 3 / 2;
		}
		.rc-subnav-3 { grid-area: 3 / 1 / 4 / 2;
		}
		.rc-subnav {
			padding: 32px 0;
		}
		.rc-subnav:nth-child(n + 2) {
			border-top: 1px solid #E6E6E6;
		}
		.rc-subnav-3 ul {
			column-count: 1;
		}
		.title-path, .title-path-divider {
			display:none;
		}
		.rc-nav-title-path {
	    grid-area: 1 / 1 / 2 / 4;
		}
		#rc-subnav-toggle {
		grid-area: 2 / 1 / 3 / 4;
		justify-self: flex-start;
		}
		#rc-main-nav {
			margin-bottom: 0;
		}
		#rc-dropdown-subnavs {
			border-top: none;
		}
		#rc-dropdown-subnavs {
			margin-bottom: 0;
		}
		.rc-subnav li:last-child {
			margin-bottom: 0;
		}

}
	</style>
<?php
	$subsection = "";
	if ( is_home() || is_singular('post') || is_author() ) { // Blog pages
		$subsection = pll__('Blog');
		$sublink = esc_url(get_permalink(get_option('page_for_posts')));
   	} elseif ( is_page_template( array( 'success-stories-overview-page.php' ) ) || is_singular('success_story_pod') || is_singular('success-stories-with') ) { // Success Story pages
		$subsection = pll__('Success Stories');
		$sublink = get_lang_base() . '/success-stories/';
   	} elseif ( is_page_template( array( 'reports-overview-page.php', 'ctv-report.php', 'sparklab-report.php' ) ) || is_singular('guide_pod') || is_singular('report_pod') ) { // Guides and Reports pages
		$subsection = pll__('Guides and Reports');
		$sublink = get_lang_base() . '/guides-reports/';
   	} elseif ( is_page_template( array( 'videos-overview-page.php' ) ) || is_singular('video') ) { // Video Library pages
		$subsection = pll__('Video Library');
		$sublink = '/videos/'; // in EN only
   	}  elseif ( is_page_template( array( 'events-overview.php', 'sub-events-page.php' ) ) ) { // Video Library pages
		$subsection = pll__('Events');
		$sublink = '/events/'; // in EN only
   	}elseif ( is_page_template( array( 'glossary-page.php' ) ) || is_singular('glossary_entry') ) { // Glossary pages
		$subsection = pll__('Glossary');
		$sublink = '/glossary/'; // in EN only
   	} elseif ( is_search() ) { // Search results
		$subsection = pll__('Search');
		$sublink = '#';
	} else {
		$subsection = "Undefined";
		$sublink = "#";
	}
	?>
<div class="row" id="rc-main-nav-row">
	<div class="inner-wrap inner-wrap-full">
		<div id="rc-main-nav">
			<div class="rc-nav-title-path">
				<h2 class="scale-21-21-18">
					<a href="<?php the_lang_base(); ?>/resource-center/"><?php pll_e('Resource Center'); ?>
					</a>
				</h2>
<?php
		if ( ( ! is_archive() ) && ( ! is_page_template( array('ressource-center-overview.php', 'rc-category-page.php', 'rc-objective-page.php') ) ) ) {
		echo '<span class="title-path-divider"> / </span><span class="title-path"><a href="' . $sublink . '">' . $subsection . '</a></span>';
		}
		?>
			</div>
			<div id="rc-subnav-search">
				<button aria-label="Search" type="submit" form="searchform"><svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg"> <circle cx="6" cy="6.5" r="5.5" stroke="black" stroke-linecap="round" stroke-linejoin="round" /> <path d="M10 10.5L15.5 16" stroke="black" stroke-linecap="round" stroke-linejoin="round" /> </svg></button> 
				<form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>" onsubmit="return validateForm()">
					<input type="text" value="" name="s" id="s" placeholder="<?php pll_e('Search Resource Center'); ?>" />
					<input type="hidden" name="post_type" value="post,success_story_pod,video,guide_pod,report_pod" />
				</form>
			</div>
			<div id="rc-subnav-toggle">
<?php pll_e('Browse all resources'); ?>
				<svg xmlns="http://www.w3.org/2000/svg" width="7" height="4" viewBox="0 0 7 4" fill="none"> <path d="M3.5 0.5L6.53109 3.5L0.468911 3.5L3.5 0.5Z" fill="black" /> </svg>
			</div>
			<div id="rc-subnav-closer"></div>
			<div id="rc-dropdown-subnavs" style="display:none;">
				<div class="rc-subnav rc-subnav-1">
					<span class="rc-subnav-title"><?php pll_e('Browse by type'); ?>
					</span> 
<?php if ( pll_current_language('slug') == 'cn' ) {
		$videolib = "https://space.bilibili.com/1906143509";
	  } else {
		$videolib = "/videos/";
	  }; ?>
					<ul>
						<li><a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>"><?php pll_e('Blog'); ?>
						</a></li>
						<li><a href="<?php the_lang_base(); ?>/success-stories/"><?php pll_e('Success Stories'); ?>
						</a></li>
						<li><a href="<?php echo $videolib; ?>"><?php pll_e('Video Library'); ?>
						</a></li>
						<li><a href="<?php the_lang_base(); ?>/guides-reports/"><?php pll_e('Guides and Reports'); ?>
						</a></li>
						<li><a href="/glossary/"><?php pll_e('Glossary'); ?>
						</a></li>
					</ul>
				</div>
				<div class="rc-subnav rc-subnav-2">
    <span class="rc-subnav-title"><?php pll_e('Browse by product'); ?></span> 
    <?php
        function list_product_categories() {
            // Get all terms under the 'products' taxonomy
            $terms = get_terms(array(
                'taxonomy' => 'products',
                'hide_empty' => true,
                'orderby' => 'menu_order',
            ));

            // Check if there are any terms
            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                echo '<ul>';
                foreach ( $terms as $term ) {
                    // Exclude the term with the name "Audience+"
                    if ( $term->name === 'Audience+' ) {
                        continue;
                    }

                    // Check if the term has posts associated with it
                    if ( $term->count > 0 ) {
                        echo '<li><a href="' . get_lang_base() . '/resource-center/' . $term->slug . '">' . $term->name . '</a></li>';
                    } else {
                        echo '<li class="no-posts">' . $term->name . '</li>';
                    }
                }
                echo '</ul>';
            }
        }

        list_product_categories();
    ?>
</div>

				<div class="rc-subnav rc-subnav-3">
					<span class="rc-subnav-title"><?php pll_e('Browse by topic'); ?>
					</span> 
<?php
		function list_topic_categories() {
			// Get all terms under the 'topics' taxonomy
			$terms = get_terms(array(
				'taxonomy' => 'topics',
				'hide_empty' => false,
				'orderby' => 'title',
			));

			// Check if there are any terms
			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
				echo '<ul>';
				foreach ( $terms as $term ) {
					// Check if the term has posts associated with it
					if ( $term->count > 0 ) {
						echo '<li><a href="' . get_lang_base() . '/resource-center/' . $term->slug . '">' . $term->name . '</a></li>';
					} else {
						echo '<li class="no-posts">' . $term->name . '</li>';
					}
				}
				echo '</ul>';
			}
		}

		list_topic_categories();
		?>
				</div>
			</div>
		</div>
	</div>
</div>

<script>

function validateForm() {
    var searchText = document.getElementById('s').value.trim();
    if (searchText === '') {
        return false;
    }
    return true;
}
</script>
<script>
// RC nav and submenu controls
window.onscroll = function() {
    var myscroll = window.scrollY;
    var rcNavRow = document.getElementById('rc-main-nav-row');

    if (rcNavRow) {
        if (myscroll >= 60) {
            rcNavRow.classList.add("scrolled");
        } else {
            rcNavRow.classList.remove("scrolled");
        }
    }
};

// Define the toggleDropdown function
var headerNav = document.getElementById('header');
var headerInitState = 'off';
if (headerNav.classList.contains('transparent') != false ) {
  headerInitState = 'transparent';
}
function toggleDropdown() {
  var rcNav = document.getElementById('rc-main-nav');
  var rcNavRow = document.getElementById('rc-main-nav-row');
  var dropdown = document.getElementById('rc-dropdown-subnavs');
  var toggleElement = document.getElementById('rc-subnav-toggle');
  var myScroll = window.pageYOffset || document.documentElement.scrollTop;
  if (dropdown) {
    var currentDisplay = window.getComputedStyle(dropdown).display;
    if (currentDisplay === 'none') {
      dropdown.style.display = 'grid';
      rcNav.classList.add('active');
      rcNavRow.classList.add('active');
      if (headerInitState == 'transparent' ) {
		  headerNav.classList.remove('transparent');
      }
    } else {
      dropdown.style.display = 'none';
      rcNav.classList.remove('active');
      rcNavRow.classList.remove('active');
      if ( headerInitState == 'transparent' && myScroll <= 59 ) {
		  headerNav.classList.add('transparent');
      }
    }
  }
}

document.addEventListener('DOMContentLoaded', function() {
  var toggleElement = document.getElementById('rc-subnav-toggle');
  if (toggleElement) {
    toggleElement.addEventListener('click', toggleDropdown);
  }
});

document.querySelector("html").addEventListener("click", function(event) {
    var rcNav = document.getElementById('rc-main-nav');
    var rcNavRow = document.getElementById('rc-main-nav-row');
    var dropdown = document.getElementById('rc-dropdown-subnavs');
    if (!rcNav.contains(event.target) && rcNav.classList.contains('active')) {
        rcNav.classList.remove('active');
        rcNavRow.classList.remove('active');
        dropdown.style.display = 'none';
    }
});

</script>
