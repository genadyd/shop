 export const brandDelete =()=>{
    const delete_buttons = document.querySelectorAll('.items_list .one_item .delete_button');
    if(delete_buttons.length>0){
        delete_buttons.forEach((item)=>{
            item.addEventListener('click',(e)=>{
                e.preventDefault()
               const target = e.target
                const href =target.closest('a').getAttribute('href')
                if(confirm("Are you sure?")){
                    window.location.href = href
                }

            })
        })
    }
 }
