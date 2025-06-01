window.agregarObra = function() {
    let nombre = document.getElementById("name").value
    let start_date = document.getElementById("start_date").value
    let end_date = document.getElementById("end_date").value
    let provincia = document.getElementById("provincia").value

    console.log(end_date)
    let mensaje = "";


    if(nombre == ''){
        Swal.fire({
            title: "¡ERROR!",
            text: "El nombre de la obra es obligatorio.",
            position: "center",
            showConfirmButton: false,
            timer: 2000,
            imageWidth: 100,
            imageHeight: 100,
            imageUrl: "/images/error.png",
        });

        return
    }

    if(start_date == ''){
        Swal.fire({
            title: "¡ERROR!",
            text: "La fecha de inicio es obligatoria.",
            position: "center",
            showConfirmButton: false,
            timer: 2000,
            imageWidth: 100,
            imageHeight: 100,
            imageUrl: "/images/error.png",
        });

        return
    }

    if(provincia == 'default'){
        Swal.fire({
            title: "¡ERROR!",
            text: "Por favor seleccione una provincia.",
            position: "center",
            showConfirmButton: false,
            timer: 2000,
            imageWidth: 100,
            imageHeight: 100,
            imageUrl: "/images/error.png",
        });

        return
    }

    if(end_date == ''){
        mensaje = '¡ATENCION! ESTA OBRA NO TIENE FECHA DE FINALIZACION ASIGNADA.'
    }else{
        mensaje = `TIEMPO DE LA OBRA ${start_date} - ${end_date}`  
    }

    Swal.fire({
        title: "¿DESEA AGREGAR ESTA OBRA?",
        text: `${mensaje}`,
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
                title: "Obra agregada",
                text: "La obra fue agregada correctamente.",
                position: "center",
                showConfirmButton: false,
                timer: 2500,
                imageWidth: 100,
                imageHeight: 100,
                imageUrl: "/images/obra/agregar.png",
            });

            setTimeout(() => {
                document.getElementById('formulario-maquina').submit()
            }, "2500");

        }
    })
}