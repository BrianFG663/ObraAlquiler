
window.verMaquinas = function(id){
    console.log(id)
    location.href = `/verMaquina?id=${id}`

}

window.eliminarMaquinas = function(id){
    console.log(id)
    Swal.fire({
        title: "¿DESEA ELIMINAR ESTA MAQUINA?",
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
            fetch('/eliminarMaquina', {
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
                        title: "Máquina eliminada",
                        text: "La máquina fue eliminada correctamente.",
                        position: "center",
                        showConfirmButton: false,
                        timer: 2500,
                        imageWidth: 100,
                        imageHeight: 100,
                        imageUrl: "/images/eliminar.png",
                    });

                    setTimeout(() => {
                        location.reload();
                    }, "2500");
                }
            })
        }
    });
}

document.getElementById('agregarMaquina').addEventListener('click', function() {
    location.href = '/formularioMaquina';
});

