document.getElementById("formulario").addEventListener("submit", function (event) {
    event.preventDefault();

    // class Patient

    class Patient {

        constructor(nome, sexo, dnasc, dexame, coments, compara, dataant, densito, dmocolo, dmocoloant, dmoft, dmoftant, dmolomb,
            dmolombant, indica, refphy, side, slombar, zslomb, zscolo, zsft) {

            this.nome = nome;
            this.sexo = sexo;
            this.dnasc = dnasc;
            this.dexame = dexame;
            this.coments = coments;
            this.compara = compara;
            this.dataant = dataant;
            this.densito = densito;
            this.dmocolo = dmocolo;
            this.dmocoloant = dmocoloant;
            this.dmoft = dmoft;
            this.dmoftant = dmoftant;
            this.dmolomb = dmolomb;
            this.dmolombant = dmolombant;
            this.indica = indica;
            this.refphy = refphy;
            this.side = side;
            this.slombar = slombar;
            this.zslomb = zslomb;
            this.zscolo = zscolo;
            this.zsft = zsft;
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
        patient.dmocolo, patient.dmocoloant, patient.dmoft, patient.dmoftant,
        patient.dmolomb, patient.dmolombant, patient.indica, patient.refphy,
        patient.side, patient.slombar, patient.zslomb, patient.zscolo, patient.zsft);

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

    // calculo lombar
    function calculolombar() {

        if (patient.zslomb <= -2.0) { resultlombar = "below the expected range for age." }
        else if (patient.zslomb > -2.0) { resultlombar = "within the expected range for age." };
     
        return document.getElementById("resultadolombar").innerHTML = `The BMD measured in the ${patient.slombar} region is: ${patient.dmolomb} g/cm² </br> 
    Z-score = ${patient.tslomb} </br> 
    The result on this region : <b>${resultlombar}</b>.`;

    }
    console.log(calculolombar());

    // calculo femur

    document.getElementById("sidefemur").innerHTML = `${patient.side} FEMUR :`;

    function calculofemur() {

        if (patient.zscolo <= -2.0 || patient.zsft <= -2.0) { resultfemur = "below the expected range for age." }
        else if (patient.zscolo > -2.0 && patient.zsft >= -2.0) { resultfemur = "within the expected range for age." }
        else { resultfemur = "below the expected range for age." };

        return document.getElementById("resultadofemur").innerHTML = `The BMD measured at the femoral neck is: ${patient.dmocolo} g/cm²  <br>
 Z-score = ${patient.tscolo} <br>
 The BMD measured at the total proximal femur is: ${patient.dmoft} g/cm² <br>
 Z-score = ${patient.tsft} <br>
 The result on this region : <b>${resultfemur}</b>.`;

    }
    console.log(calculofemur());

    // calculo resultado
    function resultadofinal() {

        if (patient.zslomb <= -2.0 || patient.zscolo <= -2.0 || patient.zsft <= -2.0) {
            resultfinal = "Exam is below the expected range for age."
        }
        if (patient.zslomb > -2.0 && patient.zscolo > -2.0 && patient.zsft > -2.0) {
            resultfinal = "Exam is within the expected range for age. "
        };

        return document.getElementById("conclusao").innerHTML = ` ${resultfinal} (WHO criteria)`;
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
        var diflomb = patient.dmolomb - patient.dmolombant;
        var difcolo = patient.dmocolo - patient.dmocoloant;
        var difft = patient.dmoft - patient.dmoftant;
        var difpclomb = (diflomb * 100) / patient.dmolombant;
        var difpccolo = (difcolo * 100) / patient.dmocoloant;
        var difpcft = (difft * 100) / patient.dmoftant;

        document.getElementById("compararesult").style.display = "block";
        document.getElementById("comparatext").innerHTML = `The comparison with the technically similar prior
                                study of ${patient.dataant} shows variation of ${diflomb.toFixed(3)} g/cm² (${difpclomb.toFixed(2)}%) in lumbar spine;
                                 ${difcolo.toFixed(3)} g/cm² (${difpccolo.toFixed(2)}%) in femoral neck and 
                                 ${difft.toFixed(3)} g/cm² (${difpcft.toFixed(2)}%) in total hip.`;
    }
    else { document.getElementById("compararesult").style.display = "none" }


    // show report

    document.getElementById("reportresult").style.display = "block"

});





