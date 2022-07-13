@extends('layouts.admin.default')

@section('page_class', 'l-form')
@section('title', 'その他設定 編集')
@section('page_title', 'セキュリティーポリシー')

@section('content')
  @component('component.admin.frame._form')
    @slot('head')
      <div class="c-icon__w32 c-icon--setting"></div>
      <h1 class="c-text__lv3 c-text__weight--900">@yield('title') <small>@yield('page_title')</small></h1>
    @endslot
    @slot('body')
      <form action="" name="" class="p-form">
        <div class="p-form__body c-concave">
          <ul class="p-list__wrap">
            <li class="c-full">
              <div class="head">
                <p>セ@yield('page_title')内容</p>
              </div>
              <div class="body">
                <div class="c-input--full">
                  <textarea>個人情報の取り扱いについて
                    株式会社スタープロジェクト（以下、「当社」と記す。）は、人材ビジネス業を営む企業として、個人情報の重要性や社会的責任を認識し、以下の通り個人情報保護方針を定め、以下の通り扱います。
                    １．利用目的について
                    当社は、個人情報を取得するに当たっては利用目的を特定し、特定された利用目的の達成に必要な範囲内で利用、提供いたします。また、個人情報は、適切に取得、利用及び提供するとともに、目的外利用は行わないとともに、かつ目的外利用を行わないための措置を講じます。
                    当社が取得する個人情報の利用目的は次の通りです。

                    個人情報の類型 利用目的
                    取引先に関する個人情報
                    ・取引先管理及び営業活動のため
                    当社の有料職業紹介事業及び業務請負事業等における就業を希望された方の個人情報
                    ・登録手続きのため
                    ・当社からの仕事紹介、仕事に関する連絡のため
                    ・契約締結に関する業務のため
                    ・契約内容の履行に必要な取り扱いのため
                    ・雇用管理のため
                    ・賃金等の振込のため
                    ・緊急事態が発生した際の連絡のため
                    当社の役員・従業員（採用応募者、退職者を含む）及びその家族の個人情報
                    ・法令に基づく従業員情報の取得、管理のため
                    ・健康管理のため
                    ・人事、給与業務履行のため
                    ・福利厚生のため
                    ・緊急事態が発生した際の連絡のため
                    ・その他、人事労務管理上必要な処理のため
                    その他
                    ・ご本人に事前にお知らせし、同意いただいた目的

                    ２．個人情報の管理について
                    　当社は、取扱う個人情報の書類及びデータへの不正アクセス・紛失・破壊・改ざん・漏えい等に関する事故を未然に防止するとともに、技術面及び組織面において出来る限りの適切な是正措置を実施いたします。

                    ３．法令、規範の遵守について
                    　当社は、個人情報に関する法令、国が定める指針及びのその他の規範を遵守いたします。

                    ４．個人情報の開示等について
                    （１）利用目的の通知、開示請求、訂正、追加又は削除、利用の停止・消去、第三者利用の停止（以下、開示等という）の請求の申し出を受けた場合、規定に従い遅滞無くこれに応じます。
                    （２）本人確認
                    　開示等の請求者が本人であることを確認するために、氏名・住所・生年月日・登録者コード等による本人確認をいたします。代理人である場合は、代理権のあること及び代理人ご本人を証明できる公的文書（運転免許証、健康保険証、住民票、戸籍謄本、住民基本台帳カード、パスポートなど）のコピーを提出していただきます。

                    （３）請求先
                    　下記７の「株式会社スタープロジェクト個人情報保護窓口」宛に請求願います。
                    なお、開示請求の場合に限り、当社所定の「申請書」を送付致しますので、それに必要事項をご記入のうえ返信願います。当該「申請書」を受領後郵便にてお送りさせていただきます。その他、ご請求手続や必要な書類等ご不明な点につきましても下記「株式会社スタープロジェクト個人情報保護窓口」にお問い合わせください。

                    ５．苦情及び相談の窓口について
                    　個人情報を取得させていただく皆様のご意見、ご相談及び苦情については、当社ホームページﾞ等に苦情及び相談の窓口を明示し、迅速な対応が可能なよう体制を構築・運用いたします。

                    ６．見直しについて
                    　当社は、個人情報を正確かつ安全に取扱うため社会情勢、技術の発展、環境の変化及び皆様からのご意見、ご相談、苦情等の内容を十分考慮し、個人情報の取り扱いを随時見直し、改善を行います。

                    ７．「株式会社スタープロジェクト個人情報保護窓口」の連絡先
                    ・電話の場合　048-948-8427
                    ・電子メールの場合　
                    ・手紙の場合
                    　〒341-0018　埼玉県三郷市早稲田2-6-5 メゾン・ド・ベール早稲田102号
                    　株式会社スタープロジェクト個人情報保護窓口
                    　※なお、直接ご来社頂く場合は事前にご連絡をお願い申し上げます。

                    制定：2020年5月20日
                    株式会社スタープロジェクト　　代表取締役　阿部　ヒロ
                  </textarea>
                </div>
              </div>
            </li>
          </ul>
        </div>
        <div class="p-form__foot">
          <div class="c-buttonArea__end">
            <a href="{{ route('adminSetting') }}" class="c-button__min c-button__gray">戻る</a>
            <a href="?flash=successSave" class="c-button">保存する</a>
            <!-- <input class="c-button" type="submit" value="保存する"> -->
          </div>
        </div>
      </form>
    @endslot
  @endcomponent

@endsection
