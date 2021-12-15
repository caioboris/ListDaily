function initQuagga() {
    Quagga.init(
        {
            inputStream: {
                name: "Live",
                type: "LiveStream",
                target: document.querySelector("#scanbarcode"), // Or '#yourElement' (optional)
            },
            decoder: {
                readers: ["ean_reader"],
            },
        },
        function (err) {
            if (err) {
                console.log(err);
                return;
            }
            console.log("Initialization finished. Ready to start");
            Quagga.start();
        }
    );

    Quagga.onDetected(function (data) {
        console.log(data);
        let hiddenInput = document.getElementById("barcode_input");
        hiddenInput.value = data.codeResult.code;
        let form = document.getElementById("barcodeForm");
        form.submit();
        Quagga.stop();

        //post("./codigos.php", data.codeResult.code);
    });
}

function Adicionar(
    ID,
    Nome,
    Marca,
    Quantidade,
    PesoPorUnidade,
    Medida,
    Comprado,
    UltimoPreco
) {
    var prod = Nome;
    var marca = Marca;
    var qnt = Quantidade;
    var pesoun = PesoPorUnidade;
    var medida = Medida;
    var comprado = Comprado;
    var ultimopreco = UltimoPreco;

    var row = document.createElement("tr");
    row.id = ID;

    var me = document.createElement("td");
    me.innerHTML = medida;

    var p = document.createElement("td");
    p.innerHTML = prod;

    var m = document.createElement("td");
    m.innerHTML = marca;

    var q = document.createElement("td");
    q.innerHTML = qnt;

    var pe = document.createElement("td");
    pe.innerHTML = pesoun;

    var del = document.createElement("td");
    var delbtn = document.createElement("button");
    delbtn.innerHTML = '<i class="fas fa-trash-alt"></i>';

    delbtn.onclick = function () {
        post("./deletar.php", ID);
    };

    var checkbtn = document.createElement("button");
    checkbtn.onclick = function () {
        post("./alterar.php", ID);
    };

    del.appendChild(delbtn);
    del.appendChild(checkbtn);

    row.appendChild(p);
    row.appendChild(q);
    row.appendChild(m);
    row.appendChild(pe);
    row.appendChild(me);
    if (comprado == 0) {
        var tbody = document.getElementById("estoqueprodutos");
        checkbtn.innerHTML = '<i class="fas fa-cart-plus"></i>';
    } else {
        var tbody = document.getElementById("listaprodutos");
        checkbtn.innerHTML = '<i class="fas fa-check"></i>';
        var up = document.createElement("td");
        up.innerHTML = ultimopreco;
        row.appendChild(up);
    }
    row.appendChild(del);

    tbody.appendChild(row);

    addmodal.style.display = "none";
    addlistamodal.style.display = "none";
}

spanbarcode.onclick = function () {
    barcode.style.display = "none";
    Quagga.stop();
};

/*spandel.onclick = function(){
    delmodal.style.display = "none";
}*/

window.onclick = function (event) {
    if (
        event.target == addmodal ||
        event.target == addlistamodal ||
        event.target == barcode
    ) {
        addmodal.style.display = "none";
        addlistamodal.style.display = "none";
        barcode.style.display = "none";
        Quagga.stop();
    }
};

function post(path, param, method = "post") {
    const form = document.createElement("form");
    form.method = method;
    form.action = path;

    const hiddenField = document.createElement("input");
    hiddenField.type = "hidden";
    hiddenField.name = "idprodutodel";
    hiddenField.value = param;

    form.appendChild(hiddenField);

    document.body.appendChild(form);
    form.submit();
}
