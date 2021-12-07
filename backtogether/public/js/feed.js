function enableEventFields(){
    const sv = document.getElementById('event_switch').checked;

    document.getElementById('event_link').disabled = !(sv);
    document.getElementById('event_location').disabled = !(sv);

    if (sv) {
        document.getElementById('event_link').classList.add('event-field');
        document.getElementById('event_location').classList.add('event-field');
    } else {
        document.getElementById('event_link').classList.remove('event-field');
        document.getElementById('event_location').classList.remove('event-field');
    }
}

function Filter() {
    let value = document.getElementById('filter').value;

    foreach()
}