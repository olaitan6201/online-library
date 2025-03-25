<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Library - Your Gateway to Knowledge</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .hero-gradient {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
        }

        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
</head>
<body class="antialiased">
<!-- Navigation -->
<nav class="bg-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <div class="flex-shrink-0 flex items-center">
                    <i class="fas fa-book-open text-indigo-600 text-2xl mr-2"></i>
                    <span class="text-xl font-bold text-gray-900">OnlineLibrary</span>
                </div>
            </div>
            <div class="hidden sm:ml-6 sm:flex sm:items-center space-x-8">
                <a href="#" class="text-gray-900 hover:text-indigo-600 px-3 py-2 text-sm font-medium">Home</a>
                <a href="#" class="text-gray-500 hover:text-indigo-600 px-3 py-2 text-sm font-medium">Books</a>
                <a href="#" class="text-gray-500 hover:text-indigo-600 px-3 py-2 text-sm font-medium">About</a>
                <a href="#" class="text-gray-500 hover:text-indigo-600 px-3 py-2 text-sm font-medium">Contact</a>
                <div class="flex space-x-4">
                    <a href="/login"
                       class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md text-sm font-medium transition duration-300">
                        Sign In
                    </a>
                    <a href="/register"
                       class="border border-indigo-600 text-indigo-600 hover:bg-indigo-50 px-4 py-2 rounded-md text-sm font-medium transition duration-300">
                        Register
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<div class="hero-gradient text-white">
    <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
                Discover Your Next Favorite Book
            </h1>
            <p class="mt-6 max-w-lg mx-auto text-xl">
                Explore thousands of books from classic literature to modern bestsellers. All at your fingertips.
            </p>
            <div class="mt-10">
                <a href="/register"
                   class="inline-block bg-white text-indigo-600 py-3 px-8 rounded-md text-lg font-medium hover:bg-gray-100 transition duration-300">
                    Join Our Library
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Featured Books -->
<div class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                Featured Books
            </h2>
            <p class="mt-4 max-w-2xl text-xl text-gray-600 mx-auto">
                Check out our most popular titles this month
            </p>
        </div>

        <div class="mt-16 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            <!-- Book Card 1 -->
            <div class="book-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300">
                <img class="h-64 w-full object-cover"
                     src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                     alt="Book cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900">The Silent Patient</h3>
                    <p class="mt-2 text-gray-600">Alex Michaelides</p>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-sm font-medium text-indigo-600">Fiction</span>
                        <button class="text-sm bg-indigo-100 text-indigo-800 px-3 py-1 rounded-full">Available</button>
                    </div>
                </div>
            </div>

            <!-- Book Card 2 -->
            <div class="book-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300">
                <img class="h-64 w-full object-cover"
                     src="https://images.unsplash.com/photo-1589998059171-988d887df646?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                     alt="Book cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900">Atomic Habits</h3>
                    <p class="mt-2 text-gray-600">James Clear</p>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-sm font-medium text-indigo-600">Self-Help</span>
                        <button class="text-sm bg-indigo-100 text-indigo-800 px-3 py-1 rounded-full">Available</button>
                    </div>
                </div>
            </div>

            <!-- Book Card 3 -->
            <div class="book-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300">
                <img class="h-64 w-full object-cover"
                     src="https://images.unsplash.com/photo-1531346878377-a5be20888e57?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                     alt="Book cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900">Educated</h3>
                    <p class="mt-2 text-gray-600">Tara Westover</p>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-sm font-medium text-indigo-600">Memoir</span>
                        <button class="text-sm bg-red-100 text-red-800 px-3 py-1 rounded-full">Checked Out</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-12 text-center">
            <a href="#"
               class="inline-block border border-indigo-600 text-indigo-600 py-3 px-8 rounded-md text-lg font-medium hover:bg-indigo-50 transition duration-300">
                Browse All Books
            </a>
        </div>
    </div>
</div>

<!-- Features -->
<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:text-center">
            <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                Why Choose Our Library?
            </h2>
            <p class="mt-4 max-w-2xl text-xl text-gray-600 lg:mx-auto">
                We provide the best digital library experience
            </p>
        </div>

        <div class="mt-20">
            <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-3">
                <!-- Feature 1 -->
                <div class="text-center">
                    <div
                        class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-100 text-indigo-600 mx-auto">
                        <i class="fas fa-book text-xl"></i>
                    </div>
                    <h3 class="mt-6 text-lg font-medium text-gray-900">Extensive Collection</h3>
                    <p class="mt-2 text-gray-600">
                        Access thousands of books across all genres, from classic literature to modern bestsellers.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="text-center">
                    <div
                        class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-100 text-indigo-600 mx-auto">
                        <i class="fas fa-laptop text-xl"></i>
                    </div>
                    <h3 class="mt-6 text-lg font-medium text-gray-900">Digital Convenience</h3>
                    <p class="mt-2 text-gray-600">
                        Borrow and read books anytime, anywhere with our easy-to-use digital platform.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="text-center">
                    <div
                        class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-100 text-indigo-600 mx-auto">
                        <i class="fas fa-bell text-xl"></i>
                    </div>
                    <h3 class="mt-6 text-lg font-medium text-gray-900">Smart Reminders</h3>
                    <p class="mt-2 text-gray-600">
                        Get automatic reminders for due dates so you never miss returning a book on time.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Testimonials -->
<div class="bg-indigo-50 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                What Our Readers Say
            </h2>
        </div>

        <div class="mt-16 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            <!-- Testimonial 1 -->
            <div class="bg-white p-8 rounded-lg shadow-md">
                <div class="flex items-center">
                    <img class="h-12 w-12 rounded-full" src="https://randomuser.me/api/portraits/women/32.jpg"
                         alt="Sarah J.">
                    <div class="ml-4">
                        <h4 class="text-lg font-medium text-gray-900">Sarah J.</h4>
                        <p class="text-indigo-600">Avid Reader</p>
                    </div>
                </div>
                <p class="mt-4 text-gray-600">
                    "This library has transformed my reading habits. I can now access books I've always wanted to read
                    with just a few clicks!"
                </p>
            </div>

            <!-- Testimonial 2 -->
            <div class="bg-white p-8 rounded-lg shadow-md">
                <div class="flex items-center">
                    <img class="h-12 w-12 rounded-full" src="https://randomuser.me/api/portraits/men/45.jpg"
                         alt="Michael T.">
                    <div class="ml-4">
                        <h4 class="text-lg font-medium text-gray-900">Michael T.</h4>
                        <p class="text-indigo-600">Student</p>
                    </div>
                </div>
                <p class="mt-4 text-gray-600">
                    "As a student, the convenience of having all these resources available digitally is incredible. It's
                    saved me so much time!"
                </p>
            </div>

            <!-- Testimonial 3 -->
            <div class="bg-white p-8 rounded-lg shadow-md">
                <div class="flex items-center">
                    <img class="h-12 w-12 rounded-full" src="https://randomuser.me/api/portraits/women/68.jpg"
                         alt="Emma R.">
                    <div class="ml-4">
                        <h4 class="text-lg font-medium text-gray-900">Emma R.</h4>
                        <p class="text-indigo-600">Book Club Organizer</p>
                    </div>
                </div>
                <p class="mt-4 text-gray-600">
                    "Our book club has grown so much since we started using this platform. The book recommendations are
                    always spot on!"
                </p>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="bg-indigo-700">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
        <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
            <span class="block">Ready to dive in?</span>
            <span class="block text-indigo-200">Start your reading journey today.</span>
        </h2>
        <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
            <div class="inline-flex rounded-md shadow">
                <a href="/register"
                   class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50">
                    Get started
                </a>
            </div>
            <div class="ml-3 inline-flex rounded-md shadow">
                <a href="#"
                   class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 bg-opacity-60 hover:bg-opacity-70">
                    Learn more
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-gray-800">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-white text-sm font-semibold tracking-wider uppercase">Library</h3>
                <ul class="mt-4 space-y-4">
                    <li><a href="#" class="text-gray-400 hover:text-white">About</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Careers</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">News</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-white text-sm font-semibold tracking-wider uppercase">Resources</h3>
                <ul class="mt-4 space-y-4">
                    <li><a href="#" class="text-gray-400 hover:text-white">Help Center</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Guides</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Blog</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-white text-sm font-semibold tracking-wider uppercase">Legal</h3>
                <ul class="mt-4 space-y-4">
                    <li><a href="#" class="text-gray-400 hover:text-white">Privacy</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Terms</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Cookie Policy</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-white text-sm font-semibold tracking-wider uppercase">Connect</h3>
                <ul class="mt-4 space-y-4">
                    <li><a href="#" class="text-gray-400 hover:text-white">Facebook</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Twitter</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Instagram</a></li>
                </ul>
            </div>
        </div>
        <div class="mt-8 border-t border-gray-700 pt-8 md:flex md:items-center md:justify-between">
            <p class="text-gray-400 text-sm text-center md:text-left">
                &copy; 2023 OnlineLibrary. All rights reserved.
            </p>
            <div class="mt-8 flex justify-center space-x-6 md:mt-0">
                <a href="#" class="text-gray-400 hover:text-white">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="text-gray-400 hover:text-white">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="text-gray-400 hover:text-white">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="text-gray-400 hover:text-white">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
