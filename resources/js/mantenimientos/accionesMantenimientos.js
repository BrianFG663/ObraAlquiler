window.eliminarMantenimiento = function(id){
    console.log(id)
    Swal.fire({
        title: "¿DESEA ELIMINAR ESTE MANTENIMIENTO?",
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
            fetch('/eliminarMantenimiento', {
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
                        title: "Mantenimiento eliminado",
                        text: "El mantenimiento fue eliminado correctamente.",
                        position: "center",
                        showConfirmButton: false,
                        timer: 2500,
                        imageWidth: 100,
                        imageHeight: 100,
                        imageUrl: "/images/mantenimiento/eliminar-mantenimiento.png",
                    });

                    setTimeout(() => {
                        location.reload();
                    }, "2500");
                }
            })
        }
    });
}


window.verMantenimiento = function(id){
    console.log(id)
    location.href = `/verMantenimiento?id=${id}`
}


window.agregarMantenimiento = function(id){
    console.log(id)
    location.href = `/agregar/mantenimiento?id=${id}`
}