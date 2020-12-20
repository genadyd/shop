import _AbstractFormProcessor from "/public/scripts/Forms/_AbstractFormProcessor.js";

class FormsProcessor extends _AbstractFormProcessor {
    constructor(api, validator) {
        super(api, validator)
        this.brandSelect()
        this.categorySelect()
        this.sendForm()
    }
    sendForm() {
        const form = document.querySelector('.content_container form')
        const button = form.querySelector('input[type="submit"]')
        if (!button) return
        button.addEventListener("click", (e) => {
            e.preventDefault()
            this.flags = []
            const collection = this.formFieldsCollect(form)
            debugger
            this.formValidator(collection)
            if (this.flags.every(val => val)) {
                form.setAttribute('enctype','multipart/form-data')
                let c =  this.formGetCrypt()
                    /*get crypt for form sequre ++++*/
                    const cryptField = form.querySelector('#crypt')
                    if (cryptField && c) cryptField.value = c
                    form.submit()
            }
        })
    }

   formGetCrypt() {
        return  document.querySelector('meta[name="adml"]').getAttribute('content')
    }

    brandSelect(){
        const form = document.querySelector('.content_container form')
       const brands = document.querySelectorAll('.brand_card')
        brands.forEach((br)=>{
            br.addEventListener('click',(e)=>{
                const target = e.currentTarget
                const id = target.dataset.id
               const brandInput = form.querySelector('input#brand')
                brandInput.value = id
                brands.forEach((b)=>{
                    b.classList.remove('selected')
                })
                target.classList.add('selected')

            })
        })
    }
    categorySelect(){
        const form = document.querySelector('.content_container form')
        const cats = document.querySelectorAll('.category_card')
        cats.forEach((br)=>{
            br.addEventListener('click',(e)=>{
                const target = e.currentTarget
                const id = target.dataset.id
                const catInput = form.querySelector('input#category')
                catInput.value = id
                cats.forEach((b)=>{
                    b.classList.remove('selected')
                })
                target.classList.add('selected')

            })
        })
    }

}

export default FormsProcessor

