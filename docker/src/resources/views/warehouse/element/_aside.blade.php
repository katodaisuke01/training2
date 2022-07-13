<aside class="l-aside">
    <div class="p-nav">
        <nav id="navi">
            <ul class="p-listNav">
                <li class="dashboard">
                    <a href="{{route('warehouse.home')}}"></a>
                    <span class="tag">
						<p class="c-text__lv6">
							ダッシュボード
						</p>
					</span>
                </li>
            <!-- <li class="result">
					<a href="{{route('warehouse.adminResult')}}"></a>
					<span class="tag">
						<p class="c-text__lv6">
							実績データ
						</p>
					</span>
				</li> -->
                <li class="order">
                    <a href="{{route('warehouse.order.index')}}"></a>
                    <span class="tag">
						<p class="c-text__lv6">
							注文管理
						</p>
					</span>
                </li>
                <li class="staff">
                    <a href="{{route('warehouse.labor.index')}}"></a>
                    <span class="tag">
						<p class="c-text__lv6">
							従業員管理
						</p>
					</span>
                </li>
            <!-- <li class="staff">
					<a href="{{route('warehouse.adminStaff')}}"></a>
					<span class="tag">
						<p class="c-text__lv6">
							市場スタッフ管理
						</p>
					</span>
				</li> -->
            <!-- <li class="import">
					<a href="{{route('warehouse.adminImport')}}"></a>
					<span class="tag">
						<p class="c-text__lv6">
							データインポート
						</p>
					</span>
				</li> -->
                <li class="master">
                    <a href="{{route('warehouse.master.index')}}"></a>
                    <span class="tag">
						<p class="c-text__lv6">
							マスタ管理
						</p>
					</span>
                </li>
                <li class="company">
                    <a href="{{route('warehouse.company.index')}}"></a>
                    <span class="tag">
						<p class="c-text__lv6">
							事業者情報設定
						</p>
					</span>
                </li>
            </ul>
        </nav>
    </div>
    <div class="c-buttonArea__center" style="margin-top:auto">
        <form method="post" action="{{ route('warehouse.logout') }}">
            @csrf
            <button type="submit" class="c-button__text">
                ログアウト
            </button>
        </form>
    </div>
</aside>
