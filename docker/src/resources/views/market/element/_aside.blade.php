<aside class="l-aside">
    <div class="p-nav">
        <nav id="navi">
            <ul class="p-listNav">
                <li class="dashboard">
                    <a href="{{ route('admin.home') }}"></a>
                    <span class="tag">
						<p class="c-text__lv5">
							ダッシュボード
						</p>
					</span>
                </li>
            <!-- <li class="landing">
					<a href="{{ route('admin.landing.index') }}"></a>
					<span class="tag">
						<p class="c-text__lv5">
							水揚げ登録
						</p>
					</span>
				</li> -->
                <li class="order">
                    <a href="{{ route('admin.order.index') }}"></a>
                    <span class="tag">
						<p class="c-text__lv5">
							注文管理
						</p>
					</span>
                </li>
                <li class="document">
                    <a href="{{ route('admin.document.index') }}"></a>
                    <span class="tag">
						<p class="c-text__lv5">
							帳票管理
						</p>
					</span>
                </li>
                <li class="item">
                    <a href="{{ route('admin.item.index') }}"></a>
                    <span class="tag">
						<p class="c-text__lv5">
							商品管理
						</p>
					</span>
                </li>
                <li class="staff">
                    <a href="{{ route('admin.staff.index') }}"></a>
                    <span class="tag">
						<p class="c-text__lv5">
							スタッフ管理
						</p>
					</span>
                </li>
                <li class="master">
                    <a href="{{ route('admin.master.index') }}"></a>
                    <span class="tag">
						<p class="c-text__lv5">
							マスタ管理
						</p>
					</span>
                </li>
                <li class="company">
                    <a href="{{ route('admin.company.index') }}"></a>
                    <span class="tag">
						<p class="c-text__lv5">
							事業者情報
						</p>
					</span>
                </li>
            </ul>
        </nav>
    </div>
    <div class="c-buttonArea">
        <p onclick="download();" class="c-button__line c-button__min">初期設定ソフトウェアをダウンロード</p>
        <script>
            function download() {
                ret = confirm('ダウンロードしますか？');
                if (ret == true) {
                    location.href = "{!! route('admin.download') !!}";
                }
            }
        </script>
    </div>
</aside>
