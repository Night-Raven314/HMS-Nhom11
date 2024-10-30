//Function To Display Popup
function div_show() {
    document.getElementById('container-popup').style.display = "block";
}
//Function to Hide Popup
function div_hide() {
    const target = document.querySelector('popupFormContainer')

    document.addEventListener('click', (event) => {
        const withinBoundaries = event.composedPath().includes(target)

        if (withinBoundaries) {
            
        } else {
            document.getElementById('container-popup').style.display = "none";
        }
    })
}

