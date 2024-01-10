@extends('layouts.front')

@section('content')
    <div class="content-container">
        <h2>Recent Posts</h2>
        <div class="categories">
            <div class="categories_left">
                <svg xmlns="http://www.w3.org/2000/svg" width="6" height="11" viewBox="0 0 6 11" fill="none">
                    <path
                        d="M5.92159 9.5536C5.97177 9.60321 6 9.67073 6 9.74117C6 9.81161 5.97177 9.87913 5.92159 9.92873L5.35965 10.4888C5.31155 10.5399 5.24439 10.5688 5.17411 10.5688C5.10382 10.5688 5.03666 10.5399 4.98856 10.4888L0.116631 5.6332C0.0420446 5.55896 9.39084e-05 5.45823 1.41118e-06 5.35317L1.42323e-06 5.2158C9.39389e-05 5.11074 0.0420447 5.01001 0.116631 4.93577L4.98856 0.0801782C5.03666 0.0290984 5.10382 0.000122946 5.17411 0.000122952C5.24439 0.000122958 5.31155 0.0290985 5.35965 0.0801782L5.92159 0.640236C5.97178 0.689839 6 0.757362 6 0.827803C6 0.898242 5.97178 0.965765 5.92159 1.01537L1.63811 5.28448L5.92159 9.5536Z"
                        fill="#474747"/>
                </svg>
            </div>
            <div class="categories_btns">
                <a href="{{url('/')}}"><button id="AllBTN" class="selected_category categories_left">About</button></a>
                @foreach($categories as $category)
                    <a href="{{route('category.select',['category_name'=>$category->name])}}"><button style="margin-left: 50px;">{{$category->category_name}}</button></a>
                @endforeach
            </div>
        </div>
        <div id="posts_container">
            @foreach($posts as $post)
                {{--                {{$myTags = ($post->tags->first()->tag_name)}}--}}
                {{--                {{$allTags = explode(',','$myTags')}}--}}
                <div class="item-container ${lastItemClass}">
                    <div class="inner-left">
                        <p class="date_of_post">{{$post->created_at}}</p>
                        <h3 data-post-id="{{$post->id}}" class="post_h3">{{$post->title}}</h3>
                        <img data-post-id="{{$post->id}}" class="post_h3" src="{{$post->img}}">
                        <h3 data-post-id="{{$post->id}}" class="post_h3">{{$post->text}}</h3>

                    </div>
                    <div class="inner-right">
                        {{--                        @foreach($allTags as $tag)--}}
                        {{--                            <div class="tag">#{{$tag}}</div>--}}
                        {{--                        @endforeach--}}
                    </div>
                </div>
            @endforeach
        </div>
        <div id="pagination" class="page-control">
            <button class="page-control-btn prev-page-btn" id="prev_page">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                    <rect y="0.000213623" width="32" height="32" rx="3" fill="#F4F4F4"/>
                    <path
                        d="M18.9216 19.5858C18.9718 19.6356 19 19.7033 19 19.774C19 19.8447 18.9718 19.9124 18.9216 19.9622L18.3597 20.5241C18.3116 20.5754 18.2444 20.6045 18.1741 20.6045C18.1038 20.6045 18.0367 20.5754 17.9886 20.5241L13.1166 15.6522C13.042 15.5777 13.0001 15.4767 13 15.3712L13 15.2334C13.0001 15.128 13.042 15.0269 13.1166 14.9524L17.9886 10.0805C18.0367 10.0292 18.1038 10.0002 18.1741 10.0002C18.2444 10.0002 18.3116 10.0292 18.3597 10.0805L18.9216 10.6424C18.9718 10.6922 19 10.76 19 10.8306C19 10.9013 18.9718 10.9691 18.9216 11.0188L14.6381 15.3023L18.9216 19.5858Z"
                        fill="#474747"/>
                </svg>
            </button>
            <ul class="page-inner">
            </ul>
            <button class="page-control-btn next-page-btn" id="next_page">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                    <rect x="31.5" y="31.5004" width="31" height="31" rx="2.5" transform="rotate(180 31.5 31.5004)"
                          fill="#F4F4F4"/>
                    <path
                        d="M13.0784 12.4148C13.0282 12.365 13 12.2973 13 12.2266C13 12.1559 13.0282 12.0882 13.0784 12.0384L13.6403 11.4764C13.6884 11.4252 13.7556 11.3961 13.8259 11.3961C13.8962 11.3961 13.9633 11.4252 14.0114 11.4764L18.8834 16.3484C18.958 16.4229 18.9999 16.5239 19 16.6293V16.7672C18.9999 16.8726 18.958 16.9737 18.8834 17.0481L14.0114 21.9201C13.9633 21.9713 13.8962 22.0004 13.8259 22.0004C13.7556 22.0004 13.6884 21.9713 13.6403 21.9201L13.0784 21.3581C13.0282 21.3084 13 21.2406 13 21.1699C13 21.0993 13.0282 21.0315 13.0784 20.9817L17.3619 16.6983L13.0784 12.4148Z"
                        fill="#474747"/>
                </svg>
            </button>
        </div>
    </div>
@endsection
