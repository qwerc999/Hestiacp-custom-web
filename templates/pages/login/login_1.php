<?php
// Note: Assuming all necessary PHP initialization happens before this block.
?>

<!-- Custom CSS to apply the background image ONLY to the login page steps -->
<style>
/* --- 1. Apply the Modern Background to the entire page --- */
html, body {
    /* Set the background image */
    background-image: url("https://raw.githubusercontent.com/qwerc999/modern_bg/4a38577903966c517b0abd79e310c13225f50e8a/modern_bg.jpg") !important;
    background-size: cover !important;
    background-repeat: no-repeat !important;
    background-position: center center !important;
    background-attachment: fixed !important;
    /* Ensure no other solid background color is hiding the image */
    background-color: transparent !important; 
    height: 100%; /* Ensure full coverage */
    margin: 0;
    padding: 0;
}

/* --- 2. Style the main login form container for readability and modern look --- */
.login {
    /* Use a semi-transparent dark background for readability */
    background: rgba(0, 0, 0, 0.7); 
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5); 
    
    /* Apply a modern, blurred glass effect */
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px); 
    
    /* Ensure all text within the login box is white/light for contrast */
    color: #ffffff;
}

/* 3. Ensure internal elements have proper contrast */
.login-title {
    color: #ffffff;
    border-bottom: 2px solid rgba(255, 255, 255, 0.2);
    padding-bottom: 15px;
    margin-bottom: 20px;
}

.form-label {
    color: #cccccc;
}

.form-control {
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: #ffffff;
}
.form-control:focus {
    background: rgba(255, 255, 255, 0.2);
    border-color: #00bcd4; /* Accent color */
}

/* If there are error messages */
.error {
    background: rgba(255, 99, 71, 0.8);
    color: white;
    padding: 10px;
    border-radius: 8px;
}
</style>

<div class="login">
    <a href="/" class="u-block u-mb40">
        <img src="/images/custom/logo.svg" alt="<?= htmlentities($_SESSION["APP_NAME"]) ?>" width="120" height="120">
    </a>
    <form id="login-form" method="post" action="/login/">
        <input type="hidden" name="token" value="<?= $_SESSION["token"] ?>">
        <h1 class="login-title">
            <?= _("Welcome") ?> <?= htmlspecialchars($_SESSION["login"]["username"]) ?>!
        </h1>
        <div class="u-mb20">
            <label for="password" class="form-label u-side-by-side">
                <?= _("Password") ?>
                <?php if ($_SESSION["POLICY_SYSTEM_PASSWORD_RESET"] !== "no") { ?>
                    <a class="login-form-link" href="/reset/">
                        <?= _("Forgot Password") ?>
                    </a>
                <?php } ?>
            </label>
            <input type="password" class="form-control" name="password" id="password" autocomplete="current-password" required autofocus>
        </div>
        <div class="u-side-by-side">
            <!-- IMPORTANT: This button now has the required ID for the JavaScript protection -->
            <button type="submit" class="button" id="submit-button"> 
                <i class="fas fa-right-to-bracket"></i><?= _("Login") ?>
            </button>
            <a href="/login/?logout=true" class="button button-secondary">
                <?= _("Back") ?>
            </a>
        </div>
    </form>
</div>

<!-- Double-Submission Protection Code -->
<script>
    // Client-side guard: Prevent double-submission while waiting for server response
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('login-form');
        const submitButton = document.getElementById('submit-button');
        
        if (form && submitButton) {
            form.addEventListener('submit', () => {
                // Disable the button to indicate processing and prevent immediate re-click
                submitButton.disabled = true;
                // Optionally change text/icon to show loading state
                submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...'; 
            });
        }
    });
</script>
