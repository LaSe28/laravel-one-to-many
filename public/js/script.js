let popup = document.querySelector('#popup')

let btnDelete = document.querySelectorAll('.btn-delete')
let title = document.querySelector('#title')
var currentUrl = window.location.href;
if (currentUrl.includes('/posts?')){
    let form = document.querySelector('#form-delete')
    btnDelete.forEach(button => {
        button.addEventListener('click' , function(){
            let id = this.closest('tr').dataset.id;
            let postTitle = this.closest('tr').dataset.title;
            title.innerHTML = postTitle
            console.log(title.innerHTML.length)
            let rep = form.dataset.base.replace('*****', id);
            form.action = rep;
            popup.classList.remove('d-none');
            popup.classList.add('d-flex');
        })
    })
    let btnSi = document.querySelector('#btn-si').addEventListener('click', function(){
        form.submit()
    })
}

let btnDeleteShow = document.querySelector('.btn-delete-show')

if (btnDeleteShow){
    let form = document.querySelector('#form-delete')
        btnDeleteShow.addEventListener('click' , function(){
            popup.classList.remove('d-none');
            popup.classList.add('d-flex');
    })
    let btnSi = document.querySelector('#btn-si').addEventListener('click', function(){
        form.submit()
    })
}


let slugBtn = document.querySelector('#slug')
if (slugBtn) {
    let slugInput = document.querySelector('#slug-input')
    let titleInput = document.querySelector('#title-input')

    slugBtn.addEventListener('click' , function() {
        let slug = titleInput.value.split(' ').join('-')
        slugInput.value = slug
    })
}
