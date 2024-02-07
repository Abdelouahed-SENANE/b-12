const tabs = document.querySelectorAll('.tab');
const forms = document.querySelectorAll('.form');
console.log(forms)
tabs.forEach((tab , index) => {
    tab.addEventListener('click' , () => {
        tabs.forEach(tab => {tab.classList.remove('active_tab')})
        tab.classList.add('active_tab');

        forms.forEach(form => { form.classList.remove('active')})
        forms[index].classList.add('active');

    })
})
