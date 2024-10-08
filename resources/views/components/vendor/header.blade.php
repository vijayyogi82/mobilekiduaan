<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
<style>
	.pb-120 {
		padding-bottom: 120px;
	}

	.pt-60 {
		padding-top: 60px;
	}

	.p-relative {
		position: relative;
	}

	.profile__tab .tp-tab-menu {
		position: relative;
	}

	.profile__tab .nav-tabs {
		background-color: var(--tp-common-white);
		border: 0;
		box-shadow: 0 30px 50px rgba(5, 47, 40, .12);
		margin: 0;
		padding: 0;
	}

	.profile__tab .nav-tabs .nav-link.active {
		background-color: rgba(9, 137, 255, .06);
		color: var(--tp-theme-primary);
	}

	.profile__tab .nav-tabs .nav-link {
		background-color: var(--tp-common-white);
		border: 0;
		border-radius: 0;
		color: var(--tp-text-1);
		font-size: 15px;
		font-weight: 500;
		padding: 14px 30px;
		position: relative;
		text-align: left;
	}

	.profile__tab-content {
		box-shadow: 0 30px 50px rgba(5, 47, 40, .12);
		padding: 25px 30px 30px;
	}

	.nav-tabs {
		padding-bottom: 15px;
	}

	.nav-tabs .nav-item {
		flex: none;
	}

	.nav-tabs .nav-item .nav-link.active {
		background-color: #0c55aa;
		color: #fff;
	}

	.nav-tabs .nav-item .nav-link {
		background-color: #f8f8f8;
		border-radius: 0;
		color: #0c55aa;
		margin: unset;
		padding: 5px 10px;
		width: auto;
	}
</style>
<style>
   .submenu {
      display: none;
      list-style: none;
      padding-left: 20px;
   }
   .nav-link:hover + .submenu, .submenu:hover {
      display: block;
   }
</style>
<section class="profile__area pt-60 pb-120">
	<div class="container-fluid">
		<div class="profile__inner p-relative">
			<div class="row">
				<div class="col-xxl-4 col-lg-3">
					<div class="profile__tab me-40">
						<nav>
							<div class="nav nav-tabs tp-tab-menu flex-column" id="profile-tab" role="tablist">
								<a href="{{Route('vendor.dashboard')}}"
									class="nav-link {{ request()->is('vendor/dashboard') ? 'active' : '' }}"
									id="nav-profile-tab" role="tab" aria-controls="nav-profile" aria-selected="false">
									<span>
										<svg class="icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
											viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
											stroke-linecap="round" stroke-linejoin="round">
											<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
											<path d="M5 12l-2 0l9 -9l9 9l-2 0"></path>
											<path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
											<path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
										</svg>
									</span>
									Overview
								</a>
								<!-- <a href="" class="nav-link" id="nav-profile-tab" role="tab" aria-controls="nav-profile" aria-selected="false">
									<span>
										<svg class="icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
											<path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path>
										</svg>
									</span>
									Reviews
									</a> -->
											<!-- <a href="" class="nav-link" id="nav-profile-tab" role="tab" aria-controls="nav-profile" aria-selected="false">
									<span>
										<svg class="icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
											<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
											<path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path>
											<path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path>
											<path d="M3 6l0 13"></path>
											<path d="M12 6l0 13"></path>
											<path d="M21 6l0 13"></path>
										</svg>
									</span>
									Addresses
								</a> -->
								<a href="{{Route('vendor.account')}}"
									class="nav-link {{ request()->is('vendor/account') ? 'active' : '' }}"
									id="nav-profile-tab" role="tab" aria-controls="nav-profile" aria-selected="false">
									<span>
										<svg class="icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
											viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
											stroke-linecap="round" stroke-linejoin="round">
											<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
											<path
												d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z">
											</path>
											<path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
										</svg>
									</span>
									Account Settings
								</a>
								<!-- <a href="{{route('vendor.mobileIndex')}}"
									class="nav-link {{ request()->is('vendor/mobile-index') ? 'active' : '' }}"
									id="nav-profile-tab " role="tab" aria-controls="nav-profile" aria-selected="false">
									<span>
										<svg class="icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
											viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
											stroke-linecap="round" stroke-linejoin="round">
											<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
											<path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5"></path>
											<path d="M12 12l8 -4.5"></path>
											<path d="M12 12l0 9"></path>
											<path d="M12 12l-8 -4.5"></path>
											<path d="M16 5.25l-8 4.5"></path>
										</svg>
									</span>
									Mobiles
								</a> -->

								<a href="javascript:void(0)"
									class="nav-link {{ request()->is('vendor/mobile-index') ? 'active' : '' }}"
									id="nav-profile-tab" role="tab" aria-controls="nav-profile" aria-selected="false">
									<span>
										<svg class="icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
											viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
											stroke-linecap="round" stroke-linejoin="round">
											<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
											<path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5"></path>
											<path d="M12 12l8 -4.5"></path>
											<path d="M12 12l0 9"></path>
											<path d="M12 12l-8 -4.5"></path>
											<path d="M16 5.25l-8 4.5"></path>
										</svg>
									</span>
									Mobiles
								</a>
								<ul class="submenu">
									<li class="nav-item">
										<a class="nav-link" href="{{route('vendor.mobileIndex')}}">
											<span>
												<svg class="icon" xmlns="http://www.w3.org/2000/svg" width="24"
													height="24" viewBox="0 0 24 24" fill="none"
													stroke="currentColor" stroke-width="2"
													stroke-linecap="round" stroke-linejoin="round">
													<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
													<path
														d="M6 5a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2v-14z">
													</path>
													<path d="M11 4h2"></path>
													<path d="M12 17v.01"></path>
												</svg>
											</span>
											New  Mobile 
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="{{route('vendor.refurbished_mobile')}}">
											<span>
												<svg class="icon" xmlns="http://www.w3.org/2000/svg" width="24"
													height="24" viewBox="0 0 24 24" fill="none"
													stroke="currentColor" stroke-width="2"
													stroke-linecap="round" stroke-linejoin="round">
													<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
													<path
														d="M6 5a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2v-14z">
													</path>
													<path d="M11 4h2"></path>
													<path d="M12 17v.01"></path>
												</svg>
											</span>
											Refurnished Mobile
										</a>
									</li>
								</ul>

								<a href="{{Route('logout')}}" class="nav-link" id="nav-profile-tab" role="tab"
									aria-controls="nav-profile" aria-selected="false">
									<span>
										<svg class="icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
											viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
											stroke-linecap="round" stroke-linejoin="round">
											<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
											<path
												d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2">
											</path>
											<path d="M9 12h12l-3 -3"></path>
											<path d="M18 15l3 -3"></path>
										</svg>
									</span>
									Logout
								</a>
								<span id="marker-vertical" class="tp-tab-line d-none d-sm-inline-block"></span>
							</div>
						</nav>
					</div>
				</div>