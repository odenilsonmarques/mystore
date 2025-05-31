
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".filter-btn").forEach(function (button) {
        button.addEventListener("click", function () {
            let categoryId = this.getAttribute("data-category");

            // Remove classe 'active' de todos os botões e adiciona no botão clicado
            document.querySelectorAll(".filter-btn").forEach(btn => btn.classList.remove("active"));
            this.classList.add("active");

            // Faz a requisição AJAX para buscar produtos da categoria
            fetch(ajax_object.ajax_url, {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: `action=filter_products&category_id=${categoryId}`
            })
                .then(response => response.text())
                .then(data => {
                    document.getElementById("product-list").innerHTML = data;
                });
        });
    });
});
