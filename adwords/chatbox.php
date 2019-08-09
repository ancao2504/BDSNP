<script type="text/javascript">
    function chatDatetime() {
        var today = new Date();
        var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        var dateTime = date+' '+time;
        return dateTime;
    }

    function sendMsg() {
        $(document).ready(function() {
            $bodyMessenger = $('#formSendMsg input[type="text"]').val();
            var chatID = '-318130430';
            var valueChat = $('#valueChat').val();
            var urlTelegramAPI = 'https://api.telegram.org/bot936786321:AAGe3QiE-QV-p1pLK44wlVAbAfkO-_1lprw/sendMessage?chat_id='+chatID+'&text='+valueChat+'';
            if(valueChat == ''){
                return false;
            }
            var imagesAdmin = '/wp-content/themes/adwords/images/man01.png';

            var dateTimeChat = chatDatetime();
            $.ajax({
                url: urlTelegramAPI,
                type: 'POST',
                data: { $bodyMessenger : $bodyMessenger 
                }, success: function () {
                    $('#formSendMsg input[type="text"]').val('');
                    $('.chat-section ul').html('<li>\
                                                    <div class="left-chat">\
                                                        <img src="'+imagesAdmin+'">\
                                                        <p>'+$bodyMessenger+'</p>\
                                                        <span id="datetime-chat">'+dateTimeChat+'</span>\
                                                    </div>\
                                                </li>');
                    $.ajaxSetup({cache:false});
                }
            });
        });
    }

    // Bắt sự kiện gõ phím enter trong thanh trò chuyện
    $('#formSendMsg input[type="text"]').keypress(function () {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            // Chạy hàm gửi tin nhắn
            sendMsg();
        }
    });

    // Bắt sự kiện click vào thanh trò chuyện
    $('#formSendMsg input[type="text"]').click(function (e) {
        // Kéo hết thanh cuộn trình duyệt đến cuối
        window.scrollBy(0, $(document).height());
    });
</script>
<div class="main-section">
	<div class="row border-chat">
		<div class="col-md-12 col-sm-12 col-xs-12 first-section">
			<div class="row">
				<div class="col-md-8 col-sm-6 col-xs-6 left-first-section">
					<p>Hỗ trợ 247</p>
				</div>
				<div class="col-md-4 col-sm-6 col-xs-6 right-first-section">
					<a><i class="fa fa-minus" aria-hidden="true"></i></a>
					<a><i class="fa fa-clone" aria-hidden="true"></i></a>
					<a><i class="fa fa-times" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>
	</div>
    <form method="post" id="formSendMsg" onsubmit="return false;">
        <div class="row border-chat">
            <div class="col-md-12 col-sm-12 col-xs-12 second-section">
                <div class="chat-section">
                    <ul>
                        
                        <!-- <?php 
                            echo $urlTelegramAPI;
                            $xhtml = '';
                            $get_updates = file_get_contents("https://api.telegram.org/bot936786321:AAGe3QiE-QV-p1pLK44wlVAbAfkO-_1lprw/getUpdates");
                            $get_updates  = json_decode($get_updates, true);
                            
                            $results = $get_updates['result'];
                            $last_update_num = count($results)-1;
                            $update = $results[$last_update_num];
                            foreach($results as $update) {
                                $message = $update['message'];
                                $text = $message['text'];
                                
                                $xhtml.= '<li>
                                            <div class="left-chat">
                                                <img src="'.get_template_directory_uri().'/images/man01.png">
                                                
                                                <p>'.$text.'</p>
                                                <span>2 min</span>
                                            </div>
                                        </li>';
                            }
                            echo $xhtml;
                        ?> -->
                        <!-- <li>
                            <div class="right-chat">
                                <img src="">
                                <p>Lorem ipsum dolor sit ameeserunt.</p>
                                <span>2 min</span>
                            </div>
                        </li>
                        <li>
                            <div class="left-chat">
                                <img src="">
                                <p>Lorem ipsum dolor sit ameeserunt.</p>
                                <span>2 min</span>
                            </div>
                        </li>
                        <li>
                            <div class="right-chat">
                                <img src="">
                                <p>Lorem ipsum dolor sit ameeserunt.</p>
                                <span>2 min</span>
                            </div>
                        </li>
                        <li>
                            <div class="left-chat">
                                <img src="">
                                <p>Lorem ipsum dolor sit ameeserunt.</p>
                                <span>2 min</span>
                            </div>
                        </li>
                        <li>
                            <div class="right-chat">
                                <img src="">
                                <p>Lorem ipsum dolor sit ameeserunt.</p>
                                <span>2 min</span>
                            </div>
                        </li>
                        <li>
                            <div class="left-chat">
                                <img src="">
                                <p>Lorem ipsum dolor sit ameeserunt.</p>
                                <span>2 min</span>
                            </div>
                        </li>
                        <li>
                            <div class="right-chat">
                                <img src="">
                                <p>Lorem ipsum dolor sit ameeserunt.</p>
                                <span>2 min</span>
                            </div>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
        <div class="row border-chat">
            <div class="col-md-12 col-sm-12 col-xs-12 third-section">
                <div class="text-bar">
                    <input type="text" placeholder="Write messege" id="valueChat" class="valueChat">
                </div>
            </div>
        </div>
    </form>
</div>
