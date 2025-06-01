window.verObra = function(id){
    location.href = `/verObra?id=${id}`
}

window.eliminarObra = function(id){
    console.log(id)
    Swal.fire({
        title: "¿DESEA ELIMINAR ESTA OBRA?",
        text: "¡Esta accion no se puede revertir!",
        imageWidth: 100,
        imageHeight: 100,
        imageUrl: "/images/warning.png",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "CANCELAR",
        confirmButtonText: "ELIMINAR"
    }).then((result) => {
        if (result.isConfirmed) {
            fetch('/eliminarObra', {
            method: 'DELETE',
            credentials: 'same-origin',
            body: JSON.stringify({id}),
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
            })
            .then(res => res.json()) 
            .then(data => {
                if(data.action == true){
                    Swal.fire({
                        title: "Obra eliminada",
                        text: "La Obra fue eliminada correctamente.",
                        position: "center",
                        showConfirmButton: false,
                        timer: 2500,
                        imageWidth: 100,
                        imageHeight: 100,
                        imageUrl: "/images/obra/eliminar.png",
                    });

                    setTimeout(() => {
                        location.reload();
                    }, "2500");
                }
            })
        }
    });
}

document.getElementById('agregarObra').addEventListener('click', function() {
    location.href = '/formularioObra';
});

document.getElementById('maquina-asignada').addEventListener('click', function() {
    Swal.fire({
        text: "Esta obra ya tiene una maquina asignada.",
        position: "center",
        showConfirmButton: false,
        timer: 2500,
        imageWidth: 100,
        imageHeight: 100,
        imageUrl: "/images/maquina-asignada.png",
    });
});

window.asignarMaquina = function(id){
    console.log(id)
}