<?php
/**
 * ActionSkills Dashboard panel content.
 *
 * Each tab is an entry in $tabs: id => label. The matching content goes in a
 * <div role="tabpanel"> with id "actionskills-tab-{id}" below.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tabs = array(
	'update'      => 'Update',
	'overview'    => 'Overview',
	'help'        => 'Help',
	'plugins'     => 'Plugins',
	'updates'     => 'Updates',
	'security'    => 'Security',
	'performance' => 'Performance',
	'backups'     => 'Backups',
	'a11y'        => 'A11y',
);
$first = array_key_first( $tabs );
?>
<div class="actionskills-host-panel">

	<header class="actionskills-host-header">
		<img src="<?php echo esc_url( ACTIONSKILLS_HOST_URL . 'assets/actionskills.png' ); ?>" alt="ActionSkills" width="221" height="43">
		<p>Managed and optimised WordPress</p>
	</header>

	<div class="actionskills-host-tabs" role="tablist" aria-label="ActionSkills">
		<?php foreach ( $tabs as $id => $label ) : ?>
			<button type="button" role="tab" id="actionskills-tabbtn-<?php echo esc_attr( $id ); ?>" aria-controls="actionskills-tab-<?php echo esc_attr( $id ); ?>" aria-selected="<?php echo $id === $first ? 'true' : 'false'; ?>"<?php echo $id === $first ? '' : ' tabindex="-1"'; ?>><?php echo esc_html( $label ); ?></button>
		<?php endforeach; ?>
	</div>

	<div class="actionskills-host-body">

		<div role="tabpanel" id="actionskills-tab-update" aria-labelledby="actionskills-tabbtn-update">
			<h2>If your website is built with Divi, Divi is changing</h2>
			<p>The company behind it has released Divi 5, a complete rebuild, and the version you're on (Divi 4) will stop receiving updates after <strong>February 2027</strong>. Before then, your site will need to move to one of two options.</p>

			<h3>Option 1: Upgrade to Divi 5</h3>
			<p>Best if you're happy to leave your website largely as it is for now. I have a lifetime Divi licence, so I can upgrade yours at no licence cost.</p>

			<h3>Option 2: Move to the WordPress block editor</h3>
			<p>Best if you're planning significant changes to your website soon. The editor built into WordPress has improved a lot. It's fast, accessible, free and open source, and it means you're no longer dependent on a third-party company setting the rules. This is now how I build all new websites.</p>

			<p>Either way, there will be a new way of editing your content to learn.</p>

			<h3>What to do next</h3>
			<p>There's no rush today, but we need this sorted by <strong>late February 2027</strong>.</p>

			<h3>More information</h3>
			<ul>
				<li><a href="https://www.elegantthemes.com/divi-5/" target="_blank" rel="noopener">Divi 5</a></li>
				<li><a href="https://help.elegantthemes.com/en/articles/12767407-how-to-safely-migrate-from-divi-4-to-divi-5" target="_blank" rel="noopener">Migrating from Divi 4 to Divi 5</a></li>
				<li><a href="https://wordpress.org/documentation/article/wordpress-block-editor/" target="_blank" rel="noopener">WordPress block editor</a></li>
			</ul>
		</div>

		<div role="tabpanel" id="actionskills-tab-overview" aria-labelledby="actionskills-tabbtn-overview" hidden>
			<h2>Care plans</h2>
			<p>All websites on our server must be on a managed care plan to ensure security and performance of the whole hosting system. All sites are currently on a care plan and we are asking for sites that can afford to pay for these services to do so.</p>
			<ul>
				<li>First Nations and direct action campaigns: FREE</li>
				<li>Small campaign: Pay what you can afford</li>
				<li>Campaign that has an employee or equivalent turnover: NFP rates ($40 PM)</li>
				<li><a href="https://actionskills.co/careplan/" target="_blank" rel="noopener">More information on care plans including technical information</a></li>
				<li><a href="https://actionskills.co/careplan-order/" target="_blank" rel="noopener">Sign up here</a></li>
			</ul>

			<h2>System outline</h2>
			<p>This website is optimised on many levels. If you plan on installing any plugins or doing development, please review our system outline to understand what is set up and the rules we have in place.</p>
			<p>This system is "use at your own risk". If your website is "business critical", we recommend moving to supported hosting.</p>
		</div>

		<div role="tabpanel" id="actionskills-tab-help" aria-labelledby="actionskills-tabbtn-help" hidden>
			<h2>Help</h2>
			<p>We are unable to provide any official support. We spend a lot of pro bono time managing this system and do not have the resources for personal support. We would love it if you helped to organise a support collective.</p>
			<ul>
				<li><a href="https://easywpguide.com/wordpress-manual/" target="_blank" rel="noopener">Easy WP Guide WordPress Manual</a></li>
				<li><a href="https://www.elegantthemes.com/documentation/divi/" target="_blank" rel="noopener">The official Divi documentation</a></li>
				<li><a href="https://actionskills.co/webinars/wordpress-fundamentals/" target="_blank" rel="noopener">WordPress Fundamentals webinar</a></li>
				<li><a href="https://actionskills.co/webinars/using-divi/" target="_blank" rel="noopener">Using Divi – drag and drop page builder webinar</a></li>
				<li><a href="https://actionskills.co/webinars/" target="_blank" rel="noopener">Digital Strategy webinars</a></li>
			</ul>
		</div>

		<div role="tabpanel" id="actionskills-tab-plugins" aria-labelledby="actionskills-tabbtn-plugins" hidden>
			<h2>Recommended plugins</h2>
			<p>Use as few plugins as possible. Each plugin can introduce performance and security issues.</p>
			<ul>
				<li><a href="https://actionskills.co/resource/wordpress-plugins-themes/" target="_blank" rel="noopener">See our list of favourite WordPress plugins and themes</a></li>
				<li>If you want to use a paid plugin on our list, let us know and you can use our licence.</li>
			</ul>

			<h2>Banned plugins</h2>
			<ul>
				<li>Mailing list plugins such as WP Mailing List.</li>
				<li>Please use our recommended backup tool. See the Backups tab for more info.</li>
				<li>Please use our recommended cache tool. It is optimised for this specific server setup.</li>
				<li>Do not install security plugins. We have the system secured and installing additional software may cause unknown conflicts and security holes.</li>
				<li>Please do not install anything that scans the file directory, as this is processor heavy and will slow our systems. This includes security scanners, virus/malware checkers, link checkers etc. Refer to the Security tab for more info on security scanning.
					If you want to do a link check, use an external link checker:
					<ul>
						<li><a href="https://www.brokenlinkcheck.com/" target="_blank" rel="noopener">Online Broken Link Checker</a></li>
						<li><a href="https://validator.w3.org/checklink" target="_blank" rel="noopener">W3C Link Checker</a></li>
					</ul>
				</li>
			</ul>
		</div>

		<div role="tabpanel" id="actionskills-tab-updates" aria-labelledby="actionskills-tabbtn-updates" hidden>
			<h2>Updates</h2>
			<p>ActionSkills manages the updating of the WordPress software, plugins and themes. If you are experiencing issues and there are updates available, go ahead and update the software.</p>
			<p>We usually do these updates on Mondays, sometimes more often if there are major updates.</p>
		</div>

		<div role="tabpanel" id="actionskills-tab-security" aria-labelledby="actionskills-tabbtn-security" hidden>
			<h2>Security</h2>
			<p>We use a custom configured <a href="https://wordpress.org/plugins/all-in-one-wp-security-and-firewall/" target="_blank" rel="noopener">All In One Security plugin</a>.</p>
			<p>Do not install security plugins. We have the system secured and installing additional software may cause unknown conflicts and security holes.</p>
			<ul>
				<li><a href="https://actionskills.co/resource/security/" target="_blank" rel="noopener">Review our security measures here</a></li>
				<li><a href="https://sitecheck.sucuri.net/" target="_blank" rel="noopener">Perform a malware scan</a></li>
				<li><a href="https://actionskills.co/links/" target="_blank" rel="noopener">Our collection of testing tools, including additional malware scanners</a></li>
			</ul>
		</div>

		<div role="tabpanel" id="actionskills-tab-performance" aria-labelledby="actionskills-tabbtn-performance" hidden>
			<h2>Performance</h2>
			<p>We have done a lot of work customising this WordPress install to be very fast. This includes server configuration and WordPress optimisation.</p>
			<p>Here are the Lighthouse test results of our development website: <a href="https://master3.actionskills.dev/" target="_blank" rel="noopener">master3.actionskills.dev</a></p>
		</div>

		<div role="tabpanel" id="actionskills-tab-backups" aria-labelledby="actionskills-tabbtn-backups" hidden>
			<h2>Manual backups</h2>
			<ul>
				<li>Manual backups use the UpdraftPlus Premium plugin.</li>
				<li>Do not set up automated backups with UpdraftPlus, as this will slow your website and waste space. We have plenty of automated backups via cPanel.</li>
				<li>Run a manual backup before and/or after major upgrades or changes to the site, or if you want to download your own backup copy.</li>
				<li>These backups can also be sent to our separate AWS S3 backup account.</li>
			</ul>

			<h2>Automated backups</h2>
			<ul>
				<li>All of our websites and cPanel hosting (including your WordPress) are backed up hourly off-site.</li>
				<li>All WordPress sites are also backed up monthly to our ManageWP account.</li>
			</ul>
		</div>

		<div role="tabpanel" id="actionskills-tab-a11y" aria-labelledby="actionskills-tabbtn-a11y" hidden>
			<h2>Accessibility</h2>
			<p>Our default Divi setup is optimised for accessibility, passing the Lighthouse test with 100% and 0 errors on the WAVE tool.</p>
			<p><a href="https://wave.webaim.org/" target="_blank" rel="noopener">Test your content with the WAVE Web Accessibility Evaluation Tool</a></p>
		</div>

	</div>
</div>
