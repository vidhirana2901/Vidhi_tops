document.addEventListener("DOMContentLoaded", function () {
    
    // Search + Category Combined Filter Script
    const brandSearchInput = document.getElementById("brandSearch");
    const categoryFilter = document.getElementById("categoryFilter");
    const brandCards = document.querySelectorAll("#brandList .brand-item");

    function filterProducts() {
        const searchText = brandSearchInput ? brandSearchInput.value.toLowerCase() : "";
        const selectedCategory = categoryFilter ? categoryFilter.value : "all";

        brandCards.forEach(function (card) {
            const cardText = card.textContent.toLowerCase();
            const cardCategory = card.getAttribute("data-category");

            const matchesSearch = cardText.includes(searchText);
            const matchesCategory = (selectedCategory === "all" || cardCategory === selectedCategory);

            if (matchesSearch && matchesCategory) {
                card.style.display = "";
            } else {
                card.style.display = "none";
            }
        });
    }

    if (brandSearchInput) {
        brandSearchInput.addEventListener("keyup", filterProducts);
    }
    if (categoryFilter) {
        categoryFilter.addEventListener("change", filterProducts);
    }
});