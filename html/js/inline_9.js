
$('#checkout').on('click',function(e) {
  e.preventDefault();


  var products = $('#shopping-cart').find('tbody tr');

  if( products.length < 1 ) {
    console.log(products.length);
    return false;
  }

  window.location.href = 'https://www.lol-smurfs.com/checkout';
})
