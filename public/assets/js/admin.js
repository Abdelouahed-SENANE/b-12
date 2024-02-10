const btn_edit = document.getElementById('edit_admin');
const dropdownMenu = document.getElementById('dropdown');

btn_edit.addEventListener('click' , () => {
    if (dropdownMenu.classList.contains('hidden')){
        dropdownMenu.classList.remove('hidden');
    }else {
        dropdownMenu.classList.add('hidden');

    }
})
