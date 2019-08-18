<style>
#view-source {
  position: fixed;
  display: block;
  right: 0;
  bottom: 0;
  margin-right: 40px;
  /* margin-bottom: 40px; */
  z-index: 900;
}
.input-btn{
position: absolute;
bottom: -10!important;
background: #e6e6e6;
}
.form-header{
  background:#f2f2f2!important;
  color: rgba(0,0,0,.54);
  height: 40;
  padding-left: 17px;
}

.divisor {
height: 50px;
}

.form-margin {
    /* margin-left: 70px!important; */
    margin-top: -1.6px;
    margin-left: -17px;
}
.form-table th, .form-table td {
padding-left: 0!important;
}
.form-table {
    border: 0;
}
</style>

<!-- Top header -->
<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
	<header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
		<div class="mdl-layout__header-row">
			<span class="mdl-layout-title"><?php echo BASE_TILE;?> | Adicionar Clientes </span>
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
  <div class="mdl-grid demo-content">

    <div class="mdl-cell mdl-cell--8-col">
      <!-- OI -->
    <div class="main-content-2">
        <form action="<?php echo BASE_URL.'clients/update/'.$client->client_id; ?>" method="POST" class="mdl-cell mdl-cell--12-col form-margin">
            <div id="client-form-box">
              <div class="mdl-shadow--2dp mdl-color--white">
                  <div class="form-header mdl-layout__header-row mdl-color--blue-grey-800">Sobre o Cliente</div>
                    <div class="mdl-card__supporting-text">
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--12-col">
                        <input class="mdl-textfield__input" type="text" id="client-name" name="client-name" value="<?php echo $client->client_name; ?>">
                        <label class="mdl-textfield__label" for="client-name">Nome do Cliente</label>
                      </div>
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--12-col">
                        <input class="mdl-textfield__input" type="text" id="client-company" name="client-company" value="<?php echo $client->client_company; ?>">
                        <label class="mdl-textfield__label" for="client-company">Nome da Empresa</label>
                      </div>
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--12-col">
                        <input class="mdl-textfield__input" type="text" id="client-email" name="client-email" value="<?php echo $client->client_email; ?>">
                        <label class="mdl-textfield__label" for="client-email">Email</label>
                      </div>
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--12-col">
                        <input class="mdl-textfield__input" type="text" id="client-phone" name="client-phone" value="<?php echo $client->client_phone; ?>">
                        <label class="mdl-textfield__label" for="client-phone">Telefone</label>
                      </div>
                      <input class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored mdl-button--accent" name="submit" type="submit" value="Atualizar">

                  </div><!-- finish mdl-card -->
              </div>
            </div> <!-- fecha client-form-box -->
          </form>
        </div>
      </div>
  </div>
</main>

    <a href="add-proposal.html" target="_blank" id="view-source" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored mdl-color-text--white">Add Proposal</a>
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_URL.'jquery3.1.1.js'; ?> "></script>
    <script type="text/javascript" src="<?php echo JS_URL.'script.js'; ?> "></script>
