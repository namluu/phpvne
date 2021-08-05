<div class="myvne_taskbar">
    <a href="#" onclick="openForm()">
        <svg class="ic" viewBox="0 0 32 32">
            <path d="M16 16c4.418 0 8-3.582 8-8s-3.582-8-8-8c-4.418 0-8 3.582-8 8s3.582 8 8 8z"></path>
            <path d="M32 26.4c0.003-0.766-0.214-1.516-0.627-2.161s-1.002-1.157-1.699-1.475c-4.312-1.876-8.972-2.818-13.674-2.764-4.702-0.054-9.362 0.888-13.674 2.764-0.696 0.318-1.286 0.83-1.699 1.475s-0.63 1.395-0.627 2.161v5.6h32v-5.6z"></path>
        </svg>
        Đăng nhập
    </a>
    <div class="form-popup" id="myForm">
        <form action="" class="form-container" method="post">
            <h1>Login</h1>

            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <button type="submit" class="btn" name="btnLogin">Login</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
    </div>
</div>
<script>
function openForm() {
    document.getElementById("myForm").style.display = "block";
    // Remove anchor link id tag and # on urls within the same page
    setTimeout(()=>{
      removeHash();
    }, 5);
}

function closeForm() {
    document.getElementById("myForm").style.display = "none";
}

function removeHash(){
    history.replaceState('', document.title, window.location.origin + window.location.pathname + window.location.search);
}
</script>