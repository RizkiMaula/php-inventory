export function setPriceProduct(productSelectId, priceInputId) {
  const selectedOption = document.getElementById(productSelectId).options[document.getElementById(productSelectId).selectedIndex];
  const price = selectedOption.getAttribute('data-price');
  document.getElementById(priceInputId).value = price;
}
