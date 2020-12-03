"use strict";

document.addEventListener("DOMContentLoaded", function(){
  getComentarios();
  document.getElementById("comentariosForm").addEventListener("submit", e => {
    e.preventDefault();
    addComent();
  });
})

let baseURL = "api/comentarios";

function getComentarios() {
  fetch(baseURL)
      .then(response => response.json())
      .then(comentarios => renderComentarios(comentarios))
      .catch(error => console.log(error));
}

function renderComentarios(comentarios){
  let container = document.querySelector('#div-comentarios');
  let hotel_id = document.querySelector('#hotel_id').value;
  let admin = document.querySelector("#admin").value;
  let form = document.querySelector("#comentariosForm");
  let sesion = document.querySelector("#sesion")
  if (admin==3) {
    form.style.display = "none";
  }

  container.innerHTML = ' ';

  for (let comentario of comentarios) {

    // Transforma el valor numerico 
    if (comentario.puntaje == 1){
      comentario.puntaje = "2";
    }
    else if(comentario.puntaje == 2){
        comentario.puntaje = "2";
    }
    else if(comentario.puntaje == 3){
        comentario.puntaje = "3";
    }
    else if(comentario.puntaje == 4){
        comentario.puntaje = "4";
    }
    else if(comentario.puntaje == 5){
        comentario.puntaje = "5";
    }


    if (hotel_id == comentario.id_hote) {
      let divContainer = document.createElement("div");
      let divPuntaje = document.createElement("div");
      let divComentario = document.createElement("div");
      let spanUsuario = document.createElement("span");
      let deleteButton = document.createElement("button");
      let icono = document.createElement("i"); 

      // Boton para borrar comentario
      divContainer.appendChild(deleteButton);
      deleteButton.style.display = 'none';
      // Asigno evento para borrar comentario
      deleteButton.addEventListener("click", () => deleteComentarios(id));

      divPuntaje.innerHTML = "Atencion al publico: " + comentario.puntaje;
      spanUsuario.innerHTML = comentario.id_usuario + " dijo: ";
      divComentario.appendChild(spanUsuario);
      spanUsuario.classList.add("usuario");
      divComentario.innerHTML += comenatrio.comentarios;
      

      let id = comentario.id;

      if(sesion == null){
        form.style.display = "none";
      }
      if (admin == 1){
        deleteButton.style.display = "block";
        console.log('admin')
      }else if (admin == 0){
        deleteButton.style.display = "none";
        console.log('usuario')
      }
    }
  }
}

function addComent(){
  // Tomo los input del formulario
  let inputPunt = document.getElementsByName("puntuacion");
  // Asigno una variable vacía
  let puntaje;
  // Recorro todos los input con el nombre "puntuacion"
  for (let i=0; i<inputPunt.length; i++){
    // Me detengo en aquel que esté checked
    if (inputPunt[i].checked){
      // A la variable declarada antes del for le asigno el valor del seleccionado
      puntaje = inputPunt[i].value;
    }
  }

    let comentario = {
      "comentario": document.getElementById("comentario").value,
      "puntaje": puntaje,
      "usuario_id": document.querySelector("#usuario_id").value,
      "hotel_id": document.getElementById("hotel_id").value
    }

    
    
    fetch(baseURL, {
      method: 'POST',
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(comentario)
    })

    .then(response => response.json())
    .then(document.querySelector("#comentarioForm").reset())
    .then(_comentarios => getComentarios())
    .catch(error => console.log(error));
}

function deleteComentario(id){
  fetch(baseURL+"/"+id, {
    method: 'DELETE',
  })
  .then(function (respuesta) {
    if (!respuesta.ok) {
        console.log("Error");
    }
    else {
      getComentarios();
    }
  })
}