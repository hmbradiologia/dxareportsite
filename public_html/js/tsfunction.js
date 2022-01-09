document.getElementById("formulario").addEventListener("submit", function (event) {
    event.preventDefault();

    // class Patient

    class Patient {

        constructor(nome, sexo, dnasc, dexame, coments, compara, dataant, densito, dmocolo, dmocoloant, dmoft, dmoftant, dmolomb,
            dmolombant, indica, refphy, side, slombar, tslomb, tscolo, tsft) {

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
            this.tslomb = tslomb;
            this.tscolo = tscolo;
            this.tsft = tsft;
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
        patient.side, patient.slombar, patient.tslomb, patient.tscolo, patient.tsft);

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

        if (patient.tslomb <= -2.5) { resultlombar = "Osteoporosis" }
        else if (patient.tslomb >= -1.0) { resultlombar = "Normal" }
        else { resultlombar = "Osteopenia" };

        return document.getElementById("resultadolombar").innerHTML = `The BMD measured in the ${patient.slombar} region is: ${patient.dmolomb} g/cm² </br> 
    T-score = ${patient.tslomb} </br> 
    The result on this region : <b>${resultlombar}</b>.`;

    }
    console.log(calculolombar());

    // calculo femur

    document.getElementById("sidefemur").innerHTML = `${patient.side} FEMUR :`;
    var resultFemurContent = '';
    function calculofemur() {

        if (patient.tscolo <= -2.5 || patient.tsft <= -2.5) { resultfemur = "Osteoporosis" }
        else if (patient.tscolo >= -1.0 && patient.tsft >= -1.0) { resultfemur = "Normal" }
        else { resultfemur = "Osteopenia" };
        
        resultFemurContent = `<p>The BMD measured at the femoral neck is: ${patient.dmocolo} g/cm²</p>
            <p>T-score = ${patient.tscolo} </p>
            <p>The BMD measured at the total proximal femur is: ${patient.dmoft} g/cm² </p>
            <p>T-score = ${patient.tsft} </p>
            <p>The result on this region : <b>${resultfemur}</b>.</p>`;

        return document.getElementById("resultadofemur").innerHTML = `The BMD measured at the femoral neck is: ${patient.dmocolo} g/cm²  <br>
            T-score = ${patient.tscolo} <br>
            The BMD measured at the total proximal femur is: ${patient.dmoft} g/cm² <br>
            T-score = ${patient.tsft} <br>
            The result on this region : <b>${resultfemur}</b>.`;
    }
    console.log(calculofemur());

    // calculo resultado
    function resultadofinal() {

        if (patient.tslomb >= -2.5 && patient.tslomb < -1.0 || patient.tscolo >= -2.5 && patient.tscolo < -1.0 || patient.tsft >= -2.5 && patient.tsft < -1.0) {
            resultfinal = "OSTEOPENIA."
        }
        if (patient.tslomb <= -2.5 || patient.tscolo <= -2.5 || patient.tsft <= -2.5) {
            resultfinal = "OSTEOPOROSIS."
        }
        if (patient.tslomb >= -1.0 && patient.tscolo >= -1.0 && patient.tsft >= -1.0) {
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

    // PDF genetare
    let ptecnicaPDF = `<p>A DXA scan was performed on ${patient.dexame} using a ${patient.densito} densitometer.</p>`;
    let namerepPDF = `<p>Name: ${patient.nome}.</p>`;
    let agePDF = `<p>Age: ${idade} years.</p>`;
    let genderPDF = `<p>Gender: ${patient.sexo}.</p>`;
    let referphyPDF = `<p>${document.getElementById("refphy").value}</p>`;
    //let indicatPDF = `<p>${patient.indica}</p>`;
    let resultadolombarPDF = `${resultFemurContent}`;
    let sidefemurPDF = `<p>${patient.side} FEMUR :</p>`;
    let resultadofemurPDF = `The BMD measured at the femoral neck is: ${patient.dmocolo} g/cm²  <br>`;
    let conclusaoPDF = `<p>Based on BMD diagnosis is consistent with ${resultfinal} (WHO criteria)</p>`;
    let tecqualPDF = `<p>${document.getElementById("coments").value}</p>`;
    let comparatextPDF = `<p>The comparison with the technically similar prior</p>`;

    const doc = new jsPDF()
    doc.fromHTML(`<html><head><title>Report</title><h1>Dual-Energy X-ray Absorptiometry (DXA) Report</h1> ${ptecnicaPDF} 
    <h3>Clinical History:</h3>
    ${patient.nome ? namerepPDF : ''}
    ${idade ? agePDF : ''}
    ${patient.sexo ? genderPDF : ''}
    <b>Referring Physician:</b>
    ${referphyPDF ? referphyPDF : ''}
    <h3>Results:</h3>
    <b>LUMBAR SPINE:</b>
    ${resultadolombarPDF ? resultadolombarPDF : ''}
    <b>LEFT FEMUR :</b>
    ${sidefemurPDF ? sidefemurPDF : ''}
    ${resultadofemurPDF ? resultadofemurPDF : ''}
    <h3>IMPRESSION:</h3>
    ${conclusaoPDF ? conclusaoPDF : ''}
    ${tecqualPDF ? tecqualPDF : ''}
    ${comparatextPDF ? comparatextPDF : ''}
    </head><body></body></html>`)
    doc.output('dataurlnewwindow');
    doc.save('Report.pdf');

});





