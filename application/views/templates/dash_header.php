<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Language" content="en">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?= $title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
	<meta name="description" content="This is an example dashboard created using build-in elements and components.">
	<meta name="msapplication-tap-highlight" content="no">
	<!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
	<link href="<?= base_url('assets/') ?>main.css" rel="stylesheet">
	<script type="text/javascript" src="<?= base_url('assets/'); ?>assets/scripts/jquery-3.4.1.min.js"></script>
</head>

<body>
	<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
		<div class="app-header header-shadow">
			<div class="app-header__logo">
				<div class="logo-src"></div>
				<div class="header__pane ml-auto">
					<div>
						<button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</button>
					</div>
				</div>
			</div>
			<div class="app-header__mobile-menu">
				<div>
					<button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>
			</div>
			<div class="app-header__menu">
				<span>
					<button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
						<span class="btn-icon-wrapper">
							<i class="fa fa-ellipsis-v fa-w-6"></i>
						</span>
					</button>
				</span>
			</div>
			<div class="app-header__content">
				<div class="app-header-left">
					<div class="search-wrapper">
						<div class="input-holder">
							<input type="text" class="search-input" placeholder="Type to search">
							<button class="search-icon"><span></span></button>
						</div>
						<button class="close"></button>
					</div>
				</div>
				<div class="app-header-right">
					<div class="header-btn-lg pr-0">
						<div class="widget-content p-0">
							<div class="widget-content-wrapper">
								<div class="widget-content-left">
									<div class="btn-group">
										<a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
											<img width="42" class="rounded-circle" src="<?= base_url('assets/') ?>assets/images/avatars/1.jpg" alt="">
											<i class="fa fa-angle-down ml-2 opacity-8"></i>
										</a>
										<div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">
											<div class="dropdown-menu-header">
												<div class="dropdown-menu-header-inner bg-info">
													<div class="menu-header-image opacity-2" style="background-image: url('assets/images/dropdown-header/city3.jpg');">
													</div>
													<div class="menu-header-content text-left">
														<div class="widget-content p-0">
															<div class="widget-content-wrapper">
																<div class="widget-content-left mr-3">
																	<img width="42" class="rounded-circle" src="<?= base_url('assets/') ?>assets/images/avatars/1.jpg" alt="">
																</div>
																<div class="widget-content-left">
																	<div class="widget-heading">
																		<?= $level == 1337 ? 'Administrator' : $user['nama']; ?>
																	</div>
																	<div class="widget-subheading opacity-8">
																		<?= $user['ket_level']; ?>
																	</div>
																</div>
																<div class="widget-content-right mr-2">
																	<button type="button" class="btn-pill btn-shadow btn-shine btn btn-focus" data-toggle="modal" data-target="#logoutModal">Logout
																	</button>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="scroll-area-xs" style="height: 150px;">
												<div class="scrollbar-container ps">
													<ul class="nav flex-column">
														<li class="nav-item-header nav-item">Activity
														</li>
														<li class="nav-item">
															<a href="javascript:void(0);" class="nav-link">Chat
																<div class="ml-auto badge badge-pill badge-info">8
																</div>
															</a>
														</li>

														<li class="nav-item">
															<a href="javascript:void(0);" class="nav-link">Settings
																<div class="ml-auto badge badge-success">New
																</div>
															</a>
														</li>
														<li class="nav-item">
															<a href="javascript:void(0);" class="nav-link">Messages
																<div class="ml-auto badge badge-warning">512
																</div>
															</a>
														</li>
													</ul>
												</div>
											</div>
											<ul class="nav flex-column">
												<li class="nav-item-divider mb-0 nav-item"></li>
											</ul>
											<div class="grid-menu grid-menu-2col">
												<div class="no-gutters row">
													<div class="col-sm-6">
														<button class="btn-icon-vertical btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-warning">
															<i class="pe-7s-chat icon-gradient bg-amy-crisp btn-icon-wrapper mb-2"></i>
															Message Inbox
														</button>
													</div>
													<div class="col-sm-6">
														<button class="btn-icon-vertical btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-danger">
															<i class="pe-7s-ticket icon-gradient bg-love-kiss btn-icon-wrapper mb-2"></i>
															<b>Support Tickets</b>
														</button>
													</div>
												</div>
											</div>
											<ul class="nav flex-column">
												<li class="nav-item-divider nav-item">
												</li>
												<li class="nav-item-btn text-center nav-item">
													<button class="btn-wide btn btn-primary btn-sm">
														Open Messages
													</button>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="widget-content-left  ml-3 header-user-info">
									<div class="widget-heading">
										<?= $level == 1337 ? 'Admin' : $user['nama']; ?>
									</div>
									<div class="widget-subheading">
										<?= $user['ket_level']; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="ui-theme-settings">
			<button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">
				<i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
			</button>
			<div class="theme-settings__inner">
				<div class="scrollbar-container">
					<div class="theme-settings__options-wrapper">
						<h3 class="themeoptions-heading">Layout Options
						</h3>
						<div class="p-3">
							<ul class="list-group">
								<li class="list-group-item">
									<div class="widget-content p-0">
										<div class="widget-content-wrapper">
											<div class="widget-content-left mr-3">
												<div class="switch has-switch switch-container-class" data-class="fixed-header">
													<div class="switch-animate switch-on">
														<input type="checkbox" checked data-toggle="toggle" data-onstyle="success">
													</div>
												</div>
											</div>
											<div class="widget-content-left">
												<div class="widget-heading">Fixed Header
												</div>
												<div class="widget-subheading">Makes the header top fixed, always
													visible!
												</div>
											</div>
										</div>
									</div>
								</li>
								<li class="list-group-item">
									<div class="widget-content p-0">
										<div class="widget-content-wrapper">
											<div class="widget-content-left mr-3">
												<div class="switch has-switch switch-container-class" data-class="fixed-sidebar">
													<div class="switch-animate switch-on">
														<input type="checkbox" checked data-toggle="toggle" data-onstyle="success">
													</div>
												</div>
											</div>
											<div class="widget-content-left">
												<div class="widget-heading">Fixed Sidebar
												</div>
												<div class="widget-subheading">Makes the sidebar left fixed, always
													visible!
												</div>
											</div>
										</div>
									</div>
								</li>
								<li class="list-group-item">
									<div class="widget-content p-0">
										<div class="widget-content-wrapper">
											<div class="widget-content-left mr-3">
												<div class="switch has-switch switch-container-class" data-class="fixed-footer">
													<div class="switch-animate switch-off">
														<input type="checkbox" data-toggle="toggle" data-onstyle="success">
													</div>
												</div>
											</div>
											<div class="widget-content-left">
												<div class="widget-heading">Fixed Footer
												</div>
												<div class="widget-subheading">Makes the app footer bottom fixed, always
													visible!
												</div>
											</div>
										</div>
									</div>
								</li>
							</ul>
						</div>
						<h3 class="themeoptions-heading">
							<div>
								Header Options
							</div>
							<button type="button" class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-header-cs-class" data-class="">
								Restore Default
							</button>
						</h3>
						<div class="p-3">
							<ul class="list-group">
								<li class="list-group-item">
									<h5 class="pb-2">Choose Color Scheme
									</h5>
									<div class="theme-settings-swatches">
										<div class="swatch-holder bg-primary switch-header-cs-class" data-class="bg-primary header-text-light">
										</div>
										<div class="swatch-holder bg-secondary switch-header-cs-class" data-class="bg-secondary header-text-light">
										</div>
										<div class="swatch-holder bg-success switch-header-cs-class" data-class="bg-success header-text-light">
										</div>
										<div class="swatch-holder bg-info switch-header-cs-class" data-class="bg-info header-text-light">
										</div>
										<div class="swatch-holder bg-warning switch-header-cs-class" data-class="bg-warning header-text-dark">
										</div>
										<div class="swatch-holder bg-danger switch-header-cs-class" data-class="bg-danger header-text-light">
										</div>
										<div class="swatch-holder bg-light switch-header-cs-class" data-class="bg-light header-text-dark">
										</div>
										<div class="swatch-holder bg-dark switch-header-cs-class" data-class="bg-dark header-text-light">
										</div>
										<div class="swatch-holder bg-focus switch-header-cs-class" data-class="bg-focus header-text-light">
										</div>
										<div class="swatch-holder bg-alternate switch-header-cs-class" data-class="bg-alternate header-text-light">
										</div>
										<div class="divider">
										</div>
										<div class="swatch-holder bg-vicious-stance switch-header-cs-class" data-class="bg-vicious-stance header-text-light">
										</div>
										<div class="swatch-holder bg-midnight-bloom switch-header-cs-class" data-class="bg-midnight-bloom header-text-light">
										</div>
										<div class="swatch-holder bg-night-sky switch-header-cs-class" data-class="bg-night-sky header-text-light">
										</div>
										<div class="swatch-holder bg-slick-carbon switch-header-cs-class" data-class="bg-slick-carbon header-text-light">
										</div>
										<div class="swatch-holder bg-asteroid switch-header-cs-class" data-class="bg-asteroid header-text-light">
										</div>
										<div class="swatch-holder bg-royal switch-header-cs-class" data-class="bg-royal header-text-light">
										</div>
										<div class="swatch-holder bg-warm-flame switch-header-cs-class" data-class="bg-warm-flame header-text-dark">
										</div>
										<div class="swatch-holder bg-night-fade switch-header-cs-class" data-class="bg-night-fade header-text-dark">
										</div>
										<div class="swatch-holder bg-sunny-morning switch-header-cs-class" data-class="bg-sunny-morning header-text-dark">
										</div>
										<div class="swatch-holder bg-tempting-azure switch-header-cs-class" data-class="bg-tempting-azure header-text-dark">
										</div>
										<div class="swatch-holder bg-amy-crisp switch-header-cs-class" data-class="bg-amy-crisp header-text-dark">
										</div>
										<div class="swatch-holder bg-heavy-rain switch-header-cs-class" data-class="bg-heavy-rain header-text-dark">
										</div>
										<div class="swatch-holder bg-mean-fruit switch-header-cs-class" data-class="bg-mean-fruit header-text-dark">
										</div>
										<div class="swatch-holder bg-malibu-beach switch-header-cs-class" data-class="bg-malibu-beach header-text-light">
										</div>
										<div class="swatch-holder bg-deep-blue switch-header-cs-class" data-class="bg-deep-blue header-text-dark">
										</div>
										<div class="swatch-holder bg-ripe-malin switch-header-cs-class" data-class="bg-ripe-malin header-text-light">
										</div>
										<div class="swatch-holder bg-arielle-smile switch-header-cs-class" data-class="bg-arielle-smile header-text-light">
										</div>
										<div class="swatch-holder bg-plum-plate switch-header-cs-class" data-class="bg-plum-plate header-text-light">
										</div>
										<div class="swatch-holder bg-happy-fisher switch-header-cs-class" data-class="bg-happy-fisher header-text-dark">
										</div>
										<div class="swatch-holder bg-happy-itmeo switch-header-cs-class" data-class="bg-happy-itmeo header-text-light">
										</div>
										<div class="swatch-holder bg-mixed-hopes switch-header-cs-class" data-class="bg-mixed-hopes header-text-light">
										</div>
										<div class="swatch-holder bg-strong-bliss switch-header-cs-class" data-class="bg-strong-bliss header-text-light">
										</div>
										<div class="swatch-holder bg-grow-early switch-header-cs-class" data-class="bg-grow-early header-text-light">
										</div>
										<div class="swatch-holder bg-love-kiss switch-header-cs-class" data-class="bg-love-kiss header-text-light">
										</div>
										<div class="swatch-holder bg-premium-dark switch-header-cs-class" data-class="bg-premium-dark header-text-light">
										</div>
										<div class="swatch-holder bg-happy-green switch-header-cs-class" data-class="bg-happy-green header-text-light">
										</div>
									</div>
								</li>
							</ul>
						</div>
						<h3 class="themeoptions-heading">
							<div>Sidebar Options</div>
							<button type="button" class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-sidebar-cs-class" data-class="">
								Restore Default
							</button>
						</h3>
						<div class="p-3">
							<ul class="list-group">
								<li class="list-group-item">
									<h5 class="pb-2">Choose Color Scheme
									</h5>
									<div class="theme-settings-swatches">
										<div class="swatch-holder bg-primary switch-sidebar-cs-class" data-class="bg-primary sidebar-text-light">
										</div>
										<div class="swatch-holder bg-secondary switch-sidebar-cs-class" data-class="bg-secondary sidebar-text-light">
										</div>
										<div class="swatch-holder bg-success switch-sidebar-cs-class" data-class="bg-success sidebar-text-dark">
										</div>
										<div class="swatch-holder bg-info switch-sidebar-cs-class" data-class="bg-info sidebar-text-dark">
										</div>
										<div class="swatch-holder bg-warning switch-sidebar-cs-class" data-class="bg-warning sidebar-text-dark">
										</div>
										<div class="swatch-holder bg-danger switch-sidebar-cs-class" data-class="bg-danger sidebar-text-light">
										</div>
										<div class="swatch-holder bg-light switch-sidebar-cs-class" data-class="bg-light sidebar-text-dark">
										</div>
										<div class="swatch-holder bg-dark switch-sidebar-cs-class" data-class="bg-dark sidebar-text-light">
										</div>
										<div class="swatch-holder bg-focus switch-sidebar-cs-class" data-class="bg-focus sidebar-text-light">
										</div>
										<div class="swatch-holder bg-alternate switch-sidebar-cs-class" data-class="bg-alternate sidebar-text-light">
										</div>
										<div class="divider">
										</div>
										<div class="swatch-holder bg-vicious-stance switch-sidebar-cs-class" data-class="bg-vicious-stance sidebar-text-light">
										</div>
										<div class="swatch-holder bg-midnight-bloom switch-sidebar-cs-class" data-class="bg-midnight-bloom sidebar-text-light">
										</div>
										<div class="swatch-holder bg-night-sky switch-sidebar-cs-class" data-class="bg-night-sky sidebar-text-light">
										</div>
										<div class="swatch-holder bg-slick-carbon switch-sidebar-cs-class" data-class="bg-slick-carbon sidebar-text-light">
										</div>
										<div class="swatch-holder bg-asteroid switch-sidebar-cs-class" data-class="bg-asteroid sidebar-text-light">
										</div>
										<div class="swatch-holder bg-royal switch-sidebar-cs-class" data-class="bg-royal sidebar-text-light">
										</div>
										<div class="swatch-holder bg-warm-flame switch-sidebar-cs-class" data-class="bg-warm-flame sidebar-text-dark">
										</div>
										<div class="swatch-holder bg-night-fade switch-sidebar-cs-class" data-class="bg-night-fade sidebar-text-dark">
										</div>
										<div class="swatch-holder bg-sunny-morning switch-sidebar-cs-class" data-class="bg-sunny-morning sidebar-text-dark">
										</div>
										<div class="swatch-holder bg-tempting-azure switch-sidebar-cs-class" data-class="bg-tempting-azure sidebar-text-dark">
										</div>
										<div class="swatch-holder bg-amy-crisp switch-sidebar-cs-class" data-class="bg-amy-crisp sidebar-text-dark">
										</div>
										<div class="swatch-holder bg-heavy-rain switch-sidebar-cs-class" data-class="bg-heavy-rain sidebar-text-dark">
										</div>
										<div class="swatch-holder bg-mean-fruit switch-sidebar-cs-class" data-class="bg-mean-fruit sidebar-text-dark">
										</div>
										<div class="swatch-holder bg-malibu-beach switch-sidebar-cs-class" data-class="bg-malibu-beach sidebar-text-light">
										</div>
										<div class="swatch-holder bg-deep-blue switch-sidebar-cs-class" data-class="bg-deep-blue sidebar-text-dark">
										</div>
										<div class="swatch-holder bg-ripe-malin switch-sidebar-cs-class" data-class="bg-ripe-malin sidebar-text-light">
										</div>
										<div class="swatch-holder bg-arielle-smile switch-sidebar-cs-class" data-class="bg-arielle-smile sidebar-text-light">
										</div>
										<div class="swatch-holder bg-plum-plate switch-sidebar-cs-class" data-class="bg-plum-plate sidebar-text-light">
										</div>
										<div class="swatch-holder bg-happy-fisher switch-sidebar-cs-class" data-class="bg-happy-fisher sidebar-text-dark">
										</div>
										<div class="swatch-holder bg-happy-itmeo switch-sidebar-cs-class" data-class="bg-happy-itmeo sidebar-text-light">
										</div>
										<div class="swatch-holder bg-mixed-hopes switch-sidebar-cs-class" data-class="bg-mixed-hopes sidebar-text-light">
										</div>
										<div class="swatch-holder bg-strong-bliss switch-sidebar-cs-class" data-class="bg-strong-bliss sidebar-text-light">
										</div>
										<div class="swatch-holder bg-grow-early switch-sidebar-cs-class" data-class="bg-grow-early sidebar-text-light">
										</div>
										<div class="swatch-holder bg-love-kiss switch-sidebar-cs-class" data-class="bg-love-kiss sidebar-text-light">
										</div>
										<div class="swatch-holder bg-premium-dark switch-sidebar-cs-class" data-class="bg-premium-dark sidebar-text-light">
										</div>
										<div class="swatch-holder bg-happy-green switch-sidebar-cs-class" data-class="bg-happy-green sidebar-text-light">
										</div>
									</div>
								</li>
								<li class="list-group-item">
									<h5 class="pb-2">Page Section Tabs
									</h5>
									<div class="theme-settings-swatches">
										<div role="group" class="mt-2 btn-group">
											<button type="button" class="btn-wide btn-shadow btn-primary btn btn-secondary switch-theme-class" data-class="body-tabs-line">
												Line
											</button>
											<button type="button" class="btn-wide btn-shadow btn-primary active btn btn-secondary switch-theme-class" data-class="body-tabs-shadow">
												Shadow
											</button>
										</div>
									</div>
								</li>
								<li class="list-group-item">
									<h5 class="pb-2">Light Color Schemes
									</h5>
									<div class="theme-settings-swatches">
										<div role="group" class="mt-2 btn-group">
											<button type="button" class="btn-wide btn-shadow btn-primary active btn btn-secondary switch-theme-class" data-class="app-theme-white">
												White Theme
											</button>
											<button type="button" class="btn-wide btn-shadow btn-primary btn btn-secondary switch-theme-class" data-class="app-theme-gray">
												Gray Theme
											</button>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="app-main">
			<div class="app-sidebar sidebar-shadow">
				<div class="app-header__logo">
					<div class="logo-src"></div>
					<div class="header__pane ml-auto">
						<div>
							<button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
								<span class="hamburger-box">
									<span class="hamburger-inner"></span>
								</span>
							</button>
						</div>
					</div>
				</div>
				<div class="app-header__mobile-menu">
					<div>
						<button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</button>
					</div>
				</div>
				<div class="app-header__menu">
					<span>
						<button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
							<span class="btn-icon-wrapper">
								<i class="fa fa-ellipsis-v fa-w-6"></i>
							</span>
						</button>
					</span>
				</div>
				<div class="scrollbar-sidebar">
					<div class="app-sidebar__inner">
						<ul class="vertical-nav-menu">
							<li class="app-sidebar__heading">Menu</li>
							<li>
								<a href="<?= base_url('.') ?>" <?= $main['menu'] == 'Dashboard' ? 'class="mm-active"' : ''; ?>>
									<i class="metismenu-icon pe-7s-rocket">
									</i>Dashboard
								</a>
							</li>
							<?php if ($level == 100) { ?>
								<li>
									<a href="<?= base_url('user/profile/view') ?>" <?= $main['menu'] == 'View Pendaftaran' ? 'class="mm-active"' : ''; ?>>
										<i class="metismenu-icon pe-7s-user">
										</i>Data Profile
									</a>
								</li>
								<li>
									<a href="<?= base_url('user/berkas/view') ?>" <?= $main['menu'] == 'berkas' ? 'class="mm-active"' : ''; ?>>
										<i class="metismenu-icon pe-7s-user">
										</i>Data Berkas
									</a>
								</li>
								<li>
									<a href="<?= base_url('user/hobi/view') ?>" <?= $main['menu'] == 'hobi' ? 'class="mm-active"' : ''; ?>>
										<i class="metismenu-icon pe-7s-user">
										</i>Data Hobi
									</a>
								</li>
								<li>
									<a href="<?= base_url('user/orangtua/view') ?>" <?= $main['menu'] == 'orangtua' ? 'class="mm-active"' : ''; ?>>
										<i class="metismenu-icon pe-7s-user">
										</i>Data Orang Tua
									</a>
								</li>
								<li>
									<a href="<?= base_url('user/organisasi/view') ?>" <?= $main['menu'] == 'organisasi' ? 'class="mm-active"' : ''; ?>>
										<i class="metismenu-icon pe-7s-user">
										</i>Data Organisasi
									</a>
								</li>
								<li>
									<a href="<?= base_url('user/prestasi/view') ?>" <?= $main['menu'] == 'prestasi' ? 'class="mm-active"' : ''; ?>>
										<i class="metismenu-icon pe-7s-user">
										</i>Data Prestasi
									</a>
								</li>
								<li>
									<a href="<?= base_url('user/pendidikan/view') ?>" <?= $main['menu'] == 'pendidikan' ? 'class="mm-active"' : ''; ?>>
										<i class="metismenu-icon pe-7s-user">
										</i>Data Riwayat Pendidikan
									</a>
								</li>
								<li>
									<a href="<?= base_url('user/riwayatsakit/view') ?>" <?= $main['menu'] == 'riwayatsakit' ? 'class="mm-active"' : ''; ?>>
										<i class="metismenu-icon pe-7s-user">
										</i>Data Riwayat Sakit
									</a>
								</li>
							<?php } ?>
							<li>
								<a href="<?= base_url(($level == 1337 ? 'admin' : ($level == 999 ? 'musahil' : 'user')) . '/password') ?>" <?= $main['menu'] == 'Password' ? 'class="mm-active"' : ''; ?>>
									<i class="metismenu-icon pe-7s-lock">
									</i>Change Password
								</a>
							</li>
							<?php if ($level == 999 || $level == 1337) { ?>
								<li class="app-sidebar__heading">Manage Data</li>
							<?php } ?>
							<?php if ($level == 1337) { ?>
								<li>
									<a href="<?= base_url('admin/manage/penghuni') ?>" <?= $main['menu'] == 'Penghuni' ? 'class="mm-active"' : ''; ?>>
										<i class="metismenu-icon pe-7s-users">
										</i>Data Penghuni
									</a>
								</li>
								<li>
									<a href="<?= base_url('admin/manage/musahil') ?>" <?= $main['menu'] == 'Musahil' ? 'class="mm-active"' : ''; ?>>
										<i class="metismenu-icon pe-7s-users">
										</i>Data Musahil
									</a>
								</li>
								<li>
									<a href="<?= base_url('admin/manage/admin') ?>" <?= $main['menu'] == 'Admin' ? 'class="mm-active"' : ''; ?>>
										<i class="metismenu-icon pe-7s-users">
										</i>Data Admin
									</a>
								</li>
								<li>
									<a href="<?= base_url('admin/manage/kamar') ?>" <?= $main['menu'] == 'Kamar' ? 'class="mm-active"' : ''; ?>>
										<i class="metismenu-icon pe-7s-users">
										</i>Data Kamar
									</a>
								</li>
							<?php } ?>
							<?php if ($level == 999 || $level == 1337) { ?>
								<li>
									<a href="<?= base_url(($level == 1337 ? 'admin' : 'musahil') . '/manage/penghuni/kamar') ?>" <?= $main['menu'] == 'Kamar Penghuni' ? 'class="mm-active"' : ''; ?>>
										<i class="metismenu-icon pe-7s-users">
										</i>Data Kamar Penghuni
									</a>
								</li>
								<li class="app-sidebar__heading">Pendaftaran</li>
								<li>
									<a href="<?= base_url(($level == 1337 ? 'admin' : 'musahil') . '/manage_token/view') ?>" <?= $main['menu'] == 'Token' ? 'class="mm-active"' : ''; ?>>
										<i class="metismenu-icon pe-7s-users">
										</i>Get Token Daftar
									</a>
								</li>
								<li>
									<a href="<?= base_url(($level == 1337 ? 'admin' : 'musahil') . '/manage/berkas') ?>" <?= $main['menu'] == 'Berkas' ? 'class="mm-active"' : ''; ?>>
										<i class="metismenu-icon pe-7s-users">
										</i>Validasi Berkas
									</a>
								</li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
			<div class="app-main__outer">