function changeQty(amt) {
    const inputs = document.querySelectorAll('.qty');
    const warningElement = document.getElementById('stock-warning');
    let val = parseInt(inputs[0].value);

    warningElement.classList.add('hidden');
    
    if (window.productStock < val + amt) {
        // Show warning and prevent update
        warningElement.classList.remove('hidden');
        return;
    }
    
    if (val + amt >= 1 ) {
        inputs[0].value = val + amt; 
        inputs[1].value = val + amt;
    }
}