var Data = [];
var regex = /^\w+([-+.'][^\s]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
var validation = 0;
var tempObj = {};
function checkNum() {
    if($('input[type=tel]').val()?.length == 10){
        $('.numCheck').hide();   
    }else{
        $('.numCheck').show();
    }
}
function validator(formId, buttonId, path, validatingFields, compId = null, arr = null) {
    $('input[type=tel]').on('keyup', function(){
        checkNum();
    });
    checkNum();
    $(buttonId).on("click", function (e) {
        e.preventDefault();
        var formData = new FormData();
        const objectSize = Object.keys(validatingFields).length;
        for (i = 0; i < objectSize; i++) {
            var id = validatingFields[i]['id'];
            var type = validatingFields[i]['type'];
            var message = validatingFields[i]['message'];
            var required = validatingFields[i]['required'] == undefined ? true : validatingFields[i]['required'];
            if (!message) {
                message = 'Input Fields must be filled';
            }
            if(arr){
                var inputElement = $(`input[name=${id}]`);
            }else{
                var inputElement = $(`#${id}`);
            }

            if (required) {
                if (type === 'number') {
                    if (inputElement.val()) {
                        if(arr){
                            tempObj[id] = inputElement.map((i, e) => e.value).get();
                        }else{
                            formData.append(id, inputElement.val());
                        }
                        validation = 1;
                    } else {
                        errorResponser(message, inputElement);
                        validation = 0;
                    }
                } else if (type === 'file') {
                    if (inputElement.val()) {
                        if(arr){
                            tempObj[id] = inputElement.map((i, e) => e.files.length > 0 ? e.files[0].name: 'default.jpg').get();
                        }else{
                            formData.append(id, $('#' + id)[0].files[0]);
                        }
                        validation = 1;
                    } else {
                        errorResponser(message, inputElement);
                        validation = 0;
                    }
                } else if (type === 'email') {
                    if (inputElement.val() && regex.test(inputElement.val())) {
                        if(arr){
                            tempObj[id] = inputElement.map((i, e) => e.value).get();
                        }else{
                            formData.append(id, inputElement.val());
                        }
                        validation = 1;
                    } else {
                        errorResponser(message, inputElement);
                        validation = 0;
                    }
                } else {
                    if (inputElement.val()) {
                        if(arr){
                            tempObj[id] = inputElement.map((i, e) => e.value).get();
                        }else{
                            formData.append(id, inputElement.val());
                        }
                        validation = 1;
                    } else {
                        errorResponser(message, inputElement);
                        validation = 0;
                    }
                }
            } else {
                if (type === 'file') {
                    if(arr){
                        tempObj[id] = inputElement.map((i, e) => e.files.length > 0 ? e.files[0].name : 'default.jpg').get();
                    }else{
                        formData.append(id, $('#' + id)[0].files[0]);
                    }
                    validation = 1;
                } else {
                    if(arr){
                        tempObj[id] = inputElement.map((i, e) => e.value).get();
                    }else{
                        formData.append(id, inputElement.val());
                    }
                    validation = 1;
                }
            }
        }
        if (validation === 1) {
            formAjaxSubmit(path, formId, formData, compId, buttonId, arr);
        } else {
            msgResponser('Please Fill The Above Details Correctly!', $(buttonId));
        }
    });
    $('input[type=tel]').addClass('input-num');

    $(".input-num").keydown(function (e) {
        if ((e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
            (e.keyCode >= 35 && e.keyCode <= 40) ||
            $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1) {
            return;
        }
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) &&
            (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
}

function formAjaxSubmit(url, formId, formData, compId, buttonId, arr) {
    var btn = $(buttonId);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    if (compId != null) {
        if(arr){
            tempObj['compId'] = compId;
        }else{
            formData.append('compId', compId);
        }
    }
    $.ajax({
        type: "POST",
        url: url,
        data: arr ? JSON.stringify(tempObj) : formData,
        dataType: "json",
        async: true,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {
            btn.attr("disabled", true);
            btn.addClass('spinner');
        },
        success: function (response) {
            Data = JSON.parse(JSON.stringify(response));
            $(formId)[0].reset();
            msgResponser(Data["message"], btn);
            if (Data["response"]) {
                setInterval(() => {
                    location.reload();
                }, 2500)
            }
            if(Data["stepper"]){
                stepper.next();
            }
        },
        error: function () {
            msgResponser("Please Fill Above Details Correctly.", btn);
            btn.attr("disabled", false);
            btn.removeClass('spinner');
            $("#preview").remove();
        },
    }).done(function () {
        btn.attr("disabled", false);
        btn.removeClass('spinner');
        //$("#preview").remove();
    });
}

function errorResponser(msg, element) {
    element.css("border", "1px solid #ff6666");
    element.after(
        `<span class="errorResponser" style="color:red;"> ${msg} </span>`
    ).slideDown();
    setTimeout(() => {
        element.css("border", "1px solid #ced4da");
        $(".errorResponser").remove();
    }, 1500);
}

function msgResponser(msg, element) {
    element.after(
        `<div class="msgResponser alert-info mt-3 p-3 text-center"> ${msg} </div>`
    ).slideDown();
    setTimeout(() => {
        $(".msgResponser").remove();
    }, 3500);
}