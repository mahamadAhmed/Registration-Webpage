// Add an event listener to the getActorsButton
const getActorsButton = document.getElementById("get-actors-button");
getActorsButton.addEventListener("click", function () {
  const birthdateInput = document.getElementById("birthdate");
  const date = birthdateInput.value;
  // Extract the month and day from the date
  const month = date.substring(5, 7);
  const day = date.substring(8, 10);

  // Fetch actors born on the given date
  fetch(`/actors/bio?month=${month}&day=${day}`)
    .then(response => response.json())
    .then(data => {
      const actors = data.actors;

      // Create a container for the actor names
      const actorContainer = document.createElement("div");

      for (let i = 0; i < actors.length; i++) {
        // Create a paragraph element for each actor's name
        const actorName = document.createElement("p");
        actorName.textContent = actors[i].name;

        // Append the actor name to the container
        actorContainer.appendChild(actorName);
      }

      // Append the actor container to the page
      const container = document.getElementById("container");
      container.appendChild(actorContainer);
    })
    .catch(error => console.log(error));
});
