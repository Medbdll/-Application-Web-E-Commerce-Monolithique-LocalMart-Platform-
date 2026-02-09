function changeQty(amt) {
    const input = document.getElementById('qty');
    console.log(input.value);
    let val = parseInt(input.value);
    if (val + amt >= 1 ) input.value = val + amt;
}
window.changeQty = changeQty;