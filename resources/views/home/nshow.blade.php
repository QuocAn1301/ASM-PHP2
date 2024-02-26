@extends('master.main')

@section('main')

<div class="blog-main-area">
    @foreach($news as $blog)
    <div class="container container-default-2 custom-area">
        <div class="row flex-row-reverse">
            <div class="col-12 col-custom mt-no-text">
                <!-- Blog Details wrapper Area Start -->
                <div class="blog-post-details">
                    <figure class="blog-post-thumb mb-5">
                        <img class="w-100" src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image">
                    </figure>
                    <section class="blog-post-wrapper product-summery">
                        <div class="section-content">
                            <h2 class="title-2">
                                <a href="{{ route('news.show', $blog->id) }}">{{ $blog->title }}</a>
                            </h2>
                            <div class="desc-content">
                                <p>{{ $blog->content }}</p>
                            </div>
                        </div>

                        <div class="comment-area-wrapper mt-5">
                            <div class="comments-view-area">
                                <h3 class="mb-5">3 Comments</h3>
                                <div class="single-comment-wrap mb-4 d-flex">
                                    <figure class="author-thumb">
                                        <a href="#">
                                            <img src="assets/images/review/1.jpg" alt="Author">
                                        </a>
                                    </figure>
                                    <div class="comments-info">
                                        <p class="mb-2">This book is a treatise on the theory of ethics, very popular
                                            during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor
                                            sit amet</p>
                                        <div class="comment-footer d-flex justify-content-between">
                                            <a href="#" class="author"><strong>Duy</strong> - July 30, 2021</a>
                                            <a href="#" class="btn-reply"><i class="fa fa-reply"></i> Reply</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-comment-wrap mb-4 comment-reply d-flex">
                                    <figure class="author-thumb">
                                        <a href="#">
                                            <img src="assets/images/review/1.jpg" alt="Author">
                                        </a>
                                    </figure>
                                    <div class="comments-info">
                                        <p class="mb-2">Praesent bibendum risus pellentesque faucibus rhoncus. Etiam a
                                            mollis odio. Integer urna nisl, fermentum eu mollis et, gravida eu elit.</p>
                                        <div class="comment-footer d-flex justify-content-between">
                                            <a href="#" class="author"><strong>Jack</strong> - July 30, 2021</a> <a
                                                href="#" class="btn-reply"><i class="fa fa-reply"></i> Reply</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-comment-wrap mb-4 d-flex">
                                    <figure class="author-thumb">
                                        <a href="#">
                                            <img src="assets/images/review/1.jpg" alt="Author">
                                        </a>
                                    </figure>
                                    <div class="comments-info">
                                        <p class="mb-2">Praesent bibendum risus pellentesque faucibus rhoncus. Etiam a
                                            mollis odio. Integer urna nisl, fermentum eu mollis et, gravida eu elit.</p>
                                        <div class="comment-footer d-flex justify-content-between">
                                            <a href="#" class="author"><strong>Duy</strong> - July 30, 2021</a>
                                            <a href="#" class="btn-reply"><i class="fa fa-reply"></i> Reply</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- Blog Details Wrapper Area End -->
                <!-- Blog Comments Area Start -->
                <form action="#">
                    <div class="comment-box">
                        <h3>Leave A Comment</h3>
                        <div class="row">
                            <div class="col-12 col-custom">
                                <div class="input-item mt-4 mb-4">
                                    <textarea cols="30" rows="5" name="comment"
                                        class="border rounded-0 w-100 custom-textarea input-area"
                                        placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 col-custom">
                                <div class="input-item mb-4">
                                    <input class="border rounded-0 w-100 input-area name" type="text"
                                        placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-6 col-custom">
                                <div class="input-item mb-4">
                                    <input class="border rounded-0 w-100 input-area email" type="text"
                                        placeholder="Email">
                                </div>
                            </div>
                            <div class="col-12 col-custom mt-40 mb-no-text">
                                <button type="submit" class="btn obrien-button primary-btn rounded-0 mb-0 w-100">Post
                                    comment</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Blog Comments Area End -->
            </div>
        </div>
    </div>
</div>
@endforeach
@stop