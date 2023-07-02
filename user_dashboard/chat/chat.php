<div class="chat-bar-collapsible">
  <button id="chat-button" type="button" class="collapsible">
    <img src="../images/chatbot.png" alt="Chatbot" width="47">
  </button>
  <div class="content">
    <p class="heading">Chat With <b>AutiBot</b></p>
    <div class="full-chat-block">
      <div class="outer-container">
        <div class="chat-container">
          <div id="chatbox">
            <h5 id="chat-timestamp"></h5>
            <p id="botStarterMessage" class="botText"><span>Loading...</span></p>
          </div>
          <div class="chat-bar-input-block">
            <div id="userInput">
              <input id="textInput" class="input-box" type="text" name="msg" placeholder="Hit Enter To Send Message">
              <p></p>
            </div>
            <div class="chat-bar-icons">
              <i id="chat-icon" style="color: #333;" class="fa fa-paper-plane" onclick="sendButton()"></i>
            </div>
          </div>
          <div id="chat-bar-bottom">
            <p></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>