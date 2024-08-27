<form action="connexion.php" method="post" id="LoginForm" class="flex flex-col items-center p-4 px-6 mt-4 rounded-[1.6em] space-y-3">
    <div class="flex justify-center p-2 rounded "  id="iconContainerIndex">
        <div class="flex flex-col">
            <i class="fa-solid fa-circle-user fa-2x"></i>
        </div>
    </div>
    <div class="flex">
        <div class="flex flex-col">
            <label for="loginC" class="text-white pb-[2%]">Login :</label>
            <input type="text" name="loginC" id="loginC" class="input rounded bg-slate-300 p-2"
                   placeholder="Login">
        </div>
    </div>
    <div class="flex">
        <div class="flex flex-col">
            <label for="passwordC" class="text-white pb-[2%]">Mot de passe :</label>
            <input name="passwordC" id="passwordC" placeholder="Mot de Passe" type="password"
                   class="input rounded bg-slate-300 p-2">
        </div>
    </div>
    <div id="errorMsg"></div>
    <button type="submit" class="rounded-full bg-[#6633EEFF] py-2 text-white hover:bg-purple-700 w-full"
            id="loginbtn">
        Connexion
    </button>
</form>
