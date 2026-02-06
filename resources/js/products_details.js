function changeQty(amt) {
    const input = document.getElementById('qty');
    let val = parseInt(input.value);
    if (val + amt >= 1) input.value = val + amt;
}