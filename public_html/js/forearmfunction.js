document.getElementById("formulario").addEventListener("submit", function (event) {
    event.preventDefault();

    // class Patient

    class Patient {

        constructor(nome, sexo, dnasc, dexame, coments, compara, dataant, densito, dmoforearm,
            dmolombant, indica, refphy, side, tsforearm) {

            this.nome = nome;
            this.sexo = sexo;
            this.dnasc = dnasc;
            this.dexame = dexame;
            this.coments = coments;
            this.compara = compara;
            this.dataant = dataant;
            this.densito = densito;
            this.dmoforearm = dmoforearm;
            this.dmolombant = dmolombant;
            this.indica = indica;
            this.refphy = refphy;
            this.side = side;
            this.tsforearm = tsforearm
        }
    }

    // campos formulario

    var fields = document.querySelectorAll("#formulario [name]");
    var patient = {};

    fields.forEach(function (field, index) {

        if (field.name == "sexo" || field.name == "compara" || field.name == "side" || field.name == "indica") {

            if (field.checked) {

                patient[field.name] = field.value;
            }
        } else {
            patient[field.name] = field.value;

        }
    });

    var objpatient = new Patient(patient.nome, patient.sexo, patient.dnasc, patient.dexame, patient.coments,
        patient.compara, patient.dataant, patient.densito,
        patient.dmoforearm, patient.dmolombant, patient.indica, patient.refphy,
        patient.side, patient.tsforearm);

    console.log(objpatient);

    // clinical data 

    document.getElementById("ptecnica").innerHTML = `A DXA scan was performed on ${patient.dexame} using a ${patient.densito} densitometer.`;

    document.getElementById("namerep").innerHTML = `Name: ${patient.nome}.`;

    document.getElementById("gender").innerHTML = `Gender: ${patient.sexo}.`;

    // calculo idade

    var dnasc = Date.parse(document.getElementById("dnasc").value);
    var dexame = Date.parse(document.getElementById("dexame").value);
    var diferenca = Math.abs(dexame - dnasc);
    var idade = Math.ceil(diferenca / (1000 * 60 * 60 * 24) / 365)
    console.log(idade);
    document.getElementById("age").innerHTML = `Age: ${idade} years.`;


    // ref physician

    function referphy() {

        var refphy = document.getElementById("refphy").value;

        return document.getElementById("referphy").innerHTML = `${refphy}`;

    }
    console.log(referphy());
    
    // indication
    document.getElementById("indicat").innerHTML = `${patient.indica}`;

    // calculo forearm 

    document.getElementById("sidefemur").innerHTML = `${patient.side} FOREARM :`;

    function calculolombar() {

        if (patient.tsforearm <= -2.5) { resultlombar = "Osteoporosis" }
        else if (patient.tsforearm >= -1.0) { resultlombar = "Normal" }
        else { resultlombar = "Osteopenia" };

        return document.getElementById("resultadolombar").innerHTML = `The BMD measured at 33% Radius : ${patient.dmoforearm} g/cm² </br> 
    T-score = ${patient.tsforearm} </br> 
    The result on this region : <b>${resultlombar}</b>.`;

    }
    console.log(calculolombar());

    // calculo resultado
    function resultadofinal() {

        if (patient.tsforearm >= -2.5) {
            resultfinal = "OSTEOPENIA."
        }
        if (patient.tsforearm <= -2.5) {
            resultfinal = "OSTEOPOROSIS."
        }
        if (patient.tsforearm >= -1.0) {
            resultfinal = "NORMAL EXAM. "
        };

        return document.getElementById("conclusao").innerHTML = `Based on BMD diagnosis is consistent with ${resultfinal} (WHO criteria)`;
    }
    console.log(resultadofinal());

    // coments

    function tecquality() {

        var coments = document.getElementById("coments").value;

        return document.getElementById("tecqual").innerHTML = `${coments}`;

    }
    console.log(tecquality());


    // comparacao

    if (patient.compara == "yes") {
        var diflomb = patient.dmoforearm - patient.dmolombant;
        var difpclomb = (diflomb * 100) / patient.dmolombant;
     
        document.getElementById("compararesult").style.display = "block";
        document.getElementById("comparatext").innerHTML = `The comparison with the technically similar prior
                                study of ${patient.dataant} shows variation of ${diflomb.toFixed(3)} g/cm² (${difpclomb.toFixed(2)}%) in forearm.`
                            }
                            
    else { document.getElementById("compararesult").style.display = "none" }


    // show report

    document.getElementById("reportresult").style.display = "block"

});





