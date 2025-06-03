window.agregarMaquina = function() {
    let serial = document.getElementById("serial").value
    let model = document.getElementById("model").value
    let tipo = document.getElementById("tipo").value
    let estado = document.getElementById("estado")
    let maintenance = document.getElementById("maintenance_km").value
    let life_time = document.getElementById("life_time_km").value

    if(serial == ''){
        Swal.fire({
            title: "¡ERROR!",
            text: "Numero de serie obligatorio.",
            position: "center",
            showConfirmButton: false,
            timer: 2000,
            imageWidth: 100,
            imageHeight: 100,
            imageUrl: "/images/error.png",
        });

        return
    }

    if(model == ''){
        Swal.fire({
            title: "¡ERROR!",
            text: "El modelo es obligatorio.",
            position: "center",
            showConfirmButton: false,
            timer: 2000,
            imageWidth: 100,
            imageHeight: 100,
            imageUrl: "/images/error.png",
        });

        return
    }

    if(tipo == 'default'){
        Swal.fire({
            title: "¡ERROR!",
            text: "Por favor seleccione un tipo de maquina.",
            position: "center",
            showConfirmButton: false,
            timer: 2000,
            imageWidth: 100,
            imageHeight: 100,
            imageUrl: "/images/error.png",
        });

        return
    }

        if(maintenance == ''){
        Swal.fire({
            title: "¡ERROR!",
            text: "Por favor ingrese KM para su mantenimiento.",
            position: "center",
            showConfirmButton: false,
            timer: 2000,
            imageWidth: 100,
            imageHeight: 100,
            imageUrl: "/images/error.png",
        });

        return
    }

    if(estado.checked){
        

        if(life_time == ''){
            Swal.fire({
                title: "¡ERROR!",
                text: "INGRESE LOS KILOMETROS DE LA MAQUINA USADA.",
                position: "center",
                showConfirmButton: false,
                timer: 2000,
                imageWidth: 100,
                imageHeight: 100,
                imageUrl: "/images/error.png",
            });

            return
        }
    }

    Swal.fire({
        title: "¿DESEA REGISTRAR ESTA MAQUINA?",
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
                title: "Máquina registrada",
                text: "La máquina fue registrada correctamente.",
                position: "center",
                showConfirmButton: false,
                timer: 2500,
                imageWidth: 100,
                imageHeight: 100,
                imageUrl: "/images/maquina-creada.png",
            });

            setTimeout(() => {
                document.getElementById('formulario-maquina').submit()
            }, "2500");

        }
    })
}

window.maquinaUsada = function() {
    const checkbox = document.getElementById('estado');
    const campos = document.getElementById('mantenimiento');
    campos.classList.toggle('hidden', !checkbox.checked);
}

