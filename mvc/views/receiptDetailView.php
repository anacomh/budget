<style>
.pink {
  color: #ff1060;
}

.main-header, footer {
    display: none;
}

*{
  text-align: center;
}
p{
  font-size: 1em;
}
.print-btn {
    display: inline-block;
    background: #ff1060;
    border: 2px solid;
    padding: 5px 15px;
    font-size: .8em;
    color: #fff;
    margin-top: 30px;
}
.print-btn:hover {
    text-decoration: none;
    color: #000;
    background: #fff;
    border: 2px solid #000;
}
h2{margin-top:20px;}

</style>
<!-- intro -->
<main class="intro reveal" id="intro">
  <div class="container">
    <div class="frame d-flex">
      <div class="row justify-content-center">
        <div class="col-10 m-col8 s-col12">
          <!-- <span class="data-info"><?php echo $receiptDetail->receipt_date; ?></span>

          <h1>Recibo do Trabalho: <?php echo $receiptDetail->prop_name; ?></h1> -->
          <?php $total = 0; foreach ($budget as $index => $item) {
            // add the number to the existing value
            $total += $item->budget_price; } ?>
          <span class="up-title"><?php echo $receiptDetail->prop_name; ?></span>
          <h2>Recibo</h2>
          <p>Eu, Ana Clara Assumpção Pacheco, brasileira, rg.: 33.693.222-4, recebi no dia <span class="pink"><?php echo date('d M Y h.i. A', strtotime($receiptDetail->receipt_date)); ?></span> de <span class="pink"><?php echo $receiptDetail->client_name; ?></span>
             o valor de  <span class="pink"><?php echo 'R$ '.$total; ?></span> referentes ao pagamento do projeto  <span class="pink"><?php echo $receiptDetail->prop_name; ?>.</p></span>
          <p><a class="print-btn" href="javascript:if(window.print)window.print()">Imprimir</a></p>

        </div>
      </div>
    </div>
  </div>
</main>
<!-- finisih intro -->
