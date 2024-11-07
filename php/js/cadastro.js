// Adiciona um evento de clique ao botão "Clientes"
document.getElementById("clientesBtn").addEventListener("click", function() {
    // Redireciona para o arquivo clientes.php
    window.location.href = "clientes.php";
});

// Adiciona um evento de clique ao botão "Voltar"
document.getElementById("voltarBtn").addEventListener("click", function() {
    // Redireciona para o arquivo index.php
    window.location.href = "../index.php";
});