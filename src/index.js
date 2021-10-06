window.addEventListener('load',()=>{
    $('#search').on('input', (e) => {
        $.ajax({
            url:mainData.ajaxUrl,
            data: {

                action: 'check_city',
                data: {
                    name: $('#search').val(),
                }
            },
            type: 'POST',
            success: (data) => {
                if (data) {
                    console.log(data);
                }
            },


        })
    })
})