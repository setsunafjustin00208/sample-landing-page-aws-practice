<!-- navigation -->
<div id="navbar" class="navigation <?= $navClass ?? '' ?> py-4">
	<div class="container">
		 <nav class="navbar">
			 <div class="navbar-brand">
				 <a class="navbar-item" href="<?= url('/') ?>">
					 <img src="<?= url('assets/images/' . ($logo ?? 'logo.png')) ?>" alt="logo">
				 </a>
				 <button role="button" class="navbar-burger burger" data-hidden="true" data-target="navigation">
					 <span aria-hidden="true"></span>
					 <span aria-hidden="true"></span>
					 <span aria-hidden="true"></span>
				 </button>
			 </div>
 
			 <div class="navbar-menu" id="navigation">
				 <ul class="navbar-start ml-auto">
					 <li class="navbar-item">
						 <a class="navbar-link" href="<?= url('/') ?>">Home</a>
					 </li>
					 
					 <li class="navbar-item">
						 <a class="navbar-link" href="<?= url('about') ?>">About</a>
					 </li>
					 
					 <li class="navbar-item">
						 <a class="navbar-link" href="<?= url('project') ?>">Portfolio</a>
					 </li>
 
					 <li class="navbar-item has-dropdown">
						 <a class="navbar-link">Pages</a>
						 <div class="navbar-dropdown">
							 <a class="navbar-item" href="<?= url('service') ?>">Service</a>
							 <a class="navbar-item" href="<?= url('pricing') ?>">Pricing</a>
							 <a class="navbar-item" href="<?= url('blog-sidebar') ?>">Blog with sidebar</a>
							 <a class="navbar-item" href="<?= url('blog-single') ?>">Blog Single</a>
						 </div>
					 </li>
					 
					 <li class="navbar-item">
						 <a class="navbar-link" href="<?= url('contact') ?>">Contact</a>
					 </li>
				 </ul>
				 <ul class="navbar-end ml-0">
					 <li class="navbar-item">
						<a href="<?= url('contact') ?>" class="btn <?= $estimateBtnClass ?? 'btn-solid-border' ?>">Get an estimate <i class="fa fa-angle-right ml-2"></i></a>
					 </li>
				 </ul>
			 </div>
		 </nav>
	</div>
 </div>
