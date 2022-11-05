let xhr = new XMLHttpRequest();

xhr.open("GET","./server.php",true);

xhr.responseType = "json";

xhr.addEventListener("load", (event) => {
    console.log(xhr.response);
    console.log(event.target.response);
});

xhr.send(null);