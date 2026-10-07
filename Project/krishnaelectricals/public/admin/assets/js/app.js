// LocalStorage Initialization & Data Handlers
document.addEventListener('DOMContentLoaded', function () {
    initDefaultData();
});

function initDefaultData() {
    if (!localStorage.getItem('categories')) {
        const categories = [
            { id: 101, name: 'Wires & Cables', image: 'https://via.placeholder.com/60', desc: 'House wiring and industrial copper cables' },
            { id: 102, name: 'Switchgear & MCB', image: 'https://via.placeholder.com/60', desc: 'Circuit breakers, isolators, and distribution boards' }
        ];
        localStorage.setItem('categories', JSON.stringify(categories));
    }

    if (!localStorage.getItem('products')) {
        const products = [
            { id: 1, name: 'Polycab 2.5mm Wire', category: 'Wires & Cables', price: 1800, stock: 45 },
            { id: 2, name: 'L&T 32A Single Pole MCB', category: 'Switchgear & MCB', price: 210, stock: 120 }
        ];
        localStorage.setItem('products', JSON.stringify(products));
    }
}