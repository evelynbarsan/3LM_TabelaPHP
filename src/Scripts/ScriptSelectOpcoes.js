function inserirCargo(){
    const select = document.getElementById("cargo");

    //solicitação de busca
    fetch("/Projetos/3LM_TabelaPHP/src/PHP/OpcoesSelect.php")
        .then(response => response.json())
        .then(data => {
            while (select.options.length > 1) {
                select.remove(1);
            }
            
            data.forEach(opcao => {
                const option = document.createElement("option");
                option.value = opcao.id;
                option.text = opcao.cargo;
                select.appendChild(option);
                
            });
        })
        
        .catch(erro => {
            console.error(" Erro ao buscar opções do cargo:", error);
        });
}
window.addEventListener("load", inserirCargo);