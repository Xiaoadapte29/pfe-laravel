<div class="bg-white shadow rounded-lg p-8">
    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-gray-900">Inscription Client</h2>
        <p class="mt-2 text-gray-600">Créez un compte pour commencer à réserver des services</p>
    </div>

    <form class="space-y-6" method="POST" action="<?php echo e(route('register')); ?>">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="type" value="client">

        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nom complet</label>
                <input id="name" name="name" type="text" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Adresse email</label>
                <input id="email" name="email" type="email" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Numéro de téléphone</label>
                <input id="phone" name="phone" type="tel" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="+212 6 12 34 56 78">
            </div>

            <div>
                <label for="city" class="block text-sm font-medium text-gray-700">Ville</label>
                <input id="city" name="city" type="text" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                    value="Casablanca">
            </div>

            <div class="sm:col-span-2">
                <label for="address" class="block text-sm font-medium text-gray-700">Adresse</label>
                <input id="address" name="address" type="text" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="123 Rue Principale, Appt 4B">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                <input id="password" name="password" type="password" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
        </div>

        <div class="flex items-center">
            <input id="terms" name="terms" type="checkbox" required
                class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
            <label for="terms" class="ml-2 block text-sm text-gray-700">
                En vous inscrivant, vous acceptez nos <a href="#" class="text-indigo-600 hover:text-indigo-500">Conditions d'utilisation</a> et notre <a href="#" class="text-indigo-600 hover:text-indigo-500">Politique de confidentialité</a>.
            </label>
        </div>

        <div>
            <button type="submit" 
                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                S'inscrire en tant que client
            </button>
        </div>
    </form>

    <div class="mt-6 text-center">
        <p class="text-sm text-gray-600">
            Vous avez déjà un compte ?
            <a href="<?php echo e(route('login')); ?>" class="font-medium text-indigo-600 hover:text-indigo-500">Se connecter</a>
        </p>
    </div>
</div>
<?php /**PATH C:\laragon\www\fixhome-laravel\resources\views/auth/register-client.blade.php ENDPATH**/ ?>