<?php
/**
 * This file is the template that displays an access denied for not logged in users
 *
 * For a quick explanation of b2evo 2.0 skins, please start here:
 * {@link http://b2evolution.net/man/skin-development-primer}
 *
 * @package evoskins
 * @subpackage bootstrap
 */
if( !defined('EVO_MAIN_INIT') ) die( 'Please, do not access this page directly.' );

global $app_version, $disp, $Blog;

if( evo_version_compare( $app_version, '6.4' ) < 0 )
{ // Older skins (versions 2.x and above) should work on newer b2evo versions, but newer skins may not work on older b2evo versions.
	die( 'This skin is designed for b2evolution 6.4 and above. Please <a href="http://b2evolution.net/downloads/index.html">upgrade your b2evolution</a>.' );
}

// This is the main template; it may be used to display very different things.
// Do inits depending on current $disp:
skin_init( $disp );


// -------------------------- HTML HEADER INCLUDED HERE --------------------------
skin_include( '_html_header.inc.php', array() );
// -------------------------------- END OF HEADER --------------------------------


// ---------------------------- SITE HEADER INCLUDED HERE ----------------------------
// If site headers are enabled, they will be included here:
siteskin_include( '_site_body_header.inc.php' );
// ------------------------------- END OF SITE HEADER --------------------------------
?>
<!-- Add Preloader -->
<div class="preloader">
	<span class="img-preload"></span>
</div>
<!-- End Preloader -->

<div class="container-fluid">
	<div class="row">

	<header id="header" >
		<div class="container">
		<?php
		if( $Skin->is_visible_container( 'header' ) )
		{ // Display 'Page Top' widget container
		?>
			<div class="col-xs-12 col-sm-6 col-md-8">
				<div class="pageHeader">
					<?php
						// ------------------------- "Header" CONTAINER EMBEDDED HERE --------------------------
						// Display container and contents:
						skin_container( NT_('Header'), array(
								// The following params will be used as defaults for widgets included in this container:
								'block_start'       => '<div class="widget $wi_class$">',
								'block_end'         => '</div>',
								'block_title_start' => '<h1>',
								'block_title_end'   => '</h1>',
							) );
						// ----------------------------- END OF "Header" CONTAINER -----------------------------
					?>
				</div>
			</div>
		<?php } ?>

		<?php
		if( $Skin->is_visible_container( 'page_top' ) )
		{ // Display 'Page Top' widget container
		?>
			<div class="col-xs-12 col-sm-6 col-md-4">
				<div class="PageTop">
				<?php
					// ------------------------- "Page Top" CONTAINER EMBEDDED HERE --------------------------
					// Display container and contents:
					skin_container( NT_('Page Top'), array(
							// The following params will be used as defaults for widgets included in this container:
							'block_start'         => '<div class="widget $wi_class$">',
							'block_end'           => '</div>',
							'block_display_title' => false,
							'list_start'          => '<ul>',
							'list_end'            => '</ul>',
							'item_start'          => '<li>',
							'item_end'            => '</li>',
						) );
					// ----------------------------- END OF "Page Top" CONTAINER -----------------------------
				?>
				</div>
			</div>
		<?php } ?>

		</div>
		<!-- end container header -->
	</header>
	<!-- end header -->
	<?php
	if( $Skin->is_visible_container( 'menu' ) )
	{ // Display 'Menu' widget container
	?>
	<nav id="nav" class="navbar">
		<div class="container">
			<div class="row">
				<div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#flat_nav">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <!-- <a class="navbar-brand" href="#">Brand</a> -->
		    </div>


				<div class="col-md-12 collapse navbar-collapse" id="flat_nav">
					<ul class="nav nav-tabs navbar-nav">
					<?php
						// ------------------------- "Menu" CONTAINER EMBEDDED HERE --------------------------
						// Display container and contents:
						// Note: this container is designed to be a single <ul> list
						skin_container( NT_('Menu'), array(
								// The following params will be used as defaults for widgets included in this container:
								'block_start'         => '',
								'block_end'           => '',
								'block_display_title' => false,
								'list_start'          => '',
								'list_end'            => '',
								'item_start'          => '<li>',
								'item_end'            => '</li>',
								'item_selected_start' => '<li class="active">',
								'item_selected_end'   => '</li>',
								'item_title_before'   => '',
								'item_title_after'    => '',
							) );
						// ----------------------------- END OF "Menu" CONTAINER -----------------------------
					?>
					</ul>
				</div>
			</div>
			<!-- end row menu -->
		</div>
		<!-- end container nav -->
	</nav>
	<?php } ?>

<div class="container main-content">
	<!-- <div class="row"> -->
		<div class="<?php echo ( $Skin->get_setting( 'layout' ) == 'single_column' ? 'col-md-12' : 'col-md-8' ); ?> " <?php
				echo ( $Skin->get_setting( 'layout' ) == 'left_sidebar' ? ' style="float:right;"' : '' ); ?>>

			<!-- Open Main area Section -->
			<div id="main_area" >
<!-- =================================== START OF MAIN AREA =================================== -->


	<?php
		// -------------- MAIN CONTENT TEMPLATE INCLUDED HERE (Based on $disp) --------------
		skin_include( '$disp$', array(
				// Form params for the forms below: login, register, lostpassword, activateinfo and msgform
				'skin_form_before'      => '<div class="panel panel-default skin-form">'
																			.'<div class="panel-heading">'
																				.'<h3 class="panel-title">$form_title$</h3>'
																			.'</div>'
																			.'<div class="panel-body">',
				'skin_form_after'       => '</div></div>',
				// Login
				'display_form_messages' => true,
				'form_title_login'      => T_('Log in to your account').'$form_links$',
				'form_class_login'      => 'wrap-form-login',
				'form_title_lostpass'   => get_request_title().'$form_links$',
				'form_class_lostpass'   => 'wrap-form-lostpass',
				'login_form_inskin'     => false,
				'login_page_before'     => '<div class="$form_class$">',
				'login_page_after'      => '</div>',
				'login_form_class'      => 'form-login',
				'display_reg_link'      => true,
				'abort_link_position'   => 'form_title',
				'abort_link_text'       => '<button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>',
			) );
		// Note: you can customize any of the sub templates included here by
		// copying the matching php file into your skin directory.
		// ------------------------- END OF MAIN CONTENT TEMPLATE ---------------------------
	?>
	</div>
	<!-- End #main_area -->

	</div>
	<!-- End col-md-8 -->
	
	<?php
	if( $Skin->is_visible_container( 'sidebar' ) )
	{ // Display 'Sidebar' widget container
	?>
<!-- =================================== START OF SIDEBAR =================================== -->
	<?php
	if( $Skin->get_setting( 'layout' ) != 'single_column' )
	{
	?>
		<div id="main_sidebar" class="col-md-4"<?php echo ( $Skin->get_setting( 'layout' ) == 'left_sidebar' ? ' style="float:left;border-left:none;"' : '' ); ?>>
	<?php
		// ------------------------- "Sidebar" CONTAINER EMBEDDED HERE --------------------------
		// Display container contents:
		skin_container( NT_('Sidebar'), array(
				// The following (optional) params will be used as defaults for widgets included in this container:
				// This will enclose each widget in a block:
				'block_start' => '<div class="panel panel-default widget $wi_class$">',
				'block_end' => '</div>',
				// This will enclose the title of each widget:
				'block_title_start' => '<div class="panel-heading"><h4 class="panel-title">',
				'block_title_end' => '</h4><div class="clearfix"></div></div>',
				// This will enclose the body of each widget:
				'block_body_start' => '<div class="panel-body">',
				'block_body_end' => '</div>',
				// If a widget displays a list, this will enclose that list:
				'list_start' => '<ul>',
				'list_end' => '</ul>',
				// This will enclose each item in a list:
				'item_start' => '<li>',
				'item_end' => '</li>',
				// This will enclose sub-lists in a list:
				'group_start' => '<ul>',
				'group_end' => '</ul>',
				// This will enclose (foot)notes:
				'notes_start' => '<div class="notes">',
				'notes_end' => '</div>',
				// Widget 'Search form':
				'search_class'         => 'compact_search_form',
				'search_input_before'  => '<div class="input-group">',
				'search_input_after'   => '',
				'search_submit_before' => '<span class="input-group-btn">',
				'search_submit_after'  => '</span></div>',
			) );
		// ----------------------------- END OF "Sidebar" CONTAINER -----------------------------
	?>
		</div>
	<?php } } ?>
	<!-- </div> -->

</div>
<!-- End Container Main Area -->

<?php
if( $Skin->is_visible_container( 'footer' ) )
{ // Display 'Footer' widget container
?>
<!-- =================================== START OF FOOTER =================================== -->
<footer id="footer">
	<div class="container">
		<!-- <div class="row"> -->
				<?php
					// Display container and contents:
					skin_container( NT_("Sidebar 2"), array(
							'block_start' => '<div class="col-md-3 evo_widget widget $wi_class$">',
							'block_end'  => '</div>',
							'item_start' => '<li>',
							'item_end' => '</li>',
							// The following params will be used as defaults for widgets included in this container:
						) );
					// Note: Double quotes have been used around "Footer" only for test purposes.
				?>
			<div class="clearfix"></div>

		<!-- </div> -->
		<!-- End row Footer -->
	</div>
	<!-- End container footer -->

	<div class="footer_copyright">
		<div class="container">

			<div class="col-md-12 center">
				<?php
					// Display container and contents:
					skin_container( NT_("Footer"), array(
							// The following params will be used as defaults for widgets included in this container:
						) );
					// Note: Double quotes have been used around "Footer" only for test purposes.
				?>
			</div>

			<p class="copyright">
				<?php
					// Display footer text (text can be edited in Blog Settings):
					$Blog->footer_text( array(
							'before'      => '',
							'after'       => '',
						) );

				// TODO: dh> provide a default class for pTyp, too. Should be a name and not the ityp_ID though..?!
				?>
			</p>
			<div class="footer_menu_copyright">
				<?php
					// Display a link to contact the owner of this blog (if owner accepts messages):
					$Blog->contact_link( array(
							'before'      => '',
							'after'       => ' &bull; ',
							'text'   => T_('Contact'),
							'title'  => T_('Send a message to the owner of this blog...'),
						) );
					// Display a link to help page:
					$Blog->help_link( array(
							'before'      => ' ',
							'after'       => ' ',
							'text'        => T_('Help'),
						) );
				?>

				<?php
					// Display additional credits:
					// If you can add your own credits without removing the defaults, you'll be very cool :))
					// Please leave this at the bottom of the page to make sure your blog gets listed on b2evolution.net
					credits( array(
							'list_start'  => ' ',
							'list_end'    => ' ',
							'separator'   => ' ',
							'item_start'  => ' ',
							'item_end'    => ' ',
						) );
				?>
			</div>

			<div class="clearfix"></div>

		</div>
		<!-- end container powered_by -->
	</div>
	<!-- End footer_copyright -->

</footer>
<!-- end Footer -->
<?php } ?>

	<?php
		// Please help us promote b2evolution and leave this logo on your blog:
		powered_by( array(
				'block_start' => '<div class="powered_by">',
				'block_end'   => '</div>',
				// Check /rsc/img/ for other possible images -- Don't forget to change or remove width & height too
				'img_url'     => '$rsc$img/powered-by-b2evolution-120t.gif',
				'img_width'   => 120,
				'img_height'  => 32,
			) );
	?>

	</div>
	<!-- End Row Body -->
</div>
<!-- End Container fluid-->

<!-- JS Include -->
<script src="js/main.js"></script>

<?php
// ---------------------------- SITE FOOTER INCLUDED HERE ----------------------------
// If site footers are enabled, they will be included here:
siteskin_include( '_site_body_footer.inc.php' );
// ------------------------------- END OF SITE FOOTER --------------------------------


// ------------------------- HTML FOOTER INCLUDED HERE --------------------------
skin_include( '_html_footer.inc.php' );
// Note: You can customize the default HTML footer by copying the
// _html_footer.inc.php file into the current skin folder.
// ------------------------------- END OF FOOTER --------------------------------
?>