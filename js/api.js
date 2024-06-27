const apiUrl = 'https://pokeapi.co/api/v2/pokemon?limit=10';

// Función para obtener los datos de un Pokémon por su URL
function getPokemonData(url) {
  return fetch(url)
    .then(response => response.json())
    .then(data => {
      // Extraer el nombre, imagen y peso del Pokémon
      const pokemon = {
        name: data.name,
        image: data.sprites.front_default,
        weight: data.weight
      };
      return pokemon;
    })
    .catch(error => {
      console.error('Error al obtener los datos del Pokémon:', error);
    });
}

// Función para obtener la lista de Pokémon y luego sus detalles
function getAllPokemon() {
  fetch(apiUrl)
    .then(response => response.json())
    .then(data => {
      const pokemonList = data.results;
      const pokemonDetailsPromises = pokemonList.map(pokemon => getPokemonData(pokemon.url));

      // Esperar a que todas las promesas se resuelvan
      Promise.all(pokemonDetailsPromises)
        .then(pokemonDetailsArray => {
          console.log('Detalles de los Pokémon:', pokemonDetailsArray);
          // Aquí puedes manejar los detalles de cada Pokémon como desees
          // Por ejemplo, mostrar la información en el DOM
          displayPokemonDetails(pokemonDetailsArray);
        });
    })
    .catch(error => {
      console.error('Error al obtener la lista de Pokémon:', error);
    });
}

// Función para mostrar los detalles de los Pokémon en el DOM
function displayPokemonDetails(pokemonDetailsArray) {
  const container = document.getElementById('cardPokemon-container');
  pokemonDetailsArray.forEach(pokemon => {
    const pokemonElement = document.createElement('div');
    pokemonElement.innerHTML = `
      <h3>${pokemon.name}</h3>
      <img src="${pokemon.image}" alt="${pokemon.name}">
      <p>Peso: ${pokemon.weight}</p>
    `;
    container.appendChild(pokemonElement);
  });
}

// Llamar a la función para obtener y mostrar los Pokémon
getAllPokemon();