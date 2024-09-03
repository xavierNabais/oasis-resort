<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oasis Resort</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="css/app.css" rel="stylesheet">
    
</head>
<body>

    @include('components.navbar')

    <!-- Hero Section -->
    <div class="hero-section">
        <div class="hero-text">
            <h1>Welcome to Oasis Resort</h1>
            <p>Discover ultimate relaxation and luxury in our exclusive suites. Book your unforgettable getaway today.</p>
            <a href="#rooms" class="btn btn-primary btn-lg mt-3">Book Your Stay</a>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="cta-section">
        <div class="container text-center">
            <h2>Exclusive 20% Discount for Online Reservations!</h2>
            <p>Book now to enjoy a special discount on your next stay with us. Don’t miss out on this offer!</p>
            <a href="#rooms" class="btn btn-primary btn-lg mt-3">Reserve Now</a>
        </div>
    </div>

    <!-- Available Rooms Section -->
    <div class="container" id="rooms">
        <h2 class="section-title">Available Rooms</h2>

        <div class="row">
            @foreach($rooms as $room)
                <div class="col-md-4">
                    <div class="card room-card">
                        <img src="{{ asset($room->image_url) }}" class="card-img-top room-image" alt="{{ $room->room_name }}" style="width:350px;height:200px">
                        <div class="card-body">
                            <h5 class="card-title">{{ $room->name }}</h5>
                            <p class="card-text">{{ $room->description }}</p>
                            <p class="card-text"><strong>Price:</strong> {{ $room->price_per_night }} € per night</p>
                            <a href="{{ route('room.show', $room->id) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Amenities Section -->
    <div class="amenities-section">
        <div class="container">
            <h2 class="section-title">Amenities</h2>
            <div class="row text-center">
                <div class="col-md-3">
                    <i class="fas fa-swimming-pool amenities-icon"></i>
                    <h5>Pool</h5>
                </div>
                <div class="col-md-3">
                    <i class="fas fa-spa amenities-icon"></i>
                    <h5>Spa</h5>
                </div>
                <div class="col-md-3">
                    <i class="fas fa-utensils amenities-icon"></i>
                    <h5>Gourmet Restaurant</h5>
                </div>
                <div class="col-md-3">
                    <i class="fas fa-wifi amenities-icon"></i>
                    <h5>Free Wi-Fi</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="container">
        <h2 class="section-title">What Our Guests Say</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card testimonial-card">
                    <div class="card-body">
                        <p class="testimonial-text">"The experience was wonderful! The rooms are luxurious and the service is impeccable."</p>
                        <p class="text-right"><strong>Maria Silva</strong></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card testimonial-card">
                    <div class="card-body">
                        <p class="testimonial-text">"An incredible stay. The spa and pool are fantastic. We will definitely return!"</p>
                        <p class="text-right"><strong>João Pereira</strong></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card testimonial-card">
                    <div class="card-body">
                        <p class="testimonial-text">"The gourmet restaurant is simply amazing. The food and service are top-notch."</p>
                        <p class="text-right"><strong>Ana Costa</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Gallery Section -->
    <div class="gallery-section">
        <div class="container-fluid" style="padding:0px!important">
            <h2 class="section-title">Hotel Gallery</h2>
            <div class="row gallery-row">
                <div class="col-md-6 p-0">
                    <div class="gallery-item">
                        <img src="https://images.pexels.com/photos/7031731/pexels-photo-7031731.jpeg" alt="Hotel Image 1">
                        <div class="overlay">
                            <div class="overlay-text">Luxury Suite</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 p-0">
                    <div class="gallery-item">
                        <img src="https://images.pexels.com/photos/1001965/pexels-photo-1001965.jpeg" alt="Hotel Image 2">
                        <div class="overlay">
                            <div class="overlay-text">Leisure Area</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 p-0">
                    <div class="gallery-item">
                        <img src="https://images.pexels.com/photos/189296/pexels-photo-189296.jpeg" alt="Hotel Image 3">
                        <div class="overlay">
                            <div class="overlay-text">Pool</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 p-0">
                    <div class="gallery-item">
                        <img src="https://images.pexels.com/photos/260922/pexels-photo-260922.jpeg" alt="Hotel Image 4">
                        <div class="overlay">
                            <div class="overlay-text">Restaurant</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="container">
        <h2 class="section-title">Frequently Asked Questions</h2>
        <div class="row">
            <div class="col-md-6 faq-item">
                <div class="faq-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="faq-content">
                    <p class="faq-question">What are the check-in and check-out times?</p>
                    <p>Check-in starts at 3 PM and check-out is until 11 AM.</p>
                </div>
            </div>
            <div class="col-md-6 faq-item">
                <div class="faq-icon">
                    <i class="fas fa-coffee"></i>
                </div>
                <div class="faq-content">
                    <p class="faq-question">Is breakfast included?</p>
                    <p>Yes, breakfast is included with all bookings.</p>
                </div>
            </div>
            <div class="col-md-6 faq-item">
                <div class="faq-icon">
                    <i class="fas fa-parking"></i>
                </div>
                <div class="faq-content">
                    <p class="faq-question">Is parking available?</p>
                    <p>Yes, we offer free parking for our guests.</p>
                </div>
            </div>
            <div class="col-md-6 faq-item">
                <div class="faq-icon">
                    <i class="fas fa-shuttle-van"></i>
                </div>
                <div class="faq-content">
                    <p class="faq-question">Does the hotel offer transportation services?</p>
                    <p>Yes, we offer transportation services to tourist spots and airports. Please consult our reception for details.</p>
                </div>
            </div>
        </div>
    </div>


<!-- Footer -->
@include('components.footer')



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
