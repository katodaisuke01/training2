<aside class="l-sidebar">
    <div class="l-sidebar__head">
        <div class="c-logo"></div>
    </div>
    <div class="l-sidebar__body">
        @include('solaseed.element._navigation')
    </div>
    <div class="l-sidebar__foot">
        <div class="c-buttonArea__center">
            <form method="post" action="{{ route('solaseed.logout') }}">
                @csrf
                <button type="submit" class="c-button__ghost">ログアウト</button>
            </form>
        </div>
    </div>
</aside>
