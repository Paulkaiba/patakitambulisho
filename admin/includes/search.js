document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchdata");
    const searchBar = document.getElementById("search-bar");
    const resultsContainer = document.getElementById("search-results");

    searchInput.addEventListener("focus", function () {
        searchBar.classList.add("active"); // Slide down bar when input is focused
    });

    searchInput.addEventListener("blur", function () {
        setTimeout(function () {
            searchBar.classList.remove("active"); // Slide up when input loses focus
        }, 200); // Delay to allow time for selecting an option
    });

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
