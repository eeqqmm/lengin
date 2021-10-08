window.addEventListener('load',()=>{

    const debounce = (func, delay) => {
        let debounceTimer
        return function() {
            const context = this
            const args = arguments
            clearTimeout(debounceTimer)
            debounceTimer
                = setTimeout(() => func.apply(context, args), delay)
        }
    }
        $('#search').on('input',debounce((e)=> {

                _this = $('#search')

           if (/^[а-я]{2,}$/.test(_this.val())){
               // больше 2 на кирилицe
               sendAjax()
           } else if (/^[a-z]{1,}|[ЇїІіЄєҐґ]{1,}$/.test(_this.val())) {
                // анг и укр буквы от 1
               addMassage('введите название города на кирилице(без укр. букв) ')
               сlearBlock()
           } else {
               addMassage('')
           }

        },100))

        function addMassage ( msg){
            if (msg == ''){
                $('.result_text').hide()
            } else {
                $('.result_text').text(msg);
                $('.result_text').show()
            }

        }

        function sendAjax (){
            $.ajax({
                url:mainData.ajaxUrl,
                data: {

                    action: 'check_city',
                    data: {
                        name: $('#search').val().toLowerCase(),
                    }
                },
                type: 'POST',
                success: (data) => {
                    if (data) {
                        if (data.success == false){
                            addMassage('Города не найдено')
                            сlearBlock()
                        } else {
                            addMassage('')
                            сlearBlock()
                            dataArray = data.data
                            dataArray.forEach(element =>{
                                $('.result_box')[0].innerHTML = $('.result_box')[0].innerHTML + '<a href="'+element.url+'">'+element.title+'</a>'
                            })
                        }
                    }
                },


            })
        }
        function сlearBlock () {
            $('.result_box')[0].innerHTML = ''
        }
})
