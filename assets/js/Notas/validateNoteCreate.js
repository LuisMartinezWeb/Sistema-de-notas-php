document.addEventListener('DOMContentLoaded', function() {

    mostrarModal();





}, false);



function mostrarModal() {
    var inputTitle = document.querySelector(".title-createNote");
    var inputContent = document.querySelector(".content-createNote");
    var openformCreate = document.querySelector(".btn-nuevo button");
    var closeformCreate = document.querySelector(".close-formCreate");
    var valuebtn = document.querySelector(".btn-save");
    var accion = document.querySelector("#accion");


    openformCreate.addEventListener('click', () => {

        var modal = document.querySelector("#popup");

        modal.style.display = "block";
        accion.value = "create";
        valuebtn.value = "Guardar";
        CrearNota();
    });

    closeformCreate.addEventListener('click', () => {
        var modal = document.querySelector("#popup");

        modal.style.display = "none";
        inputTitle.value = "";
        inputContent.value = "";
    });
}


//crear una nueva nota
function CrearNota() {


    if (document.querySelector("#createNote")) {
        var accion = document.querySelector("#accion").value;

        if (accion == "create") {
            let formRegister = document.querySelector("#createNote");
            formRegister.onsubmit = function(e) {
                e.preventDefault();

                //obtener los valores del formulario
                let strtitle = document.querySelector("#title").value;
                let strcontent = document.querySelector("#content").value;


                //validacion del formulario de nueva nota
                if (strtitle == "" || strcontent == "") {
                    //regresar un aviso de campos faltantes, aun estoy por hacerlo

                    return false;
                } else {
                    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                    var ajaxUrl = base_url + '/notas/createNotes';
                    var formData = new FormData();
                    formData.append("title", strtitle);
                    formData.append("content", strcontent);
                    request.open("POST", ajaxUrl, true);
                    request.send(formData);

                    request.onreadystatechange = function() {

                        if (request.readyState == 4 && request.status == 200) {
                            console.log(request);
                            var requesData = JSON.parse(request.responseText);
                            console.log(request);
                            console.log(requesData.status);


                            if (requesData.status) {
                                strtitle.value = "";
                                strcontent.value = "";
                                console.log("registro exitosooo");

                                window.location = base_url + 'notas';

                            } else {
                                console.log("a ocurrido un error");
                            }
                        }
                    }

                }

            }
        }
    }
}


//editar la nota
function editarNota(intId) {
    if (document.querySelector("#createNote")) {
        var accion = document.querySelector("#accion").value;


        if (accion == "edit") {
            let formRegister = document.querySelector("#createNote");
            formRegister.onsubmit = function(e) {
                e.preventDefault();

                let strtitle = document.querySelector("#title").value;
                let strcontent = document.querySelector("#content").value;

                console.log(strtitle);
                console.log(strcontent);

                //validacion del formulario de editar nota
                if (strtitle == "" || strcontent == "") {
                    //regresar un aviso de campos faltantes, aun estoy por hacerlo

                    return false;
                } else {

                    //realizar la peticion ajax
                    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                    var ajaxUrl = base_url + '/notas/updateNotes';
                    var formData = new FormData();
                    formData.append("title", strtitle);
                    formData.append("content", strcontent);
                    formData.append("id", intId);
                    request.open("POST", ajaxUrl, true);
                    request.send(formData);

                    request.onreadystatechange = function() {

                        if (request.readyState == 4 && request.status == 200) {
                            console.log(request);
                            var requesData = JSON.parse(request.responseText);
                            console.log(request);
                            console.log(requesData.status);


                            if (requesData.status) {
                                strtitle.value = "";
                                strcontent.value = "";
                                console.log("registro exitosooo");

                                window.location = base_url + 'notas';

                            } else {
                                console.log("a ocurrido un error");
                            }
                        }
                    }

                }
            }
        }

    }
}