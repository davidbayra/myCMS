const page = {
    ajaxMethod: 'POST',

    add: function () {
        const formData = new FormData();

        formData.append('title', $('#formTitle').val());
        formData.append('content', $('.redactor-editor').html());

        $.ajax({
            url: '/page/add',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {

            },
            success: function (result) {
                console.log(result);
            }
        });
    }
};

console.log(page);
