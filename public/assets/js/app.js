async function rent(car_id, user_id){
    const resp = document.getElementById("response");
    resp.innerHTML = "Загрузка...";
    const response = await fetch(`${url_rent_car}?car_id=${car_id}&user_id=${user_id}`, {
        headers: {
            'Accept': 'application/json',
        },
    });
    const json = await response.json();
    if (response.ok){
        resp.innerHTML = json.data.message;
    } else {
        resp.innerHTML = `Ошибка: ${json.message}`;
    }
}

document.getElementById("mainForm").addEventListener("submit", async function(e){
    e.preventDefault();
    await rent(
        document.getElementById("car").value,
        document.getElementById("user").value,
    );
});