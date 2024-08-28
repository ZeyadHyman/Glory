<x-app-layout>
    <form action="{{ route('verify-payment') }}" method="POST"
        class="max-w-lg mt-20 mx-auto bg-gray-800 p-6 rounded-lg shadow-md">
        @csrf
        <h2 class="text-2xl font-bold text-white mb-4">Payment Information</h2>

        <div class="mb-4">
            <label for="first_name" class="block text-white font-semibold mb-2">
                <i class="fas fa-user"></i> First Name
            </label>
            <input type="text" name="first_name" id="first_name"
                class="w-full px-4 py-2 rounded-lg bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
        </div>

        <div class="mb-4">
            <label for="last_name" class="block text-white font-semibold mb-2">
                <i class="fas fa-user"></i> Last Name
            </label>
            <input type="text" name="last_name" id="last_name"
                class="w-full px-4 py-2 rounded-lg bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-white font-semibold mb-2">
                <i class="fas fa-envelope"></i> Email
            </label>
            <input type="email" name="email" id="email"
                class="w-full px-4 py-2 rounded-lg bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
        </div>

        <div class="mb-4">
            <label for="phone" class="block text-white font-semibold mb-2">
                <i class="fas fa-phone"></i> Phone
            </label>
            <input type="text" name="phone" id="phone"
                class="w-full px-4 py-2 rounded-lg bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
        </div>


        <button type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
            <i class="fas fa-credit-card"></i> Submit Payment
        </button>
    </form>



</x-app-layout>
