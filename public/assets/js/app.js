const tabs = document.querySelectorAll('.tab');
const forms = document.querySelectorAll('.form');
const toggle_btn = document.getElementById("toggle_menu");
const navbar = document.getElementById("navbar");
const edit_control = document.getElementById("edit_control");
const my_profile = document.getElementById("my_profile");
const container_image = document.getElementById('upload-container');
const field_img = document.getElementById('field_img');
const btn_image = document.getElementById('button_img');

tabs.forEach((tab, index) => {
    tab.addEventListener('click', () => {
        tabs.forEach(tab => {
            tab.classList.remove('active_tab')
        })
        tab.classList.add('active_tab');

        forms.forEach(form => {
            form.classList.remove('active')
        })
        forms[index].classList.add('active');

    })
})

if (toggle_btn){
    toggle_btn.addEventListener('click', () => {
        if (navbar.classList.contains('h-0')) {
            navbar.classList.remove('h-0');
            navbar.classList.add('h-[230px]');
        }else{
            navbar.classList.add('h-0');
            navbar.classList.remove('h-[230px]');
        }
    })
}
if (edit_control){
    edit_control.addEventListener('click' , () => {
        if (my_profile.classList.contains('opacity-0')){
            my_profile.classList.remove('opacity-0')
            my_profile.classList.remove('invisible')
            my_profile.classList.remove('translate-y-[40px]')
            my_profile.classList.add('translate-y-[15px]')
        }else{
            my_profile.classList.add('opacity-0')
            my_profile.classList.add('invisible')
            my_profile.classList.add('translate-y-[40px]')
            my_profile.classList.remove('translate-y-[15px]')
        }
    })
}


if (btn_image) {
    btn_image.addEventListener('click' , () => {
        if (container_image.classList.contains('invisible')){
            container_image.classList.remove('invisible');
            container_image.classList.remove('opacity-0');
            field_img.classList.remove('translate-y-[-180%]');
            field_img.classList.add('translate-y-[-100%]');

        }
    })
}
function closeImg() {
    container_image.classList.add('invisible');
    field_img.classList.add('translate-y-[-180%]');
    container_image.classList.add('opacity-0');

    field_img.classList.remove('translate-y-[-100%]');
}
