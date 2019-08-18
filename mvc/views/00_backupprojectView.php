<!-- intro -->
<main class="intro reveal" id="intro">
  <div class="container">
    <div class="frame d-flex">
      <div class="row justify-content-center">
        <div class="col-10 m-col8 s-col12">
          <span class="data-info"><?php echo $proposal_data->prop_local; ?>, <?php echo $proposal_data->prop_time; ?></span>

          <h1>Proposta de Trabalho: <?php echo $proj_clients->client_name; ?></h1>

        </div>
      </div>
    </div>
  </div>
</main>
<!-- finisih intro -->

<!-- start budget-content #goals-->
<div class="budget-content reveal" id="goals">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-10 m-col8 s-col12">
        <span class="up-title">Objetivos</span>
        <h2><?php echo $proposal_data->prop_name; ?></h2>
        <p><?php echo $proposal_data->prop_text; ?></p>
      </div> <!-- Fim colunas -->
    </div><!--  fim row -->
  </div><!-- fim container -->
</div><!-- Fim budget-content #goals -->

<!-- divisor -->
<div class="divisor"><img src="imgs/divisor.png" alt=""></div>

<!-- start budget-content #schedule-->
<div class="budget-content reveal" id="schedule">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-10 m-col8 s-col12">
        <span class="up-title">CRONograma para 15 dias</span>
        <h2>Planejamento</h2>
        <div class="table">
          <table class="table table-hover">
            <tbody>
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Produto</th>
                  <th scope="col">Tempo</th>
                </tr>
              </thead>
              <?php $total = 0;
              foreach ($planing as $index => $item) {
                // add the number to the existing value
                $total += $item->planing_time;
                ?>
              <tr>
                <th scope="row"><?php echo ++$index; ?></th>
                <td><?php echo $item->planing_topic; ?></td>
                <td><?php echo $item->planing_time; ?> dias</td>
              </tr>
              <?php } ?>
              <tr>
                <th scope="row"></th>
                <td class="total">Total</td>
                <td><?php echo $total.' dias'; ?></td>
              </tr>
            </tbody>
          </table>
        </div> <!-- Fim tables -->
      </div> <!-- Fim colunas -->
    </div><!--  fim row -->
  </div><!-- fim container -->
</div><!-- Fim budget-content #schedule-->

<div class="divisor"><img src="imgs/divisor.png" alt=""></div>

<!-- start budget-content #prices-->
<div class="budget-content reveal" id="prices">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-10 m-col8 s-col12">
        <span class="up-title">Orçamento</span>
        <h2>Serviços e Valores</h2>
        <div class="table">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Produto</th>
                <th scope="col">Preço</th>
              </tr>
            </thead>
            <tbody>
              <?php $total = 0;
              foreach ($budget as $index => $item) {
                // add the number to the existing value
                $total += $item->budget_price;
                ?>
              <tr>
                <th scope="row"><?php echo ++$index; ?></th>
                <td><?php echo $item->budget_prod; ?></td>
                <td><?php echo 'R$ '.$item->budget_price; ?></td>
              </tr>
              <?php } ?>
              <tr>
                <th scope="row"></th>
                <td class="total">Total</td>
                <td><?php echo 'R$ '.$total; ?></td>
              </tr>
            </tbody>
          </table>
        </div> <!-- Fim tables -->
      </div> <!-- Fim colunas -->
    </div><!--  fim row -->
  </div><!-- fim container -->
</div><!-- fim #prices -->
<!-- Fim budget-content #prices -->

<!-- start budget-content #details-->
<div class="budget-content reveal" id="details">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-10 m-col8 s-col12">
        <div class="topics changes">
          <h3>Condições de alteração</h3>
          <p>Todas as alterações deverão ser de caráter não estrutural e deverão constar em um único arquivo pdf ou semelhante e deverão ser enviadas até 15 dias depois da entrega do site. Demais alterações serão cobradas.</p>
        </div>
        <div class="topics payment">
          <h3>Condições de Pagamento</h3>
          <p>50% na autorização de desenvolvimento  e 50% na entrega</p>
        </div>
        <div class="topics not-include">
          <h3>Não Inclui</h3>
          <p>Hospedagem & Manutenção  & Domínio</p>
        </div>
      </div> <!-- Fim colunas -->
    </div><!--  fim row -->
  </div><!-- fim container -->
</div> <!-- fim #details -->
