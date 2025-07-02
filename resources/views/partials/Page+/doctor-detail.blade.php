@extends('layouts.app')

@section('title', 'Thông tin bác sĩ- Medik')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
    @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 mb-10">
        <!-- Left Column: Avatar, Basic Info, Skills -->
        <div class="flex flex-col gap-6">
            <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Doctor Avatar" class="w-32 h-32 rounded-xl object-cover border-4 border-blue-100 shadow-md mb-4" />
                <h3 class="text-xl font-bold text-gray-800 mb-1 text-center">Dr. Demetrius Wright</h3>
                <div class="text-blue-700 font-medium mb-2 text-center">Family Medicine</div>
                <div class="flex flex-col gap-1 text-gray-600 text-sm mb-2 text-center">
                    <div><span class="font-semibold">Phone:</span> +968 547856 254</div>
                    <div><span class="font-semibold">Email:</span> demetrius.wright@clinic.com</div>
                    <div><span class="font-semibold">Location:</span> Ribon Building, Wales street, Canada</div>
                </div>
                <div class="flex gap-2 mt-2 justify-center">
                    <a href="#" class="text-gray-400 hover:text-blue-600"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-gray-400 hover:text-blue-600"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-400 hover:text-blue-600"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="text-gray-400 hover:text-blue-600"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow p-6">
                <h4 class="font-semibold text-gray-800 mb-4">Professional Skills</h4>
                <div class="flex items-center gap-2 mb-3">
                    <span class="w-24 text-sm">Surgery</span>
                    <div class="flex-1 bg-gray-200 rounded-full h-2.5">
                        <div class="bg-green-500 h-2.5 rounded-full" style="width: 70%"></div>
                    </div>
                    <span class="text-xs">70%</span>
                </div>
                <div class="flex items-center gap-2 mb-3">
                    <span class="w-24 text-sm">Medical Research</span>
                    <div class="flex-1 bg-gray-200 rounded-full h-2.5">
                        <div class="bg-green-500 h-2.5 rounded-full" style="width: 80%"></div>
                    </div>
                    <span class="text-xs">80%</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="w-24 text-sm">Professionalism</span>
                    <div class="flex-1 bg-gray-200 rounded-full h-2.5">
                        <div class="bg-green-500 h-2.5 rounded-full" style="width: 90%"></div>
                    </div>
                    <span class="text-xs">90%</span>
                </div>
            </div>
        </div>
        <!-- Right Column: Info Sections -->
        <div class="md:col-span-2 flex flex-col gap-6">
            <div class="bg-white rounded-xl shadow p-6">
                <h4 class="text-lg font-bold text-gray-800 mb-2">Introduction</h4>
                <p class="text-gray-600 text-sm">Dr. Wright is a private individual or professional who gained prominence in a specific field. January 2015 marked a significant milestone or clinic. This person works, social media platforms of professional networking sites may also provide up-to-date information, or health and well-being are our top priorities. We take the time to listen to our patients to make informed choices about their health.</p>
            </div>
            <div class="bg-white rounded-xl shadow p-6">
                <h4 class="text-lg font-bold text-gray-800 mb-2">Specialties</h4>
                <p class="text-gray-600 text-sm mb-2">Our clinic is equipped with modern facilities and advanced medical technology to ensure accurate diagnoses and effective treatment. This enables us to provide you with the highest standard of care.</p>
                <ul class="list-disc list-inside text-gray-600 text-sm ml-4">
                    <li>Cardiology - D.N.Sc., M.B.B.S., Ph.D</li>
                    <li>Dermatology - D.N.Sc., M.B.B.S., Ph.D</li>
                    <li>Family Medicine - D.N.Sc., M.B.B.S., Ph.D</li>
                </ul>
            </div>
            <div class="bg-white rounded-xl shadow p-6">
                <h4 class="text-lg font-bold text-gray-800 mb-2">Educational Info</h4>
                <p class="text-gray-600 text-sm mb-2">We understand every patient is unique, and their healthcare needs may vary. That's why we create individualized treatment plans tailored to your specific condition, lifestyle, and preferences.</p>
                <ul class="list-disc list-inside text-gray-600 text-sm ml-4">
                    <li>Medicine (Doctor of Medicine 2005) - Center of Medicine Anthology</li>
                    <li>Cambridge School of Medicine (M.B.B.S., Ph.D 2014)</li>
                </ul>
            </div>
            <div class="bg-white rounded-xl shadow p-6">
                <h4 class="text-lg font-bold text-gray-800 mb-2">Memberships</h4>
                <p class="text-gray-600 text-sm mb-2">We understand every patient is unique, and their healthcare needs may vary. That's why we create individualized treatment plans tailored to your specific condition, lifestyle, and preferences.</p>
                <ul class="list-disc list-inside text-gray-600 text-sm ml-4">
                    <li>European Society of Cardiology</li>
                    <li>British Cardiovascular Society</li>
                    <li>Royal Society of Medicine</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Booking Form -->
    <div class="bg-white rounded-xl shadow-lg p-8 max-w-2xl w-full mx-auto mt-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-2">Book An Appointment</h2>
        <div class="text-gray-500 mb-6 text-base">Booking for Doctor ID: <span class="font-semibold text-blue-700">{{ $doctorId }}</span></div>
        <form>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <input type="text" placeholder="Your Name" class="rounded-lg border border-gray-300 p-3 text-base focus:ring-2 focus:ring-green-500" />
                <input type="email" placeholder="Email Address" class="rounded-lg border border-gray-300 p-3 text-base focus:ring-2 focus:ring-green-500" />
                <input type="text" placeholder="Phone Number" class="rounded-lg border border-gray-300 p-3 text-base focus:ring-2 focus:ring-green-500" />
                <input type="text" placeholder="dd/mm/yyyy" class="rounded-lg border border-gray-300 p-3 text-base focus:ring-2 focus:ring-green-500" />
            </div>
            <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white py-3 rounded-lg font-semibold text-lg transition">
                Make An Appointment &rarr;
            </button>
        </form>
    </div>
</body>
</html>

@endsection