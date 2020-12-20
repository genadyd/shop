export const floatMenuOpenClose = ()=>{
    const button = document.querySelector('#main_header .header_content .menu_button_area .material-icons')
    const floatMenu = document.getElementById('float_menu_container')
    if(button){
        button.addEventListener('click',(e)=>{
            if([...e.target.closest('.menu_button_area').classList].includes('open_mode')
                && [...floatMenu.classList].includes('open')){
                floatMenu.classList.remove('open')
                e.target.closest('.menu_button_area').classList.remove('open_mode')
                button.innerText = 'list'
            }else{
                e.target.closest('.menu_button_area').classList.add('open_mode')
                floatMenu.classList.add('open')
                button.innerText = 'close'
            }
        })
    }
}
