//http://localhost/practiceD/index.php?dk
document.addEventListener("DOMContentLoaded", function(){
    const createButton = document.getElementById("create");
    const readButton = document.getElementById("read");    
    const selectButton = document.getElementById("select");

    createButton.addEventListener("click", async function () {
        let data1 = document.createElement("data1").value;
        const baseUrl ="http://localhost/practiceD/index.php?dk/" + data1;
        const formdata = new FormData(document.getElementById("dForm"));
        let options = {
            method: "POST",
            mode: "cors",
            body: formdata
        };
        let response = await fetch(baseUrl, options);
        if(response.ok){
            console.log("Sikeres feltöltés");
        }else{
            console.error("Sikertelen feltöltés");
        }
        return response;
    });

    readButton.addEventListener("click", async function(){
        const baseUrl ="http://localhost/practiceD/index.php?dk";
        let options = {
            method: "GET",
            mode: "cors"
        }
        let response = await fetch(baseUrl, options);
        if(response.ok){
            let data = await response.json();
            dListazas(data);
        }else{
            console.error("Hiba a szerver válaszában");
        }

    });

    function dListazas(dk){
        let doDiv = document.getElementById("dlista");
        let tablazat = dFejlec();
        for(let d of dk){
            tablazat += dSor(d);
        }
        dDiv.innerHTML = tablazat + "</tbody></tbody>";
        return dDiv;
    };

    function dSor(d){
        let sor = `<tr>
        <td>${d.data1}</td>
        <td>${d.data2}</td>
        <td>${d.data3}</td>
        <td>${d.data4}</td>
        <td>${d.data5}</td>
        <td>${d.data6}</td>
        </tr>`;
        return sor;
    };

    function dFejlec(){
        let fejlec = `<table class="table table-striped">
        <thead>
            <tr>
                <th>data1: </th>
                <th>data2: </th>
                <th>data3: </th>
                <th>data4: </th>
                <th>data5: </th>
                <th>data6: </th>                
            </tr>
        </thead>
        <tbody>`;
        return fejlec;
    };
});