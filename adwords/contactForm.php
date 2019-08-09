<!-- <script type="text/javascript">
    sendContactInfoBDS();
    function sendContactInfoBDS() {
        $(document).ready(function() {
            $('body').on('click','.start-submit-contact', function() {
                var valueGmail = document.getElementById("contentGmail").value;
                var valuePhone = document.getElementById("contentPhone").value;
                var valueMessage = document.getElementById("contentSendChat").value;
                var errorMessage = document.getElementById("error-message");

                errorMessage.style.padding = "10px";
                var text;
                if (valueGmail == '') {
                    text = "Vui lòng nhập email";
                    errorMessage.innerHTML = text;
                    return false;
                }
                var regexEmailCheck = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/i;
                if (regexEmailCheck.test(valueGmail) == false){
                    text = "Email chưa đúng định dạng";
                    errorMessage.innerHTML = text;
                    return false;  
                }
                if(valueGmail.length < 6){
                    text = "Email ít nhất là 6 kí tự";
                    errorMessage.innerHTML = text;
                    return false;
                }
        
                // CHECK VALIDATE MOBILE
                var regexCheckPhone = /((09|03|07|08|05)+([0-9]{8})\b)/g;
                if(valuePhone == '') {
                    text = "Vui lòng nhập số điện thoại";
                    errorMessage.innerHTML = text;
                    return false;
                }
                if (isNaN(valuePhone) || valuePhone.length != 10) {
                    text = "Vui lòng kiểm tra lại số điện thoại";
                    errorMessage.innerHTML = text;
                    return false;
                }
                if (regexCheckPhone.test(valuePhone) == false) {
                    text = "Số điện thoại của bạn không đúng định dạng";
                    errorMessage.innerHTML = text;
                    return false;
                }
                // CHECK CONTENT SEND
                if(valueMessage == ''){
                    text = "Vui lòng nhập nội dung gửi";
                    errorMessage.innerHTML = text;
                    return false;
                }
                if(valueMessage.length < 60){
                    text = "Nội dung ít nhất là 60 kí tự";
                    errorMessage.innerHTML = text;
                    return false;
                }
                var chatID = '-325119794';
                // var chatID = '@nhom_test_nhe';
                var keyAPI = '936786321:AAGe3QiE-QV-p1pLK44wlVAbAfkO-_1lprw';
                var urlTelegramAPI = 'https://api.telegram.org/bot'+keyAPI+'/sendMessage?chat_id='+chatID+'&text='+valueGmail+" - "+valuePhone+" - "+valueMessage+'';
                var successSend = document.getElementById('success-message');
                successSend.style.padding = "10px";
                $.ajax({
                    url: urlTelegramAPI,
                    type: 'POST',
                    data: { valueGmail : valueGmail,
                            valuePhone : valuePhone,
                            valueMessage : valueMessage
                    }, success: function () {
                        $('#formSendInfoContact input[id="contentGmail"]').val('');
                        $('#formSendInfoContact input[id="contentPhone"]').val('');
                        $('#formSendInfoContact textarea[id="contentSendChat"]').val('');
                        $.ajaxSetup({cache:false});
                    }
                });
                text = "Nội dung đã gửi thành công";
                successSend.innerHTML = text;
                $('#error-message').hide();
                setTimeout(function() {$('#success-message').fadeOut('fast');}, 200);
                return true;
            });
        });
    }
</script> -->

<div class="main-section-contact-form-chatbox">
    <div class="row border-chat">
        <div class="col-md-12 col-sm-12 col-xs-12 first-section contact-form-chatbox">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-6 left-first-section">
                    <p>Hỗ trợ 24/7 - 0909 58 8080</p>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6 right-first-section">
                    <a><i class="fa fa-minus" aria-hidden="true"></i></a>
                    <a><i class="fa fa-clone" aria-hidden="true"></i></a>
                    <a><i class="fa fa-times" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
    
    <form method="post" id="formSendInfoContact" onsubmit="return false;">
        <div class="row border-chat">
            <div id="error-message"></div>
            <div id="success-message" class="alert alert-success"></div>
            <div class="col-md-12 col-sm-12 col-xs-12 second-section">
                <div class="chat-section">
                    <div class="col-lg-12 col-md-12 col-12 mt-3">
                        <div class="input-group contact-chatbox-gmail">
                            <input type="text" class="form-control" placeholder="Gmail" id="contentGmail">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-12 mt-3">
                        <div class="input-group">
                            <input type="phone" class="form-control" placeholder="Số điện thoại" id="contentPhone">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-12 mt-3">
                        <div class="input-group">
                            <textarea type="text" class="form-control" placeholder="Nội dung gởi" id="contentSendChat"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-12 mt-3">
                        <button type="submit" class="btn btn-primary w-100 submit-btn start-submit-contact">Gởi đi hoặc gọi 0909 58 8080</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>