<!-- view/contact.php -->
<div class="max-w-7xl mx-auto px-4 py-16">
    <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Contact Us</h1>

    <div class="grid md:grid-cols-2 gap-10">
        <!-- Form liên hệ -->
        <form action="index.php?act=contact" method="post" class="bg-white p-8 rounded-lg shadow-md space-y-6">
            <div>
                <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                <input type="text" name="name" id="name" placeholder="Your Name" required
                       class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
            <div>
                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="email" name="email" id="email" placeholder="you@example.com" required
                       class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
            <div>
                <label for="subject" class="block text-gray-700 font-medium mb-2">Subject</label>
                <input type="text" name="subject" id="subject" placeholder="Subject" required
                       class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
            <div>
                <label for="message" class="block text-gray-700 font-medium mb-2">Message</label>
                <textarea name="message" id="message" rows="5" placeholder="Your message..."
                          class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" required></textarea>
            </div>
            <button type="submit"
                    class="bg-blue-500 text-white font-medium px-6 py-2 rounded-md hover:bg-blue-600 transition">
                Send Message
            </button>
        </form>

        <!-- Thông tin shop -->
        <div class="bg-gray-50 p-8 rounded-lg shadow-md space-y-4">
            <h2 class="text-2xl font-bold text-gray-800">Our Contact Info</h2>
            <p class="text-gray-600">Feel free to reach out to us via any of the following methods:</p>
            <div>
                <p class="font-medium text-gray-700">Address:</p>
                <p class="text-gray-600">123 Technology St, Hoan Kiem, Hanoi, Vietnam</p>
            </div>
            <div>
                <p class="font-medium text-gray-700">Email:</p>
                <p class="text-gray-600">support@tdvmshop.com</p>
            </div>
            <div>
                <p class="font-medium text-gray-700">Phone:</p>
                <p class="text-gray-600">+84 912 345 678</p>
            </div>
            <div>
                <p class="font-medium text-gray-700">Working Hours:</p>
                <p class="text-gray-600">Mon - Sat: 9:00 AM - 6:00 PM</p>
            </div>
        </div>
    </div>
</div>