function dropDown(){
    document.getElementById(menuDropDown).classList.toggle("show");
}

window.onclick = function(event) {
    if (!event.target.matches('.dropBtn')){
        let  dropdowns = document.getElementsByClassName("dropdown-content");
        let i;
        for (i = 0; < dropdowns.length; i++) {
            let openDropDown = dropdowns[i];
        if (openDropDown.classList.contains('show')){
            openDropDown.classList.remove('show');
        }        }
    }
}