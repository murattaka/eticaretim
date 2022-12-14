<div class="mobile-menu">
        <a href="{{ route('web.index') }}" title="@lang('words.homepage')">
                <i class="fas fa-home"></i>
                <span>@lang('words.homepage')</span>
        </a>
        <button class="cate-btn" title="@lang('words.category_list')">
                <i class="fas fa-list"></i>
                <span>@lang('words.category')</span>
        </button>
        <button class="cart-btn" title="@lang('words.shopping_cart', ['count'=>Cart::instance('cart')->content()->count()])">
                <i class="fas fa-shopping-basket"></i>
                <span>@lang('words.shopping_cart_main')</span>
                <sup>
                        {{ Cart::instance('cart')->content()->count() }}
                </sup>
        </button>
        <button class="wishlist-btn" title="@lang('words.wishlist_count', ['count'=>Cart::instance('wishlist')->content()->count()])">
                <i class="fas fa-heart"></i>
                <span>@lang('words.wishlist')</span>
                <sup>
                        {{ Cart::instance('wishlist')->content()->count() }}
                </sup>
        </button>
        @auth
                <a href="{{ route('web.account.logout.store') }}">
                        <i class="fa fa-sign-out-alt"></i>
                        <span>@lang('words.logout')</span>
                </a>
        @else
                <a href="{{ route('web.user.login.index') }}">
                        <i class="fa fa-user"></i>
                        <span>@lang('words.login')</span>
                </a>
        @endauth
</div>