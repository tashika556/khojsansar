<div class="row">
    <div class="col-lg-12 mx-auto ">

        <div class="position-relative">
            <div class="d-flex justify-content-between align-items-center mb-4 mt-4">
                <div class="div">
                    <h2 class="border-animation">Review</h2>
                </div>
                <div class="default-btn-wrapp">
                    <div class="review-btn">
                        <a data-toggle="modal" data-target="#exampleModalCenter" href="#" class="btn_default">Create
                            review
                            <span>→</span>
                        </a>
                    </div>
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header p-0">

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body bg_gray">
                                    <form class="text-left  p-lg-4 p-3"
                                        action="{{ route('reviews.store', $business->id) }}" method="POST">
                                        <p>Rating: <span class="star-rating">
                                                <label for="rate-1" style="--i:1"><i
                                                        class="fa-solid fa-star"></i></label>
                                                <input type="radio" name="rating" id="rate-1" value="1">
                                                <label for="rate-2" style="--i:2"><i
                                                        class="fa-solid fa-star"></i></label>
                                                <input type="radio" name="rating" id="rate-2" value="2">
                                                <label for="rate-3" style="--i:3"><i
                                                        class="fa-solid fa-star"></i></label>
                                                <input type="radio" name="rating" id="rate-3" value="3">
                                                <label for="rate-4" style="--i:4"><i
                                                        class="fa-solid fa-star"></i></label>
                                                <input type="radio" name="rating" id="rate-4" value="4">
                                                <label for="rate-5" style="--i:5"><i
                                                        class="fa-solid fa-star"></i></label>
                                                <input type="radio" name="rating" id="rate-5" value="5">
                                            </span></p>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Enter name"
                                                required>

                                        </div>
                                        <div class="form-group">
                                            <label>Email </label>
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Enter email" required>

                                        </div>

                                        <div class="form-group">
                                            <label>Message</label>
                                            <textarea name="review" class="form-control"></textarea>
                                        </div>
                                        <div class="default-btn-wrapp d-flex justify-content-center  mt-4">
                                            <button type="button" href="" class="btn_default border-0"
                                                data-toggle="collapse" data-target="#demo">Submit
                                                <span>→</span>
                                            </button>
                                        </div>
                                        <div id="demo" class="collapse">
                                            <p class="collapse-style"><span>to give review Login with</span></p>
                                            <div class="account-container d-flex justify-content-center">
                                                <a href="{{ route('login.facebook') }}" class="signin-button mr-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="17"
                                                        height="17" viewBox="0 0 48 48">
                                                        <path fill="#3f51b5"
                                                            d="M24 4A20 20 0 1 0 24 44A20 20 0 1 0 24 4Z"></path>
                                                        <path fill="#fff"
                                                            d="M29.368,24H26v12h-5V24h-3v-4h3v-2.41c0.002-3.508,1.459-5.59,5.592-5.59H30v4h-2.287 C26.104,16,26,16.6,26,17.723V20h4L29.368,24z">
                                                        </path>
                                                    </svg>
                                                    <span>Facebook</span>
                                                </a>
                                                <a href="{{ route('login.google') }}" class="signin-button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="17"
                                                        height="17" viewBox="0 0 48 48">
                                                        <path fill="#FFC107"
                                                            d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z">
                                                        </path>
                                                        <path fill="#FF3D00"
                                                            d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z">
                                                        </path>
                                                        <path fill="#4CAF50"
                                                            d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z">
                                                        </path>
                                                        <path fill="#1976D2"
                                                            d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z">
                                                        </path>
                                                    </svg>
                                                    <span>Google</span>
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="review_block d-sm-flex d-block">
            <div class="review_img">
                <img src="img/user.jpg" class="img-fluid">
            </div>
            <div class="review_content pl-sm-4 pl-0">
                <div class="d-sm-flex d-block justify-content-between">
                    <h5>Sachin Kumar jha</h5>
                    <div class="py-2">

                        <h6>August 31, 2023 </h6>
                    </div>
                </div>

                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. At ipsum nisi eos, animi
                    quis debitis est incidunt, minus quisquam quod laudantium impedit culpa praesentium
                    maiores dolore! Praesentium, modi. Sit, quia?</p>

            </div>
        </div>
    </div>
    <div class="col-lg-12 mx-auto mt-4">
        <div class="review_block d-sm-flex d-block">
            <div class="review_img">
                <img src="img/user.jpg" class="img-fluid">
            </div>
            <div class="review_content pl-sm-4 pl-0">
                <div class="d-sm-flex d-block justify-content-between">
                    <h5>Sachin Kumar jha</h5>
                    <div class="py-2">

                        <h6>August 31, 2023 </h6>
                    </div>
                </div>

                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. At ipsum nisi eos, animi
                    quis debitis est incidunt, minus quisquam quod laudantium impedit culpa praesentium
                    maiores dolore! Praesentium, modi. Sit, quia?</p>

            </div>
        </div>
    </div>



</div>