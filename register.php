<form action="register.php" method="post" id="register-form" class="flex flex-col items-center p-4 px-6 mt-4 rounded-[1.6em] space-y-3">
    <div class="flex justify-center p-2 rounded "  id="iconContainerIndex">
        <div class="flex flex-col">
            <i class="fa-solid fa-circle-user fa-2x"></i>
        </div>
    </div>
    <div class="flex">
        <div class="flex flex-col">
            <label for="loginR" class="text-white pb-[2%]">Login :</label>
            <input type="text" class="input rounded bg-slate-300 p-2 " placeholder="Login" id="loginR" name="loginR">
            <small></small>
        </div>
    </div>
    <div class="flex">
        <div class="flex flex-col">
            <label for="passwordR" class="text-white pb-[2%]">Mot de passe :</label>
            <input type="password" class="input rounded bg-slate-300 p-2" placeholder="Mot de Passe" id="passwordR" name="passwordR">
            <small id="passwordError" class="invalid-feedback"></small>
        </div>
    </div>
    <div class="flex">
        <div class="flex flex-col">
            <label for="c_passwordR" class="text-white pb-[2%]">Confirmer le mot de passe :</label>
            <input type="password" name="c_passwordR" class="input rounded bg-slate-300 p-2" placeholder="Confirmer Mot de Passe" id="c_passwordR">
            <small id="error"></small>
        </div>
    </div>
    <div id="errorMsg" class="text-white h-8"></div>
    <button type="submit" class="rounded-full bg-[#6633EEFF] py-2 px-4 text-white hover:bg-purple-700 w-full">
        Inscription
    </button>
</form>
