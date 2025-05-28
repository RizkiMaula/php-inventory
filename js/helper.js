export function setPriceProduct(productSelectId, priceInputId) {
  const productSelect = document.getElementById('product');
  const priceInput = document.getElementById('price');

  productSelect.addEventListener('change', function () {
    const selectedOption = this.options[this.selectedIndex];
    const price = selectedOption.getAttribute('data-price');
    priceInput.value = price;
  });
}

export function calculatePrice(productSelectId, soldInputId, totalInputId) {
  const priceInput = document.getElementById(productSelectId);
  const soldInput = document.getElementById(soldInputId);
  const total = document.getElementById(totalInputId);

  const updateTotal = () => {
    const price = parseFloat(priceInput.value) || 0;
    const sold = parseFloat(soldInput.value) || 0;
    total.value = price * sold;
  };

  priceInput.addEventListener('input', updateTotal);
  soldInput.addEventListener('input', updateTotal);

  updateTotal();
}
