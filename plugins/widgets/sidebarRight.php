
<style>
    
/*------------------chat-------------------*/

.app {
    display: flex;
    flex-direction: column;
    background-color: #fff;
    max-width: 1600px;
    height: calc(100vh - 54px);
    /* margin: 0 auto; */
    overflow: hidden;
    position: static;
    right: 0;
    top: 54px;
    box-shadow: -1px 0px 8px -1px #ccc;
    transition: ease 0.5s all;
    transform: unset;
}
.chatOpen  .app{
    transform: translateX(0);
}


.wrapper {
    /*width: 100%;*/
    /*display: flex;*/
    /*flex-grow: 1;*/
    /*overflow: hidden;*/
}

.conversation-area,
.detail-area {
    width: 340px;
    flex-shrink: 0;
}

.detail-area {
    border-left: 1px solid #eef2f4;
    margin-left: auto;
    padding: 30px 30px 0 30px;
    display: flex;
    flex-direction: column;
    overflow: auto;
}

.chat-area {
    flex-grow: 1;
}



.msg-profile {
    width: 44px;
    height: 44px;
    border-radius: 50% !important;
    object-fit: cover;
    margin-right: 15px;
}

.msg-profile.group {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #eef2f4;
}

.msg-profile.group svg {
    width: 60%;
}

.msg {
    display: flex;
    align-items: center;
    padding: 20px;
    cursor: pointer;
    transition: 0.2s;
    position: relative;
}

.msg:hover {
    background-color: var(--msg-hover-bg);
}

.msg.active {
    background: linear-gradient(to right,
            rgba(47, 50, 56, 0.54),
            rgba(238, 242, 244, 0) 100%);
    border-left: 4px solid #0086ff;
}

.msg.online:before {
    content: "";
    position: absolute;
    background-color: #23be7e;
    width: 9px;
    height: 9px;
    border-radius: 50%;
    border: 2px solid #fff;
    left: 50px;
    bottom: 19px;
}

.msg-username {
    margin-bottom: 4px;
    font-weight: 600;
    font-size: 15px;
}

.msg-detail {
    overflow: hidden;
}

.msg-content {
    font-weight: 500;
    font-size: 13px;
    display: flex;
}

.add {
    position: sticky;
    bottom: 25px;
    background-color: #0086ff;
    width: 60px;
    height: 60px;
    border: 0;
    border-radius: 50%;
    background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='none' stroke='white' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-plus'%3e%3cpath d='M12 5v14M5 12h14'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: 50%;
    background-size: 28px;
    box-shadow: 0 0 16px #0086ff;
    margin: auto auto -55px;
    flex-shrink: 0;
    z-index: 1;
    cursor: pointer;
}


.chat-area {
    display: flex;
    flex-direction: column;
    overflow: auto;
}

.chat-area-header {
    display: flex;
    position: sticky;
    top: 0;
    left: 0;
    z-index: 2;
    width: 100%;
    align-items: center;
    justify-content: space-between;
    padding: 20px;
    background: var(--chat-header-bg);
}

.chat-area-profile {
    width: 32px;
    border-radius: 50%;
    object-fit: cover;
}

.chat-area-title {
    font-size: 18px;
    font-weight: 600;
}

.chat-area-main {
    flex-grow: 1;
}

.chat-msg-img {
    height: 40px;
    width: 40px;
    border-radius: 50% !important;
    object-fit: cover;
}

.chat-msg-profile {
    flex-shrink: 0;
    margin-top: auto;
    margin-bottom: -20px;
    position: relative;
}

.chat-msg-date {
    position: absolute;
    left: calc(100% + 12px);
    bottom: 0;
    font-size: 12px;
    font-weight: 600;
    color: #c0c7d2;
    white-space: nowrap;
}

.chat-msg {
    display: flex;
    padding: 0 20px 45px;
}

.chat-msg-content {
    margin-left: 12px;
    max-width: 70%;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

.chat-msg-text {
    background-color: var(--chat-text-bg);
    padding: 15px;
    border-radius: 20px 20px 20px 0;
    line-height: 1.5;
    font-size: 14px;
    font-weight: 400;
}

.chat-msg-text+.chat-msg-text {
    margin-top: 10px;
}

.chat-msg-text {
    color: #000;
}

.owner {
    flex-direction: row-reverse;
}

.owner .chat-msg-content {
    margin-left: 0;
    margin-right: 12px;
    align-items: flex-end;
}

.owner .chat-msg-text {
    background-color: #5e4e93;
    color: #fff;
    border-radius: 20px 20px 0 20px;
}

.owner .chat-msg-date {
    left: auto;
    right: calc(100% + 12px);
}

.chat-msg-text img {
    max-width: 300px;
    width: 100%;
}

.chat-area-footer {
    display: flex;
    border-top: 1px solid #eef2f4;
    width: 100%;
    padding: 10px 20px;
    align-items: center;
    background-color: #fff;
    position: sticky;
    bottom: 0;
    left: 0;
}

.chat-area-footer svg {
    color: #c1c7cd;
    width: 20px;
    flex-shrink: 0;
    cursor: pointer;
}

.chat-area-footer svg:hover {
    color: var(--settings-icon-hover);
}

.chat-area-footer svg+svg {
    margin-left: 12px;
}

.chat-area-footer input {
    border: none;
    color: #000;
    background-color: var(--input-bg);
    padding: 12px;
    border-radius: 6px;
    font-size: 15px;
    margin: 0 12px;
    width: 100%;
}

.chat-area-footer input::placeholder {
    color: #a2a2a2;
}




.logo {
    width: auto;
}

.headerRow {
    width: 325px;
    margin: -36px;
    padding: 0;
    background: #eaeef1;
    height: 78px;
    align-items: center;
}

.headerRow i {
    color: #000;
    font-size: 20px;
    vertical-align: -2px;
    margin-right: 3px;
}

.headerRow span {
    color: #000;
    font-size: 14px;
    font-weight: 500;
}

.col-md-6:not(:last-child) .headerBlock {
    border-right: 1px solid #ddd;
}

.chat-area-header {
    display: flex;
    position: sticky;
    top: 0;
    left: 0;
    z-index: 2;
    width: 100%;
    align-items: center;
    justify-content: space-between;
    padding: 20px;
    background: var(--chat-header-bg);
    box-shadow: 1px 1px 7px 1px #dfdfdf;
    background: #fff;
        display: none;
}

.headerBlock {
    justify-content: center;
    display: flex;
}

.chat-area-header .msg {
    padding: 00;
}

.chat-area-header {
    padding: 6px 20px;
}

.menuToggle {}

.conversation-area .headerRow {
    display: none;
}

@media (max-width: 1120px) {
    .detail-area {
        display: none;
    }
}

@media (max-width: 780px) {
    .conversation-area {
        display: none;
    }

    .search-bar {
        margin-left: 0;
        flex-grow: 1;
    }

    .search-bar input {
        padding-right: 10px;
    }

    .headerRow {
        display: none;
    }

    .conversation-area .headerRow {
        display: flex;
        width: auto;
        margin-top: 0px;
        margin-bottom: 10px;
        height: 50px;
    }

    .col-6:not(:last-child) .headerBlock {
        border-right: 1px solid #ddd;
    }

    .conversation-area,
    .detail-area {
        width: 100%;
    }

    .add {
        left: 50%;
        transform: translateX(-50%);
    }
}

.app {
    max-width: unset;
}

.chat-area-footer input {
    background: #f3f3f3;
    border: 1px solid #eee;
    margin: 0;
}

.sendBox {
    position: relative;
    flex-grow: 1;
    /*padding-left: 13px;*/
}

.sendBox i {
    position: absolute;
    right: 9px;
    top: 9px;
    width: 30px;
    height: 30px;
    background: #dd360e;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 20px;
    color: #fff;
    border-radius: 4px;
}

.chat-area-footer svg {
    color: #919191;
}

.chat-area-main {
    padding-top: 15px;
    background: url(apps/studio/css/images/chat-bg-2.jpg);
    width: 100%;
}

.chat-msg-text {
    background-color: #ffffff;
}

.chat-area-group i {
    font-size: 23px;
}

.chat-msg-date {
    color: #232323;
}

::-webkit-scrollbar {
    width: 4px;
        height: 5px;
}

/* Track */
::-webkit-scrollbar-track {
    background: #f1f1f1;
}

/* Handle */
::-webkit-scrollbar-thumb {
    background: #bfe1ff;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
    background: #555;
}

.owner .chat-msg-text {
    border-radius: 5px 5px 0 5px !important;
}

.chat-msg-text {
    border-radius: 5px 5px 5px 0 !important;
}

.dropdownBox {
    position: absolute;
    width: 280px;
    height: 230px;
    background: #fff;
    box-shadow: 0 2px 5px 0 rgba(11, 20, 26, .26), 0 2px 10px 0 rgba(11, 20, 26, .16);
    bottom: 76px;
    border-radius: 8px !important;
    transform: scale(0);
    opacity: 0;
    transition: ease 0.4s all;
    transform-origin: left bottom;
}

.dropdownBox ul {
    padding: 0;
    margin: 0;
    list-style: none;
    padding: 26px;
    display: flex;
    flex-wrap: wrap;
}

.dropdownBox ul li {
    flex: 0 0 33.33%;
    max-width: 33.33%;
    padding: 10px;
    text-align: center;
    display: flex;
    justify-content: center;
    flex-wrap: wrap;

    text-align: center;
}

.dropdownBox ul li a {
    width: 45px;
    height: 45px;
    background: #ff7e0c;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50% !important;
    text-decoration: none;
}

.dropdownBox ul li a i {
    color: #fff;
    font-size: 17px;
}

.dropdownBox ul li span {
    font-size: 12px;
    margin-top: 9px;
}

.dropdownBox ul li:nth-child(1) a {
    background: #00abff;
}

.dropdownBox ul li:nth-child(2) a {
    background: #ff4545;
}

.dropdownBox ul li:nth-child(3) a {
    background: #9861ff;
}

.dropdownBox ul li:nth-child(4) a {
    background: #ff7801;
}

.dropdownBox ul li:nth-child(5) a {
    background: #3ab97a;
}

.dropdownBox.active {

    transform: scale(1);
    opacity: 1;
}

.chat-area-footer {
    padding: 10px 12px;
}
.chat-area-footer input:focus{
    outline: none;
}

.chatOpen .chatIcon a {
       color: #3700e7 !important; 
}
.closeSidebar .sidebar-nav ul a span:first-of-type{
        display: none;
}
.closeSidebar .sidebar-nav ul.secondary a  span{
        display: inline-block;
}
.file-drop-area {
  border: 1px dashed #7c7db3;
  border-radius: 3px;
  position: relative;
  width: 450px;
  max-width: 100%;
  margin: 0 auto;
  padding: 26px 20px 30px;
  -webkit-transition: 0.2s;
  transition: 0.2s;
}
.file-drop-area.is-active {
  background-color: #3F4069;
}

.fake-btn {
  background-color: #3F4069;
  border: 1px solid #9E9EC4;
  border-radius: 3px;
  padding: 8px 15px;
  margin-right: 8px;
  font-size: 12px;
  text-transform: uppercase;
}

.file-msg {
  font-size: small;
  font-weight: 300;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  display: inline-block;
  max-width: calc(100% - 130px);
  vertical-align: middle;
}

.file-input {
  position: absolute;
  left: 0;
  top: 0;
  height: 100%;
  width: 100%;
  cursor: pointer;
  opacity: 0;
}
.file-input:focus {
  outline: none;
}
.file-drop-area {
       background-color: transparent;
    width: 55px;
    position: absolute;
    top: 3px;
    right: 42px;
    background-color: transparent;
    border: 0;
    padding: 0;
    display: flex;
}
.sendBox .fake-btn i{
    position: static;
    width: auto;
    height: auto;
    background: transparent;
    color: #000;
    display: block;
}
.file-drop-area.is-active{
    background-color: transparent;
}
.file-msg{
        color: #000;
}
.fake-btn{
    background-color: transparent;
    border: 0;
}
.sendBox .file-msg i{
        color: #5e4e93;
    /* border: transparent; */
    background: transparent;
    left: 11px;
    top: 5px;
}
.chat-area-footer input{
    padding-right: 89px;
}
</style>
<div class="app">
    <div class="chat-area">
        <div class="chat-area-header">
            <div class="msg ">
                <div class="msg-profile group">
                    <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                        <path d="M12 2l10 6.5v7L12 22 2 15.5v-7L12 2zM12 22v-6.5"></path>
                        <path d="M22 8.5l-10 7-10-7"></path>
                        <path d="M2 15.5l10-7 10 7M12 2v6.5"></path>
                    </svg>
                </div>
                <div class="msg-detail">
                    <div class="msg-username">Chat Box</div>
                    
                </div>
            </div>
            <div class="chat-area-group">
                <i class="las la-ellipsis-v"></i>
            </div>
        </div>
        <div id="chatMessageArea" class="chat-area-main"><div class="chat-msg">
                <div class="chat-msg-profile">
                    <img class="chat-msg-img" src="http://uat.stage.silkdemo.in/apps/analytics101/media/images/bot.png" alt="Analytics101 Bot">
                    <div class="chat-msg-date hidden">Message seen 3.16pm</div>
                </div>
                <div class="chat-msg-content">
                    <div class="chat-msg-text">
                        Welcome to Analytics101 <b>Ask Me</b>
                        <p>You can use multiple interfaces like whatsapp, chat or telegram to ask various kind of questions to your Analytics101 connected Projects.</p>    
                    </div>
                </div>
            </div></div>
        <div class="chat-area-footer">
            <div class="dropdownBox">
                <ul>
                    <li>
                        <a href="#">
                            <i class="fa fa-file" aria-hidden="true"></i>
                        </a>
                        <span>Document</span>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-camera" aria-hidden="true"></i>
                        </a>
                        <span>Camera</span>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-picture-o" aria-hidden="true"></i>
                        </a>
                        <span>Image</span>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-video-camera" aria-hidden="true"></i>
                        </a>
                        <span>Video</span>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-headphones" aria-hidden="true"></i>
                        </a>
                        <span>Audio</span>
                    </li>
                    
                </ul>
            </div>
            <div class="dropdownIcon">
            <!--<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip">-->
            <!--    <path d="M21.44 11.05l-9.19 9.19a6 6 0 01-8.49-8.49l9.19-9.19a4 4 0 015.66 5.66l-9.2 9.19a2 2 0 01-2.83-2.83l8.49-8.48" />-->
            <!--</svg>-->
          </div>
            <div class="sendBox">
                <input type="text" placeholder="Type something here...">
                <i data-v-e08301e8="" class="las la-paper-plane"></i>
                
                <div class="file-drop-area">
                  <span class="fake-btn"><i class="las la-cloud-upload-alt"></i></span>
                  <span class="file-msg js-set-number"></span>
                  <input class="file-input" type="file" multiple="">
                </div>
            </div>
        </div>
    </div>
</div>