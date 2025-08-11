function toast(tipo, msg) {
    var head = '';
    if(tipo == 'success') head = 'Sucesso!';
    else if(tipo == 'error') head = 'Erro!';
    $.toast({
        text: msg, // Text that is to be shown in the toast
        heading: head, // Optional heading to be shown on the toast
        icon: tipo, // Type of toast icon
        showHideTransition: 'fade', // fade, slide or plain
        allowToastClose: true, // Boolean value true or false
        hideAfter: 1500, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
        stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
        position: 'bottom-center', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
    });
}
