document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchdata");
    const resultsContainer = document.getElementById("search-results");

    searchInput.addEventListener("keyup", function () {
        let query = searchInput.value.trim();
        if (query.length > 0) {
            fetch("includes/search_ajax.php?q=" + query)
                .then(response => response.text())
                .then(data => {
                    resultsContainer.innerHTML = data;
                })
                .catch(error => console.error("Error fetching search results:", error));
        } else {
            resultsContainer.innerHTML = "";
        }
    });
});