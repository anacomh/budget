//
//*********** Planing Table
//





$("#addrow-time").on("click", function (e) {
    e.preventDefault();

    var newRow = $('<tr>');
    console.log(newRow);
    var cols = "";

    cols += '<td class="mdl-data-table__cell--non-numeric"> <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--12-col"> <input class="mdl-textfield__input" type="text" name="planing-topic[]" id="planing-topic[]"> <label class="mdl-textfield__label" for="planing-topic[]">Novo item</label> </div></td>';
    cols += '<td class="mdl-data-table__cell--non-numeric"> <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--12-col"> <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="time-new-time[]" id="time-new-time[]"> <label class="mdl-textfield__label" for="time-new-time[]">Tempo de Execução</label> </div></td>';
    cols += '<td class="mdl-data-table__cell--non-numeric"> <button class="mdl-button mdl-js-button deleterow"> Remover </button> </td></tr>';

    newRow.append(cols);
    $(".time-table:last-child").append(newRow);

});

$(".deleterow").on("click", function(e) {
  e.preventDefault();
  $(this).closest("tr").remove();
});




//
//*********** Budget Table
//


$(document).ready(function () {

    $("#addrow-bdg").on("click", function (e) {
        e.preventDefault();

        var newRow = $('<tr>');
        console.log(newRow);
        var cols = "";

        cols += '<td class="mdl-data-table__cell--non-numeric"> <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--12-col"> <input class="mdl-textfield__input" type="text" name="budget-prod[]" id="budget-prod"> <label class="mdl-textfield__label" for="budget-prod">Novo item</label> </div></td>';
        cols += '<td class="mdl-data-table__cell--non-numeric"> <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--12-col"> <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="budget-price[]" id="budget-price"> <label class="mdl-textfield__label" for="budget-price">Valor</label> </div></td>';
        cols += '<td class="mdl-data-table__cell--non-numeric"> <button class="mdl-button mdl-js-button deleterow"> Remover </button> </td></tr>';

        newRow.append(cols);
        $(".budget-table:last-child").append(newRow);

    });
});


//
// ****** Menu BUDGET
//

/*********

		 			– Menu

*********/
// Prevenir o evento de scroll default do browse
$('.nav-link').click(function(evento){
	//Impedir o comportamento padrão do browser
	// alert("fui click");
	evento.preventDefault();

  // Remover a classe do menu ativo
  $('.nav-link').removeClass('active');
  //Adicionar a classe active menu ao botão clicado
  $(this).addClass('active');

	// Guardar href do menu clicado
	var href = $(this).attr('href');

  if( href == '#print'){
    href = '#prices';
    // Guardar a distância ao topo do elemento com id igual ao href do menu clicado
  	var topo = $(href).offset().top;
  	// Animar o Scroll
  	$('html').animate( {'scrollTop':topo} , 800, function(){
      window.print()
    } );

  } else {

	// Guardar a distância ao topo do elemento com id igual ao href do menu clicado
	var topo = $(href).offset().top;

	// Animar o Scroll
	$('html, body').animate( {'scrollTop':topo} , 800 );
  }
});



/******
- On change of checkbox and swich submit
******/


// proposals list - proposals visibility
$('.switch-propostas input[type=checkbox]').change(function(){
    $(this).parents('form').submit();
})

// proposals list - proposals payment
$('.checkbox-proposals input[type=checkbox]').change(function(){
    $(this).parents('form').submit();
})


// receipt list - receipt visibility
$('.form-receipt-visibility input[type=checkbox]').change(function(){
    $(this).parents('form').submit();
})
