<style>
.CodeMirror {
    height: 0;
}

label[for="prop-text"] {
    /* color: blue!important; */
    position: absolute;
    top: 0;
}

</style>


<!-- Top header -->
<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
	<header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
		<div class="mdl-layout__header-row">
			<span class="mdl-layout-title"><?php echo BASE_TILE;?> | Adicionar Proposta </span>
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
            <!-- Coluna principal -->
          <div class="main-content-2">
              <form action="<?php echo BASE_URL.'proposals/update/'.$proposal->prop_id; ?>" method="POST" class="mdl-cell mdl-cell--12-col form-margin">
                  <div id="goals-form-box">
                    <div class="mdl-shadow--2dp mdl-color--white">
                        <div class="form-header mdl-layout__header-row mdl-color--blue-grey-800">Sobre a Proposta</div>
                          <div class="mdl-card__supporting-text">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--12-col">
                              <input class="mdl-textfield__input" type="text" id="prop-name" name="prop-name" value="<?php if( !empty($proposal->prop_name)) echo $proposal->prop_name; ?>">
                              <label class="mdl-textfield__label" for="prop-name">Título do Projeto</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--12-col">
                              <textarea class="mdl-textfield__input" type="text" rows= "3" id="prop-text" name="prop-text"><?php echo $proposal->prop_text; ?></textarea>
                              <label class="mdl-textfield__label" for="prop-text">Descrição do Projeto</label>
                            </div>
                        </div><!-- finish mdl-card -->
                    </div>
                  </div> <!-- fecha goals-form-box -->

                  <div class="divisor"></div>

                  <div id="crono-form-box">
                      <div class="mdl-shadow--2dp mdl-color--white">
                          <div class="form-header mdl-layout__header-row mdl-color--blue-grey-800">Cronograma</div>
                            <div class="mdl-card__supporting-text">
<!--
                              <div class="mdl-textfield mdl-js-textfield mdl-cell--12-col mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" id="total-time" name="total-time" value="">
                                <label class="mdl-textfield__label" for="total-time">Tempo total de execução</label>
                              </div>


                              <div class="form-sub-title">Itens</div> -->

                              <div class="itens-holder">
                                <?php foreach ($plans as $topic) { ?>
                                <table class="mdl-cell--12-col time-table order-list">
                                  <tbody>
                                    <tr>
                                      <td class="mdl-data-table__cell--non-numeric">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--12-col">
                                          <input class="mdl-textfield__input" type="text" name="planing-topic[]" id="planing-topic[]" value="<?php echo $topic->planing_topic; ?>">
                                          <label class="mdl-textfield__label" for="planing-topic[]">Item</label>
                                        </div>
                                      </td>
                                      <td class="mdl-data-table__cell--non-numeric">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--12-col">
                                          <input class="mdl-textfield__input" type="text" name="time-new-time[]" id="time-new-time[]" value="<?php echo $topic->planing_time; ?>">
                                          <label class="mdl-textfield__label" for="time-new-time[]">Tempo de execução</label>
                                        </div>
                                      </td>
                                      <td class="mdl-data-table__cell--non-numeric">
                                          <button class="mdl-button mdl-js-button deleterow"> Remover </button>
                                      </td>
                                    </tr>
                                    </tbody>
                                  <?php } ?>
                                    <tr>
                                      <td class="mdl-data-table__cell--non-numeric">

                                        <button class="mdl-button mdl-js-button" id="addrow-time">
                                          Adicionar novo
                                        </button>
                                      </td>
                                    </tr>
                                </table>
                              </div><!-- finish itens-holder -->
                            </div><!-- finish mdl-card -->
                          </div><!-- style-shadow -->
                        </div><!-- finish crono-box -->

                  <div class="divisor"></div>

                  <div id="budget-form-box">
                    <div class="mdl-shadow--2dp mdl-color--white">
                      <div class="form-header mdl-layout__header-row mdl-color--blue-grey-800">Orçamento</div>
                      <div class="mdl-card__supporting-text">

                        <div class="itens-holder">
                          <?php foreach ($budget as $item) { ?>
                          <table class="mdl-cell--12-col budget-table order-list">
                            <tbody>
                              <tr>
                                <td class="mdl-data-table__cell--non-numeric">
                                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--12-col">
                                    <input class="mdl-textfield__input" type="text" name="budget-prod[]" id="budget-prod" value="<?php echo $item->budget_prod; ?>">
                                    <label class="mdl-textfield__label" for="budget-prod">Novo item</label>
                                  </div>
                                </td>
                                <td class="mdl-data-table__cell--non-numeric">
                                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--12-col">
                                    <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="budget-price[]" id="budget-price" value="<?php echo $item->budget_price; ?>">
                                    <label class="mdl-textfield__label" for="budget-price">Valor</label>
                                  </div>
                                </td>
                                <td class="mdl-data-table__cell--non-numeric">
                                    <button class="mdl-button mdl-js-button deleterow"> Remover </button>
                                </td>
                              </tr>
                              </tbody>
                            <?php } ?>
                              <tr>
                                <td class="mdl-data-table__cell--non-numeric">
                                  <button class="mdl-button mdl-js-button" id="addrow-bdg">
                                    Adicionar novo
                                  </button>
                                </td>
                              </tr>
                          </table>

                        </div><!-- finish itens-holder -->
                      </div><!-- finish mdl-card -->
                    </div><!-- style-shadow -->
                  </div><!-- finish crono-box -->



            </div>
          </div>
          <div class="demo-cards mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">
            <div class="publish-holder mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
              <div class="form-header">
                <div class="form-header small-header mdl-layout__header-row mdl-color--blue-grey-800">Outras infos</div>
              </div>
              <div class="mdl-card__supporting-text mdl-color-text--grey-600">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--12-col">
                  <input class="mdl-textfield__input" type="text" id="prop-local" name="prop-local" value="<?php echo $proposal->prop_local; ?>">
                  <label class="mdl-textfield__label" for="prop-local">Localização</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--12-col">
                  <select id="client-id" name="client-id">
                    <?php foreach($clients as $client) { ?>
                      <option value="<?php echo $client->client_id; ?>" <?php if ($client->client_id == $proposal->prop_client_id) echo "selected";?>><?php echo $client->client_name; ?></option>
                    <?php } ?>
                  </select>
                  <label class="mdl-textfield__label client-label-id" for="client-id">Cliente</label>
                </div>
              </div>


            </div>
            <div class="demo-separator mdl-cell--1-col"></div>
            <div class="status-holder mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
              <div class="mdl-card__title mdl-card--expand mdl-color--teal-300">
                <h2 class="mdl-card__title-text">Status</h2>
              </div>
              <table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable">
                <tbody>
                  <td class="mdl-data-table__cell--non-numeric">
                    <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch">

                    <?php $visibility=false;
                    // Empty check if its zero, null, empty string, or doesnt exist
                    if (!empty($proposal->prop_visibility)) $visibility=true;
                    if (!$visibility) { ?>
                    <input type="checkbox" id="switch" name="prop-visibility" class="mdl-switch__input align-right">
                  <?php } else {?>
                    <input type="checkbox" id="switch" name="prop-visibility" class="mdl-switch__input align-right" checked>
                    <?php } ?>
                    <span class="mdl-switch__label">Público</span>
                    </label>
                  </td>
                  <td class="mdl-data-table__cell--non-numeric">
                    <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox">

                      <?php $pay=false;
                      if (!empty($proposal->prop_pay)) $pay=true;
                      if (!$pay) { ?>
                      <input type="checkbox" id="checkbox" name="prop-pay" class="mdl-checkbox__input align-right" value="off">
                    <?php } else {?>
                      <input type="checkbox" id="checkbox" name="prop-pay" class="mdl-checkbox__input align-right" value="on" checked>
                      <?php } ?>
                      <span class="mdl-checkbox__label">Pago</span>
                    </label>
                  </td>
                </tbody>
              </table>
              <div class="mdl-card__actions mdl-card--border">

                <input class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored mdl-button--accent" name="submit" type="submit" value="Atualizar">
                <a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--colored mdl-button--accent" href="<?php echo BASE_URL.'project/detail/'.$proposal->prop_id.'/'; ?>">Visualizar</a>

              </div>
            </div>
            </div>
          </div>
        </div>
        </form>
      </main>
    </div>
