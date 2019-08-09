sendContactInfoBDS();
function sendContactInfoBDS() {
    $(document).ready(function() {
        function autoRemoveError(errorMessage){
            setTimeout(function(){
                errorMessage.style.padding = "0px";
                errorMessage.innerHTML = "";
            }, 2000);
        }
        $('body').on('click', '.start-submit-contact', function() {
            var valueGmail = document.getElementById("contentGmail").value;
            var valuePhone = document.getElementById("contentPhone").value;
            var valueMessage = document.getElementById("contentSendChat").value;
            var errorMessage = document.getElementById("error-message");

            errorMessage.style.padding = "10px";
            var text;
            if (valueGmail == '') {
                text = "Vui lòng nhập email";
                errorMessage.innerHTML = text;
                
                autoRemoveError(errorMessage);
                return false;
            }
            var regexEmailCheck = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/i;
            if (regexEmailCheck.test(valueGmail) == false) {
                text = "Email chưa đúng định dạng";
                errorMessage.innerHTML = text;
                autoRemoveError(errorMessage);
                return false;
            }
            if (valueGmail.length < 6) {
                text = "Email ít nhất là 6 kí tự";
                errorMessage.innerHTML = text;
                autoRemoveError(errorMessage);
                return false;
            }

            // CHECK VALIDATE MOBILE
            var regexCheckPhone = /((09|03|07|08|05)+([0-9]{8})\b)/g;
            if (valuePhone == '') {
                text = "Vui lòng nhập số điện thoại";
                errorMessage.innerHTML = text;
                autoRemoveError(errorMessage);
                return false;
            }
            if (isNaN(valuePhone) || valuePhone.length != 10) {
                text = "Vui lòng kiểm tra lại số điện thoại";
                errorMessage.innerHTML = text;
                autoRemoveError(errorMessage);
                return false;
            }
            if (regexCheckPhone.test(valuePhone) == false) {
                text = "Số điện thoại của bạn không đúng định dạng";
                errorMessage.innerHTML = text;
                autoRemoveError(errorMessage);
                return false;
            }
            // CHECK CONTENT SEND
            if (valueMessage == '') {
                text = "Vui lòng nhập nội dung gửi";
                errorMessage.innerHTML = text;
                autoRemoveError(errorMessage);
                return false;
            }
            if (valueMessage.length < 60) {
                text = "Nội dung ít nhất là 60 kí tự";
                errorMessage.innerHTML = text;
                autoRemoveError(errorMessage);
                return false;
            }
            var chatID = '-325119794';
            // var chatID = '@nhom_test_nhe';
            var keyAPI = '936786321:AAGe3QiE-QV-p1pLK44wlVAbAfkO-_1lprw';
            var urlTelegramAPI = 'https://api.telegram.org/bot' + keyAPI + '/sendMessage?chat_id=' + chatID + '&text=' + valueGmail + " - " + valuePhone + " - " + valueMessage + '';
            var successSend = document.getElementById('success-message');
            successSend.style.padding = "10px";
            $.ajax({
                url: urlTelegramAPI,
                type: 'POST',
                data: {
                    valueGmail: valueGmail,
                    valuePhone: valuePhone,
                    valueMessage: valueMessage
                },
                success: function() {
                    $('#formSendInfoContact input[id="contentGmail"]').val('');
                    $('#formSendInfoContact input[id="contentPhone"]').val('');
                    $('#formSendInfoContact textarea[id="contentSendChat"]').val('');
                    $.ajaxSetup({
                        cache: false
                    });
                }
            });
            text = "Nội dung đã gửi thành công";
            successSend.innerHTML = text;
            $('#error-message').hide();
            setTimeout(function() {
                $('#success-message').fadeOut('fast');
            }, 200);
            return true;
        });
    });
}