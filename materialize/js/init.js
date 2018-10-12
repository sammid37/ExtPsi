// --------SCRIPTS EXTRAS--------

// MATERIALIZE INITS

// Ativa tabs 
$(document).ready(function(){
  $('ul.tabs').tabs();
});

// Ativa o dropdown da navegação
$(".button-collapse").sideNav();
//$('.collapsible').collapsible();
$(".dropdown-button").dropdown();

// Ativa o modal
$(document).ready(function(){
  $('.modal').modal();
});

// Ativa o relógio
$('.timepicker').pickatime({
  default: 'now', // Set default time: 'now', '1:30AM', '16:30'
  fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
  twelvehour: false, // Use AM/PM or 24-hour format
  donetext: 'OK', // text for done-button
  cleartext: 'Limpar', // text for clear-button
  canceltext: 'Cancelar', // Text for cancel-button
  autoclose: false, // automatic close timepicker
  ampmclickable: true, // make AM PM clickable
  aftershow: function(){} //Function for after opening timepicker
});

// Ativa o calendário
$('.datepicker').pickadate({
  selectMonths: true, // Creates a dropdown to control month
  selectYears: 15, // Creates a dropdown of 15 years to control year,
  today: 'Hoje',
  clear: 'Limpar',
  close: 'Ok',
  closeOnSelect: false, // Close upon selecting a date,
  format: 'yyyy-mm-dd'
});

// Ativa a caixa de seleção
$(document).ready(function() {
    $('select').material_select();
});

// Ativa contador da caixa de texto
$(document).ready(function() {
  $('input#input_text, textarea#bodyrel').characterCounter();
});
$(document).ready(function() {
  $('input#input_text, textarea#extra').characterCounter();
});
// ativa o carousel
$('.carousel.carousel-slider').carousel({fullWidth: true});
$(document).ready(function() {
  Materialize.updateTextFields();
});

// SELF-MADE
// Ativa o script de display
function displayPacientes(){
  if (document.getElementById('pacientes').style.display == 'none') {
    document.getElementById('pacientes').style.display = '';
  }
  else {
    document.getElementById('pacientes').style.display = 'none';
  }
}
function displayCalendario(){
  if (document.getElementById('calendario').style.display == 'none') {
    document.getElementById('calendario').style.display = '';
  }
  else {
    document.getElementById('calendario').style.display = 'none';
  }
}
function displayFavoritos(){
  if (document.getElementById('favoritos').style.display == 'none') {
    document.getElementById('favoritos').style.display = '';
  }
  else {
    document.getElementById('favoritos').style.display = 'none';
  }
}
function displayRelatos(){
  if (document.getElementById('relatos').style.display == 'none') {
    document.getElementById('relatos').style.display = '';
  }
  else {
    document.getElementById('relatos').style.display = 'none';
  }
}
// function displayCalendario(){
//   if (document.getElementById('rascunhos').style.display == 'none') {
//     document.getElementById('rascunhos').style.display = '';
//   }
//   else {
//     document.getElementById('rascunhos').style.display = 'none';
//   }
// }
