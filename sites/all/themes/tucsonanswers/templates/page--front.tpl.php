<?php
/**
 * @file
 * Zen theme's implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $secondary_menu_heading: The title of the menu used by the secondary links.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['header']: Items for the header region.
 * - $page['navigation']: Items for the navigation region, below the main menu (if any).
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['footer']: Items for the footer region.
 * - $page['bottom']: Items to appear at the bottom of the page below the footer.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see zen_preprocess_page()
 * @see template_process()
 */
?>
<div id="wrapper"> 
  <header id="header" role="banner">
	<div class="navbar-top">
		<div class="container">
			<div class="row">
	
				<div class="logo span4">
<?php if ($site_name || $site_slogan): ?> 
  <hgroup id="name-and-slogan">
	<?php if ($site_name): ?>
	  
		<a class="hnl-logo" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
		<span class="bubble">
			<img class="beta" alt="beta" src="/sites/all/themes/tucsonanswers/images/beta.png">
		</span>
	<?php endif; ?>
  </hgroup>
<?php endif; ?>
				</div>
			
      <?php if ($main_menu): ?>
	  
        <nav id="main-menu" role="navigation">
		<ul class="nav-top span5">
          <?php
		  foreach($main_menu as $link){
			echo '<li><a href="'.$link['href'].'">'.$link['title'].'</a></li>';
		  }
		  ?>
		</ul>
        </nav>
      <?php endif; ?>
 			</div><!-- row -->
		</div> <!-- container -->
	</div> 
</header>
<div class="container main clearfix">

<!-- main content container -->

<div class="modal-container span8">


    <div class="main-modal">
		<div id="welcome-line-l"></div>
		<div id="welcome-line-r"></div>
	  
      <?php if ($title): ?>
        <h3 class="welcome" id="page-title"><?php print substr($title, 0, 10); ?></h1>
		<h1 class="home-modal"><?php print substr($title, 11, 14); ?></h1>
      <?php endif; ?>	  
	   <p class="call">Find answers to your questions about Tucson city services.</p>
		<div class="ribbon-front">
		  <div class="triangle-l"></div>
		  <div class="triangle-r"></div>
		  <div class="ribbon-wrapper">
		  
		  
		  <?php print render($page['header']); ?>
		  <script type="text/javascript">window.onload = function (){ 
			document.getElementById('edit-search-block-form--2').value = "Try driver license, jobs, or registration..."; 
			document.getElementById('edit-search-block-form--2').onclick = function () { 
				if(document.getElementById('edit-search-block-form--2').value == "Try driver license, jobs, or registration..."){
					document.getElementById('edit-search-block-form--2').value = '';
					document.getElementById('edit-search-block-form--2').style.color = '#000000';
				}
			}
			}
			</script>
		  </div>
		</div><!-- /ribbon-wrapper -->	  
	  
	  <div class="popular">
		  <div class="pop-heading">
				<h2>Most Popular Categories:</h2>
		  </div>
		  <div class="pop-categories">
			<div class="category">
				<?php print render($page['content']); ?>
			</div>
		  </div>
	  </div>	  
    </div><!-- /#content -->

</div><!-- modal container -->
</div><!-- container main clearfix -->
</div> 
<div class="footer">
  <div class="container">
	<?php print render($page['bottom']); ?>
  </div>
</div>