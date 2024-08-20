document.addEventListener("DOMContentLoaded", function() {
    const buyBtn = document.getElementById('buyBtn');
    const rentBtn = document.getElementById('rentBtn');
    const buyContent = document.getElementById('buyContent');
    const rentContent = document.getElementById('rentContent');

    buyBtn.addEventListener('click', function() {
        buyContent.classList.remove('hidden');
        rentContent.classList.add('hidden');
        buyBtn.classList.add('active');
        rentBtn.classList.remove('active');
    });

    rentBtn.addEventListener('click', function() {
        rentContent.classList.remove('hidden');
        buyContent.classList.add('hidden');
        rentBtn.classList.add('active');
        buyBtn.classList.remove('active');
    });

    
});

