
var comentarForm = document.getElementById("comentar-form");

comentarForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    /* if (document.getElementById("comentario").value === "") {
        alert("Alertando");
    } */

    const dadosForm = new FormData(comentarForm);

    const dados = await fetch("comentario/insert.php", {
        method: "POST",
        body: dadosForm
    });

    const resposta = await dados.json();

    alert(resposta['comentario']);


    var div =
    "<div class=\"single-comment\">" +
        "<div class=\"content\">" +
            "<h4>megan mart <span>As "+ resposta['hora'] +"</span></h4>" +
            "<p>"+resposta['comentario']+"</p>" +
            "<div class=\"button\">"
                "<a href=\"#\" class=\"btn\"><i class=\"fa fa-reply\" aria-hidden=\"true\"></i>Reply</a>" +
            "</div> "
        "</div>"
    "</div>";

    var anuncio = document.getElementById("anuncio" + resposta['anuncio_id']);
    anuncio.innerHTML += div;

    comentarForm.reset();

    //window.location.href = "../php/ver_candidatura.php?candidatura=" + resposta['dados']['bi'];

});