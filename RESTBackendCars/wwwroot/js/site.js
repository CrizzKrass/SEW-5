const uri = 'api/cars';
let cars = [];

function getItems() {
    fetch(uri)
        .then(response => response.json())
        .then(data => _displayItems(data))
        .catch(error => console.error('Unable to get items.', error));
}

function addItem() {

    const item = {
        hersteller: document.getElementById('hersteller').value,
        typenbezeichnung: document.getElementById('typ').value,
        verkaufspreis: document.getElementById('preis').value,
        service: document.getElementById('service').value,
        leistung: document.getElementById('leistung').value,
        kmStand: document.getElementById('km').value
    };

    fetch(uri, {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(item)
    })
        .then(response => response.json())
        .then(() => {
            getItems();
        })
        .catch(error => console.error('Unable to add item.', error));
}

function deleteItem(id) {
    fetch(`${uri}/${id}`, {
        method: 'DELETE'
    })
        .then(() => getItems())
        .catch(error => console.error('Unable to delete item.', error));
}

function displayEditForm(id) {
    const item = cars.find(item => item.id === id);

    document.getElementById('edit-id').value = item.id;
    document.getElementById('edit-hersteller').value = item.hersteller;
    document.getElementById('edit-typ').value = item.typenbezeichnung;
    document.getElementById('edit-preis').value = item.verkaufspreis;
    document.getElementById('edit-service').value = item.service;
    document.getElementById('edit-leistung').value = item.leistung;
    document.getElementById('edit-km').value = item.kmStand;
    document.getElementById('editForm').style.display = 'block';
}

function updateItem() {
    const itemId = document.getElementById('edit-id').value;
    const item = {
        id: itemId,
        hersteller: document.getElementById('edit-hersteller').value,
        typenbezeichnung: document.getElementById('edit-typ').value,
        verkaufspreis: document.getElementById('edit-preis').value,
        service: document.getElementById('edit-service').value,
        leistung: document.getElementById('edit-leistung').value,
        kmStand: document.getElementById('edit-km').value
    };

    fetch(`${uri}/${itemId}`, {
        method: 'PUT',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(item)
    })
        .then(() => getItems())
        .catch(error => console.error('Unable to update item.', error));

    closeInput();

    return false;
}

function closeInput() {
    document.getElementById('editForm').style.display = 'none';
}

function _displayCount(itemCount) {
    const name = (itemCount === 1) ? 'to-do' : 'to-dos';

    document.getElementById('counter').innerText = `${itemCount} ${name}`;
}

function _displayItems(data) {
    const tBody = document.getElementById('todos');
    tBody.innerHTML = '';

    _displayCount(data.length);

    const button = document.createElement('button');

    data.forEach(item => {

        let editButton = button.cloneNode(false);
        editButton.innerText = 'Edit';
        editButton.setAttribute('onclick', `displayEditForm(${item.id})`);

        let deleteButton = button.cloneNode(false);
        deleteButton.innerText = 'Delete';
        deleteButton.setAttribute('onclick', `deleteItem(${item.id})`);

        let tr = tBody.insertRow();

        let td1 = tr.insertCell(0);
        td1.appendChild(document.createTextNode(item.hersteller));

        let td2 = tr.insertCell(1);
        td2.appendChild(document.createTextNode(item.typenbezeichnung));

        let td3 = tr.insertCell(2);
        td3.appendChild(document.createTextNode(item.verkaufspreis));

        let td4 = tr.insertCell(3);
        td4.appendChild(document.createTextNode(item.service));

        let td5 = tr.insertCell(4);
        td5.appendChild(document.createTextNode(item.leistung));

        let td6 = tr.insertCell(5);
        td6.appendChild(document.createTextNode(item.kmStand));

        let td7 = tr.insertCell(6);
        td7.appendChild(editButton);

        let td8 = tr.insertCell(7);
        td8.appendChild(deleteButton);
    });

    cars = data;
}