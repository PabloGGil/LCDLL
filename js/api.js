// const listaPoke;
let url="https://pokeapi.co/api/V2/pokemon/1";

// for (let i=1;i<10;i++){
    fetch(url)
        .then((response) => response.json())
        .then(data=>{console.log(data)})
// }