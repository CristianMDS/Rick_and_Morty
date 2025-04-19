let paginaActual = 1;
$(document).ready(function () {
    async function api(page = '1') {
        const url = `https://rickandmortyapi.com/api/character?page=${page}`;
        
        try {
            const response = await fetch(url);
            const data = await response.json();
            
            let personajes = data.results;
            let contenedor = document.querySelector('.catalogo');
    
            contenedor.innerHTML = ``;
    
            personajes.forEach(personaje => {
                contenedor.innerHTML += `
                    <div class='card'>
                        <img src="${personaje.image}" alt="${personaje.name}"/>
                        <p>ID: ${personaje.id}</p>
                        <p>Nombre: ${personaje.name}</p>
                        <p>Estado: ${personaje.status}</p>
                        <p>Especie: ${personaje.species}</p>
                        <button onclick='return detalle(this.id, this.name)' id=${personaje.id} name='${personaje.name}'>
                            DETALLE
                        </button>
                    </div>
                `;
            });
    
    
        } catch (error) {
            console.error("Error al cargar los datos:", error);
        }
    }
    
    let prev = document.getElementById('prev');
    prev.addEventListener('click', () => {
        if (paginaActual > 1) { 
            paginaActual--;
            api(paginaActual);
        }
    });
    
    let next = document.getElementById('next');
    next.addEventListener('click', () => {
        if(paginaActual < 5){
            paginaActual++;
            api(paginaActual);
        }
    });
    
    let view = document.getElementById('view');
    view.addEventListener('click', () => {
        window.open("./views/mostrarView.php", "Personajes Almacenados");
    });
    
    let save = document.getElementById('save');
    save.addEventListener('click', () => {
        Swal.fire({
            icon: "info",
            title: "¿Desea almacenar los 100 personajes?",
            showDenyButton: true,
            confirmButtonText: "Si",
            denyButtonText: "No"
        }).then((r) =>{
            if(r.isConfirmed){

                const loadingAlert = Swal.fire({
                    title: 'Cargando...',
                    html: 'Por favor, espere un momento.',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                $.ajax({
                    url: './model/guardarModel.php',
                    type: 'POST',
                    data: { accion: 'Ejecutar' },
                    success: function(respuesta) {

                        Swal.close();
                        
                        if(respuesta.trim() === "Creado"){
                            Swal.fire({
                                icon:"success",
                                title:"¡EXITOSO!",
                                text: "Los 100 personajes se almacenaron correctamente"
                            });
                        }
                        if(respuesta.trim() === "Datos"){
                            Swal.fire({
                                icon:"warning",
                                title:"¡Archivos almacenados!",
                                text: "Los 100 personajes ya se almacenaron"
                            });
                        }
                    }
                });

                setTimeout(() => {
                    Swal.close();
                }, 6000);
            }
        })
    });
    
    api(paginaActual);
});

function detalle(id, name){
    window.open(`./views/detalleView.php?id=${id}`, `Detalle de ${name}`, "width=380, height=500, left=100, top=100");
}