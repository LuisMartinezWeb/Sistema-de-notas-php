// obtener las notas del usuario con ajax

document.addEventListener('DOMContentLoaded', function() {


    // dibujarnotas('notas/getNotas');

    obtenerNotas();
    clickIconNotas();
    clickIconTrash();
}, false);




function clickIconNotas() {
    document.getElementById("listarNotas").addEventListener('click', () => {
        let cards = document.querySelectorAll(".card");
        let openformCreate = document.querySelector(".btn-nuevo");
        openformCreate.style.display = "block";
        for (let i = 0; i < cards.length; i++) {
            cards[i].remove();
        }
        obtenerNotas();
    });
}

function clickIconTrash() {
    document.getElementById("trash").addEventListener('click', () => {
        let cards = document.querySelectorAll(".card");

        var openformCreate = document.querySelector(".btn-nuevo");
        openformCreate.style.display = "none";


        for (let i = 0; i < cards.length; i++) {
            cards[i].remove();
        }

        // obtener las notas eliminadas

        let cardList = document.querySelector(".card-list");
        const url = base_url + 'notas/trash';
        const http = new XMLHttpRequest();

        http.open("GET", url);
        http.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {
                var data = JSON.parse(http.responseText);


                for (let i = 0; i < data.length; i++) {

                    // obtener las fechas y darles formato
                    var date = data[i].create_at.split(/[- :]/);

                    var dateChangue = [date[2], date[1], date[0]];

                    // insertar el contenido al html
                    cardList.innerHTML += `    <article class="card">
                    <header class="card-header">
                        <div class="options">
                            <p>` + dateChangue[0] + `/` + dateChangue[1] + `/` + dateChangue[2] + `</p>
                            
                            <div>
                            <i class="bx bx-trash card-trash-icon DeleteDBCard">
                                
                            <input  name="cardId" type="hidden" value="` + data[i].id + `"> </i>
    
                            <i class="bx bx-refresh card-trash-icon restaurarNota">
                            
                            <input  name="cardId" type="hidden" value="` + data[i].id + `"> </i>
                            </div>
                                
                        
                        </div>
                        <a href="#" class="link-title-card">` + data[i].title + `</a>
                    </header>
            
                    <div class="card-text">
                        <p>` + data[i].content + `
                        </p>
                        
                    </div>
                    
                </article>`
                }
                // DeleteNotas();

                RestaurarNota();
                DeleteDbNote();

                // var resultado = JSON.parse(this.responseText)
                // console.log(resultado.name)
            }
        }
        http.send()


    });


}

function obtenerNotas() {
    let cardList = document.querySelector(".card-list");
    const url = base_url + 'notas/getNotas';
    const http = new XMLHttpRequest();

    http.open("GET", url);
    http.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(http.responseText);


            for (let i = 0; i < data.length; i++) {

                // obtener las fechas y darles formato
                var date = data[i].create_at.split(/[- :]/);

                var dateChangue = [date[2], date[1], date[0]];

                // insertar el contenido al html
                cardList.innerHTML += `    <article class="card">
                <header class="card-header">
                    <div class="options">
                        <p>` + dateChangue[0] + `/` + dateChangue[1] + `/` + dateChangue[2] + `</p>
                        
                        <div>
                        <i class="bx bx-trash card-trash-icon trashCard">
                            
                        <input  name="cardId" type="hidden" value="` + data[i].id + `"> </i>

                        <i class="bx bx-edit-alt card-trash-icon editCard">
                        
                        <input  name="cardId" type="hidden" value="` + data[i].id + `"> </i>
                        </div>
                            
                    
                    </div>
                    <a href="#" class="link-title-card">` + data[i].title + `</a>
                </header>
        
                <div class="card-text">
                    <p>` + data[i].content + `
                    </p>
                    
                </div>
                
            </article>`
            }
            DeleteNotas();
            AbrirModaleditarNota();
            // var resultado = JSON.parse(this.responseText)
            // console.log(resultado.name)
        }
    }
    http.send()
}

function DeleteNotas() {

    var trashIcons = document.querySelectorAll(".trashCard");

    trashIcons.forEach(function(trashIcons) {
        trashIcons.addEventListener('click', function() {
            var idNota = this.childNodes[1].value;
            var Nota = this.parentNode.parentNode.parentNode.parentNode;
            // if (this.idNota) {
            console.log(this.childNodes[1]);
            console.log(idNota);
            const url = base_url + "notas/trashNote";
            const http = new XMLHttpRequest();

            http.open("POST", url, true);
            var formData = new FormData();
            formData.append("id", idNota);
            console.log(formData);
            http.send(formData);

            http.onreadystatechange = function() {
                console.log(http);
                if (this.readyState == 4 && this.status == 200) {



                    Nota.remove();

                }
            }

            // }
        })
    });
}


function AbrirModaleditarNota() {
    var openformEdit = document.querySelectorAll(".editCard");

    openformEdit.forEach(function(openformEdit) {
        openformEdit.addEventListener('click', () => {

            // var idNota = this.childNodes[1].value;

            var modal = document.querySelector("#popup");

            modal.style.display = "block";

            var accion = document.querySelector("#accion");
            var valuebtn = document.querySelector(".btn-save");
            accion.value = "edit";
            valuebtn.value = "Editar";



            id = openformEdit.childNodes;
            titulo = openformEdit.parentNode.parentNode.parentNode.childNodes;
            content = openformEdit.parentNode.parentNode.parentNode.parentNode.childNodes;

            intId = id[1].value;
            strtitulo = titulo[3].innerText;
            strcontent = content[3].innerText;

            modalTitle = document.getElementById('title');
            modalTitle.value = strtitulo;

            modalContent = document.getElementById('content');
            modalContent.value = strcontent;



            editarNota(intId);
        });
    });




}



function RestaurarNota() {

    var restoreIcons = document.querySelectorAll(".restaurarNota");

    restoreIcons.forEach(function(restoreIcons) {
        restoreIcons.addEventListener('click', function() {
            var idNota = this.childNodes[1].value;
            var Nota = this.parentNode.parentNode.parentNode.parentNode;

            // if (this.idNota) {
            console.log(this.childNodes[1]);
            console.log(idNota);
            console.log(Nota);
            const url = base_url + "notas/restoreNote";
            const http = new XMLHttpRequest();

            http.open("POST", url, true);
            var formData = new FormData();
            formData.append("id", idNota);
            console.log(formData);
            http.send(formData);

            http.onreadystatechange = function() {
                console.log(http);
                if (this.readyState == 4 && this.status == 200) {

                    Nota.remove();


                }
            }


        });
    });
}

function DeleteDbNote() {
    var trashIcons = document.querySelectorAll(".DeleteDBCard");

    trashIcons.forEach(function(trashIcons) {
        trashIcons.addEventListener('click', function() {
            var idNota = this.childNodes[1].value;
            var Nota = this.parentNode.parentNode.parentNode.parentNode;
            // if (this.idNota) {

            const url = base_url + "notas/deleteDbNote";
            const http = new XMLHttpRequest();

            http.open("POST", url, true);
            var formData = new FormData();
            formData.append("id", idNota);

            http.send(formData);

            http.onreadystatechange = function() {

                if (this.readyState == 4 && this.status == 200) {



                    Nota.remove();

                }


            }
        })
    });
}