export function setPriceProduct(productSelectId, priceInputId) {
  const productSelect = document.getElementById(productSelectId);
  const priceInput = document.getElementById(priceInputId);

  function updatePrice() {
    const selectedOption = productSelect.options[productSelect.selectedIndex];
    const price = selectedOption.getAttribute('data-price');
    priceInput.value = price;
  }

  productSelect.addEventListener('change', updatePrice);

  // Set price saat halaman pertama kali dimuat
  window.addEventListener('DOMContentLoaded', updatePrice);
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

export function timeoutAlert() {
  setTimeout(() => {
    const alert = document.getElementById('error-alert');
    if (alert) {
      alert.remove();
    }
  }, 3000);
}

export function updateMaxStock() {
  const select = document.getElementById('product');
  const selectedOption = select.options[select.selectedIndex];
  const stock = selectedOption.getAttribute('data-stock');
  const quantityInput = document.getElementById('quantity');

  if (stock && quantityInput) {
    quantityInput.max = stock;
    quantityInput.placeholder = `Max: ${stock}`;
  }
}
