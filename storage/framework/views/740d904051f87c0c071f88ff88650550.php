<div class="bg-white shadow rounded-lg p-8">
    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-gray-900">Professional Registration</h2>
        <p class="mt-2 text-gray-600">Join our platform as a service provider</p>
    </div>

    <form class="space-y-6" method="POST" action="<?php echo e(route('register')); ?>" enctype="multipart/form-data">

        <?php echo csrf_field(); ?>
        <input type="hidden" name="type" value="professional">

        <div class="space-y-8">
            <div class="border-b border-gray-200 pb-8">
                <h3 class="text-lg font-medium text-gray-900">Personal Information</h3>
                <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input id="name" name="name" type="text" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div class="sm:col-span-3">
                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                        <input id="phone" name="phone" type="tel" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="+1 (555) 123-4567">
                    </div>

                    <div class="sm:col-span-3">
                        <label for="cin" class="block text-sm font-medium text-gray-700">CIN/ID Number</label>
                        <input id="cin" name="cin" type="text" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="AB123456">
                    </div>

                    <div class="sm:col-span-3">
                        <label for="profile_photo" class="block text-sm font-medium text-gray-700">Profile Photo</label>
                        <div class="mt-1 flex items-center">
                            <input type="file" id="profile_photo" name="profile_photo" required
                                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="years_experience" class="block text-sm font-medium text-gray-700">Years of
                            Experience</label>
                        <input id="years_experience" name="years_experience" type="number" min="0" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                </div>
            </div>

            <div class="border-b border-gray-200 pb-8">
                <h3 class="text-lg font-medium text-gray-900">Professional Information</h3>
                <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input id="email" name="email" type="email" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="name@example.com">
                    </div>

                    <div class="sm:col-span-2">
                        <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                        <input id="city" name="city" type="text" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            value="New York">
                    </div>

                    <div class="sm:col-span-3">
                        <label for="specialization"
                            class="block text-sm font-medium text-gray-700">Specialization</label>
                        <input id="specialization" name="specialization" type="text" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="e.g., Plumbing, Electrical, etc.">
                    </div>

                    <div class="sm:col-span-3">
                        <label for="certificate" class="block text-sm font-medium text-gray-700">Diploma/Certificate
                            (Optional)</label>
                        <div class="mt-1 flex items-center">
                            <input type="file" id="certificate" name="certificate"
                                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" name="password" type="password" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div class="sm:col-span-3">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm
                        Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            </div>
        </div>

        <div class="pt-5">
            <div class="flex justify-end">
                <button type="submit"
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Submit Application
                </button>
            </div>
        </div>
    </form>

    <div class="mt-8 border-t border-gray-200 pt-8">
        <p class="text-sm text-gray-500">
            Please note that your application will be reviewed by our team before your account is activated.
        </p>
        <p class="mt-2 text-sm text-gray-600">
            Already have an account?
            <a href="<?php echo e(route('login')); ?>" class="font-medium text-indigo-600 hover:text-indigo-500">Sign in</a>
        </p>
    </div>
</div>
<?php /**PATH C:\laragon\www\fixhome-laravel\resources\views/auth/register-professional.blade.php ENDPATH**/ ?>