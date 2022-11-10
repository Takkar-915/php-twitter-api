const getTwitterInformation = async() => {
    const url = "http://localhost/PHP/twitter-api/server.php";

    const json = await fetch(url)
        .then(res => {
            return res.json()
        }).catch(error => {
            console.error("取得失敗",error)
            return null
    });
};

getTwitterInformation();