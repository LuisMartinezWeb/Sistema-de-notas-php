document.addEventListener('DOMContentLoaded', function() {

    //obtener los div de los campos del formulario para lanzar alertas de validacion
    let validateRegister = document.querySelectorAll(".validate-register");

    //validacion del formregister
    if (document.querySelector("#formRegister")) {
        let formRegister = document.querySelector("#formRegister");
        formRegister.onsubmit = function(e) {
            e.preventDefault();

            //obtener los valores del formulario
            let strname = document.querySelector("#name-register").value;
            let strsurname = document.querySelector("#surname-register").value;
            let stremail = document.querySelector("#email-register").value;
            let strpassword = document.querySelector("#password-register").value;




            let datosForm = [strname, strsurname, stremail, strpassword];
            let alertForm = document.querySelector(".alertform");


            if (strname == "" || strsurname == "" || stremail == "" || strpassword == "") {

                alertForm.innerHTML = '<p style="color:red">*Todos los campos son obligatorios</p>';

                for (let i = 0; i < datosForm.length; i++) {
                    if (datosForm[i] == "") {
                        validateRegister[i].style.border = "1px solid red";
                    } else {
                        validateRegister[i].style.border = "none";
                    }
                }

                return false;
            } else {
                var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                var ajaxUrl = base_url + '/Login/userRegister';
                var formData = new FormData(formRegister);
                request.open("POST", ajaxUrl, true);
                request.send(formData);





                request.onreadystatechange = function() {

                    if (request.readyState == 4 && request.status == 200) {
                        console.log(request);
                        var requesData = JSON.parse(request.responseText);
                        console.log(request);
                        console.log(requesData.status);


                        if (requesData.status) {
                            document.querySelector("#name-register").value = "";
                            document.querySelector("#surname-register").value = "";
                            document.querySelector("#email-register").value = "";
                            document.querySelector("#password-register").value = "";
                            alertForm.innerHTML = '<p style="color:green"> Registro exitoso, ya puede iniciar session </p>';

                            setTimeout(function() {
                                window.location = base_url + '/login';
                            }, 1000);

                        } else if (requesData.msg == "Correo ya registrado") {
                            alertForm.innerHTML = '<p style="color:red"> *Correo ya registrado </p>';
                        } else {
                            alertForm.innerHTML = '<p style="color:red"> *A ocurrido un error </p>';
                        }
                    }
                }

            }

        }
    }


    if (document.querySelector("#formLogin")) {
        let formLogin = document.querySelector("#formLogin");
        let validateLogin = document.querySelectorAll(".validate-login")
        formLogin.onsubmit = function(e) {
            e.preventDefault();

            let stremail = document.querySelector("#email-login").value;
            let strpassword = document.querySelector("#password-login").value;

            let datosForm = [stremail, strpassword];
            let alertForm = document.querySelector(".alertformLogin");

            if (stremail == "" || strpassword == "") {
                alertForm.innerHTML = '<p style="color:red">No puede haber campos vacios</p>';

                for (let i = 0; i < datosForm.length; i++) {
                    if (datosForm[i] == "") {
                        validateLogin[i].style.border = "1px solid red";
                    } else {
                        validateLogin[i].style.border = "none";
                    }
                }

                return false;
            } else {
                let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                let ajaxUrl = base_url + 'Login/loginUser';
                let formData = new FormData(formLogin);
                request.open("POST", ajaxUrl, true);
                request.send(formData);
                console.log(formData);
                console.log(request);
                console.log(ajaxUrl);

                request.onreadystatechange = function() {

                    if (request.readyState == 4 && request.status == 200) {
                        console.log(request);
                        var requesData = JSON.parse(request.responseText);
                        console.log(request);
                        console.log(requesData.status);


                        if (requesData.status) {
                            document.querySelector("#email-login").value = "";
                            document.querySelector("#password-login").value = "";
                            window.location = base_url + 'notas';

                        } else if (requesData.Error == "credencialesincorrectas") {
                            alertForm.innerHTML = '<p style="color:red">' + requesData.msg + '</p>';
                        } else {
                            alertForm.innerHTML = '<p style="color:red"> *A ocurrido un error </p>';
                        }
                    }
                }

            }
        }
    }
}, false);