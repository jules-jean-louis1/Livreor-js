
<form action="register.php" method="post" id="register-form">
    <div class="flex py-2">
        <div class="flex flex-col">
            <label for="loginR">Login :</label>
            <input type="text" class="input rounded bg-slate-300 p-2 " placeholder="Login" id="loginR" name="loginR">
            <small></small>
        </div>
    </div>
    <div class="flex py-2">
        <div class="flex flex-col">
            <label for="passwordR">Mot de passe :</label>
            <input type="password" class="input rounded bg-slate-300 p-2" placeholder="Mot de Passe" id="passwordR" name="passwordR">
            <small id="passwordError" class="invalid-feedback"></small>
        </div>
    </div>
    <div class="flex py-2">
        <div class="flex flex-col">
            <label for="c_passwordR">Confirmer le mot de passe :</label>
            <input type="password" name="c_passwordR" class="input rounded bg-slate-300 p-2" placeholder="Confirmer Mot de Passe" id="c_passwordR">
            <small id="error"></small>
        </div>
    </div>
    <div id="errorMsg"></div>
    <button type="submit" class="rounded bg-purple-500 py-2 text-white hover:bg-purple-700 w-full">
        Inscription
    </button>
</form>
