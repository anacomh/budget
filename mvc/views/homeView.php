<!-- Top header -->
<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
	<header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
		<div class="mdl-layout__header-row">
			<span class="mdl-layout-title"><?php echo BASE_TILE;?></span>
			<div class="mdl-layout-spacer"></div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
				<!-- <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
					<i class="material-icons">search</i>
				</label>
				<div class="mdl-textfield__expandable-holder">
					<input class="mdl-textfield__input" type="text" id="search">
					<label class="mdl-textfield__label" for="search">Enter your query...</label>
				</div> -->
			</div>
			<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
				<i class="material-icons">add</i>
			</button>
			<ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
				<li class="mdl-menu__item"><a href="<?php echo BASE_URL.'proposals/create'; ?>"> Proposta</a></li>
				<!-- <li class="mdl-menu__item">Recibo</li> -->
				<li class="mdl-menu__item"><a href="<?php echo BASE_URL.'clients/create'; ?>"> Clientes</a></li>
			</ul>
		</div>
	</header>
	<div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
		<header class="demo-drawer-header">
			<a href="<?php echo BASE_URL; ?>"> <img src="<?php echo IMG_URL.'logo-adentro.png'; ?>" class="Logo Adentro"></a>
		</header>
		<nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
			<a class="mdl-navigation__link" href="<?php echo BASE_URL.'proposals/'; ?>">Propostas</a>
			<a class="mdl-navigation__link" href="<?php echo BASE_URL.'receipt/'; ?>">Recibos</a>
			<a class="mdl-navigation__link" href="<?php echo BASE_URL.'clients/'; ?>">Clientes</a>
			<div class="mdl-layout-spacer"></div>
			<a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">help_outline</i><span class="visuallyhidden">Help</span></a>
		</nav>
	</div>
	<!-- Fim do top header -->




<!-- Aqui vai o conteúdo -->

<main class="mdl-layout__content mdl-color--grey-100">
<div class="mdl-grid">
	<div class="mdl-cell mdl-cell--8-col">
		<!-- OI -->
		<?php foreach ($proposals as $proposal) { ?>
			<div class="project-card">
				<div class="project-card-child mdl-grid mdl-shadow--2dp mdl-color--white mdl-card__supporting-text">
						<div class="mdl-cell mdl-cell--10-col">
							<h4><a href="add-proposal.html"><?php echo $proposal->prop_name; ?></a></h4>
							<p> <?php echo $proposal->client_name; ?> | <?php echo $proposal->prop_time; ?></p>
						</div>
						<div class="mdl-cell mdl-cell--2-col">
							<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-2">
								<input type="checkbox" id="switch-2" class="mdl-switch__input" checked>
								<span class="mdl-switch__label"></span>
							</label>
						</div>
				</div>
			</div>
		<div class="budget-separator mdl-cell--1-col"></div>
		<!-- fim -->
	<?php } ?>
	</div>
</div>
</main>
