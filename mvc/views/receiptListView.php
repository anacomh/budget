<!-- Top header -->
<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
	<header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
		<div class="mdl-layout__header-row">
			<span class="mdl-layout-title"><?php echo BASE_TILE;?> | Recibos </span>
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






<!-- Start content -->
<main class="mdl-layout__content mdl-color--grey-100 ">
  <div class="mdl-grid">
    <div class="mdl-cell mdl-cell--12-col">
      <table class="mdl-data-table mdl-cell--9-col mdl-cell--4-col mdl-js-data-table mdl-shadow--2dp">
    <thead>
      <tr>
        <th class="mdl-data-table__cell--non-numeric">Nome do Projeto</th>
        <th>Cliente</th>
        <th class="mobile-hide">Data do Recibo</th>
        <th class="mobile-hide">Publico</th>

      </tr>
    </thead>
    <!--  Start Proposals Foreach -->
    <?php foreach ($payedProposals as $proposals) { ?>
    <tbody>
      <tr>
        <td class="mdl-data-table__cell--non-numeric"><a href="<?php echo BASE_URL.'receipt/detail/'.$proposals->prop_id; ?>"><?php echo $proposals->prop_name; ?></a></td>
        <td><?php echo $proposals->client_name; ?></td>
        <td class="mobile-hide align-right">
          <?php echo date('d M Y h.i. A', strtotime($proposals->receipt_date)); ?>
        </td>

        <td class="mobile-hide align-switch">
          <form class="form-receipt-visibility" action="<?php echo BASE_URL.'receipt/visibility/'.$proposals->prop_id; ?>" method="post">
          <?php if($proposals->receipt_visibility == 0 ) { ?>
          <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-<?php echo $proposals->prop_id; ?>">
            <input type="checkbox" name="receipt_visibility" id="switch-<?php echo $proposals->prop_id; ?>" class="mdl-switch__input align-right">
          </label>
          <?php } if($proposals->receipt_visibility == 1 ) { ?>
          <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-<?php echo $proposals->prop_id; ?>">
            <input type="checkbox" name="receipt_visibility" id="switch-<?php echo $proposals->prop_id; ?>" class="mdl-switch__input align-right" checked>
          </label>
          <?php } ?>
          </form>
        </td>

      </tr>

    </tbody>
    <!-- Finish Foreach -->
    <?php } ?>
  </table>
    </div>
  </div>
</main>
<!-- Finish content -->
