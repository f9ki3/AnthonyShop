document.addEventListener('DOMContentLoaded', function () {
    const inputSearch = document.getElementById('input_search');
    const searchButton = document.getElementById('search');

    // Function to handle the search input value
    const handleSearch = () => {
        const searchValue = inputSearch.value.trim();

        if (searchValue) {
            // Redirect to search_product.php with query parameter
            window.location.href = `search_product.php?q=${encodeURIComponent(searchValue)}`;
        } else {
            console.log('Search value is empty');
        }
    };

    // Trigger search when the button is clicked
    searchButton.addEventListener('click', handleSearch);

    // Trigger search when "Enter" is pressed
    inputSearch.addEventListener('keydown', function (e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            handleSearch();
        }
    });
});
