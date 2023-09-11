function aboutLot(id){
  //const item = pins.find(pin => pin.id == id)
 const container = document.querySelector(`.data-container[data-id="${id}"]`)
 const show = container.getAttribute("data-show");

  if(show == "true"){
    container.style.display = "none";
    container.setAttribute("data-show", "false");
  } else {
    container.style.display = "flex";
    container.setAttribute("data-show", "true");
  }
}

function showMode(){
  const labelsButton = document.getElementById("labels-button");

  labelsButton.addEventListener("click", () => {
    const labels = document.querySelectorAll(".label");
    if (labelsButton.getAttribute("status") == "hidden") {
      labels.forEach((label) => {
        label.style.display = "flex";
      });
      labelsButton.setAttribute("status", "show");
      labelsButton.innerHTML = '<i class="fa-solid fa-eye"></i>';
    } else if (labelsButton.getAttribute("status") == "show") {
      labels.forEach((label) => {
        label.style.display = "none";
      });
      labelsButton.setAttribute("status", "hidden");
      labelsButton.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
    }
  }); // event responsible for show and hide the labels

  const mapContainer = document.querySelector("#map");
  const pinContainer = mapContainer.querySelector("#pins");
  const listPin = document.querySelector(".list-pins");

  mapContainer.addEventListener("click", (event) => {
    if (event.target.classList.contains("pin")) {
      return;
    }
    const selected = document.querySelector(".pin.selected");
    if(selected){
      selected.classList.remove("selected");
      selected.classList.remove("locate");
      const labelsButton = document.getElementById("labels-button");
      if (labelsButton.getAttribute("status") == "hidden"){
          const id = selected.getAttribute("data-id");
          document.querySelector(`[label-id="${id}"]`).style.display = "none";
      }
      
    }
  }); // deselect selected item on map

  const toPinElements = pins.map(function(pin) {
    const pinInMap = document.createElement("div");
    pinInMap.classList.add("pin");
    pinInMap.setAttribute('data-id', pin.id);
    pinInMap.setAttribute('data-name', pin.name);
    pinInMap.setAttribute('data-x', pin.x);
    pinInMap.setAttribute('data-y', pin.y);
    pinInMap.style.left = `${pin.x}%`;
    pinInMap.style.top = `${pin.y}%`;
    const label = document.createElement("div");
    label.classList.add("label");
    label.setAttribute('label-id', pin.id);
    label.innerHTML = pin.name;
    pinInMap.append(label);

    pinInMap.addEventListener("click", function () {
      const selected = document.querySelector(".pin.selected");
      if (selected) {
        selected.classList.remove("selected");
        selected.classList.remove("locate");
        const id = selected.getAttribute("data-id");
        document.querySelector(`[label-id="${id}"]`).style.display = "none";
      } else {
        pinInMap.classList.add("selected");
        const id = pinInMap.getAttribute("data-id");
        document.querySelector(`[label-id="${id}"]`).style.display = "flex";
      }
    }); // to select the pin

    return pinInMap;
    
  }); // load items of array in map

  pinContainer.append(...toPinElements);

  const toPinList = pins.map(function(pin) {
    const pinInList = document.createElement("div");
    pinInList.classList.add("pin-in-list");
    pinInList.setAttribute('data-id', pin.id);
    pinInList.setAttribute('data-name', pin.name);
    const locate = document.createElement("div");
    locate.classList.add("locate");
    const bttn = document.createElement("div");
    bttn.classList.add("bttn");
    bttn.classList.add("inverse");
    bttn.setAttribute('data-id', pin.id);
    bttn.setAttribute('id', 'locate-pin-button');
    bttn.innerHTML = '<i class="fa fa-location-dot"></i>';
    bttn.addEventListener("click", () => {
      const deselected = mapContainer.querySelector(".pin.selected");
      const selected = mapContainer.querySelector(`[data-id="${bttn.getAttribute('data-id')}"]`);
      if (deselected) {
        deselected.classList.remove("selected");
        deselected.classList.remove("locate");
        const deselectedId = deselected.getAttribute("data-id");
        document.querySelector(`[label-id="${deselectedId}"]`).style.display =
          "none";
        selected.classList.add("selected");
        selected.classList.add("locate");
        const selectedId = selected.getAttribute("data-id");
        const labelsButton = document.getElementById("labels-button");
        if (labelsButton.getAttribute("status") == "show"){
          document.querySelector(`[label-id="${selectedId}"]`).style.display = "flex";
        } else {
          document.querySelector(`[label-id="${selectedId}"]`).style.display = "none";
        }
      } else {
        selected.classList.add("selected");
        selected.classList.add("locate");
        const selectedId = selected.getAttribute("data-id");
        const labelsButton = document.getElementById("labels-button");
        if (labelsButton.getAttribute("status") == "show"){
          document.querySelector(`[label-id="${selectedId}"]`).style.display = "flex";
        } else {
          document.querySelector(`[label-id="${selectedId}"]`).style.display = "none";
        }
      }
      document.getElementById("filter-pin").style = "display: none;";	
      });
    const item = document.createElement("div");
    item.classList.add("item");
    const name = document.createElement("div");
    name.classList.add("name");
    const nameP = document.createElement("p");
    nameP.innerHTML = pin.name;
    const url = document.createElement("a")
    url.innerHTML = '<i class="fa-solid fa-link"></i>'
    url.href = pin.url;
    const infos = document.createElement("div");
    infos.classList.add("infos");
    const desc = document.createElement("p");
    desc.innerHTML = `<div class="data-about"> <span> ${pin.Descricao} </span> <i id="about" onclick="aboutLot(${bttn.getAttribute('data-id')})" class="fa-solid fa-caret-right"></i> </div> <div class="data-container" data-show="false" data-id=${bttn.getAttribute('data-id')}><div class="data-content">
    <div class="data">
          <p data-falecido=""> Falecido: ${pin.Falecido} </p>
          <div class="medidas"> <p data-comprimento=""> Medidas: ${pin.Comprimento}x${pin.Altura} </p></div>
          <div class="status"> <p data-vazio=""> Lote Vazio? ${pin.Lote_vazio} </p> <p data-reservado="">  Lote Reservado? ${pin.Reservado} </p> </div>
          <p data-setor="">Setor: ${pin.Setor} </p>
          <p data-quadra="">Quadra: ${pin.Quadra} </p>
        </div>
      </div></div>`;
    infos.append(desc);

      pinInList.append(locate);
      locate.append(bttn);
      pinInList.append(item);
      item.append(name);
      item.append(infos);
      item.append(infos);
      name.append(nameP);
      infos.append(desc);
      name.append(url)

    return pinInList;
    
  }); // load items of array in list

  listPin.append(...toPinList);

  const filterPinButton = document.getElementById("filter-pin-button");
  const closeFilter = document.getElementById("closeFilter");

  filterPinButton.addEventListener("click", () => {
    document.getElementById("filter-pin").style =
      "flex-wrap: wrap; display: flex;";
  }); // event responsible for enter filter screen

  closeFilter.addEventListener("click", () => {
    document.getElementById("filter-pin").style = "display: none;";
  }); // event responsible for exit filter screen

  const searchInput = document.getElementById("search");

  searchInput.addEventListener("input", (e) => {
    const items = listPin.querySelectorAll("div[data-name]");
    let Itemsfiltered;
    if (e.target.value === "") {
      Itemsfiltered = items;
    } else {
      Itemsfiltered = Array.from(items).filter((item) =>
          item.getAttribute("data-name").toLowerCase().includes(e.target.value.toLowerCase()) ||

          (item.querySelector(".pin-in-list .infos p span").textContent).toLowerCase().includes(e.target.value.toLowerCase()) 
        );
    }
    items.forEach((item) => (item.style.display = "none"));
    Itemsfiltered.forEach((item) => (item.style.display = "flex"));
  }); // event responsible for search and filter items
}

function editMode(){
    const menuButton = document.getElementById("menu-button");
    const labelsButton = document.getElementById("labels-button");

    menuButton.addEventListener("click", () => {
      if (menuButton.getAttribute("status") === "false") {
        document.querySelector(".pin-buttons").style.display = "block";
        menuButton.setAttribute("status", "true");
      } else {
        document.querySelector(".pin-buttons").style.display = "none";
        menuButton.setAttribute("status", "false");
      }
    }); // event responsible for show and hide the menu

    labelsButton.addEventListener("click", () => {
      const labels = document.querySelectorAll(".label");
      if (labelsButton.getAttribute("status") == "hidden") {
        labels.forEach((label) => {
          label.style.display = "flex";
        });
        labelsButton.setAttribute("status", "show");
        labelsButton.innerHTML = '<i class="fa-solid fa-eye"></i>';
      } else if (labelsButton.getAttribute("status") == "show") {
        labels.forEach((label) => {
          label.style.display = "none";
        });
        labelsButton.setAttribute("status", "hidden");
        labelsButton.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
      }
    }); // event responsible for show and hide the labels

    
    const mapContainer = document.querySelector("#map");
    const image = mapContainer.querySelector("img");
    const widthX = image.offsetWidth;
    const heightY = image.offsetHeight;
    const pinContainer = mapContainer.querySelector("#pins");
    const listPin = document.querySelector(".list-pins");
    var isDragging = false;
    
    pins.map(function(pin) {
      addPin(pin) 
    }); // load items of array in list

    mapContainer.addEventListener("click", (event) => {

      if (event.target.classList.contains("pin")) {
        return;
      }

      const selected = document.querySelector(".pin.selected");
      if (!isDragging && !selected) {
        const pin = {
          x: ((event.offsetX / widthX) * 98).toFixed(2),
          y: ((event.offsetY / heightY) * 98).toFixed(2)
        }
        addPin(pin);
      } else {
        if(selected){
          selected.classList.remove("selected");
          selected.classList.remove("locate");
          const labelsButton = document.getElementById("labels-button");
          if (labelsButton.getAttribute("status") == "hidden"){
              const id = selected.getAttribute("data-id");
              document.querySelector(`[label-id="${id}"]`).style.display = "none";
          }
          
        }
      }
    }); // adding items when clicking somewhere on the map

    mapContainer.addEventListener("mousedown", function () {
      isDragging = true;
    }); // event responsible for starting moving items around the map

    mapContainer.addEventListener("mouseup", function () {
      isDragging = false;
    }); // event responsible for finishing moving items around the map

    mapContainer.addEventListener("mousemove", function (event) {
      const selected = document.querySelector(".pin.selected");
      const x = ((event.offsetX / widthX) * 98).toFixed(2);
      const y = ((event.offsetY / heightY) * 98).toFixed(2);
      if (isDragging && selected) {
        selected.style.left = `${x}%`;
        selected.style.top = `${y}%`;
        const id = selected.getAttribute("data-id");
        selected.setAttribute("data-x", x);
        selected.setAttribute("data-y", y);
        const pin = pins.find((pin) => pin.id == id);
        pin.x = x;
        pin.y = y;
      }
    }); // event responsible for moving items around the map

    function addPin(pin) {
      let item;
      if(pin.up){
        item = pin
      } else {
        item = { id: increment,
        name: `item ${increment}`, 
        x: pin.x, 
        y: pin.y, 
        Descricao: "",
        up: 0 
        };
        pins.push(item);
        increment++
      }
      addPinElements(item);
    } // function responsible for adding items to the array

    function addPinElements(pin) {
      
      const pinInMap = document.createElement("div");
      pinInMap.classList.add("pin");
      pinInMap.setAttribute('data-id', pin.id);
      pinInMap.setAttribute('data-name', pin.name);
      pinInMap.setAttribute('data-x', pin.x);
      pinInMap.setAttribute('data-y', pin.y);
      pinInMap.style.left = `${pin.x}%`;
      pinInMap.style.top = `${pin.y}%`;
      const label = document.createElement("div");
      label.classList.add("label");
      label.setAttribute('label-id', pin.id);
      label.innerHTML = pin.name;
      pinInMap.append(label);

      pinInMap.addEventListener("click", function () {
        const selected = document.querySelector(".pin.selected");
        if (selected) {
          selected.classList.remove("selected");
          selected.classList.remove("locate");
          const id = selected.getAttribute("data-id");
          document.querySelector(`[label-id="${id}"]`).style.display = "none";
        } else {
          pinInMap.classList.add("selected");
          const id = pinInMap.getAttribute("data-id");
          document.querySelector(`[label-id="${id}"]`).style.display = "flex";
        }
      });

      pinContainer.append(pinInMap);

      const pinInList = document.createElement("div");
      pinInList.classList.add("pin-in-list");
      pinInList.setAttribute('data-id', pin.id);
      pinInList.setAttribute('data-name', pin.name);
      const locate = document.createElement("div");
      locate.classList.add("locate");
      const bttn = document.createElement("div");
      bttn.classList.add("bttn");
      bttn.classList.add("inverse");
      bttn.setAttribute('data-id', pin.id);
      bttn.setAttribute('id', 'locate-pin-button');
      bttn.innerHTML = '<i class="fa fa-location-dot"></i>';
      bttn.addEventListener("click", () => {
        const deselected = mapContainer.querySelector(".pin.selected");
        const selected = mapContainer.querySelector(`[data-id="${bttn.getAttribute('data-id')}"]`);
        if (deselected) {
          deselected.classList.remove("selected");
          deselected.classList.remove("locate");
          const deselectedId = deselected.getAttribute("data-id");
          document.querySelector(`[label-id="${deselectedId}"]`).style.display =
            "none";
          selected.classList.add("selected");
          selected.classList.add("locate");
          const selectedId = selected.getAttribute("data-id");
          const labelsButton = document.getElementById("labels-button");
          if (labelsButton.getAttribute("status") == "show"){
            document.querySelector(`[label-id="${selectedId}"]`).style.display = "flex";
          } else {
            document.querySelector(`[label-id="${selectedId}"]`).style.display = "none";
          }
        } else {
          selected.classList.add("selected");
          selected.classList.add("locate");
          const selectedId = selected.getAttribute("data-id");
          const labelsButton = document.getElementById("labels-button");
          if (labelsButton.getAttribute("status") == "show"){
            document.querySelector(`[label-id="${selectedId}"]`).style.display = "flex";
          } else {
            document.querySelector(`[label-id="${selectedId}"]`).style.display = "none";
          }
        }
        document.getElementById("filter-pin").style = "display: none;";	
        });
      const item = document.createElement("div");
      item.classList.add("item");
      const name = document.createElement("div");
      name.classList.add("name");
      const nameP = document.createElement("p");
      nameP.innerHTML = pin.name;
      const url = document.createElement("a")
      url.innerHTML = '<i class="fa-solid fa-link"></i>'
      url.href = pin.url;
      const infos = document.createElement("div");
      infos.classList.add("infos");

        if(pin.up){
        const desc = document.createElement("p");
        desc.innerHTML = `<div class="data-about"> <span> ${pin.Descricao} </span> <i id="about" onclick="aboutLot(${bttn.getAttribute('data-id')})" class="fa-solid fa-caret-right"></i> </div> <div class="data-container" data-show="false" data-id=${bttn.getAttribute('data-id')}><div class="data-content">
        <div class="data">
              <p data-falecido=""> Falecido: ${pin.Falecido} </p>
              <div class="medidas"> <p data-comprimento=""> Medidas: ${pin.Comprimento}x${pin.Altura} </p></div>
              <div class="status"> <p data-vazio=""> Lote Vazio? ${pin.Lote_vazio} </p> <p data-reservado="">  Lote Reservado? ${pin.Reservado} </p> </div>
              <p data-setor="">Setor: ${pin.Setor} </p>
              <p data-quadra="">Quadra: ${pin.Quadra} </p>
            </div>
          </div></div>`;
        infos.append(desc);
        }

        pinInList.append(locate);
        locate.append(bttn);
        pinInList.append(item);
        item.append(name);
        item.append(infos);
        item.append(infos);
        name.append(nameP);
        name.append(url)

        listPin.append(pinInList);


    } // function responsible for adding items in map and list

    const editPinButton = document.getElementById("edit-pin-button");

    editPinButton.addEventListener("click", () => {
      const selectedPin = document.querySelector(".pin.selected");

      if (selectedPin) {
        document.getElementById("edit-pin").style = "display: flex";

        const div = document.getElementById("form");
        const select = div.querySelector("select");
        const button = div.querySelector("button");

        if (select && button) {
          select.remove();
          button.remove();
        }

        const id = selectedPin.getAttribute("data-id");
        EditNamePin(id);
      } else {
        alert("Por favor selecione um item para editar");
      }
    }); // event responsible for enter edit screen

    const closeEdit = document.getElementById("closeEdit");

    closeEdit.addEventListener("click", () => {
      document.getElementById("edit-pin").style = "display: none;";
    }); // event responsible for exit edit screen

    function EditNamePin(id) {
      const div = document.querySelector("#form");
      const chooseName = document.createElement("select");
      const selectOption = document.createElement("option");
      selectOption.value = "";
      selectOption.disabled = true
      selectOption.selected = true
      selectOption.hidden = true
      selectOption.innerHTML = "Selecione uma opção";
      chooseName.appendChild(selectOption)
      const unallocateds = pinsUnallocated.map(function(unallocated) {
        unallocatedOption = document.createElement("option");
        unallocatedOption.value = unallocated.lote_id;
        unallocatedOption.innerHTML = unallocated.name;

        return unallocatedOption

      })
      chooseName.append(...unallocateds) 
      const editButton = document.createElement("button");
      editButton.innerHTML = '<i class="fa-solid fa-check"></i>';
      div.appendChild(chooseName);
      div.appendChild(editButton);

      editButton.addEventListener("click", () => {
        if (chooseName.value) {
          const unallocated = pinsUnallocated.find((pin) => pin.lote_id == chooseName.value);
          const allocated = pins.find((pin) => pin.id == id);

          unallocated.id = Number(id)
          unallocated.x = allocated.x
          unallocated.y = allocated.y
          allocated.x = null
          allocated.y = null

          if(allocated.up == 1) pinsUnallocated.push(allocated);
          pins.push(unallocated);

          const removeUnallocated = pinsUnallocated.findIndex((pin) => pin.lote_id == chooseName.value);
          pinsUnallocated.splice(removeUnallocated, 1);

          const removeAllocated = pins.findIndex((pin) => pin.id == id);
          pins.splice(removeAllocated, 1);

          const pinElement = document.querySelectorAll(`[data-id="${id}"]`);
          pinElement.forEach((element) => {
            element.setAttribute("data-name", unallocated.name);
          });

          const pinInList = listPin.querySelector(`[data-id="${id}"]`); 
          const nameClass = pinInList.querySelector(".name");
          const name = nameClass.querySelector("p");
          name.innerHTML = unallocated.name;

          const label = document.querySelector(`[label-id="${id}"]`)
          label.innerHTML = unallocated.name;
          
          const infos = pinInList.querySelector(".infos");
          infos.innerHTML = `<div class="data-about"> <span> ${unallocated.Descricao} </span> <i id="about" onclick="aboutLot(${id})" class="fa-solid fa-caret-right"></i> </div> <div class="data-container" data-show="false" data-id=${id}><div class="data-content">
            <div class="data">
              <p data-falecido=""> ${unallocated.Falecido} </p>
              <div class="medidas"> <p data-comprimento=""> ${unallocated.Comprimento} </p> <p data-altura=""> ${unallocated.Altura} </p></div>
              <div class="status"> <p data-vazio=""> ${unallocated.Lote_vazio} </p> <p data-reservado=""> ${unallocated.Reservado} </p> </div>
              <p data-cemiterio=""> ${unallocated.Cemiterio} </p>
              <p data-setor=""> ${unallocated.Setor} </p>
              <p data-quadra=""> ${unallocated.Quadra} </p>
            </div>
            </div></div>`;
        

          document.getElementById("edit-pin").style.display = "none";
          chooseName.remove();
          editButton.remove();
        } else {
          alert("Por favor selecione uma opção");
        }
      });
    } // function responsible to update items in array and html

    const deletePinButton = document.getElementById("delete-pin-button");

    deletePinButton.addEventListener("click", () => {
      const selectedPin = document.querySelector(".pin.selected");
      if (selectedPin) {
        const id = selectedPin.getAttribute("data-id");
        removePin(id);
      } else {
        alert("Por favor selecione um item para excluir");
      }
    }); // event responsible for pass the selected item to the removePin function

    function removePin(id) {
      const pinElement = document.querySelectorAll(`[data-id="${id}"]`);

      pinElement.forEach((element) => {
        element.remove();
      });

      const allocated = pins.find((pin) => pin.id == id);
      if(allocated.up == 1){
        allocated.x = null
        allocated.y = null
        delete allocated.id;
        pinsUnallocated.push(allocated)
      }

      const index = pins.findIndex((pin) => pin.id == id);
      pins.splice(index, 1);
      
    } // function responsible to delete items in array and html

    const filterPinButton = document.getElementById("filter-pin-button");
    const closeFilter = document.getElementById("closeFilter");

    filterPinButton.addEventListener("click", () => {
      document.getElementById("filter-pin").style =
        "flex-wrap: wrap; display: flex;";
    }); // event responsible for enter filter screen

    closeFilter.addEventListener("click", () => {
      document.getElementById("filter-pin").style = "display: none;";
    }); // event responsible for exit filter screen

    const searchInput = document.getElementById("search");

    searchInput.addEventListener("input", (e) => {
      const items = listPin.querySelectorAll("div[data-name]");
      let Itemsfiltered;
      if (e.target.value === "") {
        Itemsfiltered = items;
      } else {
        Itemsfiltered = Array.from(items).filter((item) =>
          item.getAttribute("data-name").toLowerCase().includes(e.target.value.toLowerCase()) ||

          (item.querySelector(".pin-in-list .infos p span").textContent).toLowerCase().includes(e.target.value.toLowerCase()) 
        );
      }
      items.forEach((item) => (item.style.display = "none"));
      Itemsfiltered.forEach((item) => (item.style.display = "flex"));
    }); // event responsible for search and filter items

    const leftItem = document.getElementById("left");
    const upItem = document.getElementById("up");
    const downItem = document.getElementById("down");
    const rightItem = document.getElementById("right");

    leftItem.addEventListener("click", () => {
      const selected = document.querySelector(".pin.selected");
      if (selected) {
        const current = parseFloat(selected.style.left, 10) || 0;
        if (current >= 1) {
          leftItem.style = "color: #3c4b64;";
          const x = `${current - 0.5}`;
          selected.style.left = `${x}%`;
          const id = selected.getAttribute("data-id");
          selected.setAttribute("data-x", x);
          const pin = pins.find((pin) => pin.id == id);
          pin.x = x;
        }
      } else {
        alert("Por favor selecione um item para mover");
      }
    }); // event responsible for moving selected item to left

    upItem.addEventListener("click", () => {
      const selected = document.querySelector(".pin.selected");
      if (selected) {
        const current = parseFloat(selected.style.top, 10) || 0;
        if (current >= 0) {
          upItem.style = "color: #3c4b64;";
          const y = `${current - 0.5}`;
          selected.style.top = `${y}%`;
          const id = selected.getAttribute("data-id");
          selected.setAttribute("data-y", y);
          const pinInList = listPin.querySelector(`[data-id="${id}"]`);
          const infosClass = pinInList.querySelector(".infos");
          const pin = pins.find((pin) => pin.id == id);
          pin.y = y;
        }
      } else {
        alert("Por favor selecione um lote para mover");
      }
    }); // event responsible for moving selected item to up

    downItem.addEventListener("click", () => {
      const selected = document.querySelector(".pin.selected");
      if (selected) {
        const current = parseFloat(selected.style.top, 10) || 0;
        if (current <= 93) {
          downItem.style = "color: #3c4b64;";
          const y = `${current + 0.5}`;
          selected.style.top = `${y}%`;
          const id = selected.getAttribute("data-id");
          selected.setAttribute("data-y", y);
          const pinInList = listPin.querySelector(`[data-id="${id}"]`);
          const infosClass = pinInList.querySelector(".infos");
          const pin = pins.find((pin) => pin.id == id);
          pin.y = y;
        }
      } else {
        alert("Por favor selecione um lote para mover");
      }
    }); // event responsible for moving selected item to down

    rightItem.addEventListener("click", () => {
      const selected = document.querySelector(".pin.selected");
      if (selected) {
        const current = parseFloat(selected.style.left, 10) || 0;
        if (current <= 97) {
          rightItem.style = "color: #3c4b64;";
          const x = `${current + 0.5}`;
          selected.style.left = `${x}%`;
          const id = selected.getAttribute("data-id");
          selected.setAttribute("data-x", x);
          const pin = pins.find((pin) => pin.id == id);
          pin.x = x;
        }
      } else {
        alert("Por favor selecione um lote para mover");
      }
    }); // event responsible for moving selected item to right

}