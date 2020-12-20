import _AbstractFormProcessor from "/public/scripts/Forms/_AbstractFormProcessor.js";

class FormsProcessor extends _AbstractFormProcessor {
    constructor(api, validator) {
        super(api, validator)
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

}

export default FormsProcessor

