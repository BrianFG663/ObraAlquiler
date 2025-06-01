window.agregarMantenimiento = function() {
    let descripcion = document.getElementById("descripcion").value

    if(descripcion == ''){
        Swal.fire({
            title: "¡ERROR!",
            text: "Por favor ingrese una descripcion.",
            position: "center",
            showConfirmButton: false,
            timer: 2000,
            imageWidth: 100,
            imageHeight: 100,
            imageUrl: "/images/error.png",
        });

        return
    }

    Swal.fire({
        title: "¿DESEA REGISTRAR ESTE MANTENIMIENTO?",
        imageWidth: 100,
        imageHeight: 100,
        imageUrl: "/images/warning.png",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "CANCELAR",
        confirmButtonText: "REGISTRAR"
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "Mantenimiento registrado",
                text: "El mantenimiento fue registrado correctamente.",
                position: "center",
                showConfirmButton: false,
                timer: 2500,
                imageWidth: 100,
                imageHeight: 100,
                imageUrl: "/images/mantenimiento/agregar-mantenimiento.png",
            });

            setTimeout(() => {
                document.getElementById('formulario-asignacion').submit()
            }, "2500");

        }
    })
}
