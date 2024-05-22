document.addEventListener("DOMContentLoaded", function () {
    var table = document.getElementById("d");


    window.addEventListener("onload", async function () {
        let baseUrl = "http://localhost/practicesD/web/backend/index.php?d";
        let options = {
            method: "GET",
            headers: {
                "Content-Type": "application/json"
            }
        };
        let response = await fetch(baseUrl, options);
        let data = await response.json();
        let tabla = "";
        tabla = `
                            <table class="table table-striped ">
                                <thead>
                                    <tr>
                                    <th scope="col">data1</th>
                                    <th scope="col">data2</th>
                                    <th scope="col">data3</th>
                                    <th scope="col">data4</th>
                                    <th scope="col">data5</th>
                                    <th scope="col">data6</th>
                                    </tr>
                                </thead>
                            <tbody>
                            `;
        data.forEach(element => {
        });
        tabla += `</tbody>
                            </table>`;
        table.innerHTML = tabla;
    })
});