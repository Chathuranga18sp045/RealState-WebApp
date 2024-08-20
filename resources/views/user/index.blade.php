@extends('user.user_dashboard')

@section('user')
<!-- first section Start -->
<div class="background-container" style="background-image: url('{{ asset('frontend/house4.jpg') }}');">
    <h1 class="custom-header">Create Lasting Wealth Through Realshade</h1>
    <p class="custom-paragraph">Amet Consecteture adipisicing elit sed do eiusmod.</p>

    <!-- Toggle Button Section -->
    <div class="toggle-buttons">
        <button id="buyBtn" class="toggle-btn active" onclick="toggleSection('buy')">BUY</button>
        <button id="rentBtn" class="toggle-btn" onclick="toggleSection('rent')">RENT</button>
    </div>

    <!-- Content Section -->
    <div id="toggleContent" class="toggle-content">
        <div id="buyContent" class="content-section">
            <!-- Search Form Area -->
            <div class="container">
                <div class="row justify-content-center">
                    <form action="" class="col-md-10">
                        <div class="mb-3 row align-items-center">
                            <div class="text-center col-md-4">
                                <label for="buyPropertySearch" class="form-label">Search Property To Buy</label>
                                <input id="buyPropertySearch" class="form-control" type="search" placeholder="Search By Property Location" aria-label="Search">
                            </div>
                            <div class="text-center col-md-3">
                                <label for="buyLocationSelect" class="form-label">Location</label>
                                <select id="buyLocationSelect" class="form-select" aria-label="Select Location">
                                    <option selected>Select Location</option>
                                    <option value="1">New York</option>
                                    <option value="2">Los Angeles</option>
                                    <option value="3">Chicago</option>
                                    <option value="4">Houston</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                            <div class="text-center col-md-3">
                                <label for="buyPropertyType" class="form-label">Property Type</label>
                                <select id="rentPropertyType" class="form-select" aria-label="Select Property Type">
                                    <option selected>All Type</option>
                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="text-center col-md-2">
                                <!-- Green Full-Width Button Area -->
                                <div class="btn-container">
                                    <span class="btn-text">Search</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="rentContent" class="hidden content-section">
            <!-- Rent Form Area -->
            <div class="container">
                <div class="row justify-content-center">
                    <form action="" class="col-md-10">
                        <div class="mb-3 row align-items-center">
                            <div class="text-center col-md-4">
                                <label for="rentPropertySearch" class="form-label">Search Property To Rent</label>
                                <input id="rentPropertySearch" class="form-control" type="search" placeholder="Search By Property Location" aria-label="Search">
                            </div>
                            <div class="text-center col-md-3">
                                <label for="rentLocationSelect" class="form-label">Location</label>
                                <select id="rentLocationSelect" class="form-select" aria-label="Select Location">
                                    <option selected>Select Location</option>
                                    <option value="1">New York</option>
                                    <option value="2">Los Angeles</option>
                                    <option value="3">Chicago</option>
                                    <option value="4">Houston</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                            <div class="text-center col-md-3">
                                <label for="rentPropertyType" class="form-label">Property Type</label>
                                <select id="rentPropertyType" class="form-select" aria-label="Select Property Type">
                                    <option selected>All Type</option>
                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="text-center col-md-2">
                                <!-- Green Full-Width Button Area -->
                                <div class="btn-container">
                                    <span class="btn-text">Search</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- first section END -->

<!-- Second section Start -->
<div class="second-section">
    <div class="card-container">
        <div class="card col-md-2" style="width: 18rem;">
            <img src="property_type/apartment.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Apartment</h5>
                <h3 class="count">6</h3>
            </div>
        </div>
        <div class="card col-md-2" style="width: 18rem;">
            <img src="property_type/apartment.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Apartment</h5>
                <h3 class="count">6</h3>
            </div>
        </div>
        <div class="card col-md-2" style="width: 18rem;">
            <img src="property_type/apartment.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Apartment</h5>
                <h3 class="count">6</h3>
            </div>
        </div>
        <div class="card col-md-2" style="width: 18rem;">
            <img src="property_type/apartment.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Apartment</h5>
                <h3 class="count">6</h3>
            </div>
        </div>
        <div class="card col-md-2" style="width: 18rem;">
            <img src="property_type/apartment.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Apartment</h5>
                <h3 class="count">6</h3>
            </div>
        </div>
    </div>
    <div class="all-categories">
        <button class="btn btn-category">All Categories</button>
    </div>
</div>

@endsection
