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
    
    let save = document.getElementById('save');
    save.addEventListener('click', () => {
        let conf = confirm("Desea guardar 100 registros en la base de datos");
        if(conf){
            $.ajax({
                url: '../Rick_and_Morty/model/guardarModel.php',
                type: 'POST',
                data: { accion: 'Ejecutar' },
                success: function(respuesta) {
                    console.log('Respuesta:', respuesta);
                },
                error: function(error) {
                    // console.error('Error: ', error);
                }
            });
        }
    });
    
    api(paginaActual);
});

function detalle(id, name){
    window.open(`./detalle.php?id=${id}`, `Detalle de ${name}`, "width=380, height=500, left=100, top=100");
}