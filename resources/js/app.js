require('./bootstrap');

window.changval = function(sel,ico){
    console.log(sel.value.length);
    if(sel.value.length > 1){ 
        document.getElementById(ico).classList.remove('hidden'); 
        sel.classList.remove('text-gray-400');
        sel.classList.add('text-gray-800');
    }else{ 
        document.getElementById(ico).classList.add('hidden');
        sel.classList.remove('text-gray-800');
        sel.classList.add('text-gray-400');
    }
};
window.clearval = function(ico,sel){
    document.getElementById(sel).value='';
    document.getElementById(sel).classList.remove('text-gray-800');
    document.getElementById(sel).classList.add('text-gray-400');
    ico.classList.add('hidden');
};